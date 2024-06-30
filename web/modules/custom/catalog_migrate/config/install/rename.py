#!/usr/bin/env python
# coding: utf-8

import os
[os.rename(f, f.replace('migrate_plus.migration.upgrade', 'migrate_plus.migration.catalog_migrate_upgrade')) for f in os.listdir('.') if not f.startswith('.')]
