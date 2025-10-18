window.questions = [
  {
    question: "What is the entry point file for Magento cron?",
    options: [
      "bin/magento cron",
      "pub/cron.php",
      "cron/index.php",
      "app/cron.php"
    ],
    correct: 1,
    explanation: "pub/cron.php is the main entry point for Magento cron. System cron should trigger this file (or bin/magento cron:run)."
  },
  {
    question: "Where should cron job classes typically be located?",
    options: [
      "Model/ folder",
      "Controller/ folder",
      "Cron/ folder",
      "Observer/ folder"
    ],
    correct: 2,
    explanation: "Cron job classes are typically located in the Cron/ folder of a module: app/code/Vendor/Module/Cron/"
  },
  {
    question: "What configuration file is used to register cron jobs?",
    options: [
      "etc/events.xml",
      "etc/cron.xml",
      "etc/crontab.xml",
      "etc/di.xml"
    ],
    correct: 2,
    explanation: "etc/crontab.xml is used to configure and register cron jobs in Magento modules."
  },
  {
    question: "What method must a cron job class implement?",
    options: [
      "run()",
      "execute()",
      "process()",
      "handle()"
    ],
    correct: 1,
    explanation: "Cron job classes must implement an execute() method with no parameters. This method is called when the cron runs."
  },
  {
    question: "What does the cron expression '*/5 * * * *' mean?",
    options: [
      "Every 5 hours",
      "Every 5 minutes",
      "Every 5 days",
      "5 times per hour"
    ],
    correct: 1,
    explanation: "*/5 * * * * means every 5 minutes. The first field is minutes, and */5 means 'every 5th minute'."
  },
  {
    question: "What does the cron expression '0 2 * * *' mean?",
    options: [
      "Every 2 minutes",
      "Every 2 hours",
      "Daily at 2:00 AM",
      "2nd day of every month"
    ],
    correct: 2,
    explanation: "0 2 * * * means daily at 2:00 AM (minute 0, hour 2, every day, every month, any weekday)."
  },
  {
    question: "In what area do cron jobs execute by default?",
    options: [
      "frontend",
      "adminhtml",
      "crontab",
      "global"
    ],
    correct: 2,
    explanation: "All cron jobs execute in the crontab area by default, not frontend or adminhtml. This can cause issues with area-specific observers."
  },
  {
    question: "What database table tracks cron job execution?",
    options: [
      "cron_jobs",
      "cron_schedule",
      "cron_execution",
      "scheduled_jobs"
    ],
    correct: 1,
    explanation: "The cron_schedule table tracks all cron job scheduling, execution status, and results."
  },
  {
    question: "If system cron runs every 5 minutes, can a Magento cron job run every minute?",
    options: [
      "Yes, Magento has its own scheduler",
      "No, system cron frequency limits Magento jobs",
      "Yes, using special configuration",
      "Only in developer mode"
    ],
    correct: 1,
    explanation: "System cron frequency determines the maximum frequency of Magento jobs. If system cron runs every 5 minutes, Magento jobs cannot run more frequently."
  },
  {
    question: "What is the default cron group for general purpose jobs?",
    options: [
      "general",
      "default",
      "main",
      "system"
    ],
    correct: 1,
    explanation: "The 'default' group is used for general purpose cron jobs. Other groups include 'index' and 'consumers'."
  },
  {
    question: "What command runs all due cron jobs manually?",
    options: [
      "bin/magento cron:execute",
      "bin/magento cron:start",
      "bin/magento cron:run",
      "bin/magento cron:process"
    ],
    correct: 2,
    explanation: "bin/magento cron:run executes all cron jobs that are due to run. Can specify --group to run specific group."
  },
  {
    question: "How many fields are in a cron expression?",
    options: [
      "3",
      "4",
      "5",
      "6"
    ],
    correct: 2,
    explanation: "Cron expressions have 5 fields: minute, hour, day of month, month, and day of week."
  },
  {
    question: "What is the recommended approach for testing cron jobs?",
    options: [
      "Wait for scheduled execution",
      "Modify cron expression to run every minute",
      "Create a console command wrapper",
      "Test only in production"
    ],
    correct: 2,
    explanation: "Creating a console command that calls your cron job's execute() method makes testing and debugging much easier with IDE support."
  },
  {
    question: "Where can you configure cron group settings in Admin?",
    options: [
      "System → Cron",
      "Stores → Configuration → Advanced → System → Cron",
      "System → Tools → Cron",
      "Advanced → Developer → Cron"
    ],
    correct: 1,
    explanation: "Cron group settings are in Stores → Configuration → Advanced → System → Cron (configuration section)."
  },
  {
    question: "What status indicates a cron job completed successfully?",
    options: [
      "completed",
      "success",
      "finished",
      "done"
    ],
    correct: 1,
    explanation: "The 'success' status in cron_schedule table indicates the job completed successfully. Other statuses: pending, running, error, missed."
  },
  {
    question: "What happens if a frontend observer is registered and cron tries to use it?",
    options: [
      "Works normally",
      "Observer won't fire (crontab area conflict)",
      "Throws an exception",
      "Automatically switches to frontend area"
    ],
    correct: 1,
    explanation: "Observers registered for frontend/adminhtml areas won't fire in cron jobs (crontab area). Use global observers or manually set area."
  },
  {
    question: "What command lists all registered cron jobs?",
    options: [
      "bin/magento cron:show",
      "bin/magento cron:list",
      "bin/magento cron:status",
      "bin/magento cron:info"
    ],
    correct: 1,
    explanation: "bin/magento cron:list shows all registered cron jobs and their schedules."
  },
  {
    question: "Which element in crontab.xml specifies when the job should run?",
    options: [
      "<time>",
      "<schedule>",
      "<frequency>",
      "<when>"
    ],
    correct: 1,
    explanation: "The <schedule> element in crontab.xml contains the cron expression specifying when the job should run."
  },
  {
    question: "What does '0 0 * * 0' mean in cron expression?",
    options: [
      "Every Sunday at midnight",
      "Every day at midnight",
      "Never run",
      "Every hour on Sunday"
    ],
    correct: 0,
    explanation: "0 0 * * 0 means minute 0, hour 0 (midnight), any day, any month, weekday 0 (Sunday). So weekly on Sunday at midnight."
  },
  {
    question: "What should cron job execute() method return?",
    options: [
      "Boolean true/false",
      "$this or void",
      "Status string",
      "Array of results"
    ],
    correct: 1,
    explanation: "Cron job execute() method should return $this or void. No specific return value is required, but $this is common practice."
  }
];
