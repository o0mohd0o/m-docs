<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certification Practice - AD0-E717</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="css/common.css" rel="stylesheet">
  <link href="css/quiz.css" rel="stylesheet">
  <style>
    .practice-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px; }
    .practice-card { border: 1px solid #e5e7eb; border-radius: 12px; padding: 18px; background: #fff; transition: box-shadow .2s, transform .2s; }
    .practice-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.06); }
    .topic-badge { display: inline-block; background: #0d6efd; color: #fff; padding: 4px 10px; border-radius: 9999px; font-weight: 600; font-size: .85rem; }
    .practice-title { font-size: 1.05rem; font-weight: 600; margin: 10px 0 6px; }
    .practice-meta { color: #6b7280; font-size: .9rem; }
  </style>
</head>
<body>
  <button class="mobile-menu-toggle d-md-none" id="mobileMenuToggle"><span></span><span></span><span></span></button>
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <div class="container-fluid">
    <div class="row">
      <div id="nav-placeholder" data-nav-type="certification"></div>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2"><i class="fas fa-check-circle me-2"></i>Certification Practice</h1>
        </div>

        <p class="text-muted">Choose a topic to start a timed quiz. Each quiz contains 8 questions based on the Adobe Commerce Developer (AD0-E717) exam blueprint.</p>

        <div class="practice-grid mt-4">
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-01.php">
            <span class="topic-badge">1.01</span>
            <div class="practice-title">File Structure</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-02.php">
            <span class="topic-badge">1.02</span>
            <div class="practice-title">Module Structure</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-03.php">
            <span class="topic-badge">1.03</span>
            <div class="practice-title">di.xml Usage</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-04.php">
            <span class="topic-badge">1.04</span>
            <div class="practice-title">Plugins & Observers</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-05.php">
            <span class="topic-badge">1.05</span>
            <div class="practice-title">Create Controllers</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-06.php">
            <span class="topic-badge">1.06</span>
            <div class="practice-title">CLI Commands</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-07.php">
            <span class="topic-badge">1.07</span>
            <div class="practice-title">Index Functionality</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-08.php">
            <span class="topic-badge">1.08</span>
            <div class="practice-title">Localization</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-09.php">
            <span class="topic-badge">1.09</span>
            <div class="practice-title">Cron Functionality</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-10.php">
            <span class="topic-badge">1.10</span>
            <div class="practice-title">Custom Module Routes</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
          <a class="practice-card text-decoration-none text-reset" href="cert-practice-1-11.php">
            <span class="topic-badge">1.11</span>
            <div class="practice-title">URL Rewrites</div>
            <div class="practice-meta"><i class="far fa-clock me-1"></i>8 Questions</div>
          </a>
        </div>

        <div class="mt-4">
          <a href="cert-overview.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Certification Overview
          </a>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/nav-loader.js"></script>
  <script src="js/common.js"></script>
</body>
</html>
