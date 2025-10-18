<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice: 1.05 Create Controllers - AD0-E717</title>
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
                    <div class="topic-badge">1.05</div>
                    <h1><i class="fas fa-route"></i> Create Controllers</h1>
                    <p class="mb-0">15 Questions</p>
                </div>

                <div class="progress-container">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Progress</span>
                        <span id="progressText">0/15</span>
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
                    <a href="cert-topic-1-05.php" class="btn btn-outline-secondary">
                        <i class="fas fa-book"></i> Study Topic 1.05
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
                question: "How many segments make up a standard Magento controller URL?",
                options: [
                    "Two segments",
                    "Three segments",
                    "Four segments",
                    "Five segments"
                ],
                correct: 1,
                explanation: "A standard Magento URL has THREE segments: frontName (from routes.xml), directory (Controller folder), and action class (PHP file)."
            },
            {
                question: "Where is the frontName for a controller route defined?",
                options: [
                    "In the controller class itself",
                    "In routes.xml using the frontName attribute",
                    "In di.xml",
                    "In module.xml"
                ],
                correct: 1,
                explanation: "The frontName is defined in the module's routes.xml file (in etc/frontend/ or etc/adminhtml/) using the frontName attribute in the <route> tag."
            },
            {
                question: "Given the URL /blog/post/view, what is the file location of the controller?",
                options: [
                    "Controller/Blog/Post/View.php",
                    "Controller/Post/View.php",
                    "Controller/View.php",
                    "Blog/Post/View.php"
                ],
                correct: 1,
                explanation: "The second segment (post) becomes the directory, and the third segment (view) becomes the class file: Controller/Post/View.php. The frontName (blog) is defined in routes.xml, not in the file structure."
            },
            {
                question: "What interface must a controller implement?",
                options: [
                    "ControllerInterface",
                    "ActionInterface",
                    "RequestInterface",
                    "ResponseInterface"
                ],
                correct: 1,
                explanation: "Controllers must implement \\Magento\\Framework\\App\\ActionInterface (or more specific interfaces like HttpGetActionInterface or HttpPostActionInterface)."
            },
            {
                question: "What method is mandatory in all controller classes?",
                options: [
                    "run()",
                    "handle()",
                    "execute()",
                    "process()"
                ],
                correct: 2,
                explanation: "The execute() method is mandatory in all controller classes. This method is defined by the ActionInterface and is where the controller logic resides."
            },
            {
                question: "What must be injected in a controller's constructor?",
                options: [
                    "PageFactory",
                    "Context",
                    "Request",
                    "Response"
                ],
                correct: 1,
                explanation: "The Context object (\\Magento\\Framework\\App\\Action\\Context) must be injected in the constructor. It provides access to essential objects like getRequest(), getResponse(), and getUrl()."
            },
            {
                question: "How is the layout handle generated for a controller?",
                options: [
                    "frontName_directory_action",
                    "module_directory_action",
                    "route_id_directory_action",
                    "vendor_module_directory_action"
                ],
                correct: 2,
                explanation: "The layout handle is generated by combining route_id + directory + action. For example: bonlineco_blog_post_view. The route_id comes from the id attribute in routes.xml."
            },
            {
                question: "Which result type should be used to render an HTML page?",
                options: [
                    "Page (PageFactory)",
                    "Html (HtmlFactory)",
                    "View (ViewFactory)",
                    "Template (TemplateFactory)"
                ],
                correct: 0,
                explanation: "PageFactory should be injected and used to create a Page result (\\Magento\\Framework\\View\\Result\\Page) which renders HTML based on Layout XML handles."
            },
            {
                question: "What is the difference between Redirect and Forward result types?",
                options: [
                    "No difference, they're the same",
                    "Redirect changes the URL, Forward keeps the same URL",
                    "Forward changes the URL, Redirect keeps the same URL",
                    "Redirect is for external URLs, Forward is for internal"
                ],
                correct: 1,
                explanation: "Redirect performs a 301/302 HTTP redirect (URL changes in browser). Forward internally transfers control to another controller without changing the URL shown to the user."
            },
            {
                question: "Why is returning JSON from a custom controller considered a 'code smell'?",
                options: [
                    "JSON is slow to process",
                    "JSON doesn't work in Magento",
                    "REST API should be used instead for authentication, structure, and Extension Attributes",
                    "JSON can only be used in admin controllers"
                ],
                correct: 2,
                explanation: "Returning JSON from controllers is bad practice because REST API provides: structured data formats, built-in authentication, better performance, and Extension Attributes support."
            },
            {
                question: "How should URL parameters be accessed in a controller?",
                options: [
                    "$this->getParam('id')",
                    "$this->context->getRequest()->getParam('id')",
                    "$_GET['id']",
                    "$this->request->get('id')"
                ],
                correct: 1,
                explanation: "Access URL parameters via the Context object: $this->context->getRequest()->getParam('id'). Never use superglobals like $_GET directly."
            },
            {
                question: "According to best practices, where should data loading logic reside?",
                options: [
                    "In the controller's execute() method",
                    "In the .phtml template file",
                    "In a separate data class or View Model",
                    "In the Block class"
                ],
                correct: 2,
                explanation: "Data loading logic should be in a separate data class (e.g., ProductDisplayRequest) or View Model. Controllers should have minimal logic and just return results. This follows separation of concerns."
            },
            {
                question: "Where must admin controller routes be declared?",
                options: [
                    "etc/frontend/routes.xml",
                    "etc/adminhtml/routes.xml",
                    "etc/routes.xml",
                    "etc/admin/routes.xml"
                ],
                correct: 1,
                explanation: "Admin controller routes must be declared in etc/adminhtml/routes.xml (not frontend). The router id should be 'admin'."
            },
            {
                question: "What constant is MANDATORY in admin controllers for security?",
                options: [
                    "const ADMIN_AREA = true;",
                    "const ADMIN_RESOURCE = 'Resource_Id';",
                    "const ACL_REQUIRED = 'Resource_Id';",
                    "const SECURITY_CHECK = true;"
                ],
                correct: 1,
                explanation: "Admin controllers MUST contain the ADMIN_RESOURCE constant (e.g., const ADMIN_RESOURCE = 'Bonlineco_Blog::post_save';) which maps to an ACL resource defined in etc/acl.xml."
            },
            {
                question: "How should admin panel URLs be accessed?",
                options: [
                    "Type manually in the browser",
                    "Via generated links with secret keys",
                    "Using direct paths in code",
                    "Through REST API only"
                ],
                correct: 1,
                explanation: "Admin URLs contain secret keys and should NOT be typed manually. They must be accessed via generated links (e.g., from menu.xml entries or using \\Magento\\Backend\\Model\\Url)."
            }
        ];
    </script>
</body>
</html>
