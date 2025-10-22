<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> CMS pages, blocks, widgets, and Page Builder enable admin users to create rich content without code. Knowing when and how to use each is key for development and the exam.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> CMS Content Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Magento CMS))
    CMS Pages
      Static content
      URL key & layout
      Widgets & blocks
    CMS Blocks
      Reusable HTML
      Placed in pages/layouts
    Widgets
      Dynamic content
      Configurable
      CMS insertable
    Page Builder
      Drag & drop
      Content types
      Scheduling
    Admin Features
      Variables {{...}}
      Directive syntax
      Links & media
    </div>
</div>

<h2>CMS Pages and Blocks</h2>

<div class="directory-card">
    <p><strong>CMS pages</strong> are standalone, typically static content pages (e.g., <em>About Us</em>) created in Admin. <strong>CMS blocks</strong> are reusable HTML snippets that can be placed on multiple pages and positions.</p>
    <ul>
        <li><strong>Pages:</strong> Content, URL key, layout updates, design, store view assignment, SEO metadata</li>
        <li><strong>Blocks:</strong> Named content (Identifier) that can be referenced in layouts, pages, and widgets</li>
        <li><strong>Widgets:</strong> More powerful than blocks; dynamic, configurable content that can target specific containers/handles</li>
        <li><strong>Page Builder:</strong> Visual authoring with content types (rows, columns, text, images, sliders, banners, etc.)</li>
    </ul>
</div>

<h2>Creating CMS Pages</h2>

<div class="directory-card">
    <h3><i class="fas fa-file-alt"></i> Admin: Content → Pages → Add New Page</h3>
    <ul>
        <li><strong>Page Information:</strong> Title, URL Key, Store View, Status</li>
        <li><strong>Content:</strong> Use Page Builder or WYSIWYG editor</li>
        <li><strong>Search Engine Optimization:</strong> Meta Title/Keywords/Description</li>
        <li><strong>Design:</strong> Theme, Layout (1-column, 2-columns, Empty), Layout Update XML</li>
    </ul>
</div>

<h2>Creating CMS Blocks</h2>

<div class="directory-card">
    <h3><i class="fas fa-th-large"></i> Admin: Content → Blocks → Add New Block</h3>
    <ul>
        <li><strong>Identifier:</strong> Unique code to reference the block</li>
        <li><strong>Store View:</strong> Scope of availability</li>
        <li><strong>Content:</strong> HTML, variables, widgets, Page Builder</li>
    </ul>
</div>

<h2>Widgets</h2>

<div class="directory-card">
    <h3><i class="fas fa-puzzle-piece"></i> Admin: Content → Widgets → Add Widget</h3>
    <ul>
        <li><strong>Type:</strong> The widget class (e.g., Catalog New Products, Static Block)</li>
        <li><strong>Design Package/Theme</strong></li>
        <li><strong>Layout Updates:</strong> Choose pages/containers (e.g., after="-", container="content")</li>
        <li><strong>Widget Options:</strong> Configuration per widget type (e.g., product types, categories)</li>
    </ul>
</div>

<h2>Page Builder vs Native CMS</h2>

<div class="directory-card">
    <ul>
        <li><strong>Page Builder:</strong> Drag-and-drop content creation, scheduling, responsive controls, content types</li>
        <li><strong>Native CMS:</strong> WYSIWYG + directives; very portable and simple</li>
        <li><strong>Recommendation:</strong> Use Page Builder for rich layouts, native CMS for simple/static content or portability</li>
    </ul>
</div>

<h2>Magento-Specific CMS Directives</h2>

<div class="directory-card">
    <p>Magento provides directive syntax inside CMS content using <code>{{ ... }}</code>. Common directives:</p>

    <h4>1) Variables</h4>
    <pre><code>{{config path="web/unsecure/base_url"}}
{{store url=""}}
{{store url="customer/account/login"}}</code></pre>

    <h4>2) Links</h4>
    <pre><code>{{store url="contact"}}
{{store direct_url="privacy-policy-cookie-restriction-mode"}}</code></pre>

    <h4>3) Media URLs</h4>
    <pre><code>&lt;img src="{{media url="wysiwyg/banners/summer.jpg"}}" alt="Summer" /&gt;</code></pre>

    <h4>4) Including a Static Block</h4>
    <pre><code>{{block class="Magento\Cms\Block\Block" block_id="footer_links"}}</code></pre>

    <h4>5) Rendering a Backend (Template) Block</h4>
    <pre><code>{{block class="Vendor\\Module\\Block\\Example" template="Vendor_Module::example.phtml"}}</code></pre>

    <h4>6) Widgets</h4>
    <pre><code>{{widget type="Magento\\Catalog\\Block\\Product\\Widget\\NewWidget" display_type="new_products" products_count="5" template="product/widget/new/content/new_grid.phtml"}}</code></pre>
</div>

<h2>Placement Options</h2>

<div class="directory-card">
    <ul>
        <li><strong>Layout XML:</strong> Place blocks via <code>cms_index_index.xml</code> or other layout handles</li>
        <li><strong>CMS Page Content:</strong> Insert blocks/widgets directly via editor</li>
        <li><strong>Theme Templates:</strong> Render blocks via <code>$block->getLayout()->createBlock()</code> when necessary</li>
    </ul>
</div>

<h2>Security & Best Practices</h2>

<div class="directory-card">
    <ul>
        <li><strong>Sanitize content:</strong> Avoid raw JS; use widgets/blocks</li>
        <li><strong>Scope awareness:</strong> Use Store View assignment for localized content</li>
        <li><strong>Portability:</strong> Prefer widgets/blocks and config-driven content for multi-env deployments</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/cms/page/" target="_blank">DevDocs: CMS Pages (Adding a New Page)</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/cms/block/" target="_blank">DevDocs: CMS Blocks</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/cms/widget/" target="_blank">DevDocs: CMS Widgets</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/page-builder/page-builder.html" target="_blank">Page Builder Guide</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Pages vs Blocks vs Widgets:</strong> Pages are standalone; blocks are reusable content; widgets are configurable/dynamic</li>
        <li><strong>Directives:</strong> {{config}}, {{store}}, {{media}}, {{block}}, {{widget}}</li>
        <li><strong>Page Builder:</strong> Use for rich layouts; supports scheduling and content types</li>
        <li><strong>Placement:</strong> Via layout updates, CMS content, or widgets</li>
        <li><strong>Identifiers:</strong> Block identifiers are used to reference blocks in widgets/layouts</li>
    </ul>
</div>
