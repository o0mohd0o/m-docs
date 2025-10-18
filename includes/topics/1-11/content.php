<!-- Topic 1.11: URL Rewrites -->
<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Topic Overview:</strong> Understanding how Magento processes user-friendly URLs, the url_rewrite table, and the complete URL processing workflow.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h3 style="text-align: center; margin-bottom: 20px; border: none;">
        <i class="fas fa-link"></i> URL Rewrite System Overview
    </h3>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((URL Rewrites))
    URL Key
      Product URL key
      Category URL key
      CMS page URL key
      Auto-generated
    url_rewrite Table
      request_path
      target_path
      entity_type
      redirect_type
    Processing Flow
      Bootstrap
      FrontController
      Router Loop
      Match Request
    Router Order
      Robots
      URL Rewrite
      Standard
      CMS
      Default 404
    </div>
</div>

<h2>What are URL Rewrites?</h2>

<div class="concept-card">
    <h4><i class="fas fa-info-circle"></i> User-Friendly URLs</h4>
    
    <p>URL rewrites transform technical URLs into SEO-friendly, readable URLs:</p>

    <div class="row">
        <div class="col-md-6">
            <div class="warning-box">
                <h5>Technical URL (Without Rewrite)</h5>
                <pre><code>catalog/product/view/id/123</code></pre>
                <p class="mb-0">Not user-friendly, not SEO-optimized</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="success-box">
                <h5>User-Friendly URL (With Rewrite)</h5>
                <pre><code>blue-widget.html</code></pre>
                <p class="mb-0">Clean, readable, SEO-friendly</p>
            </div>
        </div>
    </div>

    <div class="key-point">
        <strong>Key Benefit:</strong> URL rewrites improve SEO rankings and user experience by creating memorable, descriptive URLs.
    </div>
</div>

<h2>URL Key Attribute</h2>

<div class="concept-card">
    <h4><i class="fas fa-key"></i> Defining User-Friendly URLs</h4>
    
    <p>The <strong>URL key</strong> is the attribute/column that defines the user-friendly URL for:</p>
    <ul>
        <li>Products</li>
        <li>Categories</li>
        <li>CMS pages</li>
    </ul>

    <h5>How URL Keys Work:</h5>
    <div class="success-box">
        <ol>
            <li><strong>Manual Entry:</strong> Admin can specify custom URL key</li>
            <li><strong>Auto-Generation:</strong> If empty, Magento slugifies the name
                <ul>
                    <li>Converts to lowercase</li>
                    <li>Replaces spaces with hyphens</li>
                    <li>Removes special characters</li>
                </ul>
            </li>
            <li><strong>Database Storage:</strong> Creates row in <code>url_rewrite</code> table</li>
        </ol>
    </div>

    <h5>Example: Product Name → URL Key</h5>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Auto-Generated URL Key</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Blue Widget</td>
                    <td><code>blue-widget</code></td>
                </tr>
                <tr>
                    <td>Men's Running Shoes</td>
                    <td><code>mens-running-shoes</code></td>
                </tr>
                <tr>
                    <td>32" LED TV (4K)</td>
                    <td><code>32-led-tv-4k</code></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h3>Changing URL Keys</h3>

<div class="concept-card">
    <h4><i class="fas fa-edit"></i> How to Modify URL Keys</h4>
    
    <h5>Products:</h5>
    <p><strong>Admin Path:</strong> Catalog → Products → Edit Product → Search Engine Optimization</p>
    <pre><code>URL Key: blue-widget</code></pre>

    <h5>Categories:</h5>
    <p><strong>Admin Path:</strong> Catalog → Categories → Edit Category → Search Engine Optimization</p>
    <pre><code>URL Key: electronics</code></pre>

    <h5>CMS Pages:</h5>
    <p><strong>Admin Path:</strong> Content → Pages → Edit Page</p>
    <pre><code>URL Key: about-us</code></pre>

    <div class="warning-box">
        <strong>Important:</strong> Changing a URL key creates a new URL rewrite. Configure "Create Permanent Redirect for old URL" to maintain SEO rankings.
    </div>
</div>

<h2>Category Path in Product URLs</h2>

<div class="concept-card">
    <h4><i class="fas fa-folder-tree"></i> "Use Categories Path for Product URLs"</h4>
    
    <p><strong>Configuration Path:</strong> Stores → Configuration → Catalog → Catalog → Search Engine Optimizations</p>
    
    <p><strong>Setting:</strong> Use Categories Path for Product URLs = Yes/No</p>

    <h5>Impact:</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <h5>Disabled (No)</h5>
                <pre><code>blue-widget.html</code></pre>
                <p class="mb-0">Product URL only</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="success-box">
                <h5>Enabled (Yes)</h5>
                <pre><code>electronics/gadgets/blue-widget.html</code></pre>
                <p class="mb-0">Category path included</p>
            </div>
        </div>
    </div>

    <div class="key-point">
        <strong>Multiple Rewrites:</strong> When enabled, Magento creates URL rewrites for each category the product belongs to:
        <ul class="mb-0 mt-2">
            <li><code>electronics/blue-widget.html</code></li>
            <li><code>electronics/gadgets/blue-widget.html</code></li>
            <li><code>new-arrivals/blue-widget.html</code></li>
        </ul>
    </div>
</div>

<h2>The url_rewrite Table</h2>

<div class="concept-card">
    <h4><i class="fas fa-database"></i> Database Structure</h4>
    
    <p>Magento stores all URL rewrites in the <code>url_rewrite</code> table:</p>

    <h5>Key Columns:</h5>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Column</th>
                    <th>Description</th>
                    <th>Example</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>request_path</code></td>
                    <td>User-friendly URL</td>
                    <td>blue-widget.html</td>
                </tr>
                <tr>
                    <td><code>target_path</code></td>
                    <td>Internal Magento path</td>
                    <td>catalog/product/view/id/123</td>
                </tr>
                <tr>
                    <td><code>entity_type</code></td>
                    <td>Type of entity</td>
                    <td>product, category, cms-page</td>
                </tr>
                <tr>
                    <td><code>entity_id</code></td>
                    <td>Entity's database ID</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td><code>redirect_type</code></td>
                    <td>HTTP redirect code</td>
                    <td>0 (no redirect), 301, 302</td>
                </tr>
                <tr>
                    <td><code>store_id</code></td>
                    <td>Store view ID</td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h5>Example Query:</h5>
    <pre><code>SELECT 
    request_path,
    target_path,
    entity_type,
    entity_id,
    redirect_type
FROM url_rewrite
WHERE request_path = 'blue-widget.html'
  AND store_id = 1;</code></pre>
</div>

<h3>Redirect Types</h3>

<div class="concept-card">
    <h4><i class="fas fa-directions"></i> HTTP Redirect Codes</h4>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>redirect_type</th>
                    <th>HTTP Code</th>
                    <th>Name</th>
                    <th>Use Case</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>0</code></td>
                    <td>-</td>
                    <td>No Redirect</td>
                    <td>Standard URL rewrite (internal)</td>
                </tr>
                <tr>
                    <td><code>301</code></td>
                    <td>301</td>
                    <td>Permanent Redirect</td>
                    <td>URL changed permanently (passes SEO)</td>
                </tr>
                <tr>
                    <td><code>302</code></td>
                    <td>302</td>
                    <td>Temporary Redirect</td>
                    <td>URL temporarily moved (doesn't pass SEO)</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="success-box">
        <h5>Best Practice for Redirects:</h5>
        <ul class="mb-0">
            <li><strong>Magento url_rewrite:</strong> Works but slower (PHP processing)</li>
            <li><strong>Nginx/Apache:</strong> Faster (handled at web server level)</li>
            <li><strong>Recommendation:</strong> Use server-level redirects for high traffic sites</li>
        </ul>
    </div>
</div>

<h2>URL Processing Flow</h2>

<div class="concept-card">
    <h4><i class="fas fa-stream"></i> Complete Request Processing</h4>
    
    <div class="success-box">
        <h5>Step-by-Step Flow:</h5>
        <ol>
            <li><strong>Request arrives</strong> at <code>pub/index.php</code></li>
            <li><strong>Bootstrap initializes</strong> - <code>\Magento\Framework\App\Bootstrap</code></li>
            <li><strong>Application launches</strong> - <code>\Magento\Framework\App\Http</code> for web requests</li>
            <li><strong>FrontController initialized</strong> - Via ObjectManager</li>
            <li><strong>Router loop begins</strong> - FrontController iterates through routers</li>
            <li><strong>First match wins</strong> - Router returns ActionInterface</li>
            <li><strong>Request marked dispatched</strong> - Stops router loop</li>
            <li><strong>Action executes</strong> - Generates response</li>
        </ol>
    </div>

    <h5>FrontController Dispatch Logic:</h5>
    <pre><code>// Simplified from \Magento\Framework\App\FrontController
public function dispatch(RequestInterface $request)
{
    // Loop while not dispatched
    while (!$request->isDispatched()) {
        // Try each router
        foreach ($this->routerList as $router) {
            $actionInstance = $router->match($request);
            
            if ($actionInstance) {
                // Mark as dispatched
                $request->setDispatched(true);
                
                // Execute action
                return $actionInstance;
            }
        }
    }
}</code></pre>

    <div class="warning-box">
        <strong>Critical:</strong> Custom routers MUST call <code>$request->setDispatched(true)</code> to stop the while loop, or the router loop will continue infinitely!
    </div>
</div>

<h2>Router Execution Order</h2>

<div class="concept-card">
    <h4><i class="fas fa-list-ol"></i> Default Router Sequence</h4>
    
    <p>Routers are executed in sortOrder (priority) sequence:</p>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Order</th>
                    <th>Router</th>
                    <th>Class</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Robots</td>
                    <td><code>\Magento\Robots\Controller\Router</code></td>
                    <td>Handles /robots.txt requests</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>URL Rewrite</td>
                    <td><code>\Magento\UrlRewrite\Controller\Router</code></td>
                    <td>Processes URL rewrites from database</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Standard</td>
                    <td><code>\Magento\Framework\App\Router\Base</code></td>
                    <td>Handles standard 3-chunk URLs</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>CMS</td>
                    <td><code>\Magento\Cms\Controller\Router</code></td>
                    <td>Matches CMS pages</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Default (404)</td>
                    <td><code>\Magento\Framework\App\Router\DefaultRouter</code></td>
                    <td>Fallback - shows 404 page</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="key-point">
        <strong>Order Matters:</strong> URL Rewrite router runs BEFORE Standard router, so friendly URLs are checked before falling back to technical paths.
    </div>
</div>

<h3>URL Rewrite Router Configuration</h3>

<div class="concept-card">
    <h4><i class="fas fa-cog"></i> Router Registration Example</h4>
    
    <p>From <code>vendor/magento/module-url-rewrite/etc/frontend/di.xml</code>:</p>

    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd"&gt;
    &lt;type name="Magento\Framework\App\RouterList"&gt;
        &lt;arguments&gt;
            &lt;argument name="routerList" xsi:type="array"&gt;
                &lt;item name="urlrewrite" xsi:type="array"&gt;
                    &lt;item name="class" xsi:type="string"&gt;
                        Magento\UrlRewrite\Controller\Router
                    &lt;/item&gt;
                    &lt;item name="disable" xsi:type="boolean"&gt;false&lt;/item&gt;
                    &lt;item name="sortOrder" xsi:type="string"&gt;40&lt;/item&gt;
                &lt;/item&gt;
            &lt;/argument&gt;
        &lt;/arguments&gt;
    &lt;/type&gt;
&lt;/config&gt;</code></pre>

    <div class="info-box">
        <strong>Note:</strong> The <code>sortOrder</code> of 40 places URL Rewrite router after Base router (20) but before CMS router (60).
    </div>
</div>

<h2>Finding Pages from URLs</h2>

<div class="concept-card">
    <h4><i class="fas fa-search"></i> Determining Which Page Corresponds to a URL</h4>
    
    <h5>Method 1: Query url_rewrite Table</h5>
    <pre><code>SELECT * FROM url_rewrite
WHERE request_path LIKE '%blue-widget%';</code></pre>

    <h5>Method 2: Get Entity Information</h5>
    <pre><code>SELECT 
    ur.request_path,
    ur.target_path,
    ur.entity_type,
    ur.entity_id,
    ur.redirect_type,
    p.sku,
    p.name
FROM url_rewrite ur
LEFT JOIN catalog_product_entity_varchar p 
    ON ur.entity_id = p.entity_id
WHERE ur.request_path = 'blue-widget.html'
  AND ur.entity_type = 'product';</code></pre>

    <h5>Method 3: Check target_path</h5>
    <pre><code>-- If target_path shows:
catalog/product/view/id/123

-- Product ID is 123</code></pre>

    <div class="success-box">
        <h5>Quick Lookup Steps:</h5>
        <ol class="mb-0">
            <li>Search <code>request_path</code> column for URL segment</li>
            <li>Check <code>entity_type</code> (product, category, cms-page)</li>
            <li>Get ID from <code>entity_id</code> or parse <code>target_path</code></li>
            <li>Verify <code>store_id</code> matches expected store</li>
        </ol>
    </div>
</div>

<h2>Debugging URL Rewrites</h2>

<div class="concept-card">
    <h4><i class="fas fa-bug"></i> Troubleshooting Techniques</h4>
    
    <h5>1. Set Breakpoint in FrontController</h5>
    <pre><code>// File: vendor/magento/framework/App/FrontController.php
// Method: dispatch()

// Set breakpoint here to watch router execution
foreach ($this->routerList as $router) {
    $actionInstance = $router->match($request);
}</code></pre>

    <h5>2. Check URL Rewrite Table</h5>
    <pre><code>bin/magento indexer:reindex catalog_url</code></pre>

    <h5>3. Enable URL Rewrite Logging</h5>
    <pre><code>// Add in UrlRewrite Router
$this->logger->debug('URL Rewrite: ' . $request->getPathInfo());</code></pre>

    <h5>4. Clear Caches</h5>
    <pre><code>bin/magento cache:clean config full_page</code></pre>
</div>

<h2>Best Practices</h2>

<div class="concept-card">
    <div class="row">
        <div class="col-md-6">
            <div class="success-box">
                <h5><i class="fas fa-check-circle"></i> Do's</h5>
                <ul class="mb-0">
                    <li>Use descriptive URL keys</li>
                    <li>Create 301 redirects for old URLs</li>
                    <li>Keep URL keys consistent</li>
                    <li>Use hyphens, not underscores</li>
                    <li>Reindex after bulk URL changes</li>
                    <li>Test URL changes before deploy</li>
                    <li>Monitor url_rewrite table size</li>
                    <li>Use server-level redirects when possible</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="warning-box">
                <h5><i class="fas fa-exclamation-triangle"></i> Don'ts</h5>
                <ul class="mb-0">
                    <li>Don't use special characters in URL keys</li>
                    <li>Don't create duplicate URL keys</li>
                    <li>Don't change URLs without redirects</li>
                    <li>Don't forget to reindex</li>
                    <li>Don't ignore 404 errors</li>
                    <li>Don't create circular redirects</li>
                    <li>Don't use long URL keys (>255 chars)</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>URL Key:</strong> Attribute that defines user-friendly URL</li>
        <li><strong>Auto-generation:</strong> Magento slugifies name if URL key is empty</li>
        <li><strong>url_rewrite table:</strong> Stores all URL rewrites</li>
        <li><strong>Key columns:</strong> request_path, target_path, entity_type, entity_id, redirect_type</li>
        <li><strong>Category paths:</strong> "Use Categories Path for Product URLs" creates multiple rewrites</li>
        <li><strong>Redirect types:</strong> 0 (no redirect), 301 (permanent), 302 (temporary)</li>
        <li><strong>Processing flow:</strong> Bootstrap → FrontController → Router loop → Action</li>
        <li><strong>Router order:</strong> Robots → URL Rewrite → Standard → CMS → Default</li>
        <li><strong>URL Rewrite router:</strong> sortOrder 40, runs before Standard router</li>
        <li><strong>Finding pages:</strong> Query url_rewrite table by request_path</li>
        <li><strong>setDispatched():</strong> Must be called to stop router loop</li>
        <li><strong>Configuration:</strong> Stores → Configuration → Catalog → SEO</li>
    </ul>
</div>
