<?php

namespace Drupal\dll_json_ld\Service;

use Drupal\node\NodeInterface;
use Drupal\taxonomy\Entity\Term;
use Drupal\node\Entity\Node;
use Drupal\path_alias\AliasManagerInterface; // Correct namespace
use Drupal\Core\Url;

/**
 * Service for formatting nodes as JSON-LD.
 */
class JsonLdFormatter {

  protected $aliasManager;

  public function __construct(AliasManagerInterface $alias_manager) {
    $this->aliasManager = $alias_manager;
  }

  // Other existing methods...

  /**
   * Helper function to get the value(s) of an entity/entities referenced by a field.
   */
  protected function getEntityReferenceField(NodeInterface $node, $field_name, $part = 'title') {
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
   * Helper function to get the URL(s) of an entity/entities referenced by a field.
   */
  protected function getEntityReferenceUrl(NodeInterface $node, $field_name) {
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

    return count($urls) === 1 ? $urls[0] : $urls;
  }

  /**
   * Helper function to get the value(s) of a multi-value field.
   */
  protected function getMultiValueField(NodeInterface $node, $field_name) {
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

  /**
   * Helper function to get the value of a taxonomy term field.
   */
  protected function getTaxonomyField(NodeInterface $node, $field_name, $part = 'name') {
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
   * Helper function to get the link field value.
   */
  protected function getLinkField(NodeInterface $node, $field_name, $part = 'both') {
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
   * Get the node alias.
   */
  protected function getNodeAlias(NodeInterface $node) {
    $path = '/node/' . $node->id();
    $alias = $this->aliasManager->getAliasByPath($path);
    $url = Url::fromUri('internal:' . $alias, ['absolute' => TRUE])->toString();
    return $url;
  }

  /**
   * Formats a DLL Item Record node as JSON-LD.
   *
   * @param \Drupal\node\NodeInterface $node
   *   The node entity.
   *
   * @return array
   *   The JSON-LD formatted data.
   */
  protected function formatDllItemRecord(NodeInterface $node) {
    return [
      '@context' => [
        '@base' => 'https://catalog.digitallatin.org',
        'Author' => 'dcterms:creator',
        'DLL Author' => 'dcterms:creator',
        'DLL Editor' => 'dcterms:contributor',
        'DLL Work' => 'frbr:exemplarOf',
        'DLLid' => 'dcterms:identifier',
        'Date' => 'dcterms:date',
        'Editor' => 'dcterms:contributor',
        'Format' => 'dcterms:format',
        'Place' => 'schema:City',
        'Publisher' => 'dcterms:publisher',
        'References' => [
          '@id' => 'dcterms:references',
          '@type' => '@id'
        ],
        'Repository' => 'schema:Library',
        'Rights' => 'dcterms:rights',
        'SourceURI' => 'dcterms:URI',
        'Title' => 'dcterms:title',
        'Type' => 'dcterms:type',
        'Coverage' => 'dcterms:coverage',
        'dcterms' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
        'frbr' => 'http://vocab.org/frbr/core#',
        'madsrdf' => 'http://www.loc.gov/mads/rdf/v1#',
        'rdf' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
        'schema' => 'http://schema.org/'
      ],
      '@id' => $this->getNodeAlias($node),
      'DLLid' => $node->get('field_dll_identifier')->value,
      '@type' => 'Item Record',
      'Author' => $this->getMultiValueField($node, 'field_creator'),
      'Title' => $this->getMultiValueField($node, 'field_record_title'),
      'References' => [
        'DLL Author' => $this->getEntityReferenceUrl($node, 'field_dll_creator'),
        'DLL Work' => $this->getEntityReferenceUrl($node, 'field_work_reference')
      ],
      'Editor' => $this->getEntityReferenceField($node, 'field_dll_contributor'),
      'Coverage' => $this->getEntityReferenceField($node, 'field_coverage'),
      'Format' => $node->get('field_format')->value,
      'Place' => $node->get('field_place_of_publication')->value,
      'Publisher' => $node->get('field_publisher')->value,
      'Repository' => $node->get('field_repository_source')->value,
      'Rights' => $node->get('field_rights')->value,
      'SourceURI' => $this->getLinkField($node, 'field_source_work', 'url'),
      'Type' => $this->getMultiValueField($node, 'field_type')
    ];
  }

  /**
   * Formats an Author Authorities node as JSON-LD.
   *
   * @param \Drupal\node\NodeInterface $node
   *   The node entity.
   *
   * @return array
   *   The JSON-LD formatted data.
   */
  protected function formatAuthorAuthorities(NodeInterface $node) {
    return [
      '@context' => [
        '@base' => 'https://catalog.digitallatin.org/',
        'Abbreviation' => 'madsrdf:hasAbbreviationVariant',
        'AlsoKnownAs' => 'madsrdf:variantLabel',
        'AuthorizedName' => 'madsrdf:authoritativeLabel',
        'BNE' => 'rdf:resource',
        'BNF' => 'rdf:resource',
        'BirthDate' => 'madsrdf:birthDate',
        'CTS' => 'madsrdf:idValue',
        'DLLid' => 'madsrdf:idValue',
        'DNB' => 'rdf:resource',
        'Date' => 'dcmi:date',
        'DeathDate' => 'madsrdf:deathDate',
        'EnglishName' => 'madsrdf:variantLabel',
        'ExactExternalAuthority' => [
          '@id' => 'madsrdf:hasExactExternalAuthority',
          '@type' => '@id'
        ],
        'Floruit' => 'madsrdf:temporal',
        'FrenchName' => 'madsrdf:variantLabel',
        'GermanName' => 'madsrdf:variantLabel',
        'ICCU' => 'rdf:resource',
        'ISNI' => 'rdf:resource',
        'ISNIName' => 'madsrdf:variantLabel',
        'Identifier' => [
          '@id' => 'madsrdf:Identifier',
          '@type' => '@id'
        ],
        'ItalianName' => 'madsrdf:variantLabel',
        'LCCN' => 'rdf:resource',
        'LOC' => 'rdf:resource',
        'LatinVariant' => 'madsrdf:variantLabel',
        'Name' => 'madsrdf:PersonalName',
        'NativeLanguageVariant' => 'madsrdf:variantLabel',
        'PHIid' => 'madsrdf:idValue',
        'PerseusName' => 'madsrdf:variantLabel',
        'STOAid' => 'madsrdf:idValue',
        'SpanishName' => 'madsrdf:variantLabel',
        'TimePeriod' => 'dcterms:coverage',
        'VIAF' => 'rdf:resource',
        'VIAFid' => 'madsrdf:idValue',
        'Variant' => 'madsrdf:hasVariant',
        'Wikidata' => 'rdf:resource',
        'WorldCat' => 'rdf:resource',
        'dcterms' => 'http://purl.org/dc/terms/',
        'madsrdf' => 'http://www.loc.gov/mads/rdf/v1#',
        'rdf' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#'
      ],
      '@id' => $this->getNodeAlias($node),
      '@type' => 'Author Authority',
      'Name' => [
        'AuthorizedName' => $node->get('field_authorized_name')->value,
        'Variant' => [
          'AlsoKnownAs' => $this->getMultiValueField($node, 'field_other_alternative_name_for'),
          'EnglishName' => $node->get('field_author_name_english')->value,
          'FrenchName' => $this->getLinkField($node, 'field_bnf_url', 'text'),
          'GermanName' => $this->getLinkField($node, 'field_dnb_url', 'text'),
          'ItalianName' => $this->getLinkField($node, 'field_iccu_url', 'text'),
          'SpanishName' => $this->getLinkField($node, 'field_bne_url', 'text'),
          'LatinName' => $node->get('field_author_name_latin')->value,
          'NativeLanguageVariant' => $node->get('field_author_name_native_languag')->value,
          'PerseusName' => $node->get('field_perseus_name')->value
        ]
      ],
      'Abbreviation' => $this->getMultiValueField($node, 'field_author_name_abbreviations'),
      'Date' => [
        'BirthDate' => $node->get('field_author_birth_date')->value,
        'DeathDate' => $node->get('field_author_death_date')->value,
        'Floruit' => $node->get('field_floruit_active')->value,
        'TimePeriod' => $this->getTaxonomyField($node, 'field_time_period')
      ],
      'identifier' => [
        'CTS' => $node->get('field_cts_urn')->value,
        'DLLid' => $node->get('field_dll_identifier')->value,
        'LOCid' => $node->get('field_loc_id')->value,
        'PHIid' => $node->get('field_phi_number')->value,
        'STOAid' => $node->get('field_stoa_number')->value,
        'VIAFid' => $node->get('field_viaf_id')->value
      ],
      'ExactExternalAuthority' => [
        'BNE' => $this->getLinkField($node, 'field_bne_url', 'url'),
        'BNF' => $this->getLinkField($node, 'field_bnf_url', 'url'),
        'DNB' => $this->getLinkField($node, 'field_dnb_url', 'url'),
        'ICCU' => $this->getLinkField($node, 'field_iccu_url', 'url'),
        'ISNI' => $this->getLinkField($node, 'field_iccu_url', 'url'),
        'LCCN' => $this->getLinkField($node, 'field_locsource', 'url'),
        'LOC' => $this->getLinkField($node, 'field_lofc_uri', 'url'),
        'VIAF' => $this->getLinkField($node, 'field_viaf_source', 'url'),
        'Wikidata' => $this->getLinkField($node, 'field_wikidata_url', 'url'),
        'Wikipedia' => $this->getLinkField($node, 'field_wikipedia', 'url'),
        'Worldcat' => $this->getLinkField($node, 'field_worldcat_identity', 'url')
      ]
    ];
  }

  /**
   * Formats a DLL Work node as JSON-LD.
   *
   * @param \Drupal\node\NodeInterface $node
   *   The node entity.
   *
   * @return array
   *   The JSON-LD formatted data.
   */
  protected function formatDllWork(NodeInterface $node) {
    return [
      '@context' => [
        '@base' => 'https://catalog.digitallatin.org/',
        'Abbreviation' => 'madsrdf:hasAbbreviationVariant',
        'Author' => 'dcterms:creator',
        'AuthorName' => [
          '@id' => 'madsrdf:PersonalName',
          '@type' => '@id'
        ],
        'AuthorizedName' => 'madsrdf:authoritativeLabel',
        'CTS-ID' => 'madsrdf:idValue',
        'CTS-URN' => 'madsrdf:idValue',
        'DLLid' => 'madsrdf:idValue',
        'Dubious' => 'madsrdf:hasChararacteristic',
        'DubiousAttribution' => [
          '@id' => 'dcterms:description',
          '@type' => '@id'
        ],
        'HasPart' => 'dcterms:hasPart',
        'Identifier' => [
          '@id' => 'madsrdf:Identifier',
          '@type' => '@id'
        ],
        'PHIid' => 'madsrdf:idValue',
        'PartOf' => 'dcterms:isPartOf',
        'References' => 'dcterms:references',
        'STOAid' => 'madsrdf:idValue',
        'Title' => 'madsrdf:Title',
        'Variant' => 'madsrdf:hasVariant',
        'VariantTitle' => 'madsrdf:variantLabel',
        'ShortTitle' => 'madsrdf:variantLabel',
        'WorkAuthority' => 'madsrdf:isMemberOfMADSCollection',
        'dcterms' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
        'madsrdf' => 'http://www.loc.gov/mads/rdf/v1#',
        'rdf' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#'
      ],
      '@id' => $this->getNodeAlias($node),
      '@type' => 'DLL Work',
      'Title' => $node->get('field_work_name')->value,
      'Variant' => [
        'VariantTitle' => $this->getMultiValueField($node, 'field_alternative_title'),
        'ShortTitle' => $node->get('field_short_title')->value
      ],
      'Abbreviation' => $node->get('field_work_abbreviated')->value,
      'Author' => $this->getEntityReferenceUrl($node, 'field_author'),
      'DubiousAttribution' => [
        'AttributedName' => $this->getMultiValueField($node, 'field_attributed_to'),
        'Dubious' => $this->getTaxonomyField($node, 'field_dubious_spurious_attributi')
      ],
      'HasPart' => $this->getMultiValueField($node, 'field_has_part'),
      'PartOf' => $this->getMultiValueField($node, 'field_part_of'),
      'Identifier' => [
        'CTS-URN' => $node->get('field_cts_urn')->value,
        'DLLid' => $node->get('field_dll_identifier')->value,
        'PHIid' => $node->get('field_phi_number')->value,
        'STOAid' => $node->get('field_stoa_number')->value
      ],
      'WorkAuthority' => $this->getTaxonomyField($node, 'field_work_authority')
    ];
  }

  /**
   * Formats a DLL Web Page node as JSON-LD.
   *
   * @param \Drupal\node\NodeInterface $node
   *   The node entity.
   *
   * @return array
   *   The JSON-LD formatted data.
   */
  protected function formatDllWebPage(NodeInterface $node) {
    return [
      '@context' => [
        '@base' => 'https://catalog.digitallatin.org',
        'AccessDate' => 'dcterms:date',
        'Author' => 'dcterms:creator',
        'DLL Author' => 'frbr:Creator',
        'DLL Work' => 'frbr:exemplarOf',
        'DLLid' => 'dcterms:identifier',
        'Publisher' => 'dcterms:publisher',
        'References' => [
          '@id' => 'dcterms:references',
          '@type' => '@id'
        ],
        'Repository' => 'schema:WebSite',
        'Rights' => 'dcterms:rights',
        'SourceEdition' => 'dcterms:source',
        'SourceURI' => 'dcterms:URI',
        'Title' => 'dcterms:title',
        'dcterms' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
        'frbr' => 'http://vocab.org/frbr/core#',
        'madsrdf' => 'http://www.loc.gov/mads/rdf/v1#',
        'rdf' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
        'schema' => 'http://schema.org/'
      ],
      '@id' => $this->getNodeAlias($node),
      'DLLid' => $node->get('field_dll_identifier')->value,
      '@type' => 'Web Page',
      'AccessDate' => $node->get('field_access_date')->value,
      'Title' => $node->get('field_record_title')->value,
      'Author' => $this->getMultiValueField($node, 'field_creator'),
      'References' => [
        'DLL Author' => $this->getEntityReferenceUrl($node, 'field_dll_creator'),
        'DLL Work' => $this->getEntityReferenceUrl($node, 'field_work_reference')
      ],
      'Publisher' => $node->get('field_publisher')->value,
      'Repository' => $node->get('field_repository_source')->value,
      'Rights' => $node->get('field_rights')->value,
      'SourceEdition' => $node->get('field_source_edition')->value,
      'SourceURI' => $this->getLinkField($node, 'field_source_work', 'url')
    ];
  }

  /**
   * Formats a node as JSON-LD based on its content type.
   *
   * @param \Drupal\node\NodeInterface $node
   *   The node entity.
   *
   * @return array
   *   The JSON-LD formatted data.
   */
  public function format(NodeInterface $node) {
    switch ($node->bundle()) {
      case 'repository_item':
        return $this->formatDllItemRecord($node);

      case 'author_authorities':
        return $this->formatAuthorAuthorities($node);

      case 'dll_work':
        return $this->formatDllWork($node);

      case 'web_page':
        return $this->formatDllWebPage($node);

      default:
        return [];
    }
  }
}
