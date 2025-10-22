window.questions = [
  {
    question: "Where do you add SSH keys via the web UI?",
    options: [
      "Project Settings → SSH Keys",
      "Account settings → Account Settings → SSH Keys",
      "Environment Settings → SSH",
      "Users → SSH Keys"
    ],
    correct: 1,
    explanation: "SSH keys are added via Account settings → Account Settings → SSH Keys."
  },
  {
    question: "What CLI command adds an SSH key?",
    options: [
      "magento-cloud key:add",
      "magento-cloud ssh:add",
      "magento-cloud ssh-key:add",
      "magento-cloud add-key"
    ],
    correct: 2,
    explanation: "Use magento-cloud ssh-key:add to add an SSH key via CLI."
  },
  {
    question: "Should you add your public or private SSH key to your account?",
    options: [
      "Private key",
      "Public key",
      "Both keys",
      "Either one works"
    ],
    correct: 1,
    explanation: "Always add the public key (.pub file), NEVER the private key!"
  },
  {
    question: "How do you add a user to a project via the web UI?",
    options: [
      "Click gear icon → Users → Add User",
      "Account settings → Add User",
      "Environment settings → Users",
      "Project menu → Team"
    ],
    correct: 0,
    explanation: "Click the gear icon next to your project → Users → Add User."
  },
  {
    question: "What happens when you add a user to a project?",
    options: [
      "They get immediate access",
      "They receive a welcome email from Magento with instructions",
      "Nothing until admin approves",
      "They must request access"
    ],
    correct: 1,
    explanation: "The user receives a welcome email from Magento with instructions on how to get started."
  },
  {
    question: "At what two levels can you allow user access?",
    options: [
      "Global and local",
      "Project level and environment level",
      "Admin and user",
      "Public and private"
    ],
    correct: 1,
    explanation: "You can allow users access per project and then per environment (inside the project)."
  },
  {
    question: "What does designating a user as 'Super User/Admin' allow them to do?",
    options: [
      "Only access production",
      "Anything in any environment",
      "Manage billing only",
      "View logs only"
    ],
    correct: 1,
    explanation: "Super User/Admin designation allows them to do anything in any environment."
  },
  {
    question: "What must you do when you change user permissions?",
    options: [
      "Restart the server",
      "Clear cache",
      "Redeploy the environment",
      "Nothing, changes are immediate"
    ],
    correct: 2,
    explanation: "When you change permissions, you must redeploy (if nothing else, using git commit --allow-empty)."
  },
  {
    question: "How can you trigger a redeployment for permission changes if no code changes are needed?",
    options: [
      "git push --force",
      "git commit --allow-empty",
      "magento-cloud redeploy",
      "Click Redeploy button only"
    ],
    correct: 1,
    explanation: "Use git commit --allow-empty to trigger a redeployment without actual code changes."
  },
  {
    question: "Which role can access SSH by default?",
    options: [
      "All roles",
      "Admin and Contributor",
      "Admin only",
      "No one by default"
    ],
    correct: 2,
    explanation: "Admin is the only role that can access SSH by default."
  },
  {
    question: "What can an Admin user do?",
    options: [
      "Only view logs",
      "Just about anything, including SSH access",
      "Only merge code",
      "Read-only access"
    ],
    correct: 1,
    explanation: "Admins can do just about anything, and they are the only ones that can access SSH by default."
  },
  {
    question: "What can a Contributor user do?",
    options: [
      "Only view code",
      "Manage billing",
      "Merge and branch from an environment",
      "Access SSH by default"
    ],
    correct: 2,
    explanation: "Contributors can merge and branch from an environment."
  },
  {
    question: "Can Contributors access SSH by default?",
    options: [
      "Yes, always",
      "No, but can be enabled via configuration",
      "Yes, but only in production",
      "Yes, but only in integration"
    ],
    correct: 1,
    explanation: "Contributors cannot SSH by default, but you can enable it via .magento.app.yaml configuration."
  },
  {
    question: "How do you enable SSH access for Contributors?",
    options: [
      "Add ssh: true in composer.json",
      "Add ssh: contributor in .magento.app.yaml",
      "Grant SSH permission in UI",
      "It's automatic"
    ],
    correct: 1,
    explanation: "Add 'ssh: contributor' in the .magento.app.yaml file to allow contributors SSH access."
  },
  {
    question: "What can a Reader user do?",
    options: [
      "Merge code",
      "Branch environments",
      "View-only access",
      "SSH access"
    ],
    correct: 2,
    explanation: "Reader role provides view-only access; they cannot make changes, push code, or SSH."
  },
  {
    question: "Can a Reader push code or merge branches?",
    options: [
      "Yes, both",
      "Only push code",
      "Only merge",
      "No, neither"
    ],
    correct: 3,
    explanation: "Readers have view-only access and cannot push code, merge, or branch."
  },
  {
    question: "Can a Reader access SSH?",
    options: [
      "Yes, by default",
      "Yes, with yaml config",
      "No, never",
      "Only in development"
    ],
    correct: 2,
    explanation: "Readers cannot access SSH, even with yaml configuration."
  },
  {
    question: "Where is support ticket access managed?",
    options: [
      "Cloud Admin UI",
      "Environment settings",
      "magento.com portal",
      "Project settings"
    ],
    correct: 2,
    explanation: "Support ticket access is managed on the magento.com portal, NOT in the Cloud Admin UI."
  },
  {
    question: "Who can create support tickets by default?",
    options: [
      "All users",
      "All admins",
      "Only the account owner",
      "Contributors and admins"
    ],
    correct: 2,
    explanation: "By default, only the account owner can create support tickets."
  },
  {
    question: "How can the account owner share support ticket access?",
    options: [
      "Via Cloud Admin UI",
      "Via their Magento portal, share 'Submit a Ticket' access",
      "Via email request",
      "Automatic for all admins"
    ],
    correct: 1,
    explanation: "The account owner can share 'Submit a Ticket' access via their Magento portal."
  },
  {
    question: "Are environment access and support ticket access managed in the same place?",
    options: [
      "Yes, both in Cloud UI",
      "Yes, both in magento.com",
      "No, they are completely different mechanisms",
      "Yes, both via CLI"
    ],
    correct: 2,
    explanation: "Support ticket access is a completely different mechanism than environment access, managed in different places."
  },
  {
    question: "What CLI command adds a user to a project?",
    options: [
      "magento-cloud add-user",
      "magento-cloud user:add",
      "magento-cloud user:create",
      "magento-cloud project:add-user"
    ],
    correct: 1,
    explanation: "Use magento-cloud user:add to add users via CLI."
  },
  {
    question: "What CLI command lists all SSH keys?",
    options: [
      "magento-cloud ssh-key:list",
      "magento-cloud keys",
      "magento-cloud list-keys",
      "magento-cloud ssh:list"
    ],
    correct: 0,
    explanation: "Use magento-cloud ssh-key:list to list all SSH keys."
  },
  {
    question: "What CLI command lists all project users?",
    options: [
      "magento-cloud users",
      "magento-cloud list-users",
      "magento-cloud user:list",
      "magento-cloud project:users"
    ],
    correct: 2,
    explanation: "Use magento-cloud user:list to list all users in a project."
  },
  {
    question: "Which role can manage users (add/remove users)?",
    options: [
      "Admin only",
      "Admin and Contributor",
      "All roles",
      "Super User only"
    ],
    correct: 0,
    explanation: "Only Admins can manage users (add/remove users)."
  },
  {
    question: "Which role can change environment settings?",
    options: [
      "All roles",
      "Admin and Contributor",
      "Admin only",
      "Contributors only"
    ],
    correct: 2,
    explanation: "Only Admins can change environment settings."
  },
  {
    question: "Can Contributors push code and trigger deployments?",
    options: [
      "No, read-only",
      "Yes, they can push code and trigger deployments",
      "Only in integration",
      "Only if Super User"
    ],
    correct: 1,
    explanation: "Contributors can push code and trigger deployments; they can also merge and branch."
  },
  {
    question: "What is the best practice for granting user permissions?",
    options: [
      "Give everyone Admin access",
      "Use least privilege - grant only necessary permissions",
      "Everyone should be a Contributor",
      "Avoid using Reader role"
    ],
    correct: 1,
    explanation: "Best practice: Use least privilege principle - grant only the permissions necessary for the user's role."
  },
  {
    question: "When should you use the Reader role?",
    options: [
      "For all developers",
      "For auditors, stakeholders, or anyone who only needs to view",
      "Never, it's not useful",
      "Only for testing"
    ],
    correct: 1,
    explanation: "Use Reader role for auditors, stakeholders, or anyone who only needs to view without making changes."
  },
  {
    question: "What happens if you add the wrong SSH key type to your account?",
    options: [
      "It works fine",
      "Security risk - never add private keys",
      "System auto-converts it",
      "Nothing happens"
    ],
    correct: 1,
    explanation: "Never add private keys to your account - it's a serious security risk. Always add public keys only."
  }
];
