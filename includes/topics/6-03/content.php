<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Catalog price rules enable global sales and discounts across product sets with customer group targeting. Understanding indexing, the catalogrule_product_price table, and debugging strategies is essential for troubleshooting pricing issues.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Catalog Price Rules Overview</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Catalog Price Rules))
    Setup
      Marketing > Catalog Price Rule
      Filter products
      Select customer groups
      Apply discounts
    vs Special Pricing
      Global sales vs one-off
      Customer group targeting
      Rule-based vs manual
    Indexing
      Catalog Product Rule indexer
      catalogrule_product_price table
      Not in price indexer
    Performance
      Slight impact
      Indexed data
    Debugging
      Data into index?
      Data out of index applied?
      IndexBuilder
    </div>
</div>

<h2>What Are Catalog Price Rules?</h2>

<div class="directory-card">
    <p><strong>Catalog price rules</strong> allow you to apply discounts to sets of products (or all products) based on conditions, with optional customer group targeting.</p>
    <p><strong>Location:</strong> Marketing → Catalog Price Rule (admin panel)</p>
    <h3>Key Features</h3>
    <ul>
        <li>Filter products by attributes, categories, SKU, etc.</li>
        <li>Target specific customer groups (e.g., Wholesale, Retail)</li>
        <li>Apply percentage or fixed amount discounts</li>
        <li>Set date ranges for active periods</li>
        <li>Priority and stop further rules processing</li>
    </ul>
    <div class="success-box"><strong>Use Case:</strong> Apply a 20% discount on all "Electronics" category products for "Wholesale" customer group from Black Friday to Cyber Monday.</div>
</div>

<h2>Catalog Price Rules vs Special Pricing</h2>

<div class="directory-card">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Feature</th>
                <th>Catalog Price Rules</th>
                <th>Special Pricing</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Scope</strong></td>
                <td>Global sales across product sets</td>
                <td>One-off products or small groups</td>
            </tr>
            <tr>
                <td><strong>Setup</strong></td>
                <td>Rule-based, conditions-driven</td>
                <td>Manual per-product</td>
            </tr>
            <tr>
                <td><strong>Customer Groups</strong></td>
                <td>Can target specific groups</td>
                <td>Applies to all customers</td>
            </tr>
            <tr>
                <td><strong>Maintenance</strong></td>
                <td>Centralized rule management</td>
                <td>Edit each product individually</td>
            </tr>
            <tr>
                <td><strong>Best For</strong></td>
                <td>Sales events, category discounts</td>
                <td>Individual product promotions</td>
            </tr>
        </tbody>
    </table>
    <div class="key-point"><strong>When to Use Catalog Price Rules:</strong> When you need to apply discounts to many products, target customer groups, or automate sales events.</div>
</div>

<h2>How Catalog Price Rules Are Indexed</h2>

<div class="directory-card">
    <p>Catalog price rules are <strong>indexed</strong> for performance. The indexed data is stored in the <code>catalogrule_product_price</code> table.</p>
    <div class="directory-path">catalogrule_product_price table</div>
    <h3>Key Points</h3>
    <ul>
        <li><strong>Not indexed by Price Indexer:</strong> Catalog rules have their own indexer.</li>
        <li><strong>Catalog Product Rule Indexer:</strong> Dedicated indexer for catalog rules.</li>
        <li><strong>Table Structure:</strong> Stores rule-based prices per product, customer group, website, and date.</li>
    </ul>
    <div class="directory-path">\Magento\CatalogRule\Model\Indexer\IndexBuilder</div>
    <p>The <code>IndexBuilder</code> class builds the catalog rule indexes.</p>
</div>

<h3>Indexer Behavior</h3>

<div class="directory-card">
    <p>When a catalog price rule is saved or products change:</p>
    <ol>
        <li>Indexer evaluates which products match rule conditions.</li>
        <li>Calculates discounted prices for matching products per customer group.</li>
        <li>Stores results in <code>catalogrule_product_price</code> table.</li>
        <li>Frontend reads from this table to display catalog rule prices.</li>
    </ol>
    <div class="warning-box"><strong>Note:</strong> If indexer is set to "Update on Schedule," changes may not appear immediately.</div>
</div>

<h2>Performance Impact</h2>

<div class="directory-card">
    <p>Catalog price rules have a <strong>slight performance impact</strong>.</p>
    <h3>Why?</h3>
    <ul>
        <li>Rules are pre-calculated and stored in <code>catalogrule_product_price</code>.</li>
        <li>Frontend queries this indexed table rather than evaluating rules on-the-fly.</li>
        <li>Indexing runs during reindex or on schedule (via cron).</li>
    </ul>
    <h3>Performance Considerations</h3>
    <ul>
        <li><strong>Indexing time:</strong> Large catalogs with many rules may take longer to index.</li>
        <li><strong>Indexer mode:</strong> "Update on Save" impacts admin performance; "Update on Schedule" defers to cron.</li>
        <li><strong>Frontend:</strong> Minimal impact—reads from indexed table.</li>
    </ul>
    <div class="success-box"><strong>Best Practice:</strong> Use "Update on Schedule" for large catalogs to avoid admin slowdowns.</div>
</div>

<h2>Debugging Catalog Price Rules</h2>

<div class="directory-card">
    <p>Debugging is easier with access to a production database copy (without sensitive customer data).</p>
    <h3>Two Places to Check</h3>
    <ol>
        <li><strong>Is the problem the data going INTO the indexed table?</strong>
            <ul>
                <li>Check rule conditions: Are products matching the rule?</li>
                <li>Verify customer groups are assigned correctly.</li>
                <li>Ensure rule is active and within date range.</li>
                <li>Run indexer manually: <code>bin/magento indexer:reindex catalogrule_rule</code></li>
            </ul>
        </li>
        <li><strong>Is the problem the data coming OUT of the indexed table?</strong>
            <ul>
                <li>Query <code>catalogrule_product_price</code> table for affected products.</li>
                <li>Verify discounted prices exist for the customer group.</li>
                <li>Check if frontend code reads from the indexed table correctly.</li>
                <li>Look for price retrieval logic in price models.</li>
            </ul>
        </li>
    </ol>
    <div class="directory-path">\Magento\CatalogRule\Model\Indexer\IndexBuilder</div>
    <p>Set breakpoints in <code>IndexBuilder</code> to trace rule evaluation and index generation.</p>
</div>

<h3>Debugging Steps</h3>

<div class="directory-card">
    <ol>
        <li><strong>Verify Rule Configuration:</strong>
            <ul>
                <li>Check rule is active (Status = Active).</li>
                <li>Verify date range includes current date.</li>
                <li>Ensure customer groups are selected.</li>
                <li>Review conditions and actions.</li>
            </ul>
        </li>
        <li><strong>Check Indexer Status:</strong>
            <pre><code>bin/magento indexer:status catalogrule_rule
bin/magento indexer:status catalogrule_product</code></pre>
        </li>
        <li><strong>Reindex Manually:</strong>
            <pre><code>bin/magento indexer:reindex catalogrule_rule catalogrule_product</code></pre>
        </li>
        <li><strong>Query Indexed Table:</strong>
            <pre><code>SELECT * FROM catalogrule_product_price 
WHERE product_id = [PRODUCT_ID] 
AND customer_group_id = [GROUP_ID];</code></pre>
        </li>
        <li><strong>Check Product Matches Rule:</strong>
            <ul>
                <li>Manually evaluate rule conditions against product attributes.</li>
                <li>Use admin Preview > Products Matched to see which products match.</li>
            </ul>
        </li>
        <li><strong>Review Logs:</strong>
            <ul>
                <li>Check <code>var/log/system.log</code> and <code>exception.log</code> for errors during indexing.</li>
            </ul>
        </li>
    </ol>
</div>

<h2>Catalog Product Rule Indexers</h2>

<div class="directory-card">
    <p>Two indexers handle catalog price rules:</p>
    <ol>
        <li><strong>catalogrule_rule:</strong> Indexes rule data itself.</li>
        <li><strong>catalogrule_product:</strong> Indexes product-rule associations and calculates prices.</li>
    </ol>
    <p>Both must be up-to-date for rules to apply correctly.</p>
</div>

<h2>Common Issues and Solutions</h2>

<div class="directory-card">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Issue</th>
                <th>Possible Cause</th>
                <th>Solution</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Rule not applying</td>
                <td>Indexer not updated</td>
                <td>Reindex catalogrule_rule and catalogrule_product</td>
            </tr>
            <tr>
                <td>Wrong price displayed</td>
                <td>Multiple rules with priorities</td>
                <td>Check rule priority and "Stop Further Rules Processing"</td>
            </tr>
            <tr>
                <td>Rule applies to wrong products</td>
                <td>Condition misconfiguration</td>
                <td>Review rule conditions; use Preview feature</td>
            </tr>
            <tr>
                <td>Rule not showing for customer</td>
                <td>Customer group mismatch</td>
                <td>Verify customer's group matches rule's target groups</td>
            </tr>
            <tr>
                <td>Slow indexing</td>
                <td>Large catalog or complex rules</td>
                <td>Optimize rules; use "Update on Schedule"</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/marketing/promotions/catalog-rules/price-rules-catalog.html" target="_blank">Catalog Price Rules</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/indexing/" target="_blank">Indexing</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-operations/configuration-guide/cli/manage-indexers.html" target="_blank">Manage Indexers</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Setup:</strong> Marketing → Catalog Price Rule; filter products, select customer groups, apply discounts.</li>
        <li><strong>vs Special Pricing:</strong> Rules = global/rule-based/customer groups; Special = manual/one-off/all customers.</li>
        <li><strong>Indexing:</strong> Stored in <code>catalogrule_product_price</code> table; NOT in price indexer; uses Catalog Product Rule indexer.</li>
        <li><strong>Performance:</strong> Slight impact; indexed data; use "Update on Schedule" for large catalogs.</li>
        <li><strong>Debugging:</strong> Check data INTO index (rule conditions, reindex) and data OUT of index (query table, frontend logic).</li>
        <li><strong>IndexBuilder:</strong> <code>\Magento\CatalogRule\Model\Indexer\IndexBuilder</code> builds indexes.</li>
        <li><strong>Indexers:</strong> <code>catalogrule_rule</code> and <code>catalogrule_product</code>.</li>
    </ul>
</div>
