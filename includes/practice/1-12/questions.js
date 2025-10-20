window.questions = [
    {
        question: "What component is the Magento caching system based on?",
        options: [
            "Symfony Cache",
            "Zend_Cache",
            "Laravel Cache",
            "PSR-6 CacheInterface"
        ],
        correct: 1,
        explanation: "The Magento caching system is based on the Zend_Cache component. It consists of two important pieces: cache frontend (interface) and cache backend (storage implementation)."
    },
    {
        question: "What are the two main architectural pieces of the Magento caching system?",
        options: [
            "Controller and Model",
            "Frontend and Backend",
            "Cache and Storage",
            "Reader and Writer"
        ],
        correct: 1,
        explanation: "The Magento caching system consists of Frontend (\\Magento\\Framework\\Cache\\Frontend\\Adapter\\Zend - provides interface for developers) and Backend (Magento/Framework/Cache/Backend/ - defines how cache is stored)."
    },
    {
        question: "Which cache type stores configuration from XML files along with entries in the core_config_data table?",
        options: [
            "layout",
            "config",
            "block_html",
            "db_ddl"
        ],
        correct: 1,
        explanation: "The 'config' cache stores configuration from XML files along with entries in the core_config_data table. This cache needs to be refreshed when you add system configuration entries or make XML configuration modifications."
    },
    {
        question: "When developing frontend features, which caches are typically disabled?",
        options: [
            "config and db_ddl",
            "eav and customer_notification",
            "layout, block_html, and full_page",
            "collections and translate"
        ],
        correct: 2,
        explanation: "For frontend development, layout, block_html, and full_page caches are usually disabled to allow immediate feedback on changes. However, FPC should be enabled before deployment to ensure no caching issues."
    },
    {
        question: "Which command shows a list of all cache types and their current status?",
        options: [
            "bin/magento cache:list",
            "bin/magento cache:status",
            "bin/magento cache:show",
            "bin/magento cache:info"
        ],
        correct: 1,
        explanation: "The command 'bin/magento cache:status' shows a list of all cache types and whether they are enabled or disabled."
    },
    {
        question: "What is the recommended first approach when experiencing cache-related issues?",
        options: [
            "Run cache:flush",
            "Delete var/cache manually",
            "Run cache:clean",
            "Restart Redis"
        ],
        correct: 2,
        explanation: "Magento recommends running cache:clean operations first as this does not affect other applications that might use the same cache storage. If this doesn't solve the problem, then use cache:flush."
    },
    {
        question: "Which cache stores multi-row results from database queries?",
        options: [
            "db_ddl",
            "collections",
            "full_page",
            "eav"
        ],
        correct: 1,
        explanation: "The 'collections' cache stores multi-row results from database queries, helping to reduce database load by caching frequently accessed collections."
    },
    {
        question: "Where is cache configuration stored in Magento 2?",
        options: [
            "app/etc/cache.xml",
            "etc/config.xml in each module",
            "etc/cache.xml in each module",
            "var/cache/config.php"
        ],
        correct: 2,
        explanation: "Cache configuration is stored in module-specific etc/cache.xml files. Examples include module-eav/etc/cache.xml, module-translation/etc/cache.xml, and module-page-cache/etc/cache.xml."
    },
    {
        question: "Which cache type needs to be flushed when adding methods to API service contracts?",
        options: [
            "config",
            "layout",
            "config_webservice",
            "full_page"
        ],
        correct: 2,
        explanation: "The 'config_webservice' cache stores configuration for REST and SOAP APIs. When adding methods to API service contracts or modifying webapi.xml files, you need to flush this cache."
    },
    {
        question: "What is the fastest cache storage option for production environments?",
        options: [
            "File system (default)",
            "Database",
            "Redis",
            "Memcached"
        ],
        correct: 2,
        explanation: "Redis is the fastest cache storage option and is recommended for production environments. File system is the default but has moderate performance, and database storage is the slowest option."
    },
    {
        question: "Which command is the recommended way to clear only the config and layout caches?",
        options: [
            "bin/magento cache:flush",
            "bin/magento cache:clean config layout",
            "bin/magento cache:flush config,layout",
            "bin/magento cache:clear config layout"
        ],
        correct: 1,
        explanation: "The recommended approach is 'bin/magento cache:clean config layout' (space-separated cache types). This cleans only the specified cache types without affecting other applications sharing the same cache storage. cache:flush is more aggressive and should only be used if cache:clean doesn't solve the issue."
    },
    {
        question: "What does the db_ddl cache store?",
        options: [
            "Database query results",
            "Database table structure and schema information",
            "Database configuration",
            "Database credentials"
        ],
        correct: 1,
        explanation: "The 'db_ddl' cache stores database table structure and schema information, including table structures, column names and types. It should be flushed after running setup:upgrade or when database schema changes are made."
    },
    {
        question: "Which cache stores the output from the toHtml() method on blocks?",
        options: [
            "full_page",
            "layout",
            "block_html",
            "collections"
        ],
        correct: 2,
        explanation: "The 'block_html' cache stores output from the toHtml() method on blocks. Obtaining HTML from a block can be expensive, so caching allows this output to be reused in other locations or pages."
    },
    {
        question: "What is the difference between cache:clean and cache:flush?",
        options: [
            "They are exactly the same",
            "cache:clean removes Magento cache tags only; cache:flush purges all data from cache storage",
            "cache:flush is faster than cache:clean",
            "cache:clean is deprecated; only use cache:flush"
        ],
        correct: 1,
        explanation: "cache:clean removes only Magento cache tags without affecting other applications sharing the same cache storage (recommended first). cache:flush completely purges all data from cache storage and is more aggressive."
    },
    {
        question: "How would you manually clear file system cache in Magento?",
        options: [
            "Delete the pub/static folder",
            "rm -rf var/cache/*",
            "Delete the generated folder",
            "rm -rf pub/cache/*"
        ],
        correct: 1,
        explanation: "To manually clear file system cache, use 'rm -rf var/cache/*' and 'rm -rf var/page_cache/*'. This removes all cached files from the file system."
    },
    {
        question: "When should the layout cache be refreshed?",
        options: [
            "When changing database configuration",
            "When modifying files in app/design/[area]/layout/ or app/code/*/view/[area]/layout/",
            "When adding new products",
            "When changing customer groups"
        ],
        correct: 1,
        explanation: "The layout cache should be refreshed when making changes to layout files in app/design/[area]/layout/ folders or app/code/*/view/[area]/layout/ files. With Magento's extensive layout configuration, many CPU cycles are used in combining and building these rules."
    },
    {
        question: "Which cache type is the final layer of caching in a Magento application?",
        options: [
            "config",
            "block_html",
            "full_page",
            "layout"
        ],
        correct: 2,
        explanation: "The 'full_page' cache (FPC) is the final layer of caching in a Magento application. It stores entire HTML page output and can be stored on the file system (default), database, or Redis (fastest)."
    },
    {
        question: "What important elements does Magento cache?",
        options: [
            "Only HTML output",
            "Only database queries",
            "Configuration XML files, HTML output, schema info, and attribute/entity information",
            "Only customer data"
        ],
        correct: 2,
        explanation: "Magento caches various configuration XML files (layout, config, ui_components), HTML output (blocks, complete pages), schema information (tables, columns), and critical internal operation data (attributes, entities)."
    },
    {
        question: "What is the correct way to flush cache in a Redis database?",
        options: [
            "redis-cli DELETE ALL",
            "redis-cli SELECT [database_index]; FLUSHDB",
            "redis-cli FLUSH CACHE",
            "redis-cli CLEAR"
        ],
        correct: 1,
        explanation: "To flush cache in Redis, connect with 'redis-cli', select the database with 'SELECT [database_index]', then run 'FLUSHDB'. Important: Sessions and content caching should use separate Redis instances/databases."
    },
    {
        question: "Which Magento 2 cache types are mentioned in module-specific cache.xml files? (Select all that apply - choose the module that has cache.xml)",
        options: [
            "module-eav, module-translation, module-page-cache",
            "module-core, module-backend, module-admin",
            "module-frontend, module-catalog, module-sales",
            "module-checkout, module-payment, module-shipping"
        ],
        correct: 0,
        explanation: "Key cache.xml files in Magento 2.4 include: module-eav/etc/cache.xml, module-translation/etc/cache.xml, module-customer/etc/cache.xml, module-webapi/etc/cache.xml, module-page-cache/etc/cache.xml, module-store/etc/cache.xml, and module-integration/etc/cache.xml."
    },
    {
        question: "Why should sessions and content caching never share the same Redis database?",
        options: [
            "It causes performance issues",
            "Flushing cache would destroy active user sessions",
            "Redis doesn't support multiple cache types",
            "It's a Magento license violation"
        ],
        correct: 1,
        explanation: "Sessions and content caching should never share the same Redis database because when you flush the cache storage, it would destroy all active user sessions. Ideally, they should be stored in separate Redis instances."
    },
    {
        question: "What are the two means of caching included in Magento?",
        options: [
            "Frontend and Backend caching",
            "Server caching and Browser caching",
            "Static and Dynamic caching",
            "Primary and Secondary caching"
        ],
        correct: 1,
        explanation: "Magento includes two means of caching: Server caching (all cache types managed via CLI or Admin, stored on server) and Browser caching (static resources like CSS, JS, images controlled via HTTP headers)."
    },
    {
        question: "Which file contains the cache backend adapter implementation?",
        options: [
            "\\Magento\\Framework\\Cache\\Frontend\\Adapter\\Zend",
            "Magento/Framework/Cache/Backend/",
            "\\Magento\\Framework\\App\\Cache",
            "Magento/Cache/Model/Backend"
        ],
        correct: 1,
        explanation: "The cache backend implementation is found in Magento/Framework/Cache/Backend/. The backend defines how exactly cache is stored (file system, Redis, database, etc.), while the frontend (\\Magento\\Framework\\Cache\\Frontend\\Adapter\\Zend) provides the interface for developers."
    },
    {
        question: "When should you enable Full Page Cache during development?",
        options: [
            "Always keep it enabled",
            "Never enable it during development",
            "Leave it OFF during development, but turn it ON before deploying to test for caching issues",
            "Only enable on Mondays"
        ],
        correct: 2,
        explanation: "During frontend development, it's best to leave Full Page Cache (FPC) OFF for faster iteration. However, before deploying new frontend updates, it's important to turn it back ON and ensure that the updates do not cause problems with the cache."
    },
    {
        question: "What happens when you run 'bin/magento cache:enable layout block_html'?",
        options: [
            "It flushes the layout and block_html caches",
            "It enables the layout and block_html cache types",
            "It disables all caches except layout and block_html",
            "It shows the status of layout and block_html caches"
        ],
        correct: 1,
        explanation: "The command 'bin/magento cache:enable layout block_html' enables the specified cache types (layout and block_html). Similarly, 'cache:disable' would disable them. This is different from 'cache:flush' or 'cache:clean' which manage cache content."
    }
];
