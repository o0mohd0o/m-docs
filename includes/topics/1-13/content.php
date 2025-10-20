<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding scope is essential for multi-store Magento implementations. It controls how attributes, prices, and configuration values differ across websites, store groups, and store views.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> Scope Hierarchy Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Scope System))
    Hierarchy
      Website
      Store Group
      Store View
    Terminology
      Developer: Store Group/Store
      Merchant: Store/Store View
    Scope Levels
      Global scope=1
      Website scope=2
      Store scope=0
    What Uses Scope
      EAV Attributes
      System Configuration
      Prices
      Translations
    Storage
      catalog_eav_attribute
      catalog_product_entity_*
      core_config_data
    </div>
</div>

<h2>What is Scope in Magento?</h2>

<div class="directory-card">
    <p>The <strong>scope concept</strong> in Magento 2 is the ability for attributes and configuration values to have <strong>different values in different circumstances</strong>.</p>
    
    <div class="key-point">
        <strong>Primary Use Cases:</strong>
        <ul class="mb-0 mt-2">
            <li><strong>Prices</strong> - Different prices or currencies for different locations</li>
            <li><strong>Translations</strong> - Different language values (e.g., "red" vs "rouge")</li>
            <li><strong>Configuration</strong> - Different settings per website/store</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-dollar-sign"></i> Price Example</h4>
            <p>A product available in multiple locations:</p>
            <ul>
                <li>US Website: $100 USD</li>
                <li>EU Website: €90 EUR</li>
                <li>UK Website: £85 GBP</li>
            </ul>
            <p class="mb-0"><strong>Same product, different values per scope.</strong></p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-language"></i> Translation Example</h4>
            <p>A color attribute for a product:</p>
            <ul>
                <li>English Store: "Red"</li>
                <li>French Store: "Rouge"</li>
                <li>Spanish Store: "Rojo"</li>
            </ul>
            <p class="mb-0"><strong>Same attribute, different values per store.</strong></p>
        </div>
    </div>
</div>

<h2>The Scope Hierarchy</h2>

<div class="alert alert-warning">
    <h4><i class="fas fa-exclamation-triangle"></i> Terminology Alert!</h4>
    <p>Magento has <strong>confusing terminology</strong> depending on the audience:</p>
    
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="success-box">
                <strong>Developers/Code:</strong>
                <ul class="mb-0">
                    <li>Website</li>
                    <li><strong>Store Group</strong></li>
                    <li><strong>Store</strong></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="key-point">
                <strong>Merchants/Admin UI:</strong>
                <ul class="mb-0">
                    <li>Website</li>
                    <li><strong>Store</strong></li>
                    <li><strong>Store View</strong></li>
                </ul>
            </div>
        </div>
    </div>
    
    <p class="mt-3 mb-0"><strong>This documentation uses developer terminology</strong> (Website → Store Group → Store), but understand that merchants see it as Website → Store → Store View.</p>
</div>

<h3><i class="fas fa-sitemap"></i> Hierarchical Structure</h3>

<div class="directory-card">
    <p>The three scope elements are <strong>hierarchical</strong>:</p>
    
    <pre><code>Website
  └── Store Group(s)
      └── Store(s) / Store View(s)</code></pre>
    
    <div class="key-point">
        <strong>Relationships:</strong>
        <ul class="mb-0">
            <li>Each <strong>Store</strong> belongs to exactly one <strong>Store Group</strong></li>
            <li>Each <strong>Store Group</strong> belongs to exactly one <strong>Website</strong></li>
            <li>A <strong>Website</strong> may have many Store Groups (one-to-many)</li>
            <li>A <strong>Store Group</strong> may have many Stores (one-to-many)</li>
        </ul>
    </div>
</div>

<h2>The Three Scope Levels</h2>

<h3>1. <i class="fas fa-globe"></i> Website</h3>

<div class="directory-card">
    <p>The <strong>highest level</strong> in the scope hierarchy.</p>
    
    <div class="key-point">
        <strong>Primary Purposes:</strong>
        <ul class="mb-0">
            <li>Separate customer accounts and orders</li>
            <li>Different catalogs or pricing structures</li>
            <li>Different payment/shipping methods</li>
            <li>Attributes with <code>is_global = 2</code> can have different values</li>
        </ul>
    </div>
    
    <div class="success-box mt-3">
        <strong>Example Use Case:</strong> Separate B2B and B2C websites with different customer groups and pricing.
    </div>
</div>

<h3>2. <i class="fas fa-store"></i> Store Group (aka "Store" in Admin)</h3>

<div class="directory-card">
    <p>The <strong>middle level</strong> - acts as a container for Stores.</p>
    
    <div class="warning-box">
        <strong>⚠️ Important:</strong> Store Groups <strong>do NOT participate directly in scoping functionality</strong>!
    </div>
    
    <div class="key-point">
        <strong>Primary Purposes:</strong>
        <ul class="mb-0">
            <li>Define a unique <strong>root category</strong></li>
            <li>Act as a container for multiple stores</li>
            <li>Share the same catalog structure</li>
        </ul>
    </div>
    
    <div class="success-box mt-3">
        <strong>Example Use Case:</strong> Different root categories for "Men's Store" vs "Women's Store" under the same website.
    </div>
</div>

<h3>3. <i class="fas fa-eye"></i> Store / Store View</h3>

<div class="directory-card">
    <p>The <strong>lowest level</strong> in the hierarchy - what customers actually see.</p>
    
    <div class="key-point">
        <strong>Primary Purposes:</strong>
        <ul class="mb-0">
            <li>Different <strong>languages/localizations</strong></li>
            <li>Different <strong>currencies</strong></li>
            <li>Attributes with <code>is_global = 0</code> can have different values</li>
            <li>Different designs/themes</li>
        </ul>
    </div>
    
    <div class="success-box mt-3">
        <strong>Example Use Case:</strong> English store view, French store view, and Spanish store view all under the same website and store group.
    </div>
</div>

<h2>EAV Attribute Scope</h2>

<div class="directory-card">
    <p>Each EAV attribute has a <strong>scope property</strong> that determines at which level it can have different values.</p>
    
    <div class="directory-path">catalog_eav_attribute table → is_global field</div>
    
    <div class="warning-box">
        <strong>⚠️ Important:</strong> <code>is_global</code> is NOT a boolean flag! It accepts three distinct values.
    </div>
</div>

<h3><i class="fas fa-table"></i> is_global Values</h3>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>is_global Value</th>
                <th>Scope Level</th>
                <th>Meaning</th>
                <th>Example Use Case</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>0</code></td>
                <td><strong>Store View</strong></td>
                <td>Attribute can have different values per store view</td>
                <td>Product name, description (translations)</td>
            </tr>
            <tr>
                <td><code>1</code></td>
                <td><strong>Global</strong></td>
                <td>Single value across all scopes (no separated values)</td>
                <td>SKU, product type, creation date</td>
            </tr>
            <tr>
                <td><code>2</code></td>
                <td><strong>Website</strong></td>
                <td>Attribute can have different values per website</td>
                <td>Price, special price, tax class</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="directory-card" style="border-left-color: #198754;">
            <h4><code>is_global = 0</code></h4>
            <div class="success-box">
                <strong>Store Scope</strong>
                <p class="mb-0">Different value for each <strong>Store View</strong>. Perfect for translations.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="directory-card" style="border-left-color: #0d6efd;">
            <h4><code>is_global = 1</code></h4>
            <div class="key-point">
                <strong>Global Scope</strong>
                <p class="mb-0">Same value everywhere. Cannot be overridden.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="directory-card" style="border-left-color: #ffc107;">
            <h4><code>is_global = 2</code></h4>
            <div class="warning-box">
                <strong>Website Scope</strong>
                <p class="mb-0">Different value per <strong>Website</strong>. Used for prices.</p>
            </div>
        </div>
    </div>
</div>

<h2>Where Scope Data is Stored</h2>

<h3><i class="fas fa-database"></i> EAV Attribute Values</h3>

<div class="directory-card">
    <p>Attribute values are stored in corresponding EAV tables based on data type:</p>
    
    <div class="key-point">
        <strong>Common EAV Tables:</strong>
        <ul class="mb-0 mt-2">
            <li><code>catalog_product_entity_int</code> - Integer values</li>
            <li><code>catalog_product_entity_varchar</code> - String values</li>
            <li><code>catalog_product_entity_decimal</code> - Decimal values (prices)</li>
            <li><code>catalog_product_entity_text</code> - Long text values</li>
            <li><code>catalog_product_entity_datetime</code> - Date/time values</li>
        </ul>
    </div>
    
    <p class="mt-3">Each record includes a <code>store_id</code> column to identify which scope the value applies to.</p>
</div>

<h3><i class="fas fa-cog"></i> System Configuration Values</h3>

<div class="directory-card">
    <div class="directory-path">core_config_data table</div>
    
    <p>All system configuration values for all scopes are stored in the <code>core_config_data</code> table.</p>
    
    <div class="key-point">
        <strong>Key Columns:</strong>
        <ul class="mb-0">
            <li><code>scope</code> - 'default', 'websites', or 'stores'</li>
            <li><code>scope_id</code> - The ID of the website or store</li>
            <li><code>path</code> - Configuration path (e.g., 'general/locale/code')</li>
            <li><code>value</code> - The configuration value</li>
        </ul>
    </div>
</div>

<h2>Scope in Practice</h2>

<h3><i class="fas fa-code"></i> Example: Multi-Website Setup</h3>

<div class="directory-card">
    <pre><code>Website: US Site (ID: 1)
  └── Store Group: Main Store (ID: 1, Root Category: "Default")
      ├── Store View: English (ID: 1, Code: en_us)
      └── Store View: Spanish (ID: 2, Code: es_us)

Website: EU Site (ID: 2)
  └── Store Group: European Store (ID: 2, Root Category: "EU Catalog")
      ├── Store View: English UK (ID: 3, Code: en_gb)
      ├── Store View: French (ID: 4, Code: fr_fr)
      └── Store View: German (ID: 5, Code: de_de)</code></pre>
    
    <div class="success-box mt-3">
        <strong>Scope Behavior:</strong>
        <ul class="mb-0">
            <li><strong>Price</strong> (is_global=2): Different for US Site vs EU Site</li>
            <li><strong>Product Name</strong> (is_global=0): Different for each Store View</li>
            <li><strong>SKU</strong> (is_global=1): Same everywhere</li>
        </ul>
    </div>
</div>

<h3><i class="fas fa-shopping-cart"></i> Real-World Example</h3>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4>Product: T-Shirt (SKU: TSH-001)</h4>
            
            <strong>Global Attributes:</strong>
            <ul>
                <li>SKU: TSH-001 (same everywhere)</li>
                <li>Type: Simple Product</li>
            </ul>
            
            <strong>Website Scope (Price):</strong>
            <ul>
                <li>US Website: $29.99</li>
                <li>EU Website: €24.99</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card">
            <h4>Store View Scope (Translations)</h4>
            
            <strong>Name:</strong>
            <ul>
                <li>English: "Red Cotton T-Shirt"</li>
                <li>French: "T-Shirt en Coton Rouge"</li>
                <li>Spanish: "Camiseta de Algodón Roja"</li>
            </ul>
            
            <strong>Description:</strong>
            <ul class="mb-0">
                <li>English: "Comfortable cotton..."</li>
                <li>French: "Coton confortable..."</li>
                <li>Spanish: "Algodón cómodo..."</li>
            </ul>
        </div>
    </div>
</div>

<h2>Scope Priority and Fallback</h2>

<div class="directory-card">
    <p>Magento uses a <strong>fallback mechanism</strong> when retrieving scoped values:</p>
    
    <div class="key-point">
        <strong>Fallback Order (most specific to least specific):</strong>
        <ol class="mb-0">
            <li><strong>Store View</strong> - Check if value exists for current store view</li>
            <li><strong>Website</strong> - If not, check if value exists for current website</li>
            <li><strong>Global/Default</strong> - If not, use the global default value</li>
        </ol>
    </div>
    
    <div class="success-box mt-3">
        <strong>Example:</strong> If a product name is not set for the French store view, Magento will fall back to the website level, and if not set there, to the global default value.
    </div>
</div>

<h2>Important Distinctions</h2>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-check-circle"></i> What Scopes Control</h4>
            <ul class="mb-0">
                <li>✅ EAV attribute values</li>
                <li>✅ System configuration settings</li>
                <li>✅ Prices and special prices</li>
                <li>✅ Product names and descriptions</li>
                <li>✅ URL rewrites</li>
                <li>✅ CMS content</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-times-circle"></i> What Scopes Don't Control</h4>
            <ul class="mb-0">
                <li>❌ Static phrase translations (uses i18n)</li>
                <li>❌ Product inventory (separate concept)</li>
                <li>❌ Customer accounts (shared per website)</li>
                <li>❌ Orders (belong to website/store)</li>
            </ul>
        </div>
    </div>
</div>

<div class="alert alert-info mt-3">
    <h4><i class="fas fa-info-circle"></i> Localization Note</h4>
    <p class="mb-0">Static phrase translations (like "Add to Cart", "Checkout", etc.) work differently and are handled through the i18n system, not the scope system. See topic 1.08 for more details on localization.</p>
</div>

<h2>Quick Reference Table</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Concept</th>
                <th>Developer Term</th>
                <th>Merchant Term</th>
                <th>Key Purpose</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Top Level</td>
                <td>Website</td>
                <td>Website</td>
                <td>Separate catalogs, customers, orders</td>
            </tr>
            <tr>
                <td>Middle Level</td>
                <td><strong>Store Group</strong></td>
                <td><strong>Store</strong></td>
                <td>Root category container (no direct scoping)</td>
            </tr>
            <tr>
                <td>Bottom Level</td>
                <td><strong>Store</strong></td>
                <td><strong>Store View</strong></td>
                <td>Language, currency, localization</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="table-responsive mt-3">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>is_global Value</th>
                <th>Scope Name</th>
                <th>Can Override Per...</th>
                <th>Common Examples</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>0</code></td>
                <td>Store View</td>
                <td>Each store view</td>
                <td>Name, description, color</td>
            </tr>
            <tr>
                <td><code>1</code></td>
                <td>Global</td>
                <td>Cannot override</td>
                <td>SKU, product type, status</td>
            </tr>
            <tr>
                <td><code>2</code></td>
                <td>Website</td>
                <td>Each website</td>
                <td>Price, special price, tax class</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li>Understand the <strong>terminology difference</strong>: Store Group (code) vs Store (UI)</li>
        <li><strong>Hierarchy</strong>: Website → Store Group → Store (one-to-many relationships)</li>
        <li><strong>Store Groups do NOT participate directly in scoping</strong> - only define root categories</li>
        <li><strong>is_global values</strong>: 0 = Store, 1 = Global, 2 = Website</li>
        <li>EAV values stored in <code>catalog_product_entity_*</code> tables</li>
        <li>Config values stored in <code>core_config_data</code> table</li>
        <li><strong>Scope defines where attributes can have different values</strong></li>
        <li>Prices are typically <strong>website scope</strong> (is_global = 2)</li>
        <li>Translations are typically <strong>store scope</strong> (is_global = 0)</li>
        <li>Static phrase translations use the <strong>i18n system</strong>, not scopes</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/start/setup/websites-stores-views.html" target="_blank">Websites, Stores, and Views</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-operations/configuration-guide/multi-sites/ms-overview.html" target="_blank">Multiple Websites or Stores</a></li>
    </ul>
</div>
