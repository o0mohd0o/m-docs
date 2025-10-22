window.questions = [
  {
    question: "Which model is the core representation of the shopping cart?",
    options: [
      "Magento\\Checkout\\Model\\Cart",
      "Magento\\Quote\\Model\\Quote",
      "Magento\\Sales\\Model\\Order",
      "Magento\\Catalog\\Model\\Product"
    ],
    correct: 1,
    explanation: "Quote is the core model that owns items, addresses, totals recollection, and merge logic. Cart wraps Quote."
  },
  {
    question: "Which class wraps the Quote model for cart operations?",
    options: [
      "Magento\\Checkout\\Model\\Cart",
      "Magento\\Sales\\Model\\Order",
      "Magento\\Quote\\Model\\Quote\\Item",
      "Magento\\Framework\\App\\Request"
    ],
    correct: 0,
    explanation: "Cart is a wrapper around Quote for cart operations in the checkout module."
  },
  {
    question: "Which method triggers totals calculation on the quote?",
    options: [
      "calculateTotals()",
      "collectTotals()",
      "fetchTotals()",
      "recalculateTotals()"
    ],
    correct: 1,
    explanation: "collectTotals() controls totals calculation across registered total models."
  },
  {
    question: "Which flows can put a product into the shopping cart?",
    options: [
      "Add to cart, wishlist, reorder, quote merge",
      "Only add to cart",
      "Only add to cart and wishlist",
      "Only reorder"
    ],
    correct: 0,
    explanation: "All four flows can populate the cart."
  },
  {
    question: "Which method decides whether two products become the same line or separate lines?",
    options: [
      "Quote::addProduct()",
      "Quote\\Item::representProduct()",
      "Quote\\Address::getAllItems()",
      "Quote::merge()"
    ],
    correct: 1,
    explanation: "representProduct() determines item aggregation vs separate lines."
  },
  {
    question: "Where are cart items actually attached?",
    options: [
      "Quote directly",
      "Quote Address (shipping/billing)",
      "Customer entity",
      "Order entity"
    ],
    correct: 1,
    explanation: "Items are associated with Quote Addresses; Quote exposes accessors to fetch them."
  },
  {
    question: "Which address holds virtual items?",
    options: [
      "Shipping address",
      "Billing address",
      "Both",
      "Neither"
    ],
    correct: 1,
    explanation: "Virtual items are attached to the billing address."
  },
  {
    question: "Which methods fetch visible items only?",
    options: [
      "Quote::getAllItems()",
      "Quote::getAllVisibleItems()",
      "Quote\\Address::getAllItems()",
      "Quote\\Address::getAllVisibleItems()"
    ],
    correct: 1,
    explanation: "getAllVisibleItems() returns only items that should render to the customer."
  },
  {
    question: "Which product type results in parent + child line items?",
    options: [
      "Simple",
      "Configurable",
      "Grouped",
      "Virtual"
    ],
    correct: 1,
    explanation: "Configurable produces a parent (configurable SKU) and child (selected variant) item."
  },
  {
    question: "Which file registers total models like Subtotal for quote totals?",
    options: [
      "etc/di.xml",
      "etc/sales.xml",
      "etc/events.xml",
      "etc/quote.xml"
    ],
    correct: 1,
    explanation: "Totals are registered in etc/sales.xml (e.g., Magento/Quote/etc/sales.xml)."
  },
  {
    question: "Which methods are key on total models?",
    options: [
      "apply() and remove()",
      "collect() and fetch()",
      "calculate() and render()",
      "sum() and diff()"
    ],
    correct: 1,
    explanation: "collect() computes amounts into the totals container; fetch() returns data for UI."
  },
  {
    question: "Which Quote method merges guest and customer quotes on login?",
    options: [
      "combine()",
      "merge()",
      "absorb()",
      "attach()"
    ],
    correct: 1,
    explanation: "merge() handles combining quotes (guest to customer) when needed."
  },
  {
    question: "Which method adds a product to a quote?",
    options: [
      "Quote::addProduct()",
      "Quote::addItem()",
      "Cart::addItem()",
      "Address::addItem()"
    ],
    correct: 0,
    explanation: "addProduct() is the typical API that builds an item from a product/configuration."
  },
  {
    question: "Which class represents a cart line item?",
    options: [
      "Magento\\Quote\\Model\\QuoteItem",
      "Magento\\Quote\\Model\\Quote\\Item",
      "Magento\\Sales\\Model\\OrderItem",
      "Magento\\Checkout\\Model\\CartItem"
    ],
    correct: 1,
    explanation: "Quote\\Item represents a quote item; the order equivalent is OrderItem."
  },
  {
    question: "Which address method triggers shipping rates retrieval?",
    options: [
      "getShippingRatesCollection()",
      "requestShippingRates()",
      "collectShippingRates()",
      "loadShippingRates()"
    ],
    correct: 1,
    explanation: "requestShippingRates() triggers shipping rate collection for the address."
  },
  {
    question: "Which component shows cart items on every page in Luma?",
    options: [
      "Mini cart",
      "Wishlist",
      "Compare list",
      "Search bar"
    ],
    correct: 0,
    explanation: "The mini cart shows item count and summary in the header."
  },
  {
    question: "Which operation can cause difficult edge cases if unaccounted for?",
    options: [
      "Wishlist removal",
      "Quote merge on login",
      "Price indexer run",
      "Layered navigation filter"
    ],
    correct: 1,
    explanation: "Quote merge can produce conflicts between guest and customer carts."
  },
  {
    question: "Where can cart item renderers be configured by product type?",
    options: [
      "checkout_cart_item_renderers.xml",
      "quote_item_renderers.xml",
      "cart_renderers.xml",
      "sales_renderers.xml"
    ],
    correct: 0,
    explanation: "Magento/Checkout/view/frontend/layout/checkout_cart_item_renderers.xml maps types to renderers."
  },
  {
    question: "Which method associates customer data to a quote?",
    options: [
      "setCustomer()",
      "assignCustomer()",
      "applyCustomer()",
      "linkCustomer()"
    ],
    correct: 1,
    explanation: "assignCustomer() attaches customer to the quote."
  },
  {
    question: "Which method indicates that a quote has only virtual items?",
    options: [
      "isVirtual()",
      "getIsVirtual()",
      "hasVirtual()",
      "virtualOnly()"
    ],
    correct: 1,
    explanation: "getIsVirtual() returns whether quote contains virtual items only."
  },
  {
    question: "Which items are considered 'visible' in getAllVisibleItems()?",
    options: [
      "All items attached to the quote",
      "Items the customer sees as separate lines",
      "Items with qty > 1",
      "Only physical items"
    ],
    correct: 1,
    explanation: "Visible items are those rendered to the user, excluding some children/impl details."
  },
  {
    question: "Which product type maps to bundle parent + one item per selection?",
    options: [
      "Grouped",
      "Bundle",
      "Configurable",
      "Downloadable"
    ],
    correct: 1,
    explanation: "Bundle products render parent + children for each selected option."
  },
  {
    question: "Where are new total models registered?",
    options: [
      "etc/totals.xml",
      "etc/sales.xml",
      "etc/taxes.xml",
      "etc/checkout.xml"
    ],
    correct: 1,
    explanation: "Totals are registered in etc/sales.xml for the quote/address scope."
  },
  {
    question: "Which method updates a specific existing quote item?",
    options: [
      "Quote::updateItem()",
      "Quote::modifyItem()",
      "Quote::changeItem()",
      "Quote::rewriteItem()"
    ],
    correct: 0,
    explanation: "updateItem() updates data for a specific item in the quote."
  },
  {
    question: "Which method returns all shipping addresses when multishipping is enabled?",
    options: [
      "getShippingAddresses()",
      "getAllShippingAddresses()",
      "getAllAddresses()",
      "getAddresses()"
    ],
    correct: 1,
    explanation: "getAllShippingAddresses() returns an array of shipping addresses for multishipping."
  },
  {
    question: "Which totals container object is passed into total models?",
    options: [
      "Magento\\Quote\\Model\\Quote\\Total",
      "Magento\\Quote\\Model\\Address\\Total",
      "Magento\\Sales\\Model\\Order\\Total",
      "Magento\\Quote\\Model\\TotalsContainer"
    ],
    correct: 1,
    explanation: "Magento\\Quote\\Model\\Address\\Total aggregates amounts during collect()."
  },
  {
    question: "Which subtotal total model class is used in core?",
    options: [
      "Magento\\Quote\\Model\\Quote\\Address\\Total\\Subtotal",
      "Magento\\Sales\\Model\\Quote\\Address\\Total\\Subtotal",
      "Magento\\Checkout\\Model\\Subtotal",
      "Magento\\Tax\\Model\\Subtotal"
    ],
    correct: 0,
    explanation: "Subtotal is implemented under Quote\\Address\\Total\\Subtotal."
  },
  {
    question: "Which user action triggers shipping rate calculation on the cart page?",
    options: [
      "Applying coupon",
      "Entering zipcode and shipping address",
      "Changing theme",
      "Viewing wishlist"
    ],
    correct: 1,
    explanation: "Entering shipping address details triggers shipping rate estimation."
  },
  {
    question: "Grouped products are represented in the cart as:",
    options: [
      "A parent grouped item",
      "Selected SKUs as separate items without parent relation",
      "A single combined item",
      "Parent + child per selection"
    ],
    correct: 1,
    explanation: "Grouped renders each selected associated product as its own line."
  },
  {
    question: "Which is the safest approach for handling cart merge on login?",
    options: [
      "Ignore it; it rarely happens",
      "Design flows and tests for merge conflicts, options, and recollection",
      "Disable login",
      "Delete guest quotes"
    ],
    correct: 1,
    explanation: "Always plan and test merge edge cases to avoid production issues."
  }
];
