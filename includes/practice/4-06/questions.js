window.questions = [
  {
    question: "What is the main purpose of Magento's Customer Data (Private Content) framework?",
    options: [
      "Disable caching for personalized pages",
      "Allow full page caching while rendering personalized UI via JS",
      "Store sessions on the server for all templates",
      "Provide SQL access to customer tables"
    ],
    correct: 1,
    explanation: "Customer Data enables FPC/Varnish by moving personalized rendering to the client using localStorage and AJAX."
  },
  {
    question: "Where is user-specific private content persisted on the client?",
    options: [
      "sessionStorage",
      "Cookies",
      "localStorage",
      "IndexedDB"
    ],
    correct: 2,
    explanation: "Magento persists section data in localStorage and hydrates it with AJAX."
  },
  {
    question: "Which JS module provides access to private content sections?",
    options: [
      "Magento_Ui/js/modal/modal",
      "Magento_Customer/js/customer-data",
      "Magento_Checkout/js/action/add-to-cart",
      "Magento_Catalog/js/list"
    ],
    correct: 1,
    explanation: "Use Magento_Customer/js/customer-data to get, subscribe, and reload sections."
  },
  {
    question: "What does customerData.get('cart') return?",
    options: [
      "A plain object",
      "A Promise",
      "A Knockout observable",
      "A DOM element"
    ],
    correct: 2,
    explanation: "customerData.get returns a KO observable; call it to read and subscribe for changes."
  },
  {
    question: "Which method forces refreshing specific sections from the server?",
    options: [
      "customerData.refresh()",
      "customerData.reload(['cart', 'customer'], true)",
      "customerData.fetchAll()",
      "customerData.invalidate()"
    ],
    correct: 1,
    explanation: "customerData.reload(sectionNames, forceNew) triggers an AJAX load of the sections."
  },
  {
    question: "What endpoint serves private content section JSON?",
    options: [
      "/customer/section/info",
      "/customer/section/get",
      "/customer/section/load",
      "/rest/V1/customer/sections"
    ],
    correct: 2,
    explanation: "Magento loads sections via /customer/section/load."
  },
  {
    question: "Why should you avoid reading session values directly in phtml for greetings/minicart?",
    options: [
      "Because PHP can't read sessions",
      "Because it breaks FPC and Varnish caching",
      "Because JavaScript is faster",
      "Because sessions are deprecated"
    ],
    correct: 1,
    explanation: "Session-dependent templates prevent page HTML caching."
  },
  {
    question: "Which file configures which backend actions invalidate which sections?",
    options: [
      "etc/di.xml",
      "etc/sections.xml",
      "etc/frontend/routes.xml",
      "etc/events.xml"
    ],
    correct: 1,
    explanation: "sections.xml maps actions (like add-to-cart) to sections (like cart) for invalidation."
  },
  {
    question: "What happens when a matching POST/PUT request is detected by the customer data listener?",
    options: [
      "All sections are cleared",
      "Configured sections are invalidated and reloaded",
      "Cookies are deleted",
      "localStorage is disabled"
    ],
    correct: 1,
    explanation: "The JS listener invalidates sections mapped to that action; they will reload."
  },
  {
    question: "What is a canonical example of customer data usage in core?",
    options: [
      "Magento_Catalog/js/list",
      "Magento/Checkout/view/frontend/web/js/view/minicart.js",
      "Magento_Ui/js/modal/modal",
      "Magento_Customer/js/model/authentication-popup"
    ],
    correct: 1,
    explanation: "The minicart view model uses customer data to render cart content/count."
  },
  {
    question: "Select the correct way to subscribe to cart changes:",
    options: [
      "customerData.get('cart').on('change', cb)",
      "customerData.get('cart').subscribe(cb)",
      "customerData.on('cart', cb)",
      "customerData.cart.subscribe(cb)"
    ],
    correct: 1,
    explanation: "KO observable API uses .subscribe(callback)."
  },
  {
    question: "What does the second parameter of customerData.reload([...], true) indicate?",
    options: [
      "Reload asynchronously",
      "Clear storage before reload",
      "Force fetching fresh data",
      "Throttle reload"
    ],
    correct: 2,
    explanation: "The boolean can force retrieving fresh data from the server."
  },
  {
    question: "How should a personalized greeting be initialized on a cached page?",
    options: [
      "Read from PHP session in phtml",
      "Use data-mage-init/x-magento-init with a module that uses customerData",
      "Require inline JS in head",
      "Disable FPC"
    ],
    correct: 1,
    explanation: "Use customerData in a frontend module and bootstrap it with Magento initializers."
  },
  {
    question: "Which storage is used to persist sections across page reloads?",
    options: [
      "localStorage",
      "Cookies",
      "sessionStorage",
      "Memory only"
    ],
    correct: 0,
    explanation: "Section JSON is stored in localStorage with TTL and synced to observables."
  },
  {
    question: "What is defined inside etc/sections.xml?",
    options: [
      "List of sections and invalidating actions",
      "RequireJS paths",
      "GraphQL schema",
      "ACL resources"
    ],
    correct: 0,
    explanation: "sections.xml associates backend actions to private content sections."
  },
  {
    question: "Which is NOT a typical section name?",
    options: [
      "cart",
      "customer",
      "messages",
      "routes"
    ],
    correct: 3,
    explanation: "routes is unrelated; typical sections include cart, customer, messages, wishlist (etc.)."
  },
  {
    question: "What triggers automatic reload of expired/missing sections?",
    options: [
      "Full page reload only",
      "Magento frontend mechanism detects TTL/absence and calls /customer/section/load",
      "Developer must always call reload manually",
      "Varnish ESI"
    ],
    correct: 1,
    explanation: "Frontend auto-fetches sections when TTL expires or data is missing."
  },
  {
    question: "What should you do after custom AJAX that changes the minicart content?",
    options: [
      "Call customerData.reload(['cart'], true)",
      "Call customerData.reset()",
      "Clear localStorage",
      "Disable FPC"
    ],
    correct: 0,
    explanation: "Force reload the 'cart' section so UI updates immediately."
  },
  {
    question: "Which statement about FPC is true with customer data?",
    options: [
      "FPC must be disabled",
      "Entire page becomes private",
      "FPC can stay enabled; only small parts are rendered client-side",
      "Only homepage can be cached"
    ],
    correct: 2,
    explanation: "Private Content allows FPC by moving personalization to the client."
  },
  {
    question: "Which file format is used for sections configuration?",
    options: [
      "YAML",
      "XML (sections.xml)",
      "JSON",
      "PHP"
    ],
    correct: 1,
    explanation: "Sections are described in XML under etc/sections.xml."
  },
  {
    question: "How do you read the current value from a section observable?",
    options: [
      "observable.value",
      "observable.get()",
      "observable()",
      "observable.current"
    ],
    correct: 2,
    explanation: "KO observables are invoked like functions to read/write."
  },
  {
    question: "Which action commonly invalidates the 'customer' section?",
    options: [
      "catalog_category_view",
      "customer_account_loginpost",
      "cms_index_index",
      "sales_order_place"
    ],
    correct: 1,
    explanation: "Login and logout actions typically invalidate the customer section."
  },
  {
    question: "Which area implements the JS listener that invalidates sections on POST/PUT?",
    options: [
      "Backend only",
      "Frontend JavaScript",
      "Varnish",
      "CRON script"
    ],
    correct: 1,
    explanation: "A frontend JS listener monitors XHRs to invalidate configured sections."
  },
  {
    question: "Which is a typical use case of customer data?",
    options: [
      "Theme variable overrides",
      "Product list toolbar",
      "Minicart content and count",
      "RequireJS alias mapping"
    ],
    correct: 2,
    explanation: "Minicart relies on private content for up-to-date cart info."
  },
  {
    question: "Which practice helps keep private content payload light?",
    options: [
      "Store entire HTML in sections",
      "Store minimal JSON and render via templates",
      "Duplicate data across sections",
      "Disable TTL"
    ],
    correct: 1,
    explanation: "Keep JSON compact and render client-side for efficiency."
  },
  {
    question: "What is the recommended way to render a welcome message on a cached page?",
    options: [
      "PHP session in template",
      "customerData 'customer' section + initializer module",
      "Disable cache for header",
      "Use HTTP cookies directly"
    ],
    correct: 1,
    explanation: "Use customerData to render after page load without breaking FPC."
  },
  {
    question: "Which of the following can subscribe to updates when private content changes?",
    options: [
      "Any KO observable returned by customerData.get(name)",
      "Only the 'cart' section",
      "Only the 'customer' section",
      "None; polling required"
    ],
    correct: 0,
    explanation: "All sections returned as observables support .subscribe()."
  },
  {
    question: "What should you configure to invalidate 'messages' after adding to cart?",
    options: [
      "etc/events.xml",
      "etc/sections.xml mapping checkout_cart_add to messages",
      "requirejs-config.js",
      "system.xml"
    ],
    correct: 1,
    explanation: "Declare action-to-section mapping in sections.xml."
  },
  {
    question: "Which statement best describes sections?",
    options: [
      "Server-rendered blocks",
      "Client-rendered JSON chunks stored in localStorage",
      "Cookies",
      "Server-side sessions"
    ],
    correct: 1,
    explanation: "Sections are JSON blobs persisted on the client and exposed as KO observables."
  },
  {
    question: "What happens if a section is missing in localStorage on page load?",
    options: [
      "Magento does nothing",
      "Magento triggers an AJAX load to fetch it",
      "The page fails to render",
      "FPC is disabled"
    ],
    correct: 1,
    explanation: "Frontend mechanism loads missing/expired sections automatically."
  }
];
