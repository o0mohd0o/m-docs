<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pageTitle = 'Commerce Cloud Fundamentals Study Guide | Magento Cloud Platform';
$pageType = 'lesson';
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
        .topic-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-top: 30px; }
        .topic-card { background: white; border-left: 4px solid #dc3545; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); transition: all 0.3s; }
        .topic-card:hover { transform: translateY(-5px); box-shadow: 0 4px 16px rgba(220,53,69,0.2); }
        .topic-number { display: inline-block; background: #dc3545; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.875rem; font-weight: 600; margin-bottom: 15px; }
        .topic-card h3 { font-size: 1.3rem; font-weight: 600; color: #333; margin-bottom: 15px; }
        .topic-links { display: flex; gap: 10px; margin-top: 20px; }
        .topic-link { flex: 1; padding: 10px; text-align: center; border-radius: 8px; text-decoration: none; font-size: 0.9rem; font-weight: 500; transition: all 0.3s; }
        .topic-link-primary { background: #dc3545; color: white; }
        .topic-link-primary:hover { background: #c82333; }
        .topic-link-secondary { border: 2px solid #e0e0e0; color: #666; }
        .topic-link-secondary:hover { border-color: #dc3545; color: #dc3545; }
        .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
        .info-card { background: white; padding: 20px; border-radius: 8px; border-left: 4px solid #dc3545; }
        .info-card h4 { color: #dc3545; margin-bottom: 15px; }
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
                    <h1><i class="fas fa-cloud"></i> Commerce Cloud Fundamentals</h1>
                    <p>Master Magento Cloud hosting platform, deployment workflows, and cloud administration</p>
                </div>

                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Exam Important:</strong> Commerce Cloud questions appear on the AD0-E717 exam! This section covers essential Cloud fundamentals including platform features, Starter vs Pro editions, branching workflows, deployment processes, and Cloud Admin UI.
                </div>

                <h2>What is Magento Commerce Cloud?</h2>
                <div class="info-grid">
                    <div class="info-card">
                        <h4><i class="fas fa-cloud"></i> Platform Overview</h4>
                        <ul>
                            <li>Hosting platform built on AWS</li>
                            <li>Based on Platform.sh</li>
                            <li>Managed code and environment</li>
                            <li>Most qualified hosting for Commerce</li>
                        </ul>
                    </div>
                    <div class="info-card">
                        <h4><i class="fas fa-layer-group"></i> Two Editions</h4>
                        <ul>
                            <li><strong>Starter:</strong> Shared hosting</li>
                            <li><strong>Pro:</strong> Dedicated instances</li>
                            <li>Different workflows</li>
                            <li>Varying features and architecture</li>
                        </ul>
                    </div>
                </div>

                <h2 class="mt-5">Study Topics</h2>
                
                <div class="topic-grid">
                    <div class="topic-card">
                        <span class="topic-number">1.1</span>
                        <h3>Cloud Features & Functions</h3>
                        <p style="color: #666;">Understand Magento Cloud platform, Starter vs Pro editions, features, architecture, and deployment workflows.</p>
                        <ul style="color: #666; font-size: 0.9rem;">
                            <li>Platform overview and features</li>
                            <li>Starter edition workflow</li>
                            <li>Pro edition structure</li>
                            <li>Branching strategies</li>
                        </ul>
                        <div class="topic-links">
                            <a href="cloud-topic-1-01.php" class="topic-link topic-link-primary">Study Topic</a>
                            <a href="cloud-practice-1-01.php" class="topic-link topic-link-secondary">Practice Quiz</a>
                        </div>
                    </div>

                    <div class="topic-card">
                        <span class="topic-number">1.2</span>
                        <h3>Cloud Admin UI Settings</h3>
                        <p style="color: #666;">Learn to locate and configure settings in the Cloud Admin UI for project management and deployment.</p>
                        <ul style="color: #666; font-size: 0.9rem;">
                            <li>Admin UI navigation</li>
                            <li>Project settings</li>
                            <li>Environment configuration</li>
                            <li>Deployment management</li>
                        </ul>
                        <div class="topic-links">
                            <a href="cloud-topic-1-02.php" class="topic-link topic-link-primary">Study Topic</a>
                            <a href="cloud-practice-1-02.php" class="topic-link topic-link-secondary">Practice Quiz</a>
                        </div>
                    </div>

                    <div class="topic-card">
                        <span class="topic-number">1.3</span>
                        <h3>Manage Users</h3>
                        <p style="color: #666;">Demonstrate the ability to manage users, add SSH keys, assign roles, and configure permissions.</p>
                        <ul style="color: #666; font-size: 0.9rem;">
                            <li>Add SSH keys</li>
                            <li>Add users to projects</li>
                            <li>User roles (Admin, Contributor, Reader)</li>
                            <li>Support ticket access</li>
                        </ul>
                        <div class="topic-links">
                            <a href="cloud-topic-1-03.php" class="topic-link topic-link-primary">Study Topic</a>
                            <a href="cloud-practice-1-03.php" class="topic-link topic-link-secondary">Practice Quiz</a>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success mt-5">
                    <h4><i class="fas fa-graduation-cap"></i> Study Recommendations</h4>
                    <ul class="mb-0">
                        <li>Get hands-on experience with a Cloud sandbox (Partner or Community Insider access)</li>
                        <li>Practice branching and deployment workflows</li>
                        <li>Familiarize yourself with git commands and cloud CLI</li>
                        <li>Understand data flow: Production → Staging → Integration</li>
                        <li>Review architecture differences between Starter and Pro</li>
                    </ul>
                </div>

                <div class="mt-4">
                    <a href="cert-overview.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Cert Overview</a>
                    <a href="cloud-practice.php" class="btn btn-danger"><i class="fas fa-check-circle"></i> All Practice Questions</a>
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
