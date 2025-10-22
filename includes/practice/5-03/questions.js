window.questions = [
  {
    question: "Which two main steps comprise the checkout process?",
    options: [
      "Cart and payment",
      "Shipping and billing",
      "Address and confirmation",
      "Login and review"
    ],
    correct: 1,
    explanation: "Checkout consists of shipping (address + methods) and billing (address, payment, submit)."
  },
  {
    question: "Which layout file defines checkout steps?",
    options: [
      "checkout_cart_index.xml",
      "checkout_index_index.xml",
      "checkout_onepage_index.xml",
      "checkout_steps.xml"
    ],
    correct: 1,
    explanation: "checkout_index_index.xml defines the checkout steps and UiComponents configuration."
  },
  {
    question: "What technology renders the checkout UI?",
    options: [
      "jQuery widgets",
      "UiComponents configured via layout XML",
      "Plain HTML templates",
      "React components"
    ],
    correct: 1,
    explanation: "Checkout UI is rendered by UiComponents, unusually configured via layout XML."
  },
  {
    question: "How does Magento convert layout XML into UiComponents config?",
    options: [
      "Directly without transformation",
      "Backend code parses layout XML and converts it",
      "Frontend JS parses XML",
      "Varnish handles it"
    ],
    correct: 1,
    explanation: "Backend code transforms layout XML instructions into UiComponents configuration."
  },
  {
    question: "Which folder contains checkout JavaScript modules?",
    options: [
      "Magento/Checkout/view/frontend/web/js/",
      "Magento/Checkout/js/",
      "Magento/Checkout/view/js/",
      "Magento/Checkout/frontend/js/"
    ],
    correct: 0,
    explanation: "Checkout JS lives under view/frontend/web/js/."
  },
  {
    question: "What is the preferred method to customize checkout JavaScript?",
    options: [
      "Edit core files",
      "Override entire files",
      "Use JavaScript mixins",
      "Inline scripts"
    ],
    correct: 2,
    explanation: "Mixins allow extending/modifying core JS behavior without full overrides."
  },
  {
    question: "Which JS folder contains modules that send requests to the backend?",
    options: [
      "js/view/",
      "js/action/",
      "js/model/",
      "js/observer/"
    ],
    correct: 1,
    explanation: "js/action/ contains actions that prepare and send backend requests."
  },
  {
    question: "Which JS folder contains data storage and business logic?",
    options: [
      "js/action/",
      "js/model/",
      "js/view/",
      "js/controller/"
    ],
    correct: 1,
    explanation: "js/model/ handles data and business logic."
  },
  {
    question: "Which JS folder contains UI rendering components?",
    options: [
      "js/action/",
      "js/model/",
      "js/view/",
      "js/template/"
    ],
    correct: 2,
    explanation: "js/view/ contains view components that render the UI."
  },
  {
    question: "Which action module places the order?",
    options: [
      "place-order.js",
      "submit-order.js",
      "create-order.js",
      "checkout-order.js"
    ],
    correct: 0,
    explanation: "Magento/Checkout/view/frontend/web/js/action/place-order.js handles order placement."
  },
  {
    question: "What mechanism does Magento use to authenticate REST requests during checkout?",
    options: [
      "Bearer tokens",
      "Self-authentication tied to frontend session",
      "OAuth 2.0",
      "API keys"
    ],
    correct: 1,
    explanation: "Self-auth associates REST requests with the customer/guest frontend session."
  },
  {
    question: "Which file lists REST resources available during checkout?",
    options: [
      "Magento/Checkout/etc/webapi.xml",
      "Magento/Checkout/etc/rest.xml",
      "Magento/Checkout/etc/api.xml",
      "Magento/Checkout/etc/routes.xml"
    ],
    correct: 0,
    explanation: "webapi.xml defines REST endpoints for checkout operations."
  },
  {
    question: "What is the first step in order placement?",
    options: [
      "Send confirmation email",
      "Convert quote to order",
      "Process payment",
      "Invalidate quote"
    ],
    correct: 1,
    explanation: "First, convert Quote data into Order, OrderItem, OrderPayment, OrderAddress objects."
  },
  {
    question: "Which method converts quote to order?",
    options: [
      "QuoteManagement::placeOrder()",
      "QuoteManagement::submitQuote()",
      "Quote::toOrder()",
      "OrderConverter::convert()"
    ],
    correct: 1,
    explanation: "QuoteManagement::submitQuote() orchestrates quote-to-order conversion."
  },
  {
    question: "Which classes handle payment processing during order placement?",
    options: [
      "Quote and QuotePayment",
      "Order and Order\\Payment",
      "Checkout and CheckoutPayment",
      "Cart and CartPayment"
    ],
    correct: 1,
    explanation: "\\Magento\\Sales\\Model\\Order and \\Magento\\Sales\\Model\\Order\\Payment handle payment."
  },
  {
    question: "Which event fires after the order transaction commits?",
    options: [
      "sales_order_place_after",
      "checkout_submit_all_after",
      "order_save_after",
      "checkout_onepage_controller_success_action"
    ],
    correct: 1,
    explanation: "checkout_submit_all_after fires after transaction commit, safe for custom logic."
  },
  {
    question: "Why is checkout_submit_all_after preferred for post-order operations?",
    options: [
      "It fires before payment",
      "It fires after transaction commit, won't break payment/order save",
      "It's faster",
      "It runs on cron"
    ],
    correct: 1,
    explanation: "Firing after commit ensures your code won't disrupt order saving or payment."
  },
  {
    question: "What happens to the quote after order placement?",
    options: [
      "It's deleted",
      "It's invalidated (marked inactive)",
      "It's converted to a wishlist",
      "Nothing"
    ],
    correct: 1,
    explanation: "The quote is invalidated so it won't reappear as an active cart."
  },
  {
    question: "Can Magento automatically create an invoice after order placement?",
    options: [
      "No, never",
      "Yes, depending on payment method and configuration",
      "Only for virtual products",
      "Only for guest orders"
    ],
    correct: 1,
    explanation: "Some payment methods and configs trigger automatic invoicing."
  },
  {
    question: "Which strategy is best to change checkout UI rendering?",
    options: [
      "Edit vendor files",
      "Modify checkout_index_index.xml or mixin js/view/ modules",
      "Use di.xml preferences only",
      "Disable FPC"
    ],
    correct: 1,
    explanation: "Layout XML or JS mixins on view modules are the standard approaches."
  },
  {
    question: "Which strategy is best to alter data sent to backend during checkout?",
    options: [
      "Mixin js/action/ or js/model/ modules",
      "Edit templates",
      "Change CSS",
      "Use observers only"
    ],
    correct: 0,
    explanation: "Mixin actions/models to modify data or request handling."
  },
  {
    question: "Which shipping step substeps exist?",
    options: [
      "Address and methods",
      "Address only",
      "Methods only",
      "Address, methods, and review"
    ],
    correct: 0,
    explanation: "Shipping step includes address entry and shipping method selection."
  },
  {
    question: "Which billing substeps exist?",
    options: [
      "Address only",
      "Payment only",
      "Address, payment method, and order submission",
      "Address and review"
    ],
    correct: 2,
    explanation: "Billing includes address, payment selection, and final submission."
  },
  {
    question: "What is unusual about checkout UiComponents configuration?",
    options: [
      "They use JSON",
      "They are configured via layout XML, requiring backend parsing",
      "They require plugins",
      "They run on cron"
    ],
    correct: 1,
    explanation: "UiComponents via layout XML is atypical; Magento parses and converts it."
  },
  {
    question: "Which approach is best for adding a custom checkout step?",
    options: [
      "Edit core checkout files",
      "Add a step via layout XML and JS components",
      "Use di.xml only",
      "Create a new controller"
    ],
    correct: 1,
    explanation: "Define the step in layout XML and implement the JS component."
  },
  {
    question: "Where should you look if you need to customize how order data is prepared before submission?",
    options: [
      "js/view/",
      "js/action/ and js/model/",
      "layout XML only",
      "CSS files"
    ],
    correct: 1,
    explanation: "Actions and models prepare and send data to backend."
  },
  {
    question: "What does QuoteManagement::submitQuote() use to convert quote to order?",
    options: [
      "Plugins",
      "Converter classes",
      "Observers",
      "Cron jobs"
    ],
    correct: 1,
    explanation: "Converter classes map Quote entities to Order entities."
  },
  {
    question: "Can confirmation emails be sent asynchronously?",
    options: [
      "No, always synchronous",
      "Yes, can be handled by cron jobs",
      "Only for guest orders",
      "Only for virtual products"
    ],
    correct: 1,
    explanation: "Email sending can be deferred to cron for performance."
  },
  {
    question: "Which class orchestrates order placement?",
    options: [
      "\\Magento\\Checkout\\Model\\Session",
      "\\Magento\\Quote\\Model\\QuoteManagement",
      "\\Magento\\Sales\\Model\\Order",
      "\\Magento\\Checkout\\Model\\Cart"
    ],
    correct: 1,
    explanation: "QuoteManagement handles submitQuote() which orchestrates conversion and placement."
  },
  {
    question: "What happens if broken JS prevents checkout completion?",
    options: [
      "Order still processes",
      "It's a severe issue preventing order placement",
      "Magento auto-fixes it",
      "Backend handles it"
    ],
    correct: 1,
    explanation: "Broken JS blocks the frontend flow, preventing customers from completing checkout."
  }
];
