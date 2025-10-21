<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding Models, Resource Models, Collections, and Repositories is fundamental to working with data in Magento. This is one of the most important topics for the exam and daily development.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> ORM Objects Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((ORM Objects))
    Models
      Store data
      Getters/setters
      Model/ directory
      One row
    Resource Models
      Database operations
      save/load/delete
      Model/ResourceModel/
      Custom queries
    Collections
      Load multiple models
      addFieldToFilter
      join
      Iterable
    Repositories
      API wrapper
      save/getById/getList/delete
      No state
      Interface
    </div>
</div>

<h2>Four Types of ORM Classes</h2>

<div class="directory-card">
    <p>There are <strong>four types of classes</strong> related to loading and storing data in Magento:</p>
    <ol>
        <li><strong>Models</strong> - Store data (one row)</li>
        <li><strong>Resource Models</strong> - Database operations (save/load/delete)</li>
        <li><strong>Collections</strong> - Load multiple models</li>
        <li><strong>Repositories</strong> - API wrapper for data operations</li>
    </ol>
</div>

<h2>Models</h2>

<div class="directory-card">
    <h3><i class="fas fa-cube"></i> What are Models?</h3>
    <p>Models are classes with getters and setters to store data. An instantiated class would represent <strong>one row</strong> in the database.</p>
    
    <div class="key-point">
        <strong>Location:</strong> Stored directly in the module's <code>Model/</code> directory
    </div>
    
    <h4>Example:</h4>
    <div class="directory-path">Magento\Cms\Model\Page</div>
</div>

<h3>Model Initialization</h3>

<div class="directory-card">
    <p>This model is initialized with a reference to the <strong>Resource Model</strong>.</p>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Model;

use Magento\Framework\Model\AbstractModel;

class CustomEntity extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Vendor\Module\Model\ResourceModel\CustomEntity::class);
    }
}</code></pre>
</div>

<h3>Data Storage in Models</h3>

<div class="directory-card">
    <p>Models that extend <code>\Magento\Framework\Model\AbstractModel</code> will thus extend <code>\Magento\Framework\DataObject</code>. This means that the data is stored in the class' <code>$_data</code> property.</p>
</div>

<h3>Magic Getters and Setters</h3>

<div class="directory-card">
    <p>You can convert snake-case notation to camel-case notation and use magic methods:</p>
    
    <pre><code>// Column name: discount_amount
// Magic getter
$discountAmount = $model->getDiscountAmount();

// Magic setter
$model->setDiscountAmount(100);

// OR use getData/setData
$discountAmount = $model->getData('discount_amount');
$model->setData('discount_amount', 100);</code></pre>
</div>

<h3>Explicit Getters and Setters (Best Practice)</h3>

<div class="directory-card">
    <p>Instead of magic getters/setters, it's recommended to build out explicit methods:</p>
    
    <pre><code>public function getDiscountAmount(): float
{
    return (float)$this->getData('discount_amount');
}

public function setDiscountAmount(float $discountAmount): void
{
    $this->setData('discount_amount', $discountAmount);
}</code></pre>
    
    <h4>Advantages:</h4>
    <ul>
        <li>✅ <strong>Type hints</strong> - reduces unnecessary conversions (float to int, etc.)</li>
        <li>✅ <strong>Mockable</strong> - can mock these methods in unit tests</li>
        <li>✅ <strong>Custom handling</strong> - can customize how data is handled (e.g., json_encode in setter)</li>
    </ul>
</div>

<h2>Resource Models</h2>

<div class="directory-card">
    <h3><i class="fas fa-server"></i> What are Resource Models?</h3>
    <p>Resource models are classes responsible for <strong>saving and loading data</strong>. They handle direct database operations.</p>
    
    <div class="key-point">
        <strong>Location:</strong> Stored in the module's <code>Model/ResourceModel/</code> directory
    </div>
    
    <h4>Example:</h4>
    <div class="directory-path">Magento\Cms\Model\ResourceModel\Page</div>
</div>

<h3>Resource Model Inheritance</h3>

<div class="directory-card">
    <p>These classes almost always inherit <code>\Magento\Framework\Model\ResourceModel\Db\AbstractDb</code>.</p>
    
    <h4>Primary Methods:</h4>
    <ul>
        <li><code>load()</code> - Load data into model</li>
        <li><code>save()</code> - Save model data to database</li>
        <li><code>delete()</code> - Delete model data from database</li>
    </ul>
</div>

<h3>Resource Model Configuration</h3>

<div class="directory-card">
    <p>Resource models are initialized with:</p>
    <ul>
        <li>The <strong>table name</strong> (as found in db_schema.xml)</li>
        <li>The name of the <strong>primary key column</strong></li>
    </ul>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomEntity extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('vendor_module_custom_entity', 'entity_id');
        //       table name                        primary key
    }
}</code></pre>
</div>

<h3>Custom Queries in Resource Models</h3>

<div class="directory-card">
    <p>The resource model is the place to put <strong>any custom selects</strong> (using the Magento ORM, and NOT writing direct SQL).</p>
    
    <h4>Example: Get Count with Custom Query</h4>
    
    <pre><code>public function getAvailableToTranslate(string $language): int
{
    $select = $this->getConnection()->select();
    $select->from($this->getMainTable(), 'COUNT(id)');
    $select->where('needs_translation = ?', true);
    $select->where('language = ?', $language);
    
    return (int)$this->getConnection()->fetchOne($select);
}</code></pre>
    
    <div class="success-box mt-3">
        <strong>Performance Benefit:</strong> This is often much more efficient than loading rows with a collection and iterating/tallying up the results.
    </div>
</div>

<h3>Fetch Methods</h3>

<div class="directory-card">
    <p>Various fetch methods available for different result types:</p>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Method</th>
                    <th>Returns</th>
                    <th>Use Case</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>fetchOne()</code></td>
                    <td>Single value</td>
                    <td>Get one result (e.g., COUNT, single column value)</td>
                </tr>
                <tr>
                    <td><code>fetchAll()</code></td>
                    <td>Array of all rows</td>
                    <td>Get all rows as associative arrays</td>
                </tr>
                <tr>
                    <td><code>fetchCol()</code></td>
                    <td>Array of values from one column</td>
                    <td>Get all values from a single column</td>
                </tr>
                <tr>
                    <td><code>fetchPairs()</code></td>
                    <td>Key-value pairs</td>
                    <td>Get first column as key, second as value</td>
                </tr>
                <tr>
                    <td><code>fetchRow()</code></td>
                    <td>Single row as array</td>
                    <td>Get one row as associative array</td>
                </tr>
                <tr>
                    <td><code>fetchAssoc()</code></td>
                    <td>Associative array</td>
                    <td>Get rows with first column as array key</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h2>Collections</h2>

<div class="directory-card">
    <h3><i class="fas fa-layer-group"></i> What are Collections?</h3>
    <p>Collections load <strong>multiple models</strong>. They handle loading multiple rows for a database entity or table.</p>
    
    <div class="key-point">
        <strong>Location:</strong> Stored in <code>Model/ResourceModel/[ModelName]/Collection.php</code>
    </div>
    
    <h4>Example:</h4>
    <div class="directory-path">Magento\Cms\Model\ResourceModel\Page\Collection</div>
</div>

<h3>Collection Initialization</h3>

<div class="directory-card">
    <p>This class is initialized with a reference to the <strong>Model</strong> and <strong>Resource Model</strong>.</p>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Model\ResourceModel\CustomEntity;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Vendor\Module\Model\CustomEntity::class,
            \Vendor\Module\Model\ResourceModel\CustomEntity::class
        );
    }
}</code></pre>
</div>

<h3>Collections Store State</h3>

<div class="directory-card">
    <div class="warning-box">
        <strong>⚠️ Important:</strong> Collections store state. If you wish to utilize a collection in one of your classes, you must use a <strong>Factory</strong> and instantiate that collection instead of injecting the collection class itself.
    </div>
    
    <pre><code>// DON'T inject the collection directly
// DO inject the CollectionFactory

public function __construct(
    \Magento\Cms\Model\ResourceModel\Page\CollectionFactory $collectionFactory
) {
    $this->collectionFactory = $collectionFactory;
}

public function getPages()
{
    $collection = $this->collectionFactory->create(); // Instantiate fresh
    return $collection;
}</code></pre>
</div>

<h3>Collections are Iterable</h3>

<div class="directory-card">
    <p>Because collections implement the <code>\IteratorAggregate</code> interface, you can loop through a collection in a <code>foreach()</code> method.</p>
    
    <pre><code>$collection = $this->collectionFactory->create();
$collection->addFieldToFilter('status', 1);

foreach ($collection as $item) {
    echo $item->getName();
}</code></pre>
</div>

<h3>Common Collection Methods</h3>

<div class="directory-card">
    <h4>1. addFieldToFilter()</h4>
    <p>This is the equivalent of adding a <code>WHERE</code> clause to a SQL select.</p>
    
    <pre><code>$collection->addFieldToFilter('product_id', ['neq' => $productId]);
// SQL: SELECT * FROM table_name WHERE product_id &lt;&gt; 4;</code></pre>
    
    <h5>Common Conditionals:</h5>
    <ul>
        <li><code>['eq' => $value]</code> - Equal to</li>
        <li><code>['neq' => $value]</code> - Not equal to</li>
        <li><code>['gt' => $value]</code> - Greater than</li>
        <li><code>['gteq' => $value]</code> - Greater than or equal</li>
        <li><code>['lt' => $value]</code> - Less than</li>
        <li><code>['lteq' => $value]</code> - Less than or equal</li>
        <li><code>['like' => '%value%']</code> - LIKE pattern</li>
        <li><code>['in' => [$val1, $val2]]</code> - IN array</li>
        <li><code>['nin' => [$val1, $val2]]</code> - NOT IN array</li>
        <li><code>['null' => true]</code> - IS NULL</li>
        <li><code>['notnull' => true]</code> - IS NOT NULL</li>
    </ul>
</div>

<div class="directory-card">
    <h4>2. addAttributeToFilter()</h4>
    <p>On EAV entities (<code>Magento\Eav\Model\Entity\Collection\AbstractCollection</code>): this is the same as <code>addFieldToFilter()</code> for EAV-enabled entities. If you call either method, you get the same result.</p>
    
    <pre><code>// For EAV entities (products, categories, customers)
$collection->addAttributeToFilter('status', 1);</code></pre>
</div>

<div class="directory-card">
    <h4>3. join()</h4>
    <p>Joins in another table.</p>
    
    <pre><code>$collection->join(
    ['table_alias' => 'table_name'],
    'main_table.product_id = table_alias.product_id',
    ['column_a']
);

// Results in:
// SELECT *, table_alias.column_a 
// FROM original_table AS main_table
// INNER JOIN table_name AS table_alias 
//     ON main_entity.product_id = table_alias.product_id;</code></pre>
    
    <div class="key-point mt-3">
        <strong>Note:</strong> <code>main_table</code> is the default alias with collections.
    </div>
</div>

<div class="directory-card">
    <h4>4. load()</h4>
    <p>This fetches the results of the collection. Data is loaded from the database and then models are hydrated with said data.</p>
    
    <pre><code>$collection->load(); // Executes the query and loads data</code></pre>
</div>

<div class="directory-card">
    <h4>5. getSize()</h4>
    <p>This creates a copy of the select, strips out the columns, and uses the COUNT method.</p>
    
    <pre><code>$count = $collection->getSize(); // Returns count of items</code></pre>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Note:</strong> If you are making many customizations to collections, such as adding groups, you will likely have problems with this method and would want to use an after plugin to alter the results of this select.
    </div>
</div>

<h2>Repositories</h2>

<div class="directory-card">
    <h3><i class="fas fa-code-branch"></i> What are Repositories?</h3>
    <p>Repositories handle the <strong>primary actions</strong> that happen to a database table. They are often a wrapper for the Resource Model.</p>
    
    <div class="key-point">
        <strong>Key Concept:</strong> Repositories do not store state. They are essentially a wrapper to ease the effort of data operations.
    </div>
</div>

<h3>Repository Methods</h3>

<div class="directory-card">
    <p>Repositories usually have:</p>
    <ul>
        <li><code>save()</code> - Save a model</li>
        <li><code>getById()</code> - Get one row/model from the database</li>
        <li><code>getList()</code> - Accepts a SearchCriteria class, returns multiple items</li>
        <li><code>delete()</code> - Delete a model</li>
    </ul>
</div>

<h3>Repository Structure</h3>

<div class="directory-card">
    <p>Repositories do not inherit another class. They represent more of an idea (unlike models, resource models, or collections).</p>
    
    <h4>Common Injected Classes:</h4>
    <ul>
        <li>Model's Factory</li>
        <li>Resource Model</li>
        <li>Collection Factory</li>
        <li>SearchResults Factory</li>
    </ul>
    
    <h4>Example:</h4>
    <div class="directory-path">Magento\Cms\Model\BlockRepository</div>
</div>

<h3>Repository Example</h3>

<div class="directory-card">
    <pre><code>&lt;?php
namespace Vendor\Module\Model;

use Vendor\Module\Api\CustomEntityRepositoryInterface;
use Vendor\Module\Model\CustomEntityFactory;
use Vendor\Module\Model\ResourceModel\CustomEntity as ResourceModel;

class CustomEntityRepository implements CustomEntityRepositoryInterface
{
    private $entityFactory;
    private $resourceModel;
    
    public function __construct(
        CustomEntityFactory $entityFactory,
        ResourceModel $resourceModel
    ) {
        $this->entityFactory = $entityFactory;
        $this->resourceModel = $resourceModel;
    }
    
    public function getById(int $id)
    {
        $entity = $this->entityFactory->create();
        $this->resourceModel->load($entity, $id);
        
        if (!$entity->getId()) {
            throw new NoSuchEntityException(__('Entity not found'));
        }
        
        return $entity;
    }
    
    public function save($entity)
    {
        $this->resourceModel->save($entity);
        return $entity;
    }
    
    public function delete($entity)
    {
        $this->resourceModel->delete($entity);
        return true;
    }
}</code></pre>
</div>

<h3>Why Repository Wraps Resource Model</h3>

<div class="directory-card">
    <p>Repositories are often a wrapper for the Resource Model. The latter has <strong>no way to instantiate a model</strong>: the repository creates the model (via the model's factory) and then passes it to the Resource Model's <code>load()</code> method.</p>
</div>

<h3>Repository Interface Requirement</h3>

<div class="directory-card">
    <div class="warning-box">
        <strong>⚠️ Important:</strong> If you modify a repository, make sure that the output stays the same. For example, if you want to utilize a different model, make sure this new model implements the appropriate interface (e.g., <code>ProductInterface</code>). This is because many areas of Magento rely on the repository returning the correct interface.
    </div>
</div>

<h3>Repositories as API Endpoints</h3>

<div class="directory-card">
    <p>Repositories are commonly an <strong>API Endpoint</strong> (the service class in a webapi.xml file).</p>
    
    <p>For this situation, you would:</p>
    <ol>
        <li>Create an interface that the repository then implements</li>
        <li>Declare the route and resources required in webapi.xml</li>
    </ol>
</div>

<h2>Repository getList() vs Collection</h2>

<div class="directory-card">
    <h3>How do they differ?</h3>
    
    <p>For a <strong>normal model</strong> (like a CMS page or an order), there would be <strong>no difference</strong>.</p>
    
    <div class="warning-box mt-3">
        <strong>⚠️ For EAV Entities (products, categories, customers):</strong> There is a big difference:
        <ul>
            <li><strong>Repository getList():</strong> ALL attributes are loaded</li>
            <li><strong>Collection:</strong> Only the attributes you select are loaded</li>
        </ul>
    </div>
    
    <div class="key-point mt-3">
        <strong>Performance Impact:</strong> If you are loading many products, loading all attributes can be a major performance slowdown. With collections, you can select which attributes you want to be loaded.
    </div>
</div>

<h3>Why This Option Exists</h3>

<div class="directory-card">
    <p>Originally, a repository was designed for use through an API: APIs are less concerned about speed and more about how much information can be returned.</p>
    
    <div class="success-box mt-3">
        <strong>Best Practice:</strong> When iterating through a list of products and you only use a few attributes, use a collection with selected attributes for better performance.
    </div>
</div>

<h2>Responsibilities Summary</h2>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #0d6efd;">
            <h4><i class="fas fa-cube"></i> Models</h4>
            <p><strong>Responsibility:</strong> Store data</p>
            <ul>
                <li>Once loaded from database (hydrated), ready for use</li>
                <li>Data stored in <code>$_data</code> property</li>
                <li>Getters and setters</li>
                <li>Magic methods available</li>
                <li>Represents one row</li>
            </ul>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #198754;">
            <h4><i class="fas fa-server"></i> Resource Models</h4>
            <p><strong>Responsibility:</strong> Handle database operations</p>
            <ul>
                <li>Save, load, delete by default</li>
                <li>Custom queries for performance</li>
                <li>Direct database interaction</li>
                <li>Hydrates models with data</li>
                <li>Uses fetch methods</li>
            </ul>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #ffc107;">
            <h4><i class="fas fa-layer-group"></i> Collections</h4>
            <p><strong>Responsibility:</strong> Load multiple rows</p>
            <ul>
                <li>Load multiple models</li>
                <li>Iterable (foreach)</li>
                <li>addFieldToFilter, join, load, getSize</li>
                <li>Store state (use Factory)</li>
                <li>For EAV: select specific attributes</li>
            </ul>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #dc3545;">
            <h4><i class="fas fa-code-branch"></i> Repositories</h4>
            <p><strong>Responsibility:</strong> API wrapper</p>
            <ul>
                <li>save, getById, getList, delete</li>
                <li>Wraps Resource Model</li>
                <li>Do not store state</li>
                <li>API endpoints</li>
                <li>For EAV: loads ALL attributes</li>
            </ul>
        </div>
    </div>
</div>

<h2>How They Relate to One Another</h2>

<div class="directory-card">
    <ul>
        <li>A <strong>collection</strong> loads a list of <strong>models</strong></li>
        <li>A <strong>resource model</strong> directly interacts with the database</li>
        <li>A <strong>resource model</strong> handles loading (hydrating) a model class that is already instantiated</li>
        <li>A <strong>model</strong> stores data - get() and set() are used frequently</li>
        <li>A <strong>repository</strong> creates models and uses resource models to load/save data</li>
        <li><strong>Collections</strong> implement <code>\IteratorAggregate</code> so you can use foreach()</li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>Models:</strong> Model/ directory, store data, one row, getters/setters</li>
        <li><strong>Resource Models:</strong> Model/ResourceModel/ directory, database operations, inherit AbstractDb</li>
        <li><strong>Collections:</strong> Model/ResourceModel/[ModelName]/Collection.php, load multiple models, iterable</li>
        <li><strong>Repositories:</strong> Wrapper, save/getById/getList/delete, no state, API endpoints</li>
        <li><strong>Magic methods:</strong> Convert snake_case to camelCase (discount_amount → getDiscountAmount())</li>
        <li><strong>Explicit methods preferred:</strong> Type hints, mockable, custom handling</li>
        <li><strong>Collections store state:</strong> Use CollectionFactory, not direct injection</li>
        <li><strong>addFieldToFilter:</strong> WHERE clause equivalent</li>
        <li><strong>addAttributeToFilter:</strong> Same as addFieldToFilter for EAV entities</li>
        <li><strong>main_table:</strong> Default alias in collections</li>
        <li><strong>Fetch methods:</strong> fetchOne, fetchAll, fetchCol, fetchPairs, fetchRow, fetchAssoc</li>
        <li><strong>Repository vs Collection (EAV):</strong> Repository loads ALL attributes, Collection loads selected</li>
        <li><strong>Performance:</strong> Collections with selected attributes better for EAV</li>
        <li><strong>IteratorAggregate:</strong> Collections can be used in foreach()</li>
        <li><strong>Repository wraps Resource Model:</strong> Creates model via factory, passes to resource model</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/development/components/models/" target="_blank">Models</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/repositories/" target="_blank">Repositories</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/best-practices/phpstorm/code-generation/" target="_blank">Code Generation (Factories)</a></li>
    </ul>
</div>
