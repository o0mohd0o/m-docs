window.questions = [
    {
        question: "What does EAV stand for?",
        options: [
            "Extended Attribute Values",
            "Entity Attribute Value",
            "Enhanced Attribute Validation",
            "Entity Application Value"
        ],
        correct: 1,
        explanation: "EAV stands for Entity Attribute Value - a framework that allows entities to have different values for their properties."
    },
    {
        question: "What are the two main purposes of EAV?",
        options: [
            "Performance and security",
            "Multi-valued attributes (scope) and flexible data architecture",
            "Data validation and storage optimization",
            "API support and caching"
        ],
        correct: 1,
        explanation: "EAV has two main purposes: 1) Multi-valued attributes based on scope (global, website, store), and 2) Flexible mechanism to extend an entity's data architecture."
    },
    {
        question: "What are the four components of EAV?",
        options: [
            "Models, Views, Controllers, Resources",
            "Tables, Columns, Rows, Indexes",
            "Entity Types, Attribute Sets, Attributes, Attribute Values",
            "Products, Categories, Customers, Orders"
        ],
        correct: 2,
        explanation: "EAV consists of four components: Entity Types, Attribute Sets, Attributes, and Attribute Values."
    },
    {
        question: "In which table are EAV entity types registered?",
        options: [
            "eav_entity",
            "eav_entity_type",
            "entity_type",
            "catalog_entity_type"
        ],
        correct: 1,
        explanation: "Each EAV entity must be registered as an entity type in the eav_entity_type table."
    },
    {
        question: "Which entity types are fully-fledged EAV entities in Magento 2.4?",
        options: [
            "All eight entity types",
            "Only catalog_product and catalog_category",
            "Product, category, customer, and customer_address",
            "Only catalog_product"
        ],
        correct: 1,
        explanation: "By Magento 2.4, only catalog_product and catalog_category are fully-fledged EAV entity types."
    },
    {
        question: "What is the status of customer and customer_address entity types?",
        options: [
            "Fully-fledged EAV",
            "No EAV features",
            "Partial - some EAV features on a much smaller scale",
            "Deprecated"
        ],
        correct: 2,
        explanation: "There are still some features of EAV used for customer and customer_address entity types, but on a much smaller scale compared to products and categories."
    },
    {
        question: "Where is multi-scope functionality for EAV attributes implemented?",
        options: [
            "Magento_Eav module",
            "Magento_Framework module",
            "Magento_Catalog module",
            "Magento_Backend module"
        ],
        correct: 2,
        explanation: "Multi-scope functionality is a core EAV feature, however it is fully implemented in the Magento_Catalog module, not Magento_Eav."
    },
    {
        question: "What is the default scope for customer attributes?",
        options: [
            "Store view",
            "Website",
            "Global (and static)",
            "It depends on the attribute"
        ],
        correct: 2,
        explanation: "Out of the box, all customer's attributes are global (and static). Customer attributes have problems with multi-scoped values because multi-scope is implemented in Catalog module."
    },
    {
        question: "Where is generic attribute information stored?",
        options: [
            "catalog_eav_attribute table",
            "eav_attribute table",
            "customer_eav_attribute table",
            "eav_entity_attribute table"
        ],
        correct: 1,
        explanation: "Generic information for all attributes is stored in the eav_attribute table."
    },
    {
        question: "Where is product and category specific attribute information stored?",
        options: [
            "eav_attribute table",
            "product_eav_attribute table",
            "catalog_eav_attribute table",
            "eav_catalog_attribute table"
        ],
        correct: 2,
        explanation: "Information specific for category and product attributes is stored in catalog_eav_attribute table."
    },
    {
        question: "Where is customer specific attribute information stored?",
        options: [
            "eav_attribute table",
            "customer_eav_attribute table",
            "eav_customer_attribute table",
            "customer_attribute table"
        ],
        correct: 1,
        explanation: "Information specific for customer and customer_address attributes is stored in customer_eav_attribute table."
    },
    {
        question: "What is the recommended way to add attributes programmatically?",
        options: [
            "Through admin interface",
            "Direct SQL insert",
            "Via a Data Patch",
            "Via XML configuration"
        ],
        correct: 2,
        explanation: "Attributes should be added programmatically via a Data Patch. Attributes added through admin panel will only be available in a single database copy, while Data Patches are reproduced every time a new database is deployed."
    },
    {
        question: "What is the purpose of a Frontend Model?",
        options: [
            "Provide options for select attributes",
            "Control how value is saved to database",
            "Format or adjust the value on the frontend",
            "Validate attribute values"
        ],
        correct: 2,
        explanation: "Frontend Model formats or adjusts the value of the attribute on the frontend. Its main purpose is to render an attribute on the storefront, on the product view page."
    },
    {
        question: "What interface must a Frontend Model implement?",
        options: [
            "FrontendInterface",
            "AttributeFrontendInterface",
            "FrontendModelInterface",
            "AttributeInterface"
        ],
        correct: 0,
        explanation: "A Frontend Model must implement Magento\\Eav\\Model\\Entity\\Attribute\\Frontend\\FrontendInterface (or extend AbstractFrontend)."
    },
    {
        question: "What is the key method in a Frontend Model?",
        options: [
            "render()",
            "getValue()",
            "format()",
            "display()"
        ],
        correct: 1,
        explanation: "The key method to implement in a Frontend Model is getValue() which takes an entity model as a parameter."
    },
    {
        question: "What is the purpose of a Source Model?",
        options: [
            "Format values on frontend",
            "Save values to database",
            "Provide a list of acceptable options for an attribute",
            "Validate attribute values"
        ],
        correct: 2,
        explanation: "Source Model provides a list of acceptable options for an attribute. Its main purpose is to provide options for select-type attributes (select and multiselect)."
    },
    {
        question: "What interface must a Source Model implement?",
        options: [
            "SourceModelInterface",
            "AttributeSourceInterface",
            "SourceInterface",
            "OptionSourceInterface"
        ],
        correct: 2,
        explanation: "A Source Model must implement \\Magento\\Eav\\Model\\Entity\\Attribute\\Source\\SourceInterface (or extend AbstractSource)."
    },
    {
        question: "Which source model provides Yes/No options?",
        options: [
            "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean",
            "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\YesNo",
            "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Config",
            "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Options"
        ],
        correct: 0,
        explanation: "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean provides options for boolean dropdowns (Yes/No)."
    },
    {
        question: "Which source model is used very often and provides option values from the database?",
        options: [
            "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Config",
            "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean",
            "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Table",
            "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Database"
        ],
        correct: 2,
        explanation: "Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Table is used very often and provides option values from the database."
    },
    {
        question: "What is the purpose of a Backend Model?",
        options: [
            "Provide dropdown options",
            "Format values on frontend",
            "Control how the attribute's value is saved to the database",
            "Load attribute values"
        ],
        correct: 2,
        explanation: "Backend Model controls how the attribute's value is saved to the database. It allows reacting to load and save operations."
    },
    {
        question: "What methods are available in a Backend Model?",
        options: [
            "load(), save(), delete()",
            "afterLoad(), beforeSave(), afterSave(), validate()",
            "get(), set(), format()",
            "create(), update(), remove()"
        ],
        correct: 1,
        explanation: "Backend Model methods of interest are: afterLoad(), beforeSave(), afterSave(), and validate()."
    },
    {
        question: "What columns does each attribute value table contain?",
        options: [
            "id, code, value, scope",
            "entity_id, attribute_id, value, store_id",
            "product_id, attribute_code, data, website_id",
            "entity_type, attribute_name, content, store_code"
        ],
        correct: 1,
        explanation: "Each value table stores: entity_id (entity ID), attribute_id (attribute ID), value (actual value), and store_id (scope indicator)."
    },
    {
        question: "What does store_id represent in attribute value tables?",
        options: [
            "Always the store view ID",
            "Always the website ID",
            "Its interpretation depends on the attribute's scope (global, website, store)",
            "The admin store ID"
        ],
        correct: 2,
        explanation: "The store_id's interpretation depends on the attribute's scope: global, website, or store."
    },
    {
        question: "What does is_global = 0 mean for an attribute?",
        options: [
            "Global scope",
            "Website scope",
            "Store View scope",
            "Admin scope"
        ],
        correct: 2,
        explanation: "is_global = 0 means Store View scope - the attribute can have different values per store view."
    },
    {
        question: "What does is_global = 1 mean for an attribute?",
        options: [
            "Store View scope",
            "Website scope",
            "Global scope (same value everywhere)",
            "No scope"
        ],
        correct: 2,
        explanation: "is_global = 1 means Global scope - the attribute has the same value everywhere (store_id is always 0)."
    },
    {
        question: "What does is_global = 2 mean for an attribute?",
        options: [
            "Store View scope",
            "Global scope",
            "Website scope",
            "Multi-store scope"
        ],
        correct: 2,
        explanation: "is_global = 2 means Website scope - the attribute can have different values per website."
    },
    {
        question: "Which table stores short text attribute values (up to 255 characters)?",
        options: [
            "catalog_product_entity_text",
            "catalog_product_entity_varchar",
            "catalog_product_entity_string",
            "catalog_product_entity_char"
        ],
        correct: 1,
        explanation: "Short text values (up to 255 characters) are stored in *_entity_varchar tables."
    },
    {
        question: "Which table stores decimal/price attribute values?",
        options: [
            "catalog_product_entity_float",
            "catalog_product_entity_price",
            "catalog_product_entity_decimal",
            "catalog_product_entity_money"
        ],
        correct: 2,
        explanation: "Decimal/float values (including prices) are stored in *_entity_decimal tables."
    },
    {
        question: "Which table stores integer attribute values?",
        options: [
            "catalog_product_entity_int",
            "catalog_product_entity_integer",
            "catalog_product_entity_number",
            "catalog_product_entity_numeric"
        ],
        correct: 0,
        explanation: "Integer values are stored in *_entity_int tables."
    },
    {
        question: "Is it recommended to create custom EAV entities?",
        options: [
            "Yes, it's the best approach for custom data",
            "No, it is very difficult and usually not needed - use extension attributes instead",
            "Yes, but only for products",
            "It's required for all custom modules"
        ],
        correct: 1,
        explanation: "It is very difficult to create a custom EAV entity, and usually there is no need for that. Use extension attributes for custom entities instead."
    }
];
