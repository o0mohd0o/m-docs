window.questions = [
    {
        question: "What makes attributes in Magento so powerful compared to traditional data elements?",
        options: [
            "They are stored in separate tables",
            "They are functional - can change object behavior, not just add properties",
            "They are faster to query",
            "They require less disk space"
        ],
        correct: 1,
        explanation: "Attributes in Magento are functional. This means you can use attributes to change a behavior of some object, rather than simply adding another property to it. Attributes go far beyond mere elements of data architecture."
    },
    {
        question: "What are the two primary types of attributes in Magento?",
        options: [
            "Static and Dynamic",
            "System and Custom",
            "EAV and Extension",
            "Required and Optional"
        ],
        correct: 2,
        explanation: "There are two primary types of attributes in Magento: EAV (Entity-Attribute-Value) attributes and Extension attributes."
    },
    {
        question: "What class must a resource model extend to support EAV attributes?",
        options: [
            "Magento\\Framework\\Model\\AbstractModel",
            "Magento\\Eav\\Model\\Entity\\AbstractEntity",
            "Magento\\Framework\\Api\\AbstractExtensibleObject",
            "Magento\\Eav\\Model\\AbstractAttribute"
        ],
        correct: 1,
        explanation: "EAV attributes are applied to a Resource model that extends Magento\\Eav\\Model\\Entity\\AbstractEntity."
    },
    {
        question: "What classes can extension attributes be applied to?",
        options: [
            "Only AbstractEntity resource models",
            "Any model class",
            "Data models extending AbstractExtensibleObject, or models extending AbstractExtensibleModel",
            "Only product models"
        ],
        correct: 2,
        explanation: "Extension attributes can be applied to data models that extend Magento\\Framework\\Api\\AbstractExtensibleObject, or models that extend Magento\\Framework\\Model\\AbstractExtensibleModel."
    },
    {
        question: "Where are EAV attribute values stored?",
        options: [
            "In the main entity table",
            "In special tables with types *_entity_varchar, *_entity_int, etc.",
            "In etc/attributes.xml",
            "In custom tables defined by developer"
        ],
        correct: 1,
        explanation: "EAV attribute values are stored in special tables with the types *_entity_varchar, *_entity_int, *_entity_decimal, *_entity_text, *_entity_datetime. For example: catalog_product_entity_int."
    },
    {
        question: "Who decides where extension attribute data is stored?",
        options: [
            "Magento automatically stores it in eav_attribute_value",
            "It's always stored in the main entity table",
            "The developer decides (custom tables, files, APIs, computed)",
            "It must be stored in *_entity_varchar tables"
        ],
        correct: 2,
        explanation: "For extension attributes, it is up to the developer to decide where to store the data. Options include custom tables, files, external APIs, or even computed on-the-fly with no storage."
    },
    {
        question: "How is save and load functionality implemented for EAV attributes?",
        options: [
            "Manually by the developer",
            "Automatically implemented in AbstractEntity resource model",
            "Through XML configuration",
            "Using observers only"
        ],
        correct: 1,
        explanation: "Save and load functionality for EAV attributes is automatically implemented in the AbstractEntity resource model. A lot of functionality is also implemented in Magento_Catalog abstract resource model."
    },
    {
        question: "How is save and load functionality implemented for extension attributes?",
        options: [
            "Automatically by Magento",
            "Through XML configuration",
            "Manually - developer has to load and save the data using plugins or observers",
            "Through DataPatch"
        ],
        correct: 2,
        explanation: "For extension attributes, save and load functionality must be implemented manually. The developer has to load and save the data, typically using plugins on repository methods."
    },
    {
        question: "How difficult is it to use EAV attributes for a custom entity?",
        options: [
            "Very easy",
            "Moderately easy",
            "Very difficult",
            "Impossible"
        ],
        correct: 2,
        explanation: "Using EAV attributes for a custom entity is very difficult. It requires creating multiple database tables, implementing complex resource models, setting up EAV entity types, and managing attribute sets and groups."
    },
    {
        question: "How easy is it to use extension attributes for a custom entity?",
        options: [
            "Very difficult",
            "Moderately difficult",
            "Easy",
            "Impossible without core modifications"
        ],
        correct: 2,
        explanation: "Using extension attributes for a custom entity is easy. Simply create your data interface extending AbstractExtensibleObject, define extension attributes in XML, and implement load/save logic in plugins."
    },
    {
        question: "What is required to create a new EAV attribute?",
        options: [
            "An entry in etc/extension_attributes.xml",
            "A DataPatch using EavSetup",
            "Only XML configuration",
            "A database migration"
        ],
        correct: 1,
        explanation: "Creating a new EAV attribute requires a DataPatch that uses EavSetupFactory to add the attribute programmatically."
    },
    {
        question: "What is required to create a new extension attribute?",
        options: [
            "A DataPatch",
            "An entry in etc/extension_attributes.xml file",
            "A database table modification",
            "An observer"
        ],
        correct: 1,
        explanation: "Creating a new extension attribute requires an entry in the etc/extension_attributes.xml file defining the attribute code and type."
    },
    {
        question: "How are EAV attributes made available in WebAPI?",
        options: [
            "As extension_attributes",
            "As custom_attributes",
            "As additional_data",
            "They are not available in WebAPI"
        ],
        correct: 1,
        explanation: "EAV attributes are available in WebAPI as custom_attributes in the API response."
    },
    {
        question: "How are extension attributes made available in WebAPI?",
        options: [
            "As custom_attributes",
            "As extension_attributes",
            "As additional_data",
            "They are not available in WebAPI"
        ],
        correct: 1,
        explanation: "Extension attributes are available in WebAPI as extension_attributes in the API response."
    },
    {
        question: "Do EAV attributes support scope (website/store view) out of the box?",
        options: [
            "No, must be implemented manually",
            "Yes, for product and category attributes",
            "Only for products, not categories",
            "Only in enterprise edition"
        ],
        correct: 1,
        explanation: "EAV attributes have scope support out of the box for product and category attributes. You can specify SCOPE_GLOBAL, SCOPE_WEBSITE, or SCOPE_STORE when creating the attribute."
    },
    {
        question: "Do extension attributes support scope out of the box?",
        options: [
            "Yes, automatically",
            "Yes, but only for products",
            "No, it's up to the developer to implement",
            "Yes, through configuration"
        ],
        correct: 2,
        explanation: "Extension attributes do not support scope out of the box. It's up to the developer to implement scope support if needed."
    },
    {
        question: "Do EAV attributes have grid and form support?",
        options: [
            "No, requires custom work",
            "Yes, out-of-the-box",
            "Only grid support",
            "Only form support"
        ],
        correct: 1,
        explanation: "EAV attributes have grid and form support out-of-the-box. You can configure attributes to appear in admin grids and forms using configuration like is_used_in_grid, is_visible_in_grid, etc."
    },
    {
        question: "Do extension attributes have grid and form support?",
        options: [
            "Yes, out-of-the-box",
            "No, requires custom work",
            "Only for product attributes",
            "Yes, through XML configuration"
        ],
        correct: 1,
        explanation: "Extension attributes do not have grid and form support out-of-the-box. Displaying them in grids and forms requires custom development work."
    },
    {
        question: "What type of data is suitable for EAV attributes?",
        options: [
            "Complex objects and arrays",
            "Scalar values (text, number, date)",
            "Binary data",
            "Any type of data"
        ],
        correct: 1,
        explanation: "EAV attributes are suitable for extending an entity with a new scalar property - text, numbers, dates, etc. For complex data types, use extension attributes."
    },
    {
        question: "What type of data is suitable for extension attributes?",
        options: [
            "Only scalar values",
            "Only text values",
            "Not necessarily scalar - could be objects or arrays",
            "Only integers"
        ],
        correct: 2,
        explanation: "Extension attributes can handle complex data types, not necessarily scalar. They could be objects or arrays, with data stored in custom tables, files, or fetched by API."
    },
    {
        question: "Which EAV attribute table stores integer values for products?",
        options: [
            "catalog_product_entity_int",
            "catalog_product_entity_varchar",
            "catalog_product_entity_decimal",
            "eav_attribute_int"
        ],
        correct: 0,
        explanation: "Integer values for product EAV attributes are stored in the catalog_product_entity_int table."
    },
    {
        question: "Which EAV attribute table stores text (short) values?",
        options: [
            "*_entity_text",
            "*_entity_varchar",
            "*_entity_string",
            "*_entity_char"
        ],
        correct: 1,
        explanation: "Short text values for EAV attributes are stored in *_entity_varchar tables (e.g., catalog_product_entity_varchar)."
    },
    {
        question: "Which EAV attribute table stores decimal/price values?",
        options: [
            "*_entity_float",
            "*_entity_decimal",
            "*_entity_price",
            "*_entity_number"
        ],
        correct: 1,
        explanation: "Decimal values (including prices) for EAV attributes are stored in *_entity_decimal tables (e.g., catalog_product_entity_decimal)."
    },
    {
        question: "What scope constants are available for EAV attributes?",
        options: [
            "GLOBAL, REGIONAL, LOCAL",
            "SCOPE_GLOBAL, SCOPE_WEBSITE, SCOPE_STORE",
            "DEFAULT, WEBSITE, STOREVIEW",
            "UNIVERSAL, SITE, SHOP"
        ],
        correct: 1,
        explanation: "EAV attributes use ScopedAttributeInterface constants: SCOPE_GLOBAL (same everywhere), SCOPE_WEBSITE (per website), and SCOPE_STORE (per store view)."
    },
    {
        question: "Which core Magento entities use EAV architecture?",
        options: [
            "Only products",
            "Products, categories, customers, customer addresses",
            "All entities use EAV",
            "Only products and categories"
        ],
        correct: 1,
        explanation: "Core Magento entities using EAV architecture include products, categories, customers, and customer addresses."
    },
    {
        question: "When should you use EAV attributes?",
        options: [
            "For complex objects from external APIs",
            "For simple scalar values with scope support and automatic persistence",
            "For arrays of data",
            "Only when extension attributes won't work"
        ],
        correct: 1,
        explanation: "Use EAV attributes when you need to add simple scalar values to products/categories/customers with automatic save/load, scope support, and grid/form display capabilities."
    },
    {
        question: "When should you use extension attributes?",
        options: [
            "For simple text fields with scope support",
            "For complex data types (objects/arrays), custom storage, or non-EAV entities",
            "Only for products",
            "Never - always use EAV"
        ],
        correct: 1,
        explanation: "Use extension attributes when you need complex data types (objects/arrays), custom storage control, extending non-EAV entities (orders, quotes), or data from external sources."
    },
    {
        question: "How do you implement loading logic for extension attributes?",
        options: [
            "It's automatic",
            "Through XML configuration",
            "Using plugins on repository methods (e.g., afterGet)",
            "Using DataPatch"
        ],
        correct: 2,
        explanation: "Extension attribute loading logic is implemented using plugins on repository methods, typically the afterGet method, where you load the extension attribute data and set it on the entity."
    },
    {
        question: "What configuration options enable EAV attributes in admin grids?",
        options: [
            "grid_enabled, grid_visible",
            "is_used_in_grid, is_visible_in_grid, is_filterable_in_grid",
            "show_in_grid, filter_in_grid",
            "grid_display, grid_filter"
        ],
        correct: 1,
        explanation: "EAV attributes use configuration options like is_used_in_grid (can be used), is_visible_in_grid (visible by default), is_filterable_in_grid (can filter), and is_searchable_in_grid (can search)."
    },
    {
        question: "In a WebAPI response, where would you find an EAV attribute value?",
        options: [
            "In the main entity properties",
            "In custom_attributes array",
            "In extension_attributes object",
            "In additional_data"
        ],
        correct: 1,
        explanation: "In WebAPI responses, EAV attributes appear in the custom_attributes array as objects with attribute_code and value properties."
    }
];
