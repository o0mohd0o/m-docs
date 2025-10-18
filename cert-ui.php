<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UI & Frontend Development - AD0-E717</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="css/common.css" rel="stylesheet" />
  <style>
    .section-card { background: #fff; border-radius: 12px; border: 1px solid #e5e7eb; padding: 24px; }
    .section-title { display: flex; align-items: center; gap: 10px; margin-bottom: 16px; }
    .chip { display: inline-block; padding: 4px 10px; border-radius: 9999px; background: #0dcaf0; color: #fff; font-weight: 600; font-size: .85rem; }
    .list-check li { margin-bottom: 6px; }
    .list-check li i { color: #0d6efd; }
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
          <h1 class="h2"><i class="fas fa-paint-brush me-2"></i>UI & Frontend Development</h1>
        </div>

        <div class="row g-3">
          <div class="col-12">
            <div class="section-card">
              <div class="section-title">
                <span class="chip">Domain 4 · 18%</span>
                <h2 class="h5 mb-0">What to Focus On</h2>
              </div>
              <ul class="list-unstyled list-check mb-0">
                <li><i class="fas fa-check me-2"></i>Layout XML fundamentals (containers, blocks, referenceBlock, referenceContainer)</li>
                <li><i class="fas fa-check me-2"></i>Blocks and templates lifecycle, view models, escaping, and rendering best practices</li>
                <li><i class="fas fa-check me-2"></i>RequireJS configuration and Magento UI components basics</li>
                <li><i class="fas fa-check me-2"></i>Theme structure, fallback, static assets deployment</li>
              </ul>
            </div>
          </div>

          <div class="col-12">
            <div class="section-card">
              <div class="section-title">
                <h2 class="h5 mb-0"><i class="fas fa-book-open me-2"></i>Study Resources</h2>
              </div>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="p-3 border rounded-3 h-100">
                    <h3 class="h6">Layout XML</h3>
                    <ul class="mb-0">
                      <li>Define structural containers and insert blocks</li>
                      <li>Modify existing layout via updates and handles</li>
                      <li>Use arguments to configure blocks/templates</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 border rounded-3 h-100">
                    <h3 class="h6">Blocks, Templates, View Models</h3>
                    <ul class="mb-0">
                      <li>When to use Blocks vs View Models</li>
                      <li>Escaping output and translation</li>
                      <li>Passing data to templates</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <a class="btn btn-outline-secondary" href="cert-overview.php"><i class="fas fa-arrow-left me-2"></i>Back to Certification Overview</a>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/nav-loader.js"></script>
  <script src="js/common.js"></script>
</body>
</html>
