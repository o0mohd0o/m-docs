<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Cart promo rules (shopping cart price rules) apply discounts via the totals framework. Understanding conditions (EAV attributes), actions (percent, fixed, Buy X get Y), coupons, shipping, and tax interactions is essential for reliable promotions.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Cart Promo Rules Overview</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Promo Rules))
    Totals Framework
      SalesRule/etc/sales.xml
      Applied during collectTotals
    Conditions
      Boolean logic
      EAV attributes
      Used in Promo Rule Conditions flag
    Actions
      Percent discount
      Fixed amount discount
      Fixed amount whole cart
      Buy X get Y free
    Coupons
      Coupon codes
      Auto/specific
    Shipping
      Apply to shipping or not
      Free shipping
      Carrier decides logic
    Taxes
      Tax calculation settings
      Discount subtlety
    </div>
</div>

<h2>Promo Rules Architecture</h2>

<div class="directory-card">
    <p>Promo rules (shopping cart price rules) are applied via the <strong>Totals framework</strong>, registered in <code>Magento/SalesRule/etc/sales.xml</code>. They follow the same engine as Catalog Price Rules but add coupon code support.</p>
    <div class="directory-path">Magento/SalesRule/etc/sales.xml</div>
</div>

<h2>Core Elements: Conditions & Actions</h2>

<h3>Conditions</h3>

<div class="directory-card">
    <p>Conditions define a <strong>boolean function</strong> that determines if a rule applies to a cart. Conditions support:</p>
    <ul>
        <li>Cart subtotal, quantity, weight, etc.</li>
        <li><strong>EAV attributes</strong> of products in the cart (e.g., category, custom attributes).</li>
        <li>Customer segments (when enabled).</li>
    </ul>
    <div class="success-box"><strong>Key:</strong> To use a product attribute in promo rule conditions, set <strong>"Used in Promo Rule Conditions"</strong> to Yes in the attribute config.</div>
    <p>Further reading: <a href="https://magento.stackexchange.com/questions/130732/shopping-cart-rule-based-on-custom-attribute" target="_blank">StackExchange: Shopping Cart Rule Based on Custom Attribute</a></p>
</div>

<h3>Actions</h3>

<div class="directory-card">
    <p>Four action types define how discounts apply:</p>
    <ol>
        <li><strong>Percent of product price discount</strong>
            <ul>
                <li>Subtracts a percentage from each qualifying item's price.</li>
                <li>Example: Discount Amount = 10 → 10% off each item.</li>
            </ul>
        </li>
        <li><strong>Fixed amount discount</strong>
            <ul>
                <li>Subtracts a fixed amount from each qualifying item's price.</li>
                <li>Example: Discount Amount = 10 → $10 off each item.</li>
            </ul>
        </li>
        <li><strong>Fixed amount discount for whole cart</strong>
            <ul>
                <li>Subtracts a fixed amount from the cart total (usually subtotal).</li>
                <li>Example: Discount Amount = 10 → $10 off cart subtotal.</li>
                <li>Optional: Apply to shipping as well ("Apply to Shipping Amount").</li>
            </ul>
        </li>
        <li><strong>Buy X get Y free</strong>
            <ul>
                <li>Defines a quantity X the customer must purchase to receive quantity Y for free.</li>
                <li>Discount Amount represents Y (free quantity).</li>
            </ul>
        </li>
    </ol>
</div>

<h2>Coupon Codes</h2>

<div class="directory-card">
    <p>Unlike catalog price rules, cart promo rules can require <strong>coupon codes</strong>. Coupons can be:</p>
    <ul>
        <li><strong>Specific:</strong> Defined codes (e.g., "SUMMER20").</li>
        <li><strong>Auto-generated:</strong> Magento generates codes with a pattern/prefix.</li>
        <li><strong>No coupon:</strong> Rule auto-applies when conditions match.</li>
    </ul>
</div>

<h2>Discounts & Shipping</h2>

<div class="directory-card">
    <p>A promo rule can be configured to:</p>
    <ul>
        <li><strong>Discount shipping:</strong> Apply to Shipping Amount option.</li>
        <li><strong>Free shipping:</strong> Special action that sets shipping cost to zero.</li>
    </ul>
    <div class="warning-box"><strong>Important:</strong> It's the <strong>shipping method (carrier)</strong> that decides how to apply discounts or free shipping when calculating rates. Always account for promo rules in custom shipping methods.</div>
</div>

<h2>Discounts & Taxes</h2>

<div class="directory-card">
    <p>Tax calculation settings affect discount application. Subtleties include:</p>
    <ul>
        <li><strong>Before/after discount:</strong> Taxes can be calculated before or after discount is applied.</li>
        <li><strong>Including/excluding tax:</strong> Configuration determines if discounts apply to tax-inclusive or tax-exclusive amounts.</li>
    </ul>
    <p>See admin: <strong>Stores → Configuration → Sales → Tax → Calculation Settings</strong>.</p>
</div>

<h2>Rule Similarity to Catalog Price Rules</h2>

<div class="directory-card">
    <p>Both promo rules and catalog price rules use the same <strong>Rule engine</strong> for conditions. Main difference: cart promo rules support coupons and apply at cart/checkout scope, while catalog rules apply at product listing scope.</p>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/marketing/promotions/cart-rules/price-rules-cart.html" target="_blank">Cart Price Rules (Official Docs)</a></li>
        <li><a href="https://magento.stackexchange.com/questions/130732/shopping-cart-rule-based-on-custom-attribute" target="_blank">StackExchange: Shopping Cart Rule Based on Custom Attribute</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/module-reference/" target="_blank">Module Reference: Magento_SalesRule</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Application:</strong> Promo rules are applied via the Totals framework (see <code>Magento/SalesRule/etc/sales.xml</code>).</li>
        <li><strong>Conditions:</strong> Can use EAV product attributes if "Used in Promo Rule Conditions" is Yes.</li>
        <li><strong>Actions:</strong> 4 types—percent, fixed per item, fixed whole cart, Buy X get Y.</li>
        <li><strong>Coupons:</strong> Specific, auto-generated, or none (auto-apply).</li>
        <li><strong>Shipping:</strong> Carrier/shipping method must handle discount/free shipping logic.</li>
        <li><strong>Taxes:</strong> Discount interaction depends on tax calculation settings (before/after, incl/excl).</li>
    </ul>
</div>
