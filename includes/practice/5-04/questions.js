window.questions = [
  {
    question: "Which method is typically used to obtain the active quote?",
    options: [
      "\\Magento\\Quote\\Model\\QuoteFactory::create()",
      "\\Magento\\Checkout\\Model\\Session::getQuote()",
      "\\Magento\\Sales\\Model\\Order::getQuote()",
      "\\Magento\\Checkout\\Model\\Cart::getQuote()"
    ],
    correct: 1,
    explanation: "Checkout\\Model\\Session::getQuote() is the standard way to retrieve the active quote."
  },
  {
    question: "How many shipping addresses can exist in a multi-shipping checkout?",
    options: [
      "Exactly one",
      "At most one",
      "Many",
      "None"
    ],
    correct: 2,
    explanation: "Multi-shipping allows multiple shipping addresses with one billing address."
  },
  {
    question: "How many billing addresses can exist in a quote?",
    options: [
      "Zero",
      "One",
      "Many",
      "Depends on multishipping"
    ],
    correct: 1,
    explanation: "A quote always has exactly one billing address."
  },
  {
    question: "In single-shipping mode, how many shipping addresses can exist?",
    options: [
      "Exactly one",
      "At most one (zero if virtual)",
      "Many",
      "Always zero"
    ],
    correct: 1,
    explanation: "Single-shipping has at most one shipping address; virtual quotes have none."
  },
  {
    question: "Which method checks if a quote contains only virtual items?",
    options: [
      "Quote::isVirtual()",
      "Quote::getIsVirtual()",
      "Quote::hasVirtual()",
      "Quote::virtualOnly()"
    ],
    correct: 1,
    explanation: "getIsVirtual() returns true when the quote has only virtual items."
  },
  {
    question: "Which object provides the getTotals() method to retrieve calculated totals?",
    options: [
      "Quote",
      "Quote\\Address",
      "Quote\\Item",
      "Checkout\\Session"
    ],
    correct: 1,
    explanation: "Address::getTotals() returns the collection of total amounts."
  },
  {
    question: "Which method returns all items including children (e.g., configurable parent + child)?",
    options: [
      "Quote::getItems()",
      "Quote::getAllItems()",
      "Quote::getAllVisibleItems()",
      "Quote::getItemsCollection()"
    ],
    correct: 1,
    explanation: "getAllItems() returns all items including parent/child relationships."
  },
  {
    question: "Which method returns only items visible to the customer?",
    options: [
      "Quote::getItems()",
      "Quote::getAllItems()",
      "Quote::getAllVisibleItems()",
      "Quote::getItemsCollection()"
    ],
    correct: 2,
    explanation: "getAllVisibleItems() excludes some children, returning only customer-visible items."
  },
  {
    question: "Which method returns the item collection object for advanced filtering?",
    options: [
      "Quote::getItems()",
      "Quote::getAllItems()",
      "Quote::getAllVisibleItems()",
      "Quote::getItemsCollection()"
    ],
    correct: 3,
    explanation: "getItemsCollection() provides the collection for advanced operations."
  },
  {
    question: "Can deleted items remain in the items collection?",
    options: [
      "No, they are removed immediately",
      "Yes, check isDeleted() if needed",
      "Only in multishipping",
      "Only for virtual items"
    ],
    correct: 1,
    explanation: "Deleted items may persist in the collection; use isDeleted() to check."
  },
  {
    question: "Where are item options (custom options, bundle data, etc.) stored?",
    options: [
      "quote_item table",
      "quote_item_option table",
      "catalog_product_option table",
      "sales_order_item table"
    ],
    correct: 1,
    explanation: "Item options are stored in the quote_item_option table."
  },
  {
    question: "Which is a typical use case for item options?",
    options: [
      "Storing product SKU",
      "Storing product custom options and bundle selections",
      "Storing customer email",
      "Storing shipping method"
    ],
    correct: 1,
    explanation: "Item options hold custom options, bundle selections, and technical product type data."
  },
  {
    question: "How do you retrieve a specific item option by code?",
    options: [
      "$item->getOption('code')",
      "$item->getOptionByCode('code')",
      "$item->fetchOption('code')",
      "$item->loadOption('code')"
    ],
    correct: 1,
    explanation: "Use getOptionByCode('code') to retrieve a specific option."
  },
  {
    question: "Why might storing custom data in item options be preferable to a custom table?",
    options: [
      "It's faster",
      "It's simpler and requires less maintenance",
      "It's required by Magento",
      "Custom tables are not allowed"
    ],
    correct: 1,
    explanation: "Item options are easier to maintain than separate tables for item-related custom data."
  },
  {
    question: "Which file defines which product attributes are loaded with quote items?",
    options: [
      "etc/di.xml",
      "etc/catalog_attributes.xml",
      "etc/product_attributes.xml",
      "etc/quote_attributes.xml"
    ],
    correct: 1,
    explanation: "catalog_attributes.xml defines attributes loaded for quote items."
  },
  {
    question: "Which group name in catalog_attributes.xml specifies attributes for quote items?",
    options: [
      "quote",
      "quote_item",
      "cart_item",
      "checkout_item"
    ],
    correct: 1,
    explanation: "The 'quote_item' group lists attributes loaded with quote items."
  },
  {
    question: "Why doesn't Magento load all product attributes with quote items?",
    options: [
      "To save disk space",
      "For performance—loading all attributes for many items is costly",
      "It's a bug",
      "Only simple products need attributes"
    ],
    correct: 1,
    explanation: "Loading all attributes for each item would degrade performance, so only essential attributes are loaded."
  },
  {
    question: "Where are address-related methods in the Quote class located?",
    options: [
      "Lines ~100-500",
      "Lines ~1143-1400",
      "Lines ~2000-2500",
      "Separate Address class only"
    ],
    correct: 1,
    explanation: "Quote address methods are around lines 1143-1400 in the Quote class."
  },
  {
    question: "Where are item-related methods in the Quote class located?",
    options: [
      "Lines ~100-500",
      "Lines ~1400-1600",
      "Lines ~2000-2500",
      "Separate Item class only"
    ],
    correct: 1,
    explanation: "Quote item methods are roughly around lines 1400-1600."
  },
  {
    question: "Which method returns all shipping addresses in a multi-shipping scenario?",
    options: [
      "getShippingAddresses()",
      "getAllShippingAddresses()",
      "getAddresses()",
      "fetchShippingAddresses()"
    ],
    correct: 1,
    explanation: "getAllShippingAddresses() returns all shipping addresses when multi-shipping is enabled."
  },
  {
    question: "In a virtual quote, how many shipping addresses exist?",
    options: [
      "One",
      "Zero",
      "Many",
      "Depends on customer"
    ],
    correct: 1,
    explanation: "Virtual quotes have no shipping addresses (only billing)."
  },
  {
    question: "Which class is responsible for loading items with configured product attributes?",
    options: [
      "\\Magento\\Quote\\Model\\Quote",
      "\\Magento\\Quote\\Model\\ResourceModel\\Quote\\Item\\Collection",
      "\\Magento\\Catalog\\Model\\Product",
      "\\Magento\\Checkout\\Model\\Session"
    ],
    correct: 1,
    explanation: "Quote\\Item\\Collection loads items and applies catalog_attributes.xml configuration."
  },
  {
    question: "What does _quoteConfig->getProductAttributes() return?",
    options: [
      "All product attributes",
      "Attributes defined in catalog_attributes.xml for quote_item group",
      "Only custom attributes",
      "Only system attributes"
    ],
    correct: 1,
    explanation: "It returns the list of attributes configured for quote items."
  },
  {
    question: "How do you add a custom attribute to be loaded with quote items?",
    options: [
      "Edit di.xml",
      "Add it to catalog_attributes.xml under quote_item group",
      "Add it to module.xml",
      "Add it to system.xml"
    ],
    correct: 1,
    explanation: "Define the attribute in catalog_attributes.xml within the quote_item group."
  },
  {
    question: "Which scenario requires reviewing quote merge logic?",
    options: [
      "Guest adds items, then logs in",
      "Customer adds items",
      "Admin creates order",
      "Product is deleted"
    ],
    correct: 0,
    explanation: "Quote merge happens when a guest cart is merged with a customer cart on login."
  },
  {
    question: "What should you check when iterating items to avoid deleted items?",
    options: [
      "$item->isActive()",
      "$item->isDeleted()",
      "$item->isValid()",
      "$item->isVisible()"
    ],
    correct: 1,
    explanation: "Check isDeleted() to filter out deleted items still in the collection."
  },
  {
    question: "In 95% of scenarios, where do you retrieve quote items from?",
    options: [
      "Address object",
      "Quote object",
      "Session object",
      "Cart object"
    ],
    correct: 1,
    explanation: "Quote object is the standard source for retrieving items."
  },
  {
    question: "Which method would you use to get the billing address?",
    options: [
      "Quote::getBillingAddress()",
      "Quote::getAddress('billing')",
      "Quote::fetchBillingAddress()",
      "Quote::loadBillingAddress()"
    ],
    correct: 0,
    explanation: "getBillingAddress() returns the billing address object."
  },
  {
    question: "Which method returns the default/first shipping address?",
    options: [
      "Quote::getShipping()",
      "Quote::getShippingAddress()",
      "Quote::getDefaultShippingAddress()",
      "Quote::getFirstShippingAddress()"
    ],
    correct: 1,
    explanation: "getShippingAddress() returns the default or first shipping address."
  },
  {
    question: "What type of data might NOT fit into standard item fields and requires item options?",
    options: [
      "SKU",
      "Custom options, bundle selections, custom extension data",
      "Quantity",
      "Price"
    ],
    correct: 1,
    explanation: "Complex or custom data that doesn't fit standard fields goes into item options."
  }
];
