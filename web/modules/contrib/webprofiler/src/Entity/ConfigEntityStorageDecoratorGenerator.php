<?php

declare(strict_types=1);

namespace Drupal\webprofiler\Entity;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\PhpStorage\PhpStorageFactory;
use Drupal\webprofiler\DecoratorGeneratorInterface;
use PhpParser\Builder\Method;
use PhpParser\Builder\Param;
use PhpParser\BuilderFactory;
use PhpParser\Error;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\NodeFinder;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\FindingVisitor;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter;

/**
 * Generate decorators for config entity storage classes.
 */
class ConfigEntityStorageDecoratorGenerator implements DecoratorGeneratorInterface {

  /**
   * DecoratorGenerator constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The Entity type manager service.
   */
  public function __construct(
    protected readonly EntityTypeManagerInterface $entityTypeManager,
  ) {
  }

  /**
   * {@inheritdoc}
   */
  public function generate(): void {
    $classes = $this->getClasses();

    foreach ($classes as $class) {
      try {
        $methods = $this->getMethods($class);
        $body = $this->createDecorator($class, $methods);
        $this->writeDecorator($class['id'], $body);
      }
      catch (\Exception $e) {
        throw new \Exception('Unable to generate decorator for class ' . $class['class'] . '. ' . $e->getMessage());
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getDecorators(): array {
    $decorators = &drupal_static(__FUNCTION__);

    if (!isset($decorators)) {
      $classes = $this->getClasses();

      $decorators = array_map(function ($class) {
        return $class['decoratorClass'];
      }, $classes);
    }

    return $decorators;
  }

  /**
   * Return information about every config entity storage classes.
   *
   * @return array
   *   Information about every config entity storage classes.
   */
  private function getClasses(): array {
    // @phpstan-ignore-next-line
    $cache_backend = \Drupal::cache('default');

    $cid = 'webprofiler:config_entity_storage_classes';
    $cache = $cache_backend->get($cid);
    if ($cache) {
      return $cache->data;
    }

    $definitions = $this->entityTypeManager->getDefinitions();
    $classes = [];

    foreach ($definitions as $definition) {
      try {
        $classPath = $this->getClassPath($definition->getStorageClass());
        $uses = $this->getUses($classPath);
        $class = $this->getClass($classPath);

        if ($class != NULL) {
          $namespace = $class->namespacedName->slice(0, -1)->toString();
          $classes[$definition->id()] = [
            'id' => $definition->id(),
            'namespace' => $namespace,
            'class' => $class->name->name,
            'interface' => '\\' . implode('\\', $class->implements[0]->getParts()),
            'decoratorClass' => $namespace . '\\' . $class->name->name . 'Decorator',
            'uses' => $uses,
          ];
        }
      }
      catch (Error $error) {
        echo "Parse error: {$error->getMessage()}\n";
        return [];
      }
      catch (\ReflectionException $error) {
        echo "Reflection error: {$error->getMessage()}\n";
        return [];
      }
    }

    $cache_backend->set($cid, $classes, Cache::PERMANENT, ['webprofiler', 'config:core.extension']);

    return $classes;
  }

  /**
   * Get the filename of the file in which the class has been defined.
   *
   * @param string $class
   *   A class name.
   *
   * @return string
   *   The filename of the file in which the class has been defined.
   *
   * @throws \ReflectionException
   */
  private function getClassPath(string $class): string {
    $reflector = new \ReflectionClass($class);

    return $reflector->getFileName();
  }

  /**
   * Parses PHP code into a node tree.
   *
   * @param string $classPath
   *   The filename of the file in which a class has been defined.
   *
   * @return \PhpParser\Node\Stmt[]|null
   *   Array of statements.
   */
  private function getAst(string $classPath): ?array {
    $code = file_get_contents($classPath);
    $parser = (new ParserFactory())->createForHostVersion();

    return $parser->parse($code);
  }

  /**
   * Return TRUE if this Node represents a config entity storage class.
   *
   * @param \PhpParser\Node $node
   *   The Node to check.
   *
   * @return bool
   *   TRUE if this Node represents a config entity storage class.
   */
  private function isConfigEntityStorage(Node $node): bool {
    if (!$node instanceof Class_) {
      return FALSE;
    }

    if ($node->extends !== NULL &&
      $node->extends->getParts()[0] == 'ConfigEntityStorage' &&
      isset($node->implements[0]) &&
      $node->implements[0]->getParts()[0] != ''
    ) {
      return TRUE;
    }

    return FALSE;
  }

  /**
   * Create the decorator from class information.
   *
   * @param array $class
   *   The class information.
   *
   * @return \PhpParser\Node\Stmt\ClassMethod[]
   *   The methods of the class.
   *
   * @throws \Exception
   */
  private function getMethods(array $class): array {
    $classPath = $this->getClassPath($class['interface']);
    $ast = $this->getAst($classPath);

    $nodeFinder = new NodeFinder();

    /** @var \PhpParser\Node\Stmt\ClassMethod[] $nodes */
    $nodes = $nodeFinder->find($ast, function (Node $node) {
      return $node instanceof ClassMethod;
    });

    return $nodes;
  }

  /**
   * Create the decorator from class information and methods.
   *
   * @param array $class
   *   The class information.
   * @param \PhpParser\Node\Stmt\ClassMethod[] $methods
   *   The methods of the class.
   *
   * @return string
   *   The decorator class body.
   *
   * phpcs:disable Drupal.Classes.FullyQualifiedNamespace.UseStatementMissing
   */
  private function createDecorator(array $class, array $methods): string {
    $decorator = $class['class'] . 'Decorator';

    $factory = new BuilderFactory();
    $file = $factory
      ->namespace($class['namespace'])
      ->addStmt($factory->use('Drupal\webprofiler\Entity\ConfigEntityStorageDecorator'));

    foreach ($class['uses'] as $use) {
      $file->addStmt($factory->use($use));
    }

    $generated_class = $factory
      ->class($decorator)
      ->extend('ConfigEntityStorageDecorator')
      ->implement($class['interface'])
      ->setDocComment('
/**
 * This file is auto-generated by the Webprofiler module.
 */',
      );

    foreach ($methods as $method) {
      $generated_class->addStmt($this->createMethod($method));
    }

    $file->addStmt($generated_class);

    $stmts = [$file->getNode()];
    $prettyPrinter = new PrettyPrinter\Standard();

    // Add a newline at the end of the file.
    return $prettyPrinter->prettyPrintFile($stmts) . "\n";
  }

  /**
   * Create a decorator method.
   *
   * @param \PhpParser\Node\Stmt\ClassMethod $method
   *   The method.
   *
   * @return \PhpParser\Builder\Method
   *   The generated method.
   */
  private function createMethod(ClassMethod $method): Method {
    $factory = new BuilderFactory();
    $generated_method = $factory->method($method->name->name)->makePublic();

    foreach ($method->getParams() as $param) {
      $generated_method->addParam($this->createParameter($param));
    }

    $generated_body = $factory->methodCall(
      new Node\Expr\PropertyFetch(new Node\Expr\Variable('this'), 'getOriginalObject()'),
      $method->name->name,
      array_map(function ($param) {
        return new Node\Expr\Variable($param->var->name);
      }, $method->getParams()),
    );

    // If return type is different from void, add a return statement.
    if (!$method->getReturnType() instanceof Node\Identifier || $method->getReturnType()->name != 'void') {
      $generated_body = new Node\Stmt\Return_($generated_body);
    }

    $generated_method->addStmt($generated_body);

    if ($method->getReturnType() != NULL) {
      $generated_method->setReturnType($method->getReturnType());
    }

    return $generated_method;
  }

  /**
   * Create a decorator method parameter.
   *
   * @param \PhpParser\Node\Param $param
   *   The method parameter.
   *
   * @return \PhpParser\Builder\Param
   *   The generated parameter.
   */
  private function createParameter(Node\Param $param): Param {
    $factory = new BuilderFactory();
    $generated_param = $factory
      ->param($param->var->name);

    if ($param->type != NULL) {
      $generated_param->setType($param->type);
    }

    if ($param->default != NULL) {
      $generated_param->setDefault($param->default);
    }

    if ($param->byRef) {
      $generated_param->makeByRef();
    }

    if ($param->variadic) {
      $generated_param->makeVariadic();
    }

    return $generated_param;
  }

  /**
   * Write a decorator class body to file.
   *
   * @param string $name
   *   The class name.
   * @param string $body
   *   The class body.
   */
  private function writeDecorator(string $name, string $body): void {
    $storage = PhpStorageFactory::get('webprofiler');

    if (!$storage->exists($name)) {
      $storage->save($name, $body);
    }
  }

  /**
   * Get the list of classes in a file.
   *
   * @param string $classPath
   *   The filename of the file in which a class has been defined.
   *
   * @return \PhpParser\Node\Stmt\Class_|null
   *   The list of classes in a file.
   */
  private function getClass(string $classPath): ?Class_ {
    $ast = $this->getAst($classPath);

    $visitor = new FindingVisitor(function (Node $node) {
      return $this->isConfigEntityStorage($node);
    });

    $traverser = new NodeTraverser();
    $traverser->addVisitor($visitor);
    $traverser->addVisitor(new NameResolver());
    $traverser->traverse($ast);

    /** @var \PhpParser\Node\Stmt\Class_[] $nodes */
    $nodes = $visitor->getFoundNodes();

    if (count($nodes) == 0) {
      return NULL;
    }

    return reset($nodes);
  }

  /**
   * Get the list of uses in a class.
   *
   * @param string $classPath
   *   The filename of the file in which a class has been defined.
   *
   * @return array
   *   The list of uses in a class.
   */
  private function getUses(string $classPath): array {
    $ast = $this->getAst($classPath);

    $visitor = new FindingVisitor(function (Node $node) {
      return $node instanceof Node\Stmt\Use_;
    });

    $traverser = new NodeTraverser();
    $traverser->addVisitor($visitor);
    $traverser->addVisitor(new NameResolver());
    $traverser->traverse($ast);

    /** @var \PhpParser\Node\Stmt\Use_[] $nodes */
    $nodes = $visitor->getFoundNodes();

    return array_map(function (Node\Stmt\Use_ $node) {
      return $node->uses[0]->name->toString();
    }, $nodes);
  }

}
