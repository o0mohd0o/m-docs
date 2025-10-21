window.questions = [
    {
        question: "When was DB Schema (declarative schema) introduced in Magento?",
        options: [
            "Magento 2.0",
            "Magento 2.1",
            "Magento 2.2",
            "Magento 2.3"
        ],
        correct: 3,
        explanation: "DB Schema (declarative schema) is available as of Magento 2.3."
    },
    {
        question: "Where is the declarative schema configuration file located?",
        options: [
            "etc/db_schema.xml",
            "etc/schema.xml",
            "Setup/db_schema.xml",
            "database/schema.xml"
        ],
        correct: 0,
        explanation: "The declarative schema configuration is found in your module's etc/db_schema.xml file."
    },
    {
        question: "Where is the XSD file for db_schema.xml located?",
        options: [
            "vendor/magento/module-eav/etc/schema.xsd",
            "vendor/magento/framework/Setup/Declaration/Schema/etc/schema.xsd",
            "lib/internal/Magento/Framework/Setup/schema.xsd",
            "etc/schema.xsd"
        ],
        correct: 1,
        explanation: "The XSD file for db_schema.xml is found in vendor/magento/framework/Setup/Declaration/Schema/etc/schema.xsd. This is where you can see all the available options."
    },
    {
        question: "What is the key benefit of declarative schema over old install/upgrade scripts?",
        options: [
            "Faster execution",
            "Single source of truth - easier to determine final table structure",
            "Better performance",
            "Automatic rollback"
        ],
        correct: 1,
        explanation: "Declarative schema provides the benefit of making upgrades easier in that the instructions for the upgrade come from one source. Before schema, it was sometimes difficult to determine what the final table's structure should be."
    },
    {
        question: "How do you add a table to the database using declarative schema?",
        options: [
            "Run bin/magento setup:db:add-table",
            "Specify its configuration in db_schema.xml",
            "Create a DataPatch",
            "Modify db_schema_whitelist.json"
        ],
        correct: 1,
        explanation: "To add a table to the database, specify its configuration in db_schema.xml."
    },
    {
        question: "How do you remove a table from the database using declarative schema?",
        options: [
            "Set disabled='true' on the table element",
            "Remove the table from where it is declared in db_schema.xml",
            "Run bin/magento setup:db:remove-table",
            "Add it to db_schema_whitelist.json with action='remove'"
        ],
        correct: 1,
        explanation: "To remove a table, remove the table from where it is declared in db_schema.xml. Obviously, you shouldn't modify core files to remove a table."
    },
    {
        question: "Which attributes are REQUIRED for a column element?",
        options: [
            "name only",
            "name and type",
            "name and xsi:type",
            "name, xsi:type, and nullable"
        ],
        correct: 2,
        explanation: "Each column must have: name (the name of the column) and xsi:type (the type of column)."
    },
    {
        question: "Which column type would you use for a short text field with specific length?",
        options: [
            "text",
            "varchar",
            "string",
            "char"
        ],
        correct: 1,
        explanation: "Use varchar for short text fields with a specific length, e.g., xsi:type='varchar' length='255'."
    },
    {
        question: "What attribute do you use to rename a column and migrate data?",
        options: [
            "rename='old_column_name'",
            "migrateFrom='old_column_name'",
            "onCreate='migrateDataFrom(old_column_name)'",
            "copyDataFrom='old_column_name'"
        ],
        correct: 2,
        explanation: "To rename a column, use the onCreate='migrateDataFrom(old_column_name)' attribute. This copies data from the old column to the new column."
    },
    {
        question: "When renaming a column, what else must you update?",
        options: [
            "etc/module.xml",
            "db_schema_whitelist.json to include both old and new columns",
            "composer.json",
            "Nothing else is required"
        ],
        correct: 1,
        explanation: "When renaming a column, you must update your module's db_schema_whitelist.json to include both the old and the new columns."
    },
    {
        question: "How do you delete a column using declarative schema?",
        options: [
            "Remove it from db_schema.xml",
            "Use disabled='true' attribute",
            "Run bin/magento setup:db:drop-column",
            "Set action='delete'"
        ],
        correct: 1,
        explanation: "To delete a column, use the disabled='true' attribute. You can use this attribute to remove a column, constraint, index, or table from the database."
    },
    {
        question: "What attribute specifies that an integer column should only accept positive numbers?",
        options: [
            "positive='true'",
            "unsigned='true'",
            "nonNegative='true'",
            "onlyPositive='true'"
        ],
        correct: 1,
        explanation: "The unsigned attribute determines whether integers can be positive and negative or just positive numbers."
    },
    {
        question: "When modifying a table added by another module, what must you configure?",
        options: [
            "Database connection in app/etc/env.php",
            "Module load order in etc/module.xml with <sequence>",
            "Table dependencies in db_schema.xml",
            "Nothing - Magento handles it automatically"
        ],
        correct: 1,
        explanation: "You must ensure that you have configured the module load order in your module's etc/module.xml file using <sequence>. This ensures your module executes after the module that creates the original table."
    },
    {
        question: "What are the two types of constraints in declarative schema?",
        options: [
            "Primary and Secondary",
            "Unique and Foreign",
            "Indexes and Foreign keys",
            "Keys and References"
        ],
        correct: 2,
        explanation: "There are two types of constraints in schema: indexes and foreign keys."
    },
    {
        question: "How do indexes differ from foreign keys in declarative schema?",
        options: [
            "Indexes use <index> tag, foreign keys use <foreign> tag",
            "Indexes use <column> element, foreign keys specify details as attributes",
            "No difference - both use the same structure",
            "Indexes use attributes, foreign keys use <column> element"
        ],
        correct: 1,
        explanation: "Indexes utilize the constraint tag but have a column element to build the structure. Foreign keys do not utilize the column tag but rather specify all their details as attributes in the constraint tag."
    },
    {
        question: "What xsi:type is used for a primary key constraint?",
        options: [
            "xsi:type='primary'",
            "xsi:type='key'",
            "xsi:type='primaryKey'",
            "xsi:type='pk'"
        ],
        correct: 0,
        explanation: "Use xsi:type='primary' for a primary key constraint."
    },
    {
        question: "What are data patches used for?",
        options: [
            "Modifying table structure",
            "Operations not possible in XML declaration - incremental database updates",
            "Creating indexes",
            "Adding foreign keys"
        ],
        correct: 1,
        explanation: "Patches run incremental updates against the database. They perform operations that are not possible to do in the XML declaration."
    },
    {
        question: "Where must data patches be located?",
        options: [
            "Setup/Data/",
            "Setup/Patch/Data/",
            "Patch/Data/",
            "Setup/DataPatch/"
        ],
        correct: 1,
        explanation: "Data patches must be in your module's Setup/Patch/Data directory."
    },
    {
        question: "What interface must data patches implement?",
        options: [
            "Magento\\Framework\\Setup\\DataPatchInterface",
            "Magento\\Framework\\Setup\\Patch\\DataPatchInterface",
            "Magento\\Setup\\Patch\\DataInterface",
            "Magento\\Framework\\Patch\\DataPatchInterface"
        ],
        correct: 1,
        explanation: "Data patches must implement \\Magento\\Framework\\Setup\\Patch\\DataPatchInterface."
    },
    {
        question: "What are the three required methods for DataPatchInterface?",
        options: [
            "apply(), install(), upgrade()",
            "execute(), getDependencies(), revert()",
            "apply(), getDependencies(), getAliases()",
            "run(), depends(), rollback()"
        ],
        correct: 2,
        explanation: "DataPatchInterface requires: apply() (takes action), getDependencies() (returns array of dependent patches), and getAliases() (returns other names if patch changed names)."
    },
    {
        question: "Where are applied patches stored to prevent re-execution?",
        options: [
            "setup_module table",
            "patch_list table",
            "db_patches table",
            "applied_patches table"
        ],
        correct: 1,
        explanation: "Once a patch is applied, the patch is stored in the patch_list table and never run again."
    },
    {
        question: "What interface should you implement to make a patch revertable?",
        options: [
            "RevertableInterface",
            "PatchRevertInterface",
            "PatchRevertableInterface",
            "RollbackPatchInterface"
        ],
        correct: 2,
        explanation: "If you wish to make a patch able to be rolled back, implement \\Magento\\Framework\\Setup\\Patch\\PatchRevertableInterface."
    },
    {
        question: "What method does PatchRevertableInterface add?",
        options: [
            "rollback()",
            "undo()",
            "revert()",
            "remove()"
        ],
        correct: 2,
        explanation: "PatchRevertableInterface specifies a revert() method so you can take action when the module is being uninstalled."
    },
    {
        question: "Where must schema patches be located?",
        options: [
            "Setup/Patch/Data/",
            "Setup/Patch/Schema/",
            "Setup/Schema/",
            "Patch/Schema/"
        ],
        correct: 1,
        explanation: "Schema patches should reside in your module's Setup/Patch/Schema directory."
    },
    {
        question: "What interface must schema patches implement?",
        options: [
            "DataPatchInterface",
            "SchemaPatchInterface",
            "SchemaUpdateInterface",
            "DatabasePatchInterface"
        ],
        correct: 1,
        explanation: "Schema patches should implement \\Magento\\Framework\\Setup\\Patch\\SchemaPatchInterface."
    },
    {
        question: "Why does SchemaPatchInterface have no methods?",
        options: [
            "It's deprecated",
            "It's a marker interface for labeling - Magento knows the patch type without directory structure",
            "Methods are inherited from parent",
            "It's an error in the codebase"
        ],
        correct: 1,
        explanation: "SchemaPatchInterface has no methods because it's used for labeling. Because you implement DataPatchInterface or SchemaPatchInterface, Magento knows what type of patch this is without having to rely on a directory structure."
    },
    {
        question: "How do you generate a data patch using CLI?",
        options: [
            "bin/magento patch:generate Vendor_Module PatchName",
            "bin/magento setup:patch:create Vendor_Module PatchName",
            "bin/magento setup:db-declaration:generate-patch Vendor_Module PatchName",
            "bin/magento db:patch:generate Vendor_Module PatchName"
        ],
        correct: 2,
        explanation: "You can initialize a patch with: bin/magento setup:db-declaration:generate-patch Vendor_Module PatchName"
    },
    {
        question: "What is db_schema_whitelist.json used for?",
        options: [
            "Security whitelist for database access",
            "History of all tables/columns/keys/constraints created via declarative schema",
            "List of allowed database operations",
            "Module permissions configuration"
        ],
        correct: 1,
        explanation: "The whitelist file contains a history of all tables, columns, keys, and constraints that have been created or modified via declarative schema."
    },
    {
        question: "How do you generate db_schema_whitelist.json?",
        options: [
            "bin/magento setup:upgrade",
            "bin/magento setup:db-declaration:generate-whitelist",
            "bin/magento db:whitelist:generate",
            "It's auto-generated on module install"
        ],
        correct: 1,
        explanation: "The whitelist file is auto-generated when you run: bin/magento setup:db-declaration:generate-whitelist. You must regenerate this file whenever you modify db_schema.xml."
    },
    {
        question: "What happens if a module is disabled that contains the original table declaration but another module depends on it?",
        options: [
            "Magento automatically creates the table",
            "You will get an error",
            "The dependent module is automatically disabled",
            "Nothing - Magento handles it gracefully"
        ],
        correct: 1,
        explanation: "One common problem which will leave you with an error is if a module is disabled that contains the original/core declaration for a table but another module depends on the disabled module."
    }
];
