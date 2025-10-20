window.questions = [
    {
        question: "Where are system configuration options defined?",
        options: [
            "etc/config.xml",
            "etc/adminhtml/system.xml",
            "etc/system.xml",
            "etc/adminhtml/config.xml"
        ],
        correct: 1,
        explanation: "System configuration options are configured in etc/adminhtml/system.xml. This file defines the structure and fields visible in Stores → Configuration."
    },
    {
        question: "What must you do after modifying a system.xml file for Magento to recognize the changes?",
        options: [
            "Restart the web server",
            "Reindex all indexes",
            "Clear the cache",
            "Deploy static content"
        ],
        correct: 2,
        explanation: "Since system.xml files are XML files, you must clear the cache for Magento to recognize changes. Bear in mind that when you clear the cache, you will experience a longer-than-normal load time."
    },
    {
        question: "What is the correct hierarchy for system configuration structure?",
        options: [
            "Section → Tab → Group → Field",
            "Tab → Section → Group → Field",
            "Tab → Group → Section → Field",
            "Group → Section → Tab → Field"
        ],
        correct: 1,
        explanation: "The correct hierarchy is: Tab (top level) → Section (within tab) → Group (within section) → Field (within group)."
    },
    {
        question: "Where does a section tag live in system.xml?",
        options: [
            "Inside a tab element",
            "Inside the system tag (not a tab element)",
            "Inside a group element",
            "At the root level of config"
        ],
        correct: 1,
        explanation: "The section tag lives inside the system tag (not a tab element). The section appears under the tab headings but is not nested within the tab element itself."
    },
    {
        question: "What is the best practice for organizing module configuration in system.xml?",
        options: [
            "Always create a new tab with your company name",
            "Put configuration under a tab for your company",
            "Put configuration in a pertinent area (e.g., Sales → Order Attributes, not Vendor → Order Attributes)",
            "Always use the General tab"
        ],
        correct: 2,
        explanation: "Best practice: Put all configuration choices in a pertinent area in Store Configuration. Do NOT put it under a tab for your company. For example, if you create an Order Attribute module, put configuration under Sales → Order Attributes, not [MODULE VENDOR] → Order Attributes. It makes administration much easier."
    },
    {
        question: "What format is used to create the configuration path for accessing values?",
        options: [
            "section_id::group_id::field_id",
            "section_id/group_id/field_id",
            "section_id.group_id.field_id",
            "section_id-group_id-field_id"
        ],
        correct: 1,
        explanation: "The scope configuration path is realized by concatenating the section id, the group id, and the field id separated by slashes. Example: catalog/recently_products/synchronize_with_backend"
    },
    {
        question: "Which interface must you inject to access configuration values in code?",
        options: [
            "ConfigInterface",
            "ScopeConfigInterface",
            "SystemConfigInterface",
            "StoreConfigInterface"
        ],
        correct: 1,
        explanation: "To access configuration values, inject an instance of Magento\\Framework\\App\\Config\\ScopeConfigInterface and call getValue() or isSetFlag() methods."
    },
    {
        question: "Which method should you use to retrieve boolean (Yes/No) configuration values?",
        options: [
            "getValue()",
            "getFlag()",
            "isSetFlag()",
            "getBool()"
        ],
        correct: 2,
        explanation: "For boolean configuration values (Yes/No fields), use isSetFlag() instead of getValue(). It returns true if the value is '1', false otherwise, providing cleaner code and proper boolean handling."
    },
    {
        question: "What are the three parameters accepted by the getValue() method?",
        options: [
            "path, scope, value",
            "path, scopeType, scopeCode",
            "section, group, field",
            "key, scope, default"
        ],
        correct: 1,
        explanation: "The getValue() method accepts three parameters: 1) $path (section/group/field), 2) $scopeType (ScopeInterface::SCOPE_WEBSITE or SCOPE_STORE), and 3) $scopeCode (the identifier for the scope - website ID or store ID)."
    },
    {
        question: "What field type should be used for sensitive data like API keys?",
        options: [
            "password",
            "secret",
            "obscure",
            "encrypted"
        ],
        correct: 2,
        explanation: "Use type='obscure' for sensitive data like API keys. This presents a password input and encrypts the value. You should also include a backend_model element: Magento\\Config\\Model\\Config\\Backend\\Encrypted. Note that 'password' type exists but the value is not encrypted."
    },
    {
        question: "What is the difference between 'obscure' and 'password' field types?",
        options: [
            "They are the same, just different names",
            "obscure encrypts the value, password does not",
            "password encrypts the value, obscure does not",
            "obscure is for admin users, password is for frontend"
        ],
        correct: 1,
        explanation: "The 'obscure' type presents a password input and encrypts the value (when used with Encrypted backend_model). There is also a 'password' type, but the value is not encrypted. Always use 'obscure' for sensitive data."
    },
    {
        question: "Which backend model should be used with the 'obscure' field type to encrypt values?",
        options: [
            "Magento\\Framework\\Encryption\\Model\\Encrypted",
            "Magento\\Config\\Model\\Config\\Backend\\Encrypted",
            "Magento\\Framework\\Config\\Encrypted",
            "Magento\\Backend\\Model\\Config\\Encrypted"
        ],
        correct: 1,
        explanation: "When using the 'obscure' field type, include the backend_model element with Magento\\Config\\Model\\Config\\Backend\\Encrypted to encrypt the value in the database."
    },
    {
        question: "What interface must a source_model class implement for select/multiselect fields?",
        options: [
            "Magento\\Framework\\Data\\OptionSourceInterface",
            "Magento\\Framework\\Option\\ArrayInterface",
            "Magento\\Config\\Model\\SourceInterface",
            "Magento\\Framework\\Data\\ArrayInterface"
        ],
        correct: 1,
        explanation: "Source models for select and multiselect fields must implement \\Magento\\Framework\\Option\\ArrayInterface, which requires a toOptionArray() method."
    },
    {
        question: "What field type allows users to select multiple values (like countries)?",
        options: [
            "select",
            "checkbox",
            "multiselect",
            "multicheckbox"
        ],
        correct: 2,
        explanation: "The 'multiselect' type shows a multiple-select list allowing users to select multiple values. This is commonly used for selecting multiple countries, customer groups, etc."
    },
    {
        question: "What does the 'allowspecific' field type do?",
        options: [
            "Allows only specific users to edit the field",
            "Controls whether a countries select field is enabled (Ship to Applicable Countries)",
            "Allows specific values only",
            "Restricts field visibility to specific scopes"
        ],
        correct: 1,
        explanation: "The 'allowspecific' type powers the 'Ship to Applicable Countries' functionality. It controls whether or not a countries select field is enabled."
    },
    {
        question: "What element makes a field dependent on another field's value?",
        options: [
            "&lt;require&gt;",
            "&lt;dependency&gt;",
            "&lt;depends&gt;",
            "&lt;condition&gt;"
        ],
        correct: 2,
        explanation: "The &lt;depends&gt; element makes the current field dependent on another field's value. Example: &lt;depends&gt;&lt;field id='enabled'&gt;1&lt;/field&gt;&lt;/depends&gt; makes the field visible only when 'enabled' is set to 1."
    },
    {
        question: "How do you make a configuration field required?",
        options: [
            "Add required='true' attribute",
            "Add &lt;validate&gt;required-entry&lt;/validate&gt; element",
            "Add &lt;required&gt;true&lt;/required&gt; element",
            "Add isRequired='1' attribute"
        ],
        correct: 1,
        explanation: "To make a field required, use the &lt;validate&gt; element with the value 'required-entry'. You can add multiple validation classes separated by spaces, like &lt;validate&gt;required-entry validate-email&lt;/validate&gt;."
    },
    {
        question: "What is the purpose of the config_path element in a field?",
        options: [
            "To specify the field's position in the config",
            "To map a field to a different configuration path (useful when moving settings)",
            "To define the path for file uploads",
            "To set the default configuration value"
        ],
        correct: 1,
        explanation: "The config_path element allows you to map a field to a different configuration path. This is useful when you need to move a setting in the configuration but don't want to update the path where the configuration value is referenced throughout the code."
    },
    {
        question: "What does the sortOrder attribute control?",
        options: [
            "Database sort order",
            "The order in which elements appear in the admin configuration",
            "Priority for loading configuration values",
            "The order of cache clearing"
        ],
        correct: 1,
        explanation: "The sortOrder attribute (on field, group, section, or tab) configures the order in which these elements appear in the admin configuration interface."
    },
    {
        question: "What is the purpose of the backend_model element?",
        options: [
            "To specify the backend template",
            "To specify a class that inherits \\Magento\\Framework\\App\\Config\\Value for before/after save/delete functionality",
            "To connect to backend APIs",
            "To configure backend caching"
        ],
        correct: 1,
        explanation: "The backend_model element specifies a class that inherits \\Magento\\Framework\\App\\Config\\Value. This class can configure functionality for before/after save and after delete operations on the configuration value."
    },
    {
        question: "What is the purpose of the frontend_model element?",
        options: [
            "To specify frontend JavaScript",
            "To specify the block that renders the element",
            "To configure frontend validation",
            "To specify frontend templates"
        ],
        correct: 1,
        explanation: "The frontend_model element specifies the block that renders the configuration element. If you need to create a custom element, you would probably extend a class in the \\Magento\\Config\\Block\\System\\Config\\Form namespace."
    },
    {
        question: "What scope types are available when retrieving configuration values?",
        options: [
            "SCOPE_GLOBAL, SCOPE_WEBSITE, SCOPE_STORE",
            "SCOPE_WEBSITE, SCOPE_STORE, default (global)",
            "SCOPE_DEFAULT, SCOPE_WEBSITE, SCOPE_STOREVIEW",
            "SCOPE_ADMIN, SCOPE_FRONTEND, SCOPE_API"
        ],
        correct: 1,
        explanation: "Available scope types are: ScopeInterface::SCOPE_WEBSITE, ScopeInterface::SCOPE_STORE (store view), and default (global) when no scope is specified."
    },
    {
        question: "What attributes determine in which scopes a field is visible?",
        options: [
            "scope, scopeType, scopeCode",
            "showInDefault, showInWebsite, showInStore",
            "visibleInGlobal, visibleInWebsite, visibleInStore",
            "scopeDefault, scopeWebsite, scopeStore"
        ],
        correct: 1,
        explanation: "The attributes showInDefault (global scope), showInWebsite (website scope), and showInStore (store view scope) determine in which configuration scopes a field is visible. Set to '1' for yes, '0' for no."
    },
    {
        question: "What is a common mistake when loading configuration values?",
        options: [
            "Using getValue() instead of isSetFlag()",
            "Not considering the scope and scope ID when loading values",
            "Not clearing cache after changes",
            "Using wrong field type"
        ],
        correct: 1,
        explanation: "A common mistake is not considering the scope and scope ID when loading values from store configuration. This is often not necessary on a frontend template. However, in the admin, this is often important unless the scope for a configuration setting is global."
    },
    {
        question: "How would you get the store ID from an order object to use with configuration?",
        options: [
            "$order->getStore()->getId()",
            "$order->getStoreId()",
            "$order->getStoreViewId()",
            "$order->getData('store_id')"
        ],
        correct: 1,
        explanation: "Use $order->getStoreId() to get the store ID from an order object. This is useful when you need a configuration value associated with a particular order: $this->scopeConfig->getValue('path', ScopeInterface::SCOPE_STORE, $order->getStoreId());"
    },
    {
        question: "What element is used to specify ACL resource required to access a configuration section?",
        options: [
            "&lt;acl&gt;",
            "&lt;permission&gt;",
            "&lt;resource&gt;",
            "&lt;access&gt;"
        ],
        correct: 2,
        explanation: "The &lt;resource&gt; element in a section specifies the ACL resource required to access that configuration section. Example: &lt;resource&gt;Magento_Catalog::config_catalog&lt;/resource&gt;"
    },
    {
        question: "Which element is used to add CSS classes to a section (like separator-top)?",
        options: [
            "&lt;style&gt;",
            "&lt;css&gt;",
            "&lt;class&gt;",
            "&lt;cssClass&gt;"
        ],
        correct: 2,
        explanation: "The &lt;class&gt; element is used to add CSS classes to a section. A common example is &lt;class&gt;separator-top&lt;/class&gt; which adds a visual separator above the section."
    },
    {
        question: "Can you nest groups in system configuration?",
        options: [
            "No, groups cannot be nested",
            "Yes, you can nest groups for more complex configurations",
            "Only in custom modules",
            "Only for payment methods"
        ],
        correct: 1,
        explanation: "Yes, you can nest groups for more complex configurations. This is seen on the Stores → Configuration → Sales → Payment Methods → Authorize.net page. When nesting groups, use the config_path element to configure where the value is stored."
    },
    {
        question: "What should you combine with the 'text' field type for email addresses?",
        options: [
            "&lt;validate&gt;validate-email&lt;/validate&gt;",
            "&lt;type&gt;email&lt;/type&gt;",
            "&lt;format&gt;email&lt;/format&gt;",
            "&lt;validation&gt;email&lt;/validation&gt;"
        ],
        correct: 0,
        explanation: "For email address fields, use type='text' combined with &lt;validate&gt;validate-email&lt;/validate&gt; to ensure proper email format validation."
    },
    {
        question: "What is the XSD schema location for system.xml files?",
        options: [
            "urn:magento:framework:Config/etc/system.xsd",
            "urn:magento:module:Magento_Config:etc/system_file.xsd",
            "urn:magento:module:Magento_Backend:etc/system.xsd",
            "urn:magento:framework:System/etc/config.xsd"
        ],
        correct: 1,
        explanation: "The XSD schema location for system.xml files is urn:magento:module:Magento_Config:etc/system_file.xsd. This is specified in the config element's xsi:noNamespaceSchemaLocation attribute."
    }
];
