<?php

namespace Drupal\serial\Plugin\migrate\field;

use Drupal\migrate\Plugin\MigrationInterface;
use Drupal\migrate_drupal\Plugin\migrate\field\FieldPluginBase;

/**
 * @MigrateField(
 *   id = "serial",
 *   core = {6,7},
 *   type_map = {
 *     "serial" = "serial"
 *   },
 *   source_module = "serial",
 *   destination_module = "serial"
 * )
 */
class Serial extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function getFieldWidgetMap() {
    return [
      'serial_default_widget' => 'serial_default_widget',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldFormatterMap() {
    return [
      'serial_default' => 'serial_default',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function defineValueProcessPipeline(MigrationInterface $migration, $field_name, $data) {
    $process = [
      'plugin' => 'sub_process',
      'source' => $field_name,
      'process' => [
        'value' => 'value',
      ],
    ];
    $migration->setProcessOfProperty($field_name, $process);
  }

}
