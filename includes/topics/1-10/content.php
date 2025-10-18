<!-- Topic 1.10: Custom Module Routes -->
<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Topic Overview:</strong> Understanding Magento's routing system, standard routes, and creating custom routers for unique URL schemas.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h3 style="text-align: center; margin-bottom: 20px; border: none;">
        <i class="fas fa-route"></i> Routing System Overview
    </h3>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Routing))
    Types
      Standard Routing
      URL Rewrites
      Custom Routers
    Standard Route
      routes.xml
      Three-chunk URL
      Controllers
    Custom Router
      RouterInterface
      Front Controller
      Custom URL schema
    Components
      Front Name
      Controller Path
      Action Name
    Registration
      di.xml
      Router list
      Priority
    </div>
</div>

<h2>Magento Routing System</h2>

<div class="concept-card">
    <h4><i class="fas fa-map-signs"></i> Two Parts of Routing</h4>
    
    <div class="row">
        <div class="col-md-6">
            <div class="success-box">
                <h5>1. Standard Routing</h5>
                <ul>
                    <li>Three-chunk URL structure</li>
                    <li>Format: <code>frontname/controller/action</code></li>
                    <li>Configured in <code>routes.xml</code></li>
                    <li>Example: <code>catalog/product/view</code></li>
                </ul>
                <p class="mt-2"><strong>Covered:</strong> This topic (1.10)</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <h5>2. URL Rewrites</h5>
                <ul>
                    <li>SEO-friendly URLs</li>
                    <li>Database-driven rewrites</li>
                    <li>Maps custom URLs to standard routes</li>
                    <li>Example: <code>product-name.html</code></li>
                </ul>
                <p class="mt-2"><strong>Covered:</strong> Topic 2.11</p>
            </div>
        </div>
    </div>
</div>

<h2>Standard Routing</h2>

<div class="concept-card">
    <h4><i class="fas fa-link"></i> Three-Chunk URL Structure</h4>
    
    <p>Magento uses a three-part URL structure for standard routing:</p>

    <div class="key-point">
        <h5>URL Format:</h5>
        <pre><code>https://example.com/<strong>frontname</strong>/<strong>controller</strong>/<strong>action</strong>/param1/value1/param2/value2</code></pre>
        
        <ul class="mt-3 mb-0">
            <li><strong>frontname</strong> - Route identifier (e.g., catalog, customer, checkout)</li>
            <li><strong>controller</strong> - Controller directory name (e.g., product, account, cart)</li>
            <li><strong>action</strong> - Action class name (e.g., view, edit, add)</li>
            <li><strong>parameters</strong> - Optional key/value pairs</li>
        </ul>
    </div>

    <h5>Examples:</h5>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>URL</th>
                    <th>Front Name</th>
                    <th>Controller</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>catalog/product/view/id/123</code></td>
                    <td>catalog</td>
                    <td>product</td>
                    <td>view</td>
                </tr>
                <tr>
                    <td><code>customer/account/login</code></td>
                    <td>customer</td>
                    <td>account</td>
                    <td>login</td>
                </tr>
                <tr>
                    <td><code>checkout/cart/add</code></td>
                    <td>checkout</td>
                    <td>cart</td>
                    <td>add</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h3>Declaring Routes</h3>

<div class="concept-card">
    <h4><i class="fas fa-file-code"></i> routes.xml Configuration</h4>
    
    <p>To handle requests, a module must declare a route in <code>routes.xml</code>:</p>

    <h5>File Locations:</h5>
    <ul>
        <li><strong>Frontend:</strong> <code>etc/frontend/routes.xml</code></li>
        <li><strong>Admin:</strong> <code>etc/adminhtml/routes.xml</code></li>
    </ul>

    <h5>Example: Frontend Route</h5>
    <p><strong>File:</strong> <code>app/code/Bonlineco/Catalog/etc/frontend/routes.xml</code></p>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:App/etc/routes.xsd"&gt;
    &lt;router id="standard"&gt;
        &lt;route id="catalog" frontName="catalog"&gt;
            &lt;module name="Bonlineco_Catalog"/&gt;
        &lt;/route&gt;
    &lt;/router&gt;
&lt;/config&gt;</code></pre>

    <div class="info-box">
        <h5>Configuration Elements:</h5>
        <ul class="mb-0">
            <li><code>&lt;router id="standard"&gt;</code> - Router type (standard for frontend/admin)</li>
            <li><code>&lt;route id="catalog"&gt;</code> - Unique route identifier</li>
            <li><code>frontName="catalog"</code> - URL front name (first chunk)</li>
            <li><code>&lt;module name="..."&gt;</code> - Module that handles this route</li>
        </ul>
    </div>

    <h5>Example: Admin Route</h5>
    <p><strong>File:</strong> <code>app/code/Bonlineco/Catalog/etc/adminhtml/routes.xml</code></p>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:App/etc/routes.xsd"&gt;
    &lt;router id="admin"&gt;
        &lt;route id="bonlineco_catalog" frontName="bonlineco_catalog"&gt;
            &lt;module name="Bonlineco_Catalog" before="Magento_Backend"/&gt;
        &lt;/route&gt;
    &lt;/router&gt;
&lt;/config&gt;</code></pre>
</div>

<h3>Controller Mapping</h3>

<div class="concept-card">
    <h4><i class="fas fa-folder-tree"></i> Controller Structure</h4>
    
    <p>After declaring a route, create controllers that correspond to the URL structure:</p>

    <h5>URL to File Mapping:</h5>
    <pre><code>URL: catalog/product/view
     ↓
Route: catalog (from routes.xml)
     ↓
Module: Bonlineco_Catalog
     ↓
Controller File: app/code/Bonlineco/Catalog/Controller/Product/View.php
     ↓
Class: Bonlineco\Catalog\Controller\Product\View</code></pre>

    <h5>Directory Structure:</h5>
    <pre><code>app/code/Bonlineco/Catalog/
├── Controller/
│   ├── Product/
│   │   ├── View.php        ← catalog/product/view
│   │   ├── Edit.php        ← catalog/product/edit
│   │   └── Delete.php      ← catalog/product/delete
│   ├── Category/
│   │   └── View.php        ← catalog/category/view
│   └── Index/
│       └── Index.php       ← catalog/index/index (or just catalog/)
└── etc/
    └── frontend/
        └── routes.xml</code></pre>

    <div class="success-box">
        <h5>Naming Conventions:</h5>
        <ul class="mb-0">
            <li>Controller directory = URL second chunk (capitalized)</li>
            <li>Action class = URL third chunk (capitalized)</li>
            <li>Default controller: <code>Index</code></li>
            <li>Default action: <code>Index</code></li>
        </ul>
    </div>
</div>

<h2>Custom URL Schemas</h2>

<div class="concept-card">
    <h4><i class="fas fa-magic"></i> Beyond Standard Routing</h4>
    
    <p>Sometimes you need custom URL patterns that don't fit the three-chunk structure:</p>

    <h5>Examples of Custom URLs:</h5>
    <ul>
        <li><code>product-123</code> instead of <code>catalog/product/view/id/123</code></li>
        <li><code>product-configuration-ML-12-size-XL-color-RED</code></li>
        <li><code>blog/2024/10/my-post-title</code></li>
        <li><code>brand/nike/category/shoes</code></li>
    </ul>

    <div class="warning-box">
        <strong>Important:</strong> Custom URL schemas require creating a <strong>Custom Router</strong>.
    </div>
</div>

<h2>Front Controller Workflow</h2>

<div class="concept-card">
    <h4><i class="fas fa-cogs"></i> How Magento Processes Requests</h4>
    
    <div class="success-box">
        <h5>Request Processing Flow:</h5>
        <ol>
            <li><strong>Request hits</strong> <code>index.php</code> or <code>pub/index.php</code></li>
            <li><strong>Bootstrap initializes</strong> - Application setup and configuration</li>
            <li><strong>Front Controller runs</strong> - <code>\Magento\Framework\App\FrontController</code></li>
            <li><strong>Obtains router list</strong> - All routers registered via <code>di.xml</code></li>
            <li><strong>Loops through routers</strong> - In priority order</li>
            <li><strong>Router processes request</strong> - First matching router handles it</li>
            <li><strong>Returns ActionInterface</strong> - Action is executed</li>
            <li><strong>Response sent</strong> - HTML, JSON, redirect, etc.</li>
        </ol>
    </div>

    <h5>Front Controller Class:</h5>
    <pre><code>\Magento\Framework\App\FrontController</code></pre>

    <div class="key-point">
        <strong>Key Concept:</strong> The Front Controller loops through registered routers until one returns an ActionInterface instance. That router "wins" and its action handles the request.
    </div>
</div>

<h3>Default Routers</h3>

<div class="concept-card">
    <h4><i class="fas fa-list"></i> Built-in Router Types</h4>
    
    <p>Magento includes several default routers that handle different types of requests:</p>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Router</th>
                    <th>Purpose</th>
                    <th>Priority</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Base Router</strong></td>
                    <td>Handles admin and frontend standard routes</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td><strong>Default Router</strong></td>
                    <td>Fallback for unmatched routes (404)</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td><strong>CMS Router</strong></td>
                    <td>Handles CMS pages and blocks</td>
                    <td>60</td>
                </tr>
                <tr>
                    <td><strong>UrlRewrite Router</strong></td>
                    <td>Processes URL rewrites from database</td>
                    <td>40</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="info-box">
        <strong>Priority Order:</strong> Lower numbers execute first. Custom routers typically use priority 30-50 to run between base and URL rewrite routers.
    </div>
</div>

<h2>Creating a Custom Router</h2>

<div class="concept-card">
    <h4><i class="fas fa-wrench"></i> Custom Router Implementation</h4>
    
    <p>To create a custom router for handling non-standard URLs:</p>

    <h5>Step 1: Create Router Class</h5>
    <p><strong>File:</strong> <code>app/code/Bonlineco/CustomUrl/Controller/Router.php</code></p>
    <pre><code>&lt;?php
namespace Bonlineco\CustomUrl\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

class Router implements RouterInterface
{
    protected $actionFactory;
    
    public function __construct(
        ActionFactory $actionFactory
    ) {
        $this->actionFactory = $actionFactory;
    }
    
    /**
     * Match application action by request
     *
     * @param RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|null
     */
    public function match(RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');
        
        // Example: Handle URLs like "product-123"
        if (preg_match('/^product-(\d+)$/', $identifier, $matches)) {
            $productId = $matches[1];
            
            // Set request parameters
            $request->setModuleName('catalog')
                    ->setControllerName('product')
                    ->setActionName('view')
                    ->setParam('id', $productId);
            
            // Return action instance
            return $this->actionFactory->create(
                \Magento\Framework\App\Action\Forward::class
            );
        }
        
        // Return null if this router doesn't handle the URL
        return null;
    }
}</code></pre>

    <div class="key-point">
        <h5>Key Points:</h5>
        <ul class="mb-0">
            <li>Implement <code>RouterInterface</code></li>
            <li>Define <code>match(RequestInterface $request)</code> method</li>
            <li>Return <code>ActionInterface</code> instance if matched</li>
            <li>Return <code>null</code> if not matched (next router tries)</li>
            <li>Use <code>ActionFactory</code> to create action instances</li>
        </ul>
    </div>
</div>

<h3>Registering Custom Router</h3>

<div class="concept-card">
    <h4><i class="fas fa-file-alt"></i> di.xml Configuration</h4>
    
    <p>Register your custom router with the Front Controller:</p>

    <h5>File Location:</h5>
    <ul>
        <li><strong>Frontend:</strong> <code>etc/frontend/di.xml</code></li>
        <li><strong>Admin:</strong> <code>etc/adminhtml/di.xml</code></li>
        <li><strong>Both:</strong> <code>etc/di.xml</code></li>
    </ul>

    <h5>Example Registration:</h5>
    <p><strong>File:</strong> <code>app/code/Bonlineco/CustomUrl/etc/frontend/di.xml</code></p>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd"&gt;
    &lt;type name="Magento\Framework\App\RouterList"&gt;
        &lt;arguments&gt;
            &lt;argument name="routerList" xsi:type="array"&gt;
                &lt;item name="bonlineco_custom" xsi:type="array"&gt;
                    &lt;item name="class" xsi:type="string"&gt;
                        Bonlineco\CustomUrl\Controller\Router
                    &lt;/item&gt;
                    &lt;item name="disable" xsi:type="boolean"&gt;false&lt;/item&gt;
                    &lt;item name="sortOrder" xsi:type="string"&gt;30&lt;/item&gt;
                &lt;/item&gt;
            &lt;/argument&gt;
        &lt;/arguments&gt;
    &lt;/type&gt;
&lt;/config&gt;</code></pre>

    <div class="info-box">
        <h5>Configuration Options:</h5>
        <ul class="mb-0">
            <li><code>name="bonlineco_custom"</code> - Unique router identifier</li>
            <li><code>class</code> - Your router class path</li>
            <li><code>disable</code> - Enable/disable the router</li>
            <li><code>sortOrder</code> - Priority (lower = earlier execution)</li>
        </ul>
    </div>
</div>

<h2>Advanced Router Examples</h2>

<div class="concept-card">
    <h4><i class="fas fa-code"></i> Real-World Custom Router</h4>
    
    <h5>Example: CMS Router (Simplified)</h5>
    <p>Here's how Magento's CMS router works (simplified):</p>

    <pre><code>&lt;?php
namespace Magento\Cms\Controller;

use Magento\Framework\App\RouterInterface;
use Magento\Framework\App\RequestInterface;

class Router implements RouterInterface
{
    protected $actionFactory;
    protected $pageFactory;
    
    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Cms\Model\PageFactory $pageFactory
    ) {
        $this->actionFactory = $actionFactory;
        $this->pageFactory = $pageFactory;
    }
    
    public function match(RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');
        
        // Try to load CMS page by URL key
        $page = $this->pageFactory->create();
        $pageId = $page->checkIdentifier($identifier, $request->getStoreId());
        
        if (!$pageId) {
            return null; // Not a CMS page, let another router try
        }
        
        // Set request to CMS page controller
        $request->setModuleName('cms')
                ->setControllerName('page')
                ->setActionName('view')
                ->setParam('page_id', $pageId);
        
        return $this->actionFactory->create(
            \Magento\Framework\App\Action\Forward::class
        );
    }
}</code></pre>

    <h5>Example: Blog Date-Based URLs</h5>
    <pre><code>&lt;?php
namespace Bonlineco\Blog\Controller;

class Router implements \Magento\Framework\App\RouterInterface
{
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');
        
        // Match pattern: blog/2024/10/post-title
        $pattern = '/^blog\/(\d{4})\/(\d{2})\/([a-z0-9-]+)$/';
        if (preg_match($pattern, $identifier, $matches)) {
            $year = $matches[1];
            $month = $matches[2];
            $slug = $matches[3];
            
            $request->setModuleName('blog')
                    ->setControllerName('post')
                    ->setActionName('view')
                    ->setParam('year', $year)
                    ->setParam('month', $month)
                    ->setParam('slug', $slug);
            
            return $this->actionFactory->create(
                \Magento\Framework\App\Action\Forward::class
            );
        }
        
        return null;
    }
}</code></pre>
</div>

<h2>Router Interface</h2>

<div class="concept-card">
    <h4><i class="fas fa-puzzle-piece"></i> RouterInterface Contract</h4>
    
    <p>All routers must implement <code>\Magento\Framework\App\RouterInterface</code>:</p>

    <pre><code>&lt;?php
namespace Magento\Framework\App;

interface RouterInterface
{
    /**
     * Match application action by request
     *
     * @param RequestInterface $request
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request);
}</code></pre>

    <div class="success-box">
        <h5>Match Method Requirements:</h5>
        <ul class="mb-0">
            <li><strong>Parameter:</strong> Receives <code>RequestInterface $request</code></li>
            <li><strong>Returns:</strong> <code>ActionInterface</code> if matched, <code>null</code> otherwise</li>
            <li><strong>Side effects:</strong> Can modify request (setModuleName, setParam, etc.)</li>
            <li><strong>Performance:</strong> Should be fast to not slow down all requests</li>
        </ul>
    </div>
</div>

<h2>Action Types</h2>

<div class="concept-card">
    <h4><i class="fas fa-play"></i> Available Action Classes</h4>
    
    <p>When returning an action from your router, you can use:</p>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Action Type</th>
                    <th>Class</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Forward</strong></td>
                    <td><code>Magento\Framework\App\Action\Forward</code></td>
                    <td>Forward to another controller/action</td>
                </tr>
                <tr>
                    <td><strong>Redirect</strong></td>
                    <td><code>Magento\Framework\App\Action\Redirect</code></td>
                    <td>HTTP redirect to another URL</td>
                </tr>
                <tr>
                    <td><strong>Custom</strong></td>
                    <td>Your own ActionInterface implementation</td>
                    <td>Custom logic and response</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h5>Using Forward Action:</h5>
    <pre><code>// Set the target controller
$request->setModuleName('catalog')
        ->setControllerName('product')
        ->setActionName('view')
        ->setParam('id', $productId);

// Return forward action
return $this->actionFactory->create(
    \Magento\Framework\App\Action\Forward::class
);</code></pre>
</div>

<h2>Best Practices</h2>

<div class="concept-card">
    <div class="row">
        <div class="col-md-6">
            <div class="success-box">
                <h5><i class="fas fa-check-circle"></i> Do's</h5>
                <ul class="mb-0">
                    <li>Use standard routing when possible</li>
                    <li>Keep router match() method fast</li>
                    <li>Return null if URL doesn't match</li>
                    <li>Set appropriate sortOrder priority</li>
                    <li>Document custom URL patterns</li>
                    <li>Test with various URL formats</li>
                    <li>Consider URL rewrite as alternative</li>
                    <li>Handle edge cases gracefully</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="warning-box">
                <h5><i class="fas fa-exclamation-triangle"></i> Don'ts</h5>
                <ul class="mb-0">
                    <li>Don't create custom routers unnecessarily</li>
                    <li>Don't perform heavy operations in match()</li>
                    <li>Don't forget to return null for non-matches</li>
                    <li>Don't use too high/low sortOrder</li>
                    <li>Don't duplicate existing router functionality</li>
                    <li>Don't forget to register in di.xml</li>
                    <li>Don't hardcode store/website logic</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<h2>Common Use Cases</h2>

<div class="concept-card">
    <h4><i class="fas fa-lightbulb"></i> When to Use Custom Routers</h4>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Use Case</th>
                    <th>Example URL</th>
                    <th>Solution</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product SKU URLs</td>
                    <td><code>product/SKU-123</code></td>
                    <td>Custom router matching SKU pattern</td>
                </tr>
                <tr>
                    <td>Date-based archives</td>
                    <td><code>blog/2024/10/</code></td>
                    <td>Custom router with date parsing</td>
                </tr>
                <tr>
                    <td>Multi-level categories</td>
                    <td><code>shop/electronics/phones/</code></td>
                    <td>Custom router with category tree lookup</td>
                </tr>
                <tr>
                    <td>Short URLs</td>
                    <td><code>p/123</code>, <code>c/456</code></td>
                    <td>Custom router with prefix matching</td>
                </tr>
                <tr>
                    <td>Legacy URL compatibility</td>
                    <td>Old site URL patterns</td>
                    <td>Custom router for backwards compatibility</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h2>Debugging Routers</h2>

<div class="concept-card">
    <h4><i class="fas fa-bug"></i> Troubleshooting Tips</h4>
    
    <h5>Enable Developer Mode:</h5>
    <pre><code>bin/magento deploy:mode:set developer</code></pre>

    <h5>Check Router Registration:</h5>
    <pre><code>bin/magento dev:di:info Magento\Framework\App\RouterList</code></pre>

    <h5>Add Logging:</h5>
    <pre><code>public function match(RequestInterface $request)
{
    $this->logger->debug('Custom Router: ' . $request->getPathInfo());
    
    // Your matching logic
    
    if ($matched) {
        $this->logger->debug('Custom Router: MATCHED');
        return $action;
    }
    
    $this->logger->debug('Custom Router: Not matched');
    return null;
}</code></pre>

    <h5>Clear Cache:</h5>
    <pre><code>bin/magento cache:clean config
bin/magento cache:clean full_page</code></pre>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>Two routing types:</strong> Standard routing and URL Rewrites</li>
        <li><strong>Standard URL format:</strong> frontname/controller/action</li>
        <li><strong>Route configuration:</strong> etc/frontend/routes.xml (or adminhtml)</li>
        <li><strong>Front Controller:</strong> Loops through routers to find match</li>
        <li><strong>Custom router interface:</strong> <code>RouterInterface</code> with <code>match()</code> method</li>
        <li><strong>Match method:</strong> Returns <code>ActionInterface</code> or <code>null</code></li>
        <li><strong>Registration:</strong> Register router in di.xml with sortOrder</li>
        <li><strong>Default routers:</strong> Base (20), UrlRewrite (40), CMS (60), Default (100)</li>
        <li><strong>Action types:</strong> Forward, Redirect, or custom ActionInterface</li>
        <li><strong>Controller path:</strong> Vendor/Module/Controller/Path/Action.php</li>
        <li><strong>Request modification:</strong> Use setModuleName(), setControllerName(), setActionName()</li>
        <li><strong>Priority matters:</strong> Lower sortOrder = earlier execution</li>
    </ul>
</div>
