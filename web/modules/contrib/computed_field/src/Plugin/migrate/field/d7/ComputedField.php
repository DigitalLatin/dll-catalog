<?php

namespace Drupal\computed_field\Plugin\migrate\field\d7;

use Drupal\migrate\Plugin\MigrationInterface;
use Drupal\migrate\Row;
use Drupal\migrate_drupal\Plugin\migrate\field\FieldPluginBase;

/**
 * Migrates one-to-many computed fields.
 *
 * The type_map seems to be required in order for this plugin's methods to be
 * executed.
 *
 * @MigrateField(
 *   id = "d7_computed_field",
 *   core = {7},
 *   type_map = { "computed" = "computed_string" },
 *   source_module = "computed_field",
 *   destination_module = "computed_field"
 * )
 */
class ComputedField extends FieldPluginBase {

  /**
   * Field type map from drupal 7 to drupal 8.
   *
   * @var string[]
   */
  protected $fieldTypeMap = [
    'int' => 'computed_integer',
    'float' => 'computed_float',
    'numeric' => 'computed_decimal',
    'varchar' => 'computed_string',
    'text' => 'computed_string_long',
    'longtext' => 'computed_string_long',
  ];

  /**
   * {@inheritdoc}
   */
  public function alterFieldMigration(MigrationInterface $migration) {
    parent::alterFieldMigration($migration);
    $process = [
      $this->pluginId => [
        'plugin' => 'd7_computed_field_storage_settings',
      ],
    ];

    $process[0]['map'][$this->pluginId][$this->pluginId] = $this->pluginId;
    $migration->mergeProcessOfProperty('settings', $process);
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldFormatterType(Row $row): string {
    $field_type = $row->getSourceProperty('field_type_exists');
    if ($field_type === 'computed_string' || $field_type === 'computed_string_long') {
      return 'computed_string';
    }
    if ($field_type === 'computed_integer') {
      return 'computed_integer';
    }
    return 'computed_decimal';
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldWidgetType(Row $row): string {
    $field_type = $row->getSourceProperty('field_type_exists');
    if ($field_type === 'computed_string' || $field_type === 'computed_string_long') {
      return 'computed_string_widget';
    }
    return 'computed_number_widget';
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldType(Row $row): string {
    $settings = $row->getSourceProperty('data');
    $data = unserialize($settings);
    if (isset($data['database']['data_type'])) {
      $data_type = $data['database']['data_type'];
      if (isset($this->fieldTypeMap[$data_type])) {
        return $this->fieldTypeMap[$data_type];
      }
    }

    return 'computed_string';
  }

}
