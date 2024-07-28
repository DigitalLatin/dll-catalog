<?php

namespace Drupal\dll_json_ld\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\path_alias\AliasManagerInterface;
use Drupal\node\NodeInterface;
use Drupal\dll_json_ld\Service\JsonLdFormatter;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Render\RendererInterface;

/**
 * JSON-LD request subscriber.
 */
class JsonLdRequestSubscriber implements EventSubscriberInterface {

  protected $entityTypeManager;
  protected $jsonLdFormatter;
  protected $aliasManager;
  protected $logger;
  protected $renderer;

  public function __construct(EntityTypeManagerInterface $entity_type_manager, JsonLdFormatter $json_ld_formatter, AliasManagerInterface $alias_manager, LoggerChannelFactoryInterface $logger_factory, RendererInterface $renderer) {
    $this->entityTypeManager = $entity_type_manager;
    $this->jsonLdFormatter = $json_ld_formatter;
    $this->aliasManager = $alias_manager;
    $this->logger = $logger_factory->get('dll_json_ld');
    $this->renderer = $renderer;
  }

  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['onRequest', 0];
    return $events;
  }

  /**
 * Responds to the request event.
 *
 * @param \Symfony\Component\HttpKernel\Event\RequestEvent $event
 *   The event to process.
 */
public function onRequest(RequestEvent $event) {
  $request = $event->getRequest();
  $this->logger->info('Request received with query parameters: @params', ['@params' => $request->query->all()]);

  if ($request->query->get('format') === 'json-ld') {
    $this->logger->info('format=json-ld detected');
    $node = $this->getNodeFromRequest($request);
    if ($node) {
      $this->logger->info('Node found: @nid', ['@nid' => $node->id()]);
      $this->logger->info('Node bundle: @bundle', ['@bundle' => $node->bundle()]);
      $response_data = $this->jsonLdFormatter->format($node);
      $this->logger->info('Formatted JSON-LD response: @response', ['@response' => json_encode($response_data)]);

      // Create the JSON response
      $response = new JsonResponse($response_data);

      // Set the response
      $event->setResponse($response);
    } else {
      $this->logger->warning('No node found for the given request.');
    }
  } else {
    $this->logger->info('format=json-ld not detected');
  }
}


  protected function getNodeFromRequest($request) {
    $path = $request->getPathInfo();
    $this->logger->info('Processing path: @path', ['@path' => $path]);

    $alias = $this->aliasManager->getPathByAlias($path);
    if (strpos($alias, '/node/') === 0) {
      $nid = str_replace('/node/', '', $alias);
      $node = $this->entityTypeManager->getStorage('node')->load($nid);
      if ($node instanceof NodeInterface) {
        return $node;
      }
    }
    return NULL;
  }
}
