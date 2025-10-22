window.questions = [
  {
    question: "Where should design/branding styles generally live?",
    options: [
      "In a module's _module.less",
      "In a custom theme (theme-level)",
      "In core module less files",
      "In layout XML only"
    ],
    correct: 1,
    explanation: "Design and branding belong to the custom theme; feature-specific styles can live in a module."
  },
  {
    question: "Where should feature-specific, stable styles for a custom module live?",
    options: [
      "Theme _extend.less",
      "Module view/frontend/web/css/source/_module.less",
      "Parent theme less",
      "Core Magento_Catalog less"
    ],
    correct: 1,
    explanation: "Module-scoped, stable styles should live in _module.less inside the module."
  },
  {
    question: "What is the recommended way to extend styles in a custom theme without overriding files?",
    options: [
      "Use _extend.less",
      "Copy core less into theme",
      "Edit files in vendor directly",
      "Write inline styles"
    ],
    correct: 0,
    explanation: "_extend.less is auto-included and ideal for additive/customizing changes."
  },
  {
    question: "What is the path for a theme's _extend.less?",
    options: [
      "app/design/frontend/Vendor/theme/web/css/_extend.less",
      "app/design/frontend/Vendor/theme/web/css/source/_extend.less",
      "app/design/frontend/Vendor/theme/web/_extend.less",
      "app/design/frontend/Vendor/theme/_extend.less"
    ],
    correct: 1,
    explanation: "Theme extend file lives under web/css/source/_extend.less."
  },
  {
    question: "Which statement about overriding vs customizing is true?",
    options: [
      "Overriding is lighter weight than customizing",
      "Customizing via _extend.less is preferred when possible",
      "Overriding cannot be done with theme fallback",
      "Overriding is only for JS files"
    ],
    correct: 1,
    explanation: "Prefer _extend.less for additive changes; override full files only when necessary."
  },
  {
    question: "What mechanism determines which file is used when duplicates exist across module/theme/child theme?",
    options: [
      "Symlinks",
      "Fallback mechanism (theme inheritance)",
      "Composer precedence",
      "Filesystem timestamps"
    ],
    correct: 1,
    explanation: "Theme inheritance determines fallback sequence for files."
  },
  {
    question: "Where should third-party CSS be declared to load on pages?",
    options: [
      "In any phtml file",
      "In default_head_blocks.xml using <css src=...>",
      "In di.xml",
      "In module.xml"
    ],
    correct: 1,
    explanation: "Use head layout (default_head_blocks.xml) to include CSS assets."
  },
  {
    question: "What is the module layout file to include a CSS asset globally (frontend)?",
    options: [
      "view/frontend/layout/default.xml",
      "view/frontend/layout/default_head_blocks.xml",
      "view/frontend/layout/catalog_product_view.xml",
      "view/frontend/web/css/custom.css"
    ],
    correct: 1,
    explanation: "default_head_blocks.xml controls head assets such as CSS."
  },
  {
    question: "What path resolves a theme CSS asset in default_head_blocks.xml?",
    options: [
      "Vendor_Module::css/custom.css only",
      "css/custom.css",
      "web/css/custom.css",
      "assets/css/custom.css"
    ],
    correct: 1,
    explanation: "For theme assets, use css/custom.css; for module assets, use Vendor_Module::css/custom.css."
  },
  {
    question: "Where should a module's main LESS entry live to be auto-included?",
    options: [
      "view/frontend/web/css/_module.less",
      "view/frontend/web/css/source/_module.less",
      "view/frontend/web/_module.less",
      "view/frontend/_module.less"
    ],
    correct: 1,
    explanation: "_module.less is auto-included from view/frontend/web/css/source/."
  },
  {
    question: "When should you override a LESS file instead of using _extend.less?",
    options: [
      "Any time—overrides are preferred",
      "When you must replace the entire file's behavior or structure",
      "When you only need to add a few rules",
      "Never"
    ],
    correct: 1,
    explanation: "Override only when full replacement is required; otherwise prefer extend."
  },
  {
    question: "Which file is auto-included into the final CSS for every theme?",
    options: [
      "_theme.less",
      "_extend.less",
      "_variables.less",
      "_overrides.less"
    ],
    correct: 1,
    explanation: "_extend.less is auto-included and commonly imports other partials."
  },
  {
    question: "Which is a good rule of thumb for theme vs module styles?",
    options: [
      "Put everything into the module",
      "Put everything into the theme",
      "Theme for design; module for feature-specific styles",
      "Use core files"
    ],
    correct: 2,
    explanation: "Theme holds design; module holds stable, feature-specific styles."
  },
  {
    question: "Which layout snippet adds a module CSS file?",
    options: [
      "<css src=\"Vendor_Module::css/custom.css\"/> in default_head_blocks.xml",
      "<style src=\"Vendor_Module::css/custom.css\"/> in default.xml",
      "<link src=\"Vendor_Module::css/custom.css\"/> in head.phtml",
      "<require src=\"Vendor_Module::css/custom.css\"/> in requirejs-config.js"
    ],
    correct: 0,
    explanation: "Use <css src=...> in default_head_blocks.xml to include CSS."
  },
  {
    question: "Where in a theme should third-party CSS files be placed for inclusion via layout?",
    options: [
      "app/design/frontend/Vendor/theme/web/css/",
      "app/design/frontend/Vendor/theme/static/css/",
      "app/design/frontend/Vendor/theme/assets/css/",
      "app/design/frontend/Vendor/theme/lib/css/"
    ],
    correct: 0,
    explanation: "Theme web assets live under web/, so CSS goes in web/css/."
  },
  {
    question: "Which file contains variables for a theme and is commonly extended?",
    options: [
      "_extend.less",
      "_variables.less",
      "_module.less",
      "default_head_blocks.xml"
    ],
    correct: 1,
    explanation: "_variables.less defines SASS/LESS variables; can be overridden or extended via theme inheritance."
  },
  {
    question: "How do you ensure your theme styles remain upgrade-safe?",
    options: [
      "Edit vendor/ files",
      "Copy all core less into your theme",
      "Use _extend.less and theme inheritance",
      "Inline styles in templates"
    ],
    correct: 2,
    explanation: "Use _extend.less and inheritance rather than editing core code."
  },
  {
    question: "What is a good practice for organizing theme customizations?",
    options: [
      "Put all CSS into one huge file",
      "Break into partials and import via _extend.less",
      "Use only inline styles",
      "Use only JS to manipulate styles"
    ],
    correct: 1,
    explanation: "Use partials and imports to keep styles maintainable."
  },
  {
    question: "Which statement about module distribution is true?",
    options: [
      "If module is distributed separately, styles should be in the module",
      "Distribute styles only in the theme",
      "Avoid styles in modules",
      "Always override core less"
    ],
    correct: 0,
    explanation: "Self-contained modules should ship their own styles."
  },
  {
    question: "Which file controls global head assets for a theme?",
    options: [
      "Magento_Theme/layout/default.xml",
      "Magento_Theme/layout/default_head_blocks.xml",
      "Magento_Theme/layout/head.xml",
      "Magento_Theme/layout/global.xml"
    ],
    correct: 1,
    explanation: "Use default_head_blocks.xml to add <css> and other head assets."
  },
  {
    question: "What's the best option to add a few button tweaks in a custom theme?",
    options: [
      "Override Magento/blank button less",
      "Use theme _extend.less",
      "Edit vendor files",
      "Add inline styles"
    ],
    correct: 1,
    explanation: "Use _extend.less for small additive theme changes."
  },
  {
    question: "You need to replace a core less file's behavior entirely. What's appropriate?",
    options: [
      "Add to _extend.less",
      "Override the file via theme fallback",
      "Edit vendor",
      "Add layout update"
    ],
    correct: 1,
    explanation: "Use theme fallback to override the entire file when necessary."
  },
  {
    question: "Where do module CSS files live for the src path Vendor_Module::css/custom.css?",
    options: [
      "view/frontend/web/css/custom.css",
      "view/frontend/css/custom.css",
      "view/web/css/custom.css",
      "view/frontend/web/custom.css"
    ],
    correct: 0,
    explanation: "Module assets referenced by Vendor_Module::css/... live under view/frontend/web/css/."
  },
  {
    question: "What is the impact of mixing theme design changes into a module's less?",
    options: [
      "Easier redesigns",
      "Design becomes tightly coupled to module and harder to retheme",
      "Performance improvements",
      "Required by Magento"
    ],
    correct: 1,
    explanation: "Design changes in modules hinder retheming; keep design in the theme."
  },
  {
    question: "What is the most upgrade-safe approach for new CSS?",
    options: [
      "Inline CSS in templates",
      "Edit vendor CSS",
      "Add a new theme CSS and include via default_head_blocks.xml",
      "Place CSS in pub/static"
    ],
    correct: 2,
    explanation: "Add CSS to theme and include via layout; avoid editing vendor/static code."
  },
  {
    question: "How do you include CSS for only a specific page?",
    options: [
      "Add to default_head_blocks.xml only",
      "Create a page-specific layout handle file and include <css src=...>",
      "Edit index.php",
      "Use di.xml"
    ],
    correct: 1,
    explanation: "Create a handle-specific layout file (e.g., cms_page_view_id_XX.xml) and add a <head><css .../></head>."
  },
  {
    question: "How do you add new less instructions for a custom page built by your module?",
    options: [
      "Use module _module.less",
      "Use _extend.less in core",
      "Edit parent theme",
      "Use inline styles"
    ],
    correct: 0,
    explanation: "Module _module.less is appropriate for custom module features' styles."
  },
  {
    question: "What is the primary benefit of _extend.less over overrides?",
    options: [
      "It disables cache",
      "It avoids conflicts and is additive",
      "It compiles faster",
      "It requires no theme"
    ],
    correct: 1,
    explanation: "Additive customization reduces maintenance and conflict risk."
  },
  {
    question: "Which statement about theme inheritance is correct?",
    options: [
      "Fallback loads files randomly",
      "Magento resolves which file to load by inheritance order (child → parent → module)",
      "Fallback is only for templates, not less",
      "Fallback is per-URL only"
    ],
    correct: 1,
    explanation: "Fallback applies broadly (templates, less, etc.) respecting theme hierarchy."
  },
  {
    question: "Which file(s) are commonly used to store design tokens?",
    options: [
      "_extend.less",
      "_variables.less",
      "_module.less",
      "custom.css"
    ],
    correct: 1,
    explanation: "_variables.less keeps theme tokens; extend/override as needed."
  }
];
