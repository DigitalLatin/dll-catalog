# DLL JSON-LD Formatter

This Drupal 10 custom module activates when the query string `?format=json-ld` is added to the end of the URL for nodes in any 
of the following four content types in the DLL Catalog's website:

- Author Authorities
- DLL Work
- Item Record (machine name: repository_item)
- Web Page

Instead of seeing the rendered HTML of the node, the user will see JSON-LD structured data.

This module was composed by Samuel J. Huskey.

## File and Directory Structure

```text
dll_json_ld/
├── src/
│   ├── Controller/
│   │   └── JsonLdController.php
│   ├── EventSubscriber/
│   │   └── JsonLdRequestSubscriber.php
│   ├── Routing/
│   │   └── RouteSubscriber.php
│   ├── Service/
│   │   └── JsonLdFormatter.php
├── composer.json
├── dll_json_ld.info.yml
├── dll_json_ld.module
├── dll_json_ld.routing.yml
├── dll_json_ld.services.yml
├── LICENSE
└── README.md
```
