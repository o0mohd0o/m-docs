<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding EAV (Entity Attribute Value) is crucial for Magento development. EAV provides the flexible attribute system that powers products, categories, and customers. This is a fundamental exam topic.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> EAV Framework Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((EAV Framework))
    Purpose
      Flexible attributes
      Different properties
      Extend data architecture
    Components
      Entity Types
      Attribute Sets
      Attributes
      Attribute Values
    Entity Types
      catalog_product
      catalog_category
      customer
      customer_address
    Attribute Models
      Frontend Model
      Source Model
      Backend Model
    Storage
      entity_varchar
      entity_int
      entity_decimal
      entity_text
      entity_datetime
    </div>
</div>

<h2>What is EAV?</h2>

<div class="directory-card">
    <p><strong>Entity Attribute Value (EAV)</strong> is a framework that allows entities to have different values for its properties.</p>
    
    <h4>Two Main Purposes:</h4>
    <ol>
        <li><strong>Multi-valued attributes:</strong> Different values for attributes based on scope (global, website, store)</li>
        <li><strong>Flexible data architecture:</strong> Allows extending an entity's data architecture easily</li>
    </ol>
    
    <div class="key-point mt-3">
        <strong>Example:</strong> EAV allows laptops and mobile phones, which are instances of the Catalog_Product entity, to have different properties (attributes). Some products have "screen_size", others have "battery_capacity", etc.
    </div>
</div>

<h3>EAV Implementation</h3>

<div class="directory-card">
    <p>EAV is technically implemented via <strong>ResourceModel</strong>.</p>
    
    <div class="warning-box">
        <strong>⚠️ Important:</strong> It is very difficult to create a custom EAV entity, and usually there is no need for that. Use extension attributes instead for custom entities.
    </div>
</div>

<h2>Four Components of EAV</h2>

<div class="directory-card">
    <p>EAV consists of the following components:</p>
    <ol>
        <li><strong>Entity Types</strong> - Registered EAV entities</li>
        <li><strong>Attribute Sets</strong> - Groups of attributes</li>
        <li><strong>Attributes</strong> - Individual properties with behavior</li>
        <li><strong>Attribute Values</strong> - Stored values in type-specific tables</li>
    </ol>
</div>

<h2>1. Entity Types</h2>

<div class="directory-card">
    <h3><i class="fas fa-cube"></i> eav_entity_type Table</h3>
    <p>Each EAV entity must be registered as an entity type in the <code>eav_entity_type</code> table.</p>
    
    <pre><code>SELECT entity_type_id, entity_type_code, entity_table 
FROM eav_entity_type;

+----------------+------------------+-------------------------+
| entity_type_id | entity_type_code | entity_table            |
+----------------+------------------+-------------------------+
| 1              | customer         | customer_entity         |
| 2              | customer_address | customer_address_entity |
| 3              | catalog_category | catalog_category_entity |
| 4              | catalog_product  | catalog_product_entity  |
| 5              | order            | sales_order             |
| 6              | invoice          | sales_invoice           |
| 7              | creditmemo       | sales_creditmemo        |
| 8              | shipment         | sales_shipment          |
+----------------+------------------+-------------------------+</code></pre>
</div>

<h3>Entity Types Evolution</h3>

<div class="directory-card">
    <p>There are <strong>eight entity types</strong> in Magento. They come from the early days of Magento 1, and by Magento 2.4, have evolved significantly.</p>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Entity Type</th>
                    <th>Status</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>catalog_product</code></td>
                    <td><span class="badge bg-success">Fully-Fledged</span></td>
                    <td>Complete EAV implementation with all features</td>
                </tr>
                <tr>
                    <td><code>catalog_category</code></td>
                    <td><span class="badge bg-success">Fully-Fledged</span></td>
                    <td>Complete EAV implementation with all features</td>
                </tr>
                <tr>
                    <td><code>customer</code></td>
                    <td><span class="badge bg-warning">Partial</span></td>
                    <td>Some EAV features, but on a much smaller scale</td>
                </tr>
                <tr>
                    <td><code>customer_address</code></td>
                    <td><span class="badge bg-warning">Partial</span></td>
                    <td>Some EAV features, but on a much smaller scale</td>
                </tr>
                <tr>
                    <td><code>order</code></td>
                    <td><span class="badge bg-secondary">Rudimentary</span></td>
                    <td>Has increment model from EAV framework, not much else</td>
                </tr>
                <tr>
                    <td><code>invoice</code></td>
                    <td><span class="badge bg-secondary">Rudimentary</span></td>
                    <td>Has increment model, pretty much nothing left from EAV</td>
                </tr>
                <tr>
                    <td><code>creditmemo</code></td>
                    <td><span class="badge bg-secondary">Rudimentary</span></td>
                    <td>Pretty much nothing left from EAV</td>
                </tr>
                <tr>
                    <td><code>shipment</code></td>
                    <td><span class="badge bg-secondary">Rudimentary</span></td>
                    <td>Pretty much nothing left from EAV</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h3>Catalog Module vs Eav Module</h3>

<div class="directory-card">
    <div class="key-point">
        <strong>Important Distinction:</strong> Many EAV features are developed in the <code>Magento_Catalog</code> module rather than in <code>Magento_Eav</code>.
    </div>
    
    <p class="mt-3">For example, the celebrated <strong>multi-scope functionality</strong> of EAV attributes is a core feature of the EAV framework, however it is fully implemented in the Catalog module.</p>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Consequence:</strong> Customer's attributes will have problems with multi-scoped values. Out of the box, all customer's attributes are global (and static).
    </div>
    
    <h4 class="mt-3">Verify Customer Attributes:</h4>
    <pre><code>SELECT attribute_id, attribute_code, backend_type, backend_table 
FROM eav_attribute 
WHERE entity_type_id=1;</code></pre>
</div>

<h2>2. Attribute Sets</h2>

<div class="directory-card">
    <p>Attribute sets are groups of attributes. See <a href="cert-topic-3-01.php">Topic 3.01</a> for comprehensive coverage of attribute sets.</p>
    
    <h4>Key Points:</h4>
    <ul>
        <li>Stored in <code>eav_attribute_set</code> table</li>
        <li>Contain attribute groups</li>
        <li>Allow different products to have different attributes</li>
        <li>Can be created via admin or programmatically</li>
    </ul>
</div>

<h2>3. Attributes</h2>

<div class="directory-card">
    <h3><i class="fas fa-tag"></i> Attribute Storage</h3>
    <p>Each <code>eav_attribute</code> has a lot of information associated with it, besides its values. That information can be generic or entity type specific.</p>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Information Type</th>
                    <th>Storage Table</th>
                    <th>Applies To</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Generic information</td>
                    <td><code>eav_attribute</code></td>
                    <td>All attributes</td>
                </tr>
                <tr>
                    <td>Category/Product specific</td>
                    <td><code>catalog_eav_attribute</code></td>
                    <td>Products and categories</td>
                </tr>
                <tr>
                    <td>Customer specific</td>
                    <td><code>customer_eav_attribute</code></td>
                    <td>Customers and customer addresses</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h3>Creating Attributes</h3>

<div class="directory-card">
    <p>While it is possible to add attributes via an admin interface, we should try to do that <strong>programmatically via a Data Patch</strong>.</p>
    
    <div class="success-box">
        <strong>✅ Best Practice:</strong> Attributes added through the admin panel will only be available in a single copy of the database, while those added by a Data Patch will be reproduced every time a new database is deployed.
    </div>
    
    <h4 class="mt-3">Further Reading:</h4>
    <ul>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/add-attributes/" target="_blank">How to Add a New Product Attribute</a></li>
        <li>Adding Customer EAV Attribute for Backend Only</li>
    </ul>
</div>

<h3>Three Important Attribute Models</h3>

<div class="directory-card">
    <p>Attributes have their own properties which define an attribute's behavior. Three models are of great importance:</p>
    <ol>
        <li><strong>Frontend Model</strong> - Formats/adjusts value on frontend</li>
        <li><strong>Source Model</strong> - Provides list of acceptable options</li>
        <li><strong>Backend Model</strong> - Controls how value is saved to database</li>
    </ol>
</div>

<h2>Frontend Model</h2>

<div class="directory-card">
    <h3><i class="fas fa-eye"></i> Purpose</h3>
    <p><strong>Formats or adjusts the value</strong> of the attribute on the frontend.</p>
    
    <h4>Implementation:</h4>
    <p>The value of the attribute's <code>frontend_model</code> property must be set to a class that:</p>
    <ul>
        <li>Implements <code>Magento\Eav\Model\Entity\Attribute\Frontend\FrontendInterface</code></li>
        <li>OR extends <code>Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend</code> (more meaningful)</li>
    </ul>
    
    <h4>Key Method:</h4>
    <pre><code>public function getValue(\Magento\Framework\DataObject $object)
{
    $value = $object->getData($this->getAttribute()->getAttributeCode());
    // Format or adjust the value here
    return $value;
}</code></pre>
    
    <div class="key-point mt-3">
        <strong>Main Purpose:</strong> The main purpose of the frontend model is to render an attribute on the storefront, on the product view page.
    </div>
</div>

<h2>Source Model</h2>

<div class="directory-card">
    <h3><i class="fas fa-list"></i> Purpose</h3>
    <p><strong>Provides a list of acceptable options</strong> for an attribute. The most basic example would be boolean options.</p>
    
    <div class="key-point">
        <strong>Main Purpose:</strong> Provide options for select-type attributes (select and multiselect).
    </div>
</div>

<h3>Source Model Implementation</h3>

<div class="directory-card">
    <p>A source model must:</p>
    <ul>
        <li>Implement <code>\Magento\Eav\Model\Entity\Attribute\Source\SourceInterface</code></li>
        <li>OR extend <code>\Magento\Eav\Model\Entity\Attribute\Source\AbstractSource</code></li>
    </ul>
    
    <h4>Native Implementations:</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Class</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>Magento\Eav\Model\Entity\Attribute\Source\Boolean</code></td>
                    <td>Provides options for boolean dropdowns (Yes/No)</td>
                </tr>
                <tr>
                    <td><code>Magento\Eav\Model\Entity\Attribute\Source\Table</code></td>
                    <td>Used very often, provides option values from database</td>
                </tr>
                <tr>
                    <td><code>Magento\Eav\Model\Entity\Attribute\Source\Config</code></td>
                    <td>Allows you to specify options in config</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h3>Catalog-Specific Source Model Methods</h3>

<div class="directory-card">
    <p>For <strong>catalog entities</strong>, a source model may implement additional methods:</p>
    
    <ul>
        <li><code>getFlatColumns()</code> - Used in the indexing process</li>
        <li><code>addValueSortToCollection()</code> - Allows custom logic for sorting by this attribute</li>
    </ul>
    
    <h4>Reference Implementation:</h4>
    <div class="directory-path">Magento\Catalog\Model\Product\Attribute\Source\Status</div>
</div>

<h2>Backend Model</h2>

<div class="directory-card">
    <h3><i class="fas fa-database"></i> Purpose</h3>
    <p><strong>Controls how the attribute's value is saved</strong> to the database.</p>
    
    <h4>Implementation:</h4>
    <p>Backend model must:</p>
    <ul>
        <li>Implement <code>\Magento\Eav\Model\Entity\Attribute\Backend\BackendInterface</code></li>
        <li>OR extend <code>\Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend</code> (more meaningful)</li>
    </ul>
</div>

<h3>Backend Model Methods</h3>

<div class="directory-card">
    <h4>Methods of Interest:</h4>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Method</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>afterLoad()</code></td>
                    <td>React after entity is loaded</td>
                </tr>
                <tr>
                    <td><code>beforeSave()</code></td>
                    <td>Modify data before saving</td>
                </tr>
                <tr>
                    <td><code>afterSave()</code></td>
                    <td>Additional operations after save</td>
                </tr>
                <tr>
                    <td><code>validate()</code></td>
                    <td>Implement backend-level validation for attribute saving</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Important:</strong> Usually you want to ensure that <code>AbstractBackend::validate()</code> is executed, since it has some valuable logic.
    </div>
    
    <h4 class="mt-3">Example:</h4>
    <div class="directory-path">Magento\Eav\Model\Attribute\Backend\Data\Boolean</div>
</div>

<h2>4. Attribute Values</h2>

<div class="directory-card">
    <h3><i class="fas fa-th"></i> Storage Tables</h3>
    <p>Values are stored in a set of tables, <strong>specific per entity type</strong>.</p>
    
    <h4>Example for catalog_product:</h4>
    <pre><code>SHOW TABLES LIKE 'catalog_product_entity_%';

+-------------------------------------------------------+
| Tables_in_magento (catalog_product_entity_%)         |
+-------------------------------------------------------+
| catalog_product_entity_datetime                       |
| catalog_product_entity_decimal                        |
| catalog_product_entity_gallery                        |
| catalog_product_entity_int                            |
| catalog_product_entity_media_gallery                  |
| catalog_product_entity_media_gallery_value            |
| catalog_product_entity_media_gallery_value_to_entity  |
| catalog_product_entity_media_gallery_value_video      |
| catalog_product_entity_text                           |
| catalog_product_entity_tier_price                     |
| catalog_product_entity_varchar                        |
+-------------------------------------------------------+</code></pre>
</div>

<h3>Value Table Structure</h3>

<div class="directory-card">
    <p>Each value table stores:</p>
    <ul>
        <li><code>entity_id</code> - The entity (product, category, etc.) ID</li>
        <li><code>attribute_id</code> - The attribute ID</li>
        <li><code>value</code> - The actual value</li>
        <li><code>store_id</code> - Indicator for scope</li>
    </ul>
    
    <div class="key-point mt-3">
        <strong>Important:</strong> The <code>store_id</code>'s interpretation depends on the attribute's scope: global, website, or store.
    </div>
</div>

<h3>Understanding Scope with store_id</h3>

<div class="directory-card">
    <h4>Example Scenario:</h4>
    <p>Say there is a record with:</p>
    <ul>
        <li><code>attribute_id = 25</code></li>
        <li><code>store_id = 4</code></li>
        <li><code>value = 133</code></li>
    </ul>
    
    <h4 class="mt-3">Step-by-Step Interpretation:</h4>
    <ol>
        <li>Check the scope of attribute with id 25 in <code>eav_attribute</code>, <code>is_global</code> field</li>
        <li>Assume <code>is_global = 2</code>, which means <strong>website scope</strong></li>
        <li>So the attribute has different values on different websites</li>
        <li>Its value for website with id 4 equals 133</li>
    </ol>
    
    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>is_global Value</th>
                    <th>Scope Type</th>
                    <th>store_id Interpretation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0</td>
                    <td>Store View</td>
                    <td>Refers to store_id in store table</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Global</td>
                    <td>Always 0 (applies to all stores)</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Website</td>
                    <td>Refers to website_id in store_website table</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h2>EAV Value Storage by Type</h2>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #0d6efd;">
            <h4><i class="fas fa-font"></i> varchar Tables</h4>
            <p><strong>Storage:</strong> <code>*_entity_varchar</code></p>
            <p><strong>Data Type:</strong> Short text (up to 255 characters)</p>
            <p><strong>Example:</strong> SKU, name, short description</p>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #198754;">
            <h4><i class="fas fa-align-left"></i> text Tables</h4>
            <p><strong>Storage:</strong> <code>*_entity_text</code></p>
            <p><strong>Data Type:</strong> Long text</p>
            <p><strong>Example:</strong> Description, custom options</p>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #ffc107;">
            <h4><i class="fas fa-hashtag"></i> int Tables</h4>
            <p><strong>Storage:</strong> <code>*_entity_int</code></p>
            <p><strong>Data Type:</strong> Integer values</p>
            <p><strong>Example:</strong> Status, visibility, category IDs</p>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #dc3545;">
            <h4><i class="fas fa-dollar-sign"></i> decimal Tables</h4>
            <p><strong>Storage:</strong> <code>*_entity_decimal</code></p>
            <p><strong>Data Type:</strong> Decimal/float values</p>
            <p><strong>Example:</strong> Price, weight, special price</p>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #6f42c1;">
            <h4><i class="fas fa-calendar"></i> datetime Tables</h4>
            <p><strong>Storage:</strong> <code>*_entity_datetime</code></p>
            <p><strong>Data Type:</strong> Date and time values</p>
            <p><strong>Example:</strong> Special price from/to dates, news from date</p>
        </div>
    </div>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>EAV Purpose:</strong> Flexible attributes, different properties per entity, extend data architecture</li>
        <li><strong>Four Components:</strong> Entity types, attribute sets, attributes, attribute values</li>
        <li><strong>Entity Type Table:</strong> eav_entity_type</li>
        <li><strong>Fully-Fledged EAV:</strong> Only catalog_product and catalog_category</li>
        <li><strong>Customer Attributes:</strong> Partial EAV support, mostly global scope</li>
        <li><strong>Multi-scope:</strong> Implemented in Magento_Catalog, not Magento_Eav</li>
        <li><strong>Attribute Info Tables:</strong> eav_attribute (generic), catalog_eav_attribute (catalog), customer_eav_attribute (customer)</li>
        <li><strong>Create Attributes:</strong> Use Data Patches, not admin (for deployment)</li>
        <li><strong>Frontend Model:</strong> Formats value on frontend, implements FrontendInterface, getValue() method</li>
        <li><strong>Source Model:</strong> Provides options for select/multiselect, implements SourceInterface</li>
        <li><strong>Backend Model:</strong> Controls save to database, implements BackendInterface, afterLoad/beforeSave/afterSave/validate methods</li>
        <li><strong>Common Source Models:</strong> Boolean, Table, Config</li>
        <li><strong>Value Tables:</strong> *_entity_varchar, *_entity_int, *_entity_decimal, *_entity_text, *_entity_datetime</li>
        <li><strong>Value Table Columns:</strong> entity_id, attribute_id, value, store_id</li>
        <li><strong>store_id Interpretation:</strong> Depends on is_global (0=store, 1=global, 2=website)</li>
        <li><strong>Scope Values:</strong> 0=Store View, 1=Global, 2=Website</li>
        <li><strong>Custom EAV Entity:</strong> Very difficult, use extension attributes instead</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/development/components/add-attributes/" target="_blank">How to Add a New Product Attribute</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/attributes/" target="_blank">EAV and Extension Attributes</a></li>
        <li><a href="cert-topic-3-01.php">Topic 3.01: Attribute Sets & Attributes</a></li>
        <li><a href="cert-topic-3-02.php">Topic 3.02: Types of Attributes</a></li>
    </ul>
</div>
