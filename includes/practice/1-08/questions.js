window.questions = [
    {
        question: "What are the two translation mechanisms in Magento 2?",
        options: [
            "Static and dynamic translation",
            "Inline translation and dictionaries",
            "Frontend and backend translation",
            "XML and PHP translation"
        ],
        correct: 1,
        explanation: "Magento uses two mechanisms: inline translation (limited, on-site editing) and dictionaries (comprehensive CSV-based framework)."
    },
    {
        question: "Which function is used to mark translatable strings in PHTML files?",
        options: [
            "translate()",
            "trans()",
            "__()",
            "t()"
        ],
        correct: 2,
        explanation: "The __() function is used to wrap translatable strings in PHTML and PHP files. Example: <?= __('Hello World') ?>"
    },
    {
        question: "What syntax is used for translation in email templates?",
        options: [
            "{{trans \"text\"}}",
            "{{__('text')}}",
            "{{translate \"text\"}}",
            "{{% text %}}"
        ],
        correct: 0,
        explanation: "Email templates use {{trans \"text\"}} syntax. Example: {{trans \"Shopping Cart\"}} or {{trans \"%items shipping\" items=count}}"
    },
    {
        question: "What attribute marks strings as translatable in XML files?",
        options: [
            "translatable=\"true\"",
            "translate=\"true\"",
            "i18n=\"true\"",
            "localize=\"true\""
        ],
        correct: 1,
        explanation: "The translate=\"true\" or translate=\"label\" attribute marks content as translatable in XML files (layout, system config, etc.)."
    },
    {
        question: "What command collects translatable phrases from a module?",
        options: [
            "bin/magento translate:collect",
            "bin/magento i18n:collect-phrases",
            "bin/magento locale:collect",
            "bin/magento translation:scan"
        ],
        correct: 1,
        explanation: "bin/magento i18n:collect-phrases [path] collects all translatable phrases from the specified path (module, theme, or entire installation)."
    },
    {
        question: "What does the -m flag do in i18n:collect-phrases?",
        options: [
            "Collects only module translations",
            "Adds two columns: type and module",
            "Merges translations with existing files",
            "Minifies the output"
        ],
        correct: 1,
        explanation: "The -m flag adds two additional columns: 'type' (module or theme) and 'module' (which module uses this translation). Essential for language packs."
    },
    {
        question: "Where should theme translation dictionaries be placed?",
        options: [
            "app/code/Vendor/Module/translations/",
            "app/code/Vendor/Module/i18n/",
            "app/locale/",
            "var/translations/"
        ],
        correct: 1,
        explanation: "Theme/module translation dictionaries go in app/code/Vendor/Module/i18n/locale.csv (e.g., de_DE.csv, fr_FR.csv)."
    },
    {
        question: "What component type is used for language pack registration?",
        options: [
            "ComponentRegistrar::MODULE",
            "ComponentRegistrar::THEME",
            "ComponentRegistrar::LANGUAGE",
            "ComponentRegistrar::LOCALE"
        ],
        correct: 2,
        explanation: "Language packs use ComponentRegistrar::LANGUAGE type in registration.php, not MODULE or THEME."
    },
    {
        question: "What command creates a language pack from a translated CSV?",
        options: [
            "bin/magento language:pack",
            "bin/magento i18n:pack",
            "bin/magento translate:pack",
            "bin/magento locale:pack"
        ],
        correct: 1,
        explanation: "bin/magento i18n:pack /path/to/file.csv locale_code generates language pack files from a translated CSV."
    },
    {
        question: "Where are language packs stored?",
        options: [
            "app/code/",
            "app/locale/",
            "app/i18n/",
            "vendor/magento/"
        ],
        correct: 2,
        explanation: "Language packs are stored in app/i18n/Vendor/Language/ directory structure."
    },
    {
        question: "What file defines a language pack's configuration?",
        options: [
            "locale.xml",
            "language.xml",
            "translation.xml",
            "i18n.xml"
        ],
        correct: 1,
        explanation: "language.xml defines the language pack configuration, including code, vendor, package, and <use> inheritance."
    },
    {
        question: "What does the <use> tag in language.xml do?",
        options: [
            "Specifies which modules to translate",
            "Enables the language pack",
            "Defines fallback language packages for inheritance",
            "Lists required dependencies"
        ],
        correct: 2,
        explanation: "The <use> tag defines fallback packages. If a translation isn't found, Magento searches through <use> packages recursively."
    },
    {
        question: "Where are database translations stored?",
        options: [
            "core_translate table",
            "translation table",
            "locale_translation table",
            "store_translation table"
        ],
        correct: 1,
        explanation: "Database translations are stored in the 'translation' table (the table was called core_translate in Magento 1)."
    },
    {
        question: "How do you enable inline translation?",
        options: [
            "System → Tools → Inline Translation",
            "Stores → Configuration → Advanced → Developer → Translate Inline",
            "Content → Design → Translation",
            "It's enabled by default"
        ],
        correct: 1,
        explanation: "Enable at Stores → Configuration → Advanced → Developer → Translate Inline. Set 'Enabled for Storefront' to Yes."
    },
    {
        question: "Which caches should be disabled when using inline translation?",
        options: [
            "config, layout, block_html",
            "translate, block_html, full_page",
            "eav, customer, catalog",
            "All caches"
        ],
        correct: 1,
        explanation: "Disable translate, block_html, and full_page caches for the best inline translation experience."
    },
    {
        question: "What is the translation priority order (lowest to highest)?",
        options: [
            "Theme → Module → Language Pack → Database",
            "Module → Theme → Language Pack → Database",
            "Database → Language Pack → Theme → Module",
            "Language Pack → Theme → Module → Database"
        ],
        correct: 1,
        explanation: "Priority order: Module → Theme → Language Pack → Database (highest). Database translations override all others."
    },
    {
        question: "What is the main advantage of CSV file translations?",
        options: [
            "Faster performance",
            "Easily replicated to other instances and version controlled",
            "Easier to edit",
            "Higher priority"
        ],
        correct: 1,
        explanation: "CSV files are easily replicated across instances, can be in version control (Git), and are portable. Perfect for systematic translations."
    },
    {
        question: "What is the main advantage of database translations?",
        options: [
            "Better performance",
            "Version controlled",
            "Easiest to implement and highest priority (overrides all)",
            "Portable across installations"
        ],
        correct: 2,
        explanation: "Database translations are easiest to implement (via inline translation) and have the highest priority, overriding all file-based translations."
    },
    {
        question: "How are placeholders used in translations?",
        options: [
            "%s, %d for different types",
            "%1, %2, %3 for sequential parameters",
            "${var} for variable substitution",
            "{0}, {1}, {2} for parameters"
        ],
        correct: 1,
        explanation: "Magento uses %1, %2, %3, etc. as placeholders. Example: __('Welcome, %1', $name) or {{trans \"%1 items\" items=count}}"
    },
    {
        question: "Why use placeholders instead of concatenation?",
        options: [
            "Better performance",
            "Allows translators to see complete sentences with context and reorder words",
            "Required by Magento",
            "Easier to code"
        ],
        correct: 1,
        explanation: "Placeholders allow translation of holistic phrases with context. Different languages can have different word orders. Better for translators than fragments."
    },
    {
        question: "What happens if a translation is not found at any level?",
        options: [
            "Error is thrown",
            "Empty string is returned",
            "Original untranslated text is returned",
            "Default fallback is used"
        ],
        correct: 2,
        explanation: "If no translation is found after checking all sources (module → theme → language pack → database), the original untranslated text is returned."
    },
    {
        question: "When should you use database translations vs CSV files?",
        options: [
            "Always use database for better performance",
            "Always use CSV for best practices",
            "Use CSV for complete translations; database for quick overrides",
            "Use database for modules; CSV for themes"
        ],
        correct: 2,
        explanation: "Use CSV files for complete, professional translations that need version control. Use database for quick fixes, store-specific customizations, or overriding specific translations."
    }
];
