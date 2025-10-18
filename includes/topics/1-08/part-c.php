<!-- Part C: Database Translations & Priority -->
<h2 id="part-c"><i class="fas fa-database"></i> Part C: Database Translations & Priority Order</h2>

<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Section Overview:</strong> Understanding database translations, inline translation, and the complete translation priority order.
</div>

<h3>Database Translations</h3>

<div class="concept-card">
    <h4><i class="fas fa-database"></i> The <code>translation</code> Table</h4>
    
    <p>Database translations are stored in the <code>translation</code> table and provide the <strong>highest priority</strong> translation source.</p>

    <div class="row">
        <div class="col-md-6">
            <div class="success-box">
                <h5>Advantages</h5>
                <ul class="mb-0">
                    <li><strong>Easiest to implement</strong> - No files to edit</li>
                    <li><strong>Quick changes</strong> - Instant updates via admin</li>
                    <li><strong>Inline translation</strong> - Edit directly on frontend</li>
                    <li><strong>Highest priority</strong> - Overrides all other sources</li>
                    <li><strong>Store-specific</strong> - Different per store view</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="warning-box">
                <h5>Disadvantages</h5>
                <ul class="mb-0">
                    <li><strong>Difficult to replicate</strong> - Not in version control</li>
                    <li><strong>Not portable</strong> - Tied to specific installation</li>
                    <li><strong>Migration complexity</strong> - Must export/import</li>
                    <li><strong>Backup needed</strong> - Can be lost in DB issues</li>
                    <li><strong>No code review</strong> - Changes not tracked</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<h3>Inline Translation</h3>

<div class="concept-card">
    <h4><i class="fas fa-edit"></i> Enabling Inline Translation</h4>
    
    <p>Inline Translation allows translating phrases directly on the website frontend.</p>

    <h5>Enable in Admin Panel:</h5>
    <div class="success-box">
        <p><strong>Path:</strong> Stores → Configuration → Advanced → Developer → Translate Inline</p>
        <ol class="mb-0">
            <li>Set <strong>Enabled for Storefront</strong> to "Yes"</li>
            <li>Set <strong>Enabled for Admin</strong> to "Yes" (optional)</li>
            <li>Save configuration</li>
            <li>Clear cache</li>
        </ol>
    </div>

    <h5>How It Works:</h5>
    <ol>
        <li>Translatable phrases appear with red borders (or hover highlight)</li>
        <li>Click on a phrase to open translation dialog</li>
        <li>Enter translation</li>
        <li>Submit to save to <code>translation</code> table</li>
        <li>Translation immediately active (after cache clear)</li>
    </ol>

    <div class="warning-box">
        <strong>⚠️ Disable Caches for Best Experience:</strong>
        <p class="mb-0">While using Inline Translation, disable these caches:</p>
        <ul class="mb-0">
            <li><code>translate</code> - Translation cache</li>
            <li><code>block_html</code> - Block HTML output</li>
            <li><code>full_page</code> - Full page cache</li>
        </ul>
        <pre class="mt-2"><code>bin/magento cache:disable translate block_html full_page</code></pre>
    </div>
</div>

<h3>Creating Database Translations</h3>

<div class="concept-card">
    <h4><i class="fas fa-plus-circle"></i> Two Methods</h4>
    
    <h5>Method 1: Using Inline Translation (Recommended)</h5>
    <div class="success-box">
        <ol class="mb-0">
            <li>Enable Inline Translation in Admin</li>
            <li>Navigate to page with string to translate</li>
            <li>Click on translatable text</li>
            <li>Enter translation in dialog</li>
            <li>Submit and clear cache</li>
        </ol>
    </div>

    <h5>Method 2: Direct Database Insert (Manual)</h5>
    <div class="info-box">
        <p>Insert directly into <code>translation</code> table:</p>
        <pre><code>INSERT INTO translation (string, translate, store_id, crc_string)
VALUES (
    'Add to Cart',
    'In den Warenkorb',
    1,
    CRC32('Add to Cart')
);</code></pre>
        <p class="mb-0"><strong>Limitation:</strong> Need to determine the correct module to associate the translation with.</p>
    </div>

    <div class="key-point">
        <strong>Best Practice:</strong> Use Inline Translation for ease of use. Direct database inserts are error-prone and harder to maintain.
    </div>
</div>

<h3>Translation Priority Order</h3>

<div class="concept-card">
    <h4><i class="fas fa-sort-amount-down"></i> Complete Priority Hierarchy</h4>
    
    <p>Magento searches for translations in this specific order (lowest to highest priority):</p>

    <div class="priority-list">
        <div class="priority-item" style="border-left-color: #9e9e9e;">
            <strong>1. Module Translations</strong> (Lowest Priority)
            <p class="mb-0"><code>app/code/Vendor/Module/i18n/locale.csv</code></p>
            <small>Module's own translation dictionary</small>
        </div>

        <div class="priority-item" style="border-left-color: #2196F3;">
            <strong>2. Theme Translations</strong>
            <p class="mb-0"><code>app/design/frontend/Vendor/theme/i18n/locale.csv</code></p>
            <small>Theme-specific overrides</small>
        </div>

        <div class="priority-item" style="border-left-color: #4CAF50;">
            <strong>3. Language Package</strong>
            <p class="mb-0"><code>app/i18n/Vendor/Language/locale.csv</code></p>
            <small>Application-wide language pack</small>
        </div>

        <div class="priority-item" style="border-left-color: #FF9800;">
            <strong>4. Database Translations</strong> (Highest Priority)
            <p class="mb-0"><code>translation</code> table</p>
            <small>Inline translations and manual database entries</small>
        </div>
    </div>

    <div class="success-box">
        <strong>How It Works:</strong>
        <p>Magento starts at #1 (module) and works up. If a translation is found at any level, it's used. Higher levels override lower levels.</p>
        <p class="mb-0"><strong>Result:</strong> Database translations can override everything, making them perfect for quick fixes or store-specific customizations.</p>
    </div>
</div>

<h3>Pros & Cons Comparison</h3>

<div class="concept-card">
    <h4><i class="fas fa-balance-scale"></i> CSV Files vs Database</h4>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Aspect</th>
                    <th>CSV Files (translate.csv)</th>
                    <th>Database (translation table)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Portability</strong></td>
                    <td class="table-success">✅ Easily replicated across instances</td>
                    <td class="table-danger">❌ Tied to specific installation</td>
                </tr>
                <tr>
                    <td><strong>Version Control</strong></td>
                    <td class="table-success">✅ Can be committed to Git</td>
                    <td class="table-danger">❌ Not in version control</td>
                </tr>
                <tr>
                    <td><strong>Ease of Update</strong></td>
                    <td class="table-warning">⚠️ Must edit files manually</td>
                    <td class="table-success">✅ Quick via inline translation</td>
                </tr>
                <tr>
                    <td><strong>Store-Specific</strong></td>
                    <td class="table-warning">⚠️ Requires separate files</td>
                    <td class="table-success">✅ Easy per-store customization</td>
                </tr>
                <tr>
                    <td><strong>Migration</strong></td>
                    <td class="table-success">✅ Copy files between environments</td>
                    <td class="table-warning">⚠️ Must export/import database</td>
                </tr>
                <tr>
                    <td><strong>Professional Use</strong></td>
                    <td class="table-success">✅ Preferred for complete translations</td>
                    <td class="table-warning">⚠️ Better for quick overrides</td>
                </tr>
                <tr>
                    <td><strong>Priority</strong></td>
                    <td class="table-warning">⚠️ Lower priority</td>
                    <td class="table-success">✅ Highest priority (overrides all)</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h3>When to Use Which?</h3>

<div class="concept-card">
    <div class="row">
        <div class="col-md-6">
            <div class="success-box">
                <h5>Use CSV Files When:</h5>
                <ul class="mb-0">
                    <li>Creating complete language translations</li>
                    <li>Need version control</li>
                    <li>Deploying to multiple environments</li>
                    <li>Working with professional translators</li>
                    <li>Building reusable language packs</li>
                    <li>Need systematic approach</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <h5>Use Database When:</h5>
                <ul class="mb-0">
                    <li>Quick one-off translations needed</li>
                    <li>Store-specific customizations</li>
                    <li>Testing translations before committing</li>
                    <li>Client wants to make changes</li>
                    <li>Overriding specific problematic translations</li>
                    <li>Emergency fixes</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<h3>Best Practices</h3>

<div class="concept-card">
    <div class="success-box">
        <h5><i class="fas fa-check-circle"></i> Recommendations</h5>
        <ul class="mb-0">
            <li><strong>Primary translations:</strong> Use CSV files in language packs</li>
            <li><strong>Overrides:</strong> Use database for quick fixes</li>
            <li><strong>Document DB translations:</strong> Keep a list of manual DB translations</li>
            <li><strong>Export before migration:</strong> Export DB translations if needed</li>
            <li><strong>Disable inline in production:</strong> Only enable for authorized users</li>
            <li><strong>Clear cache after changes:</strong> Always clear translation cache</li>
            <li><strong>Use placeholders:</strong> Never concatenate translated strings</li>
        </ul>
    </div>

    <div class="warning-box">
        <h5><i class="fas fa-exclamation-triangle"></i> Common Pitfalls</h5>
        <ul class="mb-0">
            <li>Forgetting to disable caches while using inline translation</li>
            <li>Not documenting database translations</li>
            <li>Losing DB translations during migration</li>
            <li>Mixing translation sources inconsistently</li>
            <li>Leaving inline translation enabled in production</li>
        </ul>
    </div>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>Two mechanisms:</strong> Inline translation (limited) and dictionaries (comprehensive)</li>
        <li><strong>Translation hints:</strong> <code>__()</code> function and <code>translate</code> attribute</li>
        <li><strong>PHTML:</strong> Use <code>__('text')</code></li>
        <li><strong>Email:</strong> Use <code>{{trans "text"}}</code></li>
        <li><strong>XML:</strong> Use <code>translate="true"</code> attribute</li>
        <li><strong>JavaScript:</strong> Use <code>$.mage.__('text')</code></li>
        <li><strong>i18n CLI:</strong> <code>bin/magento i18n:collect-phrases</code> with <code>-m</code> flag</li>
        <li><strong>Three sources:</strong> Module/theme dictionaries, language packs, database</li>
        <li><strong>Priority order:</strong> Module → Theme → Language Pack → Database (highest)</li>
        <li><strong>CSV files:</strong> Portable, version controlled, better for complete translations</li>
        <li><strong>Database:</strong> Quick edits, highest priority, not portable</li>
        <li><strong>Inline translation:</strong> Easy to use but disable caches first</li>
        <li><strong>Language pack registration:</strong> Use <code>ComponentRegistrar::LANGUAGE</code></li>
        <li><strong>Placeholders:</strong> %1, %2, etc. for dynamic content</li>
    </ul>
</div>
