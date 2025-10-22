window.questions = [
  {
    question: "What are CMS pages primarily used for?",
    options: [
      "Reusable snippets",
      "Standalone content pages like About Us",
      "Dynamic product listings",
      "Admin configuration"
    ],
    correct: 1,
    explanation: "CMS pages are standalone pages with static content, e.g., About Us, Privacy Policy."
  },
  {
    question: "What are CMS blocks primarily used for?",
    options: [
      "Routing",
      "Reusable HTML content that can be placed on multiple pages",
      "Database migrations",
      "Product indexing"
    ],
    correct: 1,
    explanation: "CMS blocks are reusable content snippets referenced by identifier and placed in multiple locations."
  },
  {
    question: "Which feature allows visual drag-and-drop content authoring?",
    options: [
      "Native CMS",
      "Page Builder",
      "WYSIWYG Toolbar",
      "TinyMCE"
    ],
    correct: 1,
    explanation: "Page Builder supports drag-and-drop content creation using content types."
  },
  {
    question: "Where do you create a CMS Page?",
    options: [
      "Content → Pages",
      "Content → Blocks",
      "Content → Widgets",
      "Stores → Configuration"
    ],
    correct: 0,
    explanation: "CMS pages are created in the Admin at Content → Pages."
  },
  {
    question: "Where do you create a CMS Block?",
    options: [
      "Content → Pages",
      "Content → Blocks",
      "Content → Widgets",
      "Marketing → Communications"
    ],
    correct: 1,
    explanation: "CMS blocks are created in Admin under Content → Blocks."
  },
  {
    question: "Which directive inserts the base URL?",
    options: [
      "{{store url=\"\"}}",
      "{{config path=\"web/unsecure/base_url\"}}",
      "{{media url=\"image.jpg\"}}",
      "{{block id=\"footer_links\"}}"
    ],
    correct: 1,
    explanation: "{{config path=...}} reads configuration values such as base URLs."
  },
  {
    question: "Which directive generates a store-aware URL to a path?",
    options: [
      "{{config path=...}}",
      "{{store url=\"contact\"}}",
      "{{media url=...}}",
      "{{widget type=...}}"
    ],
    correct: 1,
    explanation: "{{store url=...}} generates links respecting store configuration."
  },
  {
    question: "How do you include a static block by identifier in CMS content?",
    options: [
      "{{block block_id=\"identifier\"}}",
      "{{widget id=\"identifier\"}}",
      "{{include block=\"identifier\"}}",
      "{{render block=\"identifier\"}}"
    ],
    correct: 0,
    explanation: "Use {{block class=\"Magento\\Cms\\Block\\Block\" block_id=\"identifier\"}} to render a static block."
  },
  {
    question: "Which directive inserts media URLs for images?",
    options: [
      "{{media url=...}}",
      "{{config path=...}}",
      "{{store url=...}}",
      "{{block id=...}}"
    ],
    correct: 0,
    explanation: "{{media url=...}} builds a correct media URL respecting store and CDN settings."
  },
  {
    question: "Widgets are best described as:",
    options: [
      "Database adapters",
      "Dynamic, configurable content elements that can be targeted to layout containers",
      "Replacement for Page Builder",
      "A CLI-only feature"
    ],
    correct: 1,
    explanation: "Widgets provide dynamic, configurable content placement into layout handles/containers."
  },
  {
    question: "Which statement about Page Builder is true?",
    options: [
      "It is required to create any CMS content",
      "It provides content types and scheduling and is ideal for rich layouts",
      "It replaces static blocks",
      "It cannot be used on CMS pages"
    ],
    correct: 1,
    explanation: "Page Builder is a visual tool with content types, scheduling, and responsive controls."
  },
  {
    question: "Where are Widget layout updates configured?",
    options: [
      "In theme templates",
      "In the widget's settings under Layout Updates",
      "In Stores → Configuration",
      "In Content → Pages → Design"
    ],
    correct: 1,
    explanation: "Widget UI allows choosing handles/containers under Layout Updates."
  },
  {
    question: "Which directive renders a backend (template) block with a template?",
    options: [
      "{{block template=...}}",
      "{{block class=\"Vendor\\Module\\Block\\Example\" template=\"Vendor_Module::example.phtml\"}}",
      "{{widget type=...}}",
      "{{store url=...}}"
    ],
    correct: 1,
    explanation: "Use {{block class=... template=...}} to render a PHP block template in CMS content."
  },
  {
    question: "Which is NOT a CMS feature?",
    options: [
      "CMS Pages",
      "CMS Blocks",
      "Widgets",
      "CRON Indexer"
    ],
    correct: 3,
    explanation: "CRON indexer is unrelated to CMS content authoring."
  },
  {
    question: "Which field uniquely identifies a CMS block?",
    options: [
      "Title",
      "Identifier",
      "Template",
      "Widget Type"
    ],
    correct: 1,
    explanation: "Identifier is the unique reference used in widgets/layouts."
  },
  {
    question: "Where can you add Layout Update XML for a CMS page?",
    options: [
      "Content tab",
      "Search Engine Optimization tab",
      "Design tab",
      "No such option"
    ],
    correct: 2,
    explanation: "Layout Update XML can be entered in the Design tab of the CMS page."
  },
  {
    question: "Which directive is used to insert a widget inside CMS content?",
    options: [
      "{{widget ...}}",
      "{{block ...}}",
      "{{store ...}}",
      "{{config ...}}"
    ],
    correct: 0,
    explanation: "Use {{widget type=...}} with widget-specific parameters."
  },
  {
    question: "How do you generate a link to a store-aware path like 'contact'?",
    options: [
      "Use {{config path=...}}",
      "Use {{store url=\"contact\"}}",
      "Use {{media url=...}}",
      "Use {{block id=...}}"
    ],
    correct: 1,
    explanation: "{{store url=...}} builds a URL with the store's base config and URL rewrites."
  },
  {
    question: "What is the main difference between a block and a widget?",
    options: [
      "Blocks are dynamic; widgets are static",
      "Widgets are configurable and can be targeted to layout handles, blocks are simple reusable content",
      "Blocks are used only in admin",
      "Widgets cannot be used on CMS pages"
    ],
    correct: 1,
    explanation: "Widgets are more powerful and configurable for targeted placement; blocks are reusable static content."
  },
  {
    question: "Which of the following can be used inside CMS content?",
    options: [
      "{{store}} and {{widget}} directives",
      "PHP code",
      "MySQL queries",
      "CRON expressions"
    ],
    correct: 0,
    explanation: "CMS supports directives such as {{store}}, {{block}}, {{media}}, and {{widget}}."
  },
  {
    question: "Page Builder is best suited for:",
    options: [
      "Simple plaintext pages only",
      "Rich, visually complex layouts with components",
      "Database maintenance",
      "Shipping configuration"
    ],
    correct: 1,
    explanation: "Use Page Builder for complex layouts and components."
  },
  {
    question: "Which admin path creates a widget?",
    options: [
      "Content → Pages",
      "Content → Blocks",
      "Content → Widgets",
      "Marketing → Promotions"
    ],
    correct: 2,
    explanation: "Widgets are created in Content → Widgets."
  },
  {
    question: "How do you place a CMS block on specific pages without editing those pages?",
    options: [
      "Use a widget of type 'CMS Static Block' with layout updates",
      "Edit each page's content",
      "Use {{config}} directive",
      "It is not possible"
    ],
    correct: 0,
    explanation: "The CMS Static Block widget can place a block in containers across selected pages."
  },
  {
    question: "Which directive is used for media file references in CMS content?",
    options: [
      "{{media url=...}}",
      "{{file url=...}}",
      "{{asset url=...}}",
      "{{image url=...}}"
    ],
    correct: 0,
    explanation: "Use {{media url=...}} to generate proper media URLs."
  },
  {
    question: "What is the role of the CMS block Identifier?",
    options: [
      "Database primary key",
      "Human-readable title",
      "Unique reference used by widgets/layouts to locate the block",
      "Theme file name"
    ],
    correct: 2,
    explanation: "Identifier uniquely identifies the block and is used by widgets/layout XML."
  },
  {
    question: "Which content can be inserted via {{block}} directive?",
    options: [
      "Only CMS static blocks",
      "Only Page Builder content",
      "Either static blocks (Magento\\Cms\\Block\\Block) or custom template blocks (class+template)",
      "Only widgets"
    ],
    correct: 2,
    explanation: "{{block}} can render Magento\\Cms\\Block\\Block or any custom block class with a template."
  },
  {
    question: "Which is a best practice for multi-store content?",
    options: [
      "Use one global page for all languages",
      "Assign pages/blocks per Store View and use store-aware links",
      "Hardcode base URLs",
      "Use PHP in CMS content"
    ],
    correct: 1,
    explanation: "Assign content per store view and use {{store}}/{{media}} directives for portability."
  },
  {
    question: "Which tab on CMS Page allows setting layout and theme?",
    options: [
      "Content",
      "Design",
      "SEO",
      "Schedule"
    ],
    correct: 1,
    explanation: "Design tab controls theme, layout, and layout update XML."
  },
  {
    question: "Which is true about widgets placement?",
    options: [
      "Widgets can be targeted to specific layout handles and containers",
      "Widgets always render in the footer",
      "Widgets are only for product pages",
      "Widgets cannot render CMS blocks"
    ],
    correct: 0,
    explanation: "Widgets can target any supported handle/container and can render CMS blocks."
  },
  {
    question: "Which directive is used to render a static block with identifier 'promo_banner'?",
    options: [
      "{{block id=\"promo_banner\"}}",
      "{{block class=\"Magento\\Cms\\Block\\Block\" block_id=\"promo_banner\"}}",
      "{{widget id=\"promo_banner\"}}",
      "{{store id=\"promo_banner\"}}"
    ],
    correct: 1,
    explanation: "Render the static block via the CMS Block block class with the block_id parameter."
  }
];
