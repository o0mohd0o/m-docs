<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Styling in Magento spans themes, modules, and layout updates. Knowing when to customize vs override LESS, and how to include third‑party CSS, is essential for clean, upgrade‑safe UI changes.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Page Styling Options</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Modify Page Style))
    Theme vs Module
      Theme = current design
      Module = feature-specific styles
    Customize LESS
      _extend.less (theme)
      Includes other LESS
    Override LESS
      Fallback mechanism
      Theme inheritance
    Module LESS
      _module.less (auto-included)
      Feature-scoped
    Third-party CSS
      default_head_blocks.xml
      Layout update <css>
    </div>
</div>

<h2>Choosing Where Styles Live</h2>

<div class="directory-card">
    <ul>
        <li><strong>Theme-level (custom theme):</strong> All current design styling and changes likely to vary with redesigns.</li>
        <li><strong>Module-level:</strong> Styles tightly coupled to a feature/module and unlikely to change with theme redesign. Use if module is distributed separately or no custom theme exists.</li>
    </ul>
</div>

<h2>Customize LESS using a Custom Theme</h2>

<div class="directory-card">
    <p>The primary tool to customize (extend) styles without overriding files is <code>_extend.less</code>.</p>
    <ul>
        <li><strong>Path:</strong> <code>app/design/frontend/<Vendor>/<theme>/web/css/source/_extend.less</code></li>
        <li><strong>Behavior:</strong> Automatically included in the final CSS for every theme build.</li>
        <li><strong>Pattern:</strong> Often used to import other partials, e.g., <code>@import 'components/_buttons.less';</code></li>
    </ul>
    <div class="success-box"><strong>Tip:</strong> Prefer _extend.less for additive changes to core/theme styles to remain upgrade‑safe.</div>
    <div class="directory-path">app/design/frontend/Vendor/theme/web/css/source/_extend.less</div>
    <pre><code>// Example: extend button styles
@import 'components/_buttons.less';
.btn-primary { border-radius: 6px; }</code></pre>
</div>

<h2>Override LESS using Theme Fallback</h2>

<div class="directory-card">
    <p>Overrides rely on Magento's <strong>fallback mechanism</strong> (theme inheritance) to replace files from a parent theme or core module.</p>
    <ul>
        <li><strong>Concept:</strong> The “same” file may exist in module, parent theme, and child theme; fallback resolves which one is used.</li>
        <li><strong>Docs:</strong> See <em>Theme Inheritance</em> for sequence rules.</li>
        <li><strong>Use When:</strong> You must replace an entire LESS source instead of extending it.</li>
    </ul>
    <div class="warning-box"><strong>Note:</strong> Overrides are heavier than extensions; use only when necessary.</div>
</div>

<h2>Use a Module's LESS Files</h2>

<div class="directory-card">
    <ul>
        <li><strong>Auto-included entry:</strong> <code>view/frontend/web/css/source/_module.less</code></li>
        <li><strong>Usage:</strong> Keep feature-specific, stable styles here; import other partials if needed.</li>
    </ul>
    <div class="directory-path">app/code/Vendor/Module/view/frontend/web/css/source/_module.less</div>
    <pre><code>// Example: module-scoped styles
@import 'components/_widget.less';
.vendor-module-widget { margin: 1rem 0; }</code></pre>
</div>

<h2>Add Third‑Party CSS via Layout Update</h2>

<div class="directory-card">
    <p>Add external/custom CSS from a theme or module by declaring it in a head layout file.</p>
    <ul>
        <li><strong>Theme layout:</strong> <code>app/design/frontend/<Vendor>/<theme>/Magento_Theme/layout/default_head_blocks.xml</code></li>
        <li><strong>Module layout:</strong> <code>view/frontend/layout/default_head_blocks.xml</code></li>
    </ul>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd"&gt;
    &lt;head&gt;
        &lt;css src="Vendor_Module::css/custom.css" /&gt;
        &lt;!-- Or a theme asset: css/custom.css --&gt;
        &lt;css src="css/custom.css" /&gt;
    &lt;/head&gt;
&lt;/page&gt;</code></pre>
    <div class="directory-path">view/frontend/web/css/custom.css</div>
</div>

<h2>Scenarios Matrix (Summary)</h2>

<div class="directory-card">
    <ul>
        <li><strong>Core page, adjust core styles:</strong> Extend with theme <code>_extend.less</code>, or module <code>_module.less</code> if feature-scoped.</li>
        <li><strong>Core page, override core file:</strong> Override LESS via theme fallback (prefer a child theme).</li>
        <li><strong>Custom page, add new LESS:</strong> Use theme <code>_extend.less</code> or module <code>_module.less</code>.</li>
        <li><strong>Add third‑party CSS:</strong> Use <code>default_head_blocks.xml</code> to include assets.</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/themes/theme-inherit/" target="_blank">Theme Inheritance (Fallback)</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/themes/override/" target="_blank">Override Theme Files</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/themes/css/" target="_blank">Working with CSS/LESS</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/layouts/xml-manage/" target="_blank">Include CSS via Layout</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/themes/custom-theme/" target="_blank">Customize Theme Styles</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>_extend.less:</strong> Auto-included; best for extending styles in a theme.</li>
        <li><strong>Overrides:</strong> Use fallback to replace whole files via theme inheritance.</li>
        <li><strong>_module.less:</strong> Auto-included for module feature styles.</li>
        <li><strong>Third‑party CSS:</strong> Add via <code>default_head_blocks.xml</code> <code>&lt;css src="..." /&gt;</code>.</li>
        <li><strong>Theme vs Module:</strong> Design-level in theme; feature-stable in module.</li>
    </ul>
</div>
