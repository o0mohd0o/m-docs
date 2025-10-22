window.questions = [
  {
    question: "How many components are needed to configure tax rules?",
    options: [
      "Two",
      "Three",
      "Four",
      "Five"
    ],
    correct: 2,
    explanation: "Four components: Product Tax Classes, Customer Tax Classes, Tax Rates (zones), and Tax Rules."
  },
  {
    question: "What is a Product Tax Class?",
    options: [
      "A tax rate",
      "A tag to group products for taxation",
      "A customer group",
      "A shipping method"
    ],
    correct: 1,
    explanation: "Product Tax Class is a tag that groups products for taxation purposes."
  },
  {
    question: "What is a Customer Tax Class?",
    options: [
      "A product category",
      "A tag allowing different tax treatment for customer groups",
      "A shipping address",
      "A payment method"
    ],
    correct: 1,
    explanation: "Customer Tax Class allows tweaking tax calculation for different customer groups."
  },
  {
    question: "What do Tax Rates (Zones) define?",
    options: [
      "Product categories",
      "Physical locations and tax rates to apply",
      "Customer groups",
      "Payment methods"
    ],
    correct: 1,
    explanation: "Tax Rates define physical locations (state, city, zip) and the rate to apply."
  },
  {
    question: "What do Tax Rules connect?",
    options: [
      "Products and customers",
      "Product Tax Class, Customer Tax Class, and Tax Rates",
      "Shipping and payment",
      "Orders and invoices"
    ],
    correct: 1,
    explanation: "Tax Rules bring together Product Tax Class, Customer Tax Class, and Tax Rates."
  },
  {
    question: "Where are Product Tax Classes configured in admin?",
    options: [
      "Catalog → Products",
      "Stores → Tax → Product Tax Classes",
      "Sales → Orders",
      "Marketing → Promotions"
    ],
    correct: 1,
    explanation: "Product Tax Classes are configured under Stores → Tax → Product Tax Classes."
  },
  {
    question: "Where are Tax Rules configured in admin?",
    options: [
      "Stores → Tax → Tax Rules",
      "Catalog → Tax",
      "Sales → Tax",
      "System → Tax"
    ],
    correct: 0,
    explanation: "Tax Rules are configured under Stores → Tax → Tax Rules."
  },
  {
    question: "What are the two primary elements of currency configuration?",
    options: [
      "Base and display",
      "Currency scope (price scope) and display currency",
      "Global and local",
      "Store and website"
    ],
    correct: 1,
    explanation: "Currency scope (price scope) and store's display currency are the two primary elements."
  },
  {
    question: "What does Currency Scope (Price Scope) define?",
    options: [
      "Shipping rates",
      "Tax rates",
      "Scope of base currency and how many prices a product can have",
      "Customer groups"
    ],
    correct: 2,
    explanation: "Currency scope defines whether products have one global price or price per website."
  },
  {
    question: "What are the two options for Currency Scope?",
    options: [
      "Store and Website",
      "Global and Website",
      "Global and Store",
      "Website and Store View"
    ],
    correct: 1,
    explanation: "Currency scope can be Global (one price) or Website (price per website)."
  },
  {
    question: "If Currency Scope is Global, how many prices can a product have?",
    options: [
      "One per store view",
      "One per website",
      "One global price",
      "Unlimited"
    ],
    correct: 2,
    explanation: "Global currency scope means one price for all websites."
  },
  {
    question: "If Currency Scope is Website, how many prices can a product have?",
    options: [
      "One global price",
      "One per website",
      "One per store view",
      "Unlimited"
    ],
    correct: 1,
    explanation: "Website currency scope allows one price per website."
  },
  {
    question: "What scope does Display Currency have?",
    options: [
      "Global",
      "Website",
      "Store (Store View)",
      "Product"
    ],
    correct: 2,
    explanation: "Display currency has Store scope (Store View level)."
  },
  {
    question: "How is Display Currency calculated?",
    options: [
      "Manually entered",
      "Copied from base currency",
      "Applying currency rates to base currency",
      "Random"
    ],
    correct: 2,
    explanation: "Display currency is calculated by applying currency rates to the base currency."
  },
  {
    question: "Where is Currency Scope configured?",
    options: [
      "Stores → Configuration → Catalog → Catalog → Price",
      "Stores → Configuration → General → Currency",
      "Sales → Configuration",
      "System → Currency"
    ],
    correct: 0,
    explanation: "Currency scope is under Stores → Configuration → Catalog → Catalog → Price → Catalog Price Scope."
  },
  {
    question: "Where is Display Currency configured?",
    options: [
      "Catalog → Price",
      "Stores → Configuration → General → Currency Setup",
      "Sales → Currency",
      "System → Currency"
    ],
    correct: 1,
    explanation: "Display currency is configured under Stores → Configuration → General → Currency Setup."
  },
  {
    question: "Which checkout type is the default single-page flow?",
    options: [
      "Multishipping",
      "Onepage Checkout",
      "Guest Checkout",
      "Express Checkout"
    ],
    correct: 1,
    explanation: "Onepage Checkout is the standard single-page checkout flow."
  },
  {
    question: "What does Multishipping Checkout allow?",
    options: [
      "Multiple payment methods",
      "Shipping items to multiple addresses in one order",
      "Multiple currencies",
      "Multiple stores"
    ],
    correct: 1,
    explanation: "Multishipping allows customers to ship items to multiple addresses."
  },
  {
    question: "What does Guest Checkout allow?",
    options: [
      "Free shipping",
      "Checkout without creating an account",
      "Multiple addresses",
      "Tax exemption"
    ],
    correct: 1,
    explanation: "Guest Checkout permits checkout without account creation."
  },
  {
    question: "What does Mini Cart display?",
    options: [
      "Full product catalog",
      "Cart summary in header on all pages",
      "Wishlist",
      "Order history"
    ],
    correct: 1,
    explanation: "Mini Cart shows a cart summary (item count, total) in the header."
  },
  {
    question: "Where are checkout options configured?",
    options: [
      "Catalog → Configuration",
      "Stores → Configuration → Sales → Checkout",
      "System → Checkout",
      "Marketing → Checkout"
    ],
    correct: 1,
    explanation: "Checkout options are under Stores → Configuration → Sales → Checkout."
  },
  {
    question: "Which component defines physical locations for tax?",
    options: [
      "Product Tax Class",
      "Customer Tax Class",
      "Tax Rates (Zones)",
      "Tax Rules"
    ],
    correct: 2,
    explanation: "Tax Rates (Zones) define physical locations and applicable tax rates."
  },
  {
    question: "Which component groups products for taxation?",
    options: [
      "Product Tax Class",
      "Customer Tax Class",
      "Tax Rates",
      "Tax Rules"
    ],
    correct: 0,
    explanation: "Product Tax Class groups products for taxation purposes."
  },
  {
    question: "Which component allows different tax treatment for customer groups?",
    options: [
      "Product Tax Class",
      "Customer Tax Class",
      "Tax Rates",
      "Tax Rules"
    ],
    correct: 1,
    explanation: "Customer Tax Class allows different tax treatment based on customer group."
  },
  {
    question: "What connects all tax components together?",
    options: [
      "Product Tax Class",
      "Customer Tax Class",
      "Tax Rates",
      "Tax Rules"
    ],
    correct: 3,
    explanation: "Tax Rules connect Product Tax Class, Customer Tax Class, and Tax Rates."
  },
  {
    question: "What happens to display prices when currency rates change?",
    options: [
      "Nothing",
      "Display currency prices recalculate based on new rates",
      "Base prices change",
      "All prices reset"
    ],
    correct: 1,
    explanation: "Display currency recalculates when currency rates are updated."
  },
  {
    question: "Can guest orders be converted to customer accounts later?",
    options: [
      "No, never",
      "Yes",
      "Only if multishipping is enabled",
      "Only for specific payment methods"
    ],
    correct: 1,
    explanation: "Guest orders can be converted to customer accounts after the fact."
  },
  {
    question: "What is the benefit of Guest Checkout?",
    options: [
      "Lower shipping costs",
      "Improves conversion by reducing friction",
      "Faster shipping",
      "Free tax"
    ],
    correct: 1,
    explanation: "Guest Checkout reduces barriers to purchase, improving conversion rates."
  },
  {
    question: "What scope level is used for assigning Customer Tax Classes?",
    options: [
      "Product level",
      "Customer group level",
      "Store level",
      "Order level"
    ],
    correct: 1,
    explanation: "Customer Tax Classes are assigned to customer groups."
  },
  {
    question: "Which is a typical Product Tax Class example?",
    options: [
      "Retail Customer",
      "Taxable Goods",
      "California",
      "Onepage Checkout"
    ],
    correct: 1,
    explanation: "Taxable Goods is an example of a Product Tax Class."
  }
];
