window.questions = [
    {
        question: "Which configuration file should NOT be committed to version control?",
        options: [
            "app/etc/config.php",
            "app/etc/env.php",
            "composer.json",
            "registration.php"
        ],
        correct: 1,
        explanation: "app/etc/env.php contains sensitive environment-specific configuration (database credentials, Redis, AMQP) and should NOT be committed to Git. The config.php file should be committed."
    },
    {
        question: "Where should third-party modules be installed in Magento 2?",
        options: [
            "app/code/ directory",
            "vendor/ directory via Composer",
            "lib/ directory",
            "generated/ directory"
        ],
        correct: 1,
        explanation: "Third-party modules should be installed via Composer into the vendor/ directory. This allows automatic dependency updates and proper version management."
    },
    {
        question: "What is the recommended HTTP document root for a Magento 2 installation?",
        options: [
            "The Magento root directory",
            "app/ directory",
            "pub/ directory",
            "var/ directory"
        ],
        correct: 2,
        explanation: "The pub/ directory should be the HTTP document root for security reasons. This prevents exposing sensitive folders like var/ due to misconfiguration."
    },
    {
        question: "Which directory contains auto-generated files like Factory classes, Interceptors, and Proxies?",
        options: [
            "var/",
            "generated/",
            "pub/static/",
            "vendor/"
        ],
        correct: 1,
        explanation: "The generated/ directory stores auto-generated code including factory classes, interceptor classes (for plugins), proxy classes (for lazy-loading), and extension attribute interfaces/classes."
    },
    {
        question: "What is stored in the var/ directory?",
        options: [
            "Permanent configuration files",
            "Third-party modules",
            "Temporary files that can be deleted anytime",
            "Core Magento libraries"
        ],
        correct: 2,
        explanation: "The var/ directory stores temporary files (logs, cache, reports) that can be deleted at any time. Never store important information here. Note that file-system caches prevent horizontal scaling."
    },
    {
        question: "Which file contains database credentials and should be environment-specific?",
        options: [
            "app/etc/config.php",
            "app/etc/env.php",
            "app/etc/di.xml",
            "composer.json"
        ],
        correct: 1,
        explanation: "app/etc/env.php contains database credentials, cache backend configuration, session storage, and other environment-specific settings."
    },
    {
        question: "Where are custom modules typically located in Magento 2?",
        options: [
            "vendor/",
            "lib/",
            "app/code/",
            "generated/"
        ],
        correct: 2,
        explanation: "Custom modules are typically placed in app/code/VendorName/ModuleName directory. Third-party modules should use vendor/ via Composer."
    },
    {
        question: "What directory stores compiled CSS and JavaScript in production mode?",
        options: [
            "pub/media/",
            "pub/static/",
            "var/view_preprocessed/",
            "generated/"
        ],
        correct: 1,
        explanation: "pub/static/ stores deployed static files including compiled CSS, JavaScript, and images. In developer mode, it contains symlinks; in production, it contains deployed files."
    }
];
