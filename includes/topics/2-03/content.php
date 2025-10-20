<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> System configuration allows store administrators to customize module behavior without touching code. Understanding how to create configuration options is essential for building flexible, configurable Magento modules.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> System Configuration Structure
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((system.xml))
    Structure
      Tab
      Section
      Group
      Field
    File Location
      etc/adminhtml/system.xml
    Field Types
      text
      select
      multiselect
      obscure
      allowspecific
    Access Values
      ScopeConfigInterface
      getValue method
      Scope aware
    </div>
</div>

<h2>System Configuration Overview</h2>

<div class="directory-card">
    <p>System configuration options allow administrators to customize module behavior through the admin panel at <strong>Stores → Configuration</strong>.</p>
    
    <div class="key-point">
        <strong>File Location:</strong> System configuration options are configured in <code>etc/adminhtml/system.xml</code>
    </div>
</div>

<h3>Configuration File Location</h3>

<div class="directory-card">
    <div class="directory-path">etc/adminhtml/system.xml</div>
    
    <p>Example: <code>Magento/Catalog/etc/adminhtml/system.xml</code></p>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Important:</strong> Since these are XML files, you <strong>must clear the cache</strong> for Magento to recognize changes. Bear in mind that when you clear the cache, you will experience a longer-than-normal load time. This can be a problem in production.
    </div>
</div>

<h2>Configuration Structure Hierarchy</h2>

<div class="directory-card">
    <p>The system configuration follows a hierarchical structure:</p>
    
    <pre><code>&lt;config&gt;
    &lt;system&gt;
        &lt;tab&gt;           &lt;!-- Top-level tab (e.g., "Sales", "Catalog") --&gt;
        &lt;section&gt;       &lt;!-- Section within a tab (e.g., "Inventory") --&gt;
            &lt;group&gt;     &lt;!-- Group of related fields --&gt;
                &lt;field&gt; &lt;!-- Individual configuration field --&gt;
                &lt;/field&gt;
            &lt;/group&gt;
        &lt;/section&gt;
    &lt;/system&gt;
&lt;/config&gt;</code></pre>
</div>

<h2>Creating a Tab</h2>

<div class="directory-card">
    <p>Tabs appear at the top level of the configuration page (e.g., General, Catalog, Sales, etc.).</p>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Config:etc/system_file.xsd"&gt;
    &lt;system&gt;
        &lt;tab id="catalog" translate="label" sortOrder="200"&gt;
            &lt;label&gt;Catalog&lt;/label&gt;
        &lt;/tab&gt;
    &lt;/system&gt;
&lt;/config&gt;</code></pre>
    
    <div class="success-box mt-3">
        <strong>Best Practice:</strong> If you work for a module vendor or agency, put all configuration choices in a pertinent area in Store Configuration. Do NOT put it under a tab for your company. For example, if you create an Order Attribute module, put configuration under <strong>Sales → Order Attributes</strong> and NOT <strong>[MODULE VENDOR] → Order Attributes</strong>. It makes administration much easier.
    </div>
</div>

<h2>Creating a Section</h2>

<div class="directory-card">
    <p>The section tag lives inside the <code>system</code> tag (not a tab element). The section appears under the tab headings.</p>
    
    <pre><code>&lt;system&gt;
    &lt;section id="catalog" translate="label" type="text" sortOrder="40" 
             showInDefault="1" showInWebsite="1" showInStore="1"&gt;
        &lt;class&gt;separator-top&lt;/class&gt;
        &lt;label&gt;Catalog&lt;/label&gt;
        &lt;tab&gt;catalog&lt;/tab&gt;
        &lt;resource&gt;Magento_Catalog::config_catalog&lt;/resource&gt;
        
        &lt;!-- Groups go here --&gt;
    &lt;/section&gt;
&lt;/system&gt;</code></pre>
    
    <h4 class="mt-3"><i class="fas fa-list"></i> Section Attributes</h4>
    <ul>
        <li><strong>id</strong>: Unique identifier for the section</li>
        <li><strong>translate</strong>: Which attributes to translate (usually "label")</li>
        <li><strong>sortOrder</strong>: Display order within the tab</li>
        <li><strong>showInDefault</strong>: Show in global scope (1 = yes, 0 = no)</li>
        <li><strong>showInWebsite</strong>: Show in website scope</li>
        <li><strong>showInStore</strong>: Show in store view scope</li>
    </ul>
    
    <h4 class="mt-3"><i class="fas fa-list"></i> Section Elements</h4>
    <ul>
        <li><strong>&lt;class&gt;</strong>: CSS class (e.g., "separator-top" adds a separator)</li>
        <li><strong>&lt;label&gt;</strong>: Display name of the section</li>
        <li><strong>&lt;tab&gt;</strong>: Which tab this section belongs to</li>
        <li><strong>&lt;resource&gt;</strong>: ACL resource required to access this section</li>
    </ul>
</div>

<h2>Creating a Group</h2>

<div class="directory-card">
    <p>Groups reside inside the <code>section</code> tag and group related configuration fields together.</p>
    
    <pre><code>&lt;section id="catalog"&gt;
    &lt;group id="recently_products" translate="label" type="text" sortOrder="350" 
           showInDefault="1" showInWebsite="1" showInStore="1"&gt;
        &lt;label&gt;Recently Viewed/Compared Products&lt;/label&gt;
        
        &lt;!-- Fields go here --&gt;
    &lt;/group&gt;
&lt;/section&gt;</code></pre>
</div>

<h3>Nested Groups</h3>

<div class="directory-card">
    <p>You can also nest groups for more complex configurations. This is seen on the <strong>Stores → Configuration → Sales → Payment Methods → Authorize.net</strong> page.</p>
    
    <p><strong>Example:</strong> <code>Magento/AuthorizenetAcceptjs/etc/adminhtml/system.xml</code></p>
    
    <p>When nesting groups, use the <code>config_path</code> value for a field to configure where this value is stored:</p>
    
    <pre><code>&lt;field id="title"&gt;
    &lt;label&gt;Title&lt;/label&gt;
    &lt;config_path&gt;payment/authorizenet_acceptjs/title&lt;/config_path&gt;
&lt;/field&gt;</code></pre>
</div>

<h2>Creating a Field (Entry)</h2>

<div class="directory-card">
    <p>Fields are the individual configuration inputs. The <code>field</code> tag is found inside a <code>group</code> element.</p>
    
    <pre><code>&lt;group id="recently_products"&gt;
    &lt;field id="synchronize_with_backend" translate="label" type="select" 
           sortOrder="1" showInDefault="1" showInWebsite="1" showInStore="1"&gt;
        &lt;label&gt;Synchronize widget products with backend storage&lt;/label&gt;
        &lt;source_model&gt;Magento\Config\Model\Config\Source\Yesno&lt;/source_model&gt;
    &lt;/field&gt;
&lt;/group&gt;</code></pre>
    
    <div class="key-point mt-3">
        <strong>Scope Attributes:</strong> This example uses the <code>showInDefault</code> attribute, which means the field is visible in the global scope. You can also use <code>showInWebsite</code> or <code>showInStore</code> (store view scope).
    </div>
</div>

<h2>Field Types</h2>

<div class="directory-card">
    <p>The <code>type</code> attribute determines what type of input is used for a given option.</p>
</div>

<h3>Common Field Types</h3>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-keyboard"></i> text</h4>
            <p>Shows a single line text field. Ideally used for values that a store administrator would want to control.</p>
            <pre><code>&lt;field id="title" type="text"&gt;
    &lt;label&gt;Title&lt;/label&gt;
&lt;/field&gt;</code></pre>
            <div class="key-point mt-2">
                <strong>Use Case:</strong> Text that needs translation across scopes
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-list"></i> select</h4>
            <p>Shows a dropdown list. Values are specified in a <code>source_model</code> element.</p>
            <pre><code>&lt;field id="enabled" type="select"&gt;
    &lt;label&gt;Enabled&lt;/label&gt;
    &lt;source_model&gt;
        Magento\Config\Model\Config\Source\Yesno
    &lt;/source_model&gt;
&lt;/field&gt;</code></pre>
            <div class="key-point mt-2">
                <strong>Source Model:</strong> Must implement <code>\Magento\Framework\Option\ArrayInterface</code>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-list-check"></i> multiselect</h4>
            <p>Shows a multiple-select list allowing selection of multiple values (e.g., countries).</p>
            <pre><code>&lt;field id="countries" type="multiselect"&gt;
    &lt;label&gt;Allowed Countries&lt;/label&gt;
    &lt;source_model&gt;
        Magento\Directory\Model\Config\Source\Country
    &lt;/source_model&gt;
&lt;/field&gt;</code></pre>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-lock"></i> obscure</h4>
            <p>Presents a password input with encryption. Include a <code>backend_model</code> element.</p>
            <pre><code>&lt;field id="api_key" type="obscure"&gt;
    &lt;label&gt;API Key&lt;/label&gt;
    &lt;backend_model&gt;
        Magento\Config\Model\Config\Backend\Encrypted
    &lt;/backend_model&gt;
&lt;/field&gt;</code></pre>
            <div class="warning-box mt-2">
                <strong>Note:</strong> There is a <code>password</code> type, but the value is not encrypted. Use <code>obscure</code> for sensitive data.
            </div>
        </div>
    </div>
</div>

<div class="directory-card mt-3">
    <h4><i class="fas fa-globe"></i> allowspecific</h4>
    <p>Powers the "Ship to Applicable Countries" functionality. Controls whether a countries select field is enabled.</p>
    <pre><code>&lt;field id="sallowspecific" type="allowspecific"&gt;
    &lt;label&gt;Ship to Applicable Countries&lt;/label&gt;
    &lt;source_model&gt;Magento\Config\Block\System\Config\Form\Field\Select\Allowspecific&lt;/source_model&gt;
&lt;/field&gt;</code></pre>
</div>

<h2>Field Configuration Elements</h2>

<div class="directory-card">
    <p>While you may not use these every day, they will come in handy from time to time:</p>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Element/Attribute</th>
                <th>Type</th>
                <th>Purpose</th>
                <th>Example</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>config_path</strong></td>
                <td>Element</td>
                <td>Map a field to a different configuration path. Useful when moving settings without breaking references.</td>
                <td><code>&lt;config_path&gt;old/path/value&lt;/config_path&gt;</code></td>
            </tr>
            <tr>
                <td><strong>label</strong></td>
                <td>Element</td>
                <td>The display name of this field</td>
                <td><code>&lt;label&gt;Enable Module&lt;/label&gt;</code></td>
            </tr>
            <tr>
                <td><strong>sortOrder</strong></td>
                <td>Attribute</td>
                <td>Configures the order in which elements appear</td>
                <td><code>sortOrder="10"</code></td>
            </tr>
            <tr>
                <td><strong>depends</strong></td>
                <td>Element</td>
                <td>Makes the current field dependent on another field's value</td>
                <td><code>&lt;depends&gt;&lt;field id="enabled"&gt;1&lt;/field&gt;&lt;/depends&gt;</code></td>
            </tr>
            <tr>
                <td><strong>validate</strong></td>
                <td>Element</td>
                <td>Apply validation rules. Multiple classes can be space-separated.</td>
                <td><code>&lt;validate&gt;required-entry&lt;/validate&gt;</code></td>
            </tr>
            <tr>
                <td><strong>backend_model</strong></td>
                <td>Element</td>
                <td>Class that inherits <code>\Magento\Framework\App\Config\Value</code> for before/after save/delete functionality</td>
                <td><code>&lt;backend_model&gt;Vendor\Module\Model\Config\Backend\Custom&lt;/backend_model&gt;</code></td>
            </tr>
            <tr>
                <td><strong>frontend_model</strong></td>
                <td>Element</td>
                <td>Block that renders the element. Extend classes in <code>\Magento\Config\Block\System\Config\Form</code> namespace</td>
                <td><code>&lt;frontend_model&gt;Vendor\Module\Block\Config\Custom&lt;/frontend_model&gt;</code></td>
            </tr>
        </tbody>
    </table>
</div>

<h3>Examples of Field Configuration</h3>

<div class="directory-card">
    <h4>Required Field with Validation</h4>
    <pre><code>&lt;field id="email" type="text"&gt;
    &lt;label&gt;Email Address&lt;/label&gt;
    &lt;validate&gt;required-entry validate-email&lt;/validate&gt;
&lt;/field&gt;</code></pre>
</div>

<div class="directory-card">
    <h4>Field with Dependency</h4>
    <pre><code>&lt;field id="enabled" type="select"&gt;
    &lt;label&gt;Enable Feature&lt;/label&gt;
    &lt;source_model&gt;Magento\Config\Model\Config\Source\Yesno&lt;/source_model&gt;
&lt;/field&gt;

&lt;field id="api_key" type="text"&gt;
    &lt;label&gt;API Key&lt;/label&gt;
    &lt;depends&gt;
        &lt;field id="enabled"&gt;1&lt;/field&gt;
    &lt;/depends&gt;
&lt;/field&gt;</code></pre>
    <div class="key-point mt-2">
        <strong>Result:</strong> The API Key field only appears when "Enable Feature" is set to "Yes"
    </div>
</div>

<h2>Accessing Configuration Values</h2>

<div class="directory-card">
    <p>To access configuration values in your code, follow these steps:</p>
</div>

<h3>Step 1: Inject ScopeConfigInterface</h3>

<div class="directory-card">
    <pre><code>&lt;?php
namespace Vendor\Module\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ConfigHelper
{
    protected $scopeConfig;
    
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }
}</code></pre>
</div>

<h3>Step 2: Use getValue() Method</h3>

<div class="directory-card">
    <pre><code>&lt;?php
// Basic usage (global scope)
$value = $this->scopeConfig->getValue('catalog/recently_products/synchronize_with_backend');

// Website scope
$value = $this->scopeConfig->getValue(
    'catalog/recently_products/synchronize_with_backend',
    ScopeInterface::SCOPE_WEBSITE,
    $websiteId
);

// Store view scope
$value = $this->scopeConfig->getValue(
    'catalog/recently_products/synchronize_with_backend',
    ScopeInterface::SCOPE_STORE,
    $storeId
);</code></pre>
    
    <div class="key-point mt-3">
        <strong>Configuration Path:</strong> The scope configuration path is realized by concatenating the <strong>section id</strong>, the <strong>group id</strong>, and the <strong>field id</strong> separated by slashes.
        <br><br>
        Example: <code>catalog/recently_products/synchronize_with_backend</code>
        <ul class="mb-0">
            <li>Section: <code>catalog</code></li>
            <li>Group: <code>recently_products</code></li>
            <li>Field: <code>synchronize_with_backend</code></li>
        </ul>
    </div>
</div>

<h3>Scope Parameters</h3>

<div class="directory-card">
    <p>The <code>getValue()</code> method accepts three parameters:</p>
    
    <ol>
        <li><strong>$path</strong>: The configuration path (section/group/field)</li>
        <li><strong>$scopeType</strong>: Which type of scope (<code>\Magento\Store\Model\ScopeInterface</code>)
            <ul>
                <li><code>ScopeInterface::SCOPE_WEBSITE</code></li>
                <li><code>ScopeInterface::SCOPE_STORE</code> (store view)</li>
                <li>Default (if omitted): global scope</li>
            </ul>
        </li>
        <li><strong>$scopeCode</strong>: The identifier for the scope (website ID or store ID)</li>
    </ol>
</div>

<h3>Getting Store ID from Order</h3>

<div class="directory-card">
    <pre><code>&lt;?php
// If you need a configuration associated with a particular order
$storeId = $order->getStoreId();

$value = $this->scopeConfig->getValue(
    'section/group/field',
    ScopeInterface::SCOPE_STORE,
    $storeId
);</code></pre>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Common Mistake:</strong> Not considering the scope and scope ID when loading values from store configuration. This is often not necessary on a frontend template. However, in the admin, this is often important unless the scope for a configuration setting is global.
    </div>
</div>

<h2>isSetFlag() for Boolean Values</h2>

<div class="directory-card">
    <p>For boolean configuration values (Yes/No), use <code>isSetFlag()</code> instead of <code>getValue()</code>:</p>
    
    <pre><code>&lt;?php
// Returns true if value is "1", false otherwise
$isEnabled = $this->scopeConfig->isSetFlag(
    'catalog/recently_products/synchronize_with_backend',
    ScopeInterface::SCOPE_STORE,
    $storeId
);

if ($isEnabled) {
    // Feature is enabled
}</code></pre>
    
    <div class="success-box mt-3">
        <strong>Best Practice:</strong> Use <code>isSetFlag()</code> for Yes/No fields for cleaner code and proper boolean handling.
    </div>
</div>

<h2>Complete Example</h2>

<div class="directory-card">
    <h4>system.xml</h4>
    <div class="directory-path">etc/adminhtml/system.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Config:etc/system_file.xsd"&gt;
    &lt;system&gt;
        &lt;section id="mymodule" translate="label" sortOrder="300" showInDefault="1" showInWebsite="1" showInStore="1"&gt;
            &lt;class&gt;separator-top&lt;/class&gt;
            &lt;label&gt;My Module Configuration&lt;/label&gt;
            &lt;tab&gt;general&lt;/tab&gt;
            &lt;resource&gt;Vendor_Module::config&lt;/resource&gt;
            
            &lt;group id="general" translate="label" sortOrder="10" showInDefault="1" showInWebsite="1" showInStore="1"&gt;
                &lt;label&gt;General Settings&lt;/label&gt;
                
                &lt;field id="enabled" translate="label" type="select" sortOrder="10" showInDefault="1" showInWebsite="1" showInStore="1"&gt;
                    &lt;label&gt;Enable Module&lt;/label&gt;
                    &lt;source_model&gt;Magento\Config\Model\Config\Source\Yesno&lt;/source_model&gt;
                &lt;/field&gt;
                
                &lt;field id="api_key" translate="label" type="obscure" sortOrder="20" showInDefault="1" showInWebsite="1" showInStore="0"&gt;
                    &lt;label&gt;API Key&lt;/label&gt;
                    &lt;backend_model&gt;Magento\Config\Model\Config\Backend\Encrypted&lt;/backend_model&gt;
                    &lt;depends&gt;
                        &lt;field id="enabled"&gt;1&lt;/field&gt;
                    &lt;/depends&gt;
                &lt;/field&gt;
                
                &lt;field id="email" translate="label" type="text" sortOrder="30" showInDefault="1" showInWebsite="1" showInStore="1"&gt;
                    &lt;label&gt;Notification Email&lt;/label&gt;
                    &lt;validate&gt;required-entry validate-email&lt;/validate&gt;
                    &lt;depends&gt;
                        &lt;field id="enabled"&gt;1&lt;/field&gt;
                    &lt;/depends&gt;
                &lt;/field&gt;
            &lt;/group&gt;
        &lt;/section&gt;
    &lt;/system&gt;
&lt;/config&gt;</code></pre>
</div>

<div class="directory-card mt-3">
    <h4>Accessing in Code</h4>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    public function isEnabled($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'mymodule/general/enabled',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
    
    public function getApiKey($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'mymodule/general/api_key',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
    
    public function getNotificationEmail($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'mymodule/general/email',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}</code></pre>
</div>

<h2>Best Practices</h2>

<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Configuration Best Practices</h4>
    <ul class="mb-0">
        <li><strong>Logical Organization:</strong> Put configuration in pertinent areas (e.g., Sales → Order Attributes, not Vendor → Order Attributes)</li>
        <li><strong>Scope Awareness:</strong> Always consider scope when retrieving config values, especially in admin context</li>
        <li><strong>Cache Clearing:</strong> Remember to clear cache after modifying system.xml files</li>
        <li><strong>Use obscure type:</strong> For sensitive data like API keys, passwords - encrypts values in database</li>
        <li><strong>Use isSetFlag():</strong> For boolean values instead of getValue()</li>
        <li><strong>ACL Resources:</strong> Always specify ACL resource in sections to control access</li>
        <li><strong>Validation:</strong> Add appropriate validation rules to prevent invalid input</li>
        <li><strong>Dependencies:</strong> Use depends element to show/hide fields based on other field values</li>
        <li><strong>Source Models:</strong> Implement <code>ArrayInterface</code> for select/multiselect options</li>
        <li><strong>Translation:</strong> Use <code>translate="label"</code> for multilingual support</li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-info">
    <h4><i class="fas fa-graduation-cap"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>File location:</strong> <code>etc/adminhtml/system.xml</code></li>
        <li><strong>Hierarchy:</strong> Tab → Section → Group → Field</li>
        <li><strong>Config path format:</strong> <code>section_id/group_id/field_id</code></li>
        <li><strong>Access method:</strong> Inject <code>ScopeConfigInterface</code>, use <code>getValue()</code> or <code>isSetFlag()</code></li>
        <li><strong>Scope types:</strong> <code>SCOPE_WEBSITE</code>, <code>SCOPE_STORE</code> (store view), default (global)</li>
        <li><strong>Field types:</strong> text, select, multiselect, obscure, allowspecific</li>
        <li><strong>obscure vs password:</strong> Use obscure for encrypted values, password is plain text</li>
        <li><strong>Source model:</strong> Must implement <code>\Magento\Framework\Option\ArrayInterface</code></li>
        <li><strong>Encrypted backend model:</strong> <code>Magento\Config\Model\Config\Backend\Encrypted</code></li>
        <li><strong>Cache clearing:</strong> Required after modifying system.xml files</li>
        <li><strong>Common mistake:</strong> Forgetting scope awareness when loading config values</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/development/configuration/add-system-configuration/" target="_blank">Add System Configuration</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/ui-components/components/system-configuration/" target="_blank">system.xml Reference</a></li>
        <li><a href="https://www.mageplaza.com/devdocs/magento-2-system-configuration.html" target="_blank">MagePlaza: System Configuration Field Types</a></li>
    </ul>
</div>
