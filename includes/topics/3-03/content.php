<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Declarative schema revolutionized database management in Magento 2.3+. Understanding how to use db_schema.xml to alter database tables is essential for modern Magento development and exam success.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> DB Schema Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((db_schema.xml))
    Benefits
      Easier upgrades
      Single source of truth
      XML based
      Available since 2.3
    Tables
      Add table
      Modify table
      Remove table
    Columns
      Add column
      Modify column
      Rename column
      Delete column
    Constraints
      Indexes
      Foreign keys
      Primary keys
    Patches
      Data patches
      Schema patches
      Revertable
    </div>
</div>

<h2>Declarative Schema Overview</h2>

<div class="directory-card">
    <p><strong>Declarative schema</strong> places the structure of the database into XML. This provides the benefit of making upgrades easier in that the instructions for the upgrade come from one source.</p>
    
    <div class="key-point">
        <strong>Key Benefit:</strong> Before declarative schema, the install/upgrade scripts were very clunky and error-prone. It was sometimes difficult to determine what the final table's structure should be, as that could be determined through multiple versions of upgrades.
    </div>
</div>

<h3>Availability</h3>

<div class="directory-card">
    <div class="success-box">
        <strong>✅ DB Schema is available as of Magento 2.3</strong>
    </div>
    
    <p>This configuration is found in your module's <code>etc/db_schema.xml</code> configuration file.</p>
</div>

<h3>XSD Schema Location</h3>

<div class="directory-card">
    <p>The XSD file for db_schema.xml files is found in:</p>
    <div class="directory-path">vendor/magento/framework/Setup/Declaration/Schema/etc/schema.xsd</div>
    <p>This is where you can see all the available options.</p>
</div>

<h2>Working with Tables</h2>

<div class="directory-card">
    <h3><i class="fas fa-table"></i> Table Element</h3>
    <p>The <code>&lt;table&gt;</code> element identifies the table that is created (or modified).</p>
    
    <h4>Required Attributes:</h4>
    <ul>
        <li><strong>name</strong>: Determines the name of the table in the database</li>
    </ul>
    
    <div class="key-point mt-3">
        <strong>Merging:</strong> The <code>name</code> attribute is used for merging table configuration across multiple db_schema.xml files.
    </div>
</div>

<h3>Adding a Table</h3>

<div class="directory-card">
    <p>To add a table to the database, specify its configuration in <code>db_schema.xml</code>.</p>
    
    <div class="directory-path">etc/db_schema.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;schema xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Setup/Declaration/Schema/etc/schema.xsd"&gt;
    &lt;table name="vendor_module_entity" resource="default" engine="innodb" comment="Custom Entity Table"&gt;
        &lt;column xsi:type="int" name="entity_id" unsigned="true" nullable="false" 
                identity="true" comment="Entity ID"/&gt;
        &lt;column xsi:type="varchar" name="name" nullable="false" length="255" comment="Name"/&gt;
        &lt;column xsi:type="timestamp" name="created_at" on_update="false" nullable="false" 
                default="CURRENT_TIMESTAMP" comment="Created At"/&gt;
        
        &lt;constraint xsi:type="primary" referenceId="PRIMARY"&gt;
            &lt;column name="entity_id"/&gt;
        &lt;/constraint&gt;
    &lt;/table&gt;
&lt;/schema&gt;</code></pre>
</div>

<h3>Removing a Table</h3>

<div class="directory-card">
    <p>To remove a table, <strong>remove the table from where it is declared</strong> in db_schema.xml.</p>
    
    <div class="warning-box">
        <strong>⚠️ Important:</strong> You shouldn't modify core files to remove a table.
    </div>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Common Problem:</strong> An error will occur if a module is disabled that contains the original/core declaration for a table but another module depends on the disabled module.
    </div>
</div>

<h2>Working with Columns</h2>

<div class="directory-card">
    <h3><i class="fas fa-columns"></i> Column Element</h3>
    <p>The <code>&lt;column&gt;</code> element configures columns to be added to the database.</p>
</div>

<h3>Adding a Column</h3>

<div class="directory-card">
    <p>You can add a column into an existing Magento table. Example: adding a <code>delivery_date</code> column into the Magento quote table:</p>
    
    <div class="directory-path">etc/db_schema.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;schema xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Setup/Declaration/Schema/etc/schema.xsd"&gt;
    &lt;table name="quote"&gt;
        &lt;column xsi:type="date" name="delivery_date" nullable="true" comment="Delivery Date"/&gt;
    &lt;/table&gt;
&lt;/schema&gt;</code></pre>
</div>

<h3>Required Column Attributes</h3>

<div class="directory-card">
    <p>Each column must have:</p>
    <ul>
        <li><strong>name</strong>: The name of the column</li>
        <li><strong>xsi:type</strong>: The type of column</li>
    </ul>
    
    <h4>Available Column Types:</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Example</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>boolean</code></td>
                    <td>True/False value</td>
                    <td><code>xsi:type="boolean"</code></td>
                </tr>
                <tr>
                    <td><code>date</code></td>
                    <td>Date value</td>
                    <td><code>xsi:type="date"</code></td>
                </tr>
                <tr>
                    <td><code>int</code></td>
                    <td>Integer value</td>
                    <td><code>xsi:type="int"</code></td>
                </tr>
                <tr>
                    <td><code>text</code></td>
                    <td>Long text</td>
                    <td><code>xsi:type="text"</code></td>
                </tr>
                <tr>
                    <td><code>varchar</code></td>
                    <td>Short text with length</td>
                    <td><code>xsi:type="varchar" length="255"</code></td>
                </tr>
                <tr>
                    <td><code>timestamp</code></td>
                    <td>Timestamp value</td>
                    <td><code>xsi:type="timestamp"</code></td>
                </tr>
                <tr>
                    <td><code>decimal</code></td>
                    <td>Decimal/float value</td>
                    <td><code>xsi:type="decimal" precision="12" scale="4"</code></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h3>Optional Column Attributes</h3>

<div class="directory-card">
    <p>You can specify other attributes:</p>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Attribute</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>default</code></td>
                    <td>Determines the column's default value in MySQL</td>
                </tr>
                <tr>
                    <td><code>disabled</code></td>
                    <td>Removes the column from the table</td>
                </tr>
                <tr>
                    <td><code>unsigned</code></td>
                    <td>Positive and negative or just positive numbers (for integers)</td>
                </tr>
                <tr>
                    <td><code>padding</code></td>
                    <td>The size of an integer column</td>
                </tr>
                <tr>
                    <td><code>nullable</code></td>
                    <td>Whether the column can be NULL</td>
                </tr>
                <tr>
                    <td><code>identity</code></td>
                    <td>Auto-increment column</td>
                </tr>
                <tr>
                    <td><code>comment</code></td>
                    <td>Column comment in database</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h3>Renaming a Column</h3>

<div class="directory-card">
    <p>To rename a column, use the <code>onCreate="migrateDataFrom(old_column_name)"</code> attribute.</p>
    
    <pre><code>&lt;column xsi:type="int" name="new_entity_id" unsigned="true" nullable="false" 
        onCreate="migrateDataFrom(entity_id)" comment="Entity ID"/&gt;</code></pre>
    
    <div class="key-point mt-3">
        <strong>How it works:</strong> This copies data from the old column to the new column. See <code>\Magento\Framework\Setup\SchemaListener::changeColumn()</code>.
    </div>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Important:</strong> You must update your module's <code>db_schema_whitelist.json</code> to include both the old and the new columns.
    </div>
</div>

<h3>Deleting a Column</h3>

<div class="directory-card">
    <p>To delete a column, use the <code>disabled="true"</code> attribute.</p>
    
    <p><strong>Example:</strong> Remove the <code>coupon_code</code> column from the quote table:</p>
    
    <pre><code>&lt;table name="quote"&gt;
    &lt;column xsi:type="varchar" name="coupon_code" disabled="true"/&gt;
&lt;/table&gt;</code></pre>
    
    <div class="success-box mt-3">
        <strong>Note:</strong> You can use the <code>disabled</code> attribute to remove a column, constraint, index, or table from the database (or prevent it from being added).
    </div>
</div>

<h3>Modifying a Table Added by Another Module</h3>

<div class="directory-card">
    <p>You would most likely be <strong>adding a column</strong>, as removing or changing the column's name will have possible serious consequences.</p>
    
    <div class="warning-box">
        <strong>⚠️ Module Load Order:</strong> You must ensure that you have configured the module load order in your module's <code>etc/module.xml</code> file. This ensures that your module is executed after the module whose db_schema.xml file creates the original table.
    </div>
    
    <h4>Example: etc/module.xml</h4>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd"&gt;
    &lt;module name="Vendor_Module"&gt;
        &lt;sequence&gt;
            &lt;module name="Magento_Quote"/&gt;
        &lt;/sequence&gt;
    &lt;/module&gt;
&lt;/config&gt;</code></pre>
</div>

<h2>Indexes and Foreign Keys</h2>

<div class="directory-card">
    <h3><i class="fas fa-key"></i> Constraint Element</h3>
    <p>Use the <code>&lt;constraint&gt;</code> tag for indexes and foreign keys.</p>
    
    <p>There are <strong>two types</strong> of constraints in schema:</p>
    <ul>
        <li><strong>Indexes</strong> - utilize the constraint tag with column class</li>
        <li><strong>Foreign keys</strong> - specify details as attributes in the constraint tag</li>
    </ul>
</div>

<h3>Adding a Primary Key</h3>

<div class="directory-card">
    <p>Indexes utilize the <code>constraint</code> tag but have a <code>column</code> element to build the structure of the index.</p>
    
    <pre><code>&lt;constraint xsi:type="primary" referenceId="PRIMARY"&gt;
    &lt;column name="entity_id"/&gt;
&lt;/constraint&gt;</code></pre>
</div>

<h3>Adding an Index</h3>

<div class="directory-card">
    <pre><code>&lt;index referenceId="VENDOR_MODULE_ENTITY_NAME" indexType="btree"&gt;
    &lt;column name="name"/&gt;
&lt;/index&gt;</code></pre>
    
    <p class="mt-3"><strong>Unique Index:</strong></p>
    <pre><code>&lt;constraint xsi:type="unique" referenceId="VENDOR_MODULE_ENTITY_EMAIL_UNIQUE"&gt;
    &lt;column name="email"/&gt;
&lt;/constraint&gt;</code></pre>
</div>

<h3>Adding a Foreign Key</h3>

<div class="directory-card">
    <p>Foreign keys do <strong>not</strong> utilize the <code>column</code> tag but rather specify all their details as attributes in the <code>constraint</code> tag.</p>
    
    <pre><code>&lt;constraint xsi:type="foreign" 
            referenceId="VENDOR_MODULE_ENTITY_CUSTOMER_ID_CUSTOMER_ENTITY_ID" 
            table="vendor_module_entity" 
            column="customer_id" 
            referenceTable="customer_entity" 
            referenceColumn="entity_id" 
            onDelete="CASCADE"/&gt;</code></pre>
    
    <h4 class="mt-3">Foreign Key Attributes:</h4>
    <ul>
        <li><code>table</code>: The table containing the foreign key</li>
        <li><code>column</code>: The column in the table</li>
        <li><code>referenceTable</code>: The referenced table</li>
        <li><code>referenceColumn</code>: The referenced column</li>
        <li><code>onDelete</code>: Action on delete (CASCADE, SET NULL, NO ACTION)</li>
    </ul>
</div>

<h2>Data Patches</h2>

<div class="directory-card">
    <h3><i class="fas fa-file-code"></i> What are Data Patches?</h3>
    <p>Patches run <strong>incremental updates</strong> against the database. They perform operations that are not possible to do in the XML declaration.</p>
    
    <div class="key-point">
        <strong>Key Benefit:</strong> Once a patch is applied, the patch is stored in the <code>patch_list</code> table and never run again.
    </div>
</div>

<h3>Generating a Data Patch</h3>

<div class="directory-card">
    <p>You can initialize a patch with the CLI command:</p>
    
    <pre><code>bin/magento setup:db-declaration:generate-patch Vendor_Module PatchName</code></pre>
</div>

<h3>Data Patch Location</h3>

<div class="directory-card">
    <div class="directory-path">Setup/Patch/Data/</div>
    <p>Data patches must be in your module's <code>Setup/Patch/Data</code> directory.</p>
</div>

<h3>Data Patch Interface</h3>

<div class="directory-card">
    <p>Data patches must implement <code>\Magento\Framework\Setup\Patch\DataPatchInterface</code>.</p>
    
    <h4>Three Required Methods:</h4>
    <ul>
        <li><code>apply()</code>: Takes action (performs the patch)</li>
        <li><code>getDependencies()</code> (static): Returns an array of patches that this patch depends on</li>
        <li><code>getAliases()</code>: If this patch ever changes names, this returns other names for the patch</li>
    </ul>
</div>

<h3>Data Patch Example</h3>

<div class="directory-card">
    <div class="directory-path">Setup/Patch/Data/AddSampleData.php</div>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddSampleData implements DataPatchInterface
{
    private $moduleDataSetup;
    
    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }
    
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        
        // Your data manipulation logic here
        $connection = $this->moduleDataSetup->getConnection();
        $tableName = $this->moduleDataSetup->getTable('vendor_module_entity');
        
        $connection->insert($tableName, [
            'name' => 'Sample Entity',
            'status' => 1
        ]);
        
        $this->moduleDataSetup->getConnection()->endSetup();
        
        return $this;
    }
    
    public static function getDependencies()
    {
        return []; // Or return array of dependent patch class names
    }
    
    public function getAliases()
    {
        return []; // Or return array of old patch names
    }
}</code></pre>
</div>

<h3>Revertable Patches</h3>

<div class="directory-card">
    <p>If you wish to make a patch able to be rolled back, implement <code>\Magento\Framework\Setup\Patch\PatchRevertableInterface</code>.</p>
    
    <pre><code>&lt;?php
class RevertablePatch implements DataPatchInterface, PatchRevertableInterface
{
    public function revert()
    {
        // Logic to revert the patch (run when module is uninstalled)
    }
    
    // ... other required methods
}</code></pre>
    
    <div class="key-point mt-3">
        <strong>When to use:</strong> This interface specifies a <code>revert()</code> method so you can take action when the module is being uninstalled.
    </div>
</div>

<h3>Version-Based Patches</h3>

<div class="directory-card">
    <p>If you need to convert upgrade scripts to DB Schema and ensure the patch was only run once, use <code>\Magento\Framework\Setup\Patch\PatchVersionInterface</code>.</p>
    
    <pre><code>&lt;?php
class VersionedPatch implements DataPatchInterface, PatchVersionInterface
{
    public static function getVersion()
    {
        return '2.0.1'; // Associate patch with specific version
    }
    
    // ... other required methods
}</code></pre>
    
    <div class="warning-box mt-3">
        <strong>Note:</strong> Magento's goal is to get away from version numbers being associated with database upgrades, instead relying on patches and the more intuitive DB Schema.
    </div>
</div>

<h2>Schema Patches</h2>

<div class="directory-card">
    <h3><i class="fas fa-wrench"></i> What are Schema Patches?</h3>
    <p>Schema patches allow for <strong>intricate updates to the schema</strong>.</p>
    
    <div class="key-point">
        <strong>When to use:</strong> Almost every situation is covered in db_schema.xml. However, if you need to add a column to a table outside of Magento's control (like a custom-built application that shares the same Magento database), use a schema patch.
    </div>
</div>

<h3>Creating a Schema Patch</h3>

<div class="directory-card">
    <p>The process is very similar to data patches with two exceptions:</p>
    
    <ol>
        <li>The patch should reside in your module's <code>Setup/Patch/Schema</code> directory</li>
        <li>The patch should implement <code>\Magento\Framework\Setup\Patch\SchemaPatchInterface</code></li>
    </ol>
    
    <div class="directory-path">Setup/Patch/Schema/</div>
</div>

<h3>Why SchemaPatchInterface Has No Methods</h3>

<div class="directory-card">
    <div class="success-box">
        <strong>Interesting Fact:</strong> You might be surprised that <code>SchemaPatchInterface</code> has no methods. Why would an interface extend another if it doesn't add to the original interface's functionality?
    </div>
    
    <div class="key-point mt-3">
        <strong>Answer: Labeling.</strong> Because you would choose to implement the <code>DataPatchInterface</code> or the <code>SchemaPatchInterface</code>, Magento knows what type of patch this is without having to rely on a directory structure.
    </div>
</div>

<h2>db_schema_whitelist.json</h2>

<div class="directory-card">
    <p>The whitelist file contains a history of all tables, columns, keys, and constraints that have been created or modified via declarative schema.</p>
    
    <div class="directory-path">etc/db_schema_whitelist.json</div>
    
    <p>This file is <strong>auto-generated</strong> when you run:</p>
    <pre><code>bin/magento setup:db-declaration:generate-whitelist</code></pre>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Important:</strong> You must regenerate this file whenever you modify db_schema.xml.
    </div>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>DB Schema available:</strong> Magento 2.3+</li>
        <li><strong>File location:</strong> <code>etc/db_schema.xml</code></li>
        <li><strong>XSD location:</strong> <code>vendor/magento/framework/Setup/Declaration/Schema/etc/schema.xsd</code></li>
        <li><strong>Add table:</strong> Specify configuration in db_schema.xml</li>
        <li><strong>Remove table:</strong> Remove from db_schema.xml</li>
        <li><strong>Add column:</strong> Add &lt;column&gt; element to &lt;table&gt;</li>
        <li><strong>Rename column:</strong> Use <code>onCreate="migrateDataFrom(old_name)"</code></li>
        <li><strong>Delete column:</strong> Use <code>disabled="true"</code></li>
        <li><strong>Module load order:</strong> Configure in etc/module.xml with &lt;sequence&gt;</li>
        <li><strong>Required column attributes:</strong> name, xsi:type</li>
        <li><strong>Column types:</strong> boolean, date, int, text, varchar, timestamp, decimal</li>
        <li><strong>Constraints:</strong> Two types - indexes and foreign keys</li>
        <li><strong>Data patches:</strong> Setup/Patch/Data/, implement DataPatchInterface</li>
        <li><strong>Schema patches:</strong> Setup/Patch/Schema/, implement SchemaPatchInterface</li>
        <li><strong>Patch methods:</strong> apply(), getDependencies(), getAliases()</li>
        <li><strong>Revertable:</strong> Implement PatchRevertableInterface, add revert() method</li>
        <li><strong>Patch storage:</strong> patch_list table</li>
        <li><strong>Whitelist:</strong> Auto-generated with setup:db-declaration:generate-whitelist</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/development/components/declarative-schema/" target="_blank">Configure Declarative Schema</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/declarative-schema/patches/" target="_blank">Develop Data and Schema Patches</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/declarative-schema/configuration/" target="_blank">Declarative Schema Configuration</a></li>
    </ul>
</div>
