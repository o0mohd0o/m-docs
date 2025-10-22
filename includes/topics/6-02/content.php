<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding product types is crucial for Magento development. Each type serves specific use cases, has unique parent-child relationships, and behaves differently in cart/order tables. Less code-focused, more admin implementation—you must know when to use which type and their implications.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Product Types Overview</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Product Types))
    Simple
      One to one inventory mapping
      Basic unit
      Can be child in types
    Virtual
      No physical inventory
      Subscriptions memberships
    Configurable
      Filter down to one product
      Parent child relationship
      Global dropdown swatch attributes
    Grouped
      List of similar products
      Add multiple to cart at once
    Bundle
      Customer configures product
      Optional discount
    Product Type Model
      getTypeInstance
      getChildrenIds
      getAssociatedProducts
    </div>
</div>

<h2>Simple Product</h2>

<div class="directory-card">
    <p><strong>Simple products</strong> should be a <strong>1:1 mapping</strong> of a product in Magento to an item on the shelf. The <strong>basic unit of inventory</strong>.</p>
    <h3>Use Cases</h3>
    <ul>
        <li>Package of 10 pens = box on shelf (ships as one unit)</li>
        <li>Small, red t-shirt (child in configurable product)</li>
        <li>64GB memory stick (child in bundle product)</li>
    </ul>
    <h3>Can Be Child In</h3>
    <ul>
        <li>Configurable products</li>
        <li>Bundle products</li>
        <li>Grouped products</li>
    </ul>
    <div class="warning-box"><strong>Important:</strong> A simple product <strong>cannot be a child if it has custom options</strong>. You can associate it in admin, but it won't appear on frontend.</div>
    <div class="directory-path">\Magento\Catalog\Model\Product\Type\Simple</div>
</div>

<h2>Virtual Product</h2>

<div class="directory-card">
    <p><strong>Virtual products</strong> are similar to simple products except they <strong>do not represent physical inventory</strong>. They represent <strong>non-tangible goods</strong>.</p>
    <h3>Use Cases</h3>
    <ul>
        <li>Magazine subscription</li>
        <li>Gym membership</li>
        <li>Gift card (though Magento Commerce includes this natively)</li>
        <li>Fitness coaching plan (can be bundled with physical fitness equipment)</li>
    </ul>
    <div class="directory-path">\Magento\Catalog\Model\Product\Type\Virtual</div>
</div>

<h2>Configurable Product</h2>

<div class="directory-card">
    <p>A <strong>configurable product</strong> is a tool to <strong>filter down a list of products to one product</strong>.</p>
    <h3>Setup Process</h3>
    <ol>
        <li>Create the configurable product.</li>
        <li>Assign product attributes (<strong>global scope</strong> and <strong>dropdown or swatch</strong> type).</li>
        <li>Create or assign simple products with values for each assigned attribute.</li>
    </ol>
    <p>This creates a <strong>parent-child relationship</strong> where children are simple products.</p>
    <div class="directory-path">\Magento\ConfigurableProduct\Model\Product\Type\Configurable</div>
</div>

<h3>Quote and Order Behavior</h3>

<div class="directory-card">
    <p>When customer selects options (e.g., Size: S, Color: Blue) and adds to cart:</p>
    <h4>quote_item table:</h4>
    <ul>
        <li><strong>Row 1:</strong> Parent configurable product (qty = 2)</li>
        <li><strong>Row 2:</strong> Child simple product (qty = 1)</li>
    </ul>
    <p><strong>Shipped quantity:</strong> [Child Qty] × [Parent Qty] = 1 × 2 = <strong>2 children shipped</strong></p>
    
    <h4>sales_order_item table:</h4>
    <ul>
        <li>Both parent and child appear</li>
        <li><code>qty_ordered</code> reflects <strong>actual products being shipped</strong></li>
        <li><strong>Only the simple child is shipped</strong>, not the parent</li>
    </ul>
    <div class="success-box"><strong>Key:</strong> Configurable parent helps customer select; simple child is what ships.</div>
</div>

<h3>Base Currency Columns</h3>

<div class="directory-card">
    <p>Magento allows uploading prices in one currency (base currency) and converting to display currency.</p>
    <ul>
        <li><strong>Base currency:</strong> Currency in which product price is uploaded and order is charged.</li>
        <li><strong>Display currency:</strong> Currency shown to customer (converted from base).</li>
    </ul>
    <p><strong>Scope:</strong> Configurable via Product Price Scope (Stores > Configuration > Catalog > Pricing).</p>
    <p><strong>Example:</strong> Base = USD, Display = INR. Payment processor receives USD; customer sees INR.</p>
    <div class="key-point"><strong>Reporting Tip:</strong> Use base currency for consistent reporting across orders.</div>
</div>

<h2>Grouped Product</h2>

<div class="directory-card">
    <p><strong>Grouped products</strong> display a list of similar products. Unlike configurables, you can <strong>add multiple products to cart at once</strong>.</p>
    <h3>Use Cases</h3>
    <ul>
        <li>Sandpaper with different roughnesses</li>
        <li>Pipe fittings in multiple sizes</li>
        <li>Any scenario where customer wants multiple similar products from one page</li>
    </ul>
    <div class="directory-path">\Magento\GroupedProduct\Model\Product\Type\Grouped</div>
</div>

<h3>Quote and Order Behavior</h3>

<div class="directory-card">
    <p>After adding to cart:</p>
    <h4>quote_item table:</h4>
    <ul>
        <li>Only <strong>simple child products</strong> appear (no parent row)</li>
        <li><code>product_type</code> inherits from parent (shows "grouped" even though parent not in table)</li>
    </ul>
    
    <h4>sales_order_item table:</h4>
    <ul>
        <li>Same behavior—only children, <code>product_type</code> shows "grouped"</li>
        <li>Parent grouped product doesn't exist in quote_item or sales_order_item</li>
    </ul>
</div>

<h2>Bundle Product</h2>

<div class="directory-card">
    <p><strong>Bundle products</strong> allow customers to <strong>configure the product they want</strong>.</p>
    <h3>Use Cases</h3>
    <ul>
        <li>Configure a computer: processor, memory, hard drive</li>
        <li>Build-your-own gift basket</li>
        <li>Customizable product kits</li>
    </ul>
    <p>Bundle products can apply a <strong>discount</strong> to incentivize bundling vs buying individually.</p>
    <div class="directory-path">\Magento\Bundle\Model\Product\Type</div>
</div>

<h3>Quote and Order Behavior</h3>

<div class="directory-card">
    <p>After adding configured bundle to cart:</p>
    <h4>quote_item table:</h4>
    <ul>
        <li><strong>Parent bundle product</strong> row</li>
        <li><strong>Child simple products</strong> rows for each selected option</li>
    </ul>
    
    <h4>sales_order_item table:</h4>
    <ul>
        <li>Parent and children both appear</li>
        <li>Children are what actually ship</li>
    </ul>
</div>

<h2>Obtaining Products by Type</h2>

<div class="directory-card">
    <p>Two approaches:</p>
    <ol>
        <li><strong>SearchCriteriaBuilder with ProductRepository</strong></li>
        <li><strong>Product Collection with addFieldToFilter()</strong></li>
    </ol>
</div>

<h3>Approach 1: SearchCriteriaBuilder</h3>

<div class="directory-card">
    <pre><code>private $productRepository;
private $searchCriteriaBuilder;

public function __construct(
    \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
    \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
) {
    $this->productRepository = $productRepository;
    $this->searchCriteriaBuilder = $searchCriteriaBuilder;
}

public function getAllGroupedProducts(): array
{
    $criteria = $this->searchCriteriaBuilder->addFilter(
        'type_id',
        \Magento\GroupedProduct\Model\Product\Type\Grouped::TYPE_CODE
    )->create(); // Must call create()!
    
    return $this->productRepository->getList($criteria)->getItems();
}</code></pre>
    <div class="warning-box"><strong>Important:</strong> Must call <code>create()</code> method! SearchCriteriaBuilder doesn't inherit SearchCriteriaInterface.</div>
</div>

<h3>Approach 2: Product Collection</h3>

<div class="directory-card">
    <pre><code>private $collectionFactory;

public function __construct(
    \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory
) {
    $this->collectionFactory = $collectionFactory;
}

public function getAllGroupedProducts(): array
{
    $collection = $this->collectionFactory->create();
    $collection->addAttributeToSelect(['name', 'url_key']);
    $collection->addFieldToFilter(
        'type_id',
        \Magento\GroupedProduct\Model\Product\Type\Grouped::TYPE_CODE
    );
    
    return $collection->getItems();
}</code></pre>
    <div class="success-box"><strong>Advantage:</strong> Collections only load specified attributes, reducing overhead.</div>
</div>

<h2>Product Model vs Product Type Model</h2>

<div class="directory-card">
    <p>There are <strong>two parts</strong> to a product:</p>
    <ol>
        <li><strong>Product Model:</strong> <code>\Magento\Catalog\Model\Product</code> (implements <code>ProductInterface</code>)</li>
        <li><strong>Product Type Model:</strong> e.g., <code>\Magento\GroupedProduct\Model\Product\Type\Grouped</code> (extends <code>AbstractType</code>)</li>
    </ol>
</div>

<h3>Why Two Models?</h3>

<div class="directory-card">
    <ul>
        <li><strong>Product Model:</strong> Doorway to product—contains data (ID, SKU, name, etc.).</li>
        <li><strong>Product Type Model:</strong> Contains methods specific to this product type.</li>
    </ul>
    <p>Access type model via: <code>$product->getTypeInstance()</code></p>
</div>

<h3>Product Type Model Methods (Example: Grouped)</h3>

<div class="directory-card">
    <ul>
        <li><code>getChildrenIds()</code>: Find product IDs of all child products.</li>
        <li><code>getParentIdsByChild()</code>: Find all parents associated with a child.</li>
        <li><code>getAssociatedProducts()</code>: Load all products associated with parent.</li>
    </ul>
    <h4>Review These Files</h4>
    <ul>
        <li><code>\Magento\Catalog\Model\Product\Type\AbstractType</code></li>
        <li><code>\Magento\Catalog\Model\Product\Type\Simple</code></li>
        <li><code>\Magento\Catalog\Model\Product\Type\Virtual</code></li>
        <li><code>\Magento\Downloadable\Model\Product\Type</code></li>
        <li><code>\Magento\ConfigurableProduct\Model\Product\Type\Configurable</code></li>
        <li><code>\Magento\Bundle\Model\Product\Type</code></li>
        <li><code>\Magento\GroupedProduct\Model\Product\Type\Grouped</code></li>
    </ul>
</div>

<h2>Cart Rendering for Configurable/Bundle</h2>

<div class="directory-card">
    <p>To understand how bundle/configurable products render in cart:</p>
    <ol>
        <li>Locate bundle product on frontend (e.g., <code>/sprite-yoga-companion-kit.html</code>).</li>
        <li>Add to cart, go to cart page.</li>
        <li>Inspect element in Chrome DevTools → look for "item-options".</li>
        <li>Search for template: <code>Magento/Checkout/view/frontend/templates/cart/item/default.phtml</code></li>
        <li>Find layout handle: <code>checkout_cart_item_renderers</code></li>
        <li>Examine <code>checkout_cart_item_renderers.xml</code> for renderer blocks.</li>
        <li>Block: <code>checkout.cart.item.renderers</code> (declared in <code>checkout_cart_index.xml</code>).</li>
    </ol>
    <div class="key-point"><strong>Debugging Tip:</strong> Search for "item-options" in template files, filter by .phtml to narrow results.</div>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/catalog/products/types/product-create-simple.html" target="_blank">Simple Product</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/catalog/products/types/product-create-configurable.html" target="_blank">Configurable Product</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/catalog/products/types/product-create-grouped.html" target="_blank">Grouped Product</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/catalog/products/types/product-create-virtual.html" target="_blank">Virtual Product</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/catalog/products/types/product-create-bundle.html" target="_blank">Bundle Product</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Simple:</strong> 1:1 inventory; can be child in configurable/bundle/grouped; NOT if has custom options.</li>
        <li><strong>Virtual:</strong> No physical inventory; subscriptions, memberships.</li>
        <li><strong>Configurable:</strong> Filter to one product; global dropdown/swatch attributes; parent + child in quote/order; only child ships.</li>
        <li><strong>Grouped:</strong> Add multiple to cart; only children in quote/order tables; product_type inherits "grouped".</li>
        <li><strong>Bundle:</strong> Customer configures; discount option; parent + children in tables.</li>
        <li><strong>Obtaining Products:</strong> SearchCriteriaBuilder (call <code>create()</code>!) or Collection (<code>addFieldToFilter</code>).</li>
        <li><strong>Type Model:</strong> <code>getTypeInstance()</code> for type-specific methods.</li>
        <li><strong>Base Currency:</strong> Upload price currency; used for payment and reporting.</li>
    </ul>
</div>
