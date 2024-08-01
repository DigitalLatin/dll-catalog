<?php

namespace Drupal\Tests\webprofiler\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\webprofiler_config_entity\TestConfigStorageInterface;

/**
 * Tests the ConfigEntityDecoratorGenerator.
 */
class ConfigEntityDecoratorGeneratorTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'tracer',
    'webprofiler',
    'webprofiler_config_entity',
  ];

  /**
   *
   */
  public function setUp(): void {
    parent::setUp();

    $this->installEntitySchema('testconfig');
  }

  /**
   *
   */
  public function testConfigEntityDecoratorGenerator(): void {
    $storage = \Drupal::entityTypeManager()->getStorage('testconfig');
    $reflector = new \ReflectionClass($storage);

    $this->assertInstanceOf(TestConfigStorageInterface::class, $storage);
    $this->assertFileExists($reflector->getFileName());
    $this->assertFileEquals(__DIR__ . '/expected/TestConfigStorageDecorator.php', $reflector->getFileName());
  }

}
