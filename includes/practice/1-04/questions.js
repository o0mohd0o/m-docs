window.questions = [
  {
    question: "Which customization method is RECOMMENDED for most Magento customizations?",
    options: [
      "Preferences",
      "Plugins",
      "Event Observers",
      "Direct class overrides"
    ],
    correct: 1,
    explanation: "Plugins are the recommended tool for adjusting core functionality. They allow multiple customizations to coexist, have controlled execution order, and are non-invasive."
  },
  {
    question: "What is the sortOrder execution pattern for 'before' plugins?",
    options: [
      "Highest to lowest",
      "Lowest to highest",
      "Random order",
      "Alphabetically by plugin name"
    ],
    correct: 1,
    explanation: "Before plugins execute from lowest sortOrder to highest sortOrder. After plugins execute in reverse: highest to lowest."
  },
  {
    question: "Which of the following CANNOT have plugins applied to them?",
    options: [
      "Public methods only",
      "Final methods, private/protected methods, static methods, and constructors",
      "Methods with more than 5 parameters",
      "Methods that return void"
    ],
    correct: 1,
    explanation: "Plugins cannot be applied to: final methods/classes, private or protected methods, static methods, or constructors. They only work with public, non-static, non-final methods."
  },
  {
    question: "What must a before plugin return?",
    options: [
      "The modified result",
      "True or false",
      "An array of parameters",
      "Null"
    ],
    correct: 2,
    explanation: "Before plugins must return the parameters as an array. This array is then passed to the original method. Example: return [$product, $saveOptions];"
  },
  {
    question: "What is the main problem with using preferences?",
    options: [
      "They are slow to execute",
      "Only ONE preference can exist per class - conflicts are common",
      "They don't work in production mode",
      "They require cache clearing every time"
    ],
    correct: 1,
    explanation: "Only ONE preference can exist for a class system-wide. If two modules try to override the same class with preferences, you'll have a conflict. This is why plugins are preferred."
  },
  {
    question: "What interface must event observers implement?",
    options: [
      "EventInterface",
      "ObserverInterface",
      "ListenerInterface",
      "HandlerInterface"
    ],
    correct: 1,
    explanation: "Event observers must implement Magento\\Framework\\Event\\ObserverInterface and contain an execute(Observer $observer) method."
  },
  {
    question: "Which automatic model event is triggered AFTER a database transaction commits?",
    options: [
      "{prefix}_save_after",
      "{prefix}_save_commit_after",
      "{prefix}_save_transaction_after",
      "{prefix}_commit_after"
    ],
    correct: 1,
    explanation: "The {prefix}_save_commit_after event is triggered after the database transaction commits. This is useful for actions that should only occur if the save was successful."
  },
  {
    question: "Where are Interceptor classes automatically generated?",
    options: [
      "var/generation/",
      "generated/ directory",
      "pub/static/",
      "app/code/Interceptors/"
    ],
    correct: 1,
    explanation: "Interceptor classes are automatically generated in the generated/ directory. They are created when the DI system instantiates a class that has configured plugins."
  }
];
