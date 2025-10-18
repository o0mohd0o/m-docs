window.questions = [
  {
    question: "What are the two main parts of Magento's routing system?",
    options: [
      "Frontend and Backend routing",
      "Standard routing and URL Rewrites",
      "Dynamic and Static routing",
      "Module and Theme routing"
    ],
    correct: 1,
    explanation: "Magento's routing system consists of two parts: Standard routing (three-chunk URLs) and URL Rewrites (SEO-friendly URLs)."
  },
  {
    question: "What is the standard URL format in Magento?",
    options: [
      "module/controller/action",
      "frontname/controller/action",
      "route/path/method",
      "area/module/action"
    ],
    correct: 1,
    explanation: "Standard Magento URLs use the format: frontname/controller/action (e.g., catalog/product/view)."
  },
  {
    question: "Where is frontend routing configured?",
    options: [
      "etc/routes.xml",
      "etc/config.xml",
      "etc/frontend/routes.xml",
      "etc/webapi/routes.xml"
    ],
    correct: 2,
    explanation: "Frontend routes are configured in etc/frontend/routes.xml (adminhtml uses etc/adminhtml/routes.xml)."
  },
  {
    question: "What class processes all routing requests in Magento?",
    options: [
      "\\Magento\\Framework\\App\\Router",
      "\\Magento\\Framework\\App\\FrontController",
      "\\Magento\\Framework\\App\\Request",
      "\\Magento\\Framework\\App\\ActionFactory"
    ],
    correct: 1,
    explanation: "The Front Controller (\\Magento\\Framework\\App\\FrontController) loops through registered routers to process requests."
  },
  {
    question: "What interface must custom routers implement?",
    options: [
      "RouterInterface",
      "RouteInterface",
      "RequestInterface",
      "ControllerInterface"
    ],
    correct: 0,
    explanation: "Custom routers must implement \\Magento\\Framework\\App\\RouterInterface with a match() method."
  },
  {
    question: "What should the match() method return if the router handles the URL?",
    options: [
      "Boolean true",
      "Array of parameters",
      "ActionInterface instance",
      "String with controller path"
    ],
    correct: 2,
    explanation: "The match() method returns an ActionInterface instance if matched, or null if not matched."
  },
  {
    question: "What should the match() method return if the router does NOT handle the URL?",
    options: [
      "Boolean false",
      "null",
      "Empty array",
      "Exception"
    ],
    correct: 1,
    explanation: "Return null if the router doesn't handle the URL, allowing the next router in the list to try."
  },
  {
    question: "Where are custom routers registered?",
    options: [
      "routes.xml",
      "config.xml",
      "di.xml",
      "module.xml"
    ],
    correct: 2,
    explanation: "Custom routers are registered in di.xml by injecting them into Magento\\Framework\\App\\RouterList."
  },
  {
    question: "What is the typical sortOrder priority for custom routers?",
    options: [
      "10-20 (before base router)",
      "30-50 (between base and URL rewrite)",
      "60-80 (after URL rewrite)",
      "100+ (last priority)"
    ],
    correct: 1,
    explanation: "Custom routers typically use sortOrder 30-50 to run after base router (20) but before CMS (60) and URL rewrite (40)."
  },
  {
    question: "For URL 'catalog/product/view', what is the controller file path?",
    options: [
      "Controller/Catalog/Product/View.php",
      "Controller/Product/View.php",
      "Controller/View.php",
      "Product/Controller/View.php"
    ],
    correct: 1,
    explanation: "The path is Controller/Product/View.php where 'Product' is the controller directory and 'View' is the action class."
  },
  {
    question: "What is the default controller name if not specified in URL?",
    options: [
      "Default",
      "Index",
      "Main",
      "Home"
    ],
    correct: 1,
    explanation: "If controller is not specified, Magento uses 'Index' as the default controller name."
  },
  {
    question: "What is the default action name if not specified in URL?",
    options: [
      "execute",
      "default",
      "index",
      "main"
    ],
    correct: 2,
    explanation: "If action is not specified, Magento uses 'index' as the default action name (Index.php)."
  },
  {
    question: "What is the priority (sortOrder) of the Base router?",
    options: [
      "10",
      "20",
      "30",
      "40"
    ],
    correct: 1,
    explanation: "The Base router (handles standard routes) has a sortOrder of 20."
  },
  {
    question: "What is the priority (sortOrder) of the URL Rewrite router?",
    options: [
      "20",
      "30",
      "40",
      "60"
    ],
    correct: 2,
    explanation: "The URL Rewrite router has a sortOrder of 40, running after base router but before CMS router."
  },
  {
    question: "What is the priority (sortOrder) of the CMS router?",
    options: [
      "40",
      "50",
      "60",
      "80"
    ],
    correct: 2,
    explanation: "The CMS router has a sortOrder of 60, handling CMS pages after standard and rewrite routers."
  },
  {
    question: "What does a lower sortOrder number mean for routers?",
    options: [
      "Lower priority, executes later",
      "Higher priority, executes earlier",
      "No effect on execution order",
      "Only affects error handling"
    ],
    correct: 1,
    explanation: "Lower sortOrder numbers execute earlier. Base router (20) runs before CMS router (60)."
  },
  {
    question: "What request method is used to set the module name in a router?",
    options: [
      "$request->setModule()",
      "$request->setModuleName()",
      "$request->module()",
      "$request->setModuleId()"
    ],
    correct: 1,
    explanation: "Use $request->setModuleName('modulename') to set the module that will handle the request."
  },
  {
    question: "What class is commonly used for forwarding to another controller?",
    options: [
      "Magento\\Framework\\App\\Action\\Forward",
      "Magento\\Framework\\App\\Action\\Redirect",
      "Magento\\Framework\\Controller\\Forward",
      "Magento\\Framework\\App\\Forward"
    ],
    correct: 0,
    explanation: "Use Magento\\Framework\\App\\Action\\Forward to forward the request to another controller/action."
  },
  {
    question: "When creating a custom URL schema, what approach is required?",
    options: [
      "Modify core routing files",
      "Create URL rewrites in database",
      "Create a custom router class",
      "Use layout XML configuration"
    ],
    correct: 2,
    explanation: "Custom URL schemas (like product-123) require creating a custom router that implements RouterInterface."
  },
  {
    question: "Which router ID is used for frontend routes in routes.xml?",
    options: [
      "frontend",
      "standard",
      "default",
      "web"
    ],
    correct: 1,
    explanation: "Frontend routes use <router id=\"standard\"> in routes.xml, while admin uses <router id=\"admin\">."
  },
  {
    question: "What happens if NO router returns an ActionInterface?",
    options: [
      "Error is thrown immediately",
      "Default router shows 404 page",
      "Request is redirected to homepage",
      "Front controller retries"
    ],
    correct: 1,
    explanation: "If no router matches, the Default router (sortOrder 100) handles it and typically shows a 404 page."
  },
  {
    question: "Can multiple modules handle the same frontname in routes.xml?",
    options: [
      "No, frontnames must be unique",
      "Yes, using before/after attributes",
      "Yes, but only in different areas",
      "Only with special configuration"
    ],
    correct: 1,
    explanation: "Multiple modules can handle the same frontname using before/after attributes to set priority order."
  }
];
