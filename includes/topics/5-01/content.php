<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding cart components from both user and developer perspectives is essential to implement add-to-cart flows, totals recalculation, item rendering, and address handling reliably, especially across edge cases like quote merging.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Cart Components Overview</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Cart Components))
    User View
      Shopping cart
      Cart items (minicart/cart page)
      Shipping address (estimates)
      Discounts (coupon)
      Totals (subtotal, discount, tax)
    Dev View
      Quote (Magento\Quote\Model\Quote)
      Cart (Magento\Checkout\Model\Cart)
      Items (Quote\Item)
      Address (Quote\Address)
      Totals (Total models)
      Renderers (by product type)
      Merge Quotes
    </div>
</div>

<h2>Cart Components (End‑User Perspective)</h2>

<div class="directory-card">
    <ul>
        <li><strong>Shopping cart:</strong> Triggered when a product is added. Products can appear via multiple flows:
            <ol>
                <li><strong>Add to Cart</strong> on product/category pages.</li>
                <li><strong>Reorder</strong> from My Account (products may have changed).</li>
                <li><strong>Wishlist</strong> moving items to cart.</li>
                <li><strong>Quote merge</strong> after login (guest cart merged with customer cart).</li>
            </ol>
        </li>
        <li><strong>Cart items:</strong> Viewed on the cart page and in the minicart.</li>
        <li><strong>Shipping address:</strong> Estimate section on cart page triggers shipping price calculation (typical of checkout).</li>
        <li><strong>Discounts:</strong> Apply coupon codes (managed by Promo Rules).</li>
        <li><strong>Totals:</strong> Subtotal, discount, tax (also in minicart).</li>
    </ul>
</div>

<h2>Cart Components (Developer Perspective)</h2>

<h3>Quote vs Cart</h3>
<div class="directory-card">
    <ul>
        <li><strong>Cart wrapper:</strong> <code>Magento\Checkout\Model\Cart</code> wraps <code>Magento\Quote\Model\Quote</code>.</li>
        <li><strong>Quote:</strong> The core model that owns items and addresses, decides totals recollection, holds payment (checkout scope), and merges/collects data.</li>
    </ul>
    <div class="directory-path">Magento/Quote/Model/Quote.php</div>
    <div class="key-point">Key responsibilities: add product/items, collect totals, manage addresses, merge quotes, determine virtual status.</div>
    <div class="directory-card" style="margin-top:10px;">
        <strong>Important Quote methods:</strong>
        <ul>
            <li><code>beforeSave()</code>, <code>*load()</code>, <code>assignCustomer()</code></li>
            <li><code>getBillingAddress()</code>, <code>getShippingAddress()</code>, <code>getAllShippingAddresses()</code> (multi-shipping)</li>
            <li><code>getAllItems()</code>, <code>getAllVisibleItems()</code></li>
            <li><code>addItem()</code>, <code>addProduct()</code>, <code>updateItem()</code></li>
            <li><code>getIsVirtual()</code>, <code>merge()</code>, <code>collectTotals()</code></li>
        </ul>
    </div>
</div>

<h3>Cart Items</h3>
<div class="directory-card">
    <p>Items are represented by <code>Magento\Quote\Model\Quote\Item</code>. Though items are fetched through Quote, they are actually attached to <strong>Quote Address</strong> (shipping vs billing for virtual items).</p>
    <ul>
        <li><strong>representProduct()</strong> decides whether two added products should join (increase qty) or be separate line items.</li>
        <li><strong>setProduct()</strong> prepares product attributes on the item.</li>
    </ul>
    <p><strong>Rendering:</strong> Item renderers are configured via layout per product type, e.g. <code>Magento/Checkout/view/frontend/layout/checkout_cart_item_renderers.xml</code>.</p>
    <p><strong>Product types:</strong> simple → one item; configurable → parent (configurable SKU) + child (selected SKU); bundle → bundle SKU + one per selection; grouped → selected SKUs as separate items.</p>
</div>

<h3>Addresses</h3>
<div class="directory-card">
    <p>Both shipping and billing use <code>Magento\Quote\Model\Quote\Address</code>. Physical items attach to shipping address; virtual items to billing. Multi-shipping supports multiple shipping addresses.</p>
    <ul>
        <li><code>getAllItems()</code>, <code>getAllVisibleItems()</code></li>
        <li><code>getShippingRatesCollection()</code>, <code>requestShippingRates()</code> (see shipping methods/rates)</li>
    </ul>
</div>

<h3>Totals Framework</h3>
<div class="directory-card">
    <p>Totals (Subtotal, Tax, Discount, Shipping, Grand Total, etc.) are computed via <strong>Total models</strong> registered in <code>etc/sales.xml</code> (e.g., <code>Magento/Quote/etc/sales.xml</code>).</p>
    <ul>
        <li>Total model <strong>collect()</strong> calculates its amount into <code>Magento\Quote\Model\Address\Total</code> (the totals container).</li>
        <li>Total model <strong>fetch()</strong> returns data used for UI rendering.</li>
    </ul>
    <div class="directory-path">\Magento\Quote\Model\Quote\Address\Total\Subtotal</div>
</div>

<h3>Quote Merge</h3>
<div class="directory-card">
    <p>When a guest adds items then logs in, Magento merges the guest quote with the customer's active quote. This is a frequent source of edge cases—plan for option conflicts, availability changes, and totals recollection.</p>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/module-reference/" target="_blank">Module Reference</a></li>
        <li><a href="https://developer.adobe.com/commerce/rest-api/reference/sales/" target="_blank">Sales & Checkout APIs</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/checkout/" target="_blank">Checkout & Quote Architecture</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Quote vs Cart:</strong> Cart wraps Quote; Quote owns items, addresses, totals recollection, merge.</li>
        <li><strong>Items:</strong> <code>representProduct()</code> decides line joining; renderers vary by product type.</li>
        <li><strong>Address:</strong> Shipping vs billing (virtual). Can have multiple shipping addresses (multishipping).</li>
        <li><strong>Totals:</strong> Registered in <code>etc/sales.xml</code>; total models implement <code>collect()</code>/<code>fetch()</code>.</li>
        <li><strong>Flows:</strong> Add to cart, reorder, wishlist, quote merge—test them all.</li>
    </ul>
</div>
