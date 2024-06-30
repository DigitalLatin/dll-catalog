<?php
// @codingStandardsIgnoreFile
/**
 * @file
 * A database agnostic dump for testing purposes.
 */

use Drupal\Core\Database\Database;

$connection = Database::getConnection();

$connection->insert('field_config')
  ->fields([
    'id',
    'field_name',
    'type',
    'module',
    'active',
    'storage_type',
    'storage_module',
    'storage_active',
    'locked',
    'data',
    'cardinality',
    'translatable',
    'deleted',
  ])
  ->values([
    'id' => '200',
    'field_name' => 'field_computed_int',
    'type' => 'computed',
    'module' => 'computed_field',
    'active' => '1',
    'storage_type' => 'field_sql_storage',
    'storage_module' => 'field_sql_storage',
    'storage_active' => '1',
    'locked' => '0',
    'data' => 'a:5:{s:4:"code";s:1:"0";s:14:"display_format";s:0:"";s:5:"store";i:1;s:11:"recalculate";b:0;s:8:"database";a:8:{s:9:"data_type";s:3:"int";s:11:"data_length";i:32;s:9:"data_size";s:6:"normal";s:14:"data_precision";i:10;s:10:"data_scale";i:2;s:13:"data_not_NULL";b:0;s:12:"data_default";N;s:10:"data_index";b:0;}}',
    'cardinality' => '1',
    'translatable' => '0',
    'deleted' => '0',
  ])
  ->values([
    'id' => '201',
    'field_name' => 'field_computed_string',
    'type' => 'computed',
    'module' => 'computed_field',
    'active' => '1',
    'storage_type' => 'field_sql_storage',
    'storage_module' => 'field_sql_storage',
    'storage_active' => '1',
    'locked' => '0',
    'data' => 'a:5:{s:4:"code";s:1:"0";s:14:"display_format";s:0:"";s:5:"store";i:1;s:11:"recalculate";b:0;s:8:"database";a:8:{s:9:"data_type";s:7:"varchar";s:11:"data_length";i:255;s:9:"data_size";s:6:"normal";s:14:"data_precision";i:10;s:10:"data_scale";i:2;s:13:"data_not_NULL";b:0;s:12:"data_default";N;s:10:"data_index";b:0;}}',
    'cardinality' => '1',
    'translatable' => '0',
    'deleted' => '0',
   ])
  ->execute();

$connection->insert('field_config_instance')
  ->fields([
    'id',
    'field_id',
    'field_name',
    'entity_type',
    'bundle',
    'data',
    'deleted',
  ])
  ->values([
    'id' => '200',
    'field_id' => '200',
    'field_name' => 'field_computed_int',
    'entity_type' => 'node',
    'bundle' => 'article',
    'data' => 'a:9:{s:13:"default_value";i:0;s:11:"description";s:0:"";s:5:"label";s:16:"Computed integer";s:7:"display";a:1:{s:7:"default";a:5:{s:5:"label";s:5:"above";s:8:"settings";a:0:{}s:6:"module";s:14:"computed_field";s:4:"type";s:24:"computed_field_sanitized";s:6:"weight";i:10;}}s:8:"required";i:0;s:8:"settings";a:0:{}s:6:"weight";i:10;s:6:"widget";a:5:{s:6:"active";i:0;s:6:"module";s:14:"computed_field";s:8:"settings";a:2:{s:13:"default_value";s:0:"";s:17:"default_value_php";s:0:"";}s:4:"type";s:8:"computed";s:6:"weight";i:10;}s:11:"widget_type";s:8:"computed";}',
    'deleted' => '0',
  ])
  ->values([
    'id' => '201',
    'field_id' => '201',
    'field_name' => 'field_computed_string',
    'entity_type' => 'node',
    'bundle' => 'article',
    'data' => 'a:9:{s:13:"default_value";i:0;s:11:"description";s:0:"";s:5:"label";s:15:"Computed string";s:7:"display";a:1:{s:7:"default";a:5:{s:5:"label";s:5:"above";s:8:"settings";a:0:{}s:6:"module";s:14:"computed_field";s:4:"type";s:24:"computed_field_sanitized";s:6:"weight";i:10;}}s:8:"required";i:0;s:8:"settings";a:0:{}s:6:"weight";i:10;s:6:"widget";a:5:{s:6:"active";i:0;s:6:"module";s:14:"computed_field";s:8:"settings";a:2:{s:13:"default_value";s:0:"";s:17:"default_value_php";s:0:"";}s:4:"type";s:8:"computed";s:6:"weight";i:10;}s:11:"widget_type";s:8:"computed";}',
    'deleted' => '0',
  ])
  ->execute();

$connection->schema()->createTable('field_data_field_computed_int', [
  'fields' => [
    'entity_type' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 128, 'default' => ''],
    'bundle' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 128, 'default' => ''],
    'deleted' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'default' => '0'],
    'entity_id' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'language' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 32, 'default' => ''],
    'delta' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'field_computed_int_value' => ['type' => 'int', 'not null' => FALSE, 'size' => 'normal'],
  ],
  'primary key' => [
    'entity_type',
    'deleted',
    'entity_id',
    'language',
    'delta',
  ],
]);

$connection->schema()->createTable('field_data_field_computed_string', [
  'fields' => [
    'entity_type' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 128, 'default' => ''],
    'bundle' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 128, 'default' => ''],
    'deleted' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'default' => '0'],
    'entity_id' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'language' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 32, 'default' => ''],
    'delta' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'field_computed_string_value' => ['type' => 'varchar', 'not null' => FALSE, 'length' => 255],
  ],
  'primary key' => [
    'entity_type',
    'deleted',
    'entity_id',
    'language',
    'delta',
  ],
]);

$connection->schema()->createTable('field_revision_field_computed_int', [
  'fields' => [
    'entity_type' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 128, 'default' => ''],
    'bundle' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 128, 'default' => ''],
    'deleted' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'default' => '0'],
    'entity_id' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'revision_id' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'language' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 32, 'default' => ''],
    'delta' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'field_computed_int_value' => ['type' => 'int', 'not null' => FALSE, 'size' => 'normal'],
  ],
  'primary key' => [
    'entity_type',
    'deleted',
    'entity_id',
    'revision_id',
    'language',
    'delta',
  ],
]);

$connection->schema()->createTable('field_revision_field_computed_string', [
  'fields' => [
    'entity_type' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 128, 'default' => ''],
    'bundle' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 128, 'default' => ''],
    'deleted' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'default' => '0'],
    'entity_id' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'revision_id' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'language' => ['type' => 'varchar', 'not null' => TRUE, 'length' => 32, 'default' => ''],
    'delta' => ['type' => 'int', 'not null' => TRUE, 'size' => 'normal', 'unsigned' => TRUE],
    'field_computed_string_value' => ['type' => 'varchar', 'not null' => FALSE, 'length' => 255],
  ],
  'primary key' => [
    'entity_type',
    'deleted',
    'entity_id',
    'revision_id',
    'language',
    'delta',
  ],
]);

$connection->insert('system')
  ->fields([
    'filename',
    'name',
    'type',
    'owner',
    'status',
    'bootstrap',
    'schema_version',
    'weight',
    'info',
  ])
  ->values([
    'filename' => 'sites/all/modules/computed_field/computed_field.module',
    'name' => 'computed_field',
    'type' => 'module',
    'owner' => '',
    'status' => '1',
    'bootstrap' => '0',
    'schema_version' => '0',
    'weight' => '0',
    'info' => 'a:5:{s:4:"name";s:14:"Computed Field";s:11:"description";s:70:"Defines a field type that allows values to be "computed" via PHP code.";s:7:"package";s:6:"Fields";s:4:"core";s:3:"7.x";s:12:"dependencies";a:1:{i:0;s:5:"field";}}',
  ])
  ->execute();
