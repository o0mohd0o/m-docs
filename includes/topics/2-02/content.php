<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding how to create and modify admin grids and forms is essential for building custom admin interfaces in Magento. This knowledge allows you to manage custom entities, display data, and provide CRUD operations in the admin panel.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> Admin Grid/Form Components Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Admin UI))
    Admin Grids
      Controller
      Layout XML
      UI Component XML
      DataSource
      Mass Actions
      Inline Editing
    Admin Forms
      Controllers CRUD
      Layout XML
      UI Component XML
      DataSource
      Field Components
    Components
      UiComponent
      Listing
      Form
      DataProvider
      Collection
    </div>
</div>

<h2>Admin Grids Overview</h2>

<div class="directory-card">
    <p>A standard <strong>admin grid</strong> displays data from a database table in a tabular format with features like sorting, filtering, pagination, and mass actions.</p>
    
    <div class="key-point">
        <strong>Key Assumption:</strong> Standard admin grids assume there is an <strong>underlying table and collection</strong> that allows fetching data from the table.
    </div>
</div>

<h2>Steps to Create an Admin Grid</h2>

<div class="directory-card">
    <h3><i class="fas fa-list-ol"></i> Required Steps</h3>
    
    <ol>
        <li><strong>Create a new controller</strong> in <code>adminhtml</code></li>
        <li><strong>Modify layout</strong> to include the UiComponent's configuration</li>
        <li><strong>Create a listing (grid) component XML file</strong></li>
        <li><strong>Create/configure the DataSource</strong> for the grid</li>
        <li><strong>Create controllers for mass actions</strong></li>
        <li><strong>Optionally</strong> - Create a controller for inline editing</li>
    </ol>
</div>

<h3>Step 1: Create Admin Controller</h3>

<div class="directory-card">
    <div class="directory-path">Controller/Adminhtml/Entity/Index.php</div>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Controller\Adminhtml\Entity;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Vendor_Module::entity';
    
    protected $resultPageFactory;
    
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Vendor_Module::entity');
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Entities'));
        return $resultPage;
    }
}</code></pre>
</div>

<h3>Step 2: Layout XML Declaration</h3>

<div class="directory-card">
    <div class="directory-path">view/adminhtml/layout/entity_index.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd"&gt;
    &lt;update handle="styles"/&gt;
    &lt;body&gt;
        &lt;referenceContainer name="content"&gt;
            &lt;uiComponent name="entity_listing"/&gt;
        &lt;/referenceContainer&gt;
    &lt;/body&gt;
&lt;/page&gt;</code></pre>
    
    <div class="key-point mt-3">
        <strong>Key Element:</strong> The <code>&lt;uiComponent name="entity_listing"/&gt;</code> references the UI Component XML file.
    </div>
</div>

<h3>Step 3: Listing (Grid) Component XML</h3>

<div class="directory-card">
    <div class="directory-path">view/adminhtml/ui_component/entity_listing.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;listing xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Ui:etc/ui_configuration.xsd"&gt;
    &lt;argument name="data" xsi:type="array"&gt;
        &lt;item name="js_config" xsi:type="array"&gt;
            &lt;item name="provider" xsi:type="string"&gt;
                entity_listing.entity_listing_data_source
            &lt;/item&gt;
        &lt;/item&gt;
    &lt;/argument&gt;
    
    &lt;dataSource name="entity_listing_data_source"&gt;
        &lt;argument name="dataProvider" xsi:type="configurableObject"&gt;
            &lt;argument name="class" xsi:type="string"&gt;
                Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
            &lt;/argument&gt;
            &lt;argument name="name" xsi:type="string"&gt;entity_listing_data_source&lt;/argument&gt;
            &lt;argument name="primaryFieldName" xsi:type="string"&gt;entity_id&lt;/argument&gt;
            &lt;argument name="requestFieldName" xsi:type="string"&gt;id&lt;/argument&gt;
        &lt;/argument&gt;
    &lt;/dataSource&gt;
    
    &lt;columns name="entity_columns"&gt;
        &lt;column name="entity_id"&gt;
            &lt;settings&gt;
                &lt;label translate="true"&gt;ID&lt;/label&gt;
            &lt;/settings&gt;
        &lt;/column&gt;
        &lt;column name="title"&gt;
            &lt;settings&gt;
                &lt;filter&gt;text&lt;/filter&gt;
                &lt;label translate="true"&gt;Title&lt;/label&gt;
            &lt;/settings&gt;
        &lt;/column&gt;
    &lt;/columns&gt;
&lt;/listing&gt;</code></pre>
</div>

<h3>Step 4: DataSource Configuration (di.xml)</h3>

<div class="directory-card">
    <div class="directory-path">etc/di.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd"&gt;
    
    &lt;type name="Magento\Framework\View\Element\UiComponent\DataProvider\CollectionFactory"&gt;
        &lt;arguments&gt;
            &lt;argument name="collections" xsi:type="array"&gt;
                &lt;item name="entity_listing_data_source" xsi:type="string"&gt;
                    Vendor\Module\Model\ResourceModel\Entity\Grid\Collection
                &lt;/item&gt;
            &lt;/argument&gt;
        &lt;/arguments&gt;
    &lt;/type&gt;
    
    &lt;type name="Vendor\Module\Model\ResourceModel\Entity\Grid\Collection"&gt;
        &lt;arguments&gt;
            &lt;argument name="mainTable" xsi:type="string"&gt;entity_table&lt;/argument&gt;
            &lt;argument name="eventPrefix" xsi:type="string"&gt;entity_grid_collection&lt;/argument&gt;
            &lt;argument name="eventObject" xsi:type="string"&gt;entity_grid_collection&lt;/argument&gt;
            &lt;argument name="resourceModel" xsi:type="string"&gt;
                Vendor\Module\Model\ResourceModel\Entity
            &lt;/argument&gt;
        &lt;/arguments&gt;
    &lt;/type&gt;
&lt;/config&gt;</code></pre>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Important:</strong> The collection name in <code>di.xml</code> must match the dataSource name in the UI Component XML.
    </div>
</div>

<h3>Grid Collection with SearchResultInterface</h3>

<div class="directory-card">
    <p>A separate Grid Collection is created to implement <code>SearchResultInterface</code>. You may use the standard collection as well if implementing this interface.</p>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Model\ResourceModel\Entity\Grid;

use Magento\Framework\Api\Search\SearchResultInterface;
use Vendor\Module\Model\ResourceModel\Entity\Collection as EntityCollection;

class Collection extends EntityCollection implements SearchResultInterface
{
    protected $aggregations;
    
    public function getAggregations() { return $this->aggregations; }
    public function setAggregations($aggregations) { $this->aggregations = $aggregations; }
    public function getSearchCriteria() { return null; }
    public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null) { return $this; }
    public function getTotalCount() { return $this->getSize(); }
    public function setTotalCount($totalCount) { return $this; }
    public function setItems(array $items = null) { return $this; }
}</code></pre>
    
    <div class="key-point mt-3">
        <strong>Why Grid Collection?</strong> The main reason for having a separate Grid Collection is to implement <code>SearchResultInterface</code>.
    </div>
</div>

<h2>Mass Actions</h2>

<div class="directory-card">
    <p>Mass actions allow users to perform operations on multiple grid items at once.</p>
</div>

<h3>Configuring Mass Actions</h3>

<div class="directory-card">
    <pre><code>&lt;listingToolbar name="listing_top"&gt;
    &lt;massaction name="listing_massaction"&gt;
        &lt;action name="delete"&gt;
            &lt;settings&gt;
                &lt;confirm&gt;
                    &lt;message translate="true"&gt;Are you sure you want to delete selected items?&lt;/message&gt;
                    &lt;title translate="true"&gt;Delete items&lt;/title&gt;
                &lt;/confirm&gt;
                &lt;url path="*/*/massDelete"/&gt;
                &lt;type&gt;delete&lt;/type&gt;
                &lt;label translate="true"&gt;Delete&lt;/label&gt;
            &lt;/settings&gt;
        &lt;/action&gt;
        
        &lt;action name="disable"&gt;
            &lt;settings&gt;
                &lt;url path="*/*/massDisable"/&gt;
                &lt;type&gt;disable&lt;/type&gt;
                &lt;label translate="true"&gt;Disable&lt;/label&gt;
            &lt;/settings&gt;
        &lt;/action&gt;
        
        &lt;action name="enable"&gt;
            &lt;settings&gt;
                &lt;url path="*/*/massEnable"/&gt;
                &lt;type&gt;enable&lt;/type&gt;
                &lt;label translate="true"&gt;Enable&lt;/label&gt;
            &lt;/settings&gt;
        &lt;/action&gt;
        
        &lt;!-- Edit Action (triggers JS module) --&gt;
        &lt;action name="edit"&gt;
            &lt;settings&gt;
                &lt;callback&gt;
                    &lt;target&gt;editSelected&lt;/target&gt;
                    &lt;provider&gt;entity_listing.entity_listing.entity_columns_editor&lt;/provider&gt;
                &lt;/callback&gt;
                &lt;type&gt;edit&lt;/type&gt;
                &lt;label translate="true"&gt;Edit&lt;/label&gt;
            &lt;/settings&gt;
        &lt;/action&gt;
    &lt;/massaction&gt;
&lt;/listingToolbar&gt;</code></pre>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Note:</strong> Some mass actions (like <strong>edit</strong>) may trigger a JavaScript module rather than issuing an immediate request.
    </div>
</div>

<h3>Mass Action Controller Example</h3>

<div class="directory-card">
    <pre><code>&lt;?php
namespace Vendor\Module\Controller\Adminhtml\Entity;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Vendor\Module\Model\ResourceModel\Entity\CollectionFactory;

class MassDelete extends Action
{
    const ADMIN_RESOURCE = 'Vendor_Module::entity_delete';
    
    protected $filter;
    protected $collectionFactory;
    
    public function __construct(
        Action\Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        
        foreach ($collection as $item) {
            $item->delete();
        }
        
        $this->messageManager->addSuccessMessage(
            __('A total of %1 record(s) have been deleted.', $collectionSize)
        );
        
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/');
    }
}</code></pre>
    
    <div class="success-box mt-3">
        <strong>Reference:</strong> See <code>Magento\Cms\Controller\Adminhtml\Page\MassDelete</code> and <code>Magento\Cms\Controller\Adminhtml\Page\MassEnable</code>.
    </div>
</div>

<h2>Inline Editing</h2>

<div class="directory-card">
    <p>Inline editing allows users to edit grid data directly without opening a separate form.</p>
</div>

<h3>Steps for Inline Editing</h3>

<div class="directory-card">
    <ol>
        <li>Configure the <code>editorConfig</code> node in the listing XML file</li>
        <li>Configure the editor for each field</li>
        <li>Create a controller to save the result</li>
    </ol>
</div>

<h4>1. Configure editorConfig</h4>

<div class="directory-card">
    <pre><code>&lt;columns name="entity_columns"&gt;
    &lt;settings&gt;
        &lt;editorConfig&gt;
            &lt;param name="clientConfig" xsi:type="array"&gt;
                &lt;item name="saveUrl" xsi:type="url" path="*/*/inlineEdit"/&gt;
                &lt;item name="validateBeforeSave" xsi:type="boolean"&gt;true&lt;/item&gt;
            &lt;/param&gt;
            &lt;param name="indexField" xsi:type="string"&gt;entity_id&lt;/param&gt;
            &lt;param name="enabled" xsi:type="boolean"&gt;true&lt;/param&gt;
            &lt;param name="selectProvider" xsi:type="string"&gt;${ $.columnsProvider }.ids&lt;/param&gt;
        &lt;/editorConfig&gt;
    &lt;/settings&gt;
&lt;/columns&gt;</code></pre>
</div>

<h4>2. Configure Editor for Each Field</h4>

<div class="directory-card">
    <pre><code>&lt;column name="title"&gt;
    &lt;settings&gt;
        &lt;filter&gt;text&lt;/filter&gt;
        &lt;editor&gt;
            &lt;validation&gt;
                &lt;rule name="required-entry" xsi:type="boolean"&gt;true&lt;/rule&gt;
            &lt;/validation&gt;
            &lt;editorType&gt;text&lt;/editorType&gt;
        &lt;/editor&gt;
        &lt;label translate="true"&gt;Title&lt;/label&gt;
    &lt;/settings&gt;
&lt;/column&gt;</code></pre>
</div>

<h4>3. InlineEdit Controller</h4>

<div class="directory-card">
    <pre><code>&lt;?php
namespace Vendor\Module\Controller\Adminhtml\Entity;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\JsonFactory;

class InlineEdit extends Action
{
    const ADMIN_RESOURCE = 'Vendor_Module::entity_save';
    
    protected $jsonFactory;
    protected $entityFactory;
    
    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];
        
        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            foreach (array_keys($postItems) as $entityId) {
                $entity = $this->entityFactory->create()->load($entityId);
                try {
                    $entity->setData(array_merge($entity->getData(), $postItems[$entityId]));
                    $entity->save();
                } catch (\Exception $e) {
                    $messages[] = __('[ID: %1] %2', $entity->getId(), $e->getMessage());
                    $error = true;
                }
            }
        }
        
        return $resultJson->setData(['messages' => $messages, 'error' => $error]);
    }
}</code></pre>
    
    <div class="success-box mt-3">
        <strong>Reference:</strong> See <code>Magento\Cms\Controller\Adminhtml\Page\InlineEdit</code>.
    </div>
</div>

<h2>Admin Forms</h2>

<div class="directory-card">
    <p>Admin forms follow a <strong>similar pattern to grids</strong> but are used for creating and editing individual records.</p>
</div>

<h3>Steps to Create an Admin Form</h3>

<div class="directory-card">
    <ol>
        <li><strong>Create controllers</strong> for form display, edit, save, and delete actions</li>
        <li>May need additional controllers for file uploading</li>
        <li><strong>Modify layout</strong> to include UiComponent's configuration</li>
        <li><strong>Create form UI component XML file</strong></li>
        <li><strong>Create/configure DataSource</strong> for the form</li>
    </ol>
    
    <div class="success-box mt-3">
        <strong>Reference:</strong> See <code>Magento/Cms/Controller/Adminhtml/Page/</code> for complete examples.
    </div>
</div>

<h3>Form Layout XML</h3>

<div class="directory-card">
    <div class="directory-path">view/adminhtml/layout/entity_edit.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd"&gt;
    &lt;update handle="styles"/&gt;
    &lt;body&gt;
        &lt;referenceContainer name="content"&gt;
            &lt;uiComponent name="entity_form"/&gt;
        &lt;/referenceContainer&gt;
    &lt;/body&gt;
&lt;/page&gt;</code></pre>
</div>

<h3>Form UI Component XML</h3>

<div class="directory-card">
    <div class="directory-path">view/adminhtml/ui_component/entity_form.xml</div>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;form xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Ui:etc/ui_configuration.xsd"&gt;
    &lt;argument name="data" xsi:type="array"&gt;
        &lt;item name="js_config" xsi:type="array"&gt;
            &lt;item name="provider" xsi:type="string"&gt;entity_form.entity_form_data_source&lt;/item&gt;
        &lt;/item&gt;
        &lt;item name="label" xsi:type="string" translate="true"&gt;Entity Information&lt;/item&gt;
    &lt;/argument&gt;
    
    &lt;dataSource name="entity_form_data_source"&gt;
        &lt;dataProvider class="Vendor\Module\Model\Entity\DataProvider" name="entity_form_data_source"&gt;
            &lt;settings&gt;
                &lt;requestFieldName&gt;id&lt;/requestFieldName&gt;
                &lt;primaryFieldName&gt;entity_id&lt;/primaryFieldName&gt;
            &lt;/settings&gt;
        &lt;/dataProvider&gt;
    &lt;/dataSource&gt;
    
    &lt;fieldset name="general"&gt;
        &lt;settings&gt;
            &lt;label translate="true"&gt;General Information&lt;/label&gt;
        &lt;/settings&gt;
        
        &lt;field name="entity_id" formElement="input"&gt;
            &lt;settings&gt;
                &lt;dataType&gt;text&lt;/dataType&gt;
                &lt;visible&gt;false&lt;/visible&gt;
            &lt;/settings&gt;
        &lt;/field&gt;
        
        &lt;field name="title" formElement="input"&gt;
            &lt;settings&gt;
                &lt;validation&gt;
                    &lt;rule name="required-entry" xsi:type="boolean"&gt;true&lt;/rule&gt;
                &lt;/validation&gt;
                &lt;dataType&gt;text&lt;/dataType&gt;
                &lt;label translate="true"&gt;Title&lt;/label&gt;
            &lt;/settings&gt;
        &lt;/field&gt;
        
        &lt;field name="is_active" formElement="checkbox"&gt;
            &lt;settings&gt;
                &lt;dataType&gt;boolean&lt;/dataType&gt;
                &lt;label translate="true"&gt;Is Active&lt;/label&gt;
            &lt;/settings&gt;
            &lt;formElements&gt;
                &lt;checkbox&gt;
                    &lt;settings&gt;
                        &lt;valueMap&gt;
                            &lt;map name="false" xsi:type="string"&gt;0&lt;/map&gt;
                            &lt;map name="true" xsi:type="string"&gt;1&lt;/map&gt;
                        &lt;/valueMap&gt;
                        &lt;prefer&gt;toggle&lt;/prefer&gt;
                    &lt;/settings&gt;
                &lt;/checkbox&gt;
            &lt;/formElements&gt;
        &lt;/field&gt;
    &lt;/fieldset&gt;
&lt;/form&gt;</code></pre>
</div>

<h2>Key Components Summary</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Component</th>
                <th>Purpose</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Controller</strong></td>
                <td>Handle requests, load data, return response</td>
                <td><code>Controller/Adminhtml/Entity/</code></td>
            </tr>
            <tr>
                <td><strong>Layout XML</strong></td>
                <td>Define page structure, reference UI Component</td>
                <td><code>view/adminhtml/layout/</code></td>
            </tr>
            <tr>
                <td><strong>UI Component XML</strong></td>
                <td>Configure grid/form structure, columns, fields</td>
                <td><code>view/adminhtml/ui_component/</code></td>
            </tr>
            <tr>
                <td><strong>DataSource (di.xml)</strong></td>
                <td>Configure collection for grid/form data</td>
                <td><code>etc/di.xml</code></td>
            </tr>
            <tr>
                <td><strong>Grid Collection</strong></td>
                <td>Fetch and filter data (implements SearchResultInterface)</td>
                <td><code>Model/ResourceModel/Entity/Grid/</code></td>
            </tr>
            <tr>
                <td><strong>Mass Action Controllers</strong></td>
                <td>Handle bulk operations (delete, enable, disable)</td>
                <td><code>Controller/Adminhtml/Entity/Mass*</code></td>
            </tr>
            <tr>
                <td><strong>InlineEdit Controller</strong></td>
                <td>Handle inline grid editing</td>
                <td><code>Controller/Adminhtml/Entity/InlineEdit</code></td>
            </tr>
            <tr>
                <td><strong>DataProvider</strong></td>
                <td>Provide form data</td>
                <td><code>Model/Entity/DataProvider.php</code></td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Quick Reference: Grids vs Forms</h2>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-th"></i> Admin Grids</h4>
            <ul class="mb-0">
                <li>Display multiple records in table format</li>
                <li>Use <code>&lt;listing&gt;</code> root element</li>
                <li>Grid Collection implements <code>SearchResultInterface</code></li>
                <li>Support mass actions</li>
                <li>Optional inline editing</li>
                <li>Filtering, sorting, pagination built-in</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-file-alt"></i> Admin Forms</h4>
            <ul class="mb-0">
                <li>Edit single record</li>
                <li>Use <code>&lt;form&gt;</code> root element</li>
                <li>DataProvider fetches form data</li>
                <li>Controllers: New, Edit, Save, Delete</li>
                <li>May need file upload controllers</li>
                <li>Field validation and dependencies</li>
            </ul>
        </div>
    </div>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>6 steps to create a grid:</strong> Controller, Layout, UI Component XML, DataSource, Mass Actions, Inline Editing (optional)</li>
        <li><strong>Grid collections</strong> implement <code>SearchResultInterface</code></li>
        <li><strong>DataSource name</strong> in di.xml must match UI Component XML</li>
        <li><strong>Mass actions</strong> configured in <code>listing/listingToolbar/massaction/action</code> nodes</li>
        <li>Some mass actions trigger <strong>JS modules</strong> instead of immediate requests</li>
        <li><strong>Inline editing</strong> requires: editorConfig, field editor config, InlineEdit controller</li>
        <li><strong>Forms follow similar pattern</strong> to grids with different UI Component structure</li>
        <li>Form controllers handle <strong>CRUD operations</strong>: New, Edit, Save, Delete</li>
        <li><strong>Layout XML</strong> is the same for both grids and forms - just reference the UI Component</li>
        <li><strong>Real examples:</strong> <code>Magento_Cms</code> module for CMS pages</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/development/components/add-admin-grid/" target="_blank">Add an Admin Grid</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/ui-components/components/columns-editor/" target="_blank">ColumnsEditor Component</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/ui-components/components/form/" target="_blank">Form Component</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/ui-components/components/listing-grid/" target="_blank">Listing (Grid) Component</a></li>
    </ul>
</div>
