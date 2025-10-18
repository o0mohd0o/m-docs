<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice: 1.06 CLI Commands - AD0-E717</title>
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
                    <div class="topic-badge">1.06</div>
                    <h1><i class="fas fa-terminal"></i> Magento CLI Commands</h1>
                    <p class="mb-0">20 Questions</p>
                </div>

                <div class="progress-container">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Progress</span>
                        <span id="progressText">0/20</span>
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
                    <a href="cert-topic-1-06.php" class="btn btn-outline-secondary">
                        <i class="fas fa-book"></i> Study Topic 1.06
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
                question: "Which command is used to install Magento via CLI?",
                options: [
                    "bin/magento install",
                    "bin/magento setup:install",
                    "bin/magento system:install",
                    "bin/magento magento:install"
                ],
                correct: 1,
                explanation: "bin/magento setup:install is the command to install Magento via CLI. This is preferred over using the /setup URL."
            },
            {
                question: "What command must be run after enabling a module?",
                options: [
                    "bin/magento cache:flush",
                    "bin/magento module:refresh",
                    "bin/magento setup:upgrade",
                    "bin/magento deploy:mode:set"
                ],
                correct: 2,
                explanation: "bin/magento setup:upgrade must be run after enabling a module to synchronize the database schema and run setup scripts."
            },
            {
                question: "Which flag can speed up setup:upgrade during development?",
                options: [
                    "--fast",
                    "--skip-generation",
                    "--keep-generated",
                    "--no-compile"
                ],
                correct: 2,
                explanation: "--keep-generated flag speeds up setup:upgrade by skipping code generation. Use it when NOT modifying plugins or extension attributes."
            },
            {
                question: "Which command abbreviation can be used for 'cache:flush'?",
                options: [
                    "ca:fl",
                    "c:f",
                    "cach:flu",
                    "All of the above"
                ],
                correct: 3,
                explanation: "All abbreviations work! Commands can be shortened to any unique combination: c:f, ca:fl, cach:flu all work for cache:flush."
            },
            {
                question: "What command is used to check if modules are enabled or disabled?",
                options: [
                    "bin/magento module:list",
                    "bin/magento module:status",
                    "bin/magento module:check",
                    "bin/magento module:show"
                ],
                correct: 1,
                explanation: "bin/magento module:status lists all modules showing their enabled/disabled status. Essential for troubleshooting."
            },
            {
                question: "Which command should be used for static content in DEVELOPER mode?",
                options: [
                    "bin/magento setup:static-content:deploy",
                    "bin/magento dev:static:deploy",
                    "bin/magento dev:source-theme:deploy",
                    "bin/magento theme:deploy"
                ],
                correct: 2,
                explanation: "bin/magento dev:source-theme:deploy is for developer mode. It creates symlinks for LESS/CSS files. setup:static-content:deploy is for production."
            },
            {
                question: "Which command lists all available indexers with their codes?",
                options: [
                    "bin/magento indexer:list",
                    "bin/magento indexer:info",
                    "bin/magento indexer:show",
                    "bin/magento indexer:status"
                ],
                correct: 1,
                explanation: "bin/magento indexer:info lists all available indexers with their codes and names. Use these codes with reindex, set-mode, etc."
            },
            {
                question: "What are the two indexer modes?",
                options: [
                    "fast and slow",
                    "realtime and schedule",
                    "immediate and delayed",
                    "sync and async"
                ],
                correct: 1,
                explanation: "Indexer modes are: realtime (Update on Save) and schedule (Update on Schedule). Realtime can slow down local machines with large catalogs."
            },
            {
                question: "Which command creates a new admin user?",
                options: [
                    "bin/magento admin:create",
                    "bin/magento user:create",
                    "bin/magento admin:user:create",
                    "bin/magento create:admin"
                ],
                correct: 2,
                explanation: "bin/magento admin:user:create creates a new admin user or can be used to reset passwords when locked out."
            },
            {
                question: "What happens when you use an ambiguous abbreviation?",
                options: [
                    "Magento guesses which command you meant",
                    "The first matching command runs",
                    "You get an error listing all matching commands",
                    "Nothing happens"
                ],
                correct: 2,
                explanation: "If an abbreviation matches multiple commands, you get an error listing all matches. The abbreviation must be unique."
            },
            {
                question: "Which command switches Magento to production mode?",
                options: [
                    "bin/magento mode:set production",
                    "bin/magento deploy:mode:set production",
                    "bin/magento production:enable",
                    "bin/magento set:mode production"
                ],
                correct: 1,
                explanation: "bin/magento deploy:mode:set production switches to production mode. Use 'developer' for development mode."
            },
            {
                question: "What does 'cache:clean' do differently from 'cache:flush'?",
                options: [
                    "They do the same thing",
                    "cache:clean only clears invalid cache entries",
                    "cache:clean allows specifying specific cache types",
                    "cache:clean is faster"
                ],
                correct: 2,
                explanation: "cache:clean allows you to specify specific cache types to clean (e.g., config, layout), while cache:flush clears all cache types."
            },
            {
                question: "Which command reindexes all indices?",
                options: [
                    "bin/magento indexer:refresh",
                    "bin/magento indexer:reindex",
                    "bin/magento index:rebuild",
                    "bin/magento reindex:all"
                ],
                correct: 1,
                explanation: "bin/magento indexer:reindex reindexes all indices. You can also specify specific indices: bin/magento indexer:reindex catalog_product_price"
            },
            {
                question: "What command shows the current deploy mode?",
                options: [
                    "bin/magento mode:show",
                    "bin/magento deploy:mode:show",
                    "bin/magento show:mode",
                    "bin/magento get:mode"
                ],
                correct: 1,
                explanation: "bin/magento deploy:mode:show displays the current mode (developer, production, or default)."
            },
            {
                question: "Why is CLI considered a 'trusted' environment?",
                options: [
                    "It requires a password",
                    "It uses encryption",
                    "Access requires server access",
                    "It validates all commands"
                ],
                correct: 2,
                explanation: "CLI is trusted because accessing it requires server access, and someone with server access also has access to all code."
            },
            {
                question: "Which caches should typically be disabled during theme development?",
                options: [
                    "config and translation",
                    "full_page, block_html, and possibly layout",
                    "database and session",
                    "all caches"
                ],
                correct: 1,
                explanation: "During theme development, disable full_page, block_html, and possibly layout caches. Keep others enabled for faster response times."
            },
            {
                question: "What command generates DI configuration and code?",
                options: [
                    "bin/magento setup:di:compile",
                    "bin/magento di:compile",
                    "bin/magento generate:di",
                    "bin/magento compile:di"
                ],
                correct: 0,
                explanation: "bin/magento setup:di:compile generates DI configuration in the generated/ directory. Required after adding plugins or modifying dependencies."
            },
            {
                question: "How do you enable multiple modules in one command?",
                options: [
                    "Use commas: module:enable Vendor_A,Vendor_B",
                    "Use spaces: module:enable Vendor_A Vendor_B",
                    "Run the command twice",
                    "It's not possible"
                ],
                correct: 1,
                explanation: "Separate module names with spaces: bin/magento module:enable Vendor_A Vendor_B. This works for enable, disable, and other commands."
            },
            {
                question: "What should you do if a common command says 'not available'?",
                options: [
                    "Reinstall Magento",
                    "Run bin/magento alone to see the error",
                    "Clear cache and try again",
                    "Check file permissions"
                ],
                correct: 1,
                explanation: "If a common command isn't available, there's likely a problem. Run just bin/magento and the actual error will appear."
            },
            {
                question: "What is the problem with 'Update on Save' (realtime) indexing on local machines?",
                options: [
                    "It doesn't work locally",
                    "It requires cron",
                    "It can bring the machine to a standstill",
                    "It corrupts the database"
                ],
                correct: 2,
                explanation: "'Update on Save' (realtime mode) can bring local machines to a standstill with large catalogs as it requires significant CPU resources. Use 'Update on Schedule' but ensure cron is running."
            }
        ];
    </script>
</body>
</html>
