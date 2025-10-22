<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pageTitle = 'Commerce Cloud Practice Questions | AD0-E717 Exam Prep';
$pageType = 'quiz';
include 'includes/head.php';
?>
    <style>
        body { padding-top: 20px; padding-bottom: 40px; }
        .sidebar { position: fixed; top: 0; bottom: 0; left: -250px; width: 250px; z-index: 1000; padding: 20px 0; overflow-x: hidden; overflow-y: auto; background-color: #f8f9fa; transition: left 0.3s ease; border-right: 1px solid #dee2e6; }
        .sidebar.show { left: 0; }
        .sidebar-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999; display: none; }
        .sidebar-overlay.show { display: block; }
        .main-content { margin-left: 0; padding: 20px 15px; }
        .mobile-menu-toggle { position: fixed; top: 20px; left: 20px; z-index: 1001; background: #dc3545; color: white; border: none; border-radius: 4px; padding: 8px 12px; cursor: pointer; }
        .mobile-menu-toggle:hover { background: #c82333; }
        .mobile-menu-toggle span { display: block; width: 20px; height: 2px; background: white; margin: 3px 0; }
        .sidebar-close { position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 24px; color: #6c757d; cursor: pointer; display: none; }
        @media (min-width: 768px) { .sidebar { left: 0; } .main-content { margin-left: 250px; padding: 20px; } .mobile-menu-toggle { display: none; } .sidebar-overlay { display: none !important; } }
        @media (max-width: 767px) { .sidebar-close { display: block; } .main-content { padding-top: 70px; } }
        .hero-header { background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: white; padding: 40px; border-radius: 12px; margin-bottom: 30px; }
        .hero-header h1 { font-size: 2.5rem; font-weight: 700; margin-bottom: 15px; }
        .hero-header p { font-size: 1.1rem; opacity: 0.95; }
        .quiz-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-top: 30px; }
        .quiz-card { background: white; border-left: 4px solid #dc3545; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); transition: all 0.3s; }
        .quiz-card:hover { transform: translateY(-5px); box-shadow: 0 4px 16px rgba(220,53,69,0.2); }
        .quiz-number { display: inline-block; background: #dc3545; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.875rem; font-weight: 600; margin-bottom: 15px; }
        .quiz-card h3 { font-size: 1.3rem; font-weight: 600; color: #333; margin-bottom: 15px; }
        .quiz-meta { color: #666; font-size: 0.9rem; margin-bottom: 15px; }
        .quiz-btn { display: inline-block; padding: 10px 20px; background: #dc3545; color: white; text-decoration: none; border-radius: 8px; font-weight: 500; transition: all 0.3s; }
        .quiz-btn:hover { background: #c82333; color: white; }
        .study-btn { background: white; color: #dc3545; border: 2px solid #dc3545; }
        .study-btn:hover { background: #dc3545; color: white; }
    </style>
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
                <div class="hero-header">
                    <h1><i class="fas fa-check-circle"></i> Commerce Cloud Practice Questions</h1>
                    <p>Test your knowledge of Commerce Cloud fundamentals with comprehensive practice quizzes</p>
                </div>

                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Exam Important:</strong> Cloud topics represent <strong>22% of the AD0-E717 exam</strong> (Section 7: 12%, Section 8: 4%, Section 9: 6%). These practice questions are essential for exam success!
                </div>

                <h2>Cloud Fundamentals Practice Quizzes</h2>
                
                <div class="quiz-grid">
                    <div class="quiz-card">
                        <span class="quiz-number">1.1</span>
                        <h3>Cloud Features & Functions</h3>
                        <p style="color: #666;">Test your knowledge of Magento Cloud platform, Starter vs Pro editions, branching workflows, and deployment processes.</p>
                        <div class="quiz-meta">
                            <i class="fas fa-question-circle"></i> 30 Questions
                            <span style="margin-left: 15px;"><i class="fas fa-clock"></i> ~15 minutes</span>
                        </div>
                        <div style="margin-top: 20px;">
                            <a href="cloud-practice-1-01.php" class="quiz-btn">
                                <i class="fas fa-play"></i> Start Quiz
                            </a>
                            <a href="cloud-topic-1-01.php" class="quiz-btn study-btn" style="margin-left: 10px;">
                                <i class="fas fa-book"></i> Study First
                            </a>
                        </div>
                    </div>

                    <div class="quiz-card">
                        <span class="quiz-number">1.2</span>
                        <h3>Cloud Admin UI Settings</h3>
                        <p style="color: #666;">Test your ability to locate settings in Cloud Admin UI: project settings, environments, logs, and environment controls.</p>
                        <div class="quiz-meta">
                            <i class="fas fa-question-circle"></i> 30 Questions
                            <span style="margin-left: 15px;"><i class="fas fa-clock"></i> ~15 minutes</span>
                        </div>
                        <div style="margin-top: 20px;">
                            <a href="cloud-practice-1-02.php" class="quiz-btn">
                                <i class="fas fa-play"></i> Start Quiz
                            </a>
                            <a href="cloud-topic-1-02.php" class="quiz-btn study-btn" style="margin-left: 10px;">
                                <i class="fas fa-book"></i> Study First
                            </a>
                        </div>
                    </div>

                    <div class="quiz-card">
                        <span class="quiz-number">1.3</span>
                        <h3>Manage Users</h3>
                        <p style="color: #666;">Test your knowledge of user management: SSH keys, adding users, role assignment (Admin, Contributor, Reader), and permissions.</p>
                        <div class="quiz-meta">
                            <i class="fas fa-question-circle"></i> 30 Questions
                            <span style="margin-left: 15px;"><i class="fas fa-clock"></i> ~15 minutes</span>
                        </div>
                        <div style="margin-top: 20px;">
                            <a href="cloud-practice-1-03.php" class="quiz-btn">
                                <i class="fas fa-play"></i> Start Quiz
                            </a>
                            <a href="cloud-topic-1-03.php" class="quiz-btn study-btn" style="margin-left: 10px;">
                                <i class="fas fa-book"></i> Study First
                            </a>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success mt-5">
                    <h4><i class="fas fa-lightbulb"></i> Study Tips</h4>
                    <ul class="mb-0">
                        <li>Study the topic content thoroughly before attempting the quiz</li>
                        <li>Get hands-on experience with a Cloud sandbox if possible</li>
                        <li>Focus on understanding log locations, environment controls, and the 5 action buttons</li>
                        <li>Remember: Outgoing emails are disabled by default; HTTP access control is ideal for staging</li>
                        <li>Know the difference between Starter and Pro architectures</li>
                    </ul>
                </div>

                <div class="mt-4">
                    <a href="cloud-overview.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Cloud Overview</a>
                    <a href="cert-practice.php" class="btn btn-outline-secondary"><i class="fas fa-list"></i> All Practice Quizzes</a>
                </div>
            </main>
        </div>
    </div>

    <?php include 'includes/author-footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/visitor-counter.js"></script>
    <script src="js/nav-loader.js"></script>
    <script src="js/common.js"></script>
</body>
</html>
