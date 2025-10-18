<!-- Part B: Language Packs & i18n -->
<h2 id="part-b"><i class="fas fa-globe"></i> Part B: Language Packs & i18n Tools</h2>

<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Section Overview:</strong> Understanding i18n CLI tools, theme dictionaries, and language packs.
</div>

<h3>Internationalization (i18n)</h3>

<div class="concept-card">
    <h4><i class="fas fa-globe"></i> What is i18n?</h4>
    
    <p>Internationalization (i18n) is the process of designing software to support multiple languages and regions. Magento has had strong i18n support since its early days.</p>

    <div class="success-box">
        <strong>Key Magento i18n Features:</strong>
        <ul class="mb-0">
            <li>Automatic phrase collection from code</li>
            <li>CSV-based translation dictionaries</li>
            <li>Theme-specific translations</li>
            <li>Language packs for full localization</li>
            <li>Multiple fallback levels</li>
        </ul>
    </div>
</div>

<h3>i18n CLI Commands</h3>

<div class="concept-card">
    <h4><i class="fas fa-terminal"></i> Collecting Translatable Phrases</h4>
    
    <h5>1. Collect Phrases for a Module</h5>
    <pre><code>bin/magento i18n:collect-phrases app/code/Bonlineco/Test</code></pre>
    <p>Finds all translatable strings within the specified path (module, theme, or entire installation).</p>

    <h5>2. Collect Phrases with Module Information</h5>
    <pre><code>bin/magento i18n:collect-phrases -m</code></pre>
    
    <div class="info-box">
        <strong>The <code>-m</code> Flag:</strong>
        <p>Adds two additional columns to the output:</p>
        <ul class="mb-0">
            <li><strong>type</strong> - Either "module" or "theme"</li>
            <li><strong>module</strong> - The module name that uses this translation</li>
        </ul>
        <p class="mt-2"><small>This is essential for building language packages as it shows which module each phrase belongs to.</small></p>
    </div>

    <h5>3. Collect Phrases for Entire Installation</h5>
    <pre><code>bin/magento i18n:collect-phrases -m &gt; translations.csv</code></pre>
    <p>Searches entire Magento application (all modules and themes) for translatable strings and outputs to CSV.</p>
</div>

<h3>Three Translation Sources</h3>

<div class="concept-card">
    <h4><i class="fas fa-layer-group"></i> Translation Data Hierarchy</h4>
    
    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <h5>1. Theme Translation Dictionary</h5>
                <p><strong>Location:</strong></p>
                <code>app/code/Vendor/Module/i18n/de_DE.csv</code>
                <p class="mt-2"><strong>Scope:</strong> Module or theme specific</p>
                <p><strong>Priority:</strong> First or second (after module)</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="success-box">
                <h5>2. Language Packs</h5>
                <p><strong>Location:</strong></p>
                <code>app/i18n/Vendor/Language/</code>
                <p class="mt-2"><strong>Scope:</strong> Entire application</p>
                <p><strong>Priority:</strong> Third</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="warning-box">
                <h5>3. Database Translations</h5>
                <p><strong>Location:</strong></p>
                <code>translation</code> table
                <p class="mt-2"><strong>Scope:</strong> Store-specific</p>
                <p><strong>Priority:</strong> Highest (last)</p>
            </div>
        </div>
    </div>
</div>

<h3>Theme Translation Dictionary</h3>

<div class="concept-card">
    <h4><i class="fas fa-book"></i> Module/Theme-Specific Translations</h4>
    
    <p>Theme translation dictionaries allow specifying translations for a specific module or theme.</p>

    <h5>Structure:</h5>
    <pre><code>app/code/Bonlineco/Test/
├── i18n/
│   ├── de_DE.csv
│   ├── fr_FR.csv
│   └── es_ES.csv
└── ...</code></pre>

    <h5>CSV Format:</h5>
    <pre><code>"Shopping Cart","Warenkorb"
"Add to Cart","In den Warenkorb"
"Checkout","Zur Kasse"
"Welcome, %1","Willkommen, %1"</code></pre>

    <div class="key-point">
        <strong>Key Points:</strong>
        <ul class="mb-0">
            <li>First column: Original string (English)</li>
            <li>Second column: Translated string</li>
            <li>Placeholders (%1, %2) remain unchanged</li>
            <li>File named as locale code (de_DE, fr_FR, etc.)</li>
        </ul>
    </div>

    <h5>Creating Translation Dictionary:</h5>
    <div class="success-box">
        <p><strong>Step 1:</strong> Collect phrases for your module</p>
        <pre><code>bin/magento i18n:collect-phrases app/code/Bonlineco/Test &gt; phrases.csv</code></pre>

        <p><strong>Step 2:</strong> Translate the phrases (manually or service)</p>
        
        <p><strong>Step 3:</strong> Save as locale-specific CSV in i18n directory</p>
        <pre><code>app/code/Bonlineco/Test/i18n/de_DE.csv</code></pre>
    </div>

    <div class="info-box">
        <strong>Can Override:</strong>
        <ul class="mb-0">
            <li>Core module translations</li>
            <li>Third-party module translations</li>
            <li>Parent theme translations</li>
        </ul>
        <p class="mt-2">Can be overridden by language packs and database translations.</p>
    </div>
</div>

<h3>Language Packs</h3>

<div class="concept-card">
    <h4><i class="fas fa-globe-americas"></i> Application-Wide Translation</h4>
    
    <p>Language packs provide translations for the <strong>entire Magento application</strong>, including all modules and themes.</p>

    <h5>Creating a Language Pack:</h5>

    <div class="success-box">
        <h6>Step 1: Collect All Phrases</h6>
        <pre><code>bin/magento i18n:collect-phrases -m &gt; all_phrases.csv</code></pre>
        <p><small>The <code>-m</code> flag adds module information needed for language packs.</small></p>

        <h6>Step 2: Translate the CSV File</h6>
        <p>Have a professional translator complete the translations in the CSV file.</p>

        <h6>Step 3: Pack the Translations</h6>
        <pre><code>bin/magento i18n:pack /absolute/path/to/translated.csv de_DE</code></pre>
        <p><small>This generates the necessary language pack files.</small></p>

        <h6>Step 4: Create Language Module</h6>
        <pre><code>app/i18n/Bonlineco/de_DE/
├── de_DE.csv
├── registration.php
└── language.xml</code></pre>
    </div>

    <h5>registration.php</h5>
    <pre><code>&lt;?php
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::LANGUAGE,
    'bonlineco_de_de',
    __DIR__
);</code></pre>

    <div class="warning-box">
        <strong>Important:</strong> Use <code>ComponentRegistrar::LANGUAGE</code> type for language packs, not <code>MODULE</code>.
    </div>

    <h5>language.xml</h5>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;language xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
          xsi:noNamespaceSchemaLocation="urn:magento:framework:App/Language/package.xsd"&gt;
    &lt;code&gt;de_DE&lt;/code&gt;
    &lt;vendor&gt;Bonlineco&lt;/vendor&gt;
    &lt;package&gt;de_de&lt;/package&gt;
    &lt;sort_order&gt;100&lt;/sort_order&gt;
    &lt;use vendor="magento" package="de_de"/&gt;
&lt;/language&gt;</code></pre>

    <div class="key-point">
        <strong>Inheritance via <code>&lt;use&gt;</code> Tag:</strong>
        <p class="mb-0">You can include multiple <code>&lt;use&gt;</code> nodes. If Magento doesn't find a translation in your package, it searches through each <code>&lt;use&gt;</code> package (and their <code>&lt;use&gt;</code> nodes) until it finds a match.</p>
    </div>

    <h5>Final Structure:</h5>
    <pre><code>app/i18n/Bonlineco/de_DE/
├── de_DE.csv           &lt;- Translations (from i18n:pack)
├── language.xml        &lt;- Package configuration
└── registration.php    &lt;- Component registration</code></pre>
</div>

<h3>Language Pack Example</h3>

<div class="concept-card">
    <h4><i class="fas fa-example"></i> Real-World Example</h4>

    <p>Popular language packs on GitHub:</p>
    <ul>
        <li><strong>German:</strong> Magento2_German_LocalePack_de_DE</li>
        <li><strong>French:</strong> Community-maintained <code>i18n/Magento/fr_FR</code></li>
        <li><strong>Spanish:</strong> Various community packages</li>
    </ul>

    <div class="info-box">
        <strong>Using Community Language Packs:</strong>
        <ol class="mb-0">
            <li>Install via Composer: <code>composer require vendor/language-package</code></li>
            <li>Enable in Admin: <strong>Stores → Configuration → General → Locale Options</strong></li>
            <li>Clear cache: <code>bin/magento cache:flush</code></li>
        </ol>
    </div>
</div>

<h3>Fallback Chain</h3>

<div class="concept-card">
    <h4><i class="fas fa-sitemap"></i> Translation Resolution</h4>
    
    <p>When Magento looks for a translation, it follows this chain:</p>

    <div class="success-box">
        <h5>Resolution Order:</h5>
        <ol>
            <li>Check <strong>module's i18n dictionary</strong></li>
            <li>Check <strong>theme's i18n dictionary</strong></li>
            <li>Check <strong>language pack</strong></li>
            <li>Check language pack's <strong>&lt;use&gt; packages</strong></li>
            <li>Check their <strong>&lt;use&gt; packages</strong> (recursive)</li>
            <li>If none found, use <strong>original untranslated text</strong></li>
        </ol>
    </div>

    <div class="key-point">
        <strong>Important:</strong> Database translations (covered in Part C) have the HIGHEST priority and override all file-based translations.
    </div>
</div>

<h3>Best Practices</h3>

<div class="concept-card">
    <div class="row">
        <div class="col-md-6">
            <div class="success-box">
                <h5><i class="fas fa-check-circle"></i> Do's</h5>
                <ul class="mb-0">
                    <li>Use language packs for complete translations</li>
                    <li>Use theme dictionaries for theme-specific overrides</li>
                    <li>Leverage community language packs</li>
                    <li>Use <code>i18n:collect-phrases</code> to find all strings</li>
                    <li>Include module info with <code>-m</code> flag for packs</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="warning-box">
                <h5><i class="fas fa-exclamation-triangle"></i> Don'ts</h5>
                <ul class="mb-0">
                    <li>Don't modify core translation files</li>
                    <li>Don't skip <code>-m</code> flag for language packs</li>
                    <li>Don't hardcode translations in custom code</li>
                    <li>Don't forget to register language component</li>
                    <li>Don't mix module and language registration types</li>
                </ul>
            </div>
        </div>
    </div>
</div>
