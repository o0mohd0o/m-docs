<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pageTitle = 'Practice: 5.04 Basic Usage of Quote Data | AD0-E717 Exam Prep';
$pageType = 'quiz';
include 'includes/head.php';
?>
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
                    <div class="topic-badge">5.04</div>
                    <h1><i class="fas fa-database"></i> Basic Usage of Quote Data</h1>
                    <p class="mb-0">30 Questions</p>
                </div>

                <div class="progress-container">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Progress</span>
                        <span id="progressText">0/30</span>
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
                    <a href="cert-practice.php" class="btn btn-outline-primary mt-2">
                        <i class="fas fa-list"></i> Back to Quiz Menu
                    </a>
                </div>

                <div class="mt-4">
                    <a href="cert-practice.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Quiz Menu
                    </a>
                    <a href="cert-topic-5-04.php" class="btn btn-outline-secondary">
                        <i class="fas fa-book"></i> Study Topic 5.04
                    </a>
                </div>
            </main>
        </div>
    </div>

    <?php include 'includes/author-footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/visitor-counter.js"></script>
    <script src="js/nav-loader.js"></script>
    <script src="js/common.js"></script>
    <script src="includes/practice/5-04/questions.js"></script>
    <script src="js/quiz-engine.js"></script>
  </body>
  </html>
