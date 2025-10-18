<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Magento is highly structured, and knowing where files reside helps you navigate the codebase efficiently and follow best practices.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-project-diagram"></i> Visual Overview
    </h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Magento Root))
    app/
      code
      design
      etc
      i18n
    bin/
      magento CLI
    generated/
      Auto-generated
    pub/
      Document root
      media
      static
    var/
      Temporary
      cache
      log
    vendor/
      Composer
      Never modify
    </div>
</div>

<h2>Root Directory Structure</h2>
<p>The root Magento directory contains several primary folders, each serving a specific purpose:</p>

<h3>Core Configuration and Code Areas</h3>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> app/code</div>
    <p>This is where your <strong>custom modules</strong> are found.</p>
    <div class="key-point">
        <strong>Best Practice:</strong> Third-party modules should NOT be installed here. Use Composer instead, as it allows automatic dependency updates.
    </div>
    <p><strong>Why?</strong> Installing modules via <code>app/code</code> makes it difficult to keep them up-to-date.</p>
</div>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> app/design/[frontend|adminhtml]</div>
    <p>This directory stores <strong>themes</strong> for the frontend and admin areas.</p>
    <ul>
        <li><code>app/design/frontend</code> - Customer-facing themes</li>
        <li><code>app/design/adminhtml</code> - Admin panel themes</li>
    </ul>
</div>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> app/i18n</div>
    <p>Location for <strong>translation (language) packages</strong>.</p>
    <p>Used for multi-language store configurations.</p>
</div>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> app/etc/</div>
    <p>Stores <strong>critical configuration files</strong>:</p>
    
    <h4 class="h6 mt-3"><code>app/etc/env.php</code></h4>
    <div class="warning-box">
        <i class="fas fa-exclamation-triangle"></i> <strong>Important:</strong> Contains environment-specific configuration (database, Redis, AMQP).
        <br><strong>⚠️ Should NOT be included in Git</strong> - contains sensitive information!
    </div>
    <p>Configuration includes:</p>
    <ul>
        <li>Database connection details</li>
        <li>Redis configuration</li>
        <li>Advanced Message Queuing Protocol (AMQP) settings</li>
    </ul>

    <h4 class="h6 mt-3"><code>app/etc/config.php</code></h4>
    <div class="success-box">
        <i class="fas fa-check-circle"></i> <strong>Should be committed to Git repository</strong>
    </div>
    <p>Contains:</p>
    <ul>
        <li>Module enable/disable configuration</li>
        <li>Store configuration defaults</li>
        <li>Theming configuration</li>
    </ul>
    <p>Merges with <code>env.php</code> at runtime.</p>
</div>

<h3>Application Execution and Tools</h3>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> bin/</div>
    <p>Contains the <code>bin/magento</code> file - the <strong>command-line interface (CLI) tool</strong>.</p>
    <div class="key-point">
        <i class="fas fa-terminal"></i> <strong>Used constantly by developers</strong> for tasks like:
        <ul class="mb-0 mt-2">
            <li>Cache management: <code>bin/magento cache:flush</code></li>
            <li>Module management: <code>bin/magento module:enable</code></li>
            <li>Setup commands: <code>bin/magento setup:upgrade</code></li>
        </ul>
    </div>
</div>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> dev/</div>
    <p>Contains configuration for <strong>built-in tools</strong>:</p>
    <ul>
        <li>Grunt configuration</li>
        <li>Magento's test suite</li>
    </ul>
</div>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> generated/</div>
    <p>Files are <strong>automatically created by Magento</strong>.</p>
    <div class="success-box">
        <strong>Best Practice:</strong> These files should be built during the deployment process using CI/CD.
    </div>
    <p><strong>Contains:</strong></p>
    <ul>
        <li>Factory classes</li>
        <li>Interceptor classes (required for plugins)</li>
        <li>Proxy classes (used for lazy-loading)</li>
        <li>Extension attribute interfaces/classes</li>
    </ul>
</div>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> lib/</div>
    <p>Contains <strong>internal libraries</strong> that Magento relies on.</p>
    <p>Example: jQuery is located in <code>lib/web/jquery/</code></p>
</div>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> setup/</div>
    <p>Contains files related to <strong>installing Magento</strong>.</p>
    <div class="key-point">
        <strong>Preferred Method:</strong> Use CLI command <code>bin/magento setup:install</code>
        <br>❌ Avoid using the <code>/setup</code> URL in production
    </div>
</div>

<h3>Web Root and Assets</h3>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> pub/</div>
    <p><strong>This should be the HTTP root for the webserver.</strong></p>
    <div class="warning-box">
        <i class="fas fa-shield-alt"></i> <strong>Security:</strong> Setting document root to <code>/pub</code> helps prevent exposing sensitive folders like <code>var/</code>
    </div>
    <p><strong>How it works:</strong></p>
    <ul>
        <li>When a user requests a URL, if the exact file doesn't exist, the webserver rewrites to <code>pub/index.php</code></li>
        <li>This starts the Magento request</li>
    </ul>

    <h4 class="h6 mt-3"><code>pub/media/</code></h4>
    <p>Where the website's <strong>images</strong> are stored.</p>

    <h4 class="h6 mt-3"><code>pub/static/</code></h4>
    <p>Contains <strong>processed files</strong> (.css, .js, .html) ready for end-users to download.</p>
    <ul>
        <li><strong>Developer mode:</strong> Files are symlinked using <code>bin/magento dev:source-theme:deploy</code></li>
        <li><strong>Production mode:</strong> Files are processed and copied using <code>bin/magento setup:static-content:deploy</code></li>
    </ul>
    <div class="warning-box">
        ⚠️ <strong>Do NOT delete</strong> the <code>.htaccess</code> file in this directory - it prevents theme files from downloading!
    </div>
</div>

<h3>Temporary and Third-Party Directories</h3>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> var/</div>
    <p>Stores <strong>temporary files</strong> used by Magento or generated by the application.</p>
    <p><strong>Examples:</strong></p>
    <ul>
        <li><code>var/log/</code> - Application logs</li>
        <li><code>var/report/</code> - Error reports</li>
        <li><code>var/cache/</code> & <code>var/page_cache/</code> - File-system cache</li>
    </ul>
    <div class="key-point">
        <strong>Important:</strong> This directory can be deleted at any time - never store critical data here!
    </div>
    <div class="warning-box">
        <strong>Scaling Limitation:</strong> Using file-system caches in this directory prevents horizontal scaling (running Magento on multiple instances).
    </div>
</div>

<div class="directory-card">
    <div class="directory-path"><i class="fas fa-folder"></i> vendor/</div>
    <p>Where all <strong>Composer-installed modules</strong> are located.</p>
    <div class="success-box">
        <i class="fas fa-redo"></i> This directory can be deleted and recreated by running <code>composer install</code>
    </div>
    <div class="warning-box">
        <strong>⚠️ CRITICAL:</strong> NEVER modify code in the <code>vendor/</code> directory!
        <br>Any changes will be destroyed the next time <code>composer update</code> or <code>composer install</code> runs.
    </div>
</div>

<h2>Quick Reference Table</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Directory</th>
                <th>Purpose</th>
                <th>Key Points</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>app/code</code></td>
                <td>Custom modules</td>
                <td>Use Composer for 3rd-party modules</td>
            </tr>
            <tr>
                <td><code>app/design</code></td>
                <td>Themes</td>
                <td>Frontend & adminhtml themes</td>
            </tr>
            <tr>
                <td><code>app/etc/env.php</code></td>
                <td>Environment config</td>
                <td>❌ DO NOT commit to Git</td>
            </tr>
            <tr>
                <td><code>app/etc/config.php</code></td>
                <td>Module config</td>
                <td>✅ Should commit to Git</td>
            </tr>
            <tr>
                <td><code>bin/</code></td>
                <td>CLI tools</td>
                <td>Contains bin/magento</td>
            </tr>
            <tr>
                <td><code>generated/</code></td>
                <td>Auto-generated code</td>
                <td>Factories, interceptors, proxies</td>
            </tr>
            <tr>
                <td><code>pub/</code></td>
                <td>Web root</td>
                <td>Should be HTTP document root</td>
            </tr>
            <tr>
                <td><code>var/</code></td>
                <td>Temporary files</td>
                <td>Can be deleted anytime</td>
            </tr>
            <tr>
                <td><code>vendor/</code></td>
                <td>Composer packages</td>
                <td>⚠️ NEVER modify directly</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li>Know which files should/shouldn't be committed to version control</li>
        <li>Understand the difference between <code>env.php</code> and <code>config.php</code></li>
        <li>Remember that <code>pub/</code> should be the document root for security</li>
        <li>Understand that <code>vendor/</code> code should never be modified</li>
        <li>Know where generated code is stored and when it's created</li>
        <li>Understand the purpose of the <code>var/</code> directory and its scalability limitations</li>
    </ul>
</div>
