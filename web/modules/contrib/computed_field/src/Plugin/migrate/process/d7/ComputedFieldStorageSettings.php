<?php

namespace Drupal\computed_field\Plugin\migrate\process\d7;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * @MigrateProcessPlugin(
 *   id = "d7_computed_field_storage_settings"
 * )
 */
class ComputedFieldStorageSettings extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $serialized = $row->getSourceProperty('data');
    $data = unserialize($serialized);
    if (isset($data['database']['data_type'])) {
      $data_type = $data['database']['data_type'];
      if ($data_type === 'int' || $data_type === 'float' || $data_type === 'numeric') {
        $value['size'] = $data['database']['data_size'];
      }
      if ($data_type === 'numeric') {
        $value['precision'] = $data['database']['data_precision'];
        $value['scale'] = $data['database']['data_scale'];
      }
      if ($data_type === 'varchar' || $data_type === 'text' || $data_type === 'longtext') {
        $value['max_length'] = $data['database']['data_length'];
      }
    }

    return $value;
  }

}
