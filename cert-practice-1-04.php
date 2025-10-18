<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice: 1.04 Plugins & Observers - AD0-E717</title>
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
                    <div class="topic-badge">1.04</div>
                    <h1><i class="fas fa-plug"></i> Plugins, Preferences & Observers</h1>
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
                    <a href="cert-topic-1-04.php" class="btn btn-outline-secondary">
                        <i class="fas fa-book"></i> Study Topic 1.04
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
                question: "Which customization method is RECOMMENDED for most Magento customizations?",
                options: [
                    "Preferences",
                    "Plugins",
                    "Event Observers",
                    "Direct class overrides"
                ],
                correct: 1,
                explanation: "Plugins are the recommended tool for adjusting core functionality. They allow multiple customizations to coexist, have controlled execution order, and are non-invasive."
            },
            {
                question: "What is the sortOrder execution pattern for 'before' plugins?",
                options: [
                    "Highest to lowest",
                    "Lowest to highest",
                    "Random order",
                    "Alphabetically by plugin name"
                ],
                correct: 1,
                explanation: "Before plugins execute from lowest sortOrder to highest sortOrder. After plugins execute in reverse: highest to lowest."
            },
            {
                question: "Which of the following CANNOT have plugins applied to them?",
                options: [
                    "Public methods only",
                    "Final methods, private/protected methods, static methods, and constructors",
                    "Methods with more than 5 parameters",
                    "Methods that return void"
                ],
                correct: 1,
                explanation: "Plugins cannot be applied to: final methods/classes, private or protected methods, static methods, or constructors. They only work with public, non-static, non-final methods."
            },
            {
                question: "What must a before plugin return?",
                options: [
                    "The modified result",
                    "True or false",
                    "An array of parameters",
                    "Null"
                ],
                correct: 2,
                explanation: "Before plugins must return the parameters as an array. This array is then passed to the original method. Example: return [$product, $saveOptions];"
            },
            {
                question: "What is the main problem with using preferences?",
                options: [
                    "They are slow to execute",
                    "Only ONE preference can exist per class - conflicts are common",
                    "They don't work in production mode",
                    "They require cache clearing every time"
                ],
                correct: 1,
                explanation: "Only ONE preference can exist for a class system-wide. If two modules try to override the same class with preferences, you'll have a conflict. This is why plugins are preferred."
            },
            {
                question: "What interface must event observers implement?",
                options: [
                    "EventInterface",
                    "ObserverInterface",
                    "ListenerInterface",
                    "HandlerInterface"
                ],
                correct: 1,
                explanation: "Event observers must implement Magento\\Framework\\Event\\ObserverInterface and contain an execute(Observer $observer) method."
            },
            {
                question: "Which automatic model event is triggered AFTER a database transaction commits?",
                options: [
                    "{prefix}_save_after",
                    "{prefix}_save_commit_after",
                    "{prefix}_save_transaction_after",
                    "{prefix}_commit_after"
                ],
                correct: 1,
                explanation: "The {prefix}_save_commit_after event is triggered after the database transaction commits. This is useful for actions that should only occur if the save was successful."
            },
            {
                question: "Where are Interceptor classes automatically generated?",
                options: [
                    "var/generation/",
                    "generated/ directory",
                    "pub/static/",
                    "app/code/Interceptors/"
                ],
                correct: 1,
                explanation: "Interceptor classes are automatically generated in the generated/ directory. They are created when the DI system instantiates a class that has configured plugins."
            }
        ];
    </script>
</body>
</html>
