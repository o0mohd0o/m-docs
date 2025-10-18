<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Core Concept:</strong> Indexing improves performance of read operations at the cost of data redundancy. Calculate complex values beforehand and store them for fast retrieval.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px; border: none;">
        <i class="fas fa-project-diagram"></i> Indexing Architecture
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Indexing))
    Core Concept
      Improve read performance
      Data redundancy
      Pre-calculation
    Problem
      Complex calculations
      Many products
      Sort/filter needs
    Solution
      Calculate beforehand
      Store in MySQL tables
      Fast retrieval
    Change Tracking
      _cl tables
      MySQL triggers
      Database level
    Index Modes
      Update on Save
        Immediate
        CPU intensive
      Update on Schedule
        Cron-based
        Delayed
    Available Indexes
      Product Price
      Category Products
      Catalog Search
      Stock
      Customer Grid
                    </div>
                </div>

                <h2>The Problem: Complex Calculations</h2>
                
                <div class="concept-card">
                    <h4><i class="fas fa-dollar-sign"></i> Example: Product Pricing</h4>
                    <p>Pricing logic in Magento 2 is complex and involves multiple price types and modifiers:</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><strong>Base Price</strong> - Regular product price</li>
                                <li><strong>Special Price</strong> - Temporary discount</li>
                                <li><strong>Tier Price</strong> - Quantity-based pricing</li>
                                <li><strong>Catalog Price Rule</strong> - Rule-based discounts</li>
                                <li><strong>Custom Option Price</strong> - Additional options cost</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="warning-box">
                                <strong>The Challenge:</strong>
                                <p class="mb-0">Calculating the final price on-the-fly for a single product is fine, but calculating it for <strong>thousands of products simultaneously</strong> (e.g., for sort/filter on category page) causes severe performance issues.</p>
                            </div>
                        </div>
                    </div>

                    <p class="mt-3">Product types add more complexity:</p>
                    <ul>
                        <li><strong>Simple Products</strong> - Straightforward pricing</li>
                        <li><strong>Configurable Products</strong> - Option-dependent pricing</li>
                        <li><strong>Bundle Products</strong> - Multiple products with dynamic pricing</li>
                        <li><strong>Grouped Products</strong> - Minimum price from associated products</li>
                    </ul>
                </div>

                <h2>The Solution: Pre-Calculation</h2>

                <div class="concept-card">
                    <h4><i class="fas fa-lightbulb"></i> Core Indexing Concept</h4>
                    
                    <div class="success-box">
                        <strong>Solution:</strong> Calculate the single value <code>final_price</code> beforehand and store it in a MySQL table, so when sorting/filtering is needed, use that pre-calculated value.
                    </div>

                    <div class="flow-diagram">
                        <h5>Without Indexing:</h5>
                        <p><code>Category Page Load → Calculate ALL product prices → Sort → Display</code></p>
                        <p class="text-danger"><strong>Result:</strong> ⚠️ SLOW (multi-stage calculations for every product)</p>
                        
                        <hr>
                        
                        <h5>With Indexing:</h5>
                        <p><code>Category Page Load → Read pre-calculated prices → Sort → Display</code></p>
                        <p class="text-success"><strong>Result:</strong> ✅ FAST (simple MySQL sort on indexed values)</p>
                    </div>

                    <div class="key-point">
                        <strong>Trade-Off:</strong> We sacrifice storage space (data redundancy) and accept that indexed data needs updating when raw data changes, but gain massive performance improvements for read operations.
                    </div>
                </div>

                <h2>How Indexing Works</h2>

                <div class="concept-card">
                    <h4><i class="fas fa-cogs"></i> The Indexing Process</h4>
                    
                    <ol>
                        <li><strong>Data Change Occurs</strong> - Product price updated, catalog rule created, inventory changed</li>
                        <li><strong>Change Logged</strong> - MySQL trigger records change in a <code>*_cl</code> (change log) table</li>
                        <li><strong>Indexing Triggered</strong> - Either immediately (Update on Save) or via cron (Update on Schedule)</li>
                        <li><strong>Calculation Performed</strong> - Series of MySQL queries transform raw data</li>
                        <li><strong>Index Updated</strong> - Final calculated values stored in index tables</li>
                        <li><strong>Fast Retrieval</strong> - Category pages, search, etc. use pre-calculated values</li>
                    </ol>

                    <div class="info-box">
                        <strong>Important:</strong> <code>final_price</code> is redundant data - it's calculated from other sources. Whenever the original data changes, <code>final_price</code> must be updated. This is the indexing process.
                    </div>
                </div>

                <h2>Change Logs (_cl Tables)</h2>

                <div class="concept-card">
                    <h4><i class="fas fa-list"></i> Tracking Changes</h4>
                    
                    <p>Magento tracks changes using special MySQL tables with the <code>_cl</code> suffix (change log).</p>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Change Log Table</th>
                                    <th>Tracks Changes For</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>catalog_product_price_cl</code></td>
                                    <td>Product price changes</td>
                                </tr>
                                <tr>
                                    <td><code>catalogsearch_fulltext_cl</code></td>
                                    <td>Full-text search data</td>
                                </tr>
                                <tr>
                                    <td><code>catalog_category_product_cl</code></td>
                                    <td>Category-product associations</td>
                                </tr>
                                <tr>
                                    <td><code>cataloginventory_stock_cl</code></td>
                                    <td>Stock/inventory changes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="success-box">
                        <strong>How It Works:</strong>
                        <ul class="mb-0">
                            <li><strong>MySQL Triggers</strong> - Automatically record changes at the database level</li>
                            <li><strong>Entity IDs Logged</strong> - Only entity IDs are stored, not full data</li>
                            <li><strong>Processed by Cron</strong> - Cron job reads change logs and runs indexing</li>
                            <li><strong>Cleared After Processing</strong> - Change logs cleared after successful indexing</li>
                        </ul>
                    </div>
                </div>

                <h2>Index Modes</h2>

                <div class="concept-card">
                    <h4><i class="fas fa-toggle-on"></i> Two Operating Modes</h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box">
                                <h5>Update on Save (Realtime)</h5>
                                <p><strong>Behavior:</strong> Index updates immediately when data changes</p>
                                <p><strong>Pros:</strong></p>
                                <ul>
                                    <li>Always up-to-date</li>
                                    <li>No delay</li>
                                    <li>No cron needed</li>
                                </ul>
                                <p><strong>Cons:</strong></p>
                                <ul class="mb-0">
                                    <li>CPU intensive</li>
                                    <li>Slows down save operations</li>
                                    <li>Can freeze large sites</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="success-box">
                                <h5>Update on Schedule</h5>
                                <p><strong>Behavior:</strong> Index updates via cron job</p>
                                <p><strong>Pros:</strong></p>
                                <ul>
                                    <li>Doesn't slow saves</li>
                                    <li>Better for large catalogs</li>
                                    <li>Batched processing</li>
                                </ul>
                                <p><strong>Cons:</strong></p>
                                <ul class="mb-0">
                                    <li>Requires working cron</li>
                                    <li>Data may be stale</li>
                                    <li>Delay before updates visible</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="warning-box">
                        <strong>⚠️ Performance Warning:</strong>
                        <p class="mb-0">"Update on Save" can bring local development machines to a standstill with large catalogs. Use "Update on Schedule" but <strong>ensure cron is running</strong>!</p>
                    </div>

                    <p><strong>Set mode via CLI:</strong></p>
                    <pre><code>bin/magento indexer:set-mode realtime
bin/magento indexer:set-mode schedule
bin/magento indexer:set-mode schedule catalog_product_price</code></pre>
                </div>

                <h2>Available Indexes</h2>

                <div class="concept-card">
                    <h4><i class="fas fa-list-ul"></i> Standard Magento Indexes</h4>
                    
                    <p>View all available indexes:</p>
                    <pre><code>bin/magento indexer:info</code></pre>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Index Code</th>
                                    <th>Name</th>
                                    <th>Purpose</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>catalog_product_price</code></td>
                                    <td>Product Price</td>
                                    <td>Pre-calculates final product prices</td>
                                </tr>
                                <tr>
                                    <td><code>catalog_category_product</code></td>
                                    <td>Category Products</td>
                                    <td>Product-to-category associations</td>
                                </tr>
                                <tr>
                                    <td><code>catalog_product_category</code></td>
                                    <td>Product Categories</td>
                                    <td>Category-to-product associations</td>
                                </tr>
                                <tr>
                                    <td><code>catalogsearch_fulltext</code></td>
                                    <td>Catalog Search</td>
                                    <td>Full-text search data</td>
                                </tr>
                                <tr>
                                    <td><code>catalogrule_rule</code></td>
                                    <td>Catalog Rule Product</td>
                                    <td>Catalog price rules</td>
                                </tr>
                                <tr>
                                    <td><code>catalogrule_product</code></td>
                                    <td>Catalog Product Rule</td>
                                    <td>Rule-to-product associations</td>
                                </tr>
                                <tr>
                                    <td><code>catalog_product_attribute</code></td>
                                    <td>Product EAV</td>
                                    <td>EAV attribute data</td>
                                </tr>
                                <tr>
                                    <td><code>cataloginventory_stock</code></td>
                                    <td>Stock</td>
                                    <td>Inventory/stock status</td>
                                </tr>
                                <tr>
                                    <td><code>customer_grid</code></td>
                                    <td>Customer Grid</td>
                                    <td>Customer admin grid data</td>
                                </tr>
                                <tr>
                                    <td><code>design_config_grid</code></td>
                                    <td>Design Config Grid</td>
                                    <td>Design configuration data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="key-point">
                        <strong>Note:</strong> Don't confuse Magento indexes with MySQL native indexes! These are separate concepts. Magento indexes are MySQL tables that store calculated data.
                    </div>
                </div>

                <h2>Creating Custom Indexes</h2>

                <div class="concept-card">
                    <p>Magento has a complex indexing engine that developers <em>can</em> use to create custom indexes, but it's rarely needed.</p>
                    
                    <div class="info-box">
                        <strong>When to Consider Custom Indexes:</strong>
                        <ul class="mb-0">
                            <li>Complex calculations needed for large datasets</li>
                            <li>Frequent sort/filter operations on custom attributes</li>
                            <li>Performance bottlenecks in custom modules</li>
                        </ul>
                    </div>

                    <div class="warning-box">
                        <strong>Caution:</strong> Creating custom indexes is complex and beyond the scope of the exam. Most use cases are handled by existing indexes.
                    </div>
                </div>

                <h2>Managing Indexes</h2>

                <div class="concept-card">
                    <h4><i class="fas fa-terminal"></i> Common Index Commands</h4>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Command</th>
                                    <th>Purpose</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>indexer:info</code></td>
                                    <td>List all available indexers</td>
                                </tr>
                                <tr>
                                    <td><code>indexer:status</code></td>
                                    <td>Show status of all indexers</td>
                                </tr>
                                <tr>
                                    <td><code>indexer:reindex</code></td>
                                    <td>Reindex all or specific indexers</td>
                                </tr>
                                <tr>
                                    <td><code>indexer:set-mode</code></td>
                                    <td>Set realtime or schedule mode</td>
                                </tr>
                                <tr>
                                    <td><code>indexer:show-mode</code></td>
                                    <td>Display current mode</td>
                                </tr>
                                <tr>
                                    <td><code>indexer:reset</code></td>
                                    <td>Reset indexer status to invalid</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h2>Best Practices</h2>

                <div class="concept-card">
                    <div class="success-box">
                        <h5><i class="fas fa-check-circle"></i> Development</h5>
                        <ul class="mb-0">
                            <li>Use "Update on Schedule" mode</li>
                            <li>Ensure cron is running (<code>* * * * * cd /path/to/magento && php bin/magento cron:run</code>)</li>
                            <li>Manually reindex after bulk changes</li>
                            <li>Monitor change log table sizes</li>
                        </ul>
                    </div>

                    <div class="success-box">
                        <h5><i class="fas fa-server"></i> Production</h5>
                        <ul class="mb-0">
                            <li>Always use "Update on Schedule" mode</li>
                            <li>Set up dedicated cron jobs for indexing</li>
                            <li>Monitor indexer status regularly</li>
                            <li>Schedule full reindex during low-traffic periods</li>
                        </ul>
                    </div>

                    <div class="warning-box">
                        <h5><i class="fas fa-exclamation-triangle"></i> Common Issues</h5>
                        <ul class="mb-0">
                            <li><strong>Cron not running</strong> - Indexes never update in Schedule mode</li>
                            <li><strong>Change logs too large</strong> - Can slow down indexing process</li>
                            <li><strong>Locked indexers</strong> - Previous indexing job didn't complete</li>
                            <li><strong>Invalid state</strong> - Requires manual reindex</li>
                        </ul>
                    </div>
                </div>

                <h2>Exam Tips</h2>
                <div class="alert alert-warning">
                    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
                    <ul class="mb-0">
                        <li><strong>Core concept:</strong> Indexing improves read performance at the cost of data redundancy</li>
                        <li>Indexes store pre-calculated values (like <code>final_price</code>) for fast retrieval</li>
                        <li>Change logs (<code>*_cl</code> tables) track changes using MySQL triggers</li>
                        <li>Two modes: Update on Save (realtime) and Update on Schedule (cron-based)</li>
                        <li>Update on Save can freeze large sites - use Update on Schedule in production</li>
                        <li>Magento indexes are NOT the same as MySQL native indexes</li>
                        <li>Common indexes: product_price, category_product, catalogsearch_fulltext, stock</li>
                        <li>Indexing happens at database level via MySQL triggers and queries</li>
                        <li>Cron is required for "Update on Schedule" mode to work</li>
                        <li>Use <code>indexer:info</code> to see all available indexes</li>
                        <li>Creating custom indexes is possible but rarely needed</li>
                        <li>Price indexing is the classic example due to complex calculation logic</li>
                    </ul>
                </div>
