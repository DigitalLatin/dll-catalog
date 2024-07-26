<?php

namespace Drupal\dll_json_ld\Utility;

use Drupal\path_alias\AliasManagerInterface;
use Drupal\node\NodeInterface;
use Drupal\Core\Url;
use Drupal\taxonomy\Entity\Term;

class JsonLdUtility {
  public static function getNodeAlias(NodeInterface $node, AliasManagerInterface $aliasManager) {
    $path = '/node/' . $node->id();
    $alias = $aliasManager->getAliasByPath($path);
    $url = Url::fromUri('internal:' . $alias, ['absolute' => TRUE])->toString();
    return $url;
  }

  public static function getLinkField(NodeInterface $node, $field_name, $part = 'both') {
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

  public static function getTaxonomyField(NodeInterface $node, $field_name, $part = 'name') {
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

  public static function getEntityReferenceField(NodeInterface $node, $field_name, $part = 'title') {
    $field = $node->get($field_name);
    if ($field->isEmpty()) {
      return null;
    }

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

  public static function getEntityReferenceUrl(NodeInterface $node, $field_name, AliasManagerInterface $aliasManager) {
    $field = $node->get($field_name);
    if ($field->isEmpty()) {
      return null;
    }

    $urls = [];
    foreach ($field as $item) {
      $referenced_entity = $item->entity;
      if ($referenced_entity instanceof NodeInterface) {
        $path = '/node/' . $referenced_entity->id();
        $alias = $aliasManager->getAliasByPath($path);
        $urls[] = Url::fromUri('internal:' . $alias, ['absolute' => TRUE])->toString();
      }
    }

    return count($urls) === 1 ? $urls[0] : $urls;
  }

  public static function getMultiValueField(NodeInterface $node, $field_name) {
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
