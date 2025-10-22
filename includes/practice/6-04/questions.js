window.questions = [
  {
    question: "Which price components apply to the product page (before adding to cart)?",
    options: [
      "Base price only",
      "Base price, special pricing, catalog rules",
      "All price types",
      "Tiered pricing and options"
    ],
    correct: 1,
    explanation: "Product page shows base price, special pricing, and catalog rules."
  },
  {
    question: "Which price components apply in the shopping cart?",
    options: [
      "Base price only",
      "Special pricing and catalog rules",
      "Tiered pricing, options price, tax/VAT, shopping cart rules",
      "Only cart rules"
    ],
    correct: 2,
    explanation: "Cart adds tiered pricing, options price, tax/VAT, and shopping cart rules."
  },
  {
    question: "What is the base price?",
    options: [
      "The special price",
      "The price attribute value",
      "The catalog rule price",
      "The final price"
    ],
    correct: 1,
    explanation: "Base price is the product's price attribute value."
  },
  {
    question: "What is special pricing?",
    options: [
      "A catalog rule",
      "Temporary discount set on product with optional date range",
      "Tiered pricing",
      "Tax calculation"
    ],
    correct: 1,
    explanation: "Special pricing is a temporary discount with optional from/to dates."
  },
  {
    question: "Where are catalog rule prices stored?",
    options: [
      "product table",
      "catalog_rule table",
      "catalogrule_product_price table",
      "price_index table"
    ],
    correct: 2,
    explanation: "Catalog rule prices are indexed in catalogrule_product_price table."
  },
  {
    question: "What is tiered pricing based on?",
    options: [
      "Product category only",
      "Quantity, customer group, and website",
      "Date ranges",
      "Special price"
    ],
    correct: 1,
    explanation: "Tiered pricing (volume discounts) depends on quantity, customer group, and website."
  },
  {
    question: "What is options price?",
    options: [
      "The base price",
      "Price added by custom options (e.g., engraving, gift wrap)",
      "Special pricing",
      "Tax amount"
    ],
    correct: 1,
    explanation: "Options price is the additional cost for custom product options."
  },
  {
    question: "Which class contains the primary price calculation for product pages?",
    options: [
      "\\Magento\\Catalog\\Model\\Product",
      "\\Magento\\Catalog\\Model\\Product\\Type\\Price",
      "\\Magento\\Framework\\Pricing\\Price",
      "\\Magento\\Catalog\\Pricing\\Price"
    ],
    correct: 1,
    explanation: "Product\\Type\\Price::calculatePrice() handles product page price calculation."
  },
  {
    question: "What is the sequence of price calculation on product page?",
    options: [
      "Base price → Catalog rules → Special pricing",
      "Base price → Special pricing → Catalog rules",
      "Special pricing → Base price → Catalog rules",
      "Catalog rules → Special pricing → Base price"
    ],
    correct: 1,
    explanation: "Calculation: Base price, then special pricing, then catalog rules (lowest wins)."
  },
  {
    question: "How do you customize price calculation?",
    options: [
      "Edit core files",
      "Plugin on calculatePrice() or replace entire price class",
      "Only via layout XML",
      "Cannot be customized"
    ],
    correct: 1,
    explanation: "Use plugin (preferred) on calculatePrice() or preference to replace class."
  },
  {
    question: "Which is the preferred method to customize price calculation?",
    options: [
      "Preference",
      "Plugin (e.g., afterCalculatePrice)",
      "Observer",
      "Event"
    ],
    correct: 1,
    explanation: "Plugins are preferred—they don't replace entire core logic."
  },
  {
    question: "Where is the price renderer block configured?",
    options: [
      "catalog.xml",
      "Magento/Catalog/view/base/layout/default.xml",
      "product.xml",
      "price.xml"
    ],
    correct: 1,
    explanation: "default.xml creates the product.price.render.default block."
  },
  {
    question: "What is the name of the default price renderer block?",
    options: [
      "product.price.default",
      "price.render.default",
      "product.price.render.default",
      "catalog.price.render"
    ],
    correct: 2,
    explanation: "The block is named product.price.render.default."
  },
  {
    question: "Where are price rendering templates located?",
    options: [
      "Magento/Catalog/view/frontend/templates/",
      "Magento/Catalog/view/base/templates/product/",
      "Magento/Framework/Pricing/templates/",
      "Magento/Catalog/templates/"
    ],
    correct: 1,
    explanation: "Price templates are in Magento/Catalog/view/base/templates/product/."
  },
  {
    question: "Which template renders the final price?",
    options: [
      "price.phtml",
      "price/final_price.phtml",
      "final.phtml",
      "product_price.phtml"
    ],
    correct: 1,
    explanation: "price/final_price.phtml renders the final price display."
  },
  {
    question: "How do you render price in a custom template location?",
    options: [
      "Direct PHP call",
      "Use layout XML to reference product.price.render.default block",
      "Echo price attribute",
      "Not possible"
    ],
    correct: 1,
    explanation: "Reference product.price.render.default block via layout or in template."
  },
  {
    question: "Where are JS UI component templates for prices located?",
    options: [
      "Magento/Catalog/view/frontend/web/js/",
      "Magento/Catalog/view/base/web/template/",
      "Magento/Framework/Pricing/web/template/",
      "web/template/"
    ],
    correct: 1,
    explanation: "JS price templates are in Magento/Catalog/view/base/web/template/."
  },
  {
    question: "What is a use case for JS UI component price rendering?",
    options: [
      "Static prices only",
      "Dynamic price updates (e.g., selecting configurable options)",
      "Server-side only",
      "Tax calculation"
    ],
    correct: 1,
    explanation: "JS UI components handle dynamic price updates without page reload."
  },
  {
    question: "How do you modify how price is rendered?",
    options: [
      "Edit core files",
      "Override templates in theme or create custom renderer class",
      "Only via CSS",
      "Cannot modify"
    ],
    correct: 1,
    explanation: "Override templates in your theme or create custom renderer extending AbstractRenderer."
  },
  {
    question: "Which class should custom price renderers extend?",
    options: [
      "\\Magento\\Framework\\View\\Element\\Template",
      "\\Magento\\Framework\\Pricing\\Render\\AbstractRenderer",
      "\\Magento\\Catalog\\Block\\Product\\View",
      "\\Magento\\Framework\\Block\\Template"
    ],
    correct: 1,
    explanation: "Custom price renderers extend AbstractRenderer."
  },
  {
    question: "When is tax/VAT applied to price?",
    options: [
      "Always on product page",
      "In cart/checkout depending on tax configuration",
      "Never",
      "Only for virtual products"
    ],
    correct: 1,
    explanation: "Tax is applied in cart/checkout based on tax settings and location."
  },
  {
    question: "What determines if special price is applied?",
    options: [
      "It's always applied",
      "special_price exists and is lower than base price, within date range if set",
      "Customer group only",
      "Catalog rules"
    ],
    correct: 1,
    explanation: "Special price applies if set, lower than base, and within optional date range."
  },
  {
    question: "How do you identify what composes a product's final price?",
    options: [
      "Guess",
      "Check base price, special price, catalog rules, tiered pricing; debug calculatePrice()",
      "Only check base price",
      "Ask customer"
    ],
    correct: 1,
    explanation: "Examine all price components and debug calculatePrice() method."
  },
  {
    question: "Which method would you set a breakpoint in to debug price calculation?",
    options: [
      "Product::getPrice()",
      "Product\\Type\\Price::calculatePrice()",
      "Pricing\\Price::getValue()",
      "Product::getFinalPrice()"
    ],
    correct: 1,
    explanation: "Set breakpoint in calculatePrice() to trace price calculation logic."
  },
  {
    question: "Can you have both special pricing and catalog rules applied?",
    options: [
      "No, only one",
      "Yes, the lowest price wins",
      "Only for configurable products",
      "Only if manually configured"
    ],
    correct: 1,
    explanation: "Both can exist; the calculation uses the lowest applicable price."
  },
  {
    question: "What is the 'zone' argument in price rendering?",
    options: [
      "Geographic location",
      "Rendering context (e.g., ZONE_ITEM_LIST, ZONE_ITEM_VIEW)",
      "Time zone",
      "Tax zone"
    ],
    correct: 1,
    explanation: "Zone defines rendering context (list view vs detail view)."
  },
  {
    question: "What file would you modify to change tier price template?",
    options: [
      "tier_prices.phtml in your theme",
      "price.phtml",
      "default.xml",
      "product_view.xml"
    ],
    correct: 0,
    explanation: "Override tier_prices.phtml in your theme to customize tier price display."
  },
  {
    question: "What is the purpose of 'include_container' argument in price rendering?",
    options: [
      "Include product image",
      "Include HTML wrapper/container around price",
      "Include tax",
      "Include shipping"
    ],
    correct: 1,
    explanation: "include_container determines if price is wrapped in container HTML."
  },
  {
    question: "Where would you define a custom price renderer in layout XML?",
    options: [
      "default.xml",
      "catalog_product_prices.xml",
      "product_view.xml",
      "price.xml"
    ],
    correct: 1,
    explanation: "catalog_product_prices.xml is used to configure price renderers."
  },
  {
    question: "What happens if special price is higher than base price?",
    options: [
      "Special price is used anyway",
      "Special price is ignored; base price used",
      "Error is thrown",
      "Product cannot be sold"
    ],
    correct: 1,
    explanation: "Special price only applies if it's lower than base price."
  }
];
