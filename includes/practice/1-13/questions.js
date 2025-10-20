window.questions = [
    {
        question: "What is the primary purpose of the scope system in Magento?",
        options: [
            "To organize database tables",
            "To allow attributes and configuration values to have different values in different circumstances",
            "To manage customer permissions",
            "To control cache settings"
        ],
        correct: 1,
        explanation: "The scope concept in Magento 2 is the ability for attributes and configuration values to have different values in different circumstances, such as different prices for different websites or different translations for different store views."
    },
    {
        question: "What are the three levels in Magento's scope hierarchy (in developer terminology)?",
        options: [
            "Global, Regional, Local",
            "Website, Store, Store View",
            "Website, Store Group, Store",
            "Domain, Category, Subcategory"
        ],
        correct: 2,
        explanation: "In developer/code terminology, the three levels are: Website → Store Group → Store. However, merchants see this as Website → Store → Store View in the Admin UI."
    },
    {
        question: "What terminology does the Magento Admin UI use for the middle level of the scope hierarchy?",
        options: [
            "Store Group",
            "Store",
            "Website Group",
            "Store Category"
        ],
        correct: 1,
        explanation: "Merchants see 'Store' in the Admin UI for what developers call 'Store Group' in the code. This terminology confusion is important to understand."
    },
    {
        question: "What terminology does the Magento Admin UI use for the lowest level of the scope hierarchy?",
        options: [
            "Store",
            "View",
            "Store View",
            "Locale"
        ],
        correct: 2,
        explanation: "Merchants see 'Store View' in the Admin UI for what developers call 'Store' in the code. The lowest level is Store (code) or Store View (UI)."
    },
    {
        question: "What is the relationship between Websites and Store Groups?",
        options: [
            "One-to-one relationship",
            "Many-to-many relationship",
            "One-to-many relationship (one Website can have many Store Groups)",
            "Store Groups exist independently of Websites"
        ],
        correct: 2,
        explanation: "A Website may have many Store Groups (one-to-many relationship). Each Store Group belongs to exactly one Website, but a Website can contain multiple Store Groups."
    },
    {
        question: "Do Store Groups participate directly in the scoping functionality?",
        options: [
            "Yes, they are the primary scope level",
            "No, they act as containers and define root categories but don't participate directly in scoping",
            "Yes, they control all attribute values",
            "Only for product prices"
        ],
        correct: 1,
        explanation: "Store Groups do NOT participate directly in scoping functionality. Their primary purposes are to define a unique root category and act as a container for multiple stores. Websites and Stores are more functional for scoping."
    },
    {
        question: "In the catalog_eav_attribute table, what does the is_global field represent?",
        options: [
            "Whether the attribute is visible globally",
            "The scope level at which the attribute can have different values",
            "Whether the attribute is required",
            "The attribute's data type"
        ],
        correct: 1,
        explanation: "The is_global field in the catalog_eav_attribute table specifies the scope level at which an EAV attribute can have different values. It's not a boolean flag but accepts three values: 0, 1, and 2."
    },
    {
        question: "What does is_global = 0 mean for an EAV attribute?",
        options: [
            "Global scope - same value everywhere",
            "Website scope - different values per website",
            "Store scope - different values per store view",
            "The attribute is disabled"
        ],
        correct: 2,
        explanation: "is_global = 0 means Store scope. The attribute can have different values for different store views, making it perfect for translations and localized content."
    },
    {
        question: "What does is_global = 1 mean for an EAV attribute?",
        options: [
            "Store scope - different values per store",
            "Website scope - different values per website",
            "Global scope - single value across all scopes",
            "The attribute is publicly visible"
        ],
        correct: 2,
        explanation: "is_global = 1 means Global scope. The attribute has a single value across all scopes with no separated values allowed. Examples include SKU, product type, and creation date."
    },
    {
        question: "What does is_global = 2 mean for an EAV attribute?",
        options: [
            "Store scope - different values per store",
            "Global scope - same value everywhere",
            "Website scope - different values per website",
            "The attribute requires two values"
        ],
        correct: 2,
        explanation: "is_global = 2 means Website scope. The attribute can have different values for different websites. This is commonly used for prices, special prices, and tax classes."
    },
    {
        question: "Which scope level is typically used for product prices?",
        options: [
            "Global scope (is_global = 1)",
            "Store scope (is_global = 0)",
            "Website scope (is_global = 2)",
            "Prices are not scoped"
        ],
        correct: 2,
        explanation: "Product prices are typically website scope (is_global = 2), allowing different prices for different websites. This enables different pricing for different regions or customer segments."
    },
    {
        question: "Which scope level is typically used for product name translations?",
        options: [
            "Global scope (is_global = 1)",
            "Website scope (is_global = 2)",
            "Store scope (is_global = 0)",
            "Translations don't use scope"
        ],
        correct: 2,
        explanation: "Product name translations are typically store scope (is_global = 0), allowing different values for each store view. This enables localization like 'Red' (English), 'Rouge' (French), 'Rojo' (Spanish)."
    },
    {
        question: "Where are EAV attribute values stored in the database?",
        options: [
            "core_config_data table",
            "catalog_eav_attribute table",
            "catalog_product_entity_* tables (int, varchar, decimal, text, datetime)",
            "eav_attribute_values table"
        ],
        correct: 2,
        explanation: "EAV attribute values are stored in corresponding catalog_product_entity_* tables based on data type: _int for integers, _varchar for strings, _decimal for prices, _text for long text, and _datetime for dates. Each record includes a store_id column."
    },
    {
        question: "Where are system configuration values for all scopes stored?",
        options: [
            "catalog_product_entity_varchar",
            "core_config_data",
            "system_config",
            "config_scope_data"
        ],
        correct: 1,
        explanation: "All system configuration values for all scopes are stored in the core_config_data table. This table has columns for scope, scope_id, path, and value to store configuration at different scope levels."
    },
    {
        question: "What is the primary purpose of a Store Group?",
        options: [
            "To allow different attribute values",
            "To define a unique root category and act as a container for stores",
            "To separate customer accounts",
            "To manage cache settings"
        ],
        correct: 1,
        explanation: "The primary purpose of a Store Group is to define a unique root category and act as a container for multiple stores. Store Groups don't participate directly in scoping but organize the catalog structure."
    },
    {
        question: "What is the primary purpose of a Website in the scope hierarchy?",
        options: [
            "To provide different language translations",
            "To organize themes and designs",
            "To separate customer accounts, orders, and allow different catalogs or pricing structures",
            "To define root categories"
        ],
        correct: 2,
        explanation: "Websites are used to separate customer accounts and orders, provide different catalogs or pricing structures, and allow different payment/shipping methods. Attributes with is_global = 2 can have different values per website."
    },
    {
        question: "What is the primary purpose of a Store View?",
        options: [
            "To separate customer databases",
            "To define root categories",
            "To provide different languages, currencies, and localizations",
            "To manage product inventory"
        ],
        correct: 2,
        explanation: "Store Views (Stores in code) are primarily used for different languages/localizations, currencies, and designs/themes. Attributes with is_global = 0 can have different values per store view."
    },
    {
        question: "In what order does Magento's fallback mechanism work when retrieving scoped values?",
        options: [
            "Global → Website → Store View",
            "Store View → Website → Global",
            "Website → Store View → Global",
            "Store View → Global → Website"
        ],
        correct: 1,
        explanation: "Magento uses a fallback mechanism from most specific to least specific: Store View → Website → Global. If a value isn't set for the current store view, it checks the website level, then falls back to the global default."
    },
    {
        question: "Which of the following would typically have is_global = 1 (Global scope)?",
        options: [
            "Product price",
            "Product name in different languages",
            "Product SKU",
            "Product description"
        ],
        correct: 2,
        explanation: "Product SKU would have is_global = 1 (Global scope) because it must be the same across all websites and store views. SKU is a unique identifier that doesn't change based on scope."
    },
    {
        question: "How are static phrase translations (like 'Add to Cart', 'Checkout') handled in Magento?",
        options: [
            "Through the scope system with is_global = 0",
            "Through the i18n system, not the scope system",
            "Through the core_config_data table",
            "Through Store Groups"
        ],
        correct: 1,
        explanation: "Static phrase translations work differently from attribute translations. They are handled through the i18n system (internationalization), not the scope system. See topic 1.08 for more details on localization."
    },
    {
        question: "Can a Store belong to multiple Store Groups?",
        options: [
            "Yes, stores can belong to many store groups",
            "No, each Store belongs to exactly one Store Group",
            "Yes, but only if they're in the same website",
            "It depends on the configuration"
        ],
        correct: 1,
        explanation: "No, each Store belongs to exactly one Store Group. This is a one-to-many relationship where one Store Group can have many Stores, but each Store has only one parent Store Group."
    },
    {
        question: "What columns are in the core_config_data table for managing scope?",
        options: [
            "website_id, store_id, value",
            "scope, scope_id, path, value",
            "is_global, scope_level, config_value",
            "scope_type, entity_id, attribute_value"
        ],
        correct: 1,
        explanation: "The core_config_data table has columns: scope ('default', 'websites', or 'stores'), scope_id (the ID of the website or store), path (configuration path), and value (the configuration value)."
    },
    {
        question: "If you want a product to have different prices for US and EU websites, what scope should the price attribute have?",
        options: [
            "Store scope (is_global = 0)",
            "Global scope (is_global = 1)",
            "Website scope (is_global = 2)",
            "Prices cannot be scoped"
        ],
        correct: 2,
        explanation: "To have different prices for different websites (US vs EU), the price attribute should have Website scope (is_global = 2). This allows each website to have its own pricing."
    },
    {
        question: "Which EAV table would store product prices?",
        options: [
            "catalog_product_entity_int",
            "catalog_product_entity_varchar",
            "catalog_product_entity_decimal",
            "catalog_product_entity_text"
        ],
        correct: 2,
        explanation: "Product prices are decimal values, so they're stored in catalog_product_entity_decimal. Each EAV table corresponds to a data type: int (integers), varchar (strings), decimal (prices/decimals), text (long text), datetime (dates)."
    },
    {
        question: "What is a common use case for having multiple Store Views under the same Store Group?",
        options: [
            "Different product catalogs",
            "Different customer groups",
            "Different language versions of the same store (e.g., English, French, Spanish)",
            "Different payment methods"
        ],
        correct: 2,
        explanation: "A common use case for multiple Store Views is to provide different language versions of the same store. For example, having English, French, and Spanish store views all under the same Store Group, sharing the same catalog but with translated content."
    },
    {
        question: "What happens if an attribute value is not set for a specific store view?",
        options: [
            "An error is displayed",
            "The attribute is hidden",
            "Magento falls back to the website level, then to the global default",
            "The product becomes unavailable"
        ],
        correct: 2,
        explanation: "If an attribute value is not set for a specific store view, Magento uses its fallback mechanism: it checks the website level next, and if not set there, uses the global default value. This ensures there's always a value to display."
    }
];
