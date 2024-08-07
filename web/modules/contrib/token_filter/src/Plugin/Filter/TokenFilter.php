<?php

namespace Drupal\token_filter\Plugin\Filter;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\BubbleableMetadata;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Utility\Token;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;
use Drupal\token\TokenEntityMapperInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a filter that replaces global and entity tokens with their values.
 *
 * @Filter(
 *   id = "token_filter",
 *   title = @Translation("Replaces global and entity tokens with their values"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_IRREVERSIBLE,
 *   settings = {
 *     "replace_empty" = FALSE
 *   }
 * )
 */
class TokenFilter extends FilterBase implements ContainerFactoryPluginInterface {

  /**
   * The token service.
   *
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * The token entity mapper.
   *
   * @var \Drupal\token\TokenEntityMapperInterface
   */
  protected $tokenEntityMapper;

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * The route match service.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * Constructs a token filter plugin.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Utility\Token $token
   *   The token service.
   * @param \Drupal\token\TokenEntityMapperInterface $token_entity_mapper
   *   The token entity mapper.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   * @param \Drupal\Core\Routing\RouteMatchInterface $current_route_match
   *   The route match service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, Token $token, TokenEntityMapperInterface $token_entity_mapper, RendererInterface $renderer, RouteMatchInterface $current_route_match) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->token = $token;
    $this->tokenEntityMapper = $token_entity_mapper;
    $this->renderer = $renderer;
    $this->routeMatch = $current_route_match;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('token'),
      $container->get('token.entity_mapper'),
      $container->get('renderer'),
      $container->get('current_route_match')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['replace_empty'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Replace empty values'),
      '#description' => $this->t('Remove tokens from text if they cannot be replaced with a value'),
      '#default_value' => $this->settings['replace_empty'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    $data = [];

    $entity = drupal_static('token_filter_entity', NULL);
    $cache = new BubbleableMetadata();
    if (!is_null($entity) && $entity instanceof ContentEntityInterface) {
      $cache->addCacheableDependency($entity);
      $token_type = $this->tokenEntityMapper->getTokenTypeForEntityType($entity->getEntityTypeId());
      $data[$token_type] = $entity;
    }

    $clear = $this->settings['replace_empty'];
    $replacements = $this->token->replace($text, $data, [
      'clear' => $clear,
      'langcode' => $langcode,
    ], $cache);

    return (new FilterProcessResult($replacements))->merge($cache);
  }

  /**
   * {@inheritdoc}
   */
  public function tips($long = FALSE) {
    $build = [];
    $build[] = ['#markup' => $this->t('Global and entity tokens are replaced with their values.')];

    $token_types = [];
    $parameters = $this->routeMatch->getParameters();
    foreach ($parameters as $parameter) {
      $entity_type = NULL;
      if ($parameter instanceof ContentEntityInterface) {
        $entity_type = $parameter->getEntityTypeId();
      }
      elseif ($parameter instanceof ConfigEntityBundleBase) {
        $entity_type = $parameter->getEntityType()->getBundleOf();
      }
      if (isset($entity_type)) {
        $token_type = $this->tokenEntityMapper->getTokenTypeForEntityType($entity_type);
        $token_types[] = $token_type;
      }
    }

    $build[] = [
      '#prefix' => ' ',
      '#theme'  => 'token_tree_link',
      '#token_types' => $token_types,
    ];

    return $this->renderer->render($build);
  }

}
