<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pageTitle = '1.05 Create Controllers | AD0-E717 Certification Lesson';
$pageType = 'lesson';
include 'includes/head.php';
?>
    <script type="module">
        import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs';
        mermaid.initialize({ startOnLoad: true, theme: 'default' });
    </script>
    <style>
        body { padding-top: 20px; padding-bottom: 40px; }
        .sidebar { position: fixed; top: 0; bottom: 0; left: -250px; width: 250px; z-index: 1000; padding: 20px 0; overflow-x: hidden; overflow-y: auto; background-color: #f8f9fa; transition: left 0.3s ease; border-right: 1px solid #dee2e6; }
        .sidebar.show { left: 0; }
        .sidebar-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999; display: none; }
        .sidebar-overlay.show { display: block; }
        .main-content { margin-left: 0; padding: 20px 15px; }
        .mobile-menu-toggle { position: fixed; top: 20px; left: 20px; z-index: 1001; background: #0d6efd; color: white; border: none; border-radius: 4px; padding: 8px 12px; cursor: pointer; }
        .mobile-menu-toggle:hover { background: #0b5ed7; }
        .mobile-menu-toggle span { display: block; width: 20px; height: 2px; background: white; margin: 3px 0; }
        .sidebar-close { position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 24px; color: #6c757d; cursor: pointer; display: none; }
        .nav-link { color: #333; }
        .nav-link.active { font-weight: bold; color: #0d6efd; }
        h2 { margin-top: 30px; padding-bottom: 10px; border-bottom: 1px solid #dee2e6; }
        h3 { margin-top: 25px; color: #0d6efd; }
        @media (min-width: 768px) { .sidebar { left: 0; } .main-content { margin-left: 250px; padding: 20px; } .mobile-menu-toggle { display: none; } .sidebar-overlay { display: none !important; } }
        @media (max-width: 767px) { .sidebar-close { display: block; } .main-content { padding-top: 70px; } }
        pre { background: #f8f9fa; padding: 15px; border-radius: 4px; border: 1px solid #dee2e6; overflow-x: auto; }
        code { background: #f1f3f5; padding: 2px 6px; border-radius: 3px; color: #e83e8c; font-family: 'Courier New', monospace; }
        .objective-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 12px; margin-bottom: 30px; }
        .objective-number { font-size: 3rem; font-weight: 800; opacity: 0.3; line-height: 1; }
        .objective-title { font-size: 1.8rem; font-weight: 700; margin: 10px 0; }
        .concept-card { background: white; border-left: 4px solid #6610f2; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        .key-point { background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 15px 0; border-radius: 4px; }
        .warning-box { background: #f8d7da; border-left: 4px solid #dc3545; padding: 15px; margin: 15px 0; border-radius: 4px; }
        .success-box { background: #d1e7dd; border-left: 4px solid #198754; padding: 15px; margin: 15px 0; border-radius: 4px; }
        .info-box { background: #cfe2ff; border-left: 4px solid #0d6efd; padding: 15px; margin: 15px 0; border-radius: 4px; }
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
                <div class="objective-header">
                    <div class="objective-number">1.05</div>
                    <h1 class="objective-title">Create Controllers</h1>
                    <p class="mb-0">Understanding controllers as entry points for custom functionality via URLs.</p>
                </div>

                <?php require 'includes/topics/1-05/content.php'; ?>

                <div class="mt-4">
                    <a href="cert-topic-1-04.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Previous: 1.04 Plugins & Observers</a>
                    <a href="cert-topic-1-06.php" class="btn btn-primary float-end">Next: 1.06 CLI Commands <i class="fas fa-arrow-right"></i></a>
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
