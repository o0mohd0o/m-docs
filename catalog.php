<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pageTitle = 'Magento 2 Catalog Database Tables | Reference Guide';
$pageType = 'database';
include 'includes/head.php';
?>
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
                    <h1 class="h2">Catalog Database Structure</h1>
                </div>
                <div class="overview">
                    <p>The Catalog module is the core of Magento's product management system. It stores all product, category, and attribute information. This module primarily uses the EAV (Entity-Attribute-Value) pattern, which allows for flexible attribute management but creates a more complex database structure.</p>
                    <h3>Key Relationships</h3>
                    <img src="images/catalog-relationships.svg" alt="Catalog Tables Relationships" style="max-width: 1024px;" class="img-fluid mt-3 mb-4">
                    <p class="text-muted"><em>Note: This is a simplified diagram showing the main relationships.</em></p>
                    <div class="alert alert-warning">
                        <h4>Understanding EAV Structure</h4>
                        <ul>
                            <li>The main entity tables (like <code>catalog_product_entity</code>) only store basic entity information</li>
                            <li>Actual attribute values are stored in separate value tables based on data type (varchar, int, decimal, text, datetime)</li>
                            <li>To get complete product information, you need to join multiple tables</li>
                        </ul>
                    </div>
                    <h2>Product Tables</h2>
                    <div class="table-container">
                        <h3>catalog_product_entity</h3>
                        <p class="table-description">The main product entity table. Each row represents a unique product in the system.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>entity_id</strong></td><td>int</td><td>Primary key</td></tr>
                                    <tr><td><strong>sku</strong></td><td>varchar</td><td>Product SKU (Stock Keeping Unit)</td></tr>
                                    <tr><td><strong>type_id</strong></td><td>varchar</td><td>Product type (simple, configurable, bundle, etc.)</td></tr>
                                    <tr><td><strong>attribute_set_id</strong></td><td>smallint</td><td>Foreign key to eav_attribute_set.attribute_set_id</td></tr>
                                    <tr><td><strong>created_at</strong></td><td>timestamp</td><td>When the product was created</td></tr>
                                    <tr><td><strong>updated_at</strong></td><td>timestamp</td><td>When the product was last updated</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-container">
                        <h3>catalog_product_entity_* (EAV Value Tables)</h3>
                        <p class="table-description">These tables store the actual attribute values for products. There are separate tables for different data types.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Table</th><th>Data Type</th><th>Example Attributes</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>catalog_product_entity_varchar</strong></td><td>String values</td><td>name, url_key, image, thumbnail</td></tr>
                                    <tr><td><strong>catalog_product_entity_int</strong></td><td>Integer values</td><td>status, visibility, tax_class_id</td></tr>
                                    <tr><td><strong>catalog_product_entity_decimal</strong></td><td>Decimal values</td><td>price, special_price, weight</td></tr>
                                    <tr><td><strong>catalog_product_entity_text</strong></td><td>Long text values</td><td>description, short_description</td></tr>
                                    <tr><td><strong>catalog_product_entity_datetime</strong></td><td>Date/time values</td><td>special_from_date, special_to_date</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h2>Category Tables</h2>
                    <div class="table-container">
                        <h3>catalog_category_entity</h3>
                        <p class="table-description">The main category entity table. Each row represents a category in the catalog.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>entity_id</strong></td><td>int</td><td>Primary key</td></tr>
                                    <tr><td><strong>parent_id</strong></td><td>int</td><td>Parent category ID (forms a tree structure)</td></tr>
                                    <tr><td><strong>path</strong></td><td>varchar</td><td>Path from root category (e.g., "1/2/3")</td></tr>
                                    <tr><td><strong>position</strong></td><td>int</td><td>Position within parent category</td></tr>
                                    <tr><td><strong>level</strong></td><td>int</td><td>Depth in category tree (root = 0)</td></tr>
                                    <tr><td><strong>created_at</strong></td><td>timestamp</td><td>When the category was created</td></tr>
                                    <tr><td><strong>updated_at</strong></td><td>timestamp</td><td>When the category was last updated</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-container">
                        <h3>catalog_category_product</h3>
                        <p class="table-description">Maps products to categories (many-to-many relationship).</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>entity_id</strong></td><td>int</td><td>Primary key</td></tr>
                                    <tr><td><strong>category_id</strong></td><td>int</td><td>Foreign key to catalog_category_entity.entity_id</td></tr>
                                    <tr><td><strong>product_id</strong></td><td>int</td><td>Foreign key to catalog_product_entity.entity_id</td></tr>
                                    <tr><td><strong>position</strong></td><td>int</td><td>Product position within category</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h2>Product Relationship Tables</h2>
                    <div class="table-container">
                        <h3>catalog_product_relation</h3>
                        <p class="table-description">Stores relationships between parent and child products (e.g., configurable products and their simple variants).</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>parent_id</strong></td><td>int</td><td>Foreign key to catalog_product_entity.entity_id (parent product)</td></tr>
                                    <tr><td><strong>child_id</strong></td><td>int</td><td>Foreign key to catalog_product_entity.entity_id (child product)</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-container">
                        <h3>catalog_product_link</h3>
                        <p class="table-description">Stores product links (related, up-sell, cross-sell, etc.).</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>link_id</strong></td><td>int</td><td>Primary key</td></tr>
                                    <tr><td><strong>product_id</strong></td><td>int</td><td>Foreign key to catalog_product_entity.entity_id (source product)</td></tr>
                                    <tr><td><strong>linked_product_id</strong></td><td>int</td><td>Foreign key to catalog_product_entity.entity_id (target product)</td></tr>
                                    <tr><td><strong>link_type_id</strong></td><td>smallint</td><td>Type of link (1=related, 4=up-sell, 5=cross-sell)</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h2>Price Tables</h2>
                    <div class="table-container">
                        <h3>catalog_product_index_price</h3>
                        <p class="table-description">Indexed product prices for faster catalog browsing. This is a denormalized table for performance.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>entity_id</strong></td><td>int</td><td>Foreign key to catalog_product_entity.entity_id</td></tr>
                                    <tr><td><strong>customer_group_id</strong></td><td>smallint</td><td>Customer group ID</td></tr>
                                    <tr><td><strong>website_id</strong></td><td>smallint</td><td>Website ID</td></tr>
                                    <tr><td><strong>price</strong></td><td>decimal</td><td>Base price</td></tr>
                                    <tr><td><strong>final_price</strong></td><td>decimal</td><td>Final price after discounts</td></tr>
                                    <tr><td><strong>min_price</strong></td><td>decimal</td><td>Minimum price (for configurable products)</td></tr>
                                    <tr><td><strong>max_price</strong></td><td>decimal</td><td>Maximum price (for configurable products)</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="alert alert-info mt-4">
                        <h4>Data Analysis Tips</h4>
                        <ul>
                            <li>For basic product information, use EAV joins on value tables.</li>
                            <li>For product-category relationships, join <code>catalog_category_product</code> with <code>catalog_category_entity</code> and <code>catalog_product_entity</code>.</li>
                            <li>For price analysis, use <code>catalog_product_index_price</code> for better performance.</li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include 'includes/author-footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/visitor-counter.js"></script>
    <script src="js/nav-loader.js"></script>
    <script src="js/common.js"></script>
    <script>
        document.getElementById('tableSearch').addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase().trim();
            const containers = document.querySelectorAll('.table-container, h2, h3');
            if (query.length === 0) { containers.forEach(el => el.style.display = ''); return; }
            containers.forEach(container => {
                const text = container.textContent.toLowerCase();
                if (text.includes(query)) {
                    container.style.display = '';
                    if (container.classList.contains('table-container')) {
                        container.style.backgroundColor = '#fff3cd';
                        setTimeout(() => { container.style.backgroundColor = ''; }, 2000);
                    }
                } else {
                    if (container.classList.contains('table-container') || container.tagName === 'H2' || container.tagName === 'H3') {
                        container.style.display = 'none';
                    }
                }
            });
        });
    </script>
</body>
</html>
