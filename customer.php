<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magento 2 Database - Customer</title>
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
    <button class="mobile-menu-toggle d-md-none" id="mobileMenuToggle">
        <span></span>
        <span></span>
        <span></span>
    </button>
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
                    <h1 class="h2">Customer Database Structure</h1>
                </div>
                <div class="overview">
                    <p>The Customer module manages all customer-related data in Magento 2, including customer accounts, addresses, and customer groups. Like the Catalog module, it uses the EAV (Entity-Attribute-Value) pattern for flexible attribute management.</p>
                    <h3>Key Relationships</h3>
                    <img src="images/customer-relationships.svg" alt="Customer Tables Relationships" style="max-width: 800px;" class="img-fluid mt-3 mb-4">
                    <p class="text-muted"><em>Note: This is a simplified diagram showing the main relationships.</em></p>
                    <h2>Core Customer Tables</h2>
                    <div class="table-container">
                        <h3>customer_entity</h3>
                        <p class="table-description">The main customer entity table. Each row represents a registered customer account.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>entity_id</strong></td><td>int</td><td>Primary key</td></tr>
                                    <tr><td><strong>website_id</strong></td><td>smallint</td><td>Website ID where customer registered</td></tr>
                                    <tr><td><strong>email</strong></td><td>varchar</td><td>Customer email address</td></tr>
                                    <tr><td><strong>group_id</strong></td><td>smallint</td><td>Customer group ID</td></tr>
                                    <tr><td><strong>store_id</strong></td><td>smallint</td><td>Store view ID where customer registered</td></tr>
                                    <tr><td><strong>created_at</strong></td><td>timestamp</td><td>When the customer account was created</td></tr>
                                    <tr><td><strong>updated_at</strong></td><td>timestamp</td><td>When the customer account was last updated</td></tr>
                                    <tr><td><strong>is_active</strong></td><td>smallint</td><td>Whether the customer account is active</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-container">
                        <h3>customer_entity_* (EAV Value Tables)</h3>
                        <p class="table-description">These tables store the actual attribute values for customers. There are separate tables for different data types.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Table</th><th>Data Type</th><th>Example Attributes</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>customer_entity_varchar</strong></td><td>String values</td><td>firstname, lastname, middlename</td></tr>
                                    <tr><td><strong>customer_entity_int</strong></td><td>Integer values</td><td>gender, is_subscribed</td></tr>
                                    <tr><td><strong>customer_entity_decimal</strong></td><td>Decimal values</td><td>reward_points, store_credit</td></tr>
                                    <tr><td><strong>customer_entity_text</strong></td><td>Long text values</td><td>custom notes, preferences</td></tr>
                                    <tr><td><strong>customer_entity_datetime</strong></td><td>Date/time values</td><td>dob (date of birth)</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h2>Customer Address Tables</h2>
                    <div class="table-container">
                        <h3>customer_address_entity</h3>
                        <p class="table-description">Stores customer addresses. Each customer can have multiple addresses.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>entity_id</strong></td><td>int</td><td>Primary key</td></tr>
                                    <tr><td><strong>parent_id</strong></td><td>int</td><td>Foreign key to customer_entity.entity_id</td></tr>
                                    <tr><td><strong>created_at</strong></td><td>timestamp</td><td>When the address was created</td></tr>
                                    <tr><td><strong>updated_at</strong></td><td>timestamp</td><td>When the address was last updated</td></tr>
                                    <tr><td><strong>is_active</strong></td><td>smallint</td><td>Whether the address is active</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-container">
                        <h3>customer_address_entity_* (EAV Value Tables)</h3>
                        <p class="table-description">Similar to customer attributes, address attributes are also stored in EAV tables.</p>
                        <ul>
                            <li><code>customer_address_entity_varchar</code> - For street, city, firstname, lastname, etc.</li>
                            <li><code>customer_address_entity_int</code> - For is_default_billing, is_default_shipping, etc.</li>
                            <li><code>customer_address_entity_text</code> - For long text values</li>
                        </ul>
                    </div>
                    <h2>Customer Group Tables</h2>
                    <div class="table-container">
                        <h3>customer_group</h3>
                        <p class="table-description">Defines customer groups, which can be used for pricing, discounts, and permissions.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>customer_group_id</strong></td><td>int</td><td>Primary key</td></tr>
                                    <tr><td><strong>customer_group_code</strong></td><td>varchar</td><td>Group name</td></tr>
                                    <tr><td><strong>tax_class_id</strong></td><td>int</td><td>Tax class associated with this group</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h2>Customer Authentication Tables</h2>
                    <div class="table-container">
                        <h3>customer_password_reset_link</h3>
                        <p class="table-description">Stores password reset tokens for customers.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>customer_id</strong></td><td>int</td><td>Foreign key to customer_entity.entity_id</td></tr>
                                    <tr><td><strong>token</strong></td><td>varchar</td><td>Reset token</td></tr>
                                    <tr><td><strong>created_at</strong></td><td>timestamp</td><td>When the token was created</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-container">
                        <h3>customer_log</h3>
                        <p class="table-description">Logs customer login activity.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>customer_id</strong></td><td>int</td><td>Foreign key to customer_entity.entity_id</td></tr>
                                    <tr><td><strong>last_login_at</strong></td><td>timestamp</td><td>Last successful login time</td></tr>
                                    <tr><td><strong>last_logout_at</strong></td><td>timestamp</td><td>Last logout time</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h2>Customer Segment Tables</h2>
                    <div class="table-container">
                        <h3>customer_segment</h3>
                        <p class="table-description">Defines customer segments for targeted marketing (Enterprise Edition only).</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>segment_id</strong></td><td>int</td><td>Primary key</td></tr>
                                    <tr><td><strong>name</strong></td><td>varchar</td><td>Segment name</td></tr>
                                    <tr><td><strong>description</strong></td><td>text</td><td>Segment description</td></tr>
                                    <tr><td><strong>is_active</strong></td><td>smallint</td><td>Whether the segment is active</td></tr>
                                    <tr><td><strong>created_at</strong></td><td>timestamp</td><td>When the segment was created</td></tr>
                                    <tr><td><strong>updated_at</strong></td><td>timestamp</td><td>When the segment was last updated</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-container">
                        <h3>customer_segment_customer</h3>
                        <p class="table-description">Maps customers to segments (many-to-many relationship).</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr><th>Column</th><th>Type</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>segment_id</strong></td><td>int</td><td>Foreign key to customer_segment.segment_id</td></tr>
                                    <tr><td><strong>customer_id</strong></td><td>int</td><td>Foreign key to customer_entity.entity_id</td></tr>
                                    <tr><td><strong>added_date</strong></td><td>timestamp</td><td>When the customer was added to the segment</td></tr>
                                    <tr><td><strong>updated_date</strong></td><td>timestamp</td><td>When the customer's segment membership was updated</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="alert alert-info mt-4">
                        <h4>Data Analysis Tips</h4>
                        <ul>
                            <li>For basic customer information, use EAV joins on value tables.</li>
                            <li>For customer address analysis, join <code>customer_address_entity</code> with its EAV tables.</li>
                            <li>For customer activity, use <code>customer_log</code> and <code>sales_order</code> tables.</li>
                            <li>To find attribute IDs, query <code>eav_attribute</code> for the customer entity type.</li>
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
