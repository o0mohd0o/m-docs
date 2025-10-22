<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding Magento's price layers is essential for accurate pricing logic. Product page prices use base price, special pricing, and catalog rules. Cart prices add tiered pricing, options, tax/VAT, and cart rules. Knowing how to customize calculation and rendering ensures correct pricing display.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Price Types & Calculation</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Price Types))
    Product Page Price
      Base price
      Special pricing
      Catalog rules
    Cart Price
      Tiered pricing
      Options price
      Tax and VAT
      Shopping cart rules
    Calculation
      Product Type Price calculatePrice
      Customization via plugins
    Rendering
      product price render default block
      Templates in product
      JS UI components
    </div>
</div>

<h2>Price Generation Basics</h2>

<div class="directory-card">
    <p>Magento has <strong>multiple layers of pricing calculation</strong> depending on where the price is displayed.</p>
    <h3>Product Page Price (Before Cart)</h3>
    <ul>
        <li><strong>Base Price:</strong> The <code>price</code> attribute value.</li>
        <li><strong>Special Pricing:</strong> Temporary discount set on product (date range optional).</li>
        <li><strong>Catalog Rules:</strong> Rule-based discounts from indexed <code>catalogrule_product_price</code> table.</li>
    </ul>
    <div class="success-box"><strong>Context:</strong> These three components determine the price shown on a product page.</div>
</div>

<div class="directory-card">
    <h3>Shopping Cart Price (After Quantity Determined)</h3>
    <p>Once a product is added to cart with a specific quantity, additional pricing applies:</p>
    <ul>
        <li><strong>Tiered Pricing:</strong> Volume discounts based on quantity, customer group, and website.</li>
        <li><strong>Options Price:</strong> Price added by custom options (e.g., engraving, gift wrap).</li>
        <li><strong>Tax / VAT:</strong> Applied depending on tax configuration and checkout stage.</li>
        <li><strong>Shopping Cart Rules:</strong> Promotional discounts applied in cart (e.g., "10% off cart total").</li>
    </ul>
    <div class="key-point"><strong>Key:</strong> Cart prices include quantity-dependent and cart-level discounts not visible on product page.</div>
</div>

<h2>Price Calculation Process</h2>

<div class="directory-card">
    <p>The primary price calculation for product pages happens in the Price model.</p>
    <div class="directory-path">\Magento\Catalog\Model\Product\Type\Price::calculatePrice()</div>
    <h3>Calculation Sequence (Product Page)</h3>
    <ol>
        <li><strong>Base Price:</strong> Start with <code>price</code> attribute or existing calculated price.</li>
        <li><strong>Special Pricing:</strong> Apply if <code>special_price</code> is set and within date range.</li>
        <li><strong>Catalog Rules:</strong> Apply lowest applicable rule price from <code>catalogrule_product_price</code> table.</li>
    </ol>
    <pre><code>// Simplified flow in calculatePrice()
$price = $product->getPrice(); // Base price

// Apply special price if applicable
if ($specialPrice && $specialPrice < $price) {
    $price = $specialPrice;
}

// Apply catalog rule price if lower
if ($rulePrice && $rulePrice < $price) {
    $price = $rulePrice;
}

return $price;</code></pre>
</div>

<h3>Identifying Final Price Components</h3>

<div class="directory-card">
    <p>To identify what composes a product's final price:</p>
    <ol>
        <li><strong>Check Base Price:</strong> Product's <code>price</code> attribute.</li>
        <li><strong>Check Special Price:</strong> <code>special_price</code> attribute and date range (<code>special_from_date</code>, <code>special_to_date</code>).</li>
        <li><strong>Check Catalog Rules:</strong> Query <code>catalogrule_product_price</code> for active rules matching product/customer group.</li>
        <li><strong>Check Tiered Pricing:</strong> Product's tier price table for quantity/customer group.</li>
        <li><strong>Debug:</strong> Set breakpoint in <code>calculatePrice()</code> and step through.</li>
    </ol>
    <div class="warning-box"><strong>Debugging Tip:</strong> Use Xdebug breakpoint in <code>\Magento\Catalog\Model\Product\Type\Price::calculatePrice()</code> to trace price calculation.</div>
</div>

<h2>Customizing Price Calculation</h2>

<div class="directory-card">
    <p>Two approaches to customize price calculation:</p>
    <ol>
        <li><strong>Plugins (Preferred):</strong> Use <code>after</code> plugin on <code>calculatePrice()</code>.</li>
        <li><strong>Preference:</strong> Replace entire price calculation class (more invasive).</li>
    </ol>
</div>

<h3>Example: Plugin on calculatePrice()</h3>

<div class="directory-card">
    <p><strong>di.xml:</strong></p>
    <pre><code>&lt;type name="Magento\Catalog\Model\Product\Type\Price"&gt;
    &lt;plugin name="vendor_module_custom_price" 
            type="Vendor\Module\Plugin\Product\Type\Price" 
            sortOrder="10" /&gt;
&lt;/type&gt;</code></pre>
    
    <p><strong>Plugin Class:</strong></p>
    <pre><code>namespace Vendor\Module\Plugin\Product\Type;

class Price
{
    public function afterCalculatePrice(
        \Magento\Catalog\Model\Product\Type\Price $subject,
        $result,
        $product,
        $qty = null
    ) {
        // Apply custom logic
        // Example: Add 10% markup
        return $result * 1.10;
    }
}</code></pre>
    <div class="success-box"><strong>Best Practice:</strong> Use plugins to avoid overriding core logic entirely.</div>
</div>

<h2>Price Rendering</h2>

<div class="directory-card">
    <p>Price rendering is configured via layout XML and uses dedicated renderer blocks.</p>
    <div class="directory-path">Magento/Catalog/view/base/layout/default.xml</div>
    <p>A block named <code>product.price.render.default</code> is created in <code>default.xml</code>.</p>
</div>

<h3>Using Price Renderer Block</h3>

<div class="directory-card">
    <p>You can use this block to render pricing elsewhere in the application.</p>
    <p><strong>Example from Downloadable Product:</strong></p>
    <div class="directory-path">Magento/Downloadable/view/frontend/layout/catalog_product_view_type_downloadable.xml</div>
    <pre><code>&lt;referenceBlock name="product.price.render.default"&gt;
    &lt;arguments&gt;
        &lt;argument name="price_render" xsi:type="string"&gt;product.price.render.default&lt;/argument&gt;
        &lt;argument name="price_type_code" xsi:type="string"&gt;final_price&lt;/argument&gt;
    &lt;/arguments&gt;
&lt;/referenceBlock&gt;</code></pre>
</div>

<h3>Price Rendering Templates</h3>

<div class="directory-card">
    <p>Templates for price renderers are located in:</p>
    <div class="directory-path">Magento/Catalog/view/base/templates/product/</div>
    <h4>Key Templates</h4>
    <ul>
        <li><code>price/final_price.phtml</code></li>
        <li><code>price/tier_prices.phtml</code></li>
        <li><code>price/special_price.phtml</code></li>
        <li><code>price/minimal_price.phtml</code></li>
    </ul>
    <div class="key-point"><strong>Customization:</strong> Override these templates in your theme to modify price display.</div>
</div>

<h3>JavaScript UI Component for Prices</h3>

<div class="directory-card">
    <p>Magento also provides a JS UI component to render prices dynamically.</p>
    <div class="directory-path">Magento/Catalog/view/base/web/template/</div>
    <p>See: <a href="https://developer.adobe.com/commerce/frontend-core/guide/templates/price-rendering/" target="_blank">Render Prices on the Frontend</a></p>
    <h4>Use Cases</h4>
    <ul>
        <li>Dynamic price updates (e.g., when selecting configurable options)</li>
        <li>AJAX-loaded prices</li>
        <li>Custom price displays</li>
    </ul>
</div>

<h2>How to Render Price in Custom Location</h2>

<div class="directory-card">
    <p>To render price in a custom location:</p>
    <ol>
        <li><strong>In Layout XML:</strong>
            <pre><code>&lt;block class="Magento\Framework\Pricing\Render" name="custom.price.render"&gt;
    &lt;arguments&gt;
        &lt;argument name="price_render_handle" xsi:type="string"&gt;catalog_product_prices&lt;/argument&gt;
    &lt;/arguments&gt;
&lt;/block&gt;</code></pre>
        </li>
        <li><strong>In Template (.phtml):</strong>
            <pre><code>&lt;?php
/** @var \Magento\Catalog\Block\Product\AbstractProduct $block */
$product = $block-&gt;getProduct();
?&gt;

&lt;?= $block-&gt;getLayout()
    -&gt;getBlock('product.price.render.default')
    -&gt;render(
        'final_price',
        $product,
        [
            'include_container' =&gt; true,
            'display_minimal_price' =&gt; true,
            'zone' =&gt; \Magento\Framework\Pricing\Render::ZONE_ITEM_LIST
        ]
    ); ?&gt;</code></pre>
        </li>
    </ol>
</div>

<h2>Modifying Price Rendering</h2>

<div class="directory-card">
    <p>To modify how price is rendered:</p>
    <ol>
        <li><strong>Override Templates:</strong> Copy template to your theme and modify.</li>
        <li><strong>Custom Renderer:</strong> Create custom price renderer class extending <code>\Magento\Framework\Pricing\Render\AbstractRenderer</code>.</li>
        <li><strong>Layout XML:</strong> Update <code>catalog_product_prices.xml</code> to use your renderer.</li>
        <li><strong>CSS/JS:</strong> Style via CSS or add dynamic behavior with JS.</li>
    </ol>
    <div class="success-box"><strong>Example:</strong> Override <code>final_price.phtml</code> to add custom badges or formatting.</div>
</div>

<h2>Price Types Summary</h2>

<div class="directory-card">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Price Type</th>
                <th>When Applied</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Base Price</strong></td>
                <td>Product Page</td>
                <td>Product's <code>price</code> attribute</td>
            </tr>
            <tr>
                <td><strong>Special Price</strong></td>
                <td>Product Page</td>
                <td>Temporary discount with optional date range</td>
            </tr>
            <tr>
                <td><strong>Catalog Rules</strong></td>
                <td>Product Page</td>
                <td>Rule-based discounts from indexed table</td>
            </tr>
            <tr>
                <td><strong>Tiered Pricing</strong></td>
                <td>Cart</td>
                <td>Volume discounts based on quantity/group</td>
            </tr>
            <tr>
                <td><strong>Options Price</strong></td>
                <td>Cart</td>
                <td>Custom option surcharges</td>
            </tr>
            <tr>
                <td><strong>Tax / VAT</strong></td>
                <td>Cart/Checkout</td>
                <td>Tax based on configuration and location</td>
            </tr>
            <tr>
                <td><strong>Cart Rules</strong></td>
                <td>Cart</td>
                <td>Promotional discounts in cart</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/templates/price-rendering/" target="_blank">Render Prices on the Frontend</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/catalog/products/pricing/product-price-tier.html" target="_blank">Tier Prices</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/catalog/products/pricing/product-price-special.html" target="_blank">Special Prices</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/price-adjustments/" target="_blank">Price Adjustments</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Product Page:</strong> Base price, special pricing, catalog rules.</li>
        <li><strong>Cart:</strong> Add tiered pricing, options price, tax/VAT, cart rules.</li>
        <li><strong>Calculation:</strong> <code>Product\Type\Price::calculatePrice()</code>.</li>
        <li><strong>Customize:</strong> Plugin on <code>afterCalculatePrice()</code> or replace entire class.</li>
        <li><strong>Rendering:</strong> <code>product.price.render.default</code> block in <code>default.xml</code>.</li>
        <li><strong>Templates:</strong> <code>Magento/Catalog/view/base/templates/product/</code>.</li>
        <li><strong>JS UI:</strong> <code>Magento/Catalog/view/base/web/template/</code> for dynamic prices.</li>
        <li><strong>Custom Render:</strong> Use layout XML to reference price renderer block.</li>
    </ul>
</div>
