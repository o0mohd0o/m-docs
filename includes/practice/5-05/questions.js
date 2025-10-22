window.questions = [
  {
    question: "Which shipping methods are considered offline?",
    options: [
      "FlatRate, TableRate, Free Shipping, In-Store Delivery",
      "UPS, FedEx, USPS",
      "PayPal, Braintree",
      "All carrier methods"
    ],
    correct: 0,
    explanation: "Offline shipping methods don't perform online API requests: FlatRate, TableRate, Free Shipping, In-Store."
  },
  {
    question: "What do offline shipping methods NOT do?",
    options: [
      "Display shipping options",
      "Perform online API requests",
      "Calculate rates",
      "Apply to checkout"
    ],
    correct: 1,
    explanation: "Offline methods calculate rates locally without external API calls."
  },
  {
    question: "Which shipping method requires uploading a CSV file with rate data?",
    options: [
      "Flat Rate",
      "Table Rate",
      "Free Shipping",
      "In-Store Delivery"
    ],
    correct: 1,
    explanation: "Table Rate uses a CSV file with rates based on conditions like weight, destination, subtotal."
  },
  {
    question: "Where is the Table Rate CSV file uploaded in admin?",
    options: [
      "Catalog → Products",
      "Stores → Configuration → Sales → Shipping Methods → Table Rates",
      "Marketing → Promotions",
      "System → Import/Export"
    ],
    correct: 1,
    explanation: "Table Rate CSV is uploaded via Stores → Configuration → Sales → Shipping Methods."
  },
  {
    question: "What do online shipping methods (carriers) require?",
    options: [
      "Only a name",
      "API credentials to request rates",
      "No configuration",
      "Only flat rates"
    ],
    correct: 1,
    explanation: "Online carriers need API credentials to fetch real-time shipping rates."
  },
  {
    question: "Which are examples of online shipping carriers?",
    options: [
      "Table Rate, Flat Rate",
      "UPS, FedEx, USPS, DHL",
      "Check, Money Order",
      "PayPal, Braintree"
    ],
    correct: 1,
    explanation: "UPS, FedEx, USPS, DHL are carriers that provide real-time rates via API."
  },
  {
    question: "How many types of payment methods exist in Magento?",
    options: [
      "Two: online and offline",
      "Three: offline, gateway, hosted",
      "Four: offline, gateway, hosted, redirect",
      "One: payment methods are all the same"
    ],
    correct: 1,
    explanation: "Three types: offline (external), gateway (API on Magento), hosted (redirect)."
  },
  {
    question: "Which is an offline payment method?",
    options: [
      "PayPal Express",
      "Check/Money Order",
      "Braintree",
      "Authorize.net"
    ],
    correct: 1,
    explanation: "Check/Money Order is offline—payment occurs outside Magento."
  },
  {
    question: "Which are offline payment methods?",
    options: [
      "Check/Money Order, Bank Transfer, Cash on Delivery, Purchase Order",
      "PayPal, Braintree, Stripe",
      "UPS, FedEx",
      "Authorize.net, CyberSource"
    ],
    correct: 0,
    explanation: "Offline methods: Check, Bank Transfer, Zero Subtotal, Cash on Delivery, Purchase Order."
  },
  {
    question: "What do gateway payment methods do?",
    options: [
      "Redirect to external site",
      "Send remote API request to payment provider without leaving Magento",
      "Do nothing during checkout",
      "Only authorize, never capture"
    ],
    correct: 1,
    explanation: "Gateway methods process payments via API while customer stays on Magento site."
  },
  {
    question: "What do hosted payment methods do?",
    options: [
      "Process payment on Magento",
      "Redirect customer to external site for payment, then return",
      "Do nothing",
      "Only work offline"
    ],
    correct: 1,
    explanation: "Hosted methods redirect to external site (e.g., PayPal), then return after payment."
  },
  {
    question: "Which is an example of a hosted payment method?",
    options: [
      "Check/Money Order",
      "PayPal Express Checkout",
      "Bank Transfer",
      "Zero Subtotal Checkout"
    ],
    correct: 1,
    explanation: "PayPal Express redirects to PayPal for payment, then returns to Magento."
  },
  {
    question: "What happened to online payment methods in Magento 2.4?",
    options: [
      "All were removed",
      "Most were removed except PayPal",
      "All remain in core",
      "They became offline"
    ],
    correct: 1,
    explanation: "Magento 2.4 removed most online methods from core, keeping PayPal."
  },
  {
    question: "What are the three principal payment actions?",
    options: [
      "Authorize only, Capture, Order",
      "Authorize, Refund, Void",
      "Capture, Invoice, Ship",
      "Order, Ship, Deliver"
    ],
    correct: 0,
    explanation: "The Payment class supports: Authorize only, Capture, Order."
  },
  {
    question: "What does 'Authorize only' payment action do?",
    options: [
      "Charges card immediately",
      "Authorizes funds without charging; no invoice; manual capture required",
      "Does nothing",
      "Auto-captures after 24 hours"
    ],
    correct: 1,
    explanation: "Authorize only reserves funds without charging; admin must manually capture via Invoice."
  },
  {
    question: "What does 'Capture' payment action do?",
    options: [
      "Only authorizes",
      "Charges card immediately and auto-creates invoice",
      "Does nothing",
      "Requires manual invoicing"
    ],
    correct: 1,
    explanation: "Capture charges the card and automatically creates an invoice."
  },
  {
    question: "What does 'Order' payment action do?",
    options: [
      "Authorizes funds",
      "Captures payment",
      "Does nothing; no invoice; admin must charge manually",
      "Auto-invoices"
    ],
    correct: 2,
    explanation: "Order action does nothing; admin must manually invoice and charge."
  },
  {
    question: "Which payment action requires the admin to manually hit 'Invoice' button?",
    options: [
      "Capture",
      "Authorize only",
      "Order",
      "Both Authorize only and Order"
    ],
    correct: 3,
    explanation: "Both Authorize only and Order require manual invoicing; Authorize then captures, Order charges from scratch."
  },
  {
    question: "Which payment action automatically creates an invoice?",
    options: [
      "Authorize only",
      "Capture",
      "Order",
      "None"
    ],
    correct: 1,
    explanation: "Capture auto-creates an invoice after charging the card."
  },
  {
    question: "What does 'Enable In-Context Checkout' for PayPal Express do?",
    options: [
      "Disables PayPal",
      "Improves UX by opening PayPal in modal/iframe without leaving Magento",
      "Forces redirect",
      "Only works offline"
    ],
    correct: 1,
    explanation: "In-Context keeps customer on Magento site while PayPal opens in overlay."
  },
  {
    question: "Which class handles payment actions?",
    options: [
      "\\Magento\\Checkout\\Model\\Payment",
      "\\Magento\\Sales\\Model\\Order\\Payment",
      "\\Magento\\Payment\\Model\\Method",
      "\\Magento\\Quote\\Model\\Payment"
    ],
    correct: 1,
    explanation: "\\Magento\\Sales\\Model\\Order\\Payment handles payment actions."
  },
  {
    question: "What do online payment methods typically use for subsequent operations?",
    options: [
      "Session data",
      "Tokens",
      "Cookies",
      "Cache"
    ],
    correct: 1,
    explanation: "Online methods use tokens for operations like authorize, capture, refund."
  },
  {
    question: "What is a benefit of Table Rate CSV upload knowledge?",
    options: [
      "It's not useful",
      "Great reference for implementing file uploads in system config",
      "Only works for shipping",
      "Deprecated feature"
    ],
    correct: 1,
    explanation: "Table Rate CSV upload is a good example of file upload in system configuration."
  },
  {
    question: "Which payment method is used for $0 orders?",
    options: [
      "Check/Money Order",
      "Zero Subtotal Checkout",
      "PayPal",
      "Bank Transfer"
    ],
    correct: 1,
    explanation: "Zero Subtotal Checkout handles orders with $0 total."
  },
  {
    question: "What must be configured for online carriers?",
    options: [
      "Only name",
      "API credentials, allowed methods, handling fees",
      "Nothing",
      "Only price"
    ],
    correct: 1,
    explanation: "Online carriers need credentials, method selection, handling fees, etc."
  },
  {
    question: "Which statement about gateway methods is true?",
    options: [
      "They redirect to external site",
      "They process payment via API while customer stays on Magento",
      "They do nothing",
      "They are always offline"
    ],
    correct: 1,
    explanation: "Gateway methods send API requests without redirecting the customer."
  },
  {
    question: "What happens in 'Order' payment action?",
    options: [
      "Funds are authorized",
      "Card is charged",
      "Nothing; admin must manually charge when invoicing",
      "Auto-capture after delay"
    ],
    correct: 2,
    explanation: "Order does nothing; no guarantee funds are available when admin invoices."
  },
  {
    question: "Where do you configure Free Shipping conditions?",
    options: [
      "Stores → Configuration → Sales → Shipping Methods → Free Shipping",
      "Marketing → Promotions",
      "Catalog → Products",
      "System → Cache"
    ],
    correct: 0,
    explanation: "Free Shipping is configured under Shipping Methods in Sales configuration."
  },
  {
    question: "Which payment action reserves funds without charging?",
    options: [
      "Capture",
      "Authorize only",
      "Order",
      "Refund"
    ],
    correct: 1,
    explanation: "Authorize only reserves (authorizes) funds without actually charging the card."
  },
  {
    question: "What is the functional difference between PayPal Express with and without In-Context?",
    options: [
      "In-Context is faster",
      "No functional difference; In-Context improves UX by staying on site",
      "In-Context doesn't redirect at all",
      "In-Context is offline"
    ],
    correct: 1,
    explanation: "Functionally similar; In-Context keeps customer on Magento for better UX."
  }
];
