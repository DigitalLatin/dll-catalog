<?php

namespace Drupal\dll_json_ld\Service\Formatter;

use Drupal\node\NodeInterface;
use Drupal\dll_json_ld\Service\JsonLdFormatter;

/**
 * Controller for rendering JSON-LD output for Author Authorities.
 */
class AuthorAuthoritiesController extends ControllerBase {

  /**
   * The JSON-LD formatter service.
   *
   * @var \Drupal\dll_json_ld\Service\JsonLdFormatter
   */
  protected $jsonLdFormatter;

  /**
   * Constructs a AuthorAuthoritiesController object.
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
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   The JSON-LD response.
   */
  public function view(Request $request, $id) {
    // Check if the format query parameter is set to json-ld
    if ($request->query->get('format') === 'json-ld') {
      // Load the node by unique identifier
      $node = $this->loadNodeByIdentifier($id, 'author_authorities');
      if (!$node) {
        return new JsonResponse(['error' => 'Node not found'], 404);
      }

      // Use the service to format the node as JSON-LD
      $data = $this->jsonLdFormatter->format($node);

      // Return the JSON-LD data as a JSON response
      return new JsonResponse($data);
    }

    // If format is not json-ld, return an error
    return new JsonResponse(['error' => 'Invalid format'], 400);
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
