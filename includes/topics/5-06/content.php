<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Tax rules, currency configuration, and cart/checkout settings are essential for compliant and functional ecommerce. Understanding tax classes, rates, rules, currency scope, and checkout options ensures proper setup across regions and customer types.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Tax, Currencies, Cart/Checkout Config</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Config))
    Tax Rules
      Product tax classes
      Customer tax classes
      Tax rates (zones)
      Tax rules (connect all)
    Currencies
      Currency scope (price scope)
      Display currency
      Currency rates
    Cart/Checkout
      Onepage checkout
      Multishipping
      Guest checkout
      Mini cart display
    </div>
</div>

<h2>Configure Tax Rules</h2>

<div class="directory-card">
    <p>Tax configuration involves <strong>four components</strong> that work together:</p>
    <ol>
        <li><strong>Product Tax Classes</strong></li>
        <li><strong>Customer Tax Classes</strong></li>
        <li><strong>Tax Rates (Zones)</strong></li>
        <li><strong>Tax Rules</strong></li>
    </ol>
</div>

<h3>1. Product Tax Classes</h3>

<div class="directory-card">
    <p>A <strong>tag</strong> used to group products for taxation purposes.</p>
    <ul>
        <li>Examples: Taxable Goods, Shipping, Digital Products.</li>
        <li>Assigned to products during product creation/editing.</li>
        <li>Location: <strong>Stores → Tax → Product Tax Classes</strong></li>
    </ul>
    <p>See: <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/taxes/tax-class.html" target="_blank">Configuring Tax Classes</a></p>
</div>

<h3>2. Customer Tax Classes</h3>

<div class="directory-card">
    <p>A <strong>tag</strong> that allows different tax treatment for different customer groups.</p>
    <ul>
        <li>Examples: Retail Customer, Wholesale, Tax Exempt.</li>
        <li>Assigned to customer groups.</li>
        <li>Location: <strong>Stores → Tax → Customer Tax Classes</strong></li>
    </ul>
    <p>See: <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/taxes/tax-class.html" target="_blank">Configuring Tax Classes</a></p>
</div>

<h3>3. Tax Rates (Zones)</h3>

<div class="directory-card">
    <p>Define <strong>physical locations</strong> (state, city, zip code range) and the <strong>tax rate</strong> to apply.</p>
    <ul>
        <li>Examples: California 7.25%, New York City 8.875%.</li>
        <li>Can target specific countries, states, zip codes.</li>
        <li>Location: <strong>Stores → Tax → Tax Zones and Rates</strong></li>
    </ul>
    <p>See: <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/taxes/tax-zones-rates.html" target="_blank">Tax Zones and Rates</a></p>
</div>

<h3>4. Tax Rules</h3>

<div class="directory-card">
    <p><strong>Tax rules</strong> bring it all together by connecting:</p>
    <ul>
        <li>A <strong>Product Tax Class</strong></li>
        <li>A <strong>Customer Tax Class</strong></li>
        <li>One or more <strong>Tax Rates</strong></li>
    </ul>
    <p>Example: "Retail customers buying taxable goods in California pay 7.25% sales tax."</p>
    <p>Location: <strong>Stores → Tax → Tax Rules</strong></p>
    <p>See: <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/taxes/tax-rules.html" target="_blank">Tax Rules</a></p>
</div>

<h2>Configure Currencies</h2>

<div class="directory-card">
    <p>Currency configuration involves two primary elements:</p>
    <ol>
        <li><strong>Currency Scope (Price Scope)</strong></li>
        <li><strong>Store's Display Currency</strong></li>
    </ol>
</div>

<h3>Currency Scope (Price Scope)</h3>

<div class="directory-card">
    <p>Defines the <strong>scope of the base currency</strong> and how many different prices a product can have.</p>
    <ul>
        <li><strong>Global:</strong> One price for all websites (base currency is global).</li>
        <li><strong>Website:</strong> One price per website (each website can have its own base currency).</li>
    </ul>
    <p>Location: <strong>Stores → Configuration → Catalog → Catalog → Price → Catalog Price Scope</strong></p>
    <div class="key-point"><strong>Key:</strong> Price scope determines if products have a single global price or prices per website.</div>
</div>

<h3>Display Currency</h3>

<div class="directory-card">
    <p>The <strong>currency customers see</strong> on the frontend. Has <strong>Store scope</strong> (Store View level).</p>
    <ul>
        <li>Display currency is calculated by applying <strong>currency rates</strong> to the base currency.</li>
        <li>Allows showing prices in local currency (e.g., USD product priced in EUR for European customers).</li>
    </ul>
    <p>Location: <strong>Stores → Configuration → General → Currency Setup</strong></p>
    <div class="success-box"><strong>Flow:</strong> Base currency (product price) → Currency rates → Display currency (what customer sees).</div>
    <p>See: <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/currency/currency-configuration.html" target="_blank">Currency Configuration</a>, <a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/currency/currency-setup.html" target="_blank">Currency Setup</a></p>
</div>

<h2>Configure Shopping Cart/Checkout</h2>

<div class="directory-card">
    <p>Checkout configuration options modify look, feel, and behavior. Key settings:</p>
    <ul>
        <li><strong>Enable Onepage Checkout:</strong> Standard single-page checkout flow.</li>
        <li><strong>Enable Multishipping Checkout:</strong> Allows customers to ship items to multiple addresses.</li>
        <li><strong>Allow Guest Checkout:</strong> Permits checkout without account creation.</li>
        <li><strong>Display Mini Cart:</strong> Shows cart summary in header on all pages.</li>
    </ul>
    <p>Location: <strong>Stores → Configuration → Sales → Checkout</strong></p>
    <p>See: <a href="https://developer.adobe.com/commerce/frontend-core/guide/checkout/" target="_blank">DevDocs: Checkout</a></p>
</div>

<h3>Onepage Checkout</h3>

<div class="directory-card">
    <p>The <strong>default checkout flow</strong>: shipping and billing on a single page (or progressive steps).</p>
    <ul>
        <li>Enable/disable via configuration.</li>
        <li>Most common checkout type.</li>
    </ul>
</div>

<h3>Multishipping Checkout</h3>

<div class="directory-card">
    <p>Allows customers to <strong>ship items to multiple addresses</strong> in a single order.</p>
    <ul>
        <li>Enable/disable via configuration.</li>
        <li>Customer selects items → assigns to different addresses → completes payment.</li>
        <li>Useful for gift orders or business scenarios.</li>
    </ul>
</div>

<h3>Guest Checkout</h3>

<div class="directory-card">
    <p>Allows customers to complete checkout <strong>without creating an account</strong>.</p>
    <ul>
        <li>Enable/disable via configuration.</li>
        <li>Improves conversion by reducing friction.</li>
        <li>Guest orders can be converted to customer accounts later.</li>
    </ul>
</div>

<h3>Mini Cart</h3>

<div class="directory-card">
    <p>Displays a <strong>cart summary in the header</strong> on all pages.</p>
    <ul>
        <li>Shows item count and cart total.</li>
        <li>Clicking opens a dropdown with cart details.</li>
        <li>Configuration controls display and number of items shown.</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/taxes/tax-class.html" target="_blank">Configuring Tax Classes</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/taxes/tax-zones-rates.html" target="_blank">Tax Zones and Rates</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/taxes/tax-rules.html" target="_blank">Tax Rules</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/currency/currency-configuration.html" target="_blank">Currency Configuration</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/stores-sales/site-store/currency/currency-setup.html" target="_blank">Currency Setup</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/checkout/" target="_blank">DevDocs: Checkout</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Tax Rules:</strong> Four components—Product Tax Classes, Customer Tax Classes, Tax Rates (zones), Tax Rules (connect them).</li>
        <li><strong>Currency Scope:</strong> Global = one price; Website = price per website.</li>
        <li><strong>Display Currency:</strong> Store (Store View) scope; calculated via currency rates from base currency.</li>
        <li><strong>Checkout Config:</strong> Onepage (default), Multishipping (multiple addresses), Guest (no account required), Mini Cart (header summary).</li>
    </ul>
</div>
