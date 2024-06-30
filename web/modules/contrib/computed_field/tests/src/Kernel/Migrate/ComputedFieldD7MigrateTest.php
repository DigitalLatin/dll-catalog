<?php

namespace Drupal\Tests\computed_field\Kernel\Migrate;

use Drupal\field\Entity\FieldStorageConfig;
use Drupal\Tests\migrate_drupal\Kernel\d7\MigrateDrupal7TestBase;

/**
 * Tests computed field config, instance, widget and formatter migration.
 *
 * @group computed_field
 */
class ComputedFieldD7MigrateTest extends MigrateDrupal7TestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'comment',
    'datetime',
    'datetime_range',
    'image',
    'link',
    'menu_ui',
    'node',
    'taxonomy',
    'telephone',
    'text',
    'computed_field',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $fixture = __DIR__ . '/../../../fixtures/drupal7.php';
    $this->assertNotFalse(realpath($fixture));
    $this->loadFixture($fixture);

    $this->installEntitySchema('node');
    $this->installEntitySchema('comment');
    $this->installEntitySchema('taxonomy_term');
    $this->installConfig(static::$modules);

    $this->migrateFields();
  }

  /**
   * Asserts that computed fields were migrated.
   */
  public function testComputedFields(): void {
    // Asserts the field storage configuration.
    $field_computed_int = FieldStorageConfig::load('node.field_computed_int');
    $this->assertEquals('computed_integer', $field_computed_int->getType());

    $field_computed_string = FieldStorageConfig::load('node.field_computed_string');
    $this->assertEquals('computed_string', $field_computed_string->getType());

    // Asserts the field configuration on an entity bundle.
    $fieldDefinitions = $this->container
      ->get('entity_field.manager')
      ->getFieldDefinitions('node', 'article');

    $this->assertArrayHasKey('field_computed_int', $fieldDefinitions);
    $this->assertArrayHasKey('field_computed_string', $fieldDefinitions);
    $this->assertEquals('computed_integer', $fieldDefinitions['field_computed_int']->getType());
    $this->assertEquals('computed_string', $fieldDefinitions['field_computed_string']->getType());
  }

}
