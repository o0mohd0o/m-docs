window.questions = [
  {
    question: "Where are logs stored in Starter and Pro Integration environments?",
    options: [
      "/var/log",
      "/var/log/platform/",
      "/logs",
      "/var/platform/log"
    ],
    correct: 0,
    explanation: "In Starter and Pro Integration environments, logs are stored in /var/log."
  },
  {
    question: "Where are logs stored in Pro Staging and Production environments?",
    options: [
      "/var/log",
      "/var/log/platform/",
      "/logs/platform",
      "/platform/logs"
    ],
    correct: 1,
    explanation: "In Pro Staging and Production, logs are stored in /var/log/platform/."
  },
  {
    question: "For Pro Staging and Production, how many nodes must you check to access complete logs?",
    options: [
      "One node",
      "Two nodes",
      "All three nodes",
      "Five nodes"
    ],
    correct: 2,
    explanation: "Pro Staging and Production run on three nodes for fault tolerance. You must log into all three nodes to access complete logs."
  },
  {
    question: "Are outgoing emails enabled or disabled by default in Cloud environments?",
    options: [
      "Enabled in all environments",
      "Disabled by default",
      "Enabled only in production",
      "Enabled in staging and production"
    ],
    correct: 1,
    explanation: "Outgoing emails are disabled by default in all environments to prevent accidental emails to real customers from non-production environments."
  },
  {
    question: "Which environment setting is ideally used on staging to prevent search engines and unauthorized access?",
    options: [
      "Search engine indexing",
      "Outgoing emails",
      "HTTP access control",
      "Environment status"
    ],
    correct: 2,
    explanation: "HTTP access control (basic auth) is ideally used on staging to prevent search engines and unauthorized access."
  },
  {
    question: "What is the difference between a 'branch' and an 'environment' in Cloud terminology?",
    options: [
      "They are completely different things",
      "Environment is a branch that is activated and publicly accessible via web",
      "Branch is for production, environment is for development",
      "There is no difference"
    ],
    correct: 1,
    explanation: "The terms are used interchangeably. An environment is a branch that is enabled and publicly accessible via the web."
  },
  {
    question: "How many important action buttons are at the top of each branch/environment?",
    options: [
      "Three",
      "Four",
      "Five",
      "Six"
    ],
    correct: 2,
    explanation: "There are 5 very important buttons: Git/CLI, Branch, Merge, Sync, and Backup."
  },
  {
    question: "What does the Git/CLI button provide?",
    options: [
      "Only git clone command",
      "Commands and git remote details for loading project locally",
      "SSH access only",
      "Database credentials"
    ],
    correct: 1,
    explanation: "The Git/CLI button provides commands and git remote details for loading the project locally to your system."
  },
  {
    question: "What does the Branch button do?",
    options: [
      "Merges code",
      "Creates a backup",
      "Creates a new branch/environment from current branch",
      "Syncs data"
    ],
    correct: 2,
    explanation: "The Branch button creates a new branch (environment) from the current branch, if enabled."
  },
  {
    question: "What does the Merge button do?",
    options: [
      "Merges current branch to its parent",
      "Merges parent to current branch",
      "Creates a new branch",
      "Deletes the branch"
    ],
    correct: 0,
    explanation: "The Merge button merges the current branch to its parent (Integration→Staging or Staging→Master)."
  },
  {
    question: "Is the Merge button available on the master branch?",
    options: [
      "Yes, always",
      "No, because master has no parent to merge to",
      "Yes, but only in Pro",
      "Yes, but only in Starter"
    ],
    correct: 1,
    explanation: "The Merge button is NOT available on master branch because there is no parent branch to merge to."
  },
  {
    question: "What does the Sync button do?",
    options: [
      "Only syncs code",
      "Only syncs data",
      "Syncs code and/or data and files",
      "Creates a backup"
    ],
    correct: 2,
    explanation: "The Sync button syncs code and/or data and files. This can also be done via the magento-cloud CLI."
  },
  {
    question: "What does the Backup button create?",
    options: [
      "Code backup only",
      "Database backup only",
      "Snapshot/backup of the environment",
      "Git commit"
    ],
    correct: 2,
    explanation: "The Backup button creates a snapshot/backup of the environment, including database and files."
  },
  {
    question: "Can you sync data using the magento-cloud CLI tool?",
    options: [
      "No, only via UI",
      "Yes, using magento-cloud environment:synchronize",
      "No, sync is UI-only",
      "Yes, but only for code"
    ],
    correct: 1,
    explanation: "Yes, syncing can be done via the UI Sync button or via magento-cloud CLI using environment:synchronize."
  },
  {
    question: "What can you configure in the Project Variables section?",
    options: [
      "Only API keys",
      "Environment variables available across all environments",
      "Only database credentials",
      "User permissions"
    ],
    correct: 1,
    explanation: "Project Variables allows you to configure environment variables that are available across all environments."
  },
  {
    question: "Where do you manage team access to the Cloud project?",
    options: [
      "Environment settings",
      "Project Variables",
      "User Management",
      "Access Links"
    ],
    correct: 2,
    explanation: "User Management is where you add/remove users and manage access permissions to the Cloud project."
  },
  {
    question: "What environment setting controls whether search engines can index the environment?",
    options: [
      "HTTP access control",
      "Outgoing emails",
      "Search engine indexing",
      "Environment status"
    ],
    correct: 2,
    explanation: "Search engine indexing setting controls whether search engines can index the environment. Disable for staging/development."
  },
  {
    question: "What happens when you disable an environment?",
    options: [
      "It's deleted permanently",
      "It doesn't consume resources and cannot be accessed via web",
      "It only stops the web server",
      "Nothing changes"
    ],
    correct: 1,
    explanation: "When disabled, environments don't consume resources and cannot be accessed via the web."
  },
  {
    question: "Which access method is NOT typically provided for each environment?",
    options: [
      "Web URL",
      "SSH Access",
      "FTP Access",
      "Database Access"
    ],
    correct: 2,
    explanation: "Cloud environments provide Web URL, SSH, Admin Panel, and Database access, but NOT FTP access."
  },
  {
    question: "What does the Environments page show?",
    options: [
      "Only active environments",
      "Visual tree structure of all branches/environments",
      "Only production environment",
      "User list"
    ],
    correct: 1,
    explanation: "The Environments page shows a visual tree structure of all branches/environments with their relationships."
  },
  {
    question: "What should you do before merging to production or making major configuration changes?",
    options: [
      "Nothing special",
      "Create a snapshot/backup",
      "Disable the environment",
      "Clear cache"
    ],
    correct: 1,
    explanation: "Best practice: Always create a snapshot before merging to production or making major configuration changes."
  },
  {
    question: "Why is HTTP access control recommended for staging environments?",
    options: [
      "To improve performance",
      "To prevent search engines and unauthorized access",
      "To enable emails",
      "To sync faster"
    ],
    correct: 1,
    explanation: "HTTP access control on staging prevents search engines and unauthorized access to non-production environments."
  },
  {
    question: "How do you access logs in Cloud environments?",
    options: [
      "Only via web UI",
      "Via SSH to the environment",
      "Via FTP",
      "They are emailed automatically"
    ],
    correct: 1,
    explanation: "Logs are accessed via SSH to the environment, then navigating to /var/log or /var/log/platform/."
  },
  {
    question: "What is a common log file for deployment process logs?",
    options: [
      "system.log",
      "deploy.log",
      "error.log",
      "debug.log"
    ],
    correct: 1,
    explanation: "deploy.log contains the deployment process logs in Cloud environments."
  },
  {
    question: "Which permission level provides read-only access?",
    options: [
      "Admin",
      "Contributor",
      "Viewer",
      "Developer"
    ],
    correct: 2,
    explanation: "Viewer role provides read-only access to the Cloud project."
  },
  {
    question: "What action can you perform from the Environment Control Panel?",
    options: [
      "Delete users",
      "Create new projects",
      "Clear cache",
      "Change pricing plan"
    ],
    correct: 2,
    explanation: "The Environment Control Panel allows actions like clearing cache, redeploying, viewing logs, and restarting services."
  },
  {
    question: "Why are outgoing emails disabled by default in non-production environments?",
    options: [
      "To save bandwidth",
      "To prevent sending test emails to real customers",
      "To improve performance",
      "It's a bug"
    ],
    correct: 1,
    explanation: "Outgoing emails are disabled by default to prevent accidental sending of test emails to real customers."
  },
  {
    question: "What should you disable for staging/development to prevent duplicate content issues?",
    options: [
      "HTTP access",
      "Outgoing emails",
      "Search engine indexing",
      "SSH access"
    ],
    correct: 2,
    explanation: "Disable search engine indexing for staging/development to prevent duplicate content issues with production."
  },
  {
    question: "Where should you enable search engine indexing?",
    options: [
      "All environments",
      "Only production",
      "Only staging",
      "Only integration"
    ],
    correct: 1,
    explanation: "Search engine indexing should only be enabled for production to avoid duplicate content penalties."
  },
  {
    question: "What does creating a child environment from a parent do with the data?",
    options: [
      "Starts with empty data",
      "Copies data from parent environment",
      "Links to parent data",
      "Requires manual data import"
    ],
    correct: 1,
    explanation: "When a new environment is activated/created, data is automatically copied from the parent environment."
  }
];
