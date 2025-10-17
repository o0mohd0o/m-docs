<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magento 2 Database - Sales & Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            padding-top: 20px;
            padding-bottom: 40px;
        }
        
        /* Mobile-first responsive sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: -250px;
            width: 250px;
            z-index: 1000;
            padding: 20px 0;
            overflow-x: hidden;
            overflow-y: auto;
            background-color: #f8f9fa;
            transition: left 0.3s ease;
            border-right: 1px solid #dee2e6;
        }
        
        .sidebar.show {
            left: 0;
        }
        
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }
        
        .sidebar-overlay.show {
            display: block;
        }
        
        .main-content {
            margin-left: 0;
            padding: 20px 15px;
        }
        
        /* Mobile hamburger menu */
        .mobile-menu-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .mobile-menu-toggle:hover {
            background: #0b5ed7;
        }
        
        .mobile-menu-toggle span {
            display: block;
            width: 20px;
            height: 2px;
            background: white;
            margin: 3px 0;
            transition: 0.3s;
        }
        
        /* Close button in sidebar */
        .sidebar-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            color: #6c757d;
            cursor: pointer;
            display: none;
        }
        
        .nav-link {
            color: #333;
        }
        
        .nav-link.active {
            font-weight: bold;
            color: #0d6efd;
        }
        
        .table-container {
            margin-bottom: 30px;
        }
        
        h2 {
            margin-top: 30px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        
        h3 {
            margin-top: 25px;
            color: #0d6efd;
        }
        
        .table-description {
            margin-bottom: 15px;
        }
        
        /* Responsive breakpoints */
        @media (min-width: 768px) {
            .sidebar {
                left: 0;
                position: fixed;
            }
            
            .main-content {
                margin-left: 250px;
                padding: 20px;
            }
            
            .mobile-menu-toggle {
                display: none;
            }
            
            .sidebar-overlay {
                display: none !important;
            }
        }
        
        @media (max-width: 767px) {
            .sidebar-close {
                display: block;
            }
            
            .main-content {
                padding-top: 70px;
            }
            
            h1.h2 {
                font-size: 1.5rem;
            }
            
            .table-responsive {
                font-size: 0.875rem;
            }
            
            .alert {
                font-size: 0.9rem;
            }
            
            pre {
                font-size: 0.75rem;
                overflow-x: auto;
            }
        }
        
        @media (max-width: 480px) {
            .main-content {
                padding: 70px 10px 20px;
            }
            
            h1.h2 {
                font-size: 1.25rem;
            }
            
            .table-responsive {
                font-size: 0.8rem;
            }
            
            pre {
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile menu toggle -->
    <button class="mobile-menu-toggle d-md-none" id="mobileMenuToggle">
        <span></span>
        <span></span>
        <span></span>
    </button>
    
    <!-- Sidebar overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Navigation (Loaded Dynamically) -->
            <div id="nav-placeholder"></div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <!-- Search Box -->
                <div class="mb-3">
                    <div class="input-group" style="max-width: 500px;">
                        <span class="input-group-text bg-white">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" id="tableSearch" class="form-control" placeholder="Search tables, columns, descriptions..." autocomplete="off">
                    </div>
                </div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Sales & Orders Database Structure</h1>
                </div>

                <div class="overview">
                    <p>
                        The Sales module is one of the most important modules in Magento 2, handling all aspects of orders, 
                        invoices, shipments, and payments. This module contains tables with the <code>sales_*</code> prefix.
                    </p>
                    
                    <h3>Key Relationships</h3>
                    <img src="images/sales-relationships.svg" alt="Sales Tables Relationships" style="max-width: 800px;" class="img-fluid mt-3 mb-4">
                    <p class="text-muted"><em>Note: This is a simplified diagram showing the main relationships.</em></p>

                    <h2>Core Sales Tables</h2>

                    <div class="table-container">
                        <h3>sales_order</h3>
                        <p class="table-description">
                            The main table for orders. Each row represents a single order in the system.
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>Column</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>entity_id</strong></td>
                                        <td>int</td>
                                        <td>Primary key</td>
                                    </tr>
                                    <tr>
                                        <td><strong>increment_id</strong></td>
                                        <td>varchar</td>
                                        <td>Human-readable order number (e.g., 100000001)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>state</strong></td>
                                        <td>varchar</td>
                                        <td>Current order state (new, processing, complete, etc.)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>status</strong></td>
                                        <td>varchar</td>
                                        <td>Current order status (can be customized)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>customer_id</strong></td>
                                        <td>int</td>
                                        <td>Foreign key to customer_entity.entity_id</td>
                                    </tr>
                                    <tr>
                                        <td><strong>grand_total</strong></td>
                                        <td>decimal</td>
                                        <td>Total order amount including tax and shipping</td>
                                    </tr>
                                    <tr>
                                        <td><strong>subtotal</strong></td>
                                        <td>decimal</td>
                                        <td>Order subtotal without tax and shipping</td>
                                    </tr>
                                    <tr>
                                        <td><strong>created_at</strong></td>
                                        <td>timestamp</td>
                                        <td>When the order was created</td>
                                    </tr>
                                    <tr>
                                        <td><strong>updated_at</strong></td>
                                        <td>timestamp</td>
                                        <td>When the order was last updated</td>
                                    </tr>
                                    <tr>
                                        <td><strong>store_id</strong></td>
                                        <td>smallint</td>
                                        <td>Store view ID where order was placed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="table-container">
                        <h3>sales_order_item</h3>
                        <p class="table-description">
                            Contains individual items within an order. One order can have multiple items.
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>Column</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>item_id</strong></td>
                                        <td>int</td>
                                        <td>Primary key</td>
                                    </tr>
                                    <tr>
                                        <td><strong>order_id</strong></td>
                                        <td>int</td>
                                        <td>Foreign key to sales_order.entity_id</td>
                                    </tr>
                                    <tr>
                                        <td><strong>product_id</strong></td>
                                        <td>int</td>
                                        <td>Foreign key to catalog_product_entity.entity_id</td>
                                    </tr>
                                    <tr>
                                        <td><strong>sku</strong></td>
                                        <td>varchar</td>
                                        <td>Product SKU</td>
                                    </tr>
                                    <tr>
                                        <td><strong>name</strong></td>
                                        <td>varchar</td>
                                        <td>Product name</td>
                                    </tr>
                                    <tr>
                                        <td><strong>qty_ordered</strong></td>
                                        <td>decimal</td>
                                        <td>Quantity ordered</td>
                                    </tr>
                                    <tr>
                                        <td><strong>price</strong></td>
                                        <td>decimal</td>
                                        <td>Item price</td>
                                    </tr>
                                    <tr>
                                        <td><strong>row_total</strong></td>
                                        <td>decimal</td>
                                        <td>Total for this item (price × quantity)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="table-container">
                        <h3>sales_order_address</h3>
                        <p class="table-description">
                            Stores billing and shipping addresses for orders.
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>Column</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>entity_id</strong></td>
                                        <td>int</td>
                                        <td>Primary key</td>
                                    </tr>
                                    <tr>
                                        <td><strong>parent_id</strong></td>
                                        <td>int</td>
                                        <td>Foreign key to sales_order.entity_id</td>
                                    </tr>
                                    <tr>
                                        <td><strong>address_type</strong></td>
                                        <td>varchar</td>
                                        <td>'billing' or 'shipping'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>firstname</strong></td>
                                        <td>varchar</td>
                                        <td>First name</td>
                                    </tr>
                                    <tr>
                                        <td><strong>lastname</strong></td>
                                        <td>varchar</td>
                                        <td>Last name</td>
                                    </tr>
                                    <tr>
                                        <td><strong>street</strong></td>
                                        <td>varchar</td>
                                        <td>Street address</td>
                                    </tr>
                                    <tr>
                                        <td><strong>city</strong></td>
                                        <td>varchar</td>
                                        <td>City</td>
                                    </tr>
                                    <tr>
                                        <td><strong>region</strong></td>
                                        <td>varchar</td>
                                        <td>State/Province</td>
                                    </tr>
                                    <tr>
                                        <td><strong>postcode</strong></td>
                                        <td>varchar</td>
                                        <td>Postal code</td>
                                    </tr>
                                    <tr>
                                        <td><strong>country_id</strong></td>
                                        <td>varchar</td>
                                        <td>Country code</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2>Payment & Transaction Tables</h2>

                    <div class="table-container">
                        <h3>sales_order_payment</h3>
                        <p class="table-description">
                            Stores payment information for orders.
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>Column</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>entity_id</strong></td>
                                        <td>int</td>
                                        <td>Primary key</td>
                                    </tr>
                                    <tr>
                                        <td><strong>parent_id</strong></td>
                                        <td>int</td>
                                        <td>Foreign key to sales_order.entity_id</td>
                                    </tr>
                                    <tr>
                                        <td><strong>method</strong></td>
                                        <td>varchar</td>
                                        <td>Payment method code</td>
                                    </tr>
                                    <tr>
                                        <td><strong>amount_ordered</strong></td>
                                        <td>decimal</td>
                                        <td>Original order amount</td>
                                    </tr>
                                    <tr>
                                        <td><strong>amount_paid</strong></td>
                                        <td>decimal</td>
                                        <td>Amount paid</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2>Invoice Tables</h2>

                    <div class="table-container">
                        <h3>sales_invoice</h3>
                        <p class="table-description">
                            Stores invoice information. Each invoice is linked to an order.
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>Column</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>entity_id</strong></td>
                                        <td>int</td>
                                        <td>Primary key</td>
                                    </tr>
                                    <tr>
                                        <td><strong>order_id</strong></td>
                                        <td>int</td>
                                        <td>Foreign key to sales_order.entity_id</td>
                                    </tr>
                                    <tr>
                                        <td><strong>increment_id</strong></td>
                                        <td>varchar</td>
                                        <td>Human-readable invoice number</td>
                                    </tr>
                                    <tr>
                                        <td><strong>created_at</strong></td>
                                        <td>timestamp</td>
                                        <td>When the invoice was created</td>
                                    </tr>
                                    <tr>
                                        <td><strong>grand_total</strong></td>
                                        <td>decimal</td>
                                        <td>Total invoice amount</td>
                                    </tr>
                                    <tr>
                                        <td><strong>state</strong></td>
                                        <td>int</td>
                                        <td>Invoice state (1=open, 2=paid, 3=canceled)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2>Shipment Tables</h2>

                    <div class="table-container">
                        <h3>sales_shipment</h3>
                        <p class="table-description">
                            Stores shipment information. Each shipment is linked to an order.
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>Column</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>entity_id</strong></td>
                                        <td>int</td>
                                        <td>Primary key</td>
                                    </tr>
                                    <tr>
                                        <td><strong>order_id</strong></td>
                                        <td>int</td>
                                        <td>Foreign key to sales_order.entity_id</td>
                                    </tr>
                                    <tr>
                                        <td><strong>increment_id</strong></td>
                                        <td>varchar</td>
                                        <td>Human-readable shipment number</td>
                                    </tr>
                                    <tr>
                                        <td><strong>created_at</strong></td>
                                        <td>timestamp</td>
                                        <td>When the shipment was created</td>
                                    </tr>
                                    <tr>
                                        <td><strong>total_qty</strong></td>
                                        <td>decimal</td>
                                        <td>Total quantity shipped</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2>Credit Memo Tables</h2>

                    <div class="table-container">
                        <h3>sales_creditmemo</h3>
                        <p class="table-description">
                            Stores credit memo (refund) information. Each credit memo is linked to an order.
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>Column</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>entity_id</strong></td>
                                        <td>int</td>
                                        <td>Primary key</td>
                                    </tr>
                                    <tr>
                                        <td><strong>order_id</strong></td>
                                        <td>int</td>
                                        <td>Foreign key to sales_order.entity_id</td>
                                    </tr>
                                    <tr>
                                        <td><strong>increment_id</strong></td>
                                        <td>varchar</td>
                                        <td>Human-readable credit memo number</td>
                                    </tr>
                                    <tr>
                                        <td><strong>created_at</strong></td>
                                        <td>timestamp</td>
                                        <td>When the credit memo was created</td>
                                    </tr>
                                    <tr>
                                        <td><strong>grand_total</strong></td>
                                        <td>decimal</td>
                                        <td>Total refund amount</td>
                                    </tr>
                                    <tr>
                                        <td><strong>state</strong></td>
                                        <td>int</td>
                                        <td>Credit memo state</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="alert alert-info mt-4">
                        <h4>Data Analysis Tips</h4>
                        <p>
                            When analyzing sales data:
                        </p>
                        <ul>
                            <li>Join <code>sales_order</code> with <code>sales_order_item</code> to get product-level order data</li>
                            <li>Use <code>created_at</code> timestamps for time-based analysis</li>
                            <li>The <code>state</code> and <code>status</code> fields in <code>sales_order</code> are crucial for order flow analysis</li>
                            <li>For revenue analysis, use <code>grand_total</code> from <code>sales_order</code> table</li>
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
        // Table search functionality
        document.getElementById('tableSearch').addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase().trim();
            const containers = document.querySelectorAll('.table-container, h2, h3, p, .overview');
            
            if (query.length === 0) {
                // Show all content
                containers.forEach(el => el.style.display = '');
                return;
            }
            
            // Filter content
            containers.forEach(container => {
                const text = container.textContent.toLowerCase();
                if (text.includes(query)) {
                    container.style.display = '';
                    // Highlight parent container
                    if (container.classList.contains('table-container')) {
                        container.style.backgroundColor = '#fff3cd';
                        setTimeout(() => {
                            container.style.backgroundColor = '';
                        }, 2000);
                    }
                } else {
                    // Only hide table-containers and headings, not all paragraphs
                    if (container.classList.contains('table-container') || 
                        container.tagName === 'H2' || 
                        container.tagName === 'H3') {
                        container.style.display = 'none';
                    }
                }
            });
        });
    </script>
</body>
</html>
