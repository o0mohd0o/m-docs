<!-- Part A: Translation Mechanisms -->
<h2 id="part-a"><i class="fas fa-language"></i> Part A: Translation Mechanisms</h2>

<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Section Overview:</strong> Understanding inline translations, dictionaries, and the translation framework.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h3 style="text-align: center; margin-bottom: 20px; border: none;">
        <i class="fas fa-project-diagram"></i> Translation System Overview
    </h3>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Translation))
    Mechanisms
      Inline Translation
      Dictionary CSV
    Sources
      PHTML files
      Email templates
      XML files
      JavaScript
    Process
      Crawl phrases
      Generate CSV
      Human translates
      Upload CSV
      Auto substitute
    Hints
      Function
      Attribute
    </div>
</div>

<h3>Two Translation Mechanisms</h3>

<div class="concept-card">
    <h4><i class="fas fa-language"></i> Magento Translation Systems</h4>
    
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <h5>1. Inline Translation</h5>
                <p><strong>Characteristics:</strong></p>
                <ul>
                    <li>Limited fancy tool</li>
                    <li>Translate phrases directly on website</li>
                    <li>Frontend editing</li>
                    <li>Quick for small changes</li>
                </ul>
                <p><strong>Use Case:</strong> Quick fixes, testing translations, store owner edits</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="success-box">
                <h5>2. Dictionary Translation</h5>
                <p><strong>Characteristics:</strong></p>
                <ul>
                    <li>Comprehensive framework</li>
                    <li>Translate everything</li>
                    <li>CSV file based</li>
                    <li>Systematic approach</li>
                </ul>
                <p><strong>Use Case:</strong> Full translation, professional work, multi-language sites</p>
            </div>
        </div>
    </div>
</div>

<h3>What Can Be Translated?</h3>

<div class="concept-card">
    <h4><i class="fas fa-check-double"></i> Dictionary Translation Supports</h4>
    
    <ul>
        <li><i class="fas fa-file-code text-primary"></i> <strong>PHTML Templates</strong> - Using <code>__()</code> function</li>
        <li><i class="fas fa-envelope text-primary"></i> <strong>Email Templates</strong> - Using <code>{{trans}}</code> directive</li>
        <li><i class="fas fa-code text-primary"></i> <strong>PHP Files</strong> - Hardcoded phrases using <code>__()</code></li>
        <li><i class="fas fa-file-code text-primary"></i> <strong>JavaScript Files</strong> - Using translation functions</li>
        <li><i class="fas fa-file-alt text-primary"></i> <strong>XML Files</strong> - Layout, configuration using <code>translate</code> attribute</li>
        <li><i class="fas fa-desktop text-primary"></i> <strong>UI Components</strong> - Admin grids, forms, etc.</li>
    </ul>
</div>

<h3>How Dictionary Translation Works</h3>

<div class="concept-card">
    <h4><i class="fas fa-cogs"></i> The Translation Process</h4>
    
    <div class="success-box">
        <h5>Step-by-Step Workflow:</h5>
        <ol>
            <li><strong>Crawl</strong> - Special script scans code for translatable strings</li>
            <li><strong>Generate CSV</strong> - Script creates CSV file with all phrases</li>
            <li><strong>Translate</strong> - Human translator fills in translations in CSV</li>
            <li><strong>Upload</strong> - Translated CSV uploaded back to system</li>
            <li><strong>Substitution</strong> - Magento automatically replaces original with translated phrases</li>
        </ol>
    </div>

    <div class="key-point">
        <strong>Important:</strong> The CSV file only contains phrases to translate. A human translator must create the translated pairs and write them in the CSV file.
    </div>
</div>

<h3>Translation Hints</h3>

<div class="concept-card">
    <h4><i class="fas fa-lightbulb"></i> How the Crawler Finds Strings</h4>
    
    <p>The crawler needs hints to find translatable strings. Two principal hints:</p>

    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <h5>1. The <code>__()</code> Function</h5>
                <p>Wrap strings in PHP/PHTML files:</p>
                <pre><code>&lt;?= __('Hello World') ?&gt;
&lt;?= __('Welcome, %1', $name) ?&gt;</code></pre>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <h5>2. The <code>translate</code> Attribute</h5>
                <p>Mark strings in XML files:</p>
                <pre><code>&lt;label translate="true"&gt;
    Product Name
&lt;/label&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<h3>PHTML File Translation</h3>

<div class="concept-card">
    <h4><i class="fas fa-file-code"></i> Using <code>__()</code> in Templates</h4>
    
    <p><strong>Basic Usage:</strong></p>
    <pre><code>&lt;h1&gt;&lt;?= __('Shopping Cart') ?&gt;&lt;/h1&gt;
&lt;p&gt;&lt;?= __('You have items in your cart') ?&gt;&lt;/p&gt;</code></pre>

    <p><strong>With Placeholders:</strong></p>
    <pre><code>&lt;?= __('Welcome, %1\!', $customerName) ?&gt;
&lt;?= __('You have %1 items in your cart', $itemCount) ?&gt;
&lt;?= __('Total: %1 %2', $currency, $total) ?&gt;</code></pre>

    <div class="success-box">
        <strong>Placeholder Benefits:</strong>
        <ul class="mb-0">
            <li>Translates holistic phrases instead of fragments</li>
            <li>Provides context to translators</li>
            <li>Allows different word orders in different languages</li>
            <li>%1, %2, %3, etc. are replaced with actual values</li>
        </ul>
    </div>

    <p><strong>Example with Multiple Placeholders:</strong></p>
    <pre><code>&lt;?= __(
    'Order #%1 was placed on %2 and is currently %3',
    $orderId,
    $orderDate,
    $orderStatus
) ?&gt;</code></pre>
</div>

<h3>Email Template Translation</h3>

<div class="concept-card">
    <h4><i class="fas fa-envelope"></i> Using <code>{{trans}}</code> in Emails</h4>
    
    <p>Email templates use a different syntax than PHTML files:</p>

    <p><strong>Basic Usage:</strong></p>
    <pre><code>{{trans "Shopping Cart"}}
{{trans "Thank you for your order"}}</code></pre>

    <p><strong>With Variables:</strong></p>
    <pre><code>{{trans "%items are shipping today." items=shipment.getItemCount()}}
{{trans "Hello %name" name=customer.name}}
{{trans "Order Total: %amount" amount=order.total}}</code></pre>

    <div class="info-box">
        <strong>Syntax Notes:</strong>
        <ul class="mb-0">
            <li>Use <code>{{trans "..."}}</code> instead of <code>__()</code></li>
            <li>Pass variables using <code>key=value</code> syntax</li>
            <li>Use <code>%variable_name</code> as placeholder in string</li>
        </ul>
    </div>
</div>

<h3>XML File Translation</h3>

<div class="concept-card">
    <h4><i class="fas fa-file-alt"></i> Using <code>translate</code> Attribute</h4>
    
    <h5>Layout XML (<code>layout.xml</code>)</h5>
    <pre><code>&lt;block class="Magento\Framework\View\Element\Text"&gt;
    &lt;arguments&gt;
        &lt;argument name="text" xsi:type="string" translate="true"&gt;
            Product Info Column
        &lt;/argument&gt;
    &lt;/arguments&gt;
&lt;/block&gt;</code></pre>

    <h5>System Configuration (<code>etc/adminhtml/system.xml</code>)</h5>
    <pre><code>&lt;section id="catalog" translate="label"&gt;
    &lt;label&gt;Catalog&lt;/label&gt;
    &lt;tab&gt;catalog&lt;/tab&gt;
    &lt;resource&gt;Magento_Catalog::config_catalog&lt;/resource&gt;
    &lt;group id="fields" translate="label"&gt;
        &lt;label&gt;Storefront&lt;/label&gt;
    &lt;/group&gt;
&lt;/section&gt;</code></pre>

    <h5>DI Configuration (<code>etc/di.xml</code>)</h5>
    <pre><code>&lt;type name="Magento\Catalog\Block\Product\View"&gt;
    &lt;arguments&gt;
        &lt;argument name="data" xsi:type="array"&gt;
            &lt;item name="label" xsi:type="string" translate="true"&gt;
                Block after Info Column
            &lt;/item&gt;
        &lt;/argument&gt;
    &lt;/arguments&gt;
&lt;/type&gt;</code></pre>

    <div class="key-point">
        <strong>Key Pattern:</strong> Add <code>translate="true"</code> or <code>translate="label"</code> attribute to mark content as translatable. The crawler will find and extract these strings.
    </div>
</div>

<h3>JavaScript Translation</h3>

<div class="concept-card">
    <h4><i class="fas fa-js-square"></i> Translating JavaScript Strings</h4>
    
    <p>JavaScript files also support translation using jQuery's <code>$.mage.__()</code> function:</p>

    <pre><code>define([
    'jquery',
    'mage/translate'
], function ($) {
    'use strict';
    
    return function() {
        var message = $.mage.__('Hello World');
        var welcome = $.mage.__('Welcome, %1', customerName);
        
        alert(message);
    };
});</code></pre>

    <div class="info-box">
        <strong>Requirements:</strong>
        <ul class="mb-0">
            <li>Import <code>mage/translate</code> module</li>
            <li>Use <code>$.mage.__()</code> function</li>
            <li>Supports placeholders like PHP version</li>
        </ul>
    </div>
</div>

<h3>Best Practices</h3>

<div class="concept-card">
    <div class="success-box">
        <h5><i class="fas fa-check-circle"></i> Do's</h5>
        <ul class="mb-0">
            <li>Always use placeholders for dynamic content</li>
            <li>Translate complete sentences, not fragments</li>
            <li>Provide context in comments for translators</li>
            <li>Use <code>__()</code> even if not translating yet</li>
            <li>Mark all user-visible strings as translatable</li>
        </ul>
    </div>

    <div class="warning-box">
        <h5><i class="fas fa-exclamation-triangle"></i> Don'ts</h5>
        <ul class="mb-0">
            <li>Don't concatenate translated strings</li>
            <li>Don't translate system identifiers or codes</li>
            <li>Don't hardcode strings without translation functions</li>
            <li>Don't forget to add <code>translate</code> attribute in XML</li>
        </ul>
    </div>
</div>
