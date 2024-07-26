<?php

namespace Drupal\dll_json_ld\Service;

use Drupal\path_alias\AliasManagerInterface;
use Drupal\node\NodeInterface;
use Drupal\Core\Url;
use Drupal\taxonomy\Entity\Term;

class JsonLdFormatter {

  protected $aliasManager;

  public function __construct(AliasManagerInterface $alias_manager) {
    $this->aliasManager = $alias_manager;
  }

  /**
   * Helper function to get the URL alias of a node.
   */
  public function getNodeAlias(NodeInterface $node) {
    $path = '/node/' . $node->id();
    $alias = $this->aliasManager->getAliasByPath($path);
    $url = Url::fromUri('internal:' . $alias, ['absolute' => TRUE])->toString();
    return $url;
  }

  /**
   * Helper function to get both the URL and text from a link field.
   */
  public function getLinkField(NodeInterface $node, $field_name, $part = 'both') {
      $field = $node->get($field_name);
      if ($field->isEmpty()) {
      return null;
      }

      $link = $field->first();
      switch ($part) {
      case 'url':
          return $link->uri;
      case 'text':
          return $link->title;
      case 'both':
      default:
          return [
          'url' => $link->uri,
          'text' => $link->title,
          ];
      }
  }

    /**
     * Helper function to get the value of a taxonomy field.
     */
    public function getTaxonomyField(NodeInterface $node, $field_name, $part = 'name') {
        $field = $node->get($field_name);
        if ($field->isEmpty()) {
        return null;
        }

        $term = Term::load($field->target_id);
        if ($term) {
        switch ($part) {
            case 'id':
            return $term->id();
            case 'name':
            default:
            return $term->getName();
        }
      }
        return null;
    }
   
   /**
   * Helper function to get the value(s) of an entity/entities referenced by a field.
   */
  public function getEntityReferenceField(NodeInterface $node, $field_name, $part = 'title') {
    $field = $node->get($field_name);
    if ($field->isEmpty()) {
      return null;
    }

    // Check if the field is multi-value
    if ($field->getFieldDefinition()->getFieldStorageDefinition()->isMultiple()) {
      $values = [];
      foreach ($field as $item) {
        $referenced_entity = $item->entity;
        if ($referenced_entity instanceof NodeInterface) {
          switch ($part) {
            case 'id':
              $values[] = $referenced_entity->id();
              break;
            case 'title':
            default:
              $values[] = $referenced_entity->getTitle();
              break;
          }
        }
      }
      return $values;
    } else {
      $referenced_entity = $field->entity;
      if ($referenced_entity instanceof NodeInterface) {
        switch ($part) {
          case 'id':
            return $referenced_entity->id();
          case 'title':
          default:
            return $referenced_entity->getTitle();
        }
      }
      return null;
    }
  }

    /**
   * Helper function to get the URL(s) of an entity referenced by a field.
   */
  public function getEntityReferenceUrl(NodeInterface $node, $field_name) {
    $field = $node->get($field_name);
    if ($field->isEmpty()) {
      return null;
    }

    $urls = [];
    foreach ($field as $item) {
      $referenced_entity = $item->entity;
      if ($referenced_entity instanceof NodeInterface) {
        $path = '/node/' . $referenced_entity->id();
        $alias = $this->aliasManager->getAliasByPath($path);
        $urls[] = Url::fromUri('internal:' . $alias, ['absolute' => TRUE])->toString();
      }
    }

    // Return a single URL if the field is single-value, otherwise return the array of URLs.
    return count($urls) === 1 ? $urls[0] : $urls;
  }

  /**
   * Helper function to get values of a multi-value text field.
   */
  public function getMultiValueField(NodeInterface $node, $field_name) {
    $field = $node->get($field_name);
    if ($field->isEmpty()) {
      return [];
    }

    $values = [];
    foreach ($field as $value) {
      $values[] = $value->value;
    }

    return $values;
  }
}