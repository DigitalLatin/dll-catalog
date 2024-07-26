<?php

namespace Drupal\dll_json_ld\Service\Formatter;

use Drupal\node\NodeInterface;
use Drupal\dll_json_ld\Utility\JsonLdUtility;
use Drupal\path_alias\AliasManagerInterface;

class AuthorAuthoritiesFormatter {

    protected $aliasManager;

    public function __construct(AliasManagerInterface $alias_manager) {
        $this->aliasManager = $alias_manager;
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
    public function format(NodeInterface $node) {
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
            'LOCid' => 'madsrdf:idValue',
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
            '@id' => JsonLdUtility::getNodeAlias($node, $this->aliasManager),
            '@type' => 'Author Authority',
            'Name' => [
                'AuthorizedName' => $node->get('field_authorized_name')->value,
                'Variant' => [
                    'AlsoKnownAs' => JsonLdUtility::getMultiValueField($node, 'field_other_alternative_name_for'),
                    'EnglishName' => $node->get('field_author_name_english')->value,
                    'FrenchName' => JsonLdUtility::getLinkField($node, 'field_bnf_url', 'text'),
                    'GermanName' => JsonLdUtility::getLinkField($node, 'field_dnb_url', 'text'),
                    'ItalianName' => JsonLdUtility::getLinkField($node, 'field_iccu_url', 'text'),
                    'SpanishName' => JsonLdUtility::getLinkField($node, 'field_bne_url', 'text'),
                    'LatinName' => $node->get('field_author_name_latin')->value,
                    'NativeLanguageVariant' => $node->get('field_author_name_native_languag')->value,
                    'PerseusName' => $node->get('field_perseus_name')->value
                    ]
            ],
            'Abbreviation' => JsonLdUtility::getMultiValueField($node, 'field_author_name_abbreviations'), 
            'Date' => [
                'BirthDate' => $node->get('field_author_birth_date')->value,
                'DeathDate' => $node->get('field_author_death_date')->value,
                'Floruit' => $node->get('field_floruit_active')->value,
                'TimePeriod' => JsonLdUtility::getTaxonomyField($node, 'field_time_period')
            ],
            'identifier' => [
                'CTS' => $node->get('field_cts_urn')->value,
                'DLLid' => $node->get('field_dll_identifier')->value,
                'LOCid' => $node->get('field_loc_id')->value,
                'PHIid'=> $node->get('field_phi_number')->value,
                'STOAid' => $node->get('field_stoa_number')->value,
                'VIAFid' => $node->get('field_viaf_id')->value
            ],
            'ExactExternalAuthority' => [
                'BNE' => JsonLdUtility::getLinkField($node, 'field_bne_url', 'url'),
                'BNF' => JsonLdUtility::getLinkField($node, 'field_bnf_url', 'url'),
                'DNB' => JsonLdUtility::getLinkField($node, 'field_dnb_url', 'url'),
                'ICCU' => JsonLdUtility::getLinkField($node, 'field_iccu_url', 'url'),
                'ISNI' => JsonLdUtility::getLinkField($node, 'field_iccu_url', 'url'),
                'LCCN' => JsonLdUtility::getLinkField($node, 'field_locsource', 'url'),
                'LOC' => JsonLdUtility::getLinkField($node, 'field_lofc_uri', 'url'),
                'VIAF' => JsonLdUtility::getLinkField($node, 'field_viaf_source', 'url'),
                'Wikidata' => JsonLdUtility::getLinkField($node, 'field_wikidata_url', 'url'),
                'Wikipedia' => JsonLdUtility::getLinkField($node, 'field_wikipedia', 'url'),
                'Worldcat' => JsonLdUtility::getLinkField($node, 'field_worldcat_identity', 'url')
        ]
        ];
    }
}