<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice: 1.03 di.xml Usage - AD0-E717</title>
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
                    <div class="topic-badge">1.03</div>
                    <h1><i class="fas fa-cogs"></i> di.xml Usage</h1>
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
                    <a href="cert-topic-1-03.php" class="btn btn-outline-secondary">
                        <i class="fas fa-book"></i> Study Topic 1.03
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
                question: "What is the primary purpose of the <preference> node in di.xml?",
                options: [
                    "To modify constructor arguments",
                    "To substitute classes or implement interfaces",
                    "To create virtual types",
                    "To register plugins"
                ],
                correct: 1,
                explanation: "The <preference> node substitutes the requested class or interface (for attribute) with a different concrete class (type attribute). Use it to implement interfaces or override classes."
            },
            {
                question: "Which xsi:type should be used to inject another class as a dependency?",
                options: [
                    "string",
                    "array",
                    "object",
                    "class"
                ],
                correct: 2,
                explanation: "Use xsi:type=\"object\" to inject another class or virtual type as a dependency. The six xsi:type values are: string, boolean, number, array, object, and const."
            },
            {
                question: "What is a virtualType in Magento 2?",
                options: [
                    "An abstract class",
                    "A class with the same code but different constructor arguments",
                    "A temporary class stored in memory",
                    "An interface implementation"
                ],
                correct: 1,
                explanation: "A virtualType creates a new 'class' with the same code as another class, but with different dependencies passed to its constructor. Perfect for configuration variations."
            },
            {
                question: "Where can di.xml files be placed to apply area-specific configurations?",
                options: [
                    "etc/, etc/adminhtml/, etc/frontend/",
                    "app/code/Area/",
                    "Only in etc/",
                    "config/, admin/, frontend/"
                ],
                correct: 0,
                explanation: "di.xml files can be placed in etc/ (global), etc/adminhtml/ (admin area only), or etc/frontend/ (storefront only) to apply configurations to specific areas."
            },
            {
                question: "When plugins are configured for a class, what does Magento's Object Manager create?",
                options: [
                    "A factory class",
                    "An interceptor class in the generated/ directory",
                    "A proxy class",
                    "A virtual type"
                ],
                correct: 1,
                explanation: "When plugins are configured, the Object Manager creates an Interceptor class (e.g., ClassName\\Interceptor) in the generated/ directory. This interceptor triggers the before, after, and around plugins."
            },
            {
                question: "What type of dependency injection does Magento 2 use?",
                options: [
                    "Setter injection",
                    "Constructor injection",
                    "Property injection",
                    "Method injection"
                ],
                correct: 1,
                explanation: "Magento 2 specifically uses constructor dependency injection. Classes declare their dependencies in the __construct method, and the DI system delivers the necessary instances."
            },
            {
                question: "How many xsi:type values are available in di.xml?",
                options: [
                    "4",
                    "5",
                    "6",
                    "7"
                ],
                correct: 2,
                explanation: "There are 6 xsi:type values: string, boolean, number, array, object, and const. Each serves a specific purpose for passing different types of data to constructors."
            },
            {
                question: "What's the main problem with using <preference> nodes?",
                options: [
                    "They are slow to execute",
                    "Only ONE preference can exist per class - conflicts are common",
                    "They don't work in production mode",
                    "They require cache clearing every time"
                ],
                correct: 1,
                explanation: "The main issue with preferences is that only ONE can exist for a class system-wide. If two modules try to override the same class with preferences, you'll have a conflict. This is why plugins are often preferred."
            }
        ];
    </script>
</body>
</html>
