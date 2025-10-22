window.questions = [
  {
    question: "Where are layout XML files located in a module?",
    options: [
      "view/[area]/templates",
      "view/[area]/layout",
      "etc/frontend/layout",
      "view/[area]/web/layout"
    ],
    correct: 1,
    explanation: "Layout XML lives under view/[area]/layout (e.g., view/frontend/layout)."
  },
  {
    question: "How are layout XML files combined at runtime?",
    options: [
      "They are not combined",
      "They are merged into one tree according to module order in app/etc/config.php",
      "They are concatenated in alphabetical order",
      "They are loaded by theme only"
    ],
    correct: 1,
    explanation: "All layout XML is merged into a single layout tree by module order defined in app/etc/config.php."
  },
  {
    question: "What is a layout handle?",
    options: [
      "A template file name",
      "A request identifier that selects applicable layout instructions",
      "A block alias",
      "A route controller name"
    ],
    correct: 1,
    explanation: "Handles map a request to sets of layout instructions (e.g., catalog_product_view)."
  },
  {
    question: "Which method is best to discover all handles applied to the current request?",
    options: [
      "Check the URL",
      "Set a breakpoint in \\Magento\\Framework\\View\\Result\\Layout::addHandle()",
      "Enable developer mode",
      "Run bin/magento dev:handles:list"
    ],
    correct: 1,
    explanation: "addHandle() is called whenever a handle is added to the layout update list."
  },
  {
    question: "Which helper adds product-related handles programmatically?",
    options: [
      "\\Magento\\Catalog\\Helper\\Product\\View::initProductLayout()",
      "\\Magento\\Catalog\\Model\\Product::load()",
      "\\Magento\\Theme\\Helper\\Layout::init()",
      "\\Magento\\Framework\\View\\Layout::generate()"
    ],
    correct: 0,
    explanation: "initProductLayout() adds dynamic handles like by type, id, sku for product view pages."
  },
  {
    question: "Which directive declares a block?",
    options: [
      "<container>",
      "<block>",
      "<referenceBlock>",
      "<referenceContainer>"
    ],
    correct: 1,
    explanation: "<block> declares a block that renders HTML using a template or block class."
  },
  {
    question: "Which directive declares a container (group of child elements)?",
    options: [
      "<block>",
      "<container>",
      "<referenceBlock>",
      "<move>"
    ],
    correct: 1,
    explanation: "<container> hosts other blocks/containers and can have htmlTag/htmlClass."
  },
  {
    question: "Which directive lets you modify an existing block?",
    options: [
      "<block>",
      "<referenceBlock>",
      "<container>",
      "<update>"
    ],
    correct: 1,
    explanation: "<referenceBlock name=...> is used to alter an existing block (template, actions, args)."
  },
  {
    question: "Which directive lets you add children to an existing container?",
    options: [
      "<referenceContainer>",
      "<container>",
      "<block>",
      "<remove>"
    ],
    correct: 0,
    explanation: "Use <referenceContainer name=...> to add children inside an existing container."
  },
  {
    question: "How do you move an existing element to a new parent?",
    options: [
      "<move element=... destination=...>",
      "<referenceBlock move=...>",
      "<container move=...>",
      "<update move=...>"
    ],
    correct: 0,
    explanation: "<move element=... destination=... before|after=...> moves elements in the tree."
  },
  {
    question: "How do you remove an existing block?",
    options: [
      "<remove element=...>",
      "<referenceBlock name=... remove=\"true\" />",
      "<block remove=\"true\">",
      "<container remove=\"true\">"
    ],
    correct: 1,
    explanation: "Use <referenceBlock name=... remove=\"true\"/> or <referenceContainer ... remove=\"true\"/>."
  },
  {
    question: "How do you include another handle's layout instructions?",
    options: [
      "<reference handle=...>",
      "<update handle=...>",
      "<include handle=...>",
      "<import handle=...>"
    ],
    correct: 1,
    explanation: "<update handle=\"customer_account\"/> includes instructions defined by that handle."
  },
  {
    question: "What does cacheable=\"false\" on a block do?",
    options: [
      "Disables layout merging",
      "Can make the entire page non-cacheable",
      "Caches the block output",
      "Only disables JS bundling"
    ],
    correct: 1,
    explanation: "A non-cacheable block can force the whole page out of FPC—use sparingly."
  },
  {
    question: "How to set a custom template for an existing block via layout XML?",
    options: [
      "Use <block template=...>",
      "Use <referenceBlock><action method=\"setTemplate\"><argument name=\"template\" .../></action></referenceBlock>",
      "Use <container template=...>",
      "You cannot"
    ],
    correct: 1,
    explanation: "referenceBlock + an action to call setTemplate is the standard way."
  },
  {
    question: "How do you order a new child as first or last within a container?",
    options: [
      "Use order=\"first|last\"",
      "Use sortOrder attribute",
      "Use before=\"-\" or after=\"-\"",
      "Use position=\"0|999\""
    ],
    correct: 2,
    explanation: "A hyphen '-' means first/last when used with before/after."
  },
  {
    question: "What's the difference between 'name' and 'as' on a block?",
    options: [
      "They are identical",
      "'as' is used by getChildBlock() as the child alias; 'name' is the internal layout name",
      "'name' is the alias; 'as' is ignored",
      "Both are for CSS classes"
    ],
    correct: 1,
    explanation: "In templates, $block->getChildBlock('alias') uses the 'as' value; otherwise it falls back to 'name'."
  },
  {
    question: "Which directive defines wrapper HTML for a container?",
    options: [
      "<action method=\"setTemplate\">",
      "htmlTag/htmlClass on <container>",
      "<arguments> on <block>",
      "<wrapper> element"
    ],
    correct: 1,
    explanation: "Containers allow htmlTag/htmlClass to wrap child render output."
  },
  {
    question: "Which directive adds an argument to a block?",
    options: [
      "<args>",
      "<arguments><argument name=... xsi:type=...>value</argument></arguments>",
      "<params>",
      "<properties>"
    ],
    correct: 1,
    explanation: "Use <arguments><argument .../></arguments> to inject block parameters."
  },
  {
    question: "Given a scenario: add a static block 'promo_banner' to the 'content' container after all existing children.",
    options: [
      "<block name=\"promo.banner\" as=\"promo_banner\" after=\"-\" class=\"Magento\\Cms\\Block\\Block\"><arguments><argument name=\"block_id\" xsi:type=\"string\">promo_banner</argument></arguments></block>",
      "<container name=\"content\"><arguments>promo_banner</arguments></container>",
      "<referenceBlock name=\"content\"><block id=\"promo_banner\"/></referenceBlock>",
      "<move element=\"promo_banner\" destination=\"content\" after=\"-\"/>"
    ],
    correct: 0,
    explanation: "Declare the block under referenceContainer name=content with after='-'."
  },
  {
    question: "Given a scenario: move 'page.main.title' into 'content' as the first child.",
    options: [
      "<move element=\"page.main.title\" destination=\"content\" before=\"-\"/>",
      "<referenceBlock name=\"page.main.title\" before=\"-\"/>",
      "<referenceContainer name=\"content\" before=\"-\"/>",
      "<remove name=\"page.main.title\" />"
    ],
    correct: 0,
    explanation: "Use <move> with before='-'."
  },
  {
    question: "Given a scenario: remove the 'report.bugs' block.",
    options: [
      "<referenceBlock name=\"report.bugs\" remove=\"true\"/>",
      "<block name=\"report.bugs\" remove=\"true\"/>",
      "<container name=\"report.bugs\" remove=\"true\"/>",
      "<update handle=\"remove_report\"/>"
    ],
    correct: 0,
    explanation: "referenceBlock remove=\"true\" will remove it from the tree."
  },
  {
    question: "Which directive includes customer account layout rules inside another handle?",
    options: [
      "<include handle=\"customer_account\"/>",
      "<update handle=\"customer_account\"/>",
      "<reference handle=\"customer_account\"/>",
      "<merge handle=\"customer_account\"/>"
    ],
    correct: 1,
    explanation: "<update handle=...> is used for composition of layout instructions."
  },
  {
    question: "Which is a dynamic product view handle?",
    options: [
      "catalog_product_view_type_configurable",
      "catalog_product_category",
      "product_view_default",
      "view_product"
    ],
    correct: 0,
    explanation: "Examples include catalog_product_view, ..._type_configurable, ..._id_<ID>, ..._sku_<SKU>."
  },
  {
    question: "What file name would target only product ID 436?",
    options: [
      "catalog_product_view_436.xml",
      "catalog_product_view_id_436.xml",
      "catalog_product_view_sku_436.xml",
      "product_view_id_436.xml"
    ],
    correct: 1,
    explanation: "The dynamic handle uses the '..._id_436' suffix."
  },
  {
    question: "How to access a child block by alias in a template?",
    options: [
      "$block->getChildBlock('alias')",
      "$block->getChild('alias')",
      "$block->getChildHtml('alias') only",
      "$block->getBlockAlias('alias')"
    ],
    correct: 0,
    explanation: "getChildBlock('alias') returns the block instance when 'as' was used for the child."
  },
  {
    question: "What is the safest guideline regarding 'as' attribute usage?",
    options: [
      "Always set 'as'",
      "Never set 'as'; rely on 'name' unless you need template child lookup",
      "Set 'as' to match 'name'",
      "Avoid both"
    ],
    correct: 1,
    explanation: "Using 'as' can add complexity; if specified, use that value to reference the child in templates."
  },
  {
    question: "Which statement is true about <update handle=...>?",
    options: [
      "It imports theme static assets",
      "It includes all layout instructions defined for that handle",
      "It updates the page title",
      "It flushes cache"
    ],
    correct: 1,
    explanation: "It's used to compose layouts by including another handle's layout tree."
  },
  {
    question: "How to add a custom container wrapper above 'content'?",
    options: [
      "Use <container name=\"custom.wrapper\" as=\"custom_wrapper\" htmlTag=\"div\" htmlClass=\"custom\" /> and place 'content' inside",
      "Use <referenceBlock name=\"content\" htmlTag=\"div\" />",
      "Use <move container=\"content\" />",
      "Use <remove name=\"content\" />"
    ],
    correct: 0,
    explanation: "Define a container and adjust placement via layout or theme composition."
  },
  {
    question: "Which attribute orders a new child relative to a named sibling?",
    options: [
      "position",
      "weight",
      "before/after with sibling's 'name'",
      "sortOrder"
    ],
    correct: 2,
    explanation: "Use before/after pointing to another child's layout name."
  },
  {
    question: "What does <referenceContainer remove=\"true\"/> do?",
    options: [
      "Removes the container and all its children",
      "Removes only the container tag",
      "Does nothing",
      "Removes siblings"
    ],
    correct: 0,
    explanation: "Removing a container removes its subtree from rendering."
  }
];
