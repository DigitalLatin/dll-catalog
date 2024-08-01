<?php

declare(strict_types=1);

namespace Drupal\tracer;

use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Core\Site\Settings;

/**
 * Factory service to create new Tracer objects.
 */
class TracerFactory {

  /**
   * The Tracer instance.
   *
   * @var \Drupal\tracer\TracerInterface|null
   */
  private ?TracerInterface $tracer = NULL;

  /**
   * Return the Tracer instance.
   *
   * @return \Drupal\tracer\TracerInterface
   *   The Tracer instance.
   */
  public function getTracer(): TracerInterface {
    if ($this->tracer != NULL) {
      return $this->tracer;
    }

    // @phpstan-ignore-next-line
    if (!\Drupal::hasService('plugin.manager.tracer')) {
      return new NoopTracer();
    }

    // @phpstan-ignore-next-line
    $tracer_plugin_manager = \Drupal::service('plugin.manager.tracer');
    $tracer_plugin = Settings::get('tracer_plugin', NULL);

    if ($tracer_plugin === NULL) {
      return new NoopTracer();
    }

    try {
      /** @var \Drupal\tracer\TracerInterface $tracer */
      $tracer = $tracer_plugin_manager->createInstance($tracer_plugin);
    }
    catch (PluginException $e) {
      $tracer = new NoopTracer();
    }

    $this->tracer = $tracer;

    return $tracer;
  }

  /**
   * Return a list of traced events.
   *
   * @return array
   *   A list of traced events.
   */
  public function getEvents(): array {
    if ($this->tracer == NULL) {
      $this->tracer = $this->getTracer();
    }

    return $this->tracer->getEvents();
  }

}
