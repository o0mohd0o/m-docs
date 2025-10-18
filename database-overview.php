<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Overview - Magento 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary: #0d6efd; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background: #f8f9fa; }
        .header { background: white; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px 0; position: sticky; top: 0; z-index: 1000; }
        .header-content { max-width: 1200px; margin: 0 auto; padding: 0 30px; display: flex; justify-content: space-between; align-items: center; gap: 20px; }
        .breadcrumb-nav { display: flex; align-items: center; gap: 10px; color: #666; font-size: 0.95rem; }
        .breadcrumb-nav a { color: var(--primary); text-decoration: none; }
        .search-box { flex: 1; max-width: 400px; position: relative; }
        .search-box input { width: 100%; padding: 10px 40px 10px 15px; border: 2px solid #e0e0e0; border-radius: 25px; transition: all 0.3s; }
        .search-box input:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1); }
        .search-box i { position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #999; }
        .btn-home { background: var(--primary); color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s; }
        .btn-home:hover { background: #0b5ed7; color: white; transform: translateY(-2px); }
        .main-content { max-width: 1200px; margin: 40px auto; padding: 0 30px 80px; }
        .page-title { background: white; border-radius: 16px; padding: 40px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); }
        .page-title h1 { font-size: 2.5rem; font-weight: 800; color: #333; margin-bottom: 15px; display: flex; align-items: center; gap: 15px; }
        .page-title h1 i { color: var(--primary); }
        .page-title p { font-size: 1.1rem; color: #666; line-height: 1.6; }
        .content-section { background: white; border-radius: 16px; padding: 40px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); }
        .content-section h2 { font-size: 1.8rem; font-weight: 700; color: #333; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 3px solid #f0f0f0; }
        .content-section h3 { font-size: 1.4rem; font-weight: 600; color: var(--primary); margin: 25px 0 15px; }
        .content-section p, .content-section li { color: #666; line-height: 1.8; }
        .module-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin: 30px 0; }
        .module-card { background: white; border: 2px solid #e0e0e0; border-radius: 12px; padding: 20px; text-decoration: none; color: inherit; transition: all 0.3s; }
        .module-card:hover { border-color: var(--primary); transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .module-card h4 { color: #333; font-weight: 600; margin-bottom: 10px; display: flex; align-items: center; gap: 10px; }
        .module-card h4 i { color: var(--primary); }
        .module-card .prefix { background: #f8f9fa; padding: 4px 10px; border-radius: 4px; font-size: 0.85rem; color: #666; font-family: monospace; }
        table { width: 100%; border-collapse: separate; border-spacing: 0; margin: 20px 0; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        thead { background: linear-gradient(135deg, #f8f9fa, #e9ecef); }
        th { padding: 15px; text-align: left; font-weight: 600; color: #444; font-size: 0.95rem; }
        td { padding: 15px; border-top: 1px solid #f0f0f0; color: #666; }
        tbody tr:hover { background: #f8f9fa; }
        code { background: #f1f3f5; padding: 3px 8px; border-radius: 4px; font-size: 0.9em; color: #e83e8c; font-family: 'Courier New', monospace; }
        @media (max-width: 768px) { .header-content { flex-wrap: wrap; } .search-box { order: 3; max-width: 100%; width: 100%; } .page-title h1 { font-size: 2rem; } .module-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="breadcrumb-nav">
                <a href="index.php"><i class="fas fa-home"></i> Home</a>
                <span>/</span>
                <span>Database Overview</span>
            </div>
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search documentation..." autocomplete="off">
                <i class="fas fa-search"></i>
            </div>
            <a href="index.php" class="btn-home">
                <i class="fas fa-arrow-left"></i>
                Back to Home
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Page Title -->
        <div class="page-title">
            <h1><i class="fas fa-database"></i> Magento 2 Database Overview</h1>
            <p>This documentation provides a comprehensive guide to the Magento 2 database structure, designed to help data analysts and developers understand the relationships between tables and their purposes. Magento 2 uses a complex database schema with over 300 tables organized into different modules.</p>
        </div>

        <!-- Database Architecture -->
        <div class="content-section">
            <h2>Database Architecture</h2>
            <p>Magento 2 uses a modular architecture where each module has its own set of database tables. The database follows these key design patterns:</p>
            <ul>
                <li><strong>EAV (Entity-Attribute-Value)</strong> - A flexible schema that allows for dynamic attributes without changing database structure</li>
                <li><strong>Flat Tables</strong> - Denormalized tables for performance optimization in catalog and product queries</li>
                <li><strong>Relational Tables</strong> - Standard normalized database tables following relational database principles</li>
            </ul>
            <h3>Key Database Modules</h3>
            <div class="module-grid">
                <a href="sales.php" class="module-card">
                    <h4><i class="fas fa-shopping-cart"></i> Sales & Orders</h4>
                    <span class="prefix">sales_*</span>
                    <p>Tables related to orders, invoices, shipments, and payments</p>
                </a>
                <a href="catalog.php" class="module-card">
                    <h4><i class="fas fa-box"></i> Catalog</h4>
                    <span class="prefix">catalog_*</span>
                    <p>Product, category, and attribute information</p>
                </a>
                <a href="customer.php" class="module-card">
                    <h4><i class="fas fa-user"></i> Customer</h4>
                    <span class="prefix">customer_*</span>
                    <p>Customer accounts, addresses, and groups</p>
                </a>
                <a href="eav.php" class="module-card">
                    <h4><i class="fas fa-link"></i> EAV</h4>
                    <span class="prefix">eav_*</span>
                    <p>Entity-Attribute-Value core tables</p>
                </a>
                <a href="inventory.php" class="module-card">
                    <h4><i class="fas fa-warehouse"></i> Inventory</h4>
                    <span class="prefix">inventory_*, cataloginventory_*</span>
                    <p>Stock management and inventory</p>
                </a>
                <a href="cms.php" class="module-card">
                    <h4><i class="fas fa-file-alt"></i> CMS & Content</h4>
                    <span class="prefix">cms_*</span>
                    <p>Content management, pages, and blocks</p>
                </a>
            </div>
        </div>

        <!-- Common ID Patterns -->
        <div class="content-section">
            <h2>Common ID Patterns</h2>
            <p>Understanding these common ID patterns will help you navigate the database:</p>
            <ul>
                <li><strong>entity_id</strong> - Primary key in most entity tables (products, customers, categories, etc.)</li>
                <li><strong>*_id</strong> - Foreign keys referencing other tables (e.g., <code>customer_id</code>, <code>product_id</code>)</li>
                <li><strong>increment_id</strong> - Human-readable IDs displayed to users (like order numbers: #000000001)</li>
                <li><strong>store_id</strong> - References to specific store views for multi-store setup</li>
                <li><strong>website_id</strong> - References to specific websites in multi-website installations</li>
            </ul>
        </div>

        <!-- Table Naming Conventions -->
        <div class="content-section">
            <h2>Table Naming Conventions</h2>
            <p>Magento 2 follows consistent naming patterns:</p>
            <table>
                <thead>
                    <tr><th>Pattern</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr><td><code>module_entity</code></td><td>Main entity tables</td><td><code>sales_order</code>, <code>catalog_product_entity</code></td></tr>
                    <tr><td><code>entity_type</code></td><td>Related data tables</td><td><code>sales_order_item</code>, <code>sales_order_address</code></td></tr>
                    <tr><td><code>entity_eav_attribute</code></td><td>EAV attribute values</td><td><code>catalog_product_entity_varchar</code></td></tr>
                    <tr><td><code>entity_grid</code></td><td>Admin grid tables (denormalized)</td><td><code>sales_order_grid</code></td></tr>
                    <tr><td><code>entity_entity</code></td><td>Many-to-many relationship tables</td><td><code>catalog_product_website</code></td></tr>
                </tbody>
            </table>
        </div>

        <!-- Getting Started -->
        <div class="content-section">
            <div class="info-box" style="background: linear-gradient(135deg, #e7f3ff, #f0f8ff); border-left: 4px solid var(--primary); border-radius: 8px; padding: 25px; margin: 25px 0;">
                <h4 style="color:#333; font-weight:600; margin-bottom:15px;"><i class="fas fa-rocket"></i> Getting Started</h4>
                <p>For new data analysts, we recommend starting with these essential tables:</p>
                <ul style="margin-bottom: 0;">
                    <li><code>sales_order</code> and <code>sales_order_item</code> - For order and revenue analysis</li>
                    <li><code>customer_entity</code> - For customer demographics and segmentation</li>
                    <li><code>catalog_product_entity</code> - For product catalog analysis</li>
                    <li><code>sales_order_grid</code> - Denormalized view with most order information</li>
                </ul>
            </div>
            <p style="margin-top: 20px;">Click on any module card above to explore detailed table structures, relationships, and common queries for that module.</p>
        </div>

        <!-- EAV System Explanation -->
        <div class="content-section">
            <h2>Understanding the EAV System</h2>
            <p>The Entity-Attribute-Value (EAV) model is a key architectural pattern in Magento 2. Unlike traditional table columns, EAV stores attributes as rows, allowing for:</p>
            <ul>
                <li><strong>Dynamic Attributes</strong> - Add new product/customer attributes without database schema changes</li>
                <li><strong>Flexibility</strong> - Different products can have different sets of attributes</li>
                <li><strong>Scalability</strong> - Handle thousands of attributes efficiently</li>
            </ul>
            <h3>EAV Tables Structure</h3>
            <p>Each EAV entity type (product, customer, category) has multiple tables:</p>
            <table>
                <thead>
                    <tr><th>Table Type</th><th>Purpose</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr><td><code>*_entity</code></td><td>Main entity data</td><td><code>catalog_product_entity</code></td></tr>
                    <tr><td><code>*_entity_varchar</code></td><td>Text attribute values</td><td><code>catalog_product_entity_varchar</code></td></tr>
                    <tr><td><code>*_entity_int</code></td><td>Integer attribute values</td><td><code>catalog_product_entity_int</code></td></tr>
                    <tr><td><code>*_entity_decimal</code></td><td>Decimal attribute values (prices, weights)</td><td><code>catalog_product_entity_decimal</code></td></tr>
                    <tr><td><code>*_entity_datetime</code></td><td>Date/time attribute values</td><td><code>catalog_product_entity_datetime</code></td></tr>
                    <tr><td><code>*_entity_text</code></td><td>Long text attribute values</td><td><code>catalog_product_entity_text</code></td></tr>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        // Simple search functionality
        document.addEventListener('DOMContentLoaded', function(){
            const input = document.getElementById('searchInput');
            if(!input) return;
            input.addEventListener('input', function(e) {
                const query = e.target.value.toLowerCase();
                if (query.length < 2) return;
                const sections = document.querySelectorAll('.content-section, .module-card');
                sections.forEach(section => {
                    const text = section.textContent.toLowerCase();
                    section.style.display = text.includes(query) ? '' : 'none';
                });
            });
            input.addEventListener('blur', function(){
                if (this.value === '') {
                    document.querySelectorAll('.content-section, .module-card').forEach(el => el.style.display = '');
                }
            });
        });
    </script>
</body>
</html>
