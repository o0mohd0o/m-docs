<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice: 1.02 Module Structure - AD0-E717</title>
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
                    <div class="topic-badge">1.02</div>
                    <h1><i class="fas fa-cubes"></i> Module Structure</h1>
                    <p class="mb-0">8 Questions</p>
                </div>

                <div class="progress-container">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Progress</span>
                        <span id="progressText">0/8</span>
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
                    <a href="cert-topic-1-02.php" class="btn btn-outline-secondary">
                        <i class="fas fa-book"></i> Study Topic 1.02
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
                question: "Which files are MANDATORY for registering a Magento 2 module?",
                options: [
                    "registration.php only",
                    "composer.json only",
                    "Both registration.php and etc/module.xml",
                    "All three: registration.php, composer.json, and etc/module.xml"
                ],
                correct: 2,
                explanation: "Both registration.php and etc/module.xml are MANDATORY. registration.php registers the module with Magento and Composer, while etc/module.xml specifies the module name and dependencies. composer.json is recommended but not strictly required."
            },
            {
                question: "What is the correct format for a module name in Magento 2?",
                options: [
                    "vendor-module",
                    "Vendor\\Module",
                    "Vendor_Module",
                    "vendor/module"
                ],
                correct: 2,
                explanation: "Module names use the format Vendor_Module (e.g., Bonlineco_Blog). The PSR-4 namespace path uses backslashes: Vendor\\Module, but the module name itself uses underscore."
            },
            {
                question: "What does the <sequence> element in etc/module.xml define?",
                options: [
                    "The order of method execution",
                    "Module dependencies and load order",
                    "Database table sequence",
                    "Version history"
                ],
                correct: 1,
                explanation: "The <sequence> element defines module dependencies and controls load order. If a module is in the sequence, it cannot be disabled while the dependent module is enabled."
            },
            {
                question: "When should you use the --keep-generated flag with setup:upgrade?",
                options: [
                    "Always, to speed up deployment",
                    "Never, it causes issues",
                    "Only when the module doesn't modify plugins or extension attributes",
                    "Only in production mode"
                ],
                correct: 2,
                explanation: "Use --keep-generated to speed up development when your module doesn't modify generated code (plugins, extension attributes). If unsure, manually delete the generated/ directory to ensure changes take effect."
            },
            {
                question: "What must be specified in composer.json for a Magento 2 module?",
                options: [
                    "type: magento2-module",
                    "type: module",
                    "type: magento-extension",
                    "type: library"
                ],
                correct: 0,
                explanation: "The composer.json file must specify \"type\": \"magento2-module\" to identify it as a Magento module. It should also include PSR-4 autoload mapping."
            },
            {
                question: "What are the two parts of a module's identity?",
                options: [
                    "Module name and version",
                    "Module name and PSR-4 path",
                    "Vendor name and description",
                    "Registration path and namespace"
                ],
                correct: 1,
                explanation: "A module has two identity parts: Module Name (e.g., Bonlineco_Blog) used by Magento, and PSR-4 Path (e.g., Bonlineco\\Blog) used by Composer for autoloading."
            },
            {
                question: "When should you create a new module?",
                options: [
                    "For any code change over 50 lines",
                    "For significant features (>250 lines), customizing other modules, or creating themes",
                    "Only when creating a new product feature",
                    "Whenever you need to modify a core file"
                ],
                correct: 1,
                explanation: "Create a new module when: adding features with >250 lines of code, customizing functionality in different existing modules, creating supporting frameworks for themes, grouping customizations by area, or modifying third-party modules."
            },
            {
                question: "What command sequence is required to install a new module?",
                options: [
                    "bin/magento setup:upgrade only",
                    "bin/magento module:enable then bin/magento setup:upgrade",
                    "composer install then bin/magento cache:flush",
                    "bin/magento module:install ModuleName"
                ],
                correct: 1,
                explanation: "The two-step process is: 1) bin/magento module:enable Vendor_Module to enable the module, 2) bin/magento setup:upgrade to synchronize database schema and run setup scripts."
            }
        ];
    </script>
</body>
</html>
