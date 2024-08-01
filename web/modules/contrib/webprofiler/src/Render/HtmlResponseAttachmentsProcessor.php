<?php

declare(strict_types=1);

namespace Drupal\webprofiler\Render;

use Drupal\Core\Render\AttachmentsInterface;
use Drupal\Core\Render\AttachmentsResponseProcessorInterface;
use Drupal\webprofiler\DataCollector\AssetsDataCollector;

/**
 * Extends the Drupal core html_response.attachments_processor service.
 */
class HtmlResponseAttachmentsProcessor implements AttachmentsResponseProcessorInterface {

  public function __construct(
    private readonly AttachmentsResponseProcessorInterface $original,
    private readonly AssetsDataCollector $dataCollector,
  ) {
  }

  /**
   * {@inheritdoc}
   */
  public function processAttachments(AttachmentsInterface $response): AttachmentsInterface {
    $response = $this->original->processAttachments($response);
    $attachments = $response->getAttachments();

    $this->dataCollector->setLibraries($attachments['library'] ?? []);
    $this->dataCollector->setPlaceholders($attachments['big_pipe_placeholders'] ?? []);

    return $response;
  }

}
