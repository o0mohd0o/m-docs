window.questions = [
  {
    question: "What is an EAV attribute's backend_type used for?",
    options: [
      "Determining which table stores the attribute value",
      "Defining the storefront label",
      "Selecting the input renderer",
      "Setting search weight"
    ],
    correct: 0,
    explanation: "backend_type (varchar, int, decimal, text, datetime) determines the EAV value table (e.g., catalog_product_entity_varchar)."
  },
  {
    question: "Which class layer loads and persists entities in Magento 2?",
    options: [
      "Model",
      "ResourceModel",
      "Collection",
      "ViewModel"
    ],
    correct: 1,
    explanation: "ResourceModel handles DB operations for a Model; Collections fetch sets of models."
  },
  {
    question: "Where do you add a new DB column to a custom table in modern Magento?",
    options: [
      "InstallSchema.php",
      "UpgradeSchema.php",
      "Schema Patch (PatchSchema) class",
      "dataPatch in etc"
    ],
    correct: 2,
    explanation: "Schema patches (PatchSchema) are the recommended approach for schema changes instead of legacy Install/Upgrade scripts."
  },
  {
    question: "What is the purpose of Repositories?",
    options: [
      "Render templates",
      "Provide service contracts for CRUD operations decoupled from persistence",
      "Index EAV data",
      "Manage message queues"
    ],
    correct: 1,
    explanation: "Repositories expose interfaces (service contracts) for entities, used by APIs and modules to interact without direct model coupling."
  },
  {
    question: "Which command reindexes all indexers?",
    options: [
      "bin/magento indexer:set-mode",
      "bin/magento indexer:reindex",
      "bin/magento cache:flush",
      "bin/magento cron:run"
    ],
    correct: 1,
    explanation: "indexer:reindex recalculates indexer data; mode sets schedule or realtime."
  },
  {
    question: "How do you filter a Collection by attribute?",
    options: [
      "addFieldToSelect()",
      "joinTable()",
      "addFieldToFilter('status', 1)",
      "getItems()"
    ],
    correct: 2,
    explanation: "addFieldToFilter applies WHERE conditions on collections; multiple filters combine with AND by default."
  },
  {
    question: "Where is the mapping between API routes and service contracts defined for REST?",
    options: [
      "etc/webapi.xml",
      "etc/di.xml",
      "etc/events.xml",
      "etc/acl.xml"
    ],
    correct: 0,
    explanation: "webapi.xml maps REST/SOAP routes to service contract interfaces and defines ACL/HTTP methods."
  },
  {
    question: "What is the role of Data Patch (PatchData)?",
    options: [
      "Create cron jobs",
      "Insert/update seed data and configuration",
      "Compile DI",
      "Define UI components"
    ],
    correct: 1,
    explanation: "Data patches apply data changes like inserting EAV attributes, default config values, or sample records."
  },
  {
    question: "How to add a new cron job?",
    options: [
      "etc/cron.xml",
      "etc/schedule.xml",
      "etc/di.xml",
      "etc/queue.xml"
    ],
    correct: 0,
    explanation: "Cron jobs are scheduled in etc/cron.xml with <group> and <job>."
  },
  {
    question: "Which component abstracts asynchronous processing with AMQP in Magento?",
    options: [
      "Message Queue framework",
      "Indexer",
      "Page Cache",
      "ViewModels"
    ],
    correct: 0,
    explanation: "Magento's Message Queue system integrates with RabbitMQ to handle async tasks defined in queue.xml and consumers.xml."
  },
  {
    question: "How do you define a repository interface for an entity to be exposed via REST?",
    options: [
      "Create an API interface under Api/ and declare in webapi.xml",
      "Add a controller in webapi_rest area",
      "Add a plugin on the model save()",
      "Define in etc/routes.xml"
    ],
    correct: 0,
    explanation: "Service contracts go under Api/ (e.g., Api/EntityRepositoryInterface.php) and are exposed via routes in webapi.xml."
  },
  {
    question: "What does \"flat tables\" refer to in Magento indexing context?",
    options: [
      "Flattening collections to arrays",
      "Denormalized tables optimized for product/category read operations",
      "Removing EAV entirely",
      "Temporary tables for setup:upgrade"
    ],
    correct: 1,
    explanation: "Indexers precompute denormalized data into flat tables for faster reads (catalog_product_flat, category_flat)."
  }
];
