<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Customer Data (a.k.a. Private Content) enables full page caching while still personalizing user-specific UI (cart, welcome message, minicart) using localStorage + AJAX instead of server-side sessions in templates.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Customer Data (Private Content)</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Customer Data))
    Goal
      Keep FPC enabled
      Personalize via JS
    Storage
      Browser localStorage
    JS API
      Magento_Customer/js/customer-data
      get / reload / subscribe
    Sections
      etc/sections.xml
      Invalidation by actions
      /customer/section/load
    Use Cases
      Minicart
      Welcome message
      Messages
    </div>
</div>

<h2>The Problem With Sessions in Templates</h2>

<div class="directory-card">
    <p>Rendering session-dependent content in <code>*.phtml</code> prevents Full Page Cache (FPC) and Varnish from caching the page HTML.</p>
    <pre><code>&lt;!-- Avoid this pattern in templates --&gt;
&lt;div class="greeting"&gt;
  Welcome &lt;?= $block->getSession()->getUsername(); ?&gt;!
&lt;/div&gt;
</code></pre>
    <p>Instead, move user-specific pieces to the <strong>client side</strong> using the Customer Data framework.</p>
</div>

<h2>Approach: Private Content on the Client</h2>

<div class="directory-card">
    <ul>
        <li><strong>Local storage:</strong> User-specific data is persisted in the browser (localStorage) and hydrated via AJAX.</li>
        <li><strong>Placeholders:</strong> Server returns fully cached HTML with placeholders; JS fills them after load.</li>
        <li><strong>customerData JS module:</strong> Provides API to read, subscribe, and reload sections.</li>
    </ul>
</div>

<h2>Using the customerData Module</h2>

<div class="directory-card">
    <div class="directory-path">Magento_Customer/js/customer-data</div>
    <pre><code>define(['Magento_Customer/js/customer-data'], function (customerData) {
    'use strict';

    // Read a section (Knockout observable)
    var cart = customerData.get('cart');

    // Get current value
    var cartData = cart();

    // React to changes
    cart.subscribe(function (newCart) {
        // update UI with newCart
    });

    // Force reload of one or more sections
    customerData.reload(['cart', 'customer'], true);
});</code></pre>
    <ul>
        <li><strong>get(name)</strong> returns a KO observable; call it as a function to read, or subscribe to updates.</li>
        <li><strong>reload(sections, forceNew)</strong> triggers AJAX to <code>/customer/section/load</code> to refresh data.</li>
    </ul>
</div>

<h2>Canonical Example</h2>

<div class="directory-card">
    <p>See <code>Magento/Checkout/view/frontend/web/js/view/minicart.js</code> for a canonical usage of customer data (minicart content and count).</p>
</div>

<h2>Sections & Invalidation</h2>

<div class="directory-card">
    <p>The <strong>sections</strong> mechanism ensures that client-side data stays fresh when backend state changes.</p>
    <ol>
        <li><strong>Configuration:</strong> Each module declares sections and invalidating actions in <code>etc/sections.xml</code>.</li>
        <li><strong>Frontend loader:</strong> When data is missing/expired, Magento sends AJAX to fetch sections' JSON.</li>
        <li><strong>Backend provider:</strong> Aggregates data for each section and returns JSON for the frontend.</li>
        <li><strong>XHR Listener:</strong> JS listens for POST/PUT requests; matching actions invalidate affected sections.</li>
    </ol>
</div>

<h3>sections.xml Example</h3>

<div class="directory-card">
    <div class="directory-path">app/code/Vendor/Module/etc/sections.xml</div>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Customer:etc/sections.xsd"&gt;
    &lt;section name="cart"&gt;
        &lt;action name="checkout_cart_add"/&gt;
        &lt;action name="checkout_cart_updatePost"/&gt;
        &lt;action name="checkout_cart_delete"/&gt;
    &lt;/section&gt;
    &lt;section name="customer"&gt;
        &lt;action name="customer_account_loginpost"/&gt;
        &lt;action name="customer_account_logoutsuccess"/&gt;
    &lt;/section&gt;
&lt;/config&gt;</code></pre>
    <p>When these actions occur (typically via POST), Magento invalidates the specified sections; the next page view or XHR triggers reload.</p>
</div>

<h3>Rendering Private Content in HTML</h3>

<div class="directory-card">
    <p>Use <code>data-mage-init</code> or <code>x-magento-init</code> to bootstrap a small module that reads from <code>customerData</code> and updates the DOM.</p>
    <pre><code>&lt;div class="greeting" data-role="greeting"&gt;&lt;/div&gt;
&lt;script type="text/x-magento-init"&gt;
{
  "[data-role=greeting]": {
    "Vendor_Module/js/greeting": {}
  }
}
&lt;/script&gt;</code></pre>
    <div class="directory-path">view/frontend/web/js/greeting.js</div>
    <pre><code>define(['Magento_Customer/js/customer-data'], function (customerData) {
    'use strict';
    return function (element) {
        var customer = customerData.get('customer');
        var name = (customer() && customer().fullname) || 'Guest';
        element.textContent = 'Welcome ' + name + '!';
        customer.subscribe(function (data) {
            element.textContent = 'Welcome ' + ((data && data.fullname) || 'Guest') + '!';
        });
    };
});</code></pre>
</div>

<h2>Key Endpoints & Storage</h2>

<div class="directory-card">
    <ul>
        <li><strong>Load endpoint:</strong> <code>/customer/section/load</code> (returns JSON for requested sections)</li>
        <li><strong>Storage:</strong> Section data is persisted in <strong>localStorage</strong> and synced with Knockout observables.</li>
        <li><strong>Expiry:</strong> Magento uses TTL to expire sections; expired/missing sections are reloaded automatically.</li>
    </ul>
</div>

<h2>Best Practices</h2>

<div class="directory-card">
    <ul>
        <li><strong>Avoid session-dependent templates:</strong> Prefer client rendering via customerData.</li>
        <li><strong>Use sections.xml:</strong> Declare invalidation for every backend action that affects private content.</li>
        <li><strong>Minimize payload:</strong> Keep section JSON small; render on the client efficiently.</li>
        <li><strong>Subscribe instead of polling:</strong> Use observables to react to updates.</li>
        <li><strong>Force reload when needed:</strong> <code>customerData.reload(['section'], true)</code> after custom AJAX updates.</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/cache/private-content/" target="_blank">Page Caching - Private Content</a></li>
        <li><a href="https://magento.stackexchange.com/questions/186533/how-do-customer-sections-sections-xml-work" target="_blank">StackExchange: How do Customer Sections work?</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/js/ui-components/" target="_blank">UI Components</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Goal:</strong> Keep FPC on; render personalized bits via JS from localStorage.</li>
        <li><strong>API:</strong> <code>customerData.get('section')</code> (observable), <code>.subscribe()</code>, <code>.reload()</code>.</li>
        <li><strong>Invalidation:</strong> <code>etc/sections.xml</code> maps backend actions to sections; POST/PUT XHR triggers invalidation.</li>
        <li><strong>Endpoint:</strong> <code>/customer/section/load</code> provides sections JSON.</li>
        <li><strong>Example:</strong> Minicart, welcome message, messages area.</li>
    </ul>
</div>
