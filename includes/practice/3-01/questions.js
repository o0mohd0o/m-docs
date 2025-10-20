window.questions = [
    {
        question: "In which table are attribute sets stored?",
        options: [
            "eav_attribute",
            "eav_attribute_set",
            "eav_entity_attribute",
            "catalog_eav_attribute"
        ],
        correct: 1,
        explanation: "All attribute sets are stored in the eav_attribute_set table, which contains attribute_set_id, entity_type_id, attribute_set_name, and sort_order columns."
    },
    {
        question: "Which entity type typically has multiple attribute sets?",
        options: [
            "Customer (entity_type_id=1)",
            "Category (entity_type_id=3)",
            "Product (entity_type_id=4)",
            "All entities have multiple sets"
        ],
        correct: 2,
        explanation: "Only the product entity (entity_type_id=4) has multiple attribute sets. Categories and customers always stay within a single attribute set in practice."
    },
    {
        question: "Where are attribute groups stored?",
        options: [
            "eav_attribute_set",
            "eav_attribute_group",
            "eav_entity_attribute",
            "eav_attribute"
        ],
        correct: 1,
        explanation: "Attribute groups are stored in the eav_attribute_group table. Each group is connected to one parent attribute set."
    },
    {
        question: "What is the primary purpose of attribute groups?",
        options: [
            "To enforce validation rules",
            "To control attribute visibility",
            "To render attributes on edit pages (form accordions)",
            "To manage attribute permissions"
        ],
        correct: 2,
        explanation: "Attribute groups are used on form pages to create accordions (like Product Details, Images, Content, etc.). Unlike attribute sets, groups do not have any important function other than rendering attributes on an edit page."
    },
    {
        question: "Which table stores the association between attributes, entities, and groups?",
        options: [
            "eav_attribute_set",
            "eav_attribute_group",
            "eav_entity_attribute",
            "eav_attribute_option"
        ],
        correct: 2,
        explanation: "The association between attributes, entities, and groups is stored in the eav_entity_attribute table."
    },
    {
        question: "Is the eav_entity_attribute table normalized or denormalized?",
        options: [
            "Normalized",
            "Denormalized - attribute_group_id carries information about attribute_set_id and entity_type_id",
            "Partially normalized",
            "It depends on the entity type"
        ],
        correct: 1,
        explanation: "The eav_entity_attribute table is denormalized, since attribute_group_id carries information about both attribute_set_id and entity_type_id."
    },
    {
        question: "What method is used to copy attributes from one attribute set to another?",
        options: [
            "copyAttributes()",
            "cloneFromSet()",
            "initFromSkeleton()",
            "duplicateSet()"
        ],
        correct: 2,
        explanation: "The initFromSkeleton() method of the attribute set's model is used to copy attributes from a parent (skeleton) attribute set to a new attribute set."
    },
    {
        question: "Why is creating a new, empty attribute set for products useless?",
        options: [
            "It won't save to the database",
            "Magento doesn't allow empty sets",
            "Products need certain attributes (like price) to be functional",
            "Empty sets are automatically deleted"
        ],
        correct: 2,
        explanation: "Normal attribute sets for products must include some attributes (like price) for a product to be functional. This means creating a new, empty attribute set is useless unless we assign these required attributes to it."
    },
    {
        question: "What are the two primary types of attributes in Magento?",
        options: [
            "Static and Dynamic",
            "EAV and Extension",
            "System and Custom",
            "Required and Optional"
        ],
        correct: 1,
        explanation: "There are two primary types of attributes in Magento: EAV (Entity-Attribute-Value) attributes and Extension attributes."
    },
    {
        question: "What class must a resource model extend to use EAV attributes?",
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
        question: "Where are EAV attribute values stored?",
        options: [
            "In the main entity table",
            "In etc/attributes.xml",
            "In special tables with types *_entity_varchar, *_entity_int, etc.",
            "In the eav_attribute table"
        ],
        correct: 2,
        explanation: "EAV attribute values are stored in special tables with the types *_entity_varchar, *_entity_int, *_entity_decimal, *_entity_text, and so on. For example: catalog_product_entity_int."
    },
    {
        question: "How is save and load functionality implemented for EAV attributes?",
        options: [
            "Manually by the developer",
            "Automatically implemented in AbstractEntity resource model",
            "Through plugins",
            "Using observers"
        ],
        correct: 1,
        explanation: "Save and load functionality for EAV attributes is automatically implemented in the AbstractEntity resource model. A lot of functionality is also implemented in Magento_Catalog abstract resource model."
    },
    {
        question: "What is required to create a new EAV attribute?",
        options: [
            "An entry in etc/extension_attributes.xml",
            "A DataPatch",
            "A custom database table",
            "A plugin on the entity model"
        ],
        correct: 1,
        explanation: "Creating a new EAV attribute requires a DataPatch (Setup Patch) that uses EavSetup to add the attribute programmatically."
    },
    {
        question: "What is required to create a new extension attribute?",
        options: [
            "A DataPatch",
            "An entry in etc/extension_attributes.xml file",
            "A database migration",
            "An observer"
        ],
        correct: 1,
        explanation: "Creating a new extension attribute requires an entry in the etc/extension_attributes.xml file."
    },
    {
        question: "How are EAV attributes made available in WebAPI?",
        options: [
            "As Extension Attributes",
            "As Custom Attributes",
            "As Additional Data",
            "They are not available in WebAPI"
        ],
        correct: 1,
        explanation: "EAV attributes are available in WebAPI as Custom Attributes. Extension attributes are available as Extension Attributes."
    },
    {
        question: "Do EAV attributes support scope (website/store view) out of the box?",
        options: [
            "No, scope must be implemented manually",
            "Yes, for product and category attributes",
            "Only for products, not categories",
            "Only in enterprise edition"
        ],
        correct: 1,
        explanation: "EAV attributes support scope out of the box for product and category attributes. Different values can be set for global, website, and store view scopes."
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
        explanation: "EAV attributes have grid and form support out-of-the-box. You can configure attributes to appear in admin grids and forms using attribute configuration."
    },
    {
        question: "Do extension attributes have grid and form support?",
        options: [
            "Yes, out-of-the-box",
            "No, requires custom work",
            "Only for certain entity types",
            "Yes, through configuration"
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
            "JSON objects"
        ],
        correct: 1,
        explanation: "EAV attributes are suitable for scalar values like text, numbers, dates, etc. For complex data types like objects or arrays, use extension attributes."
    },
    {
        question: "What type of data is suitable for extension attributes?",
        options: [
            "Only scalar values",
            "Only text values",
            "Not necessarily scalar, could be objects or arrays",
            "Only integers"
        ],
        correct: 2,
        explanation: "Extension attributes can handle complex data types, not necessarily scalar. They could be objects or arrays, with data stored in custom tables, files, or even fetched by API."
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
        explanation: "Using EAV attributes for a custom entity is very difficult. Extension attributes are much easier for custom entities."
    },
    {
        question: "How easy is it to use extension attributes for a custom entity?",
        options: [
            "Very difficult",
            "Moderately difficult",
            "Easy",
            "Requires enterprise edition"
        ],
        correct: 2,
        explanation: "Using extension attributes for a custom entity is easy. This is one of the main advantages of extension attributes over EAV attributes."
    },
    {
        question: "Who controls where extension attribute data is stored?",
        options: [
            "Magento automatically stores it",
            "The developer decides",
            "It's always stored in eav_attribute_value",
            "It must be stored in the main entity table"
        ],
        correct: 1,
        explanation: "For extension attributes, it's up to the developer to decide where to store the data - in custom tables, files, external APIs, etc."
    },
    {
        question: "What is the typical use case for EAV attributes?",
        options: [
            "Storing complex objects fetched from APIs",
            "Extending an entity with a new scalar property with scope support",
            "Storing arrays of data",
            "Temporary data storage"
        ],
        correct: 1,
        explanation: "The typical use case for EAV attributes is to extend an entity with a new scalar property, implement functionality when the property changes, and support different values for different scopes."
    },
    {
        question: "What is the typical use case for extension attributes?",
        options: [
            "Simple text fields with scope support",
            "Numeric values for products",
            "Extending an entity with complex data (objects/arrays), stored in custom tables or fetched by API",
            "Admin-only attributes"
        ],
        correct: 2,
        explanation: "The typical use case for extension attributes is extending an entity with a new property that's not necessarily scalar - could be an object or array. Data can be stored in custom tables, files, or even fetched by API."
    },
    {
        question: "Which entities are all non-trivial attribute groups related to?",
        options: [
            "Only products",
            "Only customers",
            "Product and category entities",
            "All entity types"
        ],
        correct: 2,
        explanation: "All non-trivial attribute groups are related to the product and category entities. You can verify this by checking the eav_attribute_group table."
    },
    {
        question: "What columns are in the eav_attribute_set table?",
        options: [
            "attribute_set_id, entity_id, attribute_id",
            "attribute_set_id, entity_type_id, attribute_set_name, sort_order",
            "set_id, name, type, status",
            "id, entity_type, name, attributes"
        ],
        correct: 1,
        explanation: "The eav_attribute_set table contains four columns: attribute_set_id (primary key), entity_type_id (foreign key), attribute_set_name (display name), and sort_order (display order)."
    },
    {
        question: "When creating an attribute set programmatically, what should you base it on?",
        options: [
            "Create it empty and manually add attributes",
            "Use initFromSkeleton() to copy from an existing set",
            "It automatically includes all attributes",
            "Base it on the category attribute set"
        ],
        correct: 1,
        explanation: "When creating an attribute set programmatically, use the initFromSkeleton() method to copy attributes from an existing (skeleton/parent) attribute set. This ensures the new set includes all required attributes like price."
    },
    {
        question: "In the comparison between EAV and Extension attributes, which requires manual save/load implementation?",
        options: [
            "EAV attributes",
            "Extension attributes",
            "Both require manual implementation",
            "Neither requires manual implementation"
        ],
        correct: 1,
        explanation: "Extension attributes require manual implementation of save and load functionality by the developer. EAV attributes have automatic save/load implemented in the AbstractEntity resource model."
    }
];
