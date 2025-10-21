window.questions = [
  {
    question: "Which file registers a module in Magento 2?",
    options: [
      "etc/module.xml",
      "registration.php",
      "composer.json",
      "etc/di.xml"
    ],
    correct: 1,
    explanation: "A module is discovered via its root-level registration.php which calls \Magento\Framework\Component\ComponentRegistrar to register the module." 
  },
  {
    question: "What is the purpose of areas (frontend, adminhtml, crontab, webapi_rest) in Magento 2?",
    options: [
      "They define database connections",
      "They scope configuration, layout, DI, and routing to specific application contexts",
      "They select deployment mode",
      "They enable multi-website pricing"
    ],
    correct: 1,
    explanation: "Areas separate application concerns so configuration, routes, layouts, translations, and DI preferences can vary per context (e.g., frontend vs adminhtml)."
  },
  {
    question: "Which file must NOT be committed to VCS?",
    options: [
      "app/etc/config.php",
      "app/etc/env.php",
      "composer.json",
      "app/code/Vendor/Module/etc/module.xml"
    ],
    correct: 1,
    explanation: "env.php holds environment-specific sensitive credentials (DB, Redis, MQ) and must not be committed."
  },
  {
    question: "Preferred way to modify behavior of a public method without rewriting core classes?",
    options: [
      "Extend the core class and override the method",
      "Create a plugin (interceptor)",
      "Directly edit vendor code",
      "Use a class alias in composer.json"
    ],
    correct: 1,
    explanation: "Plugins (around/before/after) are the recommended mechanism over class rewrites to decorate behavior safely."
  },
  {
    question: "Which DI scope is used for objects that should exist for one HTTP request?",
    options: [
      "singleton",
      "prototype",
      "request",
      "session"
    ],
    correct: 2,
    explanation: "The \Magento\Framework\App\ObjectManager supports 'request' scope so instances are unique per HTTP request."
  },
  {
    question: "What is the correct command to enable a newly added module in production?",
    options: [
      "bin/magento setup:upgrade",
      "bin/magento module:enable Vendor_Module && bin/magento setup:upgrade",
      "bin/magento cache:flush",
      "bin/magento setup:di:compile"
    ],
    correct: 1,
    explanation: "Enable the module then run setup:upgrade to process schema/data patches and registration."
  },
  {
    question: "Where are layout XML files placed for the frontend area?",
    options: [
      "view/base/layout",
      "view/adminhtml/layout",
      "view/frontend/layout",
      "etc/frontend/layout"
    ],
    correct: 2,
    explanation: "Frontend layouts are placed under view/frontend/layout for modules and themes."
  },
  {
    question: "How do you add a new CLI command in Magento 2?",
    options: [
      "Add a route in etc/cli.xml",
      "Create a console command class implementing Symfony Command and declare in di.xml",
      "Add a script in bin/magento",
      "Patch composer autoload"
    ],
    correct: 1,
    explanation: "Create a class extending Symfony\Component\Console\Command\Command and register it via di.xml type \Magento\Framework\Console\CommandListInterface or virtual types."
  },
  {
    question: "Which file controls module version and setup patch discovery?",
    options: [
      "etc/di.xml",
      "composer.json",
      "etc/module.xml",
      "registration.php"
    ],
    correct: 2,
    explanation: "etc/module.xml includes <module name=... setup_version=...> in older versions; in patches, versioning is tracked but module.xml still declares the module."
  },
  {
    question: "Best way to add a JS component on a specific page in Magento 2?",
    options: [
      "Directly include in base template",
      "Define RequireJS config in requirejs-config.js and reference via layout XML block/template",
      "Place <script> in head.phtml",
      "Edit pub/index.php"
    ],
    correct: 1,
    explanation: "Use RequireJS mapping/config and include via layout/template to scope the component properly."
  },
  {
    question: "Which cache type stores compiled DI and interceptors?",
    options: [
      "config",
      "full_page",
      "block_html",
      "reflection"
    ],
    correct: 3,
    explanation: "The 'reflection' cache relates to generated code metadata; DI/interceptors are generated into var/ but metadata and reflection results are cached."
  },
  {
    question: "What file defines event observers for the frontend area?",
    options: [
      "etc/events.xml",
      "etc/frontend/events.xml",
      "view/frontend/events.xml",
      "etc/area/events.xml"
    ],
    correct: 1,
    explanation: "Area-specific observers go into etc/<area>/events.xml such as etc/frontend/events.xml."
  }
];
