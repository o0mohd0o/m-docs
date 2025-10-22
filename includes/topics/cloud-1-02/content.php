<div class="alert alert-warning">
    <i class="fas fa-exclamation-triangle"></i> <strong>Exam Critical:</strong> Understanding the Cloud Admin UI is essential for the AD0-E717 exam! Know how to locate project settings, manage environments, access logs, and use environment controls.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Cloud Admin UI Navigation</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Cloud Admin UI))
    Project Settings
      User management
      Project variables
      General settings
    Environments
      Access links
      Environment list
      Status indicators
    Logs
      var log location
      SSH access
      Pro platform logs
    Environment Controls
      Disable enable
      Outgoing emails
      Search engine indexing
      HTTP access control
    Action Buttons
      Git CLI commands
      Branch create
      Merge to parent
      Sync code data
      Backup snapshot
    </div>
</div>

<h2>Cloud Admin UI Overview</h2>

<div class="directory-card">
    <p>The <strong>Cloud Admin UI</strong> provides a web interface to manage your Commerce Cloud project, environments, settings, and deployments.</p>
    <div class="key-point"><strong>Important:</strong> Use this as a guide for hands-on experience with the Admin UI, not just reading!</div>
</div>

<h2>Project Settings</h2>

<div class="directory-card">
    <h3>Where to Find Project Settings</h3>
    <p>Access project-level settings from the main project dashboard:</p>
    <ul>
        <li><strong>User Management:</strong> Add/remove users and manage access permissions</li>
        <li><strong>Project Variables:</strong> Configure environment variables available across all environments</li>
        <li><strong>General Settings:</strong> Project name, region, and configuration</li>
    </ul>
</div>

<h3>User Management</h3>

<div class="directory-card">
    <p>Manage team access to the Cloud project:</p>
    <ul>
        <li>Add new users with email addresses</li>
        <li>Set permission levels (Admin, Contributor, Viewer)</li>
        <li>Remove user access</li>
        <li>Manage SSH key access</li>
    </ul>
    <div class="warning-box"><strong>Security:</strong> Only grant necessary permissions. Use Viewer role for read-only access.</div>
</div>

<h3>Project Variables</h3>

<div class="directory-card">
    <p>Configure variables that apply to all environments:</p>
    <ul>
        <li>Set environment-specific configuration</li>
        <li>Store API keys and credentials securely</li>
        <li>Configure application settings</li>
        <li>Available across all branches/environments</li>
    </ul>
    <div class="key-point"><strong>Best Practice:</strong> Use project variables for shared configuration; environment variables for environment-specific settings.</div>
</div>

<h2>Locate Environments, Access Links, and Logs</h2>

<h3>Environments View</h3>

<div class="directory-card">
    <p>The <strong>Environments</strong> page shows your project's environment tree:</p>
    <ul>
        <li>Visual tree structure of all branches/environments</li>
        <li>Active vs inactive environments</li>
        <li>Parent-child relationships</li>
        <li>Environment status indicators</li>
    </ul>
    <h4>Environment Tree Structure</h4>
    <p>For <strong>Starter:</strong></p>
    <ul>
        <li>master (production)</li>
        <li>staging</li>
        <li>integration branches</li>
    </ul>
    <p>For <strong>Pro:</strong></p>
    <ul>
        <li>master (production)</li>
        <li>staging</li>
        <li>integration (base)</li>
        <li>development branches</li>
    </ul>
</div>

<h3>Access Links</h3>

<div class="directory-card">
    <p>Each environment provides multiple access methods:</p>
    <ul>
        <li><strong>Web URL:</strong> Direct link to frontend</li>
        <li><strong>SSH Access:</strong> Command-line access to environment</li>
        <li><strong>Admin Panel:</strong> Link to Magento admin</li>
        <li><strong>Database Access:</strong> MySQL connection details</li>
    </ul>
    <div class="success-box"><strong>Quick Access:</strong> Click environment name to see all access links and credentials.</div>
</div>

<h2>Logs</h2>

<div class="directory-card">
    <h3>Log Locations</h3>
    <p>Logs are stored in different locations depending on environment tier:</p>
    
    <h4>Starter & Pro Integration Environments</h4>
    <div class="directory-path">/var/log</div>
    <p>Access via SSH to the environment.</p>
    
    <h4>Pro Staging & Production</h4>
    <div class="directory-path">/var/log/platform/</div>
    <p><strong>Important for Pro:</strong> You must log into <strong>all three nodes</strong> to access logs across the cluster.</p>
    
    <h4>Accessing Logs</h4>
    <ul>
        <li>SSH into the environment</li>
        <li>Navigate to log directory</li>
        <li>Use commands like <code>tail</code>, <code>less</code>, or <code>grep</code></li>
        <li>Download logs for local analysis if needed</li>
    </ul>
    
    <h4>Common Log Files</h4>
    <ul>
        <li><code>deploy.log</code> - Deployment process logs</li>
        <li><code>system.log</code> - Magento system logs</li>
        <li><code>exception.log</code> - PHP exceptions</li>
        <li><code>debug.log</code> - Debug information</li>
        <li><code>error.log</code> - Server error logs</li>
    </ul>
</div>

<h2>Environment Control Panel Actions</h2>

<div class="directory-card">
    <p>The <strong>Environment Control Panel</strong> provides basic actions for each environment:</p>
    <ul>
        <li><strong>View Logs:</strong> Access deployment and application logs</li>
        <li><strong>Restart Services:</strong> Restart web server, cache, etc.</li>
        <li><strong>Clear Cache:</strong> Flush Magento and platform caches</li>
        <li><strong>Redeploy:</strong> Trigger a new deployment</li>
        <li><strong>Delete Environment:</strong> Remove inactive environments</li>
    </ul>
</div>

<h2>Environment Settings</h2>

<div class="directory-card">
    <p>Inside each <strong>environment's configuration</strong>, you can change settings:</p>
    
    <h3>Available Settings</h3>
    
    <h4>1. Environment Status</h4>
    <ul>
        <li>Enable or disable the environment</li>
        <li>Disabled environments don't consume resources</li>
        <li>Cannot access disabled environments via web</li>
    </ul>
    
    <h4>2. Outgoing Emails</h4>
    <ul>
        <li><strong>Disabled by default</strong> in all non-production environments</li>
        <li>Must explicitly enable for testing email functionality</li>
        <li>Prevents accidental customer emails from staging/integration</li>
    </ul>
    <div class="warning-box"><strong>Important:</strong> Outgoing emails are <strong>disabled by default</strong> to prevent sending test emails to real customers!</div>
    
    <h4>3. Search Engine Indexing</h4>
    <ul>
        <li>Control whether search engines can index the environment</li>
        <li>Disable for staging/development to prevent duplicate content issues</li>
        <li>Enable only for production</li>
    </ul>
    
    <h4>4. HTTP Access Control</h4>
    <ul>
        <li>Restrict access with username/password (HTTP Basic Auth)</li>
        <li><strong>Ideally used on staging</strong> to prevent search engines and unauthorized access</li>
        <li>Add multiple username/password combinations</li>
        <li>Protects non-production environments</li>
    </ul>
    <div class="key-point"><strong>Best Practice:</strong> Always enable HTTP access control on staging to prevent public access and search engine crawling.</div>
</div>

<h2>Five Important Environment Buttons</h2>

<div class="directory-card">
    <p>At the top of each branch/environment, there are <strong>5 very important buttons</strong>:</p>
    
    <h3>1. 📋 Git/CLI Access</h3>
    <ul>
        <li>Provides commands and git remote details</li>
        <li>Shows how to load project locally to your system</li>
        <li>Includes SSH connection string</li>
        <li>Git clone command with authentication</li>
    </ul>
    <pre><code>git clone &lt;project-url&gt;
magento-cloud checkout &lt;environment&gt;</code></pre>
    
    <h3>2. 🌿 Branch (Create New Environment)</h3>
    <ul>
        <li>Create a new branch (environment) from the current branch</li>
        <li>Only enabled if you have permission and available environments</li>
        <li>Creates child environment with copied data</li>
    </ul>
    <div class="key-point"><strong>Note:</strong> Branch and environment are used interchangeably. An environment is a branch that is publicly accessible via the web (when enabled).</div>
    
    <h3>3. 🔀 Merge</h3>
    <ul>
        <li>Merges the current branch to its parent</li>
        <li><strong>Integration → Staging</strong></li>
        <li><strong>Staging → Master</strong></li>
        <li>Not available on master branch (no parent to merge to)</li>
        <li>Triggers automatic deployment to parent environment</li>
    </ul>
    <div class="warning-box"><strong>Important:</strong> Merge button is NOT available on master branch!</div>
    
    <h3>4. 🔄 Sync</h3>
    <ul>
        <li>Syncs code and/or data and files from parent</li>
        <li>Can sync code only, data only, or both</li>
        <li>Also available via <code>magento-cloud</code> CLI</li>
        <li>Useful for refreshing integration with production data</li>
    </ul>
    <pre><code>magento-cloud environment:synchronize</code></pre>
    
    <h3>5. 💾 Backup (Snapshot)</h3>
    <ul>
        <li>Creates a backup/snapshot of the environment</li>
        <li>Includes database and files</li>
        <li>Can restore from snapshots later</li>
        <li>Recommended before major changes</li>
    </ul>
    <div class="success-box"><strong>Best Practice:</strong> Always create a snapshot before merging to production or making major configuration changes.</div>
</div>

<h2>Key Terminology</h2>

<div class="directory-card">
    <h3>Branch vs Environment</h3>
    <p>The DevDocs and Admin UI use <strong>branch</strong> and <strong>environment</strong> interchangeably:</p>
    <ul>
        <li><strong>Branch:</strong> Git branch in your repository</li>
        <li><strong>Environment:</strong> A branch that is <strong>activated</strong> and publicly accessible via the web</li>
        <li>An environment is an <strong>enabled branch</strong></li>
        <li>Inactive branches exist in git but don't have running environments</li>
    </ul>
</div>

<h2>Pro Environment Specifics</h2>

<div class="directory-card">
    <h3>Three-Node Cluster</h3>
    <p>For <strong>Pro Staging and Production:</strong></p>
    <ul>
        <li>Runs on three separate nodes for fault tolerance</li>
        <li>Must log into <strong>all three nodes</strong> to access complete logs</li>
        <li>Load balanced across nodes</li>
        <li>Higher availability and performance</li>
    </ul>
    <div class="key-point"><strong>Remember:</strong> Pro production has 3 nodes - check logs on all of them!</div>
</div>

<h2>Further Reading</h2>

<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/architecture/cloud-architecture.html" target="_blank">Magento Commerce Cloud Architecture</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/architecture/starter-architecture.html" target="_blank">Starter Architecture</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/architecture/pro-architecture.html" target="_blank">Pro Architecture</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/develop/deploy/best-practices.html" target="_blank">Pro Develop and Deploy Workflow</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/project/overview.html" target="_blank">Cloud Project Management</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>

<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Logs:</strong> /var/log for Starter/Integration; /var/log/platform/ for Pro Staging/Production (3 nodes).</li>
        <li><strong>Outgoing emails:</strong> Disabled by default in all environments.</li>
        <li><strong>HTTP Access Control:</strong> Ideally used on staging to prevent unauthorized access.</li>
        <li><strong>5 Buttons:</strong> Git/CLI, Branch, Merge, Sync, Backup.</li>
        <li><strong>Merge:</strong> Not available on master (no parent). Integration→Staging→Master.</li>
        <li><strong>Branch vs Environment:</strong> Environment = enabled branch accessible via web.</li>
        <li><strong>Pro Logs:</strong> Must check all 3 nodes for complete log coverage.</li>
        <li><strong>Sync:</strong> Available via UI and magento-cloud CLI tool.</li>
    </ul>
</div>
