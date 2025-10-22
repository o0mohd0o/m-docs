<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Magento’s JavaScript is modular, loaded with RequireJS, and integrates with UI Components and jQuery UI widgets. Knowing the module naming, aliasing, initialization patterns, and mixins is essential.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> JavaScript Basics in Magento</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Magento JS))
    RequireJS
      Module path
      Aliases (map)
      requirejs-config.js
    Module Types
      Plain AMD modules
      jQuery UI widgets
      UI Components (uiElement)
    Execute
      data-mage-init
      x-magento-init
      Imperative require()
    Customize
      Fallback override
      Mixins
    </div>
</div>

<h2>RequireJS & Module Resolution</h2>

<div class="directory-card">
    <ul>
        <li><strong>Location:</strong> Modules are <code>.js</code> files in <code>view/(frontend|adminhtml|base)/web/js/</code>.</li>
        <li><strong>Naming convention:</strong> <code>Module_Name/path/to/file</code> maps to <code>view/.../web/js/path/to/file.js</code>.</li>
        <li><strong>Example:</strong> <code>Magento_Catalog/js/product/view/product-info</code> → <code>Magento_Catalog/view/frontend/web/js/product/view/product-info.js</code>.</li>
    </ul>
</div>

<h3>Aliases via requirejs-config.js</h3>

<div class="directory-card">
    <div class="directory-path">Module_Name/view/(frontend|adminhtml|base)/requirejs-config.js</div>
    <pre><code>var config = {
    map: {
        '*': {
            compareList: 'Magento_Catalog/js/list',
            relatedProducts: 'Magento_Catalog/js/related-products',
            upsellProducts: 'Magento_Catalog/js/upsell-products',
            productListToolbarForm: 'Magento_Catalog/js/product/list/toolbar',
            catalogGallery: 'Magento_Catalog/js/gallery',
            catalogAddToCart: 'Magento_Catalog/js/catalog-add-to-cart'
        }
    }
};</code></pre>
    <p>Now <code>compareList</code> resolves to <code>Magento_Catalog/js/list</code>.</p>
</div>

<h2>Types of JavaScript Modules</h2>

<div class="directory-card">
    <h3><i class="fas fa-code"></i> Plain AMD Modules</h3>
    <p>General-purpose modules; when used with Magento initializers, return a function.</p>
    <pre><code>define(['jquery'], function ($) {
    'use strict';

    function handleWindow() {
        // ...
    }

    // Return a callback if used with data-mage-init or x-magento-init
    return function (element, config) {
        handleWindow();
        window.addEventListener('resize', handleWindow);
        // element is the DOM node; config is the JSON config
    };
});</code></pre>
</div>

<div class="directory-card">
    <h3><i class="fab fa-js-square"></i> jQuery UI Widgets</h3>
    <p>Declare a jQuery UI widget; return the widget for reuse.</p>
    <pre><code>define(['jquery'], function ($) {
    'use strict';

    $.widget('mage.modal', {
        options: {
            // default options
        },
        setTitle: function () {},
        _setKeyListener: function () {}
    });

    return $.mage.modal;
});</code></pre>
</div>

<div class="directory-card">
    <h3><i class="fas fa-layer-group"></i> UI Components (uiElement)</h3>
    <p>UI Component modules extend <code>uiElement</code>; they expose <code>defaults</code> and methods used in Knockout templates.</p>
    <div class="directory-path">Magento_Ui/js/lib/core/element/element</div>
    <pre><code>define(['uiElement'], function (Element) {
    'use strict';

    return Element.extend({
        defaults: {
            links: {
                value: '${ $.provider }:${ $.dataScope }'
            }
        },
        hasService: function () {},
        initObservable: function () {
            this._super().observe('disabled visible value');
            return this;
        }
    });
});</code></pre>
</div>

<h2>Executing Modules</h2>

<div class="directory-card">
    <h3><i class="fas fa-bolt"></i> data-mage-init (attribute)</h3>
    <pre><code>&lt;div
    class="example"
    data-mage-init='{"SwiftOtter_Module/js/modal": {"configuration-value": true}}'&gt;
&lt;/div&gt;</code></pre>
    <p>Magento loads the module and calls the returned function with <code>(element, config)</code>.</p>
</div>

<div class="directory-card">
    <h3><i class="fas fa-bolt"></i> x-magento-init (script)</h3>
    <pre><code>&lt;script type="text/x-magento-init"&gt;
{
    ".element-selector": {
        "SwiftOtter_Module/js/modal": { "configuration-value": true }
    },
    "*": {
        "Vendor_Module/js/log": {}
    }
}
&lt;/script&gt;</code></pre>
    <ul>
        <li>Selector matches multiple nodes → module instantiated per node.</li>
        <li>Selector <code>*</code> passes <code>false</code> as the node argument.</li>
    </ul>
</div>

<div class="directory-card">
    <h3><i class="fas fa-terminal"></i> Imperative require() (not recommended)</h3>
    <pre><code>require(['jquery', 'Magento_Catalog/js/list'], function ($, list) {
    // Do work
});</code></pre>
    <p>Use initializers when possible; imperative patterns are acceptable for quick scripts.</p>
</div>

<h2>Customizing Native JavaScript</h2>

<div class="directory-card">
    <h3><i class="fas fa-random"></i> Fallback Override</h3>
    <p>Copy a core JS file into your theme/module path to replace it. Heavier maintenance; avoid when a mixin suffices.</p>
</div>

<div class="directory-card">
    <h3><i class="fas fa-plug"></i> Mixins (Preferred)</h3>
    <p>Like PHP plugins for JS. Add behavior <em>before/after/around</em> existing functions without overriding the file.</p>
    <h4>requirejs-config.js</h4>
    <pre><code>var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/view/shipping': {
                'Vendor_Module/js/mixin/shipping-mixin': true
            }
        }
    }
};</code></pre>
    <h4>Mixin file</h4>
    <pre><code>define([], function () {
    'use strict';
    return function (Target) {
        return Target.extend({
            setShippingInformation: function () {
                // before/after custom logic
                this._super();
            }
        });
    };
});</code></pre>
    <p>Works well when the core is designed for extension; falls back to overrides when necessary.</p>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/js/requirejs/" target="_blank">RequireJS in Commerce</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/js/mixins/" target="_blank">JavaScript Mixins</a></li>
        <li><a href="https://developer.adobe.com/commerce/frontend-core/guide/ui_comp_guide/bk-ui_comps.html" target="_blank">UI Components Guide</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Path mapping:</strong> <code>Module_Name/path/to/file</code> → <code>view/.../web/js/path/to/file.js</code></li>
        <li><strong>Aliases:</strong> <code>requirejs-config.js</code> <code>map:{'*':{ alias:'Module/js/file' }}</code></li>
        <li><strong>Initializers:</strong> <code>data-mage-init</code> and <code>x-magento-init</code> call returned function with <code>(element, config)</code></li>
        <li><strong>UI Components:</strong> extend <code>uiElement</code>, use <code>defaults</code>, <code>initObservable</code></li>
        <li><strong>Customize:</strong> Prefer JS <em>mixins</em> over full overrides</li>
    </ul>
</div>
