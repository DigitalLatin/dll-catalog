<?php

declare(strict_types=1);

namespace Drupal\webprofiler_config_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\webprofiler_config_entity\TestConfigInterface;

/**
 * Defines the testconfig entity type.
 *
 * @ConfigEntityType(
 *   id = "testconfig",
 *   label = @Translation("TestConfig"),
 *   label_collection = @Translation("TestConfigs"),
 *   label_singular = @Translation("testconfig"),
 *   label_plural = @Translation("testconfigs"),
 *   label_count = @PluralTranslation(
 *     singular = "@count testconfig",
 *     plural = "@count testconfigs",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\webprofiler_config_entity\TestConfigListBuilder",
 *     "storage" = "Drupal\webprofiler_config_entity\TestConfigStorage",
 *     "form" = {
 *       "add" = "Drupal\webprofiler_config_entity\Form\TestConfigForm",
 *       "edit" = "Drupal\webprofiler_config_entity\Form\TestConfigForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *   },
 *   config_prefix = "testconfig",
 *   admin_permission = "administer testconfig",
 *   links = {
 *     "collection" = "/admin/structure/testconfig",
 *     "add-form" = "/admin/structure/testconfig/add",
 *     "edit-form" = "/admin/structure/testconfig/{testconfig}",
 *     "delete-form" = "/admin/structure/testconfig/{testconfig}/delete",
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description",
 *   },
 * )
 */
final class TestConfig extends ConfigEntityBase implements TestConfigInterface {

  /**
   * The example ID.
   */
  protected string $id;

  /**
   * The example label.
   */
  protected string $label;

  /**
   * The example description.
   */
  protected string $description;

}
