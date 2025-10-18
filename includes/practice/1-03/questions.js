window.questions = [
  {
    question: "What is the primary purpose of the <preference> node in di.xml?",
    options: [
      "To modify constructor arguments",
      "To substitute classes or implement interfaces",
      "To create virtual types",
      "To register plugins"
    ],
    correct: 1,
    explanation: "The <preference> node substitutes the requested class or interface (for attribute) with a different concrete class (type attribute). Use it to implement interfaces or override classes."
  },
  {
    question: "Which xsi:type should be used to inject another class as a dependency?",
    options: [
      "string",
      "array",
      "object",
      "class"
    ],
    correct: 2,
    explanation: "Use xsi:type=\"object\" to inject another class or virtual type as a dependency. The six xsi:type values are: string, boolean, number, array, object, and const."
  },
  {
    question: "What is a virtualType in Magento 2?",
    options: [
      "An abstract class",
      "A class with the same code but different constructor arguments",
      "A temporary class stored in memory",
      "An interface implementation"
    ],
    correct: 1,
    explanation: "A virtualType creates a new 'class' with the same code as another class, but with different dependencies passed to its constructor. Perfect for configuration variations."
  },
  {
    question: "Where can di.xml files be placed to apply area-specific configurations?",
    options: [
      "etc/, etc/adminhtml/, etc/frontend/",
      "app/code/Area/",
      "Only in etc/",
      "config/, admin/, frontend/"
    ],
    correct: 0,
    explanation: "di.xml files can be placed in etc/ (global), etc/adminhtml/ (admin area only), or etc/frontend/ (storefront only) to apply configurations to specific areas."
  },
  {
    question: "When plugins are configured for a class, what does Magento's Object Manager create?",
    options: [
      "A factory class",
      "An interceptor class in the generated/ directory",
      "A proxy class",
      "A virtual type"
    ],
    correct: 1,
    explanation: "When plugins are configured, the Object Manager creates an Interceptor class (e.g., ClassName\\Interceptor) in the generated/ directory. This interceptor triggers the before, after, and around plugins."
  },
  {
    question: "What type of dependency injection does Magento 2 use?",
    options: [
      "Setter injection",
      "Constructor injection",
      "Property injection",
      "Method injection"
    ],
    correct: 1,
    explanation: "Magento 2 specifically uses constructor dependency injection. Classes declare their dependencies in the __construct method, and the DI system delivers the necessary instances."
  },
  {
    question: "How many xsi:type values are available in di.xml?",
    options: [
      "4",
      "5",
      "6",
      "7"
    ],
    correct: 2,
    explanation: "There are 6 xsi:type values: string, boolean, number, array, object, and const. Each serves a specific purpose for passing different types of data to constructors."
  },
  {
    question: "What's the main problem with using <preference> nodes?",
    options: [
      "They are slow to execute",
      "Only ONE preference can exist per class - conflicts are common",
      "They don't work in production mode",
      "They require cache clearing every time"
    ],
    correct: 1,
    explanation: "The main issue with preferences is that only ONE can exist for a class system-wide. If two modules try to override the same class with preferences, you'll have a conflict. This is why plugins are often preferred."
  }
];
