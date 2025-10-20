window.questions = [
    {
        question: "What does ACL stand for in Magento?",
        options: [
            "Admin Control Layer",
            "Access Control List",
            "Application Configuration Loader",
            "Advanced Class Library"
        ],
        correct: 1,
        explanation: "ACL stands for Access Control List. Magento uses ACL to restrict permissions of admin users and API users to perform certain actions."
    },
    {
        question: "What types of users does Magento ACL control?",
        options: [
            "Only admin users",
            "Only API users",
            "Both admin users and API users",
            "Only frontend customers"
        ],
        correct: 2,
        explanation: "Magento uses ACL to restrict permissions of both admin users (what they can access in the admin panel) and API users (what API endpoints they can call)."
    },
    {
        question: "Where is ACL specified for API endpoints (REST/SOAP)?",
        options: [
            "etc/acl.xml",
            "etc/webapi.xml",
            "etc/di.xml",
            "etc/config.xml"
        ],
        correct: 1,
        explanation: "ACL for API endpoints (REST and SOAP) is specified in etc/webapi.xml files using the &lt;resource ref=\"...\"&gt; element within route definitions."
    },
    {
        question: "What are the two primary methods for implementing ACL in admin controllers?",
        options: [
            "setAcl() and getAcl() methods",
            "ADMIN_RESOURCE constant and _isAllowed() method",
            "acl.xml and webapi.xml files",
            "Admin roles and user permissions"
        ],
        correct: 1,
        explanation: "Admin controllers typically use either the ADMIN_RESOURCE constant (recommended approach) or override the _isAllowed() method for custom permission logic."
    },
    {
        question: "What is the recommended method for implementing ACL in admin controllers?",
        options: [
            "Override _isAllowed() method",
            "Define ADMIN_RESOURCE constant",
            "Use acl.xml only",
            "Configure in di.xml"
        ],
        correct: 1,
        explanation: "The recommended and most common approach is to define the ADMIN_RESOURCE constant in the controller class. The parent Action class automatically checks this constant. Only override _isAllowed() when you need custom logic."
    },
    {
        question: "In which file do you define new ACL resources for a module?",
        options: [
            "etc/config.xml",
            "etc/acl.xml",
            "etc/webapi.xml",
            "etc/adminhtml/system.xml"
        ],
        correct: 1,
        explanation: "New ACL resources are defined in the module's etc/acl.xml configuration file. Every module that adds admin functionality should have an acl.xml with at least one resource configured."
    },
    {
        question: "What is the critical requirement when defining ACL resources in acl.xml?",
        options: [
            "Resources must be in alphabetical order",
            "Resources must be placed inside Magento_Backend::admin",
            "Resources must have unique titles",
            "Resources must include a sortOrder attribute"
        ],
        correct: 1,
        explanation: "You MUST place your ACL structure inside the Magento_Backend::admin resource. If you omit this, administrators will not see your ACL entry in the admin panel."
    },
    {
        question: "What is the Magento convention for naming ACL resource IDs?",
        options: [
            "moduleName.action.description",
            "ModuleName::action_description",
            "module-name-action",
            "MODULE_NAME_ACTION"
        ],
        correct: 1,
        explanation: "The convention is to combine the module's name (as seen in registration.php) and the description of the action, separated by two colons ::. Example: Magento_Cms::save or Vendor_Module::custom_action"
    },
    {
        question: "What constant should be defined in an admin controller to specify ACL permissions?",
        options: [
            "ACL_RESOURCE",
            "ADMIN_ACL",
            "ADMIN_RESOURCE",
            "RESOURCE_ACL"
        ],
        correct: 2,
        explanation: "The ADMIN_RESOURCE constant should be defined in admin controllers to specify the required ACL permission. Example: const ADMIN_RESOURCE = 'Magento_Cms::save';"
    },
    {
        question: "When should you override the _isAllowed() method instead of using ADMIN_RESOURCE?",
        options: [
            "Always - it's the best practice",
            "When you need to check multiple ACL resources or have custom/dynamic logic",
            "Never - ADMIN_RESOURCE is always sufficient",
            "Only for API endpoints"
        ],
        correct: 1,
        explanation: "Override _isAllowed() only when you need to check multiple ACL resources, have permission logic that depends on runtime conditions, or require custom authorization logic. Use ADMIN_RESOURCE constant whenever possible."
    },
    {
        question: "What happens if a user tries to access an admin controller without the required ACL permission?",
        options: [
            "The page loads normally",
            "A 403 Forbidden response is returned",
            "The user is redirected to login",
            "An exception is thrown"
        ],
        correct: 1,
        explanation: "If a user doesn't have the required ACL permission, the system automatically returns a 403 Forbidden response. The parent Action class checks the ADMIN_RESOURCE constant or _isAllowed() method."
    },
    {
        question: "How are ACL resources structured in acl.xml?",
        options: [
            "Flat list with no hierarchy",
            "Hierarchical - resources can be nested",
            "Grouped by module only",
            "Ordered alphabetically only"
        ],
        correct: 1,
        explanation: "ACL resources are hierarchical and can be nested. Granting access to a parent resource grants access to all child resources. You can also grant access to specific child resources only."
    },
    {
        question: "In the acl.xml structure, what does granting access to a parent resource do?",
        options: [
            "Only grants access to that specific resource",
            "Grants access to all child resources",
            "Denies access to child resources",
            "Has no effect on child resources"
        ],
        correct: 1,
        explanation: "Granting access to a parent resource automatically grants access to all its child resources in the ACL hierarchy. However, you can grant access to specific child resources without granting the parent."
    },
    {
        question: "What attribute is used in webapi.xml to specify which ACL resource is required?",
        options: [
            "&lt;acl&gt;",
            "&lt;permission&gt;",
            "&lt;resource ref=\"...\"&gt;",
            "&lt;access&gt;"
        ],
        correct: 2,
        explanation: "In etc/webapi.xml, the &lt;resource ref=\"...\"&gt; element within &lt;resources&gt; specifies which ACL resource is required to access that API endpoint."
    },
    {
        question: "Where is the ACL XSD schema file located?",
        options: [
            "Magento/Backend/etc/acl.xsd",
            "Magento/Framework/Acl/etc/acl.xsd",
            "Magento/Admin/etc/acl.xsd",
            "Magento/Authorization/etc/acl.xsd"
        ],
        correct: 1,
        explanation: "The full specification for acl.xml files can be found at vendor/magento/framework/Acl/etc/acl.xsd. This schema defines all valid elements, attributes, and structure."
    },
    {
        question: "Which attributes are required for an ACL resource element in acl.xml?",
        options: [
            "Only id",
            "id and title (except for Magento_Backend::admin)",
            "id, title, and sortOrder",
            "id, title, sortOrder, and disabled"
        ],
        correct: 1,
        explanation: "The 'id' attribute is always required. The 'title' attribute is also required except for the Magento_Backend::admin resource. The 'sortOrder' and 'disabled' attributes are optional."
    },
    {
        question: "How can you disable an existing ACL resource?",
        options: [
            "Delete it from acl.xml",
            "Set disabled=\"true\" in acl.xml",
            "Comment it out in acl.xml",
            "Override it with an empty title"
        ],
        correct: 1,
        explanation: "You can disable an existing ACL entry by setting disabled=\"true\" in your module's acl.xml. However, this is rarely needed and should be used with caution as it can break functionality."
    },
    {
        question: "What happens if you don't include acl.xml in a module that adds admin functionality?",
        options: [
            "The module won't install",
            "Admin users can't control permissions for that module",
            "The module will work but throw warnings",
            "Nothing - acl.xml is optional"
        ],
        correct: 1,
        explanation: "Every module that adds admin functionality should have an acl.xml with at least one resource configured. Without it, administrators cannot grant or deny access to the module's features."
    },
    {
        question: "In an admin controller, which class typically contains the ADMIN_RESOURCE constant?",
        options: [
            "Any controller in the frontend area",
            "Controllers extending Magento\\Backend\\App\\Action",
            "Only API controllers",
            "Only database model classes"
        ],
        correct: 1,
        explanation: "Admin controllers extend Magento\\Backend\\App\\Action, which automatically checks the ADMIN_RESOURCE constant. This is the standard pattern for admin area controllers."
    },
    {
        question: "What is the purpose of the sortOrder attribute in acl.xml?",
        options: [
            "Determines execution order",
            "Controls display order in admin ACL tree",
            "Sets priority for permission checking",
            "Defines database sort order"
        ],
        correct: 1,
        explanation: "The sortOrder attribute controls the display order of ACL resources in the admin panel's ACL tree. It's an optional attribute used for organizing the permission structure."
    },
    {
        question: "Where do administrators manage ACL roles in the admin panel?",
        options: [
            "Stores → Configuration → Roles",
            "System → Permissions → User Roles",
            "Admin → ACL → Roles",
            "Users → Roles → Permissions"
        ],
        correct: 1,
        explanation: "Administrators manage ACL roles at System → Permissions → User Roles. From there, they can create/edit roles, go to the Role Resources tab, select Custom for Resource Access, and check/uncheck specific ACL resources."
    },
    {
        question: "What does the following code accomplish? const ADMIN_RESOURCE = 'Vendor_Module::export_orders';",
        options: [
            "Defines a new ACL resource",
            "Specifies that this controller action requires the export_orders permission",
            "Exports orders to a file",
            "Creates a new admin user role"
        ],
        correct: 1,
        explanation: "This code specifies that the controller action requires the 'Vendor_Module::export_orders' ACL permission. Only users with this permission can access this controller action."
    },
    {
        question: "Can you use ACL to restrict access to specific system configuration sections?",
        options: [
            "No, configuration sections are always accessible",
            "Yes, by referencing ACL in the system.xml resource attribute",
            "Only through custom code",
            "Yes, but only in etc/config.xml"
        ],
        correct: 1,
        explanation: "Yes, you can restrict access to configuration sections by creating an ACL resource (e.g., Vendor_Module::config) and referencing it in the system.xml file's resource attribute for that section."
    },
    {
        question: "Which example shows correct ACL resource nesting in acl.xml?",
        options: [
            "&lt;resource id=\"Vendor_Module::main\"&gt;&lt;resource id=\"Vendor_Module::child\"/&gt;&lt;/resource&gt;",
            "&lt;acl&gt;&lt;resource id=\"Vendor_Module::main\"/&gt;&lt;resource id=\"Vendor_Module::child\"/&gt;&lt;/acl&gt;",
            "&lt;resources&gt;&lt;resource id=\"Vendor_Module::main\"/&gt;&lt;/resources&gt;&lt;resources&gt;&lt;resource id=\"Vendor_Module::child\"/&gt;&lt;/resources&gt;",
            "&lt;resource id=\"Magento_Backend::admin\" parent=\"Vendor_Module::main\"/&gt;"
        ],
        correct: 0,
        explanation: "Correct ACL nesting uses child &lt;resource&gt; elements inside parent &lt;resource&gt; elements. The first option shows proper hierarchical nesting where child is nested within main."
    },
    {
        question: "What is the relationship between ACL roles and resources?",
        options: [
            "Roles and resources are the same thing",
            "A role is a collection of resources that can be assigned to users",
            "Resources contain roles",
            "They are completely independent"
        ],
        correct: 1,
        explanation: "A role is a collection of ACL resources (permissions) that can be assigned to users. Resources are individual permissions defined in acl.xml files. Administrators create roles, assign resources to those roles, then assign users to roles."
    },
    {
        question: "Why is it rarely needed to disable existing ACL resources?",
        options: [
            "Because it's technically impossible",
            "Because it can break existing functionality that depends on those resources",
            "Because disabled resources still appear in the admin",
            "Because Magento doesn't support this feature"
        ],
        correct: 1,
        explanation: "Disabling ACL resources is rarely needed and should be used with caution because it can break existing functionality that depends on those resources. It should only be used in very specific customization scenarios."
    },
    {
        question: "What is the minimum requirement for a module's acl.xml file?",
        options: [
            "At least 10 resources",
            "At least one resource configured",
            "Must include both admin and API resources",
            "No minimum - acl.xml is optional"
        ],
        correct: 1,
        explanation: "Every module that adds admin functionality should have an acl.xml with at least one resource configured. This ensures administrators can control access to the module's features."
    },
    {
        question: "Which is a valid ACL resource ID based on Magento naming conventions?",
        options: [
            "magento.cms.save",
            "Magento_Cms::save",
            "MagentoCms_Save",
            "magento/cms/save"
        ],
        correct: 1,
        explanation: "Following Magento's convention, ACL resource IDs should be in the format ModuleName::action_description, such as Magento_Cms::save. This combines the module name with the action, separated by two colons."
    }
];
