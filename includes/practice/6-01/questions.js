window.questions = [
  {
    question: "What is CategoryInterface?",
    options: [
      "A category model implementation",
      "A data interface representing Magento's contract for categories",
      "A factory class",
      "A repository class"
    ],
    correct: 1,
    explanation: "CategoryInterface is a data interface—Magento's unchangeable contract for categories."
  },
  {
    question: "Why should you prefer using data interfaces over implementations?",
    options: [
      "They are faster",
      "They provide forward compatibility across Magento versions",
      "They are required by Magento",
      "They use less memory"
    ],
    correct: 1,
    explanation: "Data interfaces ensure forward compatibility—implementations may change between versions."
  },
  {
    question: "Which class implements CategoryInterface?",
    options: [
      "\\Magento\\Catalog\\Model\\CategoryFactory",
      "\\Magento\\Catalog\\Model\\Category",
      "\\Magento\\Catalog\\Api\\CategoryRepositoryInterface",
      "\\Magento\\Catalog\\Model\\ResourceModel\\Category"
    ],
    correct: 1,
    explanation: "\\Magento\\Catalog\\Model\\Category is the implementation of CategoryInterface."
  },
  {
    question: "When should you use the Category model instead of CategoryInterface?",
    options: [
      "Always",
      "Never",
      "When you need methods not available in the interface (e.g., getUrl())",
      "Only in admin controllers"
    ],
    correct: 2,
    explanation: "Use the Category model when you need methods not defined in CategoryInterface."
  },
  {
    question: "What are the two factory options for creating categories?",
    options: [
      "CategoryFactory and CategoryBuilder",
      "CategoryInterfaceFactory and CategoryFactory",
      "CategoryRepository and CategoryFactory",
      "CategoryInterface and Category"
    ],
    correct: 1,
    explanation: "CategoryInterfaceFactory (uses preference) and CategoryFactory (direct) are the two options."
  },
  {
    question: "Why doesn't CategoryInterfaceFactory exist as a real file?",
    options: [
      "It's a bug",
      "Magento auto-generates it at runtime via the code generator",
      "It's deprecated",
      "It's only available in production mode"
    ],
    correct: 1,
    explanation: "Magento's code generator creates factory classes on-the-fly when needed."
  },
  {
    question: "Which method saves a category?",
    options: [
      "Category::save()",
      "CategoryRepository::create()",
      "CategoryRepositoryInterface::save()",
      "CategoryFactory::save()"
    ],
    correct: 2,
    explanation: "CategoryRepositoryInterface::save() persists the category to the database."
  },
  {
    question: "Which method assigns products to a category via the category model?",
    options: [
      "setProducts()",
      "setPostedProducts()",
      "assignProducts()",
      "addProducts()"
    ],
    correct: 1,
    explanation: "setPostedProducts() is the magic method used to assign products to a category."
  },
  {
    question: "What format does setPostedProducts() expect?",
    options: [
      "Array of product IDs",
      "Key-value array (product ID => sort order)",
      "Array of product objects",
      "Comma-separated string"
    ],
    correct: 1,
    explanation: "setPostedProducts() expects an array where keys are product IDs and values are sort orders."
  },
  {
    question: "Which method retrieves current product positions in a category?",
    options: [
      "getProducts()",
      "getProductIds()",
      "getProductsPosition()",
      "getAssignedProducts()"
    ],
    correct: 2,
    explanation: "getProductsPosition() returns the current product assignments with positions."
  },
  {
    question: "Where is product-to-category association saved in the category model?",
    options: [
      "Category::save()",
      "Category resource model's _afterSave() via _saveCategoryProducts()",
      "CategoryRepository::save()",
      "CategoryLinkRepository::save()"
    ],
    correct: 1,
    explanation: "_saveCategoryProducts() is called from _afterSave() in the resource model."
  },
  {
    question: "What is the alternative API-based approach to assigning products?",
    options: [
      "ProductRepository",
      "CategoryLinkRepository::save()",
      "CategoryProductLink::assign()",
      "ProductCategoryRepository"
    ],
    correct: 1,
    explanation: "CategoryLinkRepository::save() provides an API-based approach for product assignment."
  },
  {
    question: "Which index is affected when category/product associations change?",
    options: [
      "catalog_product_category",
      "catalog_category_product",
      "category_product",
      "product_category"
    ],
    correct: 1,
    explanation: "The catalog_category_product index tracks category-product relationships."
  },
  {
    question: "If the indexer is set to 'Update on Schedule', when do associations appear?",
    options: [
      "Immediately",
      "After cache flush",
      "Up to an hour (when cron runs)",
      "Never"
    ],
    correct: 2,
    explanation: "With 'Update on Schedule', cron processes the index, which may take up to an hour."
  },
  {
    question: "Which observer handles category product URL rewrite generation?",
    options: [
      "CategorySaveObserver",
      "CategoryProcessUrlRewriteSavingObserver",
      "UrlRewriteObserver",
      "CategoryUrlObserver"
    ],
    correct: 1,
    explanation: "CategoryProcessUrlRewriteSavingObserver generates URL rewrites when category is saved."
  },
  {
    question: "When are category product URLs created?",
    options: [
      "When product is created",
      "When category is saved",
      "When indexer runs",
      "When cache is cleared"
    ],
    correct: 1,
    explanation: "URL rewrites are generated when the category is saved."
  },
  {
    question: "Which class fetches URL rewrites for category products?",
    options: [
      "UrlRewriteGenerator",
      "UrlRewriteHandler",
      "CategoryUrlRewrite",
      "UrlRewriteFactory"
    ],
    correct: 1,
    explanation: "UrlRewriteHandler fetches URL rewrites from ProductUrlRewriteGenerator."
  },
  {
    question: "What autoloader magic allows CategoryInterfaceFactory to work?",
    options: [
      "Composer autoloader only",
      "PHP spl_autoload_register with Magento's Code Generator",
      "Reflection API",
      "Magic methods"
    ],
    correct: 1,
    explanation: "Magento registers its own autoloader that uses the Code Generator to create factories."
  },
  {
    question: "What is a service contract?",
    options: [
      "A payment agreement",
      "Data interfaces and service interfaces (repositories) defining stable APIs",
      "A controller contract",
      "A database schema"
    ],
    correct: 1,
    explanation: "Service contracts are data interfaces and service interfaces providing stable APIs."
  },
  {
    question: "What are the benefits of service contracts?",
    options: [
      "Faster performance",
      "Forward compatibility, stable API, Web API generation",
      "Reduced database queries",
      "Smaller file sizes"
    ],
    correct: 1,
    explanation: "Service contracts ensure compatibility, stable APIs, and enable automatic Web API generation."
  },
  {
    question: "Which class is responsible for category indexing?",
    options: [
      "CategoryIndexer",
      "\\Magento\\Catalog\\Observer\\CategoryProductIndexer",
      "\\Magento\\Catalog\\Model\\Indexer\\Category",
      "CategoryReindex"
    ],
    correct: 1,
    explanation: "CategoryProductIndexer observer handles category product indexing."
  },
  {
    question: "What triggers the category product indexer?",
    options: [
      "Cron only",
      "Category save operation",
      "Cache clear",
      "Product save only"
    ],
    correct: 1,
    explanation: "The indexer is triggered when a category is saved (from Category model)."
  },
  {
    question: "Which generator creates canonical URL rewrites?",
    options: [
      "UrlRewriteGenerator",
      "CanonicalUrlRewriteGenerator",
      "ProductUrlGenerator",
      "CategoryUrlGenerator"
    ],
    correct: 1,
    explanation: "CanonicalUrlRewriteGenerator creates canonical URL rewrites for products."
  },
  {
    question: "What scope generates product URL rewrites?",
    options: [
      "Global",
      "Website",
      "Store (Store View)",
      "Product"
    ],
    correct: 2,
    explanation: "ProductScopeRewriteGenerator generates rewrites per store view."
  },
  {
    question: "What should you do if IDE warns about CategoryInterfaceFactory not existing?",
    options: [
      "Create it manually",
      "Install a plugin",
      "Proceed—it's auto-generated at runtime",
      "Use CategoryFactory instead"
    ],
    correct: 2,
    explanation: "Ignore the warning—Magento auto-generates factory classes when PHP autoloads them."
  },
  {
    question: "What is the root category parent ID typically?",
    options: [
      "0",
      "1",
      "2",
      "3"
    ],
    correct: 2,
    explanation: "Parent ID 2 is typically the root category for product categories."
  },
  {
    question: "Which resource model method saves category products?",
    options: [
      "_saveProducts()",
      "_saveCategoryProducts()",
      "saveCategoryProducts()",
      "saveProducts()"
    ],
    correct: 1,
    explanation: "_saveCategoryProducts() in the Category resource model saves product associations."
  },
  {
    question: "Where can you find the Admin REST API documentation for category product links?",
    options: [
      "DevDocs > API Reference",
      "Admin REST API Docs (search 'category' and 'product')",
      "GitHub",
      "Magento forums"
    ],
    correct: 1,
    explanation: "Search the Admin REST API docs for endpoints mentioning both category and product."
  },
  {
    question: "What happens if you save a category with indexer on 'Update on Save'?",
    options: [
      "Index updates immediately",
      "Index updates after an hour",
      "Index never updates",
      "Error is thrown"
    ],
    correct: 0,
    explanation: "'Update on Save' triggers immediate index updates."
  },
  {
    question: "Which observer also handles Elasticsearch category product indexing?",
    options: [
      "\\Magento\\Elasticsearch\\Observer\\CategoryIndexer",
      "\\Magento\\Elasticsearch\\Observer\\CategoryProductIndexer",
      "\\Magento\\Elasticsearch\\Model\\Indexer\\Category",
      "\\Magento\\Elasticsearch\\Observer\\ProductIndexer"
    ],
    correct: 1,
    explanation: "\\Magento\\Elasticsearch\\Observer\\CategoryProductIndexer handles Elasticsearch indexing for category products."
  }
];
