# Topics Organization

This folder contains modular content files for certification topics that are split into multiple parts.

## Structure

Each topic gets its own folder:
- `includes/topics/1-08/` - Topic 1.08 Localization
  - `part-a.php` - Translation Mechanisms
  - `part-b.php` - Language Packs & i18n
  - `part-c.php` - Database Translations & Priority

## Usage

Main page (`cert-topic-1-08.php`) uses PHP `require()` to include parts:

```php
<?php require 'includes/topics/1-08/part-a.php'; ?>
<div class="part-divider"></div>
<?php require 'includes/topics/1-08/part-b.php'; ?>
<div class="part-divider"></div>
<?php require 'includes/topics/1-08/part-c.php'; ?>
```

## Benefits

- ✅ Single URL for complete topic
- ✅ Modular content - easy to edit individual parts
- ✅ Clean organization - each topic in its own folder
- ✅ Reusable structure for other large topics

## Future Topics

This same structure can be used for any topic that needs to be split:
- `includes/topics/1-09/`
- `includes/topics/3-04/`
- etc.
