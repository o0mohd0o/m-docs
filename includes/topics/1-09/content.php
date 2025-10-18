<!-- Topic 1.09: Cron Functionality -->
<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Topic Overview:</strong> Understanding how Magento's cron system works, configuring scheduled jobs, and debugging cron functionality.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h3 style="text-align: center; margin-bottom: 20px; border: none;">
        <i class="fas fa-clock"></i> Cron System Overview
    </h3>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Cron System))
    System Cron
      UNIX based
      Triggers pub/cron.php
      Frequency: 1-15 min
    Magento Cron
      Pulls scheduled jobs
      Executes PHP classes
      Cron folder
    Configuration
      crontab.xml
      Schedule expression
      Cron groups
    Areas
      crontab default
      Frontend issues
      Adminhtml issues
    Testing
      Console command
      Direct execution
      PHPStorm debug
    </div>
</div>

<h2>What is Cron?</h2>

<div class="concept-card">
    <h4><i class="fas fa-info-circle"></i> Understanding Cron Systems</h4>
    
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <h5>System Cron (UNIX/Linux/MacOS)</h5>
                <ul>
                    <li>Operating system feature</li>
                    <li>Runs tasks on schedule</li>
                    <li>Time-based job scheduler</li>
                    <li>Configured via crontab</li>
                </ul>
                <p class="mt-2"><strong>Example:</strong> Run a script every 5 minutes</p>
                <pre><code>*/5 * * * * /path/to/script.sh</code></pre>
            </div>
        </div>
        <div class="col-md-6">
            <div class="success-box">
                <h5>Magento Cron</h5>
                <ul>
                    <li>Built on top of system cron</li>
                    <li>Executes <code>pub/cron.php</code></li>
                    <li>Manages internal job scheduling</li>
                    <li>Uses <code>cron_schedule</code> table</li>
                </ul>
                <p class="mt-2"><strong>Purpose:</strong> Background tasks without HTTP requests</p>
            </div>
        </div>
    </div>
</div>

<h2>How Magento Cron Works</h2>

<div class="concept-card">
    <h4><i class="fas fa-cogs"></i> The Cron Workflow</h4>
    
    <div class="success-box">
        <h5>Step-by-Step Process:</h5>
        <ol>
            <li><strong>System Cron Triggers</strong> - OS cron runs <code>pub/cron.php</code> (or <code>bin/magento cron:run</code>)</li>
            <li><strong>Magento Pulls Jobs</strong> - Queries <code>cron_schedule</code> table for jobs due to run</li>
            <li><strong>Executes PHP Classes</strong> - Runs the <code>execute()</code> method of each job</li>
            <li><strong>Updates Status</strong> - Marks jobs as success, error, or missed in database</li>
        </ol>
    </div>

    <div class="key-point">
        <strong>Important:</strong> Frequency is determined by system administrator, typically:
        <ul class="mb-0">
            <li>Once per minute: <code>* * * * *</code></li>
            <li>Once per 5 minutes: <code>*/5 * * * *</code></li>
            <li>Once per 15 minutes: <code>*/15 * * * *</code></li>
        </ul>
    </div>
</div>

<h3>Cron Entry Point</h3>

<div class="concept-card">
    <h4><i class="fas fa-file-code"></i> pub/cron.php</h4>
    
    <p>The main entry point for Magento cron. System cron should trigger this file.</p>

    <h5>System Crontab Example:</h5>
    <pre><code>* * * * * php /var/www/html/pub/cron.php
# Or using bin/magento
* * * * * php /var/www/html/bin/magento cron:run</code></pre>

    <div class="warning-box">
        <strong>Critical:</strong> The frequency of system cron determines the maximum frequency of Magento cron jobs. If system cron runs every 5 minutes, your Magento jobs cannot run more frequently than every 5 minutes, even if configured for every minute.
    </div>
</div>

<h2>Cron Job Structure</h2>

<div class="concept-card">
    <h4><i class="fas fa-folder"></i> Cron Class Location</h4>
    
    <p>Cron jobs are PHP classes typically located in the <code>Cron</code> folder of a module:</p>

    <h5>Example Structure:</h5>
    <pre><code>app/code/Bonlineco/OrderExport/
├── Cron/
│   └── ExportOrders.php
├── etc/
│   └── crontab.xml
└── registration.php</code></pre>

    <h5>Example Cron Class:</h5>
    <pre><code>&lt;?php
namespace Bonlineco\OrderExport\Cron;

class ExportOrders
{
    protected $logger;
    
    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }
    
    public function execute()
    {
        $this->logger->info('Cron job started: Export Orders');
        
        // Your cron logic here
        // Export orders, send emails, cleanup, etc.
        
        $this->logger->info('Cron job finished: Export Orders');
        return $this;
    }
}</code></pre>

    <div class="key-point">
        <strong>Key Points:</strong>
        <ul class="mb-0">
            <li>Must have <code>execute()</code> method</li>
            <li>No parameters in <code>execute()</code></li>
            <li>Use dependency injection for dependencies</li>
            <li>Return <code>$this</code> or <code>void</code></li>
        </ul>
    </div>
</div>

<h2>Configuring Cron Jobs</h2>

<div class="concept-card">
    <h4><i class="fas fa-file-alt"></i> crontab.xml Configuration</h4>
    
    <p>Add a <code>crontab.xml</code> file to your module to register cron jobs:</p>

    <h5>Location:</h5>
    <pre><code>app/code/Bonlineco/OrderExport/etc/crontab.xml</code></pre>

    <h5>Basic Configuration:</h5>
    <pre><code>&lt;?xml version="1.0"?&gt;
&lt;config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Cron:etc/crontab.xsd"&gt;
    &lt;group id="default"&gt;
        &lt;job name="bonlineco_export_orders" instance="Bonlineco\OrderExport\Cron\ExportOrders" method="execute"&gt;
            &lt;schedule&gt;*/5 * * * *&lt;/schedule&gt;
        &lt;/job&gt;
    &lt;/group&gt;
&lt;/config&gt;</code></pre>

    <div class="info-box">
        <h5>Configuration Elements:</h5>
        <ul class="mb-0">
            <li><code>&lt;group id="default"&gt;</code> - Cron group (default, index, etc.)</li>
            <li><code>name</code> - Unique job identifier</li>
            <li><code>instance</code> - PHP class to execute</li>
            <li><code>method</code> - Method to call (usually "execute")</li>
            <li><code>&lt;schedule&gt;</code> - Cron expression (when to run)</li>
        </ul>
    </div>
</div>

<h3>Cron Schedule Expression</h3>

<div class="concept-card">
    <h4><i class="fas fa-calendar-alt"></i> Understanding Cron Syntax</h4>
    
    <p>Cron expressions consist of 5 fields:</p>
    <pre><code>* * * * *
│ │ │ │ │
│ │ │ │ └─── Day of week (0-7, 0 and 7 are Sunday)
│ │ │ └───── Month (1-12)
│ │ └─────── Day of month (1-31)
│ └───────── Hour (0-23)
└─────────── Minute (0-59)</code></pre>

    <h5>Common Examples:</h5>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Expression</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>* * * * *</code></td>
                    <td>Every minute</td>
                </tr>
                <tr>
                    <td><code>*/5 * * * *</code></td>
                    <td>Every 5 minutes</td>
                </tr>
                <tr>
                    <td><code>0 * * * *</code></td>
                    <td>Every hour (at minute 0)</td>
                </tr>
                <tr>
                    <td><code>0 0 * * *</code></td>
                    <td>Daily at midnight</td>
                </tr>
                <tr>
                    <td><code>0 2 * * *</code></td>
                    <td>Daily at 2:00 AM</td>
                </tr>
                <tr>
                    <td><code>0 0 * * 0</code></td>
                    <td>Weekly on Sunday at midnight</td>
                </tr>
                <tr>
                    <td><code>0 0 1 * *</code></td>
                    <td>Monthly on the 1st at midnight</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="success-box">
        <strong>Tip:</strong> Use <a href="https://crontab.guru" target="_blank">crontab.guru</a> to validate and understand cron expressions!
    </div>
</div>

<h3>Cron Groups</h3>

<div class="concept-card">
    <h4><i class="fas fa-layer-group"></i> Organizing Cron Jobs</h4>
    
    <p>Magento uses cron groups to organize and control job execution:</p>

    <h5>Default Cron Groups:</h5>
    <ul>
        <li><strong>default</strong> - General purpose cron jobs</li>
        <li><strong>index</strong> - Indexing operations</li>
        <li><strong>consumers</strong> - Message queue consumers</li>
    </ul>

    <h5>Configuring Group Settings:</h5>
    <p><strong>Admin Path:</strong> Stores → Configuration → Advanced → System → Cron</p>

    <div class="info-box">
        <h5>Group Configuration Options:</h5>
        <ul class="mb-0">
            <li><strong>Generate Schedules Every</strong> - How often to generate new schedules</li>
            <li><strong>Schedule Ahead For</strong> - How far ahead to schedule jobs</li>
            <li><strong>Missed If Not Run Within</strong> - When to mark job as missed</li>
            <li><strong>History Cleanup Every</strong> - How often to clean old records</li>
            <li><strong>Success History Lifetime</strong> - How long to keep successful jobs</li>
            <li><strong>Failure History Lifetime</strong> - How long to keep failed jobs</li>
        </ul>
    </div>
</div>

<h2>Cron Area Considerations</h2>

<div class="concept-card">
    <h4><i class="fas fa-exclamation-triangle"></i> Important Area Context</h4>
    
    <div class="warning-box">
        <h5>Critical Issue:</h5>
        <p>All cron jobs execute in the <strong>crontab</strong> area by default, not frontend or adminhtml.</p>
        
        <p class="mt-2"><strong>Problems this causes:</strong></p>
        <ul class="mb-0">
            <li>Observers registered for frontend/adminhtml won't fire</li>
            <li>Area-specific configuration may not load</li>
            <li>Plugins may not work as expected</li>
            <li>Layout XML won't be processed</li>
        </ul>
    </div>

    <h5>Solutions:</h5>
    <div class="success-box">
        <ol class="mb-0">
            <li>Design cron jobs to be area-independent</li>
            <li>Manually set area if needed: <code>$this->state->setAreaCode('frontend')</code></li>
            <li>Don't rely on frontend/adminhtml observers in cron</li>
            <li>Use global scope observers when possible</li>
        </ol>
    </div>
</div>

<h2>Testing and Debugging Cron</h2>

<div class="concept-card">
    <h4><i class="fas fa-bug"></i> Testing Strategies</h4>
    
    <h5>Method 1: Manual Cron Execution</h5>
    <pre><code>php bin/magento cron:run</code></pre>
    <p>Runs all due cron jobs immediately.</p>

    <h5>Method 2: Run Specific Group</h5>
    <pre><code>php bin/magento cron:run --group=default</code></pre>

    <h5>Method 3: Create Console Command (Recommended)</h5>
    <div class="success-box">
        <p><strong>Why?</strong> Makes testing and debugging much easier!</p>
        
        <p><strong>Step 1:</strong> Create console command</p>
        <pre><code>app/code/Bonlineco/OrderExport/Console/Command/CronRun.php</code></pre>

        <pre><code>&lt;?php
namespace Bonlineco\OrderExport\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bonlineco\OrderExport\Cron\ExportOrders;

class CronRun extends Command
{
    protected $exportOrders;
    
    public function __construct(
        ExportOrders $exportOrders,
        string $name = null
    ) {
        $this->exportOrders = $exportOrders;
        parent::__construct($name);
    }
    
    protected function configure()
    {
        $this->setName('bonlineco:cron:export-orders')
             ->setDescription('Run order export cron job manually');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Starting order export...');
        $this->exportOrders->execute();
        $output->writeln('Order export completed!');
        return 0;
    }
}</code></pre>

        <p class="mt-2"><strong>Step 2:</strong> Register in <code>di.xml</code></p>
        <pre><code>&lt;type name="Magento\Framework\Console\CommandList"&gt;
    &lt;arguments&gt;
        &lt;argument name="commands" xsi:type="array"&gt;
            &lt;item name="bonlineco_cron_export" xsi:type="object"&gt;
                Bonlineco\OrderExport\Console\Command\CronRun
            &lt;/item&gt;
        &lt;/argument&gt;
    &lt;/arguments&gt;
&lt;/type&gt;</code></pre>

        <p class="mt-2"><strong>Step 3:</strong> Run command</p>
        <pre><code>php bin/magento bonlineco:cron:export-orders</code></pre>
    </div>

    <h5>Method 4: PHPStorm Debugging</h5>
    <div class="info-box">
        <ol class="mb-0">
            <li>Configure PHPStorm to run PHP Script</li>
            <li>Point to your console command</li>
            <li>Set breakpoints in cron class</li>
            <li>Debug with full IDE support!</li>
        </ol>
    </div>
</div>

<h3>Checking Cron Status</h3>

<div class="concept-card">
    <h4><i class="fas fa-database"></i> Using cron_schedule Table</h4>
    
    <p>Magento tracks all cron jobs in the <code>cron_schedule</code> table:</p>

    <h5>Query Recent Cron Jobs:</h5>
    <pre><code>SELECT 
    job_code, 
    status, 
    scheduled_at, 
    executed_at, 
    finished_at,
    messages
FROM cron_schedule
WHERE job_code = 'bonlineco_export_orders'
ORDER BY scheduled_at DESC
LIMIT 10;</code></pre>

    <h5>Status Values:</h5>
    <ul>
        <li><strong>pending</strong> - Scheduled but not yet run</li>
        <li><strong>running</strong> - Currently executing</li>
        <li><strong>success</strong> - Completed successfully</li>
        <li><strong>error</strong> - Failed with error</li>
        <li><strong>missed</strong> - Didn't run within expected time</li>
    </ul>

    <h5>CLI Command:</h5>
    <pre><code>php bin/magento cron:list</code></pre>
    <p>Shows all registered cron jobs and their schedules.</p>
</div>

<h2>Best Practices</h2>

<div class="concept-card">
    <div class="row">
        <div class="col-md-6">
            <div class="success-box">
                <h5><i class="fas fa-check-circle"></i> Do's</h5>
                <ul class="mb-0">
                    <li>Keep cron jobs fast and efficient</li>
                    <li>Use logging for debugging</li>
                    <li>Handle exceptions gracefully</li>
                    <li>Create console commands for testing</li>
                    <li>Use appropriate cron groups</li>
                    <li>Set realistic schedules</li>
                    <li>Monitor <code>cron_schedule</code> table</li>
                    <li>Clean up old cron records</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="warning-box">
                <h5><i class="fas fa-exclamation-triangle"></i> Don'ts</h5>
                <ul class="mb-0">
                    <li>Don't run heavy operations every minute</li>
                    <li>Don't rely on frontend/adminhtml area</li>
                    <li>Don't forget error handling</li>
                    <li>Don't assume system cron frequency</li>
                    <li>Don't create long-running jobs (use queues instead)</li>
                    <li>Don't skip logging</li>
                    <li>Don't test only in production</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<h2>Common Issues and Solutions</h2>

<div class="concept-card">
    <h4><i class="fas fa-wrench"></i> Troubleshooting</h4>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Issue</th>
                    <th>Cause</th>
                    <th>Solution</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Cron not running</td>
                    <td>System cron not configured</td>
                    <td>Add cron entry to system crontab</td>
                </tr>
                <tr>
                    <td>Jobs always "missed"</td>
                    <td>System cron runs too infrequently</td>
                    <td>Increase system cron frequency or adjust job schedule</td>
                </tr>
                <tr>
                    <td>Observer not firing</td>
                    <td>Wrong area (crontab vs frontend)</td>
                    <td>Use global observers or set area manually</td>
                </tr>
                <tr>
                    <td>Job runs too often</td>
                    <td>Schedule expression incorrect</td>
                    <td>Verify cron expression with crontab.guru</td>
                </tr>
                <tr>
                    <td>Job appears twice</td>
                    <td>Duplicate configuration</td>
                    <td>Check for duplicate entries in crontab.xml</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <h4><i class="fas fa-lightbulb"></i> Key Points to Remember</h4>
    <ul class="mb-0">
        <li><strong>Entry point:</strong> <code>pub/cron.php</code> or <code>bin/magento cron:run</code></li>
        <li><strong>Configuration file:</strong> <code>etc/crontab.xml</code></li>
        <li><strong>Cron class location:</strong> <code>Cron/</code> folder in module</li>
        <li><strong>Required method:</strong> <code>execute()</code> with no parameters</li>
        <li><strong>Cron expression format:</strong> 5 fields (minute, hour, day, month, weekday)</li>
        <li><strong>Default area:</strong> crontab (not frontend or adminhtml)</li>
        <li><strong>Status tracking:</strong> <code>cron_schedule</code> database table</li>
        <li><strong>Common groups:</strong> default, index, consumers</li>
        <li><strong>Frequency limit:</strong> System cron frequency determines maximum job frequency</li>
        <li><strong>Testing tip:</strong> Create console command wrapper for easier debugging</li>
        <li><strong>Configuration:</strong> Stores → Configuration → Advanced → System → Cron</li>
    </ul>
</div>
