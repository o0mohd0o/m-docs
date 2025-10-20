<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> The Magento caching system is crucial for performance and proper functioning. Understanding how to manage different cache types is essential for development and troubleshooting.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> Caching System Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Magento Cache))
    Architecture
      Zend_Cache
      Frontend Adapter
      Backend Storage
    What is Cached
      Configuration XML
      HTML Output
      Schema Info
      Attributes/Entities
    Cache Types
      config
      layout
      block_html
      full_page
      collections
      db_ddl
    Management Tools
      bin/magento CLI
      Admin Panel
      cache:clean
      cache:flush
    Storage Options
      File System
      Database
      Redis
    </div>
</div>

<h2>Magento Caching System Architecture</h2>
<p>The Magento caching system is based on the <strong>Zend_Cache component</strong> and consists of two critical pieces:</p>

<div class="directory-card">
    <h3><i class="fas fa-layer-group"></i> Cache Frontend</h3>
    <div class="directory-path">Magento\Framework\Cache\Frontend\Adapter\Zend</div>
    <p>Provides an <strong>interface for developers</strong> to work with the cache.</p>
    <div class="key-point">
        <strong>Purpose:</strong> Standardized API for cache operations (get, set, delete, etc.)
    </div>
</div>

<div class="directory-card">
    <h3><i class="fas fa-server"></i> Cache Backend</h3>
    <div class="directory-path">Magento/Framework/Cache/Backend/</div>
    <p>Defines <strong>how exactly cache is stored</strong> (file system, Redis, database, etc.).</p>
    <div class="key-point">
        <strong>Purpose:</strong> Actual storage implementation and retrieval mechanism
    </div>
</div>

<h2>What Does Magento Cache?</h2>
<p>The most important elements that are cached by Magento:</p>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-file-code"></i> Configuration XML Files</h4>
            <ul>
                <li><code>layout.xml</code></li>
                <li><code>config.xml</code></li>
                <li><code>ui_components.xml</code></li>
                <li>System configuration</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-code"></i> HTML Output</h4>
            <ul>
                <li>Block output</li>
                <li>Complete pages (FPC)</li>
                <li>Rendered content</li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-database"></i> Schema Information</h4>
            <ul>
                <li>Table structures</li>
                <li>Column names and types</li>
                <li>Database relationships</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-info-circle"></i> Internal Operations</h4>
            <ul>
                <li>Attribute metadata</li>
                <li>Entity information</li>
                <li>System configuration</li>
            </ul>
        </div>
    </div>
</div>

<h2>Cache Configuration</h2>
<div class="directory-card">
    <div class="directory-path"><i class="fas fa-file"></i> etc/cache.xml</div>
    <p>Cache configuration is stored in module-specific <code>etc/cache.xml</code> files.</p>
    
    <div class="key-point">
        <strong>Key cache.xml files in Magento 2.4:</strong>
        <ul class="mb-0 mt-2">
            <li><code>module-eav/etc/cache.xml</code></li>
            <li><code>module-translation/etc/cache.xml</code></li>
            <li><code>module-customer/etc/cache.xml</code></li>
            <li><code>module-webapi/etc/cache.xml</code></li>
            <li><code>module-page-cache/etc/cache.xml</code></li>
            <li><code>module-store/etc/cache.xml</code></li>
            <li><code>module-integration/etc/cache.xml</code></li>
        </ul>
    </div>
</div>

<h2>Important Cache Types</h2>

<h3><i class="fas fa-cog"></i> config - Magento Configuration</h3>
<div class="directory-card">
    <p>Stores configuration from XML files along with entries in the <code>core_config_data</code> table.</p>
    
    <div class="warning-box">
        <strong>When to refresh:</strong>
        <ul class="mb-0">
            <li>Adding system configuration entries (<code>/etc/adminhtml/system.xml</code>)</li>
            <li>Making XML configuration modifications</li>
            <li>Changing values in Admin → Stores → Configuration</li>
        </ul>
    </div>
    
    <p><strong>Command:</strong> <code>bin/magento cache:flush config</code></p>
</div>

<h3><i class="fas fa-palette"></i> layout - Layout XML Updates</h3>
<div class="directory-card">
    <p>With Magento's extensive layout configuration, a lot of CPU cycles are used in combining and building these rules.</p>
    
    <div class="warning-box">
        <strong>When to refresh:</strong>
        <ul class="mb-0">
            <li>Making changes to <code>app/design/[area]/layout/</code> folders</li>
            <li>Modifying <code>app/code/*/view/[area]/layout/</code> files</li>
        </ul>
    </div>
    
    <div class="key-point">
        <strong>Development Tip:</strong> Usually disabled for frontend development
    </div>
    
    <p><strong>Command:</strong> <code>bin/magento cache:flush layout</code></p>
</div>

<h3><i class="fas fa-cube"></i> block_html - Block HTML Output</h3>
<div class="directory-card">
    <p>Output from the <code>toHtml()</code> method on a block. Obtaining HTML from a block can be expensive, so caching allows this output to be reused.</p>
    
    <div class="key-point">
        <strong>Benefits:</strong> HTML output can be reused in other locations or pages
    </div>
    
    <div class="warning-box">
        <strong>Development Tip:</strong> Usually disabled for frontend development
    </div>
</div>

<h3><i class="fas fa-list"></i> collections - Database Query Results</h3>
<div class="directory-card">
    <p>Stores <strong>multi-row results from database queries</strong>.</p>
    <p>This cache helps reduce database load by storing frequently accessed collections.</p>
</div>

<h3><i class="fas fa-table"></i> db_ddl - Database Table Structure</h3>
<div class="directory-card">
    <p>Stores database schema information including table structure.</p>
    
    <div class="directory-path">vendor/magento/framework/DB/Adapter/Pdo/Mysql.php</div>
    
    <div class="warning-box">
        <strong>When to refresh:</strong>
        <ul class="mb-0">
            <li>After running <code>setup:upgrade</code></li>
            <li>When database schema changes are made</li>
        </ul>
    </div>
</div>

<h3><i class="fas fa-plug"></i> config_webservice - API Configuration</h3>
<div class="directory-card">
    <p>Stores configuration for <strong>REST and SOAP APIs</strong>.</p>
    
    <div class="warning-box">
        <strong>When to refresh:</strong>
        <ul class="mb-0">
            <li>Adding methods to API service contracts</li>
            <li>Modifying <code>webapi.xml</code> files</li>
        </ul>
    </div>
</div>

<h3><i class="fas fa-file-alt"></i> full_page - Full Page Cache (FPC)</h3>
<div class="directory-card">
    <p>The <strong>final layer of caching</strong> in a Magento application. Entire HTML page output can be stored.</p>
    
    <div class="success-box">
        <strong>Storage Options:</strong>
        <ul class="mb-0">
            <li><strong>File system</strong> - Default option</li>
            <li><strong>Database</strong> - Alternative storage</li>
            <li><strong>Redis</strong> - Fastest option (recommended for production)</li>
        </ul>
    </div>
    
    <div class="warning-box">
        <strong>Development Best Practice:</strong>
        <ul class="mb-0">
            <li>Leave FPC <strong>OFF</strong> during frontend development</li>
            <li>Turn it <strong>ON</strong> before deploying to ensure no caching issues</li>
        </ul>
    </div>
</div>

<h2>Cache Management Commands</h2>

<h3><i class="fas fa-terminal"></i> View Cache Status</h3>
<div class="directory-card">
    <pre><code>bin/magento cache:status</code></pre>
    <p>Shows a list of all cache types and their current status (enabled/disabled).</p>
</div>

<h3><i class="fas fa-broom"></i> Clean Cache</h3>
<div class="directory-card">
    <pre><code>bin/magento cache:clean</code></pre>
    <p>Cleans all cache types. This is the <strong>recommended first approach</strong>.</p>
    
    <div class="key-point">
        <strong>Specific Cache Types:</strong>
        <pre><code>bin/magento cache:clean config layout</code></pre>
        Cleans only the specified cache types.
    </div>
</div>

<h3><i class="fas fa-trash"></i> Flush Cache</h3>
<div class="directory-card">
    <pre><code>bin/magento cache:flush</code></pre>
    <p>Completely removes all cache data from cache storage.</p>
    
    <div class="key-point">
        <strong>Specific Cache Types:</strong>
        <pre><code>bin/magento cache:flush config layout</code></pre>
        Flushes only the specified cache types.
    </div>
</div>

<h3><i class="fas fa-power-off"></i> Enable/Disable Cache</h3>
<div class="directory-card">
    <pre><code>bin/magento cache:enable [cache_types]
bin/magento cache:disable [cache_types]</code></pre>
    <p>Enable or disable specific cache types.</p>
    
    <div class="key-point">
        <strong>Example:</strong>
        <pre><code>bin/magento cache:disable layout block_html</code></pre>
    </div>
</div>

<h2>Cache:Clean vs Cache:Flush</h2>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #198754;">
            <h4><i class="fas fa-check-circle"></i> cache:clean (Recommended)</h4>
            <p>Cleans only Magento cache tags without affecting other applications that might share the same cache storage.</p>
            
            <div class="success-box">
                <strong>Use when:</strong>
                <ul class="mb-0">
                    <li>Making configuration changes</li>
                    <li>Updating layout files</li>
                    <li>As the first troubleshooting step</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="directory-card" style="border-left-color: #dc3545;">
            <h4><i class="fas fa-exclamation-triangle"></i> cache:flush</h4>
            <p>Completely purges all data from cache storage. More aggressive approach.</p>
            
            <div class="warning-box">
                <strong>Use when:</strong>
                <ul class="mb-0">
                    <li><code>cache:clean</code> doesn't solve the issue</li>
                    <li>You need a complete cache reset</li>
                    <li>Troubleshooting persistent cache issues</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-info mt-3">
    <h4><i class="fas fa-lightbulb"></i> Magento's Recommendation</h4>
    <p class="mb-0">Run <code>cache:clean</code> operations first. If this doesn't solve the problem, then flush the cache storage with <code>cache:flush</code>.</p>
</div>

<h2>Manual Cache Management</h2>

<div class="directory-card">
    <h4><i class="fas fa-folder"></i> File System Cache</h4>
    <pre><code>rm -rf var/cache/*
rm -rf var/page_cache/*</code></pre>
    <p>Manually delete cache files from the file system.</p>
</div>

<div class="directory-card">
    <h4><i class="fas fa-database"></i> Redis Cache</h4>
    <pre><code>redis-cli
SELECT [database_index]
FLUSHDB</code></pre>
    <p>Connect to Redis and flush the specific database.</p>
    
    <div class="warning-box">
        <strong>⚠️ Important:</strong> Sessions and content caching should never share the same Redis database. Ideally, use separate Redis instances.
    </div>
</div>

<h2>Cache Storage Types</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Storage Type</th>
                <th>Performance</th>
                <th>Use Case</th>
                <th>Configuration</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>File System</strong></td>
                <td>⭐⭐ Moderate</td>
                <td>Development, small sites</td>
                <td>Default (<code>var/cache/</code>)</td>
            </tr>
            <tr>
                <td><strong>Database</strong></td>
                <td>⭐ Slow</td>
                <td>Shared hosting limitations</td>
                <td><code>app/etc/env.php</code></td>
            </tr>
            <tr>
                <td><strong>Redis</strong></td>
                <td>⭐⭐⭐⭐⭐ Fastest</td>
                <td>Production (recommended)</td>
                <td><code>app/etc/env.php</code></td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Caching Strategy in Different Environments</h2>

<div class="row">
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-code"></i> Development Environment</h4>
            <div class="key-point">
                <strong>Commonly Disabled Caches:</strong>
                <ul class="mb-0">
                    <li><code>layout</code></li>
                    <li><code>block_html</code></li>
                    <li><code>full_page</code></li>
                </ul>
            </div>
            <p class="mt-2"><strong>Reason:</strong> Faster iteration and immediate feedback on changes</p>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="directory-card">
            <h4><i class="fas fa-rocket"></i> Production Environment</h4>
            <div class="success-box">
                <strong>All Caches Enabled</strong>
                <ul class="mb-0">
                    <li>Use Redis for best performance</li>
                    <li>Enable Full Page Cache</li>
                    <li>Configure proper cache warmup</li>
                </ul>
            </div>
            <p class="mt-2"><strong>Reason:</strong> Maximum performance and optimal user experience</p>
        </div>
    </div>
</div>

<h2>Server Caching vs Browser Caching</h2>

<div class="directory-card">
    <p>Magento includes <strong>two means of caching</strong>:</p>
    
    <div class="row mt-3">
        <div class="col-md-6">
            <h4><i class="fas fa-server"></i> Server Caching</h4>
            <ul>
                <li>All cache types discussed above</li>
                <li>Stored on server (Redis, file system, DB)</li>
                <li>Managed via CLI or Admin</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4><i class="fas fa-browser"></i> Browser Caching</h4>
            <ul>
                <li>Static resources (CSS, JS, images)</li>
                <li>Controlled via HTTP headers</li>
                <li>Managed by web server configuration</li>
            </ul>
        </div>
    </div>
</div>

<h2>Quick Reference: Cache Types</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Cache Type</th>
                <th>Identifier</th>
                <th>What's Cached</th>
                <th>When to Flush</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Configuration</td>
                <td><code>config</code></td>
                <td>XML configs + core_config_data</td>
                <td>XML or admin config changes</td>
            </tr>
            <tr>
                <td>Layouts</td>
                <td><code>layout</code></td>
                <td>Layout XML files</td>
                <td>Layout file modifications</td>
            </tr>
            <tr>
                <td>Block HTML</td>
                <td><code>block_html</code></td>
                <td>Block toHtml() output</td>
                <td>Template or block changes</td>
            </tr>
            <tr>
                <td>Collections</td>
                <td><code>collections</code></td>
                <td>Database query results</td>
                <td>Data model changes</td>
            </tr>
            <tr>
                <td>DDL</td>
                <td><code>db_ddl</code></td>
                <td>Database schema</td>
                <td>After setup:upgrade</td>
            </tr>
            <tr>
                <td>Web Services</td>
                <td><code>config_webservice</code></td>
                <td>REST/SOAP API config</td>
                <td>API service contract changes</td>
            </tr>
            <tr>
                <td>Full Page</td>
                <td><code>full_page</code></td>
                <td>Complete HTML pages</td>
                <td>Any frontend changes</td>
            </tr>
            <tr>
                <td>Translations</td>
                <td><code>translate</code></td>
                <td>Translation dictionaries</td>
                <td>Translation file changes</td>
            </tr>
            <tr>
                <td>EAV</td>
                <td><code>eav</code></td>
                <td>EAV attribute metadata</td>
                <td>Attribute modifications</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li>Magento caching is based on <strong>Zend_Cache component</strong></li>
        <li>Two main pieces: <strong>Frontend (interface) and Backend (storage)</strong></li>
        <li><code>cache:clean</code> is recommended first, then <code>cache:flush</code> if needed</li>
        <li>Know the purpose of each major cache type (config, layout, block_html, full_page)</li>
        <li>Redis is the recommended cache backend for production</li>
        <li>Full Page Cache should be disabled during frontend development</li>
        <li>Cache configuration is stored in <code>etc/cache.xml</code> files</li>
        <li>Manual cache clearing: <code>rm -rf var/cache/*</code> or Redis <code>FLUSHDB</code></li>
        <li>The <code>config</code> cache stores both XML and database configuration</li>
        <li>Sessions and cache should use separate Redis instances/databases</li>
    </ul>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-operations/configuration-guide/cache/caching-overview.html" target="_blank">Configure Caching</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-operations/configuration-guide/cli/manage-cache.html" target="_blank">Manage the Cache</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/systems/tools/cache-management.html" target="_blank">Cache Overview</a></li>
    </ul>
</div>
