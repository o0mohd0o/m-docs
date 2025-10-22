window.questions = [
  {
    question: "What infrastructure is Magento Commerce Cloud built on?",
    options: [
      "Google Cloud Platform",
      "AWS (Amazon Web Services)",
      "Microsoft Azure",
      "IBM Cloud"
    ],
    correct: 1,
    explanation: "Magento Commerce Cloud is built on AWS infrastructure using Platform.sh."
  },
  {
    question: "Which platform does Magento Commerce Cloud use as its base?",
    options: [
      "Kubernetes",
      "Docker Swarm",
      "Platform.sh",
      "Heroku"
    ],
    correct: 2,
    explanation: "Commerce Cloud is built on Platform.sh and includes additional value-add features."
  },
  {
    question: "What are the two editions of Magento Commerce Cloud?",
    options: [
      "Basic and Premium",
      "Starter and Pro",
      "Standard and Enterprise",
      "Community and Commerce"
    ],
    correct: 1,
    explanation: "Magento Cloud has two editions: Starter and Pro."
  },
  {
    question: "What type of hosting does Pro edition provide?",
    options: [
      "Shared hosting",
      "VPS hosting",
      "Dedicated AWS instances",
      "Serverless hosting"
    ],
    correct: 2,
    explanation: "Pro edition provides dedicated AWS instances, unlike Starter which is shared hosting."
  },
  {
    question: "How many server setups does Pro edition have for fault tolerance?",
    options: [
      "One",
      "Two",
      "Three",
      "Five"
    ],
    correct: 2,
    explanation: "Pro edition has three server setups for fault tolerance."
  },
  {
    question: "How many active environments are available in Pro edition?",
    options: [
      "2",
      "4",
      "6",
      "8"
    ],
    correct: 3,
    explanation: "Pro edition provides 8 available active environments."
  },
  {
    question: "In Starter edition, which branch is production?",
    options: [
      "production",
      "master",
      "staging",
      "integration"
    ],
    correct: 1,
    explanation: "In Starter edition, the master branch is the production environment."
  },
  {
    question: "What is the code flow direction in Commerce Cloud?",
    options: [
      "Production → Staging → Integration",
      "Integration → Staging → Production",
      "Staging → Integration → Production",
      "Master → Integration → Staging"
    ],
    correct: 1,
    explanation: "Code flows from Integration to Staging to Production."
  },
  {
    question: "What is the data flow direction in Commerce Cloud?",
    options: [
      "Integration → Staging → Production",
      "Production → Staging → Integration",
      "Staging → Production → Integration",
      "No specific direction"
    ],
    correct: 1,
    explanation: "Data flows in the OPPOSITE direction of code: Production → Staging → Integration. Production is the source of truth."
  },
  {
    question: "Why does data flow in the opposite direction of code?",
    options: [
      "For security reasons",
      "Because production is the single source of truth for database information",
      "To save bandwidth",
      "It's a technical limitation"
    ],
    correct: 1,
    explanation: "Production should be the single source of truth for all database information."
  },
  {
    question: "In Starter edition, which branch should you create integration branches from?",
    options: [
      "master",
      "staging",
      "production",
      "develop"
    ],
    correct: 1,
    explanation: "In Starter, staging is the branch from which you create integration branches."
  },
  {
    question: "In Pro edition, which branch should you create development branches from?",
    options: [
      "master",
      "staging",
      "integration",
      "production"
    ],
    correct: 2,
    explanation: "In Pro, you must branch from the integration branch to develop new features."
  },
  {
    question: "Should you make direct changes to the master branch in Starter?",
    options: [
      "Yes, always",
      "No, master should have no changes made directly to it",
      "Only for hotfixes",
      "Only in production"
    ],
    correct: 1,
    explanation: "master should have no changes made directly to it; code flows from staging."
  },
  {
    question: "Should you make direct changes to the staging branch?",
    options: [
      "Yes, it's the primary development branch",
      "No, staging should have no direct changes",
      "Only for urgent fixes",
      "Yes, but only configuration changes"
    ],
    correct: 1,
    explanation: "The master and staging branches should have no changes directly made to them."
  },
  {
    question: "How many active integration environments can you have in Starter edition?",
    options: [
      "One",
      "Two",
      "Four",
      "Unlimited"
    ],
    correct: 1,
    explanation: "You can have two active integration environments (activated in Cloud control panel) in Starter."
  },
  {
    question: "What are the 'magic' branch names in Commerce Cloud?",
    options: [
      "production and develop",
      "master and staging",
      "main and test",
      "release and hotfix"
    ],
    correct: 1,
    explanation: "Only 'master' and 'staging' are 'magic' branch names; integration branches can be named anything."
  },
  {
    question: "Where should you enable new modules?",
    options: [
      "Directly in Cloud environment",
      "In the admin panel",
      "On your local system first using bin/magento module:enable",
      "Via Cloud control panel"
    ],
    correct: 2,
    explanation: "Enable modules locally first with bin/magento module:enable MODULE/NAME before pushing to Cloud."
  },
  {
    question: "Which file should you include in your Git repository for module configuration?",
    options: [
      "app/etc/env.php",
      "app/etc/config.php",
      "composer.json",
      "app/etc/modules.xml"
    ],
    correct: 1,
    explanation: "You should include app/etc/config.php in your Git repository for module configuration."
  },
  {
    question: "What happens to modules not explicitly disabled in app/etc/config.php?",
    options: [
      "They are ignored",
      "They throw an error",
      "They are automatically enabled",
      "They need manual activation"
    ],
    correct: 2,
    explanation: "Modules not explicitly disabled in app/etc/config.php are automatically enabled."
  },
  {
    question: "What happens when a new environment is activated?",
    options: [
      "It starts empty",
      "Data is automatically copied from the parent environment",
      "You must manually import data",
      "It clones production data"
    ],
    correct: 1,
    explanation: "When a new environment is activated, data is automatically copied from the environment it's branched from."
  },
  {
    question: "What is a benefit of using Magento's git hosting?",
    options: [
      "It's free",
      "You see logs in Terminal when you git push",
      "Unlimited storage",
      "Faster deployment"
    ],
    correct: 1,
    explanation: "Using Magento git hosting shows logs in your Terminal window when you git push."
  },
  {
    question: "What is an advantage of using GitLab or GitHub instead of Magento git?",
    options: [
      "Faster performance",
      "Better security",
      "Can protect specific branches to prevent accidental pushes",
      "Free hosting"
    ],
    correct: 2,
    explanation: "GitLab/GitHub allows you to protect specific branches to prevent accidental pushes."
  },
  {
    question: "For Starter projects, which branch should you configure locally?",
    options: [
      "staging",
      "integration",
      "master",
      "develop"
    ],
    correct: 2,
    explanation: "For Starter projects, configure locally using the master branch."
  },
  {
    question: "For Pro projects, which branch should you configure locally?",
    options: [
      "master",
      "staging",
      "integration",
      "production"
    ],
    correct: 2,
    explanation: "For Pro projects, configure locally using the integration branch."
  },
  {
    question: "What command shows database and Redis credentials in Cloud?",
    options: [
      "magento-cloud credentials",
      "bin/magento config:show",
      "echo $MAGENTO_CLOUD_RELATIONSHIPS | base64 --d | json_pp",
      "cat .env"
    ],
    correct: 2,
    explanation: "Use echo $MAGENTO_CLOUD_RELATIONSHIPS | base64 --d | json_pp to view credentials."
  },
  {
    question: "What command flushes Redis in a Cloud environment?",
    options: [
      "redis-cli FLUSHALL",
      "redis-cli -h redis.internal FLUSHALL",
      "bin/magento cache:flush",
      "magento-cloud redis:flush"
    ],
    correct: 1,
    explanation: "Use redis-cli -h redis.internal FLUSHALL to flush Redis in Cloud."
  },
  {
    question: "What describes the staging environment file system in Starter?",
    options: [
      "Fully writable",
      "Read-only",
      "Partially writable",
      "No file system"
    ],
    correct: 1,
    explanation: "Staging closely replicates production with a read-only file system."
  },
  {
    question: "In Pro edition, which branches are protected (in GitLab terms)?",
    options: [
      "Only master",
      "master and staging",
      "master, staging, and integration",
      "All branches"
    ],
    correct: 2,
    explanation: "In Pro, master, staging, and integration would all be protected branches."
  },
  {
    question: "Who determines which branches should be activated as environments?",
    options: [
      "Magento support",
      "The lead developer",
      "The merchant",
      "Automatically determined"
    ],
    correct: 1,
    explanation: "It's up to the lead developer to determine which branches should be activated as environments."
  },
  {
    question: "Can you push as many branches as you wish in Starter?",
    options: [
      "No, limited to 2",
      "No, limited to 5",
      "Yes, but only 2 can be active environments",
      "No, only predefined branches allowed"
    ],
    correct: 2,
    explanation: "You can push as many branches as you wish, but only 2 can be active integration environments."
  }
];
