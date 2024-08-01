<?php

namespace Drupal\dll_json_ld\Service\Formatter;

use Drupal\node\NodeInterface;
use Drupal\dll_json_ld\Utility\JsonLdUtility;
use Drupal\path_alias\AliasManagerInterface;

class ItemRecordFormatter {

    protected $aliasManager;

    public function __construct(AliasManagerInterface $alias_manager) {
        $this->aliasManager = $alias_manager;
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
  public function format(NodeInterface $node) {
    //\Drupal::logger('dll_json_ld')->info('Formatting Item Record node: @nid', ['@nid' => $node->id()]);
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
    '@id' => JsonLdUtility::getNodeAlias($node, $this->aliasManager),
    'DLLid' => $node->get('field_dll_identifier')->value,  
    '@type' => 'Item Record',
    'Author' => JsonLdUtility::getMultiValueField($node, 'field_creator'),
    'Title' => JsonLdUtility::getMultiValueField($node, 'field_record_title'),
    'References' => [
        'DLL Author' => JsonLdUtility::getEntityReferenceUrl($node, 'field_dll_creator', $this->aliasManager),
        'DLL Work' => JsonLdUtility::getEntityReferenceUrl($node, 'field_work_reference', $this->aliasManager)
    ],
    'Editor' => JsonLdUtility::getEntityReferenceField($node, 'field_dll_contributor'),
    'Coverage' => JsonLdUtility::getEntityReferenceField($node, 'field_coverage'),
    'Format' => $node->get('field_format')->value,
    'Place' => $node->get('field_place_of_publication')->value,
    'Publisher' => $node->get('field_publisher')->value,
    'Repository' => $node->get('field_repository_source')->value,
    'Rights' => $node->get('field_rights')->value,
    'SourceURI' => JsonLdUtility::getLinkField($node, 'field_source_work', 'url'),
    'Type' => JsonLdUtility::getMultiValueField($node, 'field_type')
    ];
  }
}