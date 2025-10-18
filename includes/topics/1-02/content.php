<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Modules are self-contained units of functionality where customizations are typically located. Each module performs a specific set of updates or adds new functionality.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px; border: none;">
        <i class="fas fa-project-diagram"></i> Module Structure Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Module Structure))
    Location
      app/code/Vendor/Module
      vendor/ via Composer
    Identity
      Module Name
        Vendor_Module
      PSR-4 Path
        Vendor\\Module
    Required Files
      registration.php
        Register module
        Required
      composer.json
        Dependencies
        Autoload PSR-4
        type magento2-module
      etc/module.xml
        Module name
        Dependencies sequence
    Installation
      bin/magento module:enable
      bin/magento setup:upgrade
      --keep-generated flag
    </div>
</div>

<h2>Module Location and Naming</h2>
<p>A Magento 2 module is generally found in the <code>app/code/VendorName/ModuleName</code> directory.</p>

<div class="module-card">
    <h4><i class="fas fa-folder-tree"></i> Directory Structure</h4>
    <ul>
        <li><strong>Custom modules:</strong> <code>app/code/VendorName/ModuleName</code></li>
        <li><strong>Third-party modules:</strong> <code>vendor/</code> (installed via Composer)</li>
    </ul>
    <div class="key-point">
        <strong>Best Practice:</strong> Third-party modules should be installed via Composer into the <code>vendor/</code> directory, not <code>app/code</code>.
    </div>
</div>

<h3>Module Identity</h3>
<p>A module's identity involves two parts:</p>

<div class="row">
    <div class="col-md-6">
        <div class="module-card">
            <h5>1️⃣ Module Name</h5>
            <p>The name Magento uses to recognize and identify the module.</p>
            <div class="file-path">Bonlineco_Blog</div>
            <p class="mb-0"><small>Format: <code>VendorName_ModuleName</code></small></p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="module-card">
            <h5>2️⃣ PSR-4 Path</h5>
            <p>The namespace path used in code, used by Composer to autoload files.</p>
            <div class="file-path">Bonlineco\Blog</div>
            <p class="mb-0"><small>Format: <code>VendorName\ModuleName</code></small></p>
        </div>
    </div>
</div>

<h2>When to Create a New Module</h2>
<p>You should create a new module in these scenarios:</p>

<div class="success-box">
    <h5><i class="fas fa-check-circle"></i> Create a New Module When:</h5>
    <ul class="mb-0">
        <li><strong>Adding new features</strong> with significant code (estimated >250 lines)</li>
        <li><strong>Customizing functionality</strong> in a different existing Magento module</li>
        <li><strong>Creating a supporting framework</strong> for a new child theme (e.g., <code>MerchantName/Theme</code>)
            <ul>
                <li>Contains ViewModels, LESS, and Layout XML</li>
            </ul>
        </li>
        <li><strong>Grouping general customizations</strong> by area of functionality (e.g., <code>MerchantName/Catalog</code>)</li>
        <li><strong>Modifying a third-party module</strong> (e.g., <code>MerchantName/VendorModuleName</code>)</li>
    </ul>
</div>

<h2>Required Module Files</h2>
<p>A custom module requires several mandatory files in its directory:</p>

<h3>1. registration.php</h3>
<div class="module-card">
    <div class="file-path"><i class="fas fa-file-code"></i> registration.php</div>
    <div class="warning-box">
        <strong>⚠️ Mandatory</strong> - This file is essential for registering the module.
    </div>
    <p><strong>Purpose:</strong></p>
    <ul>
        <li>Used by <strong>Composer</strong> to determine which files to autoload based on namespace path</li>
        <li>Used by <strong>Magento</strong> to understand which modules are available in the system</li>
    </ul>
    <p><strong>Example:</strong></p>
    <pre><code>&lt;?php
use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Bonlineco_Blog',
    __DIR__
);</code></pre>
</div>

<h3>2. composer.json</h3>
<div class="module-card">
    <div class="file-path"><i class="fas fa-file-code"></i> composer.json</div>
    <div class="key-point">
        <strong>Recommended:</strong> Although a module may temporarily work without this file, it is always recommended.
    </div>
    <p><strong>Purpose:</strong></p>
    <ul>
        <li>Primarily used by Composer to define requirements and paths</li>
        <li>Must specify <code>type</code> as <code>"magento2-module"</code></li>
        <li>The <code>autoload</code> section specifies PSR-4 path mapping</li>
    </ul>
    <p><strong>Example:</strong></p>
    <pre><code>{
    "name": "bonlineco/module-blog",
    "description": "Blog module for Bonlineco store",
    "type": "magento2-module",
    "version": "1.0.0",
    "require": {
        "php": "~8.1.0||~8.2.0",
        "magento/framework": "*"
    },
    "autoload": {
        "psr-4": {
            "Bonlineco\\\\Blog\\\\": ""
        },
        "files": [
            "registration.php"
        ]
    }
}</code></pre>
    <div class="info-box">
        <strong>Key Points:</strong>
        <ul class="mb-0">
            <li><code>"type": "magento2-module"</code> identifies this as a Magento module</li>
            <li>PSR-4 mapping: <code>"Bonlineco\\\\Blog\\\\": ""</code> maps to current directory</li>
            <li>Files array includes <code>registration.php</code> for autoloading</li>
        </ul>
    </div>
</div>

<h3>3. etc/module.xml</h3>
<div class="module-card">
    <div class="file-path"><i class="fas fa-file-code"></i> etc/module.xml</div>
    <div class="warning-box">
        <strong>⚠️ Mandatory</strong> - Specifies the module's name and manages dependencies.
    </div>
    <p><strong>Purpose:</strong></p>
    <ul>
        <li>Must specify the module's name, matching the name in <code>registration.php</code></li>
        <li>The <code>&lt;sequence&gt;</code> element defines modules this module depends on</li>
        <li>If a module is in the sequence, Magento won't allow it to be disabled if this module is enabled</li>
    </ul>
    <p><strong>Example:</strong></p>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd"&gt;
    &lt;module name="Bonlineco_Blog" setup_version="1.0.0"&gt;
        &lt;sequence&gt;
            &lt;module name="Magento_Cms"/&gt;
            &lt;module name="Magento_Customer"/&gt;
        &lt;/sequence&gt;
    &lt;/module&gt;
&lt;/config&gt;</code></pre>
    <div class="info-box">
        <strong>Dependency Management:</strong>
        <ul class="mb-0">
            <li>If <code>Magento_Cms</code> is listed in sequence, it cannot be disabled while <code>Bonlineco_Blog</code> is enabled</li>
            <li>This ensures all required modules are active</li>
            <li>The sequence also controls the order in which modules load</li>
        </ul>
    </div>
</div>

<h2>Steps to Add a New Module</h2>
<p>After creating the directory and populating the mandatory files, perform these command-line actions:</p>

<div class="success-box">
    <h4><i class="fas fa-terminal"></i> Installation Steps</h4>
    <p><strong>Step 1: Enable the Module</strong></p>
    <pre><code>bin/magento module:enable Bonlineco_Blog</code></pre>
    <p><strong>Step 2: Install/Synchronize</strong></p>
    <pre><code>bin/magento setup:upgrade</code></pre>
    <p><strong>What setup:upgrade does:</strong></p>
    <ul>
        <li>Synchronizes the database schema</li>
        <li>Runs any necessary setup scripts</li>
        <li>Installs the module into the database (visible in <code>setup_module</code> table)</li>
    </ul>
    <div class="key-point">
        <strong>Optional Flag:</strong> <code>--keep-generated</code>
        <pre><code>bin/magento setup:upgrade --keep-generated</code></pre>
        <p><strong>Purpose:</strong></p>
        <ul class="mb-0">
            <li>Prevents deletion of the <code>generated/</code> directory</li>
            <li>Speeds up the development process</li>
            <li>⚠️ Do NOT use if your module modifies:
                <ul>
                    <li>Extension attributes</li>
                    <li>Plugins</li>
                </ul>
            </li>
            <li>If unsure, manually delete <code>generated/</code> directory to ensure changes take effect</li>
        </ul>
    </div>
</div>

<h2>Module Directory Structure Example</h2>
<div class="module-card">
    <h4><i class="fas fa-folder-tree"></i> Complete Module Structure</h4>
    <pre><code>app/code/Bonlineco/Blog/
├── registration.php         (Required)
├── composer.json           (Recommended)
├── etc/
│   ├── module.xml         (Required)
│   ├── di.xml
│   └── acl.xml
├── Block/
├── Controller/
├── Model/
├── Setup/
├── view/
│   ├── frontend/
│   └── adminhtml/
└── i18n/</code></pre>
</div>

<h2>Quick Reference</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>File</th>
                <th>Required?</th>
                <th>Purpose</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>registration.php</code></td>
                <td><span class="badge bg-danger">Required</span></td>
                <td>Registers module with Magento and Composer</td>
            </tr>
            <tr>
                <td><code>composer.json</code></td>
                <td><span class="badge bg-warning text-dark">Recommended</span></td>
                <td>Defines dependencies and PSR-4 autoloading</td>
            </tr>
            <tr>
                <td><code>etc/module.xml</code></td>
                <td><span class="badge bg-danger">Required</span></td>
                <td>Module name and dependency sequence</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li>Know the difference between <strong>Module Name</strong> (Vendor_Module) and <strong>PSR-4 Path</strong> (Vendor\Module)</li>
        <li>Understand the 3 required files and their purposes</li>
        <li>Remember that <code>&lt;sequence&gt;</code> in module.xml controls dependencies and load order</li>
        <li>Know when to use <code>--keep-generated</code> flag (and when NOT to use it)</li>
        <li>Understand the criteria for creating a new module (>250 lines, customizing other modules, etc.)</li>
        <li>Remember that <code>composer.json</code> must have <code>"type": "magento2-module"</code></li>
        <li>Know the two-step process: <code>module:enable</code> then <code>setup:upgrade</code></li>
    </ul>
</div>
