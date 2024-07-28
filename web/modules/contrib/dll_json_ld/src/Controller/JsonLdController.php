<?php

namespace Drupal\dll_json_ld\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\dll_json_ld\Service\JsonLdFormatter;
use Drupal\node\Entity\Node;
use Drupal\Core\Cache\CacheableJsonResponse;

/**
 * Controller for rendering JSON-LD output.
 */
class JsonLdController extends ControllerBase {

  /**
   * The JSON-LD formatter service.
   *
   * @var \Drupal\dll_json_ld\Service\JsonLdFormatter
   */
  protected $jsonLdFormatter;

  /**
   * Constructs a JsonLdController object.
   *
   * @param \Drupal\dll_json_ld\Service\JsonLdFormatter $jsonLdFormatter
   *   The JSON-LD formatter service.
   */
  public function __construct(JsonLdFormatter $jsonLdFormatter) {
    $this->jsonLdFormatter = $jsonLdFormatter;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('dll_json_ld.json_ld_formatter')
    );
  }

  /**
   * View method to handle JSON-LD format.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The current request.
   * @param string $id
   *   The unique identifier for the content.
   * @param string $content_type
   *   The content type.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   The JSON-LD response.
   */
  public function view(Request $request, $id, $content_type) {
    // Check if the format query parameter is set to json-ld
    if ($request->query->get('format') === 'json-ld') {
      // Load the node by unique identifier
      $node = $this->loadNodeByIdentifier($id, $content_type);
      if (!$node) {
        return new CacheableJsonResponse(['error' => 'Node not found'], 404);
      }

      // Use the service to format the node as JSON-LD
      $data = $this->jsonLdFormatter->format($node);

      // Create the JSON response
      $response = new CacheableJsonResponse($data);
      $response->addCacheableDependency($node);
      return $response;
    }

    // If format is not json-ld, return an error
    return new CacheableJsonResponse(['error' => 'Invalid format'], 400);
  }

  /**
   * Load a node by its unique identifier.
   *
   * @param string $id
   *   The unique identifier for the content.
   * @param string $content_type
   *   The content type.
   *
   * @return \Drupal\node\Entity\Node|null
   *   The loaded node or null if not found.
   */
  protected function loadNodeByIdentifier($id, $content_type) {
    $nodes = \Drupal::entityTypeManager()
      ->getStorage('node')
      ->loadByProperties([
        'type' => $content_type,
        'field_unique_id' => $id,
      ]);
    return $nodes ? reset($nodes) : null;
  }
}
