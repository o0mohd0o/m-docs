<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> These four components are the foundation of Magento customization. Knowing when and how to use each one is critical for the exam and real-world development.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px; border: none;">
        <i class="fas fa-project-diagram"></i> Customization Methods Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Customization<br/>Methods))
    Interceptors
      Auto-generated
      Enable plugins
      generated/ directory
      ClassName\Interceptor
    Plugins
      before
        Modify inputs
        Lowest sortOrder first
      after
        Modify outputs
        Highest sortOrder first
      around
        Control execution
        Use sparingly
      Limitations
        No final methods
        No private/protected
        No static
        No constructors
    Preferences
      Class substitution
      Implement interfaces
      Override classes
      Use sparingly
      Conflicts possible
    Event Observers
      events.xml
      ObserverInterface
      execute method
      Can be disabled
      Automatic events
    </div>
</div>

<h2>1. Interceptors (The Plumbing for Plugins)</h2>

<div class="concept-card">
    <h4><i class="fas fa-plug"></i> What Are Interceptors?</h4>
    <p>The <strong>Interceptor class</strong> is the mechanism that makes plugins possible in Magento.</p>

    <div class="info-box">
        <strong>How It Works:</strong>
        <ol class="mb-0">
            <li>When the DI system instantiates a class with configured plugins...</li>
            <li>The Object Manager intercepts the process</li>
            <li>Magento appends <code>\Interceptor</code> to the class path</li>
            <li>Example: <code>OrderData</code> becomes <code>OrderData\Interceptor</code></li>
            <li>The Interceptor is auto-generated in the <code>generated/</code> directory</li>
            <li>When a method is called, it executes plugins then calls the original method</li>
        </ol>
    </div>

    <p><strong>Example:</strong></p>
    <pre><code>// Original Class
Magento\Sales\Model\Order

// When plugins are configured
Magento\Sales\Model\Order\Interceptor  (auto-generated in generated/)</code></pre>

    <div class="key-point">
        <strong>Key Point:</strong> Interceptors are automatically created by Magento. You never write them manually - they're generated when you define plugins in di.xml.
    </div>
</div>

<h2>2. Plugins (The Preferred Customization Hook)</h2>

<p>Plugins are the <strong>recommended tool</strong> for adjusting core functionality or the behavior of another module. They allow you to alter input, change output, or stop execution of any public method.</p>

<div class="success-box">
    <strong>✅ Why Plugins Are Preferred:</strong>
    <ul class="mb-0">
        <li>Non-invasive - don't modify core files</li>
        <li>Multiple plugins can coexist</li>
        <li>Controlled execution order via sortOrder</li>
        <li>Can be disabled without conflicts</li>
    </ul>
</div>

<h3>Plugin Types</h3>

<div class="row">
    <div class="col-md-4">
        <div class="concept-card">
            <h5>1️⃣ Before Plugins</h5>
            <p><strong>Purpose:</strong> Execute before the observed method runs.</p>
            <p><strong>Use Case:</strong> Change input parameters sent to the original method.</p>
            <p><strong>Sort Order:</strong> Lowest to highest</p>
            <pre><code>public function beforeSave(
    ProductRepository $subject,
    ProductInterface $product
) {
    // Modify product
    $product->setSku(
        strtoupper($product->getSku())
    );
    return [$product];
}</code></pre>
            <div class="info-box">
                <small><strong>Note:</strong> Return parameters as an array!</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="concept-card">
            <h5>2️⃣ After Plugins</h5>
            <p><strong>Purpose:</strong> Execute after the method completes.</p>
            <p><strong>Use Case:</strong> Alter the output ($result) returned by the method.</p>
            <p><strong>Sort Order:</strong> Highest to lowest</p>
            <pre><code>public function afterGet(
    ProductRepository $subject,
    ProductInterface $result
) {
    // Modify result
    $result->setCustomAttribute(
        'processed', true
    );
    return $result;
}</code></pre>
            <div class="info-box">
                <small><strong>Note:</strong> Receives original parameters too!</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="concept-card">
            <h5>3️⃣ Around Plugins</h5>
            <p><strong>Purpose:</strong> Determine whether original method executes.</p>
            <p><strong>Use Case:</strong> Stop execution of all further plugins and original method.</p>
            <p><strong>Warning:</strong> Use sparingly!</p>
            <pre><code>public function aroundSave(
    ProductRepository $subject,
    callable $proceed,
    ProductInterface $product
) {
    // Before original
    $startTime = microtime(true);

    // Call original
    $result = $proceed($product);

    // After original
    $time = microtime(true) - $startTime;

    return $result;
}</code></pre>
            <div class="warning-box">
                <small><strong>Warning:</strong> Can cause unintended consequences!</small>
            </div>
        </div>
    </div>
</div>

<h3>Plugin Configuration</h3>
<div class="concept-card">
    <h4><i class="fas fa-file-code"></i> etc/di.xml</h4>
    <pre><code>&lt;type name="Magento\Catalog\Model\ProductRepository"&gt;
    &lt;plugin name="bonlineco_blog_product_plugin" 
            type="Bonlineco\Blog\Plugin\ProductRepositoryPlugin" 
            sortOrder="10" 
            disabled="false"/&gt;
&lt;/type&gt;</code></pre>

    <p><strong>Attributes:</strong></p>
    <ul>
        <li><code>name</code> - Unique plugin identifier</li>
        <li><code>type</code> - Plugin class name</li>
        <li><code>sortOrder</code> - Execution order (default: 10)</li>
        <li><code>disabled</code> - Enable/disable plugin (default: false)</li>
    </ul>
</div>

<h3>Plugin Limitations</h3>
<div class="warning-box">
    <h5><i class="fas fa-exclamation-triangle"></i> Plugins CANNOT Be Applied To:</h5>
    <ul class="mb-0">
        <li><strong>Final methods or classes</strong> - Cannot be overridden</li>
        <li><strong>Private or protected methods</strong> - Not publicly accessible</li>
        <li><strong>Static methods</strong> - Called on class, not instance</li>
        <li><strong>Constructors</strong> - Use di.xml <code>&lt;type&gt;</code> instead</li>
    </ul>
</div>

<h2>3. Preferences (Class Substitution)</h2>

<div class="concept-card">
    <h4><i class="fas fa-exchange-alt"></i> What Are Preferences?</h4>
    <p>A preference is an instruction to Magento's DI system to <strong>substitute one class for another</strong> across the entire application.</p>

    <h5>Primary Use Cases:</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="success-box">
                <strong>1. Implement Interfaces</strong>
                <p>Specify concrete implementation for interfaces.</p>
                <pre><code>&lt;preference 
    for="Magento\Catalog\Api\ProductRepositoryInterface"
    type="Magento\Catalog\Model\ProductRepository" /&gt;</code></pre>
            </div>
        </div>
        <div class="col-md-6">
            <div class="success-box">
                <strong>2. Override Classes</strong>
                <p>Modify private/protected methods (plugins can't do this).</p>
                <pre><code>&lt;preference 
    for="Magento\Checkout\Block\Cart"
    type="Bonlineco\CustomCheckout\Block\Cart" /&gt;</code></pre>
            </div>
        </div>
    </div>

    <div class="warning-box">
        <h5><i class="fas fa-exclamation-circle"></i> Use Preferences Sparingly!</h5>
        <p><strong>Problem:</strong> Only ONE preference can exist per class system-wide.</p>
        <p><strong>Risk:</strong> If two modules try to override the same class with preferences, you'll have a conflict.</p>
        <p><strong>Solution:</strong> Use plugins whenever possible - they can coexist!</p>
    </div>

    <p><strong>Complete Example:</strong></p>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
        xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd"&gt;
    
    &lt;!-- Implement interface --&gt;
    &lt;preference for="Bonlineco\Blog\Api\PostRepositoryInterface"
                type="Bonlineco\Blog\Model\PostRepository" /&gt;
    
    &lt;!-- Override class (only if you need to modify private/protected methods) --&gt;
    &lt;preference for="Magento\Catalog\Block\Product\View"
                type="Bonlineco\Catalog\Block\Product\View" /&gt;
&lt;/config&gt;</code></pre>
</div>

<h2>4. Event Observers (The Traditional Hook)</h2>

<div class="concept-card">
    <h4><i class="fas fa-eye"></i> What Are Event Observers?</h4>
    <p>Event observers provide a way to hook into the Magento application flow at specific, predetermined points where an event is <strong>dispatched</strong>.</p>

    <div class="info-box">
        <strong>Key Concepts:</strong>
        <ul class="mb-0">
            <li>Events are dispatched at specific points in the code</li>
            <li>Observers "listen" for these events</li>
            <li>When event fires, all registered observers execute</li>
            <li>Observers can be scoped to specific areas (frontend/adminhtml)</li>
        </ul>
    </div>
</div>

<h3>Registering an Observer</h3>
<div class="concept-card">
    <h4><i class="fas fa-file-code"></i> etc/frontend/events.xml</h4>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Event/etc/events.xsd"&gt;
    
    &lt;event name="catalog_product_save_after"&gt;
        &lt;observer name="bonlineco_blog_product_save" 
                  instance="Bonlineco\Blog\Observer\ProductSaveObserver"
                  disabled="false" /&gt;
    &lt;/event&gt;
    
    &lt;event name="customer_login"&gt;
        &lt;observer name="bonlineco_blog_customer_login" 
                  instance="Bonlineco\Blog\Observer\CustomerLoginObserver" /&gt;
    &lt;/event&gt;
    
&lt;/config&gt;</code></pre>

    <p><strong>Attributes:</strong></p>
    <ul>
        <li><code>name</code> - Event name to listen for</li>
        <li><code>instance</code> - Observer class</li>
        <li><code>disabled</code> - Enable/disable observer (optional)</li>
    </ul>
</div>

<h3>Observer Class Implementation</h3>
<div class="concept-card">
    <h4><i class="fas fa-code"></i> Observer/ProductSaveObserver.php</h4>
    <pre><code>&lt;?php
namespace Bonlineco\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ProductSaveObserver implements ObserverInterface
{
    /**
     * Execute observer
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        // Get event data
        $product = $observer->getEvent()->getProduct();
        
        // Your custom logic
        if ($product->getSku()) {
            // Do something with the product
            $product->setCustomAttribute('modified_by', 'bonlineco');
        }
    }
}</code></pre>

    <div class="key-point">
        <strong>Requirements:</strong>
        <ul class="mb-0">
            <li>Must implement <code>ObserverInterface</code></li>
            <li>Must have an <code>execute(Observer $observer)</code> method</li>
            <li>Access event data via <code>$observer->getEvent()->getData('key')</code></li>
        </ul>
    </div>
</div>

<h3>Disabling Observers</h3>
<div class="concept-card">
    <p>You can disable another module's observer in your own events.xml:</p>
    <pre><code>&lt;event name="catalog_product_save_after"&gt;
    &lt;observer name="third_party_observer" disabled="true" /&gt;
&lt;/event&gt;</code></pre>
</div>

<h3>Automatic Model Events</h3>
<div class="concept-card">
    <h4><i class="fas fa-magic"></i> Built-in Events for AbstractModel</h4>
    <p>Magento automatically triggers events for classes extending <code>\Magento\Framework\Model\AbstractModel</code> (typically database-backed models).</p>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Event Pattern</th>
                    <th>When Triggered</th>
                    <th>Example</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>{prefix}_load_before</code></td>
                    <td>Before loading model from DB</td>
                    <td><code>catalog_product_load_before</code></td>
                </tr>
                <tr>
                    <td><code>{prefix}_load_after</code></td>
                    <td>After loading model from DB</td>
                    <td><code>catalog_product_load_after</code></td>
                </tr>
                <tr>
                    <td><code>{prefix}_save_before</code></td>
                    <td>Before saving model to DB</td>
                    <td><code>catalog_product_save_before</code></td>
                </tr>
                <tr>
                    <td><code>{prefix}_save_after</code></td>
                    <td>After saving model to DB</td>
                    <td><code>catalog_product_save_after</code></td>
                </tr>
                <tr>
                    <td><code>{prefix}_save_commit_after</code></td>
                    <td>After DB transaction commits</td>
                    <td><code>catalog_product_save_commit_after</code></td>
                </tr>
                <tr>
                    <td><code>{prefix}_delete_before</code></td>
                    <td>Before deleting model from DB</td>
                    <td><code>catalog_product_delete_before</code></td>
                </tr>
                <tr>
                    <td><code>{prefix}_delete_after</code></td>
                    <td>After deleting model from DB</td>
                    <td><code>catalog_product_delete_after</code></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="info-box">
        <strong>Event Prefix:</strong> The <code>{prefix}</code> comes from the model's <code>$_eventPrefix</code> variable.
        <p class="mb-0">Example: <code>Magento\Catalog\Model\Product</code> has <code>$_eventPrefix = 'catalog_product'</code></p>
    </div>
</div>

<h2>Comparison: When to Use Each Method</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Method</th>
                <th>Use When</th>
                <th>Pros</th>
                <th>Cons</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Plugins</strong></td>
                <td>Modifying public method behavior</td>
                <td>
                    • Multiple can coexist<br>
                    • Controlled order<br>
                    • Non-invasive<br>
                    • Recommended approach
                </td>
                <td>
                    • Can't modify private/protected<br>
                    • Can't use on final/static/constructor
                </td>
            </tr>
            <tr>
                <td><strong>Preferences</strong></td>
                <td>
                    • Implementing interfaces<br>
                    • Modifying private/protected methods
                </td>
                <td>
                    • Full class control<br>
                    • Can modify anything
                </td>
                <td>
                    • Only one per class<br>
                    • Conflict-prone<br>
                    • Use sparingly
                </td>
            </tr>
            <tr>
                <td><strong>Event Observers</strong></td>
                <td>Reacting to specific application events</td>
                <td>
                    • Multiple observers per event<br>
                    • Area-specific<br>
                    • Can be disabled<br>
                    • Loosely coupled
                </td>
                <td>
                    • Limited to dispatched events<br>
                    • Can't modify return values<br>
                    • May impact performance
                </td>
            </tr>
            <tr>
                <td><strong>Interceptors</strong></td>
                <td>You don't choose - auto-generated</td>
                <td>• Enables plugin system</td>
                <td>• Not directly controllable</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>Plugins are preferred</strong> for most customizations - use them first!</li>
        <li>Know the 3 plugin types and their sortOrder (before: low→high, after: high→low)</li>
        <li>Remember plugin limitations: no final, private, protected, static, or constructors</li>
        <li>Preferences should be used sparingly - only ONE can exist per class</li>
        <li>Interceptors are auto-generated in <code>generated/</code> - you never write them</li>
        <li>Observers must implement <code>ObserverInterface</code> and have <code>execute()</code> method</li>
        <li>Know the automatic model events: <code>_load_before/after</code>, <code>_save_before/after/commit_after</code>, <code>_delete_before/after</code></li>
        <li>Observers are registered in <code>events.xml</code>, can be scoped to areas</li>
        <li>Around plugins should be used sparingly due to performance impact</li>
        <li>Before plugins return parameters as array, after plugins return modified result</li>
    </ul>
</div>
