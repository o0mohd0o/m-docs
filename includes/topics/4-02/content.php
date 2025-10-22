<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Layout XML is Magento's way to connect requests (layout handles) to blocks, containers, and templates. Mastery here lets you add/move/remove UI elements without touching PHP.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> Layout XML Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Layout XML))
    Layout Handles
      Determined from request
      Dynamic handles
      Include handles
    Files & Merge
      view/[area]/layout
      Merged by module order
      Override/modify nodes
    Common Directives
      block
      container
      referenceBlock
      referenceContainer
      move
      remove
      update handle
    Caching
      cacheable="false" risk
    </div>
</div>

<h2>Layout Handles & Where Files Live</h2>

<div class="directory-card">
    <ul>
        <li><strong>Files:</strong> In each module under <code>view/[area]/layout/</code> (e.g., <code>view/frontend/layout/</code>).</li>
        <li><strong>Merge:</strong> All layout XML files are merged into a single tree, in module load order from <code>app/etc/config.php</code>.</li>
        <li><strong>Handles:</strong> A request resolves to one or more layout handles; controllers and helpers can add handles programmatically.</li>
        <li><strong>Example:</strong> Product page handles might include: <code>default</code>, <code>catalog_product_view</code>, <code>catalog_product_view_type_configurable</code>, <code>catalog_product_view_id_436</code>, <code>catalog_product_view_sku_MJ12</code>.</li>
        <li><strong>Tip:</strong> To discover handles, set a breakpoint in <code>\Magento\Framework\View\Result\Layout::addHandle()</code>.</li>
    </ul>
</div>

<h2>Registering a New Layout File</h2>

<div class="directory-card">
    <p>Pick a handle (convert dashes to underscores) and create <code>&lt;handle&gt;.xml</code> at <code>view/[area]/layout/</code>.</p>
    <div class="directory-path">app/code/Vendor/Module/view/frontend/layout/catalog_product_view_id_436.xml</div>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd"&gt;
    &lt;body&gt;
        &lt;!-- your directives here --&gt;
    &lt;/body&gt;
&lt;/page&gt;</code></pre>
</div>

<h2>Common Layout XML Directives</h2>

<div class="directory-card">
    <h3><i class="fas fa-cube"></i> 1) Declare a Block</h3>
    <pre><code>&lt;body&gt;
    &lt;referenceContainer name="content"&gt;
        &lt;block class="Magento\\Cms\\Block\\Block" name="promo.banner" as="promo_banner" after="-"
               template="Magento_Cms::block.phtml"&gt;
            &lt;arguments&gt;
                &lt;argument name="block_id" xsi:type="string"&gt;promo_banner&lt;/argument&gt;
            &lt;/arguments&gt;
        &lt;/block&gt;
    &lt;/referenceContainer&gt;
&lt;/body&gt;</code></pre>
    <ul>
        <li><strong>Ordering:</strong> <code>before</code>/<code>after</code> accept <code>-</code> (first/last) or a sibling block name.</li>
        <li><strong>as vs name:</strong> Use <code>$block-&gt;getChildBlock('promo_banner')</code> when <code>as</code>="promo_banner". If <code>as</code> not set, use the <code>name</code> value.</li>
    </ul>
</div>

<div class="directory-card">
    <h3><i class="fas fa-box-open"></i> 2) Declare a Container</h3>
    <pre><code>&lt;body&gt;
    &lt;container name="homepage.top" as="homepage_top" label="Homepage Top"
               htmlTag="div" htmlClass="homepage-top"/&gt;
&lt;/body&gt;</code></pre>
    <p>A container renders its child blocks/containers. You can wrap content via <code>htmlTag</code>/<code>htmlClass</code>.</p>
</div>

<div class="directory-card">
    <h3><i class="fas fa-link"></i> 3) referenceContainer</h3>
    <pre><code>&lt;body&gt;
    &lt;referenceContainer name="columns.top"&gt;
        &lt;block class="Magento\\Cms\\Block\\Block" name="global.notice" after="-"&gt;
            &lt;arguments&gt;
                &lt;argument name="block_id" xsi:type="string"&gt;global_notice&lt;/argument&gt;
            &lt;/arguments&gt;
        &lt;/block&gt;
    &lt;/referenceContainer&gt;
&lt;/body&gt;</code></pre>
</div>

<div class="directory-card">
    <h3><i class="fas fa-edit"></i> 4) referenceBlock</h3>
    <pre><code>&lt;body&gt;
    &lt;referenceBlock name="page.main.title"&gt;
        &lt;action method="setTemplate"&gt;
            &lt;argument name="template" xsi:type="string"&gt;Vendor_Module::page/title.phtml&lt;/argument&gt;
        &lt;/action&gt;
    &lt;/referenceBlock&gt;
&lt;/body&gt;</code></pre>
    <p>Use to modify an existing block (template, arguments, actions).</p>
</div>

<div class="directory-card">
    <h3><i class="fas fa-arrows-alt"></i> 5) Move an Element</h3>
    <pre><code>&lt;body&gt;
    &lt;move element="catalog.compare.sidebar" destination="sidebar.additional" before="-" /&gt;
&lt;/body&gt;</code></pre>
</div>

<div class="directory-card">
    <h3><i class="fas fa-times"></i> 6) Remove a Block/Container</h3>
    <pre><code>&lt;body&gt;
    &lt;referenceBlock name="report.bugs" remove="true" /&gt;
    &lt;referenceContainer name="sidebar.main" remove="true" /&gt;
&lt;/body&gt;</code></pre>
</div>

<div class="directory-card">
    <h3><i class="fas fa-layer-group"></i> 7) Include Another Handle</h3>
    <pre><code>&lt;body&gt;
    &lt;update handle="customer_account"/&gt;
&lt;/body&gt;</code></pre>
    <p>Includes layout instructions from all <code>customer_account.xml</code> files (commonly used across customer area pages).</p>
</div>

<div class="directory-card">
    <h3><i class="fas fa-bolt"></i> 8) Non-cacheable Block (Use with Extreme Caution)</h3>
    <pre><code>&lt;body&gt;
    &lt;block class="Vendor\\Module\\Block\\Realtime" name="realtime.block" cacheable="false" /&gt;
&lt;/body&gt;</code></pre>
    <div class="warning-box mt-2">
        <strong>⚠️ Warning:</strong> Setting <code>cacheable="false"</code> on any block can make the entire page non-cacheable. Only use if the whole page truly must not be cached.
    </div>
</div>

<h2>Hands-on Debugging Tips</h2>

<div class="directory-card">
    <ul>
        <li>Breakpoint in <code>\Magento\Catalog\Helper\Product\View::initProductLayout()</code> to see product page handles.</li>
        <li>Breakpoint in <code>\Magento\Framework\View\Result\Layout::addHandle()</code> to capture all handles for current request.</li>
        <li>Enable template path hints to map blocks to templates quickly (Developer settings).</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/layouts/" target="_blank">Layout Instructions</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/layouts/layout-overview/" target="_blank">Layout Overview</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>File location:</strong> <code>view/[area]/layout</code></li>
        <li><strong>Directives:</strong> <code>block</code>, <code>container</code>, <code>referenceBlock</code>, <code>referenceContainer</code>, <code>move</code>, <code>remove</code>, <code>update handle</code></li>
        <li><strong>Ordering:</strong> <code>before</code>/<code>after</code>, <code>-</code> for first/last</li>
        <li><strong>as vs name:</strong> <code>as</code> controls <code>getChildBlock()</code> key; if absent, use <code>name</code></li>
        <li><strong>Dynamic handles:</strong> by ID/SKU/type for product pages; create specific handle files for targeted changes</li>
        <li><strong>Cache impact:</strong> <code>cacheable="false"</code> can disable FPC for the whole page</li>
    </ul>
</div>
