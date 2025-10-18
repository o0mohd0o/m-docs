<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> The CLI is a trusted, powerful tool for interacting with Magento during development. Knowing essential commands and their usage is critical for efficient development.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px; border: none;">
        <i class="fas fa-project-diagram"></i> CLI Command Categories
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((bin/magento))
    Setup
      setup:install
      setup:upgrade
      setup:di:compile
      setup:static-content:deploy
    Module Management
      module:status
      module:enable
      module:disable
    Cache
      cache:flush
      cache:clean
      cache:enable
      cache:disable
    Indexing
      indexer:reindex
      indexer:status
      indexer:set-mode
    Development
      dev:source-theme:deploy
      deploy:mode:set
    Admin
      admin:user:create
    </div>
</div>

<h2>CLI Basics</h2>

<div class="concept-card">
    <h4><i class="fas fa-terminal"></i> Why Use the CLI?</h4>
    <p><code>bin/magento</code> provides an easy way to interact with Magento during development.</p>
    
    <div class="success-box">
        <strong>Key Benefits:</strong>
        <ul class="mb-0">
            <li><strong>Trusted Environment</strong> - CLI access requires server access</li>
            <li><strong>Automation</strong> - Commands can be scripted</li>
            <li><strong>Efficiency</strong> - Faster than GUI operations</li>
            <li><strong>Development Essential</strong> - Many operations only available via CLI</li>
        </ul>
    </div>
</div>

<h3>Command Abbreviation</h3>
<div class="concept-card">
    <p>You can <strong>shorten commands</strong> to any unique combination of characters:</p>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Full Command</th>
                    <th>Abbreviation Examples</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>cache:flush</code></td>
                    <td><code>c:f</code>, <code>ca:fl</code>, <code>cach:flu</code></td>
                </tr>
                <tr>
                    <td><code>setup:upgrade</code></td>
                    <td><code>s:up</code>, <code>set:up</code>, <code>setup:u</code></td>
                </tr>
                <tr>
                    <td><code>setup:static-content:deploy</code></td>
                    <td><code>s:s:d</code>, <code>set:sta:dep</code></td>
                </tr>
                <tr>
                    <td><code>indexer:reindex</code></td>
                    <td><code>i:r</code>, <code>ind:rei</code></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="key-point">
        <strong>Rule:</strong> Abbreviation must be unique. If it matches multiple commands, you'll get an error listing all matches.
    </div>
</div>

<h2>Essential Commands</h2>

<h3>1. Setup & Installation</h3>

<div class="command-card">
    <h5><i class="fas fa-download"></i> setup:install</h5>
    <p><strong>Purpose:</strong> Install Magento via CLI (preferred over /setup URL)</p>
    <pre><code>bin/magento setup:install \
    --base-url=https://example.com/ \
    --db-host=localhost \
    --db-name=magento \
    --db-user=root \
    --db-password=db_password \
    --admin-firstname=John \
    --admin-lastname=Doe \
    --admin-email=john@example.com \
    --admin-user=admin \
    --admin-password=admin123</code></pre>
</div>

<div class="command-card">
    <h5><i class="fas fa-arrow-up"></i> setup:upgrade</h5>
    <p><strong>Purpose:</strong> Run setup install scripts and synchronize DB schema</p>
    <pre><code>bin/magento setup:upgrade</code></pre>
    
    <div class="info-box">
        <strong>Speed Up Development:</strong>
        <pre class="mb-0"><code>bin/magento setup:upgrade --keep-generated</code></pre>
        <p class="mb-0"><small>Use <code>--keep-generated</code> when NOT modifying plugins or extension attributes. Speeds up by skipping code generation.</small></p>
    </div>
</div>

<div class="command-card">
    <h5><i class="fas fa-cogs"></i> setup:di:compile</h5>
    <p><strong>Purpose:</strong> Generate DI configuration and code</p>
    <pre><code>bin/magento setup:di:compile</code></pre>
    <p><small>Generates code in <code>generated/</code> directory. Required after adding plugins or modifying constructor dependencies.</small></p>
</div>

<div class="command-card">
    <h5><i class="fas fa-file-code"></i> setup:static-content:deploy</h5>
    <p><strong>Purpose:</strong> Build static content for production</p>
    <pre><code>bin/magento setup:static-content:deploy en_US</code></pre>
    
    <div class="warning-box">
        <strong>⚠️ Production Mode Only!</strong>
        <p class="mb-0">This command is typically for production mode. In developer mode, use <code>dev:source-theme:deploy</code> instead.</p>
    </div>
</div>

<h3>2. Module Management</h3>

<div class="command-card">
    <h5><i class="fas fa-list"></i> module:status</h5>
    <p><strong>Purpose:</strong> Check if modules are enabled or disabled</p>
    <pre><code>bin/magento module:status</code></pre>
    <p><small>Lists all modules showing enabled/disabled status. Essential for troubleshooting "why aren't my changes working?"</small></p>
</div>

<div class="command-card">
    <h5><i class="fas fa-toggle-on"></i> module:enable</h5>
    <p><strong>Purpose:</strong> Enable one or more modules</p>
    <pre><code>bin/magento module:enable Vendor_Module
bin/magento module:enable Vendor_A Vendor_B</code></pre>
    <div class="key-point">
        <strong>After enabling:</strong> Always run <code>setup:upgrade</code>!
    </div>
</div>

<div class="command-card">
    <h5><i class="fas fa-toggle-off"></i> module:disable</h5>
    <p><strong>Purpose:</strong> Disable one or more modules</p>
    <pre><code>bin/magento module:disable Vendor_Module</code></pre>
</div>

<h3>3. Cache Management</h3>

<div class="concept-card">
    <p>Cache commands are among the most frequently used during development.</p>
    
    <div class="command-card">
        <h5><i class="fas fa-broom"></i> cache:flush</h5>
        <p><strong>Purpose:</strong> Flush all cache types</p>
        <pre><code>bin/magento cache:flush
# Abbreviation
bin/magento c:f</code></pre>
    </div>

    <div class="command-card">
        <h5><i class="fas fa-eraser"></i> cache:clean</h5>
        <p><strong>Purpose:</strong> Clean specific cache types</p>
        <pre><code>bin/magento cache:clean
bin/magento cache:clean config layout</code></pre>
    </div>

    <div class="command-card">
        <h5><i class="fas fa-power-off"></i> cache:enable / cache:disable</h5>
        <p><strong>Purpose:</strong> Enable or disable cache types</p>
        <pre><code>bin/magento cache:enable
bin/magento cache:disable full_page block_html</code></pre>
    </div>

    <div class="success-box">
        <strong>Development Best Practice:</strong>
        <p>Develop with as many caches enabled as possible for faster response times. Disable only caches you're actively modifying (e.g., full_page, block_html, layout when building themes).</p>
    </div>
</div>

<h3>4. Indexing</h3>

<div class="command-card">
    <h5><i class="fas fa-info-circle"></i> indexer:info</h5>
    <p><strong>Purpose:</strong> List all available indexers</p>
    <pre><code>bin/magento indexer:info</code></pre>
    <p><small>Shows all indexer codes and names. Use these codes with other indexer commands.</small></p>
</div>

<div class="command-card">
    <h5><i class="fas fa-eye"></i> indexer:status</h5>
    <p><strong>Purpose:</strong> Check indexer status and when last run</p>
    <pre><code>bin/magento indexer:status</code></pre>
    <p><small>Shows status (Ready/Reindex required), mode (Update on Save/Schedule), and last update time.</small></p>
</div>

<div class="command-card">
    <h5><i class="fas fa-database"></i> indexer:reindex</h5>
    <p><strong>Purpose:</strong> Reindex all or specific indices</p>
    <pre><code>bin/magento indexer:reindex
bin/magento indexer:reindex catalog_product_price
bin/magento indexer:reindex catalog_product_price catalogsearch_fulltext</code></pre>
    
    <div class="key-point">
        <strong>Tip:</strong> Use <code>indexer:info</code> to see all available index codes first.
    </div>
</div>

<div class="command-card">
    <h5><i class="fas fa-sliders-h"></i> indexer:set-mode</h5>
    <p><strong>Purpose:</strong> Set indexer mode (realtime or schedule)</p>
    <pre><code>bin/magento indexer:set-mode realtime
bin/magento indexer:set-mode schedule catalog_product_price</code></pre>
    
    <div class="warning-box">
        <strong>Performance Warning:</strong>
        <p class="mb-0">"Update on Save" (realtime) can bring local machines to a standstill with large catalogs. Use "Update on Schedule" but ensure cron is running!</p>
    </div>
</div>

<h3>5. Development Tools</h3>

<div class="command-card">
    <h5><i class="fas fa-link"></i> dev:source-theme:deploy</h5>
    <p><strong>Purpose:</strong> Create symlinks for LESS/CSS files (Developer mode)</p>
    <pre><code>bin/magento dev:source-theme:deploy</code></pre>
    <p><small>Establishes symlinks from module source files to pub/static. Keeps LESS files always up to date. Also rebuilds CSS for themes.</small></p>
</div>

<div class="command-card">
    <h5><i class="fas fa-wrench"></i> deploy:mode:set</h5>
    <p><strong>Purpose:</strong> Switch between developer/production/default modes</p>
    <pre><code>bin/magento deploy:mode:set developer
bin/magento deploy:mode:set production</code></pre>
</div>

<div class="command-card">
    <h5><i class="fas fa-eye"></i> deploy:mode:show</h5>
    <p><strong>Purpose:</strong> Display current mode</p>
    <pre><code>bin/magento deploy:mode:show</code></pre>
</div>

<h3>6. Admin User Management</h3>

<div class="command-card">
    <h5><i class="fas fa-user-plus"></i> admin:user:create</h5>
    <p><strong>Purpose:</strong> Create admin user or reset password</p>
    <pre><code>bin/magento admin:user:create \
    --admin-user=admin \
    --admin-password=admin123 \
    --admin-email=admin@example.com \
    --admin-firstname=John \
    --admin-lastname=Doe</code></pre>
    <p><small>Useful when locked out or switching between systems.</small></p>
</div>

<h2>Finding Available Commands</h2>

<div class="concept-card">
    <p><strong>To see all available commands:</strong></p>
    <pre><code>bin/magento</code></pre>
    
    <p><strong>To see help for a specific command:</strong></p>
    <pre><code>bin/magento help setup:upgrade
bin/magento setup:upgrade --help</code></pre>

    <div class="info-box">
        <strong>Troubleshooting:</strong>
        <p class="mb-0">If a common command says "not available", there's likely a problem. Run <code>bin/magento</code> alone and the error will appear.</p>
    </div>
</div>

<h2>Development Cycle Usage</h2>

<div class="concept-card">
    <h4><i class="fas fa-sync"></i> Typical Development Workflow</h4>
    
    <div class="row">
        <div class="col-md-6">
            <div class="success-box">
                <strong>Starting a New Module:</strong>
                <ol class="mb-0">
                    <li>Create module files</li>
                    <li><code>module:enable Vendor_Module</code></li>
                    <li><code>setup:upgrade</code></li>
                    <li><code>cache:flush</code></li>
                </ol>
            </div>
        </div>
        <div class="col-md-6">
            <div class="success-box">
                <strong>After Code Changes:</strong>
                <ol class="mb-0">
                    <li>Modified DI? <code>setup:di:compile</code></li>
                    <li>Modified schema? <code>setup:upgrade</code></li>
                    <li>Modified templates? Just refresh</li>
                    <li>Modified config? <code>cache:clean config</code></li>
                </ol>
            </div>
        </div>
        <div class="col-md-6">
            <div class="success-box">
                <strong>Theme Development:</strong>
                <ol class="mb-0">
                    <li><code>dev:source-theme:deploy</code></li>
                    <li>Disable full_page cache</li>
                    <li>Make changes</li>
                    <li>Refresh browser</li>
                </ol>
            </div>
        </div>
        <div class="col-md-6">
            <div class="success-box">
                <strong>Before Deployment:</strong>
                <ol class="mb-0">
                    <li><code>deploy:mode:set production</code></li>
                    <li><code>setup:di:compile</code></li>
                    <li><code>setup:static-content:deploy</code></li>
                    <li><code>indexer:reindex</code></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li>Commands can be abbreviated to any unique combination</li>
        <li><code>setup:upgrade</code> is required after enabling modules or schema changes</li>
        <li><code>--keep-generated</code> speeds up setup:upgrade when not modifying plugins</li>
        <li><code>setup:static-content:deploy</code> is for production, <code>dev:source-theme:deploy</code> for development</li>
        <li>Always run <code>setup:upgrade</code> after <code>module:enable</code></li>
        <li><code>cache:flush</code> clears all caches</li>
        <li>Indexer modes: realtime (update on save) or schedule (update on schedule)</li>
        <li>Run <code>bin/magento</code> alone to see all available commands</li>
        <li>CLI requires server access - it's a trusted environment</li>
        <li>Use <code>indexer:info</code> to see all available index codes and names</li>
    </ul>
</div>
