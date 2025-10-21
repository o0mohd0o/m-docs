window.questions = [
  {
    question: "What does Magento ACL control?",
    options: [
      "Frontend catalog visibility",
      "Admin user permissions to resources/actions",
      "Price scope per website",
      "Cache access policies"
    ],
    correct: 1,
    explanation: "Access Control Lists (ACL) define which admin roles can access specific menu items, controllers, and actions."
  },
  {
    question: "Where do you declare new ACL resources?",
    options: [
      "etc/acl.xml",
      "etc/adminhtml/acl.xml",
      "view/adminhtml/ui_component/acl.xml",
      "etc/config.xml"
    ],
    correct: 0,
    explanation: "ACL resources are declared in etc/acl.xml and then referenced by adminhtml controllers and menus."
  },
  {
    question: "How to add a new Admin menu item?",
    options: [
      "etc/adminhtml/menu.xml",
      "etc/menu.xml",
      "view/adminhtml/menu.xml",
      "etc/adminhtml/routes.xml"
    ],
    correct: 0,
    explanation: "Admin menus are declared in etc/adminhtml/menu.xml and reference ACL resources and routes."
  },
  {
    question: "Which file defines Admin router frontName and module for controllers?",
    options: [
      "etc/routes.xml",
      "etc/adminhtml/routes.xml",
      "etc/di.xml",
      "etc/adminhtml/system.xml"
    ],
    correct: 1,
    explanation: "Admin routes are defined in etc/adminhtml/routes.xml with <router id=\"admin\">."
  },
  {
    question: "What protects Admin forms against CSRF?",
    options: [
      "Form key token",
      "reCAPTCHA",
      "X-Frame-Options header",
      "Content Security Policy"
    ],
    correct: 0,
    explanation: "Magento includes a form key to protect against CSRF attacks on state-changing POST requests."
  },
  {
    question: "How to add a new system configuration section (Stores > Configuration)?",
    options: [
      "etc/config.xml",
      "etc/adminhtml/system.xml",
      "etc/adminhtml/menu.xml",
      "etc/acl.xml"
    ],
    correct: 1,
    explanation: "System configuration UI is defined in etc/adminhtml/system.xml with sections/groups/fields mapped to config paths."
  },
  {
    question: "A UI Component grid needs a mass action. Where is it configured?",
    options: [
      "view/adminhtml/layout/*.xml",
      "view/adminhtml/ui_component/<grid>.xml",
      "etc/di.xml",
      "etc/adminhtml/menu.xml"
    ],
    correct: 1,
    explanation: "UI Components are described in view/adminhtml/ui_component XML, including dataSource, columns, and massActions."
  },
  {
    question: "Which header helps mitigate clickjacking in the Admin?",
    options: [
      "Strict-Transport-Security",
      "X-Frame-Options / frame-ancestors (CSP)",
      "ETag",
      "X-Powered-By"
    ],
    correct: 1,
    explanation: "X-Frame-Options or frame-ancestors directive in CSP helps prevent framing and clickjacking."
  },
  {
    question: "How to authorize an Admin controller action?",
    options: [
      "Override dispatch() method",
      "Implement _isAllowed() to check ACL resource",
      "Add before plugin on execute()",
      "Use dependency injection of an Authorizer"
    ],
    correct: 1,
    explanation: "Admin controllers typically implement _isAllowed() returning $this->_authorization->isAllowed('<acl_id>')."
  },
  {
    question: "Where to configure 2FA or password policies for Admin?",
    options: [
      "env.php",
      "Stores > Configuration > Security section",
      "app/etc/config.php",
      "adminhtml/di.xml"
    ],
    correct: 1,
    explanation: "Security-related settings are available in Stores > Configuration under the Security section or modules like Two Factor Auth."
  }
];
