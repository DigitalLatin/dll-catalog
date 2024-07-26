<?php

namespace Drupal\dll_json_ld\Service\Formatter;

use Drupal\node\NodeInterface;
use Drupal\dll_json_ld\Utility\JsonLdUtility;
use Drupal\path_alias\AliasManagerInterface;

class DllWorkFormatter {

    protected $aliasManager;

    public function __construct(AliasManagerInterface $alias_manager) {
        $this->aliasManager = $alias_manager;
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
  public function format(NodeInterface $node) {
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
    '@id' => JsonLdUtility::getNodeAlias($node, $this->aliasManager),
    '@type' => 'DLL Work',
    'Title' => $node->get('field_work_name')->value,
    'Variant' => [
        'VariantTitle' => JsonLdUtility::getMultiValueField($node, 'field_alternative_title'),
        'ShortTitle' => $node->get('field_short_title')->value
    ],
    'Abbreviation' => $node->get('field_work_abbreviated')->value,
    'Author' => JsonLdUtility::getEntityReferenceUrl($node, 'field_author', $this->aliasManager), 
    'DubiousAttribution' => [
        'AttributedName' => JsonLdUtility::getMultiValueField($node, 'field_attributed_to'),
        'Dubious' => JsonLdUtility::getTaxonomyField($node, 'field_dubious_spurious_attributi')
    ],
    'HasPart' => JsonLdUtility::getMultiValueField($node, 'field_has_part'),
    'PartOf' => JsonLdUtility::getMultiValueField($node, 'field_part_of'),
    'Identifier' => [
        'CTS-URN' => $node->get('field_cts_urn')->value,
        'DLLid' => $node->get('field_dll_identifier')->value,
        'PHIid' => $node->get('field_phi_number')->value,
        'STOAid' => $node->get('field_stoa_number')->value
    ],
    'WorkAuthority' => JsonLdUtility::getTaxonomyField($node, 'field_work_authority')
    ];
  }
}