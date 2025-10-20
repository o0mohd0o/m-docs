<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> ACL (Access Control List) is essential for securing the admin area and API endpoints. Understanding how to configure ACL properly ensures that only authorized users can access specific features and functionality.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> ACL System Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((ACL System))
    Purpose
      Restrict Admin Users
      Restrict API Users
      Permission Management
    Configuration
      etc/acl.xml
      etc/webapi.xml
      Admin Controllers
    Implementation
      ADMIN_RESOURCE
      _isAllowed method
      ACL Hierarchy
    Structure
      Roles
      Resources
      Magento_Backend::admin
    Management
      Add Resources
      Disable Resources
      Naming Conventions
    </div>
</div>

<h2>What is ACL (Access Control List)?</h2>

<div class="directory-card">
    <p>Magento uses the <strong>Access Control List (ACL)</strong> to restrict permissions and control what users can do in the system.</p>
    
    <div class="key-point">
        <strong>ACL Controls:</strong>
        <ul class="mb-0 mt-2">
            <li><strong>Admin users</strong> - What they can access in the admin panel</li>
            <li><strong>API users</strong> - What API endpoints they can call</li>
            <li><strong>Specific actions</strong> - Fine-grained permission control</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-user-shield"></i> Admin Area Control</h4>
            <p>ACL determines which admin pages and actions a user can access:</p>
            <ul>
                <li>View specific menu items</li>
                <li>Access certain controllers</li>
                <li>Perform create/edit/delete operations</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-code"></i> API Endpoint Control</h4>
            <p>ACL restricts which API endpoints can be called:</p>
            <ul>
                <li>REST API endpoints</li>
                <li>SOAP API endpoints</li>
                <li>GraphQL mutations/queries</li>
            </ul>
        </div>
    </div>
</div>

<h2>Where ACL is Specified</h2>

<h3><i class="fas fa-file-code"></i> 1. API Endpoints - webapi.xml</h3>

<div class="directory-card">
    <div class="directory-path">etc/webapi.xml</div>
    
    <p>ACL for API endpoints (REST/SOAP) is specified in <code>etc/webapi.xml</code>:</p>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;routes xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Webapi:etc/webapi.xsd"&gt;
    &lt;route url="/V1/orders/:id" method="GET"&gt;
        &lt;service class="Magento\Sales\Api\OrderRepositoryInterface" method="get"/&gt;
        &lt;resources&gt;
            &lt;resource ref="Magento_Sales::sales_order"/&gt;
        &lt;/resources&gt;
    &lt;/route&gt;
&lt;/routes&gt;</code></pre>
    
    <div class="success-box mt-3">
        <strong>The <code>&lt;resource ref="..."&gt;</code> element specifies which ACL resource is required to access this endpoint.</strong>
    </div>
</div>

<h3><i class="fas fa-desktop"></i> 2. Admin Controllers - Two Methods</h3>

<div class="directory-card">
    <p>For admin routes, ACL is typically embedded directly into the admin controller using one of two methods:</p>
</div>

<h4>Method 1: ADMIN_RESOURCE Constant</h4>

<div class="directory-card">
    <p>The <strong>recommended and most common approach</strong> - define a constant in the controller:</p>
    
    <pre><code>&lt;?php
namespace Magento\Cms\Controller\Adminhtml\Page;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Save extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_Cms::save';
    
    public function execute()
    {
        // Controller logic here
    }
}</code></pre>
    
    <div class="key-point mt-3">
        <strong>How it works:</strong>
        <ul class="mb-0">
            <li>The parent <code>Action</code> class automatically checks this constant</li>
            <li>If the user doesn't have permission, access is denied</li>
            <li>Returns a 403 Forbidden response</li>
        </ul>
    </div>
    
    <p class="mt-2"><strong>Reference:</strong> See <code>Magento\Cms\Controller\Adminhtml\Page\Save</code></p>
</div>

<h4>Method 2: _isAllowed() Method</h4>

<div class="directory-card">
    <p>Override the <code>_isAllowed()</code> method for <strong>custom or dynamic permission logic</strong>:</p>
    
    <pre><code>&lt;?php
namespace Vendor\Module\Controller\Adminhtml\Entity;

use Magento\Backend\App\Action;

class Delete extends Action
{
    /**
     * Check if admin has permission to delete
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        // Custom logic - can check multiple resources or conditions
        return $this->_authorization->isAllowed('Vendor_Module::entity_delete');
    }
    
    public function execute()
    {
        // Controller logic here
    }
}</code></pre>
    
    <div class="warning-box mt-3">
        <strong>When to use _isAllowed():</strong>
        <ul class="mb-0">
            <li>Need to check multiple ACL resources</li>
            <li>Permission logic depends on runtime conditions</li>
            <li>Require custom authorization logic</li>
        </ul>
    </div>
    
    <div class="success-box mt-3">
        <strong>Best Practice:</strong> Use <code>ADMIN_RESOURCE</code> constant whenever possible. Only override <code>_isAllowed()</code> when you need custom logic.
    </div>
</div>

<h2>Defining ACL Resources - acl.xml</h2>

<div class="directory-card">
    <div class="directory-path">etc/acl.xml</div>
    
    <p>To define ACL resources, create an <code>etc/acl.xml</code> configuration file in your module:</p>
    
    <div class="warning-box">
        <strong>⚠️ Critical Requirement:</strong> Every module that adds admin functionality should have an <code>acl.xml</code> with at least one resource configured.
    </div>
</div>

<h3><i class="fas fa-plus-circle"></i> How to Add a New ACL Resource</h3>

<div class="directory-card">
    <p>Example: Adding ACL for an order export tool</p>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Acl/etc/acl.xsd"&gt;
    &lt;acl&gt;
        &lt;resources&gt;
            &lt;!-- MUST be inside Magento_Backend::admin --&gt;
            &lt;resource id="Magento_Backend::admin"&gt;
                &lt;resource id="Vendor_OrderExport::export" 
                          title="Order Export" 
                          sortOrder="100"&gt;
                    &lt;resource id="Vendor_OrderExport::export_orders" 
                              title="Export Orders" 
                              sortOrder="10"/&gt;
                    &lt;resource id="Vendor_OrderExport::export_config" 
                              title="Export Configuration" 
                              sortOrder="20"/&gt;
                &lt;/resource&gt;
            &lt;/resource&gt;
        &lt;/resources&gt;
    &lt;/acl&gt;
&lt;/config&gt;</code></pre>
    
    <div class="warning-box mt-3">
        <h5><i class="fas fa-exclamation-triangle"></i> Critical Requirement</h5>
        <p><strong>You MUST place your ACL structure inside the <code>Magento_Backend::admin</code> resource!</strong></p>
        <p class="mb-0">If you omit this, administrators will NOT see your ACL entry in the admin panel, and the entire purpose of using ACL is defeated.</p>
    </div>
</div>

<h3><i class="fas fa-code-branch"></i> ACL Hierarchy Example</h3>

<div class="directory-card">
    <p>ACL resources can be nested to create a hierarchy:</p>
    
    <pre><code>&lt;resource id="Magento_Backend::admin"&gt;
    &lt;resource id="Magento_Sales::sales" title="Sales"&gt;
        &lt;resource id="Magento_Sales::sales_operation" title="Operations"&gt;
            &lt;resource id="Magento_Sales::sales_order" title="Orders"/&gt;
            &lt;resource id="Magento_Sales::sales_invoice" title="Invoices"/&gt;
            &lt;resource id="Magento_Sales::shipment" title="Shipments"/&gt;
        &lt;/resource&gt;
    &lt;/resource&gt;
&lt;/resource&gt;</code></pre>
    
    <div class="key-point mt-3">
        <strong>Hierarchy Behavior:</strong>
        <ul class="mb-0">
            <li>Granting access to a parent resource grants access to all child resources</li>
            <li>You can grant access to specific child resources only</li>
            <li>Denying parent denies all children</li>
        </ul>
    </div>
</div>

<h2>ACL Resource Naming Conventions</h2>

<div class="directory-card">
    <p>While there are <strong>no strict requirements</strong> for ACL ID naming, the Magento convention is:</p>
    
    <div class="success-box">
        <strong>Convention:</strong> <code>ModuleName::description_of_action</code>
        <br><br>
        Combine the module's name (as seen in <code>registration.php</code>) and the description of the action, separated by two colons <code>::</code>
    </div>
    
    <h4 class="mt-3">Examples:</h4>
    <ul>
        <li><code>Magento_Cms::save</code> - CMS save operation</li>
        <li><code>Magento_Cms::page</code> - CMS page management</li>
        <li><code>Magento_Sales::sales_order</code> - Sales order access</li>
        <li><code>Magento_Catalog::products</code> - Product catalog access</li>
        <li><code>Vendor_CustomModule::custom_action</code> - Custom module action</li>
    </ul>
    
    <div class="key-point mt-3">
        <strong>Best Practice:</strong> Always follow this naming convention for consistency and clarity. It makes ACL resources easy to identify and understand.
    </div>
</div>

<h2>ACL Structure Elements</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Element</th>
                <th>Attribute</th>
                <th>Description</th>
                <th>Required</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>&lt;resource&gt;</code></td>
                <td><code>id</code></td>
                <td>Unique identifier for the ACL resource</td>
                <td>✅ Yes</td>
            </tr>
            <tr>
                <td></td>
                <td><code>title</code></td>
                <td>Human-readable title shown in admin</td>
                <td>✅ Yes (except for Magento_Backend::admin)</td>
            </tr>
            <tr>
                <td></td>
                <td><code>sortOrder</code></td>
                <td>Display order in admin ACL tree</td>
                <td>❌ Optional</td>
            </tr>
            <tr>
                <td></td>
                <td><code>disabled</code></td>
                <td>Set to "true" to disable an existing ACL</td>
                <td>❌ Optional</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Managing Existing ACL Hierarchy</h2>

<h3><i class="fas fa-ban"></i> Disabling Existing ACL Resources</h3>

<div class="directory-card">
    <p>You can disable an existing ACL entry to prevent it from appearing:</p>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Acl/etc/acl.xsd"&gt;
    &lt;acl&gt;
        &lt;resources&gt;
            &lt;resource id="Magento_Backend::admin"&gt;
                &lt;resource id="Magento_Cms::save" disabled="true"/&gt;
            &lt;/resource&gt;
        &lt;/resources&gt;
    &lt;/acl&gt;
&lt;/config&gt;</code></pre>
    
    <div class="warning-box mt-3">
        <strong>⚠️ Use with Caution:</strong> Disabling ACL resources is rarely needed and can break functionality. This should only be used in very specific customization scenarios.
    </div>
</div>

<h2>ACL in Practice</h2>

<h3><i class="fas fa-clipboard-check"></i> Complete Example: Product Export Module</h3>

<div class="directory-card">
    <h4>Step 1: Define ACL in etc/acl.xml</h4>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Acl/etc/acl.xsd"&gt;
    &lt;acl&gt;
        &lt;resources&gt;
            &lt;resource id="Magento_Backend::admin"&gt;
                &lt;resource id="Vendor_ProductExport::export" 
                          title="Product Export" 
                          sortOrder="100"&gt;
                    &lt;resource id="Vendor_ProductExport::export_action" 
                              title="Export Products"/&gt;
                    &lt;resource id="Vendor_ProductExport::export_view" 
                              title="View Export History"/&gt;
                &lt;/resource&gt;
            &lt;/resource&gt;
        &lt;/resources&gt;
    &lt;/acl&gt;
&lt;/config&gt;</code></pre>
</div>

<div class="directory-card mt-3">
    <h4>Step 2: Use in Admin Controller</h4>
    
    <pre><code>&lt;?php
namespace Vendor\ProductExport\Controller\Adminhtml\Export;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Execute extends Action implements HttpPostActionInterface
{
    const ADMIN_RESOURCE = 'Vendor_ProductExport::export_action';
    
    public function execute()
    {
        // Export logic here
        // Only users with the export_action permission can access this
    }
}</code></pre>
</div>

<div class="directory-card mt-3">
    <h4>Step 3: Use in API (etc/webapi.xml)</h4>
    
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;routes xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Webapi:etc/webapi.xsd"&gt;
    &lt;route url="/V1/products/export" method="POST"&gt;
        &lt;service class="Vendor\ProductExport\Api\ExportInterface" method="execute"/&gt;
        &lt;resources&gt;
            &lt;resource ref="Vendor_ProductExport::export_action"/&gt;
        &lt;/resources&gt;
    &lt;/route&gt;
&lt;/routes&gt;</code></pre>
</div>

<h2>Admin Panel ACL Management</h2>

<div class="directory-card">
    <p>Once ACL resources are defined, administrators can manage permissions:</p>
    
    <div class="key-point">
        <strong>Admin Path:</strong> System → Permissions → User Roles
        <ul class="mb-0 mt-2">
            <li>Create or edit a role</li>
            <li>Go to "Role Resources" tab</li>
            <li>Select "Custom" for Resource Access</li>
            <li>Check/uncheck specific ACL resources</li>
            <li>Save the role</li>
        </ul>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-users"></i> Roles</h4>
            <p>A role is a collection of resources that can be assigned to users.</p>
            <ul class="mb-0">
                <li>Administrators</li>
                <li>Sales Team</li>
                <li>Customer Service</li>
                <li>Custom roles</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-key"></i> Resources</h4>
            <p>Individual permissions defined in acl.xml files.</p>
            <ul class="mb-0">
                <li>View products</li>
                <li>Edit orders</li>
                <li>Manage customers</li>
                <li>System configuration</li>
            </ul>
        </div>
    </div>
</div>

<h2>ACL XSD Schema</h2>

<div class="directory-card">
    <div class="directory-path">Magento/Framework/Acl/etc/acl.xsd</div>
    
    <p>The full specification for <code>acl.xml</code> files can be found in the XSD schema file.</p>
    
    <div class="key-point">
        <strong>Key XSD Location:</strong>
        <br><code>vendor/magento/framework/Acl/etc/acl.xsd</code>
    </div>
    
    <p class="mt-2">This schema defines all valid elements, attributes, and structure for ACL configuration files.</p>
</div>

<h2>Common ACL Scenarios</h2>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-shopping-cart"></i> Scenario 1: Order Export</h4>
            <p><strong>Requirement:</strong> Only certain users can export orders</p>
            
            <div class="success-box">
                <strong>Solution:</strong>
                <ol class="mb-0">
                    <li>Create ACL: <code>Vendor_Module::export_orders</code></li>
                    <li>Add to controller: <code>const ADMIN_RESOURCE = 'Vendor_Module::export_orders';</code></li>
                    <li>Assign to specific admin roles</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-cog"></i> Scenario 2: Configuration Section</h4>
            <p><strong>Requirement:</strong> Restrict access to module settings</p>
            
            <div class="success-box">
                <strong>Solution:</strong>
                <ol class="mb-0">
                    <li>Create ACL: <code>Vendor_Module::config</code></li>
                    <li>Reference in <code>system.xml</code> resource attribute</li>
                    <li>Assign to administrator roles only</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<h2>Quick Reference</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Concept</th>
                <th>File/Location</th>
                <th>Purpose</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Define ACL Resources</td>
                <td><code>etc/acl.xml</code></td>
                <td>Create new ACL resources for your module</td>
            </tr>
            <tr>
                <td>API ACL</td>
                <td><code>etc/webapi.xml</code></td>
                <td>Specify ACL for REST/SOAP endpoints</td>
            </tr>
            <tr>
                <td>Controller ACL</td>
                <td><code>ADMIN_RESOURCE</code> constant</td>
                <td>Protect admin controller actions</td>
            </tr>
            <tr>
                <td>Custom ACL Logic</td>
                <td><code>_isAllowed()</code> method</td>
                <td>Custom or dynamic permission checks</td>
            </tr>
            <tr>
                <td>Parent Resource</td>
                <td><code>Magento_Backend::admin</code></td>
                <td>Required parent for all admin ACL</td>
            </tr>
            <tr>
                <td>Naming Convention</td>
                <td><code>ModuleName::action</code></td>
                <td>Standard ACL ID format</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>ACL controls both admin users and API users</strong></li>
        <li>API ACL is defined in <code>etc/webapi.xml</code></li>
        <li>Admin ACL uses <code>ADMIN_RESOURCE</code> constant or <code>_isAllowed()</code> method</li>
        <li><strong>Every admin module should have an acl.xml</strong></li>
        <li><strong>MUST place ACL inside <code>Magento_Backend::admin</code></strong> or it won't appear</li>
        <li>Naming convention: <code>ModuleName::action_description</code></li>
        <li>ACL resources are hierarchical - parent access grants child access</li>
        <li>Use <code>ADMIN_RESOURCE</code> constant whenever possible (simpler)</li>
        <li>Override <code>_isAllowed()</code> only for custom/dynamic logic</li>
        <li>XSD schema location: <code>Magento/Framework/Acl/etc/acl.xsd</code></li>
        <li>Disabling ACL resources is rarely needed and should be used with caution</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/development/components/add-admin-grid/" target="_blank">Understanding ACL Rules</a></li>
        <li><a href="https://developer.adobe.com/commerce/webapi/get-started/authentication/gs-authentication-oauth/" target="_blank">Web API Authentication</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/systems/user-accounts/permissions.html" target="_blank">User Roles and Permissions</a></li>
    </ul>
</div>
