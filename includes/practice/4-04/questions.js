window.questions = [
  {
    question: "Where are local themes stored by default?",
    options: [
      "vendor/",
      "app/design",
      "app/code",
      "pub/static"
    ],
    correct: 1,
    explanation: "Local themes are stored in app/design."
  },
  {
    question: "Where are Composer-installed themes usually stored?",
    options: [
      "Anywhere on the filesystem",
      "vendor/ by default",
      "pub/static",
      "app/design"
    ],
    correct: 1,
    explanation: "Composer themes can live anywhere, but the default install path is vendor/."
  },
  {
    question: "Which files are required for a theme?",
    options: [
      "theme.xml and registration.php",
      "composer.json and registration.php",
      "theme.xml only",
      "registration.php only"
    ],
    correct: 0,
    explanation: "A theme must have theme.xml and registration.php. Composer-based themes also include composer.json."
  },
  {
    question: "How does a Composer-based theme register itself with Magento?",
    options: [
      "Via di.xml",
      "Via composer.json autoload.files executing registration.php",
      "Via module.xml",
      "Via routes.xml"
    ],
    correct: 1,
    explanation: "Composer executes files in autoload.files; registration.php calls ComponentRegistrar to register the theme."
  },
  {
    question: "What is the format of the theme component name when registering?",
    options: [
      "Package/Theme/Area",
      "Area/Package/Theme (e.g., frontend/Magento/luma)",
      "Theme/Package/Area",
      "Area/Theme/Package"
    ],
    correct: 1,
    explanation: "The format is area/package/theme, e.g., frontend/Magento/luma."
  },
  {
    question: "Which file typically lives in the etc/ directory of a theme?",
    options: [
      "theme.xml",
      "view.xml",
      "registration.php",
      "env.php"
    ],
    correct: 1,
    explanation: "etc/view.xml contains theme configuration values."
  },
  {
    question: "Where are theme translations stored?",
    options: [
      "i18n/*.csv",
      "etc/view.xml",
      "web/translations.json",
      "composer.json"
    ],
    correct: 0,
    explanation: "Theme translations live under i18n/ as CSV files (e.g., en_US.csv)."
  },
  {
    question: "Where is the preview image for a theme usually located?",
    options: [
      "media/preview.jpg",
      "web/images/preview.jpg",
      "etc/preview.jpg",
      "i18n/preview.jpg"
    ],
    correct: 0,
    explanation: "The preview image typically lives at media/preview.jpg."
  },
  {
    question: "Which directory contains public web assets compiled to pub/static?",
    options: [
      "web/",
      "assets/",
      "public/",
      "static/"
    ],
    correct: 0,
    explanation: "web/ contains assets that end up in pub/static after deployment."
  },
  {
    question: "What is the purpose of css/source in a theme?",
    options: [
      "Compiled CSS files",
      "LESS sources (mixins, theme.less for variable overrides)",
      "Images for CSS",
      "JS for CSS"
    ],
    correct: 1,
    explanation: "css/source contains LESS sources and theme.less to override default variables."
  },
  {
    question: "Where do theme images that do not change frequently belong?",
    options: [
      "web/images/",
      "pub/media/",
      "var/view_preprocessed/",
      "app/etc/"
    ],
    correct: 0,
    explanation: "Place static theme images in web/images/."
  },
  {
    question: "Which statement about LESS compilation flow is correct?",
    options: [
      "LESS → pub/static → var/view_preprocessed",
      "LESS → var/view_preprocessed → pub/static",
      "LESS → app/design → pub/static",
      "LESS → vendor → pub/static"
    ],
    correct: 1,
    explanation: "LESS is preprocessed to var/view_preprocessed, compiled, then deployed to pub/static."
  },
  {
    question: "Where should theme-specific JS live?",
    options: [
      "web/js/",
      "etc/js/",
      "i18n/js/",
      "media/js/"
    ],
    correct: 0,
    explanation: "Theme-specific JavaScript belongs in web/js/."
  },
  {
    question: "What is the recommended approach for checkout-related customizations?",
    options: [
      "Place under theme web/ root",
      "Place under Magento_Checkout/web in the theme",
      "Place in pub/static",
      "Place in Magento_Catalog/web"
    ],
    correct: 1,
    explanation: "Magento recommends placing functionality-specific customizations under the module path in the theme."
  },
  {
    question: "How do you override a module template from a theme?",
    options: [
      "Edit vendor files",
      "Mirror the module path under app/design/.../Vendor_Module/templates/...",
      "Change di.xml",
      "Use JS mixins"
    ],
    correct: 1,
    explanation: "Mirroring the module path allows theme overrides via fallback."
  },
  {
    question: "Which files are commonly found at the theme root?",
    options: [
      "theme.xml, registration.php, composer.json (for Composer)",
      "module.xml, di.xml, routes.xml",
      "index.php, .htaccess",
      "env.php, config.php"
    ],
    correct: 0,
    explanation: "Theme root typically includes theme.xml, registration.php, and optionally composer.json."
  },
  {
    question: "Which file sets the theme title and parent?",
    options: [
      "registration.php",
      "theme.xml",
      "view.xml",
      "composer.json"
    ],
    correct: 1,
    explanation: "theme.xml includes <title> and optional <parent>."
  },
  {
    question: "How does Magento know to execute registration.php for a Composer theme?",
    options: [
      "It reads vendor/theme.json",
      "Composer autoload.files in composer.json lists registration.php",
      "Magento scans all vendor packages",
      "It is listed in module.xml"
    ],
    correct: 1,
    explanation: "Composer executes files listed in autoload.files at bootstrap."
  },
  {
    question: "Which directory stores theme fonts?",
    options: [
      "web/fonts/",
      "fonts/ at project root",
      "pub/fonts/",
      "var/fonts/"
    ],
    correct: 0,
    explanation: "Theme fonts are placed under web/fonts/."
  },
  {
    question: "Where are theme translations for US English placed?",
    options: [
      "i18n/en_US.csv",
      "etc/en_US.csv",
      "web/i18n/en_US.csv",
      "lang/en_US.csv"
    ],
    correct: 0,
    explanation: "Theme translations use CSV under i18n/."
  },
  {
    question: "What is the purpose of etc/view.xml?",
    options: [
      "Register the theme",
      "Provide theme configuration values (e.g., image sizes, properties)",
      "Define routes",
      "Compile LESS"
    ],
    correct: 1,
    explanation: "view.xml contains structured configuration for the theme."
  },
  {
    question: "Which path mirrors a module asset override for addtocart.phtml?",
    options: [
      "app/design/frontend/Vendor/theme/Magento_Catalog/templates/product/view/addtocart.phtml",
      "app/design/frontend/Vendor/theme/Catalog/templates/product/view/addtocart.phtml",
      "app/design/frontend/Vendor/theme/templates/addtocart.phtml",
      "app/design/frontend/Vendor/theme/Magento_Catalog/addtocart.phtml"
    ],
    correct: 0,
    explanation: "Mirror Magento_Catalog path within the theme to override templates."
  },
  {
    question: "Which statement about Composer-based themes is correct?",
    options: [
      "They cannot be in vendor",
      "They must be in app/design",
      "They can be stored anywhere; default install is vendor/",
      "They require module.xml"
    ],
    correct: 2,
    explanation: "Composer-installed themes can live anywhere; the default install path is vendor/."
  },
  {
    question: "Which folder should not typically contain frequently changing marketing images?",
    options: [
      "web/images/",
      "pub/media/",
      "pub/static/",
      "var/view_preprocessed/"
    ],
    correct: 0,
    explanation: "web/images/ is for static theme images; frequently changing images belong under media."
  },
  {
    question: "Which statement about pub/static is correct?",
    options: [
      "It is the source of assets",
      "It is the compiled/deployed output of assets",
      "It stores Composer packages",
      "It stores database backups"
    ],
    correct: 1,
    explanation: "pub/static contains deployed output of assets from theme/module sources."
  },
  {
    question: "What is the purpose of theme.less in css/source?",
    options: [
      "Define theme layout XML",
      "Override default UI library variables",
      "Register the theme with Magento",
      "Add translations"
    ],
    correct: 1,
    explanation: "theme.less overrides default variables for the UI library."
  },
  {
    question: "Which file is executed to register a Composer theme on bootstrap?",
    options: [
      "theme.xml",
      "registration.php",
      "view.xml",
      "di.xml"
    ],
    correct: 1,
    explanation: "registration.php is executed via Composer autoload.files and calls ComponentRegistrar."
  }
];
