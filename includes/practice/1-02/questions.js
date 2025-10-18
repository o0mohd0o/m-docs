window.questions = [
    {
        question: "Which files are MANDATORY for registering a Magento 2 module?",
        options: [
            "registration.php only",
            "composer.json only",
            "Both registration.php and etc/module.xml",
            "All three: registration.php, composer.json, and etc/module.xml"
        ],
        correct: 2,
        explanation: "Both registration.php and etc/module.xml are MANDATORY. registration.php registers the module with Magento and Composer, while etc/module.xml specifies the module name and dependencies. composer.json is recommended but not strictly required."
    },
    {
        question: "What is the correct format for a module name in Magento 2?",
        options: [
            "vendor-module",
            "Vendor\\Module",
            "Vendor_Module",
            "vendor/module"
        ],
        correct: 2,
        explanation: "Module names use the format Vendor_Module (e.g., Bonlineco_Blog). The PSR-4 namespace path uses backslashes: Vendor\\Module, but the module name itself uses underscore."
    },
    {
        question: "What does the <sequence> element in etc/module.xml define?",
        options: [
            "The order of method execution",
            "Module dependencies and load order",
            "Database table sequence",
            "Version history"
        ],
        correct: 1,
        explanation: "The <sequence> element defines module dependencies and controls load order. If a module is in the sequence, it cannot be disabled while the dependent module is enabled."
    },
    {
        question: "When should you use the --keep-generated flag with setup:upgrade?",
        options: [
            "Always, to speed up deployment",
            "Never, it causes issues",
            "Only when the module doesn't modify plugins or extension attributes",
            "Only in production mode"
        ],
        correct: 2,
        explanation: "Use --keep-generated to speed up development when your module doesn't modify generated code (plugins, extension attributes). If unsure, manually delete the generated/ directory to ensure changes take effect."
    },
    {
        question: "What must be specified in composer.json for a Magento 2 module?",
        options: [
            "type: magento2-module",
            "type: module",
            "type: magento-extension",
            "type: library"
        ],
        correct: 0,
        explanation: "The composer.json file must specify \"type\": \"magento2-module\" to identify it as a Magento module. It should also include PSR-4 autoload mapping."
    },
    {
        question: "What are the two parts of a module's identity?",
        options: [
            "Module name and version",
            "Module name and PSR-4 path",
            "Vendor name and description",
            "Registration path and namespace"
        ],
        correct: 1,
        explanation: "A module has two identity parts: Module Name (e.g., Bonlineco_Blog) used by Magento, and PSR-4 Path (e.g., Bonlineco\\Blog) used by Composer for autoloading."
    },
    {
        question: "When should you create a new module?",
        options: [
            "For any code change over 50 lines",
            "For significant features (>250 lines), customizing other modules, or creating themes",
            "Only when creating a new product feature",
            "Whenever you need to modify a core file"
        ],
        correct: 1,
        explanation: "Create a new module when: adding features with >250 lines of code, customizing functionality in different existing modules, creating supporting frameworks for themes, grouping customizations by area, or modifying third-party modules."
    },
    {
        question: "What command sequence is required to install a new module?",
        options: [
            "bin/magento setup:upgrade only",
            "bin/magento module:enable then bin/magento setup:upgrade",
            "composer install then bin/magento cache:flush",
            "bin/magento module:install ModuleName"
        ],
        correct: 1,
        explanation: "The two-step process is: 1) bin/magento module:enable Vendor_Module to enable the module, 2) bin/magento setup:upgrade to synchronize database schema and run setup scripts."
    }
];
