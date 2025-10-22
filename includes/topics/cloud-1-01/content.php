<div class="alert alert-warning">
    <i class="fas fa-exclamation-triangle"></i> <strong>Exam Critical:</strong> Commerce Cloud topics appear on the AD0-E717 certification exam! Understanding Cloud architecture, editions, workflows, and deployment processes is essential for both the exam and real-world cloud development.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Magento Commerce Cloud</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Commerce Cloud))
    Platform
      Built on AWS
      Based on Platform.sh
      Managed code and environment
    Editions
      Starter shared hosting
      Pro dedicated instances
    Starter Workflow
      master production
      staging replicates prod
      integration branches work
    Pro Workflow
      integration base
      staging testing
      master production
    Data Flow
      Production to Staging to Integration
    Code Flow
      Integration to Staging to Production
    </div>
</div>

<h2>What is Magento Commerce Cloud?</h2>

<div class="directory-card">
    <p><strong>Magento Commerce Cloud</strong> is a hosting platform built on <strong>AWS</strong> to host Commerce projects.</p>
    <h3>Platform Overview</h3>
    <ul>
        <li>Built on <strong>Platform.sh</strong> infrastructure</li>
        <li>Includes many value-add features</li>
        <li>Magento manages both code and environment</li>
        <li>Most qualified hosting platform for Commerce</li>
    </ul>
    <div class="success-box"><strong>Key Benefit:</strong> Fully managed environment optimized specifically for Magento Commerce.</div>
</div>

<h2>Cloud Editions: Starter vs Pro</h2>

<div class="directory-card">
    <p>There are <strong>two editions</strong> of Magento Commerce Cloud:</p>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Feature</th>
                <th>Starter</th>
                <th>Pro</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Hosting</strong></td>
                <td>Shared hosting</td>
                <td>Dedicated AWS instances</td>
            </tr>
            <tr>
                <td><strong>Fault Tolerance</strong></td>
                <td>Single server</td>
                <td>Three server setups</td>
            </tr>
            <tr>
                <td><strong>B2B Module</strong></td>
                <td>Manual install via Composer</td>
                <td>Manual install via Composer</td>
            </tr>
            <tr>
                <td><strong>Deployment Path</strong></td>
                <td>Integration → Staging → Master (Production)</td>
                <td>Integration → Staging → Production (8 active environments)</td>
            </tr>
            <tr>
                <td><strong>Primary Branch</strong></td>
                <td>master = production</td>
                <td>integration = base for development</td>
            </tr>
        </tbody>
    </table>
</div>

<h3>Pro Edition Exclusive Features</h3>

<div class="directory-card">
    <ul>
        <li><strong>Dedicated hosting environment</strong> (dedicated AWS instances)</li>
        <li><strong>Three server setups</strong> for fault tolerance</li>
        <li><strong>B2B module</strong> (install manually via Composer, like on-premise)</li>
        <li><strong>8 available active environments</strong></li>
        <li>More structured deployment path</li>
    </ul>
</div>

<h2>Starter Edition Workflow</h2>

<div class="directory-card">
    <p>Starter utilizes the <strong>master branch for production</strong>. Code merges from staging to master deploy to production.</p>
    <h3>Key Concept: Opposite Flows</h3>
    <ul>
        <li><strong>Code Flow:</strong> Integration → Staging → Master (Production)</li>
        <li><strong>Data Flow:</strong> Production → Staging → Integration (opposite direction!)</li>
    </ul>
    <div class="warning-box"><strong>Why Opposite?</strong> Production is the single source of truth for database information.</div>
</div>

<h3>Starter Branch Structure</h3>

<div class="directory-card">
    <ol>
        <li><strong>master:</strong> Production environment
            <ul>
                <li>Should have <strong>no changes made directly</strong> to it</li>
                <li>Code pushed to staging automatically flows to master</li>
            </ul>
        </li>
        <li><strong>staging:</strong> Pre-production environment
            <ul>
                <li>Checked out from master</li>
                <li>Closely replicates production with read-only file system</li>
                <li>Branch from which you create integration branches</li>
                <li>No direct changes should be made</li>
            </ul>
        </li>
        <li><strong>integration branches:</strong> Where work happens
            <ul>
                <li>Can have <strong>two active integration environments</strong> (activated in Cloud control panel)</li>
                <li>Can push as many branches as you wish</li>
                <li>Named whatever you wish (only "magic" names are staging and master)</li>
            </ul>
        </li>
    </ol>
</div>

<h3>Starter Development Workflow</h3>

<div class="directory-card">
    <ol>
        <li><strong>Check out staging</strong></li>
        <li><strong>Pull latest code</strong> for staging from platform remote</li>
        <li><strong>Create integration environment branch</strong> (named as desired)</li>
        <li><strong>Optionally create feature branch</strong> for specific work</li>
        <li><strong>Make changes</strong> on feature branch (if used)</li>
        <li><strong>Merge to integration branch and push</strong> → Deploys to integration environment if activated</li>
        <li><strong>Merge integration to staging</strong> → Deploys to staging environment</li>
        <li><strong>Final testing and approval</strong></li>
        <li><strong>Push to master</strong> → Releases to production</li>
    </ol>
</div>

<h2>Pro Edition Workflow</h2>

<div class="directory-card">
    <p>Pro is more <strong>structured</strong> than Starter. The <strong>integration branch</strong> is where you create branches to develop new features.</p>
    <h3>Key Differences from Starter</h3>
    <ul>
        <li><strong>Primary branch:</strong> integration (not staging)</li>
        <li>master, staging, and integration are all <strong>protected</strong> (GitLab terms)</li>
        <li>Child branches from integration activate environments</li>
        <li>Must branch from <strong>integration</strong>, not staging</li>
    </ul>
    <div class="key-point"><strong>Recommendation:</strong> After merging staging to master, also push to global master branch.</div>
</div>

<h2>Important Notes & Best Practices</h2>

<div class="directory-card">
    <h3>Branch Hierarchy</h3>
    <ul>
        <li><strong>No "hierarchy"</strong> of branches—staging is just "special"</li>
        <li>For Pro: must branch from <strong>integration</strong></li>
        <li>For Starter: branch from <strong>staging</strong></li>
    </ul>
</div>

<div class="directory-card">
    <h3>Module Management</h3>
    <ul>
        <li>Enable new modules locally first: <code>bin/magento module:enable MODULE/NAME</code></li>
        <li>Include <code>app/etc/config.php</code> in Git repository</li>
        <li>Modules not explicitly disabled in <code>app/etc/config.php</code> are automatically enabled</li>
    </ul>
    <div class="warning-box"><strong>Important:</strong> Do NOT enable modules directly in Cloud environment—do it locally first!</div>
</div>

<div class="directory-card">
    <h3>Environment Activation & Data</h3>
    <ul>
        <li>When new environment is activated, data is <strong>automatically copied</strong> from parent environment</li>
        <li>Keep data regulations in mind—customer data will be copied!</li>
        <li>Lead developer determines which branches should be activated as environments</li>
    </ul>
</div>

<div class="directory-card">
    <h3>Git Hosting Options</h3>
    <p>You can use GitHub, GitLab, or BitBucket instead of Magento git hosting.</p>
    <ul>
        <li><strong>Magento git benefit:</strong> See logs in Terminal when you <code>git push</code></li>
        <li><strong>GitLab/GitHub benefit:</strong> Protect specific branches to prevent accidental pushes</li>
    </ul>
</div>

<h2>Practical Experience: Initialize Environment</h2>

<div class="directory-card">
    <h3>Setup Steps</h3>
    <ol>
        <li><strong>Clone repository</strong> to your system
            <ul>
                <li>Click "git" (with right arrow) to see git clone path</li>
                <li>Can use <code>magento-cloud</code> commands (e.g., <code>magento-cloud checkout</code>)</li>
            </ul>
        </li>
        <li><strong>Configure project locally</strong>
            <ul>
                <li>Use <strong>master</strong> branch for Starter projects</li>
                <li>Use <strong>integration</strong> branch for Pro projects</li>
            </ul>
        </li>
        <li><strong>Push to appropriate branch</strong></li>
        <li><strong>SSH into production</strong> and configure:
            <ul>
                <li>Create admin user</li>
                <li>If Magento NOT installed, deploy will attempt auto-install</li>
            </ul>
        </li>
    </ol>
</div>

<h3>Reset an Environment</h3>

<div class="directory-card">
    <p>If you need to reset an environment:</p>
    <ol>
        <li>SSH into the branch's environment</li>
        <li>Run <code>bin/magento setup:uninstall</code></li>
        <li>Clear all writeable files: <code>rm -rf ~/*</code></li>
        <li>Flush Redis: <code>redis-cli -h redis.internal FLUSHALL</code></li>
        <li>Push an empty commit to the branch</li>
        <li>Install Magento/import database</li>
    </ol>
    <h4>View Credentials</h4>
    <pre><code>echo $MAGENTO_CLOUD_RELATIONSHIPS | base64 --d | json_pp</code></pre>
    <p>Shows database and Redis credentials.</p>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/overview.html" target="_blank">Magento Commerce Cloud Guide</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/architecture/cloud-architecture.html" target="_blank">Cloud Architecture</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/architecture/starter-architecture.html" target="_blank">Starter Architecture</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/architecture/pro-architecture.html" target="_blank">Pro Architecture</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/develop/deploy/best-practices.html" target="_blank">Pro Develop and Deploy Workflow</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Platform:</strong> Built on AWS, based on Platform.sh, fully managed.</li>
        <li><strong>Editions:</strong> Starter (shared) vs Pro (dedicated, 3 servers, 8 environments).</li>
        <li><strong>Starter:</strong> master = production; branch from staging; staging → master.</li>
        <li><strong>Pro:</strong> integration = base; branch from integration; more structured.</li>
        <li><strong>Code Flow:</strong> Integration → Staging → Production.</li>
        <li><strong>Data Flow:</strong> Production → Staging → Integration (opposite!).</li>
        <li><strong>Modules:</strong> Enable locally first; include app/etc/config.php in Git.</li>
        <li><strong>Environments:</strong> Data auto-copied from parent; 2 active integration environments in Starter.</li>
    </ul>
</div>
