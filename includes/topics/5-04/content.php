<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Quote data access is central to cart/checkout customizations. Understanding how to retrieve quotes, addresses, totals, items, item options, and product attributes ensures reliable operations across single and multi-shipping scenarios.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Quote Data Usage Overview</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Quote Data))
    Get Quote
      Checkout\\Model\\Session::getQuote()
      Initial loading subtleties
      Quote merging
    Addresses
      Multi-shipping: many shipping + 1 billing
      Single: 1 shipping (or 0 if virtual) + 1 billing
      Quote address methods
    Totals
      Address::getTotals()
      Total amounts collection
    Items
      Quote::getAllItems()
      Quote::getAllVisibleItems()
      Quote::getItemsCollection()
      Deleted items in collection
    Item Options
      quote_item_option table
      Custom options, bundle info, etc.
    Product Attributes
      catalog_attributes.xml
      Limited attributes loaded
    </div>
</div>

<h2>Obtaining the Quote</h2>

<div class="directory-card">
    <p>The typical way to retrieve the active quote:</p>
    <div class="directory-path">\Magento\Checkout\Model\Session::getQuote()</div>
    <pre><code>// Example in controller or block
public function __construct(
    \Magento\Checkout\Model\Session $checkoutSession
) {
    $this->checkoutSession = $checkoutSession;
}

public function execute() {
    $quote = $this->checkoutSession->getQuote();
    // ...
}</code></pre>
    <div class="warning-box"><strong>Note:</strong> Review the source of <code>getQuote()</code> for subtleties around initial loading and session handling. Also consider quote merging (guest → customer login scenario, see 5.01).</div>
</div>

<h2>Quote Addresses</h2>

<div class="directory-card">
    <h3>How Many Addresses?</h3>
    <ul>
        <li><strong>Multi-shipping enabled:</strong> Many shipping addresses, one billing address.</li>
        <li><strong>Multi-shipping disabled:</strong> At most one shipping address, one billing address.</li>
        <li><strong>Virtual quote:</strong> No shipping address (only billing).</li>
    </ul>
    <div class="directory-path">\Magento\Quote\Model\Quote (lines ~1143-1400)</div>
    <h3>Key Methods</h3>
    <pre><code>$quote->getBillingAddress();
$quote->getShippingAddress();         // Returns default/first shipping address
$quote->getAllShippingAddresses();    // Multi-shipping scenario
$quote->getIsVirtual();               // true if only virtual items</code></pre>
</div>

<h2>Total Amounts</h2>

<div class="directory-card">
    <p>Use the <strong>Address</strong> object to retrieve calculated totals.</p>
    <pre><code>$address = $quote->getShippingAddress();
$totals = $address->getTotals();  // Returns collection of Total objects

foreach ($totals as $total) {
    echo $total->getCode() . ': ' . $total->getValue();
}</code></pre>
    <p>See 5.01 for details on the Totals framework.</p>
</div>

<h2>Items</h2>

<div class="directory-card">
    <p>Items belong to both Quote and Address objects. In 95% of scenarios, retrieve items via <strong>Quote</strong>.</p>
    <div class="directory-path">\Magento\Quote\Model\Quote (lines ~1400-1600)</div>
    <h3>Key Item Methods</h3>
    <ul>
        <li><strong>getAllItems()</strong>: Returns all items, including children (e.g., configurable parent + selected child).</li>
        <li><strong>getAllVisibleItems()</strong>: Returns items visible to the customer (excludes some children).</li>
        <li><strong>getItemsCollection()</strong>: Returns the collection object for advanced operations.</li>
    </ul>
    <pre><code>// All items including children
$allItems = $quote->getAllItems();

// Visible items only
$visibleItems = $quote->getAllVisibleItems();

// Collection for filtering
$itemsCollection = $quote->getItemsCollection();</code></pre>
    <div class="warning-box"><strong>Note:</strong> Deleted items may remain in the collection. Check <code>$item->isDeleted()</code> if needed.</div>
    <p>See 5.01 for parent/child relationships (configurable, bundle, etc.).</p>
</div>

<h2>Item Options</h2>

<div class="directory-card">
    <p>Additional data that doesn't fit into standard item fields is stored in <strong>item options</strong>.</p>
    <div class="directory-path">quote_item_option table</div>
    <h3>Use Cases</h3>
    <ul>
        <li>Product custom options (text fields, dropdowns, etc.)</li>
        <li>Technical data for product types (bundle selections, configurable variants)</li>
        <li>Custom data for extensions (often easier than creating new tables)</li>
    </ul>
    <pre><code>// Get an option by code
$option = $item->getOptionByCode('option_code');

// Set an option
$item->addOption([
    'code' => 'custom_data',
    'value' => 'some_value'
]);</code></pre>
    <div class="success-box"><strong>Tip:</strong> Storing custom data in item options is often simpler than maintaining separate tables.</div>
</div>

<h2>Product Attributes Available in Items</h2>

<div class="directory-card">
    <p>When loading items, Magento doesn't load all product EAV attributes (for performance). Only attributes defined in <code>catalog_attributes.xml</code> are loaded.</p>
    <div class="directory-path">etc/catalog_attributes.xml</div>
    <h3>Example from Magento_Sales</h3>
    <div class="directory-path">Magento/Sales/etc/catalog_attributes.xml</div>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Catalog:etc/catalog_attributes.xsd"&gt;
    &lt;group name="quote_item"&gt;
        &lt;attribute name="sku" /&gt;
        &lt;attribute name="name" /&gt;
        &lt;attribute name="price" /&gt;
        &lt;!-- Additional attributes --&gt;
    &lt;/group&gt;
&lt;/config&gt;</code></pre>
    <h3>Loading Items with Attributes</h3>
    <div class="directory-path">\Magento\Quote\Model\ResourceModel\Quote\Item\Collection</div>
    <pre><code>$productCollection = $this->_productCollectionFactory->create()
    ->setStoreId($this->getStoreId())
    ->addIdFilter($this->_productIds)
    ->addAttributeToSelect($this->_quoteConfig->getProductAttributes());</code></pre>
    <div class="key-point"><strong>Key:</strong> To use custom product attributes in cart/checkout, add them to <code>catalog_attributes.xml</code> under the <code>quote_item</code> group.</div>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/module-reference/" target="_blank">Module Reference: Magento_Quote</a></li>
        <li><a href="https://developer.adobe.com/commerce/php/development/components/checkout/" target="_blank">Checkout & Quote Architecture</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-operations/configuration-guide/files/config-reference-configphp.html" target="_blank">Configuration Files Reference</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Get Quote:</strong> Use <code>Checkout\Model\Session::getQuote()</code>; review source for loading subtleties.</li>
        <li><strong>Addresses:</strong> Multi-shipping = many shipping + 1 billing; single = at most 1 shipping + 1 billing; virtual = billing only.</li>
        <li><strong>Totals:</strong> <code>Address::getTotals()</code> returns collection of total amounts.</li>
        <li><strong>Items:</strong> <code>getAllItems()</code> includes children; <code>getAllVisibleItems()</code> for customer view; <code>getItemsCollection()</code> for advanced ops.</li>
        <li><strong>Item Options:</strong> Stored in <code>quote_item_option</code> table; useful for custom data.</li>
        <li><strong>Attributes:</strong> Only attributes in <code>catalog_attributes.xml</code> (group <code>quote_item</code>) are loaded with items.</li>
    </ul>
</div>
