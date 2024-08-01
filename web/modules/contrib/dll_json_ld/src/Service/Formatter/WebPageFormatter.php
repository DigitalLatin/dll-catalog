<?php

namespace Drupal\dll_json_ld\Service\Formatter;

use Drupal\node\NodeInterface;
use Drupal\dll_json_ld\Utility\JsonLdUtility;
use Drupal\path_alias\AliasManagerInterface;

class WebPageFormatter {

    protected $aliasManager;

    public function __construct(AliasManagerInterface $alias_manager) {
        $this->aliasManager = $alias_manager;
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
  public function format(NodeInterface $node) {
    //\Drupal::logger('dll_json_ld')->info('Formatting Web Page node: @nid', ['@nid' => $node->id()]);
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
      '@id' => JsonLdUtility::getNodeAlias($node, $this->aliasManager),
      'DLLid' => $node->get('field_dll_identifier')->value,
      '@type' => 'Web Page',
      'AccessDate' => $node->get('field_access_date')->value,
      'Title' => $node->get('field_record_title')->value,
      'Author' => JsonLdUtility::getMultiValueField($node, 'field_creator'),
      'References' => [
        'DLL Author' => JsonLdUtility::getEntityReferenceUrl($node, 'field_dll_creator', $this->aliasManager),
        'DLL Work' => JsonLdUtility::getEntityReferenceUrl($node, 'field_work_reference', $this->aliasManager)
      ],
      'Publisher' => $node->get('field_publisher')->value,
      'Repository' => $node->get('field_repository_source')->value,
      'Rights' => $node->get('field_rights')->value,
      'SourceEdition' => $node->get('field_source_edition')->value,
      'SourceURI' => JsonLdUtility::getLinkField($node, 'field_source_work', 'url')
    ];
  }
}