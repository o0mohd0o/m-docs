<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice: 1.07 Index Functionality - AD0-E717</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="css/common.css" rel="stylesheet">
    <link href="css/quiz.css" rel="stylesheet">
</head>
<body>
    <button class="mobile-menu-toggle d-md-none" id="mobileMenuToggle">
        <span></span><span></span><span></span>
    </button>
    
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <div class="container-fluid">
        <div class="row">
            <div id="nav-placeholder"></div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="quiz-header">
                    <div class="topic-badge">1.07</div>
                    <h1><i class="fas fa-database"></i> Index Functionality</h1>
                    <p class="mb-0">18 Questions</p>
                </div>

                <div class="progress-container">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Progress</span>
                        <span id="progressText">0/18</span>
                    </div>
                    <div class="progress-bar-wrapper">
                        <div class="progress-bar-fill" id="progressBar"></div>
                    </div>
                </div>

                <div id="quizContainer"></div>

                <button id="submitBtn" class="submit-btn" onclick="submitQuiz()">
                    <i class="fas fa-check-circle"></i> Submit Answers
                </button>

                <div id="resultsCard" class="results-card">
                    <h2>Quiz Results</h2>
                    <div id="scoreCircle" class="score-circle">
                        <span id="scoreText"></span>
                    </div>
                    <h3 id="resultMessage"></h3>
                    <p id="resultDetails"></p>
                    <button class="retake-btn" onclick="retakeQuiz()">
                        <i class="fas fa-redo"></i> Retake Quiz
                    </button>
                    <a href="cert-practice.html" class="btn btn-outline-primary mt-2">
                        <i class="fas fa-list"></i> Back to Quiz Menu
                    </a>
                </div>

                <div class="mt-4">
                    <a href="cert-practice.html" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Quiz Menu
                    </a>
                    <a href="cert-topic-1-07.php" class="btn btn-outline-secondary">
                        <i class="fas fa-book"></i> Study Topic 1.07
                    </a>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/nav-loader.js"></script>
    <script src="js/common.js"></script>
    <script src="js/quiz-engine.js"></script>
    <script>
        const questions = [
            {
                question: "What is the core concept of indexing in Magento 2?",
                options: [
                    "Reducing database size",
                    "Improving read performance at the cost of data redundancy",
                    "Speeding up write operations",
                    "Compressing data for storage"
                ],
                correct: 1,
                explanation: "The core concept is improving performance of read operations at the cost of data redundancy. We pre-calculate and store values for fast retrieval."
            },
            {
                question: "Why is product pricing used as the classic example for indexing?",
                options: [
                    "Prices are stored in multiple databases",
                    "Prices change frequently",
                    "Pricing logic is complex with many modifiers (tier price, special price, catalog rules, etc.)",
                    "Prices are encrypted"
                ],
                correct: 2,
                explanation: "Product pricing involves complex calculations with multiple price types (base, special, tier, catalog rules, custom options) that are impossible to perform efficiently for many products simultaneously."
            },
            {
                question: "What is the main problem that indexing solves for category pages?",
                options: [
                    "Loading product images",
                    "Sorting/filtering by price for many products",
                    "Displaying product names",
                    "Showing product descriptions"
                ],
                correct: 1,
                explanation: "Calculating final prices on-the-fly for thousands of products when sorting/filtering on category pages causes severe performance issues. Pre-calculated indexed prices solve this."
            },
            {
                question: "What does 'final_price' represent in the indexing context?",
                options: [
                    "The base product price",
                    "A pre-calculated, redundant value stored for fast retrieval",
                    "The price before taxes",
                    "The price after shipping"
                ],
                correct: 1,
                explanation: "final_price is a pre-calculated value that represents the result of complex pricing calculations. It's redundant (can be recalculated from raw data) but stored for performance."
            },
            {
                question: "What suffix do change log tables use in Magento?",
                options: [
                    "_log",
                    "_change",
                    "_cl",
                    "_track"
                ],
                correct: 2,
                explanation: "Change log tables use the _cl suffix (e.g., catalog_product_price_cl). These tables track changes for indexing."
            },
            {
                question: "How does Magento track changes for indexing at the database level?",
                options: [
                    "PHP event observers",
                    "MySQL triggers",
                    "Cron jobs",
                    "API calls"
                ],
                correct: 1,
                explanation: "Magento uses MySQL triggers to automatically record changes in change log (_cl) tables at the database level when data is modified."
            },
            {
                question: "What are the two index modes in Magento?",
                options: [
                    "Fast and Slow",
                    "Automatic and Manual",
                    "Update on Save (realtime) and Update on Schedule",
                    "Sync and Async"
                ],
                correct: 2,
                explanation: "The two modes are: Update on Save (realtime - immediate indexing) and Update on Schedule (cron-based indexing)."
            },
            {
                question: "What is the main disadvantage of 'Update on Save' mode?",
                options: [
                    "It doesn't work properly",
                    "It requires cron to be running",
                    "It's CPU intensive and can bring large sites to a standstill",
                    "It only works in production mode"
                ],
                correct: 2,
                explanation: "'Update on Save' mode reindexes immediately after every change, which is CPU intensive and can freeze development machines with large catalogs."
            },
            {
                question: "What is required for 'Update on Schedule' mode to work?",
                options: [
                    "Production mode enabled",
                    "Cron must be running",
                    "Redis cache",
                    "Varnish"
                ],
                correct: 1,
                explanation: "'Update on Schedule' mode relies on cron jobs to process change logs and update indexes. Without running cron, indexes never update."
            },
            {
                question: "Are Magento indexes the same as MySQL native indexes?",
                options: [
                    "Yes, they are identical",
                    "No, Magento indexes are MySQL tables storing calculated data",
                    "Yes, but with different syntax",
                    "They are similar but incompatible"
                ],
                correct: 1,
                explanation: "No! Magento indexes are NOT the same as MySQL native indexes. Magento indexes are MySQL tables that store pre-calculated data, while MySQL indexes optimize query performance."
            },
            {
                question: "Which index handles product price calculations?",
                options: [
                    "catalog_product_attribute",
                    "catalog_product_price",
                    "catalogrule_product",
                    "catalog_category_product"
                ],
                correct: 1,
                explanation: "catalog_product_price index handles pre-calculating final product prices including all modifiers."
            },
            {
                question: "Which index handles full-text search functionality?",
                options: [
                    "catalogsearch",
                    "catalog_search_fulltext",
                    "catalogsearch_fulltext",
                    "search_fulltext"
                ],
                correct: 2,
                explanation: "catalogsearch_fulltext index handles full-text search data for catalog search functionality."
            },
            {
                question: "What command shows all available indexers with their codes?",
                options: [
                    "bin/magento indexer:list",
                    "bin/magento indexer:show",
                    "bin/magento indexer:info",
                    "bin/magento indexer:status"
                ],
                correct: 2,
                explanation: "bin/magento indexer:info displays all available indexers with their codes and names."
            },
            {
                question: "What command sets an indexer to schedule mode?",
                options: [
                    "bin/magento indexer:mode schedule",
                    "bin/magento indexer:set-mode schedule",
                    "bin/magento indexer:schedule",
                    "bin/magento set:indexer schedule"
                ],
                correct: 1,
                explanation: "bin/magento indexer:set-mode schedule sets indexers to schedule mode. You can specify individual indexers or apply to all."
            },
            {
                question: "What happens when change logs become too large?",
                options: [
                    "They are automatically archived",
                    "They can slow down the indexing process",
                    "Magento crashes",
                    "They are ignored"
                ],
                correct: 1,
                explanation: "Large change log tables can slow down the indexing process as there are more records to process during each indexing run."
            },
            {
                question: "When does Magento process change logs in 'Update on Schedule' mode?",
                options: [
                    "Immediately after data changes",
                    "Via cron jobs",
                    "When an admin manually triggers it",
                    "During page load"
                ],
                correct: 1,
                explanation: "In 'Update on Schedule' mode, cron jobs read change logs and run the indexing process to update indexes."
            },
            {
                question: "What is the trade-off for using indexes?",
                options: [
                    "Slower write operations for faster read operations",
                    "More storage space (data redundancy) for faster read operations",
                    "More CPU usage for less memory usage",
                    "Simpler code for more complexity"
                ],
                correct: 1,
                explanation: "The trade-off is data redundancy (more storage space) in exchange for dramatically improved read performance. Indexed data must be kept in sync with source data."
            },
            {
                question: "Can developers create custom indexes?",
                options: [
                    "No, only Magento core can create indexes",
                    "Yes, but it's complex and rarely needed",
                    "Yes, it's simple and commonly done",
                    "Only in Enterprise Edition"
                ],
                correct: 1,
                explanation: "Developers CAN create custom indexes using Magento's indexing engine, but it's complex and rarely needed. Most use cases are handled by existing indexes."
            }
        ];
    </script>
</body>
</html>
