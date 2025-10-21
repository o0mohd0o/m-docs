<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Attributes are one of Magento's most powerful features. Understanding the different types of attributes and when to use each is essential for extending entities properly and implementing custom functionality.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> Attribute Types Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Attribute Types))
    Functional Attributes
      Change behavior
      Not just data
      Powerful features
    EAV Attributes
      AbstractEntity
      Automatic save/load
      Scalar values
      Scope support
      Grid/form ready
    Extension Attributes
      AbstractExtensibleObject
      Manual save/load
      Complex types
      Custom storage
      WebAPI friendly
    </div>
</div>

<h2>The Power of Attributes in Magento</h2>

<div class="directory-card">
    <p>Attributes are an important feature of Magento. Many out-of-the-box features rely on attributes heavily, and it is possible to create new attributes to implement custom functionality.</p>
    
    <div class="key-point">
        <strong>What Makes Attributes So Powerful:</strong> Attributes in Magento go <strong>far beyond mere elements of data architecture</strong>. Attributes in Magento are <strong>functional</strong>. This means you can use attributes to <strong>change a behavior</strong> of some object, rather than simply adding another property to it.
    </div>
</div>

<h3>Attributes are Functional, Not Just Data</h3>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #dc3545;">
            <h4><i class="fas fa-times-circle"></i> Traditional Approach</h4>
            <p><strong>Mere Data Elements:</strong></p>
            <ul>
                <li>Just store information</li>
                <li>No behavior changes</li>
                <li>Static properties</li>
                <li>Limited functionality</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #198754;">
            <h4><i class="fas fa-check-circle"></i> Magento Attributes</h4>
            <p><strong>Functional Elements:</strong></p>
            <ul>
                <li>✅ Change object behavior</li>
                <li>✅ Trigger functionality</li>
                <li>✅ Dynamic properties</li>
                <li>✅ Rich feature set</li>
            </ul>
        </div>
    </div>
</div>

<h2>Two Primary Types of Attributes</h2>

<div class="directory-card">
    <p>There are <strong>two primary types</strong> of attributes in Magento:</p>
    
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="success-box">
                <h4>1. EAV Attributes</h4>
                <p>Traditional Entity-Attribute-Value attributes with automatic persistence and scope support.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="success-box">
                <h4>2. Extension Attributes</h4>
                <p>Modern, flexible attributes for complex data types with manual implementation.</p>
            </div>
        </div>
    </div>
</div>

<h2>Comprehensive Comparison Table</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Feature</th>
                <th>EAV Attribute</th>
                <th>Extension Attribute</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Applied to</strong></td>
                <td>A Resource model that extends <code>Magento\Eav\Model\Entity\AbstractEntity</code></td>
                <td>Data model that extends <code>Magento\Framework\Api\AbstractExtensibleObject</code>, or model that extends <code>Magento\Framework\Model\AbstractExtensibleModel</code></td>
            </tr>
            <tr>
                <td><strong>Values stored</strong></td>
                <td>In special tables with types <code>*_entity_varchar</code>, <code>*_entity_int</code>, and so on. For example: <code>catalog_product_entity_int</code></td>
                <td>It is up to developer to decide where to store the data (custom tables, files, external APIs)</td>
            </tr>
            <tr>
                <td><strong>Save and load</strong></td>
                <td>Automatically implemented in the <code>AbstractEntity</code> resource model. A lot of functionality is implemented in <code>Magento_Catalog</code> abstract resource model</td>
                <td>Manually. Developer has to load and save the data using plugins or observers</td>
            </tr>
            <tr>
                <td><strong>Use for custom entity</strong></td>
                <td><span class="badge bg-danger">Very difficult</span></td>
                <td><span class="badge bg-success">Easy</span></td>
            </tr>
            <tr>
                <td><strong>Create new attribute</strong></td>
                <td>Requires a DataPatch</td>
                <td>Requires an entry in <code>etc/extension_attributes.xml</code> file</td>
            </tr>
            <tr>
                <td><strong>Availability in WebAPI</strong></td>
                <td>Available as <strong>Custom Attributes</strong></td>
                <td>Available as <strong>Extension Attributes</strong></td>
            </tr>
            <tr>
                <td><strong>Scope support</strong></td>
                <td><span class="badge bg-success">Out of the box</span> for product and category attributes</td>
                <td>Does not support scope out of the box, up to developer to implement</td>
            </tr>
            <tr>
                <td><strong>Grid and form support</strong></td>
                <td><span class="badge bg-success">Yes</span>, out-of-the-box</td>
                <td><span class="badge bg-danger">No</span>, requires custom work</td>
            </tr>
            <tr>
                <td><strong>Typical use case</strong></td>
                <td>Extend an entity with a new <strong>scalar property</strong>, implement some functionality when the property changes, support different values for different scopes</td>
                <td>Extending an entity with a new property, <strong>not necessarily scalar</strong>, could be an object or array. Data is stored in custom tables, files, could even be fetched by API</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>EAV Attributes In-Depth</h2>

<div class="directory-card">
    <h3><i class="fas fa-database"></i> Entity-Attribute-Value Architecture</h3>
    <p>EAV attributes follow the Entity-Attribute-Value pattern, where attribute values are stored separately from the main entity table.</p>
</div>

<h3>Applied To</h3>

<div class="directory-card">
    <p>EAV attributes can only be applied to resource models that extend <code>Magento\Eav\Model\Entity\AbstractEntity</code>.</p>
    
    <h4>Core Entities Using EAV:</h4>
    <ul>
        <li>✅ <strong>Products</strong> - <code>Magento\Catalog\Model\ResourceModel\Product</code></li>
        <li>✅ <strong>Categories</strong> - <code>Magento\Catalog\Model\ResourceModel\Category</code></li>
        <li>✅ <strong>Customers</strong> - <code>Magento\Customer\Model\ResourceModel\Customer</code></li>
        <li>✅ <strong>Customer Addresses</strong> - <code>Magento\Customer\Model\ResourceModel\Address</code></li>
    </ul>
</div>

<h3>Storage Structure</h3>

<div class="directory-card">
    <p>EAV attribute values are stored in special tables based on data type:</p>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Data Type</th>
                    <th>Table Pattern</th>
                    <th>Example (Product)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Text (short)</strong></td>
                    <td><code>*_entity_varchar</code></td>
                    <td><code>catalog_product_entity_varchar</code></td>
                </tr>
                <tr>
                    <td><strong>Integer</strong></td>
                    <td><code>*_entity_int</code></td>
                    <td><code>catalog_product_entity_int</code></td>
                </tr>
                <tr>
                    <td><strong>Decimal</strong></td>
                    <td><code>*_entity_decimal</code></td>
                    <td><code>catalog_product_entity_decimal</code></td>
                </tr>
                <tr>
                    <td><strong>Text (long)</strong></td>
                    <td><code>*_entity_text</code></td>
                    <td><code>catalog_product_entity_text</code></td>
                </tr>
                <tr>
                    <td><strong>Date/Time</strong></td>
                    <td><code>*_entity_datetime</code></td>
                    <td><code>catalog_product_entity_datetime</code></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="key-point mt-3">
        <strong>Structure Example:</strong> Each table contains <code>entity_id</code>, <code>attribute_id</code>, <code>store_id</code>, and <code>value</code> columns for scope-aware storage.
    </div>
</div>

<h3>Automatic Save and Load</h3>

<div class="directory-card">
    <p>One of the biggest advantages of EAV attributes is <strong>automatic persistence</strong>.</p>
    
    <pre><code>&lt;?php
// EAV attribute - automatically saved
$product->setWarrantyPeriod(12);
$product->save(); // warranty_period is automatically saved to catalog_product_entity_int

// Later, automatically loaded
$warrantyPeriod = $product->getWarrantyPeriod(); // Automatically loaded from database</code></pre>
    
    <div class="success-box mt-3">
        <strong>Key Benefit:</strong> All save/load logic is implemented in <code>AbstractEntity</code> resource model. Lots of functionality is also in <code>Magento_Catalog</code> abstract resource model.
    </div>
</div>

<h3>Creating EAV Attributes</h3>

<div class="directory-card">
    <p>EAV attributes require a <strong>DataPatch</strong> to create them.</p>
    
    <div class="directory-path">Setup/Patch/Data/AddCustomAttribute.php</div>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class AddCustomAttribute implements DataPatchInterface
{
    private $eavSetupFactory;
    
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create();
        
        $eavSetup->addAttribute(
            Product::ENTITY,
            'warranty_period',
            [
                'type' => 'int',
                'label' => 'Warranty Period (months)',
                'input' => 'text',
                'required' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'group' => 'General'
            ]
        );
        
        return $this;
    }
    
    public static function getDependencies()
    {
        return [];
    }
    
    public function getAliases()
    {
        return [];
    }
}</code></pre>
</div>

<h3>Scope Support</h3>

<div class="directory-card">
    <p>EAV attributes for products and categories support <strong>scope out of the box</strong>.</p>
    
    <h4>Available Scopes:</h4>
    <ul>
        <li><strong>SCOPE_GLOBAL</strong> - Same value across all websites and store views</li>
        <li><strong>SCOPE_WEBSITE</strong> - Different values per website</li>
        <li><strong>SCOPE_STORE</strong> - Different values per store view</li>
    </ul>
    
    <pre><code>&lt;?php
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

// In DataPatch
'global' => ScopedAttributeInterface::SCOPE_STORE,  // Store view scope
'global' => ScopedAttributeInterface::SCOPE_WEBSITE, // Website scope
'global' => ScopedAttributeInterface::SCOPE_GLOBAL,  // Global scope</code></pre>
</div>

<h3>Grid and Form Support</h3>

<div class="directory-card">
    <p>EAV attributes have <strong>built-in support</strong> for admin grids and forms.</p>
    
    <pre><code>// In DataPatch attribute configuration
'is_used_in_grid' => true,           // Can be used in admin grid
'is_visible_in_grid' => true,        // Visible in admin grid by default
'is_filterable_in_grid' => true,     // Can filter by this attribute in grid
'is_searchable_in_grid' => true,     // Can search by this attribute</code></pre>
    
    <div class="success-box mt-3">
        <strong>Automatic Display:</strong> Attributes appear in product edit form under the specified group without additional coding.
    </div>
</div>

<h3>Use for Custom Entities</h3>

<div class="directory-card">
    <div class="warning-box">
        <strong>⚠️ Very Difficult:</strong> Using EAV for custom entities requires:
        <ul class="mb-0">
            <li>Creating multiple database tables (*_entity, *_entity_int, *_entity_varchar, etc.)</li>
            <li>Implementing resource model extending <code>AbstractEntity</code></li>
            <li>Setting up EAV entity type</li>
            <li>Managing attribute sets and groups</li>
            <li>Complex configuration and setup</li>
        </ul>
    </div>
</div>

<h2>Extension Attributes In-Depth</h2>

<div class="directory-card">
    <h3><i class="fas fa-puzzle-piece"></i> Flexible Extension Architecture</h3>
    <p>Extension attributes provide a flexible way to extend entities with complex data types and custom storage mechanisms.</p>
</div>

<h3>Applied To</h3>

<div class="directory-card">
    <p>Extension attributes can be applied to:</p>
    
    <ul>
        <li>Data models that extend <code>Magento\Framework\Api\AbstractExtensibleObject</code></li>
        <li>Models that extend <code>Magento\Framework\Model\AbstractExtensibleModel</code></li>
    </ul>
    
    <h4>Common Extensible Entities:</h4>
    <ul>
        <li>✅ Products, Categories, Customers (API Data interfaces)</li>
        <li>✅ Orders, Quotes, Invoices, Shipments</li>
        <li>✅ Cart items, Quote items</li>
        <li>✅ Custom entities implementing the interfaces</li>
    </ul>
</div>

<h3>Storage - Developer's Choice</h3>

<div class="directory-card">
    <p>Unlike EAV attributes, with extension attributes <strong>the developer decides</strong> where to store the data.</p>
    
    <h4>Storage Options:</h4>
    <div class="row">
        <div class="col-md-6">
            <ul>
                <li>✅ Custom database tables</li>
                <li>✅ Existing tables (additional columns)</li>
                <li>✅ File system</li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul>
                <li>✅ External APIs</li>
                <li>✅ Cache/Redis</li>
                <li>✅ Computed on-the-fly (no storage)</li>
            </ul>
        </div>
    </div>
</div>

<h3>Manual Save and Load</h3>

<div class="directory-card">
    <p>Extension attributes require <strong>manual implementation</strong> of save and load logic using plugins.</p>
    
    <h4>Example: Load Extension Attribute</h4>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Plugin;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductExtensionFactory;
use Vendor\Module\Api\RelatedBlogPostRepositoryInterface;

class ProductRepositoryPlugin
{
    private $extensionFactory;
    private $blogPostRepository;
    
    public function __construct(
        ProductExtensionFactory $extensionFactory,
        RelatedBlogPostRepositoryInterface $blogPostRepository
    ) {
        $this->extensionFactory = $extensionFactory;
        $this->blogPostRepository = $blogPostRepository;
    }
    
    public function afterGet(
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        ProductInterface $product
    ) {
        $extensionAttributes = $product->getExtensionAttributes();
        if ($extensionAttributes === null) {
            $extensionAttributes = $this->extensionFactory->create();
        }
        
        // Load extension attribute data from custom source
        $blogPosts = $this->blogPostRepository->getByProductId($product->getId());
        $extensionAttributes->setRelatedBlogPosts($blogPosts);
        
        $product->setExtensionAttributes($extensionAttributes);
        return $product;
    }
}</code></pre>
</div>

<h3>Creating Extension Attributes</h3>

<div class="directory-card">
    <p>Extension attributes require an entry in <code>etc/extension_attributes.xml</code>.</p>
    
    <div class="directory-path">etc/extension_attributes.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Api/etc/extension_attributes.xsd"&gt;
    &lt;extension_attributes for="Magento\Catalog\Api\Data\ProductInterface"&gt;
        &lt;!-- Simple scalar attribute --&gt;
        &lt;attribute code="custom_flag" type="string" /&gt;
        
        &lt;!-- Array of objects --&gt;
        &lt;attribute code="related_blog_posts" type="Vendor\Module\Api\Data\BlogPostInterface[]" /&gt;
        
        &lt;!-- Single object --&gt;
        &lt;attribute code="shipping_estimate" type="Vendor\Module\Api\Data\ShippingEstimateInterface" /&gt;
    &lt;/extension_attributes&gt;
&lt;/config&gt;</code></pre>
    
    <div class="key-point mt-3">
        <strong>Flexibility:</strong> Can define scalar types, objects, or arrays of objects.
    </div>
</div>

<h3>WebAPI Availability</h3>

<div class="directory-card">
    <p>Extension attributes are automatically available in WebAPI responses as <strong>Extension Attributes</strong>.</p>
    
    <h4>API Response Example:</h4>
    <pre><code>{
  "id": 123,
  "sku": "product-sku",
  "name": "Product Name",
  "custom_attributes": [
    {
      "attribute_code": "warranty_period",
      "value": "12"
    }
  ],
  "extension_attributes": {
    "custom_flag": "some_value",
    "related_blog_posts": [
      {
        "id": 1,
        "title": "Blog Post Title"
      }
    ]
  }
}</code></pre>
    
    <div class="success-box mt-3">
        <strong>Note:</strong> EAV attributes appear as <code>custom_attributes</code>, extension attributes appear as <code>extension_attributes</code>.
    </div>
</div>

<h3>Use for Custom Entities</h3>

<div class="directory-card">
    <div class="success-box">
        <strong>✅ Easy:</strong> Using extension attributes for custom entities is straightforward:
        <ul class="mb-0">
            <li>Create your data interface extending <code>AbstractExtensibleObject</code></li>
            <li>Define extension attributes in XML</li>
            <li>Implement load/save logic in plugins</li>
            <li>No complex EAV setup required</li>
        </ul>
    </div>
</div>

<h2>Decision Matrix: When to Use Each Type</h2>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #198754;">
            <h4><i class="fas fa-database"></i> Use EAV Attributes When:</h4>
            <ul>
                <li>✅ Extending <strong>products, categories, or customers</strong></li>
                <li>✅ Adding <strong>simple scalar values</strong> (text, number, date)</li>
                <li>✅ Need <strong>automatic save/load</strong></li>
                <li>✅ Need <strong>scope support</strong> (website/store view)</li>
                <li>✅ Want <strong>automatic grid/form</strong> display</li>
                <li>✅ Need <strong>filtering/searching</strong> in admin</li>
                <li>✅ Implementing <strong>behavior changes</strong> based on value</li>
            </ul>
            
            <div class="success-box mt-3">
                <strong>Example:</strong> Adding "warranty_period" to products with different values per store view.
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #0d6efd;">
            <h4><i class="fas fa-puzzle-piece"></i> Use Extension Attributes When:</h4>
            <ul>
                <li>✅ Need <strong>complex data types</strong> (objects, arrays)</li>
                <li>✅ Extending <strong>non-EAV entities</strong> (orders, quotes)</li>
                <li>✅ Data from <strong>external sources</strong> (APIs, files)</li>
                <li>✅ Need <strong>custom storage</strong> control</li>
                <li>✅ Creating <strong>custom entities</strong></li>
                <li>✅ <strong>Computed/derived</strong> data (no persistence)</li>
                <li>✅ <strong>WebAPI-focused</strong> integration</li>
            </ul>
            
            <div class="success-box mt-3">
                <strong>Example:</strong> Adding "related_blog_posts" array to products, fetched from external CMS.
            </div>
        </div>
    </div>
</div>

<h2>Real-World Scenarios</h2>

<div class="directory-card">
    <h3>Scenario 1: Product Warranty (Use EAV)</h3>
    <p><strong>Requirement:</strong> Add warranty period to products, different per store view, filterable in admin.</p>
    <p><strong>Solution:</strong> EAV attribute</p>
    <ul>
        <li>✅ Simple integer value</li>
        <li>✅ Need scope support</li>
        <li>✅ Want admin grid filtering</li>
        <li>✅ Automatic persistence</li>
    </ul>
</div>

<div class="directory-card">
    <h3>Scenario 2: Shipping Estimates (Use Extension)</h3>
    <p><strong>Requirement:</strong> Add real-time shipping estimates from external API to cart items.</p>
    <p><strong>Solution:</strong> Extension attribute</p>
    <ul>
        <li>✅ Complex object (carrier, cost, time)</li>
        <li>✅ Computed from external API</li>
        <li>✅ No database persistence needed</li>
        <li>✅ WebAPI integration</li>
    </ul>
</div>

<div class="directory-card">
    <h3>Scenario 3: Custom Order Notes (Use Extension)</h3>
    <p><strong>Requirement:</strong> Store structured internal notes about orders.</p>
    <p><strong>Solution:</strong> Extension attribute</p>
    <ul>
        <li>✅ Orders don't use EAV</li>
        <li>✅ Complex structure (author, timestamp, note)</li>
        <li>✅ Custom table for storage</li>
        <li>✅ Manual save/load control</li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>Attributes are functional</strong> - change behavior, not just data</li>
        <li><strong>Two primary types:</strong> EAV and Extension</li>
        <li><strong>EAV applied to:</strong> AbstractEntity resource models (products, categories, customers)</li>
        <li><strong>Extension applied to:</strong> AbstractExtensibleObject or AbstractExtensibleModel</li>
        <li><strong>EAV storage:</strong> *_entity_varchar, *_entity_int, *_entity_decimal, *_entity_text, *_entity_datetime</li>
        <li><strong>Extension storage:</strong> Developer decides (custom tables, files, APIs, computed)</li>
        <li><strong>EAV save/load:</strong> Automatic in AbstractEntity</li>
        <li><strong>Extension save/load:</strong> Manual implementation via plugins</li>
        <li><strong>EAV creation:</strong> DataPatch with EavSetup</li>
        <li><strong>Extension creation:</strong> etc/extension_attributes.xml</li>
        <li><strong>WebAPI:</strong> EAV = custom_attributes, Extension = extension_attributes</li>
        <li><strong>Scope:</strong> EAV has built-in support, Extension requires manual implementation</li>
        <li><strong>Grid/Form:</strong> EAV has built-in support, Extension requires custom work</li>
        <li><strong>Custom entities:</strong> EAV very difficult, Extension easy</li>
        <li><strong>Data types:</strong> EAV only scalar, Extension supports objects/arrays</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/development/components/add-attributes/" target="_blank">Add Product Attributes</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/attributes/" target="_blank">EAV and Extension Attributes</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/extension-attributes/" target="_blank">Adding Extension Attributes to Entity</a></li>
        <li><a href="https://developer.adobe.com/commerce/webapi/rest/attributes/" target="_blank">Custom and Extension Attributes in WebAPI</a></li>
    </ul>
</div>
