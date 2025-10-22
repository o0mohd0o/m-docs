<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding Magento theme structure is key to placing assets in the right place, leveraging theme inheritance (fallback), and registering themes correctly for upgrade-safe UI work.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> Theme Structure Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Theme Structure))
    Location
      app/design (local)
      vendor (Composer)
    Registration
      composer.json autoload.files
      registration.php
      theme.xml
    Folders
      etc (view.xml)
      i18n (translations)
      media (preview)
      web (assets)
        css / css/source
        fonts
        images
        js
    Overrides
      Module overrides in theme
      Fallback (inheritance)
    </div>
</div>

<h2>Theme Locations</h2>

<div class="directory-card">
    <ul>
        <li><strong>Local themes</strong> are stored in <code>app/design</code>.</li>
        <li><strong>Composer-based themes</strong> can be stored anywhere; by default are installed under <code>vendor/</code>.</li>
        <li>Magento uses the <strong>Composer autoloader</strong>; themes can auto-register via Composer configuration.</li>
    </ul>
</div>

<h2>How a Theme Registers</h2>

<div class="directory-card">
    <p>Composer executes files listed in <code>autoload.files</code> on bootstrap. For themes like Luma, this points to <code>registration.php</code>, which registers the theme with Magento.</p>
    <ul>
        <li><strong>composer.json</strong> (e.g., <code>Magento/luma/composer.json</code>): declares <code>autoload.files</code> → <code>registration.php</code></li>
        <li><strong>registration.php</strong> (required): calls <code>\Magento\Framework\Component\ComponentRegistrar::register()</code> to register the theme</li>
        <li><strong>Component name format</strong>: <code>adminhtml|frontend/Package/Theme</code>
            <div class="mt-2">
                Examples:
                <ul>
                    <li><code>frontend/SwiftOtter/Flex</code></li>
                    <li><code>frontend/Magento/luma</code></li>
                    <li><code>adminhtml/Magento/backend</code></li>
                </ul>
            </div>
        </li>
    </ul>
</div>

<h2>Required Theme Files</h2>

<div class="directory-card">
    <ul>
        <li><strong>theme.xml</strong> (required): Describes the theme; supports <code>&lt;title&gt;</code>, optional <code>&lt;parent&gt;</code>, and optional <code>&lt;media/preview_image&gt;</code>.</li>
        <li><strong>registration.php</strong> (required): Registers the theme with Magento.</li>
        <li><strong>composer.json</strong> (for Composer themes): Helps Composer install and autoload the theme.</li>
    </ul>
</div>

<h2>Theme Folder Structure</h2>

<div class="directory-card">
    <p>Common folders inside a theme:</p>
    <ul>
        <li><strong>etc/</strong> — Typically contains <code>view.xml</code> (e.g., <code>Magento/luma/etc/view.xml</code>) for theme configuration values (images, UI component settings, etc.).</li>
        <li><strong>i18n/</strong> — Translations (e.g., <code>Magento/luma/i18n/en_US.csv</code>).</li>
        <li><strong>media/</strong> — Usually has <code>preview.jpg</code> (<code>Magento/luma/media/preview.jpg</code>) for admin preview.</li>
        <li><strong>web/</strong> — Public assets compiled to <code>pub/static</code>.
            <ul>
                <li><strong>css/</strong> — Base stylesheets exported to <code>pub/static/[area]/[package]/[theme]/[locale]/css</code>.</li>
                <li><strong>css/source/</strong> — LESS sources; mixins and <code>theme.less</code> to override default variables.</li>
                <li><strong>fonts/</strong> — Web fonts used by the theme.</li>
                <li><strong>images/</strong> — Static theme images (e.g., icons), not frequently changing banners.</li>
                <li><strong>js/</strong> — Theme-specific JavaScript.</li>
            </ul>
        </li>
    </ul>
    <div class="key-point mt-2">
        <strong>Compilation Flow:</strong> LESS → <code>var/view_preprocessed</code> → compiled CSS → <code>pub/static</code>.
    </div>
    <div class="warning-box mt-2">
        <strong>Recommendation:</strong> Prefer placing customizations in the appropriate <code>Module_Name/web</code> directory for functionality (e.g., checkout changes under <code>Magento_Checkout/web</code>) rather than at the root of the theme’s <code>web/</code>, unless it’s design-wide.
    </div>
</div>

<h2>Module Overrides from a Theme</h2>

<div class="directory-card">
    <p>Themes can override module assets (templates, layout, etc.) by mirroring the module path under the theme directory.</p>
    <div class="directory-path">app/design/frontend/SwiftOtter/Flex/Magento_Catalog/templates/product/view/addtocart.phtml</div>
    <p>This path overrides <code>Magento/Catalog/view/frontend/templates/product/view/addtocart.phtml</code>.</p>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/themes/theme-structure/" target="_blank">Theme Structure</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/themes/theme-inherit/" target="_blank">Theme Inheritance (Fallback)</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/themes/create/" target="_blank">Create a New Theme</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Locations:</strong> Local: <code>app/design</code>; Composer: usually <code>vendor/</code>.</li>
        <li><strong>Registration:</strong> <code>composer.json</code> → <code>autoload.files</code> → <code>registration.php</code> → theme registered.</li>
        <li><strong>Required files:</strong> <code>theme.xml</code>, <code>registration.php</code> (Composer theme also has <code>composer.json</code>).</li>
        <li><strong>Key folders:</strong> <code>etc/view.xml</code>, <code>i18n/*.csv</code>, <code>media/preview.jpg</code>, <code>web/css</code>, <code>web/css/source</code>, <code>web/images</code>, <code>web/fonts</code>, <code>web/js</code>.</li>
        <li><strong>Overrides:</strong> Mirror module paths in the theme to override assets; rely on fallback.</li>
    </ul>
</div>
