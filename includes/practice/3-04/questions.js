window.questions = [
    {
        question: "Where are Model classes stored in a Magento module?",
        options: [
            "Model/ResourceModel/ directory",
            "Model/ directory (directly)",
            "Model/Entity/ directory",
            "ResourceModel/ directory"
        ],
        correct: 1,
        explanation: "Models are stored directly in the module's Model/ directory. Example: \\Magento\\Cms\\Model\\Page"
    },
    {
        question: "What does an instantiated Model class represent?",
        options: [
            "Multiple rows from the database",
            "One row in the database",
            "A database table structure",
            "A collection of entities"
        ],
        correct: 1,
        explanation: "An instantiated model class represents one row in the database."
    },
    {
        question: "Where are Resource Model classes stored?",
        options: [
            "Model/ directory",
            "ResourceModel/ directory",
            "Model/ResourceModel/ directory",
            "Model/Resource/ directory"
        ],
        correct: 2,
        explanation: "Resource models are stored in the module's Model/ResourceModel/ directory. Example: \\Magento\\Cms\\Model\\ResourceModel\\Page"
    },
    {
        question: "What class do Resource Models almost always inherit from?",
        options: [
            "Magento\\Framework\\Model\\AbstractModel",
            "Magento\\Framework\\Model\\ResourceModel\\Db\\AbstractDb",
            "Magento\\Framework\\DataObject",
            "Magento\\Framework\\Model\\AbstractResource"
        ],
        correct: 1,
        explanation: "Resource models almost always inherit \\Magento\\Framework\\Model\\ResourceModel\\Db\\AbstractDb."
    },
    {
        question: "What are the three primary methods in a Resource Model?",
        options: [
            "get(), set(), delete()",
            "load(), save(), delete()",
            "fetch(), insert(), update()",
            "read(), write(), remove()"
        ],
        correct: 1,
        explanation: "The primary methods in a Resource Model are aptly named: load(), save(), and delete()."
    },
    {
        question: "Where are Collection classes stored?",
        options: [
            "Model/Collection/ directory",
            "Model/ResourceModel/Collection.php",
            "Model/ResourceModel/[ModelName]/Collection.php",
            "ResourceModel/[ModelName]/Collection.php"
        ],
        correct: 2,
        explanation: "Collections are stored in Model/ResourceModel/[ModelName]/Collection.php. Example: \\Magento\\Cms\\Model\\ResourceModel\\Page\\Collection"
    },
    {
        question: "Why must you use a CollectionFactory instead of injecting the collection directly?",
        options: [
            "Collections are abstract and can't be instantiated",
            "Collections store state - each instance needs to be fresh",
            "It's a Magento coding standard",
            "Collections don't support dependency injection"
        ],
        correct: 1,
        explanation: "Collections store state. If you wish to utilize a collection, you must use a Factory and instantiate that collection instead of injecting the collection class itself, which would share state."
    },
    {
        question: "What interface allows collections to be used in foreach() loops?",
        options: [
            "\\Traversable",
            "\\Iterator",
            "\\IteratorAggregate",
            "\\Countable"
        ],
        correct: 2,
        explanation: "Because collections implement the \\IteratorAggregate interface, you can loop through a collection in a foreach() method."
    },
    {
        question: "What repository methods are typically implemented?",
        options: [
            "get(), set(), update(), remove()",
            "save(), getById(), getList(), delete()",
            "load(), save(), fetch(), remove()",
            "create(), read(), update(), delete()"
        ],
        correct: 1,
        explanation: "Repositories usually have save(), getById() (which gets one row/model), getList() (which accepts SearchCriteria), and delete()."
    },
    {
        question: "Do repositories store state?",
        options: [
            "Yes, like collections",
            "No, they do not store state",
            "Only when using getList()",
            "It depends on the implementation"
        ],
        correct: 1,
        explanation: "Repositories do not store state. They are essentially a wrapper to ease the effort of data operations."
    },
    {
        question: "Where is model data stored in classes extending AbstractModel?",
        options: [
            "In the $data property",
            "In the $_data property",
            "In the $attributes property",
            "In the $_attributes property"
        ],
        correct: 1,
        explanation: "Models that extend \\Magento\\Framework\\Model\\AbstractModel extend \\Magento\\Framework\\DataObject. This means that the data is stored in the class' $_data property."
    },
    {
        question: "How do you convert snake_case column names to camelCase for magic methods?",
        options: [
            "discount_amount becomes getDiscount_amount()",
            "discount_amount becomes getDiscountAmount()",
            "discount_amount becomes get_discount_amount()",
            "discount_amount becomes getdiscountamount()"
        ],
        correct: 1,
        explanation: "You can convert snake-case notation (discount_amount) to camel-case notation (DiscountAmount) and use magic getters like $class->getDiscountAmount()."
    },
    {
        question: "What are the advantages of explicit getters/setters over magic methods?",
        options: [
            "Faster execution only",
            "Type hints, mockable in tests, custom handling",
            "Required by Magento standards",
            "No advantages - magic methods are preferred"
        ],
        correct: 1,
        explanation: "Advantages of explicit methods: 1) Type hints reduce conversions, 2) Can mock in unit tests, 3) Can customize data handling (e.g., json_encode in setter)."
    },
    {
        question: "What does the addFieldToFilter() collection method do?",
        options: [
            "Adds a JOIN clause",
            "Adds a WHERE clause equivalent",
            "Adds a GROUP BY clause",
            "Adds an ORDER BY clause"
        ],
        correct: 1,
        explanation: "addFieldToFilter() is the equivalent of adding a WHERE clause to a SQL select."
    },
    {
        question: "What is the difference between addFieldToFilter() and addAttributeToFilter()?",
        options: [
            "addAttributeToFilter() is deprecated",
            "addFieldToFilter() is only for EAV entities",
            "For EAV entities, they are the same - either method gives same result",
            "addAttributeToFilter() is faster"
        ],
        correct: 2,
        explanation: "addAttributeToFilter() on EAV entities is the same as addFieldToFilter() for EAV-enabled entities. If you call either method, you get the same result."
    },
    {
        question: "What is the default alias for the main table in collections?",
        options: [
            "primary_table",
            "main_table",
            "base_table",
            "entity_table"
        ],
        correct: 1,
        explanation: "main_table is the default alias with collections."
    },
    {
        question: "Which fetch method returns a single value?",
        options: [
            "fetchRow()",
            "fetchOne()",
            "fetchCol()",
            "fetchSingle()"
        ],
        correct: 1,
        explanation: "fetchOne() returns a single value, useful for COUNT queries or getting one column value."
    },
    {
        question: "Which fetch method returns an array of values from a single column?",
        options: [
            "fetchAll()",
            "fetchOne()",
            "fetchCol()",
            "fetchColumn()"
        ],
        correct: 2,
        explanation: "fetchCol() returns an array of values from one column."
    },
    {
        question: "Which fetch method returns key-value pairs?",
        options: [
            "fetchPairs()",
            "fetchAssoc()",
            "fetchKeyValue()",
            "fetchMap()"
        ],
        correct: 0,
        explanation: "fetchPairs() returns key-value pairs - first column as key, second as value."
    },
    {
        question: "What does the collection's load() method do?",
        options: [
            "Creates the SQL query",
            "Fetches results and hydrates models with data",
            "Counts the number of items",
            "Clears the collection"
        ],
        correct: 1,
        explanation: "load() fetches the results of the collection. Data is loaded from the database and then models are hydrated with said data."
    },
    {
        question: "What does the collection's getSize() method do?",
        options: [
            "Returns byte size of data",
            "Returns number of columns",
            "Creates a copy of select, strips columns, uses COUNT",
            "Returns array length"
        ],
        correct: 2,
        explanation: "getSize() creates a copy of the select, strips out the columns, and uses the COUNT method."
    },
    {
        question: "What is the main difference between Repository getList() and Collection for EAV entities?",
        options: [
            "No difference",
            "Repository loads ALL attributes, Collection loads selected attributes",
            "Collection loads ALL attributes, Repository loads selected attributes",
            "Repository is slower"
        ],
        correct: 1,
        explanation: "For EAV entities (products, categories, customers), there is a big difference: ALL attributes are loaded with a repository, but only the attributes you select with a collection."
    },
    {
        question: "For non-EAV entities (like CMS pages), what's the difference between Repository getList() and Collection?",
        options: [
            "Repository is always faster",
            "Collection is always faster",
            "No difference",
            "Repository loads more data"
        ],
        correct: 2,
        explanation: "For a normal model (like a CMS page or an order), there would be no difference between repository getList() and a collection."
    },
    {
        question: "Why was the repository pattern designed to load all attributes for EAV entities?",
        options: [
            "Performance optimization",
            "Magento limitation",
            "Originally designed for API use - less concerned about speed, more about information",
            "It's a bug in Magento"
        ],
        correct: 2,
        explanation: "Originally, a repository was designed for use through an API: APIs are less concerned about speed and more about how much information can be returned."
    },
    {
        question: "What does a Repository wrap?",
        options: [
            "Collection",
            "Model",
            "Resource Model",
            "Factory"
        ],
        correct: 2,
        explanation: "Repositories are often a wrapper for the Resource Model. The repository creates the model (via factory) and passes it to the Resource Model's load() method."
    },
    {
        question: "What must you ensure when modifying a repository to use a different model?",
        options: [
            "The model extends AbstractModel",
            "The new model implements the appropriate interface",
            "The model has a factory",
            "The model is in the correct directory"
        ],
        correct: 1,
        explanation: "If you modify a repository to use a different model, make sure the new model implements the appropriate interface. Many areas of Magento rely on the repository returning the correct interface."
    },
    {
        question: "Why are repositories commonly used as API endpoints?",
        options: [
            "They're faster than other methods",
            "They implement service contracts and can be defined in webapi.xml",
            "It's required by Magento",
            "They have built-in authentication"
        ],
        correct: 1,
        explanation: "Repositories are commonly an API Endpoint (the service class in a webapi.xml file). You create an interface that the repository implements and declare routes/resources."
    },
    {
        question: "What conditional syntax filters for values NOT equal in addFieldToFilter()?",
        options: [
            "['ne' => $value]",
            "['neq' => $value]",
            "['not' => $value]",
            "['notequal' => $value]"
        ],
        correct: 1,
        explanation: "Use ['neq' => $value] for 'not equal to' in addFieldToFilter()."
    },
    {
        question: "What is the responsibility of a Model class?",
        options: [
            "Handle database operations",
            "Load multiple rows",
            "Store data (getters and setters)",
            "Wrap the resource model"
        ],
        correct: 2,
        explanation: "Data models store data. Once they are loaded from the database (hydrated), they are ready for use with getters and setters."
    },
    {
        question: "What is the responsibility of a Resource Model?",
        options: [
            "Store data",
            "Handle database operations (save/load/delete)",
            "Load multiple models",
            "Provide API endpoints"
        ],
        correct: 1,
        explanation: "Resource models handle database operations. They save, load, and delete by default. Custom queries are also placed here for performance."
    }
];
