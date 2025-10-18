<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> The di.xml file dictates how classes are instantiated and configured using Dependency Injection (DI), giving you tremendous control over how objects are wired together.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px; border: none;">
        <i class="fas fa-project-diagram"></i> di.xml Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((di.xml))
    Locations
      etc/
      etc/adminhtml/
      etc/frontend/
    Nodes
      preference
        Override classes
        Implement interfaces
      type
        Modify constructor args
        xsi:type values
      virtualType
        Same code different args
      plugins
        Interceptors
    xsi:type Values
      string
      boolean
      number
      array
      object
      const
    </div>
</div>

<h2>The Concept of Dependency Injection (DI)</h2>
<div class="di-card">
    <h4><i class="fas fa-cog"></i> What is Dependency Injection?</h4>
    <p><strong>Core Principle:</strong> A class is provided with the resources (other classes) it needs directly in its <code>__construct</code> method.</p>
    <div class="success-box">
        <p><strong>Magento uses Constructor Dependency Injection</strong></p>
        <ul class="mb-0">
            <li>Classes don't call static methods or use <code>new</code> keyword</li>
            <li>Classes simply declare what they need in the constructor</li>
            <li>Magento's DI system delivers the necessary instances automatically</li>
        </ul>
    </div>
</div>

<h2>Purpose and Location of di.xml</h2>
<p>The <code>di.xml</code> configuration file instructs the Object Manager how to manage class dependencies.</p>
<div class="di-card">
    <h4><i class="fas fa-map-marker-alt"></i> File Locations</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <strong>Global:</strong>
                <pre class="mb-0"><code>etc/di.xml</code></pre>
                <small>Applies to all areas</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <strong>Admin:</strong>
                <pre class="mb-0"><code>etc/adminhtml/di.xml</code></pre>
                <small>Admin panel only</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <strong>Frontend:</strong>
                <pre class="mb-0"><code>etc/frontend/di.xml</code></pre>
                <small>Storefront only</small>
            </div>
        </div>
    </div>
</div>

<div class="success-box">
    <h5><i class="fas fa-check-circle"></i> What You Can Do with di.xml</h5>
    <ol class="mb-0">
        <li><strong>Substitute classes</strong> using preferences</li>
        <li><strong>Create new classes</strong> with customized arguments using virtual types</li>
        <li><strong>Change constructor arguments</strong> for a specific class using the type element</li>
        <li><strong>Register custom routers</strong></li>
    </ol>
</div>

<h2>Key Usages</h2>

<h3>1. Preferences (<code>&lt;preference&gt;</code>)</h3>
<div class="di-card">
    <div class="node-badge">&lt;preference&gt;</div>
    <p><strong>Use:</strong> Substitute the requested class or interface (<code>for</code>) with a different concrete class (<code>type</code>).</p>
    <pre><code>&lt;preference for="Magento\Catalog\Api\ProductRepositoryInterface"
            type="Magento\Catalog\Model\ProductRepository" /&gt;</code></pre>
    <div class="warning-box">
        <strong>Use sparingly:</strong> Only one preference can exist per class system‑wide.
    </div>
</div>

<h3>2. Type (<code>&lt;type&gt;</code>)</h3>
<div class="di-card">
    <div class="node-badge">&lt;type&gt;</div>
    <p><strong>Use:</strong> Modify constructor arguments for a specific class.</p>
    <pre><code>&lt;type name="Bonlineco\Blog\Model\PostRepository"&gt;
    &lt;arguments&gt;
        &lt;argument name="pageSize" xsi:type="number"&gt;10&lt;/argument&gt;
        &lt;argument name="defaultSort" xsi:type="string"&gt;created_at DESC&lt;/argument&gt;
    &lt;/arguments&gt;
&lt;/type&gt;</code></pre>
    <h4 class="mt-3">xsi:type values</h4>
    <ul>
        <li><code>string</code>, <code>boolean</code>, <code>number</code>, <code>array</code>, <code>object</code>, <code>const</code></li>
    </ul>
</div>

<h3>3. Virtual Types (<code>&lt;virtualType&gt;</code>)</h3>
<div class="di-card">
    <div class="node-badge">&lt;virtualType&gt;</div>
    <p><strong>Use:</strong> Create a new configuration of an existing class with different constructor args.</p>
    <pre><code>&lt;virtualType name="BonlinecoDebugLogger" type="Magento\Framework\Logger\Monolog"&gt;
    &lt;arguments&gt;
        &lt;argument name="name" xsi:type="string"&gt;bonlinecoDebug&lt;/argument&gt;
    &lt;/arguments&gt;
&lt;/virtualType&gt;</code></pre>
</div>

<h3>4. Plugins (Interceptors)</h3>
<div class="di-card">
    <div class="node-badge">Interceptors</div>
    <p>Plugins wrap public methods to run logic before/after/around them. Magento generates <code>\Interceptor</code> classes in <code>generated/</code>.</p>
    <pre><code>&lt;type name="Magento\Catalog\Model\ProductRepository"&gt;
    &lt;plugin name="bonlineco_blog_product_plugin"
            type="Bonlineco\Blog\Plugin\ProductRepositoryPlugin"
            sortOrder="10" /&gt;
&lt;/type&gt;</code></pre>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points</h4>
    <ul class="mb-0">
        <li>Know the 3 locations for di.xml: <code>etc/</code>, <code>etc/adminhtml/</code>, <code>etc/frontend/</code></li>
        <li>Understand when to use <code>&lt;preference&gt;</code> vs <code>&lt;type&gt;</code> vs <code>&lt;virtualType&gt;</code></li>
        <li>Remember all 6 <code>xsi:type</code> values</li>
        <li>Preferences are global and conflict‑prone</li>
        <li>Plugins enable Interceptors and live in <code>generated/</code></li>
        <li>Magento uses constructor DI exclusively</li>
    </ul>
</div>
