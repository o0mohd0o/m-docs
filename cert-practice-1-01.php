<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice: 1.01 File Structure - AD0-E717</title>
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
                    <div class="topic-badge">1.01</div>
                    <h1><i class="fas fa-folder-tree"></i> Magento File Structure</h1>
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
                    <a href="cert-topic-1-01.php" class="btn btn-outline-secondary">
                        <i class="fas fa-book"></i> Study Topic 1.01
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
                question: "Which configuration file should NOT be committed to version control?",
                options: [
                    "app/etc/config.php",
                    "app/etc/env.php",
                    "composer.json",
                    "registration.php"
                ],
                correct: 1,
                explanation: "app/etc/env.php contains sensitive environment-specific configuration (database credentials, Redis, AMQP) and should NOT be committed to Git. The config.php file should be committed."
            },
            {
                question: "Where should third-party modules be installed in Magento 2?",
                options: [
                    "app/code/ directory",
                    "vendor/ directory via Composer",
                    "lib/ directory",
                    "generated/ directory"
                ],
                correct: 1,
                explanation: "Third-party modules should be installed via Composer into the vendor/ directory. This allows automatic dependency updates and proper version management."
            },
            {
                question: "What is the recommended HTTP document root for a Magento 2 installation?",
                options: [
                    "The Magento root directory",
                    "app/ directory",
                    "pub/ directory",
                    "var/ directory"
                ],
                correct: 2,
                explanation: "The pub/ directory should be the HTTP document root for security reasons. This prevents exposing sensitive folders like var/ due to misconfiguration."
            },
            {
                question: "Which directory contains auto-generated files like Factory classes, Interceptors, and Proxies?",
                options: [
                    "var/",
                    "generated/",
                    "pub/static/",
                    "vendor/"
                ],
                correct: 1,
                explanation: "The generated/ directory stores auto-generated code including factory classes, interceptor classes (for plugins), proxy classes (for lazy-loading), and extension attribute interfaces/classes."
            },
            {
                question: "What is stored in the var/ directory?",
                options: [
                    "Permanent configuration files",
                    "Third-party modules",
                    "Temporary files that can be deleted anytime",
                    "Core Magento libraries"
                ],
                correct: 2,
                explanation: "The var/ directory stores temporary files (logs, cache, reports) that can be deleted at any time. Never store important information here. Note that file-system caches prevent horizontal scaling."
            },
            {
                question: "Which file contains database credentials and should be environment-specific?",
                options: [
                    "app/etc/config.php",
                    "app/etc/env.php",
                    "app/etc/di.xml",
                    "composer.json"
                ],
                correct: 1,
                explanation: "app/etc/env.php contains database credentials, cache backend configuration, session storage, and other environment-specific settings."
            },
            {
                question: "Where are custom modules typically located in Magento 2?",
                options: [
                    "vendor/",
                    "lib/",
                    "app/code/",
                    "generated/"
                ],
                correct: 2,
                explanation: "Custom modules are typically placed in app/code/VendorName/ModuleName directory. Third-party modules should use vendor/ via Composer."
            },
            {
                question: "What directory stores compiled CSS and JavaScript in production mode?",
                options: [
                    "pub/media/",
                    "pub/static/",
                    "var/view_preprocessed/",
                    "generated/"
                ],
                correct: 1,
                explanation: "pub/static/ stores deployed static files including compiled CSS, JavaScript, and images. In developer mode, it contains symlinks; in production, it contains deployed files."
            }
        ];
    </script>
</body>
</html>
