<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magento 2 Database - Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { padding-top: 20px; padding-bottom: 40px; }
        .sidebar { position: fixed; top: 0; bottom: 0; left: -250px; width: 250px; z-index: 1000; padding: 20px 0; overflow-x: hidden; overflow-y: auto; background-color: #f8f9fa; transition: left 0.3s ease; border-right: 1px solid #dee2e6; }
        .sidebar.show { left: 0; }
        .sidebar-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999; display: none; }
        .sidebar-overlay.show { display: block; }
        .main-content { margin-left: 0; padding: 20px 15px; }
        .mobile-menu-toggle { position: fixed; top: 20px; left: 20px; z-index: 1001; background: #0d6efd; color: white; border: none; border-radius: 4px; padding: 8px 12px; cursor: pointer; transition: background-color 0.3s ease; }
        .mobile-menu-toggle:hover { background: #0b5ed7; }
        .mobile-menu-toggle span { display: block; width: 20px; height: 2px; background: white; margin: 3px 0; transition: 0.3s; }
        .sidebar-close { position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 24px; color: #6c757d; cursor: pointer; display: none; }
        .nav-link { color: #333; }
        .nav-link.active { font-weight: bold; color: #0d6efd; }
        .table-container { margin-bottom: 30px; }
        h2 { margin-top: 30px; padding-bottom: 10px; border-bottom: 1px solid #dee2e6; }
        h3 { margin-top: 25px; color: #0d6efd; }
        .table-description { margin-bottom: 15px; }
        @media (min-width: 768px) { .sidebar { left: 0; position: fixed; } .main-content { margin-left: 250px; padding: 20px; } .mobile-menu-toggle { display: none; } .sidebar-overlay { display: none !important; } }
        @media (max-width: 767px) { .sidebar-close { display: block; } .main-content { padding-top: 70px; } h1.h2 { font-size: 1.5rem; } .table-responsive { font-size: 0.875rem; } .alert { font-size: 0.9rem; } pre { font-size: 0.75rem; overflow-x: auto; } }
        @media (max-width: 480px) { .main-content { padding: 70px 10px 20px; } h1.h2 { font-size: 1.25rem; } .table-responsive { font-size: 0.8rem; } pre { font-size: 0.7rem; } }
    </style>
</head>
<body>
    <button class="mobile-menu-toggle d-md-none" id="mobileMenuToggle"><span></span><span></span><span></span></button>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div class="container-fluid">
        <div class="row">
            <div id="nav-placeholder"></div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="mb-3">
                    <div class="input-group" style="max-width: 500px;">
                        <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                        <input type="text" id="tableSearch" class="form-control" placeholder="Search tables, columns, descriptions..." autocomplete="off">
                    </div>
                </div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Inventory Database Structure</h1>
                </div>
                <div class="overview">
                    <div class="alert alert-warning">
                        <h4>Legacy vs. MSI</h4>
                        <p>Magento 2 has two inventory systems: Legacy (<code>cataloginventory_*</code>) and MSI (<code>inventory_*</code>).</p>
                    </div>
                    <h3>Key Relationships</h3>
                    <img src="images/inventory-relationships.svg" alt="Inventory Tables Relationships" style="max-width: 800px;" class="img-fluid mt-3 mb-4">
                    <p class="text-muted"><em>Note: This is a simplified diagram showing the main relationships.</em></p>
                    <h2>Legacy Inventory Tables</h2>
                    <div class="table-container">
                        <h3>cataloginventory_stock</h3>
                        <p class="table-description">Defines inventory stocks (legacy).</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>stock_id</strong></td><td>smallint</td><td>Primary key</td></tr>
                                    <tr><td><strong>website_id</strong></td><td>smallint</td><td>Website ID</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h2>Multi-Source Inventory (MSI) Tables</h2>
                    <div class="table-container">
                        <h3>inventory_source</h3>
                        <p class="table-description">Defines inventory sources.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>source_code</strong></td><td>varchar</td><td>Primary key</td></tr>
                                    <tr><td><strong>name</strong></td><td>varchar</td><td>Source name</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="alert alert-info mt-4">
                        <h4>Data Analysis Tips</h4>
                        <ul>
                            <li>Use MSI tables for Magento 2.3+ for accurate stock levels</li>
                            <li>Sum quantities across sources for total availability</li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/nav-loader.js"></script>
    <script src="js/common.js"></script>
    <script>
        document.getElementById('tableSearch').addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase().trim();
            const containers = document.querySelectorAll('.table-container, h2, h3');
            if (query.length === 0) { containers.forEach(el => el.style.display = ''); return; }
            containers.forEach(container => {
                if (container.textContent.toLowerCase().includes(query)) {
                    container.style.display = '';
                    if (container.classList.contains('table-container')) {
                        container.style.backgroundColor = '#fff3cd';
                        setTimeout(() => { container.style.backgroundColor = ''; }, 2000);
                    }
                } else if (container.classList.contains('table-container') || container.tagName === 'H2' || container.tagName === 'H3') {
                    container.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
