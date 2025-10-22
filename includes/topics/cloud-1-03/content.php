<div class="alert alert-warning">
    <i class="fas fa-exclamation-triangle"></i> <strong>Exam Critical:</strong> User management is essential for the AD0-E717 exam! Know how to add SSH keys, manage users, assign roles (Admin, Contributor, Reader), and understand permission levels.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Cloud User Management</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((User Management))
    SSH Keys
      Account settings
      magento-cloud ssh-key add
      Per user configuration
    Add Users
      Project level
      Environment level
      Email invitation
    User Roles
      Admin full access SSH
      Contributor merge branch
      Reader view only
    Super User
      Access all environments
      Override restrictions
    Permissions
      Per environment control
      Redeploy after changes
      SSH access via yaml
    Support Tickets
      magento.com portal
      Account owner default
      Share Submit Ticket access
    </div>
</div>

<h2>User Management Overview</h2>

<div class="directory-card">
    <p>Managing users in Commerce Cloud involves adding <strong>SSH keys</strong>, creating <strong>user accounts</strong>, and assigning appropriate <strong>roles</strong> and <strong>permissions</strong>.</p>
    <div class="key-point"><strong>Practical Experience:</strong> It's essential to actually practice these operations in a real Cloud environment!</div>
</div>

<h2>Add SSH Key</h2>

<div class="directory-card">
    <h3>Via Web UI</h3>
    <p>Navigate to: <strong>Account settings → Account Settings → SSH Keys</strong></p>
    <ol>
        <li>Click on your user icon (top-right)</li>
        <li>Select "Account settings"</li>
        <li>Go to "SSH Keys" section</li>
        <li>Click "Add public key"</li>
        <li>Paste your SSH public key</li>
        <li>Give it a descriptive name</li>
        <li>Save</li>
    </ol>
    
    <h3>Via CLI</h3>
    <p>You can also add SSH keys using the magento-cloud CLI:</p>
    <pre><code>magento-cloud ssh-key:add</code></pre>
    <p>This command will prompt you to select or specify your SSH key file.</p>
    
    <div class="success-box">
        <strong>Practical Experience:</strong> Ensure your SSH key is properly configured in your account. Test SSH access after adding the key:
        <pre><code>ssh &lt;environment-id&gt;@ssh.&lt;region&gt;.magento.cloud</code></pre>
    </div>
</div>

<h3>Generating SSH Keys</h3>

<div class="directory-card">
    <p>If you don't have an SSH key yet, generate one:</p>
    <pre><code># Generate new SSH key
ssh-keygen -t rsa -b 4096 -C "your_email@example.com"

# View your public key
cat ~/.ssh/id_rsa.pub</code></pre>
    <div class="warning-box"><strong>Important:</strong> Always add the <strong>public key</strong> (.pub file), never the private key!</div>
</div>

<h2>Add Users to a Project</h2>

<div class="directory-card">
    <h3>Via Web UI</h3>
    <ol>
        <li>Click the <strong>gear icon</strong> next to your project</li>
        <li>Select <strong>Users</strong></li>
        <li>Click <strong>Add User</strong></li>
        <li>Enter user's email address</li>
        <li>Select role and permissions</li>
        <li>Save</li>
    </ol>
    <p>The user will receive a <strong>welcome email from Magento</strong> with instructions on how to get started.</p>
    
    <h3>Via CLI</h3>
    <p>You can also use the <code>magento-cloud</code> CLI to add users:</p>
    <pre><code>magento-cloud user:add</code></pre>
</div>

<h2>User Access Levels</h2>

<div class="directory-card">
    <p>You can allow users access at two levels:</p>
    <ol>
        <li><strong>Project Level:</strong> Access to the overall project</li>
        <li><strong>Environment Level:</strong> Access to specific environments within the project</li>
    </ol>
    <div class="key-point"><strong>Hierarchy:</strong> First grant project access, then configure environment-specific permissions.</div>
</div>

<h2>Super User / Admin</h2>

<div class="directory-card">
    <p>Each user can be designated as a <strong>"Super User/Admin"</strong>:</p>
    <ul>
        <li>Allows them to do <strong>anything in any environment</strong></li>
        <li>Overrides environment-specific restrictions</li>
        <li>Full project access without limitations</li>
    </ul>
    
    <p><strong>If Super User is NOT enabled:</strong></p>
    <ul>
        <li>You can designate access <strong>per environment</strong></li>
        <li>User only has access to specified environments</li>
        <li>More granular control over permissions</li>
    </ul>
    
    <div class="warning-box"><strong>Important:</strong> When you change permissions, you must <strong>redeploy</strong> (if nothing else, using <code>git commit --allow-empty</code>).</div>
</div>

<h2>User Roles</h2>

<div class="directory-card">
    <h3>1. Admin</h3>
    <ul>
        <li>Can do <strong>just about anything</strong></li>
        <li><strong>Only role that can access SSH</strong> by default</li>
        <li>Full environment control</li>
        <li>Can manage settings, deploy, merge, branch</li>
        <li>Can add/remove users</li>
    </ul>
    <div class="key-point"><strong>Remember:</strong> Admins are the <strong>only ones</strong> that can access SSH by default!</div>
    
    <h3>2. Contributor</h3>
    <ul>
        <li>Can <strong>merge</strong> code to an environment</li>
        <li>Can <strong>branch</strong> from an environment</li>
        <li>Can push code and trigger deployments</li>
        <li><strong>Cannot SSH by default</strong></li>
    </ul>
    
    <h4>Enable SSH for Contributors</h4>
    <p>You can allow contributors to SSH into an environment by adding this to <code>.magento.app.yaml</code>:</p>
    <pre><code>access:
    ssh: contributor</code></pre>
    <div class="success-box"><strong>Configuration:</strong> Use <code>ssh: contributor</code> in .magento.app.yaml to grant SSH access to contributors.</div>
    
    <h3>3. Reader</h3>
    <ul>
        <li><strong>View-only access</strong></li>
        <li>Can view environments and logs</li>
        <li>Cannot make changes</li>
        <li>Cannot push code, merge, or branch</li>
        <li>Cannot SSH</li>
    </ul>
    <p style="color: #666; font-style: italic;">"Like reading books from the library but more boring (as Magento Cloud is not a historical novel)."</p>
</div>

<h2>Permission Changes and Redeployment</h2>

<div class="directory-card">
    <p>When you change user permissions, you must <strong>redeploy</strong> the environment for changes to take effect.</p>
    
    <h3>Trigger Redeployment</h3>
    <p>If no code changes are needed, use an empty commit:</p>
    <pre><code>git commit --allow-empty -m "Redeploy for permission changes"
git push</code></pre>
    
    <div class="warning-box"><strong>Critical:</strong> Permission changes require redeployment to take effect!</div>
</div>

<h2>Support Ticket Access</h2>

<div class="directory-card">
    <p>Providing access to <strong>support tickets</strong> is a <strong>completely different mechanism</strong> than providing access to configure environments.</p>
    
    <h3>Where to Manage Support Access</h3>
    <p>Support ticket access is managed on the <strong>magento.com portal</strong>, not in the Cloud Admin UI.</p>
    
    <h3>Default Permissions</h3>
    <ul>
        <li>By default, only the <strong>account owner</strong> can create support tickets</li>
        <li>Account owner is shown in: <strong>Top ribbon → Settings gear icon → Users → Account owner</strong></li>
    </ul>
    
    <h3>Share Support Access</h3>
    <p>The account owner can share <strong>"Submit a Ticket"</strong> access via their Magento portal:</p>
    <ol>
        <li>Log into magento.com</li>
        <li>Go to account/support settings</li>
        <li>Add users who should be able to submit tickets</li>
        <li>Specify permission level</li>
    </ol>
    
    <div class="key-point">
        <strong>Two Separate Systems:</strong>
        <ul>
            <li><strong>Cloud Admin UI:</strong> Manage environment access and permissions</li>
            <li><strong>Magento.com Portal:</strong> Manage support ticket access</li>
        </ul>
    </div>
</div>

<h2>User Management Best Practices</h2>

<div class="directory-card">
    <h3>Security Best Practices</h3>
    <ul>
        <li><strong>Least Privilege:</strong> Grant only necessary permissions</li>
        <li><strong>Reader Role:</strong> Use for auditors, stakeholders, or anyone who only needs to view</li>
        <li><strong>Contributor Role:</strong> For developers who push code but don't need SSH</li>
        <li><strong>Admin Role:</strong> Only for senior developers or DevOps who need full control</li>
        <li><strong>SSH Keys:</strong> Regularly audit and remove unused keys</li>
    </ul>
    
    <h3>Environment-Specific Access</h3>
    <ul>
        <li>Restrict production access to essential personnel only</li>
        <li>Allow broader access to integration/development environments</li>
        <li>Use Super User designation sparingly</li>
    </ul>
    
    <h3>Onboarding Workflow</h3>
    <ol>
        <li>Add user to project with appropriate role</li>
        <li>User receives welcome email with instructions</li>
        <li>User adds SSH key to their account</li>
        <li>Configure environment-specific permissions if needed</li>
        <li>Redeploy environments after permission changes</li>
        <li>Test access and SSH connectivity</li>
    </ol>
</div>

<h2>CLI Commands Reference</h2>

<div class="directory-card">
    <h3>SSH Key Management</h3>
    <pre><code># Add SSH key
magento-cloud ssh-key:add

# List SSH keys
magento-cloud ssh-key:list

# Delete SSH key
magento-cloud ssh-key:delete &lt;id&gt;</code></pre>
    
    <h3>User Management</h3>
    <pre><code># Add user to project
magento-cloud user:add

# List users
magento-cloud user:list

# Update user role
magento-cloud user:update

# Delete user
magento-cloud user:delete &lt;email&gt;</code></pre>
</div>

<h2>Role Permission Matrix</h2>

<div class="directory-card">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>Admin</th>
                <th>Contributor</th>
                <th>Reader</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>View environments</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            </tr>
            <tr>
                <td>View logs</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            </tr>
            <tr>
                <td>Push code</td>
                <td>✓</td>
                <td>✓</td>
                <td>✗</td>
            </tr>
            <tr>
                <td>Merge branches</td>
                <td>✓</td>
                <td>✓</td>
                <td>✗</td>
            </tr>
            <tr>
                <td>Create branches</td>
                <td>✓</td>
                <td>✓</td>
                <td>✗</td>
            </tr>
            <tr>
                <td>SSH access (default)</td>
                <td>✓</td>
                <td>✗</td>
                <td>✗</td>
            </tr>
            <tr>
                <td>SSH (with yaml config)</td>
                <td>✓</td>
                <td>✓</td>
                <td>✗</td>
            </tr>
            <tr>
                <td>Manage users</td>
                <td>✓</td>
                <td>✗</td>
                <td>✗</td>
            </tr>
            <tr>
                <td>Change settings</td>
                <td>✓</td>
                <td>✗</td>
                <td>✗</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Further Reading</h2>

<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/project/user-access.html" target="_blank">Create and manage users</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/project/user-access.html#ssh" target="_blank">SSH Access Configuration</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-cloud-service/user-guide/project/overview.html" target="_blank">Project Management</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>

<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>SSH Keys:</strong> Account settings → SSH Keys; or <code>magento-cloud ssh-key:add</code></li>
        <li><strong>Add Users:</strong> Gear icon → Users → Add User; or <code>magento-cloud user:add</code></li>
        <li><strong>Admin:</strong> Only role with SSH access by default; can do anything</li>
        <li><strong>Contributor:</strong> Can merge and branch; SSH via <code>ssh: contributor</code> in .magento.app.yaml</li>
        <li><strong>Reader:</strong> View-only access; cannot make changes</li>
        <li><strong>Super User:</strong> Access to all environments; overrides restrictions</li>
        <li><strong>Permission Changes:</strong> Must redeploy with <code>git commit --allow-empty</code></li>
        <li><strong>Support Tickets:</strong> Managed on magento.com portal, NOT in Cloud Admin UI</li>
        <li><strong>Account Owner:</strong> Only one who can create support tickets by default</li>
    </ul>
</div>
