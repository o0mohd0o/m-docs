<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Checkout modifications span UI (UiComponents configured via layout XML and rendered by JS), backend REST APIs, and order placement. Understanding the flow, JS framework (actions/models/views), mixins, and order conversion is essential for reliable customizations.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Checkout Modifications Overview</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Checkout Mods))
    Checkout Flow
      Shipping step
      Billing step
      checkout_index_index.xml
      UiComponents config
    JS Framework
      Actions (send REST)
      Models (data/logic)
      Views (render UI)
      Mixins
    Backend REST API
      webapi.xml
      Self-auth for session
    Order Placement
      Convert quote to order
      Place order (payment)
      Save order, invalidate quote
      checkout_submit_all_after event
    </div>
</div>

<h2>Checkout Flow (Steps)</h2>

<div class="directory-card">
    <p>Checkout consists of <strong>two main steps</strong>:</p>
    <ol>
        <li><strong>Shipping:</strong> Shipping address + shipping methods selection.</li>
        <li><strong>Billing:</strong> Billing address, payment method, and order submission.</li>
    </ol>
    <div class="directory-path">view/frontend/layout/checkout_index_index.xml</div>
    <p>Checkout steps are defined in <code>checkout_index_index.xml</code>. The interface is rendered by <strong>UiComponents</strong>, whose configuration comes from this layout XML.</p>
    <div class="warning-box"><strong>Note:</strong> UiComponents config via layout XML is unusual; Magento has backend code that parses layout instructions and converts them into UiComponent config.</div>
</div>

<h2>JavaScript Framework</h2>

<div class="directory-card">
    <p>Checkout UI and logic are driven by JS modules in <code>Magento/Checkout/view/frontend/web/js/</code>.</p>
    <div class="directory-path">Magento/Checkout/view/frontend/web/js/</div>
    <h3>General Rules for Customization</h3>
    <ul>
        <li>Most work is done by <strong>JavaScript</strong>; use <strong>mixins</strong> to customize core behavior.</li>
        <li>Layout XML is flexible; sometimes you can swap components directly in layout.</li>
        <li>JS framework can be viewed (tentatively) as <strong>MVC</strong>:
            <ul>
                <li><strong>Actions</strong> (<code>js/action/</code>): Send requests to backend (e.g., <code>place-order.js</code>).</li>
                <li><strong>Models</strong> (<code>js/model/</code>): Data storage and business logic.</li>
                <li><strong>Views</strong> (<code>js/view/</code>): UI rendering (Knockout templates).</li>
            </ul>
        </li>
    </ul>
    <div class="key-point"><strong>Tip:</strong> If customizing UI, look in <code>view/</code>. If modifying data sent to backend, check <code>actions/</code> and <code>models/</code>.</div>
</div>

<h3>Checkout JS Actions & Models</h3>

<div class="directory-card">
    <p><strong>Actions</strong> prepare data and call models to send REST requests. For example:</p>
    <div class="directory-path">Magento/Checkout/view/frontend/web/js/action/place-order.js</div>
    <p>This action prepares order data and calls a model to POST via REST API.</p>
    <div class="success-box"><strong>Key:</strong> Actions often coordinate between UI and models; models execute the actual XHR.</div>
</div>

<h2>Backend REST API</h2>

<div class="directory-card">
    <p>Checkout JS modules send REST requests to backend endpoints defined in <code>webapi.xml</code>.</p>
    <div class="directory-path">Magento/Checkout/etc/webapi.xml</div>
    <p>Magento uses a <strong>self-authentication mechanism</strong> to associate the request with the frontend session (guest or customer).</p>
    <ul>
        <li>REST resources handle operations like saving addresses, selecting shipping, placing orders.</li>
        <li>Check <code>webapi.xml</code> for available endpoints during checkout.</li>
    </ul>
</div>

<h2>Order Placement Sequence</h2>

<div class="directory-card">
    <p>Order placement is the final step in checkout. It follows a sequence:</p>
    <ol>
        <li><strong>Convert quote to order:</strong> Create Order, OrderItem, OrderPayment, OrderAddress objects and populate from Quote data.
            <div class="directory-path">\Magento\Quote\Model\QuoteManagement::submitQuote()</div>
            <p>Uses converter classes to map Quote → Order.</p>
        </li>
        <li><strong>Place order (submit payment):</strong> Process payment via the selected payment method.
            <div class="directory-path">\Magento\Sales\Model\Order, \Magento\Sales\Model\Order\Payment</div>
        </li>
        <li><strong>Save order, invalidate quote, send email:</strong> Persist order to DB, deactivate quote, trigger confirmation email (may be async via cron). Sometimes creates an invoice automatically.</li>
    </ol>
</div>

<h3>checkout_submit_all_after Event</h3>

<div class="directory-card">
    <p>This event fires <strong>after the order transaction commits</strong>, ensuring your observer won't break payment/order saving.</p>
    <div class="success-box"><strong>Use case:</strong> Extensively used for custom post-order operations (e.g., integrations, logging, notifications).</div>
    <pre><code>&lt;event name="checkout_submit_all_after"&gt;
    &lt;observer name="vendor_module_after_order" instance="Vendor\Module\Observer\AfterOrder" /&gt;
&lt;/event&gt;</code></pre>
</div>

<h2>Customization Strategies</h2>

<div class="directory-card">
    <ul>
        <li><strong>UI changes:</strong> Modify <code>checkout_index_index.xml</code> to swap/add UiComponents, or use JS mixins on <code>view/</code> modules.</li>
        <li><strong>Data/logic changes:</strong> Mixin <code>actions/</code> or <code>models/</code> to alter data sent to backend or response handling.</li>
        <li><strong>Backend validation/processing:</strong> Plugin or preference on QuoteManagement, Order, Payment classes, or use observers for events like <code>checkout_submit_all_after</code>.</li>
        <li><strong>New step:</strong> Add a step via layout XML and JS components (advanced).</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/checkout/checkout-customize/" target="_blank">Customize Checkout (Official Docs)</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/module-reference/" target="_blank">Module Reference: Magento_Checkout</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/ui-components/" target="_blank">UI Components</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Flow:</strong> Shipping (address + methods) → Billing (address, payment, submit).</li>
        <li><strong>Config:</strong> <code>checkout_index_index.xml</code> defines UiComponents for checkout steps.</li>
        <li><strong>JS:</strong> Actions send REST; models handle data; views render UI. Use mixins for customization.</li>
        <li><strong>REST API:</strong> <code>Magento/Checkout/etc/webapi.xml</code> lists endpoints; self-auth ties to frontend session.</li>
        <li><strong>Order placement:</strong> Quote → Order conversion (<code>QuoteManagement::submitQuote()</code>), place order (payment), save/email.</li>
        <li><strong>Event:</strong> <code>checkout_submit_all_after</code> fires after transaction commit—safe for custom post-order logic.</li>
    </ul>
</div>
