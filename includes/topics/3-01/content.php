<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding attribute sets and attributes is crucial for extending Magento entities like products, categories, and customers. This knowledge allows you to add custom data fields and functionality to these entities.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> Attribute Sets & Attributes Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Attributes))
    Attribute Sets
      eav_attribute_set table
      Multiple per product entity
      Single for categories/customers
      Groups attributes
    Attribute Groups
      eav_attribute_group table
      Form accordions
      Rendering purposes
    EAV Attributes
      Special tables
      Automatic save/load
      Scope support
      Grid/form support
    Extension Attributes
      Custom storage
      Manual save/load
      Objects/arrays
      WebAPI support
    </div>
</div>

<h2>Attribute Sets Overview</h2>

<div class="directory-card">
    <p><strong>EAV attributes</strong> in Magento are grouped into <strong>attribute sets</strong>. Each instance of an EAV entity is connected to an attribute set.</p>
    
    <div class="key-point">
        <strong>Important:</strong> Each product has an attribute set. This is also true for categories and customers, but in practice they always stay within a single attribute set. So, <strong>attribute sets usually only differ for different products</strong>.
    </div>
</div>

<h2>Attribute Sets Table Structure</h2>

<div class="directory-card">
    <h3><i class="fas fa-database"></i> eav_attribute_set Table</h3>
    
    <p>All attribute sets are stored in the <code>eav_attribute_set</code> table.</p>
    
    <pre><code>mysql&gt; SELECT * FROM eav_attribute_set;
+------------------+----------------+--------------------+------------+
| attribute_set_id | entity_type_id | attribute_set_name | sort_order |
+------------------+----------------+--------------------+------------+
| 1                | 1              | Default            | 2          |
| 2                | 2              | Default            | 2          |
| 3                | 3              | Default            | 1          |
| 4                | 4              | Default            | 1          |
| 5                | 5              | Default            | 1          |
| 6                | 6              | Default            | 1          |
| 7                | 7              | Default            | 1          |
| 8                | 8              | Default            | 1          |
| 9                | 4              | Top                | 0          |
| 10               | 4              | Bottom             | 0          |
| 11               | 4              | Gear               | 0          |
| 12               | 4              | Sprite Stasis Ball | 0          |
+------------------+----------------+--------------------+------------+</code></pre>
    
    <div class="key-point mt-3">
        <strong>Key Observation:</strong> Only the <strong>product entity</strong> (<code>entity_type_id=4</code>) has multiple attribute sets. Other entities have only a single "Default" attribute set.
    </div>
</div>

<h3>Table Columns</h3>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Column</th>
                <th>Purpose</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>attribute_set_id</strong></td>
                <td>Primary Key</td>
                <td>Unique identifier for the attribute set</td>
            </tr>
            <tr>
                <td><strong>entity_type_id</strong></td>
                <td>Foreign Key</td>
                <td>Links to eav_entity_type (1=customer, 2=customer_address, 3=category, 4=product, etc.)</td>
            </tr>
            <tr>
                <td><strong>attribute_set_name</strong></td>
                <td>Display Name</td>
                <td>Name of the attribute set (e.g., "Default", "Top", "Bottom", "Gear")</td>
            </tr>
            <tr>
                <td><strong>sort_order</strong></td>
                <td>Display Order</td>
                <td>Controls the order in which attribute sets appear in admin</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Attribute Groups</h2>

<div class="directory-card">
    <p>In addition to attribute sets, Magento uses <strong>attribute groups</strong> for grouping attributes. Attribute groups are used on form pages to create accordions (like Product Details, Images, Content, etc.).</p>
    
    <div class="key-point">
        <strong>Important:</strong> Unlike attribute sets, groups do not have any important function other than <strong>rendering attributes on an edit page</strong>.
    </div>
</div>

<h3>eav_attribute_group Table</h3>

<div class="directory-card">
    <p>Groups are stored in the <code>eav_attribute_group</code> table. Each group is connected to one parent attribute set.</p>
    
    <div class="success-box mt-3">
        <strong>Note:</strong> All non-trivial groups are related to the <strong>product and category entities</strong>. You can verify this by checking the table.
    </div>
</div>

<h2>Entity Attribute Association</h2>

<div class="directory-card">
    <h3><i class="fas fa-database"></i> eav_entity_attribute Table</h3>
    
    <p>The association between <strong>attributes</strong>, <strong>entities</strong>, and <strong>groups</strong> is stored in the <code>eav_entity_attribute</code> table.</p>
    
    <pre><code>mysql&gt; SELECT * FROM eav_entity_attribute WHERE entity_type_id=4 LIMIT 10;
+---------------------+----------------+------------------+--------------------+--------------+------------+
| entity_attribute_id | entity_type_id | attribute_set_id | attribute_group_id | attribute_id | sort_order |
+---------------------+----------------+------------------+--------------------+--------------+------------+
| 73                  | 4              | 4                | 7                  | 73           | 10         |
| 74                  | 4              | 4                | 7                  | 74           | 20         |
| 75                  | 4              | 4                | 13                 | 75           | 110        |
| 76                  | 4              | 4                | 13                 | 76           | 100        |
| 77                  | 4              | 4                | 7                  | 77           | 30         |
+---------------------+----------------+------------------+--------------------+--------------+------------+</code></pre>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Denormalized Table:</strong> You may notice that this table is denormalized, since <code>attribute_group_id</code> carries information about <code>attribute_set_id</code> and <code>entity_type_id</code>.
    </div>
</div>

<h2>Managing Attribute Sets</h2>

<div class="directory-card">
    <p>Attribute sets management can be done in <strong>two ways</strong>:</p>
    
    <ol>
        <li><strong>Admin Panel</strong>: Stores → Attributes → Attribute Set</li>
        <li><strong>Programmatically</strong>: Using code/data patches</li>
    </ol>
</div>

<h3>Creating Attribute Sets Programmatically</h3>

<div class="directory-card">
    <div class="warning-box">
        <strong>⚠️ Subtle Detail to Be Aware Of:</strong> Normal attribute sets (for products) must include some attributes (like <code>price</code>) for a product to be functional. This means creating a new, empty attribute set is <strong>useless</strong>, unless we assign these attributes to it.
    </div>
    
    <div class="success-box mt-3">
        <strong>Solution:</strong> Create an attribute set "based" on another attribute set, which means attributes from the parent set will be copied to its children. This is done by the <code>initFromSkeleton()</code> method of the attribute set's model.
    </div>
</div>

<h4>Example: Create Attribute Set Based on Another Set</h4>

<div class="directory-card">
    <pre><code>&lt;?php
namespace Vendor\Module\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Catalog\Model\Product;

class CreateCustomAttributeSet implements DataPatchInterface
{
    private $eavSetupFactory;
    private $attributeSetFactory;
    
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }
    
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create();
        $attributeSet = $this->attributeSetFactory->create();
        
        $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY);
        
        // Get the default attribute set ID to use as skeleton
        $defaultSetId = $eavSetup->getDefaultAttributeSetId($entityTypeId);
        
        // Create new attribute set
        $attributeSet->setData([
            'attribute_set_name' => 'Custom Product Set',
            'entity_type_id' => $entityTypeId,
            'sort_order' => 100,
        ]);
        
        $attributeSet->validate();
        $attributeSet->save();
        
        // Copy attributes from default set (skeleton)
        $attributeSet->initFromSkeleton($defaultSetId);
        $attributeSet->save();
        
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
    
    <div class="key-point mt-3">
        <strong>Key Method:</strong> <code>initFromSkeleton($skeletonId)</code> copies all attributes from the skeleton (parent) attribute set to the new attribute set.
    </div>
</div>

<h2>Types of Attributes in Magento</h2>

<div class="directory-card">
    <p>Attributes are a powerful feature in Magento. What makes them so powerful is that they go <strong>far beyond mere elements of data architecture</strong>. Attributes in Magento are <strong>functional</strong> - you can use them to change behavior of an object, not just add properties.</p>
    
    <div class="key-point">
        <strong>Two Primary Types:</strong>
        <ul class="mb-0">
            <li><strong>EAV Attributes</strong> - Traditional entity-attribute-value attributes</li>
            <li><strong>Extension Attributes</strong> - Modern, flexible attributes for extending entities</li>
        </ul>
    </div>
</div>

<h2>EAV Attributes vs Extension Attributes</h2>

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
                <td>In special tables with types <code>*_entity_varchar</code>, <code>*_entity_int</code>, etc. Example: <code>catalog_product_entity_int</code></td>
                <td>Up to developer to decide where to store the data</td>
            </tr>
            <tr>
                <td><strong>Save and load</strong></td>
                <td>Automatically implemented in <code>AbstractEntity</code> resource model. Lots of functionality in <code>Magento_Catalog</code> abstract resource model</td>
                <td>Manual. Developer has to load and save the data</td>
            </tr>
            <tr>
                <td><strong>Use for custom entity</strong></td>
                <td>Very difficult</td>
                <td>Easy</td>
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
                <td>Out of the box for product and category attributes</td>
                <td>Does not support scope out of the box, up to developer to implement</td>
            </tr>
            <tr>
                <td><strong>Grid and form support</strong></td>
                <td>Yes, out-of-the-box</td>
                <td>No, requires custom work</td>
            </tr>
            <tr>
                <td><strong>Typical use case</strong></td>
                <td>Extend an entity with a new <strong>scalar property</strong>, implement functionality when the property changes, support different values for different scopes</td>
                <td>Extend an entity with a new property, <strong>not necessarily scalar</strong>, could be an object or array. Data stored in custom tables, files, or fetched by API</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>When to Use EAV Attributes</h2>

<div class="directory-card">
    <h4><i class="fas fa-check-circle text-success"></i> Use EAV Attributes When:</h4>
    <ul>
        <li>✅ Adding a simple scalar value (text, number, date) to products, categories, or customers</li>
        <li>✅ You need <strong>automatic save/load</strong> functionality</li>
        <li>✅ You need <strong>scope support</strong> (different values for website/store view)</li>
        <li>✅ You want the attribute to appear in <strong>admin grids and forms</strong> automatically</li>
        <li>✅ You need the attribute available in <strong>WebAPI</strong> as custom attributes</li>
        <li>✅ You want to implement <strong>functionality when the attribute changes</strong></li>
    </ul>
    
    <div class="success-box mt-3">
        <strong>Example:</strong> Adding a "warranty_period" attribute to products with different values per store view.
    </div>
</div>

<h2>When to Use Extension Attributes</h2>

<div class="directory-card">
    <h4><i class="fas fa-check-circle text-success"></i> Use Extension Attributes When:</h4>
    <ul>
        <li>✅ Extending entities with <strong>complex data types</strong> (objects, arrays)</li>
        <li>✅ You need to store data in <strong>custom tables</strong></li>
        <li>✅ Data comes from <strong>external sources</strong> (files, APIs)</li>
        <li>✅ You need <strong>fine control</strong> over data storage and retrieval</li>
        <li>✅ Extending <strong>non-EAV entities</strong> or custom entities</li>
        <li>✅ You don't need scope support</li>
    </ul>
    
    <div class="success-box mt-3">
        <strong>Example:</strong> Adding a "shipping_estimates" array to a quote, or "related_blog_posts" object to a product.
    </div>
</div>

<h2>Creating EAV Attributes</h2>

<div class="directory-card">
    <p>EAV attributes require a <strong>DataPatch</strong> to create them programmatically.</p>
    
    <h4>Example: Product Attribute DataPatch</h4>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddWarrantyAttribute implements DataPatchInterface
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
            \Magento\Catalog\Model\Product::ENTITY,
            'warranty_period',
            [
                'type' => 'int',
                'label' => 'Warranty Period (months)',
                'input' => 'text',
                'required' => false,
                'sort_order' => 100,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'General',
                'is_used_in_grid' => true,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => true,
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

<h2>Creating Extension Attributes</h2>

<div class="directory-card">
    <p>Extension attributes require an entry in <code>etc/extension_attributes.xml</code> file.</p>
    
    <h4>Example: Adding Extension Attribute to Product</h4>
    
    <div class="directory-path">etc/extension_attributes.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Api/etc/extension_attributes.xsd"&gt;
    &lt;extension_attributes for="Magento\Catalog\Api\Data\ProductInterface"&gt;
        &lt;attribute code="related_blog_posts" type="Vendor\Module\Api\Data\BlogPostInterface[]" /&gt;
    &lt;/extension_attributes&gt;
&lt;/config&gt;</code></pre>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Remember:</strong> Unlike EAV attributes, extension attributes require <strong>manual implementation</strong> of data loading and saving through plugins or observers.
    </div>
</div>

<h2>Key Differences Summary</h2>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #198754;">
            <h4><i class="fas fa-database"></i> EAV Attributes</h4>
            <p><strong>Pros:</strong></p>
            <ul>
                <li>✅ Automatic save/load</li>
                <li>✅ Scope support built-in</li>
                <li>✅ Grid/form support</li>
                <li>✅ WebAPI custom attributes</li>
            </ul>
            <p><strong>Cons:</strong></p>
            <ul>
                <li>❌ Only scalar values</li>
                <li>❌ Difficult for custom entities</li>
                <li>❌ Performance overhead</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #0d6efd;">
            <h4><i class="fas fa-puzzle-piece"></i> Extension Attributes</h4>
            <p><strong>Pros:</strong></p>
            <ul>
                <li>✅ Complex data types (objects/arrays)</li>
                <li>✅ Custom storage</li>
                <li>✅ Easy for custom entities</li>
                <li>✅ Flexible implementation</li>
            </ul>
            <p><strong>Cons:</strong></p>
            <ul>
                <li>❌ Manual save/load</li>
                <li>❌ No built-in scope support</li>
                <li>❌ No grid/form support</li>
            </ul>
        </div>
    </div>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>Attribute sets</strong> stored in <code>eav_attribute_set</code> table</li>
        <li>Only <strong>products</strong> (entity_type_id=4) have multiple attribute sets</li>
        <li><strong>Attribute groups</strong> stored in <code>eav_attribute_group</code> - used for rendering only</li>
        <li><strong>Association table:</strong> <code>eav_entity_attribute</code> (denormalized)</li>
        <li><strong>initFromSkeleton()</strong> method copies attributes from parent set</li>
        <li>New attribute sets must include required attributes (like <code>price</code>) to be functional</li>
        <li><strong>Two attribute types:</strong> EAV and Extension</li>
        <li><strong>EAV:</strong> Scalar values, automatic save/load, scope support, grid/form support</li>
        <li><strong>Extension:</strong> Complex types, manual save/load, custom storage, WebAPI</li>
        <li><strong>EAV creation:</strong> Requires DataPatch</li>
        <li><strong>Extension creation:</strong> Requires <code>etc/extension_attributes.xml</code></li>
        <li><strong>EAV storage:</strong> <code>*_entity_varchar</code>, <code>*_entity_int</code> tables</li>
        <li><strong>Extension storage:</strong> Developer decides</li>
        <li><strong>WebAPI:</strong> EAV = Custom Attributes, Extension = Extension Attributes</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/development/components/add-attributes/" target="_blank">Add Product Attributes</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/attributes/" target="_blank">EAV and Extension Attributes</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/extension-attributes/" target="_blank">Adding Extension Attributes to Entity</a></li>
        <li><a href="https://developer.adobe.com/commerce/admin-developer/pattern-library/containers/slideouts-modals-overlays/#attribute-sets" target="_blank">Attribute Sets (Admin Panel)</a></li>
    </ul>
</div>
