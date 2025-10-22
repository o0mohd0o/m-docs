<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Shipping and payment method configuration is critical for checkout. Understanding offline vs online shipping, TableRate CSV uploads, payment method types (offline, gateway, hosted), and payment actions (Authorize, Capture, Order) ensures correct checkout behavior.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Payment & Shipping Methods</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Payment & Shipping))
    Shipping Methods
      Offline (FlatRate, TableRate, Free, In-Store)
      Online (Carriers with API)
      TableRate CSV upload
    Payment Methods
      Offline (Check, Bank transfer, Cash on delivery, Purchase order)
      Gateway (Remote API request)
      Hosted (Redirect to external site)
    Payment Actions
      Authorize only
      Capture
      Order
    PayPal
      Express Checkout
      Enable In Context option
    </div>
</div>

<h2>Shipping Method Configuration</h2>

<div class="directory-card">
    <h3>Offline Shipping Methods</h3>
    <p><strong>Offline methods</strong> do not perform online requests when calculating shipping rates. Configuration is done entirely in admin.</p>
    <ul>
        <li><strong>Flat Rate:</strong> Fixed price per order/item.</li>
        <li><strong>Table Rate:</strong> Rates based on conditions (weight, subtotal, destination) from a CSV file.</li>
        <li><strong>Free Shipping:</strong> Configured with conditions (e.g., order total > $100).</li>
        <li><strong>In-Store Delivery:</strong> Customer picks up; no shipping cost.</li>
    </ul>
    <p>Typical configuration includes: name, price, handling fees, conditions.</p>
</div>

<h3>Table Rate CSV Upload</h3>

<div class="directory-card">
    <p><strong>Table Rate</strong> requires uploading a CSV file with rate information via admin panel.</p>
    <ul>
        <li>Download reference CSV from admin.</li>
        <li>Fill with rates based on conditions (destination, weight, subtotal, item count).</li>
        <li>Upload via Stores → Configuration → Sales → Shipping Methods → Table Rates.</li>
    </ul>
    <div class="key-point"><strong>Tip:</strong> Table Rate CSV upload is a great reference for implementing file uploads in system configuration!</div>
</div>

<div class="directory-card">
    <h3>Online Shipping Methods (Carriers)</h3>
    <p><strong>Online methods (carriers)</strong> request APIs during checkout to obtain real-time shipping rates.</p>
    <ul>
        <li>Examples: UPS, FedEx, USPS, DHL.</li>
        <li>Require credentials (API keys, account numbers).</li>
        <li>Configuration varies per carrier (e.g., allowed methods, container types, handling fees).</li>
    </ul>
    <p>See: <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/delivery/delivery.html" target="_blank">Delivery Methods</a></p>
</div>

<h2>Payment Method Configuration</h2>

<div class="directory-card">
    <p>There are <strong>three types</strong> of payment methods in Magento:</p>
    <ol>
        <li><strong>Offline:</strong> No processing during checkout; payment handled outside Magento.</li>
        <li><strong>Gateway:</strong> Sends remote API request to payment provider during checkout.</li>
        <li><strong>Hosted:</strong> Redirects customer to external site for payment, then redirects back.</li>
    </ol>
</div>

<h3>Offline Payment Methods</h3>

<div class="directory-card">
    <p>Offline methods do nothing during checkout; assume payment occurs externally.</p>
    <ul>
        <li><strong>Check/Money Order</strong></li>
        <li><strong>Bank Transfer</strong></li>
        <li><strong>Zero Subtotal Checkout</strong> (for $0 orders)</li>
        <li><strong>Cash on Delivery</strong></li>
        <li><strong>Purchase Order</strong></li>
    </ul>
    <p>Configuration is straightforward: title, instructions, order status.</p>
    <p>See: <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/payments/payments.html" target="_blank">Payment Methods</a></p>
</div>

<h3>Gateway Payment Methods</h3>

<div class="directory-card">
    <p><strong>Gateway methods</strong> send remote API requests to payment providers to process payments without leaving the Magento site.</p>
    <ul>
        <li>Configuration: API credentials, payment action, sandbox mode.</li>
        <li>Customer enters card details on Magento checkout.</li>
        <li>Magento sends data to gateway API for processing.</li>
    </ul>
    <div class="warning-box"><strong>Note:</strong> In Magento 2.4, most online methods except PayPal were removed from core. Use extensions for others.</div>
</div>

<h3>Hosted Payment Methods</h3>

<div class="directory-card">
    <p><strong>Hosted methods</strong> redirect customers to an external site for payment, then redirect back after completion.</p>
    <ul>
        <li>Example: <strong>PayPal Express Checkout</strong></li>
        <li>Customer clicks "Checkout with PayPal" → redirected to PayPal → completes payment → returns to Magento.</li>
        <li>Configuration: API credentials, payment action, return URLs.</li>
    </ul>
</div>

<h2>Payment Actions</h2>

<div class="directory-card">
    <p><strong>Payment Action</strong> defines what happens when placing a payment. Configured per payment method.</p>
    <div class="directory-path">\Magento\Sales\Model\Order\Payment</div>
    <p>Three principal options supported by the Payment class:</p>
    <ol>
        <li><strong>Authorize only</strong>
            <ul>
                <li>Authorizes funds without charging.</li>
                <li>Invoice is NOT created.</li>
                <li>Admin must manually hit "Invoice" button to capture funds.</li>
            </ul>
        </li>
        <li><strong>Capture</strong>
            <ul>
                <li>Charges the card immediately.</li>
                <li>Invoice is automatically created.</li>
                <li>No admin action required.</li>
            </ul>
        </li>
        <li><strong>Order</strong>
            <ul>
                <li>Does nothing; invoice is NOT created.</li>
                <li>Admin must charge card manually when creating invoice.</li>
                <li>No guarantee funds are available.</li>
            </ul>
        </li>
    </ol>
    <div class="success-box"><strong>Key:</strong> Online methods typically use tokens for subsequent operations (authorize → capture → refund).</div>
</div>

<h2>PayPal Configuration</h2>

<div class="directory-card">
    <h3>PayPal Express Checkout</h3>
    <p>Hosted method that redirects to PayPal for payment.</p>
    <ul>
        <li>Configuration: API credentials (username, password, signature), sandbox mode, payment action.</li>
        <li><strong>"Enable In-Context Checkout"</strong> option: Improves UX by keeping customer on Magento site (PayPal opens in modal/iframe). Functionally similar but feels seamless.</li>
    </ul>
    <p>See: <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/payments/paypal/paypal-express-checkout.html" target="_blank">PayPal Express Checkout</a></p>
    <p>Further reading: <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/payments/paypal/paypal.html" target="_blank">Other PayPal Methods</a></p>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/delivery/delivery.html" target="_blank">Delivery Methods</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/payments/payments.html" target="_blank">Payment Methods</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/payments/paypal/paypal-express-checkout.html" target="_blank">PayPal Express Checkout Configuration</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/module-reference/" target="_blank">Module Reference</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Shipping:</strong> Offline (no API) vs Online (carriers with API). TableRate requires CSV upload.</li>
        <li><strong>Payment types:</strong> Offline (external), Gateway (API on Magento), Hosted (redirect).</li>
        <li><strong>Payment Actions:</strong>
            <ul>
                <li><strong>Authorize only:</strong> Reserve funds, no invoice, manual capture.</li>
                <li><strong>Capture:</strong> Charge card, auto-invoice.</li>
                <li><strong>Order:</strong> Do nothing, manual invoice/charge.</li>
            </ul>
        </li>
        <li><strong>Magento 2.4:</strong> Removed most online payment methods except PayPal from core.</li>
        <li><strong>PayPal:</strong> Express = hosted; "Enable In-Context" improves UX without leaving site.</li>
    </ul>
</div>
