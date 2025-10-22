window.questions = [
  {
    question: "Where are catalog price rules configured in the admin panel?",
    options: [
      "Catalog → Price Rules",
      "Marketing → Catalog Price Rule",
      "Sales → Catalog Rules",
      "Stores → Catalog Price Rules"
    ],
    correct: 1,
    explanation: "Catalog price rules are configured under Marketing → Catalog Price Rule."
  },
  {
    question: "Which table stores indexed catalog price rule data?",
    options: [
      "catalog_price_rule",
      "catalogrule_price",
      "catalogrule_product_price",
      "catalog_product_rule_price"
    ],
    correct: 2,
    explanation: "Indexed catalog rule prices are stored in the catalogrule_product_price table."
  },
  {
    question: "Are catalog price rules indexed by the Price Indexer?",
    options: [
      "Yes, always",
      "No, they have their own dedicated indexer",
      "Only in production mode",
      "Only if enabled in configuration"
    ],
    correct: 1,
    explanation: "Catalog price rules are NOT indexed by the Price Indexer; they use the Catalog Product Rule indexer."
  },
  {
    question: "Which indexer handles catalog price rules?",
    options: [
      "catalog_product_price",
      "catalogrule_rule and catalogrule_product",
      "price_indexer",
      "catalog_rule"
    ],
    correct: 1,
    explanation: "Two indexers handle catalog rules: catalogrule_rule and catalogrule_product."
  },
  {
    question: "Can catalog price rules target specific customer groups?",
    options: [
      "No, they apply to all customers",
      "Yes, they can target specific customer groups",
      "Only in Enterprise edition",
      "Only for virtual products"
    ],
    correct: 1,
    explanation: "Catalog price rules can target specific customer groups (e.g., Wholesale, Retail)."
  },
  {
    question: "What is the main difference between catalog price rules and special pricing?",
    options: [
      "No difference",
      "Catalog rules are global/rule-based with customer group targeting; special pricing is manual per-product for all customers",
      "Special pricing is faster",
      "Catalog rules are deprecated"
    ],
    correct: 1,
    explanation: "Catalog rules enable global sales with customer group targeting; special pricing is manual and applies to all."
  },
  {
    question: "When should you use catalog price rules instead of special pricing?",
    options: [
      "For one-off products",
      "For global sales across product sets or when targeting customer groups",
      "Never",
      "Only for virtual products"
    ],
    correct: 1,
    explanation: "Use catalog rules for global sales, category discounts, or customer group targeting."
  },
  {
    question: "Do catalog price rules impact performance?",
    options: [
      "No impact at all",
      "Slight impact due to indexing",
      "Major performance degradation",
      "Only in developer mode"
    ],
    correct: 1,
    explanation: "Catalog rules have a slight performance impact due to indexing, but frontend reads from indexed table."
  },
  {
    question: "Why is the performance impact of catalog rules minimal on the frontend?",
    options: [
      "They're cached",
      "They read from the indexed catalogrule_product_price table",
      "They're disabled on frontend",
      "They use Redis"
    ],
    correct: 1,
    explanation: "Frontend reads pre-calculated prices from the catalogrule_product_price table, avoiding real-time evaluation."
  },
  {
    question: "Which class builds the catalog rule indexes?",
    options: [
      "\\Magento\\CatalogRule\\Model\\Rule",
      "\\Magento\\CatalogRule\\Model\\Indexer\\IndexBuilder",
      "\\Magento\\Indexer\\Model\\CatalogRule",
      "\\Magento\\CatalogRule\\Model\\Indexer"
    ],
    correct: 1,
    explanation: "\\Magento\\CatalogRule\\Model\\Indexer\\IndexBuilder builds the catalog rule indexes."
  },
  {
    question: "What are the two places to check when debugging catalog price rules?",
    options: [
      "Frontend and backend",
      "Data going INTO the index and data coming OUT of the index",
      "Cache and database",
      "Admin and customer view"
    ],
    correct: 1,
    explanation: "Debug by checking: 1) Data into index (rule conditions, reindex), 2) Data out of index (query table, frontend logic)."
  },
  {
    question: "How do you manually reindex catalog price rules?",
    options: [
      "bin/magento cache:flush",
      "bin/magento indexer:reindex catalogrule_rule catalogrule_product",
      "bin/magento catalog:reindex",
      "Clear cache in admin"
    ],
    correct: 1,
    explanation: "Use bin/magento indexer:reindex catalogrule_rule catalogrule_product to reindex manually."
  },
  {
    question: "If a catalog rule isn't applying, what is the first thing to check?",
    options: [
      "Cache status",
      "Indexer status and reindex if needed",
      "Server logs",
      "Customer permissions"
    ],
    correct: 1,
    explanation: "First check if indexer is updated; run indexer:status and reindex if necessary."
  },
  {
    question: "Which SQL query helps debug if a product has a catalog rule price?",
    options: [
      "SELECT * FROM catalog_product_price WHERE product_id = ?",
      "SELECT * FROM catalogrule_product_price WHERE product_id = ? AND customer_group_id = ?",
      "SELECT * FROM price_index WHERE product_id = ?",
      "SELECT * FROM catalog_rule WHERE product_id = ?"
    ],
    correct: 1,
    explanation: "Query catalogrule_product_price table filtering by product_id and customer_group_id."
  },
  {
    question: "What happens when indexer mode is 'Update on Schedule'?",
    options: [
      "Changes apply immediately",
      "Changes may not appear immediately; cron processes updates",
      "Indexer is disabled",
      "Manual reindex required always"
    ],
    correct: 1,
    explanation: "With 'Update on Schedule', cron processes index updates, causing potential delays."
  },
  {
    question: "What is the recommended indexer mode for large catalogs?",
    options: [
      "Update on Save",
      "Update on Schedule",
      "Manual only",
      "Disabled"
    ],
    correct: 1,
    explanation: "'Update on Schedule' avoids admin slowdowns by deferring indexing to cron."
  },
  {
    question: "Can catalog price rules have date ranges?",
    options: [
      "No",
      "Yes, for active periods",
      "Only in Enterprise",
      "Only for virtual products"
    ],
    correct: 1,
    explanation: "Catalog rules support date ranges to control when they're active."
  },
  {
    question: "Can you set rule priority in catalog price rules?",
    options: [
      "No",
      "Yes, and can stop further rules processing",
      "Only in multi-website setups",
      "Only for configurable products"
    ],
    correct: 1,
    explanation: "Rules have priority; you can also enable 'Stop Further Rules Processing' to prevent lower-priority rules."
  },
  {
    question: "How can you preview which products match a catalog rule?",
    options: [
      "Run a SQL query",
      "Use the Preview > Products Matched feature in admin",
      "Check the frontend",
      "Review logs"
    ],
    correct: 1,
    explanation: "Admin panel has a Preview feature showing which products match the rule conditions."
  },
  {
    question: "What should you check if a rule applies to the wrong products?",
    options: [
      "Indexer status",
      "Rule conditions configuration",
      "Cache",
      "Permissions"
    ],
    correct: 1,
    explanation: "Review rule conditions and use the Preview feature to verify product matches."
  },
  {
    question: "What if a rule doesn't show for a specific customer?",
    options: [
      "Clear customer cache",
      "Verify customer's group matches the rule's target groups",
      "Reindex everything",
      "Rebuild catalog"
    ],
    correct: 1,
    explanation: "Ensure the customer's group is one of the groups targeted by the rule."
  },
  {
    question: "Where should you look for errors during catalog rule indexing?",
    options: [
      "System logs and exception logs",
      "Browser console",
      "Network tab",
      "Database logs only"
    ],
    correct: 0,
    explanation: "Check var/log/system.log and exception.log for indexing errors."
  },
  {
    question: "What type of discounts can catalog price rules apply?",
    options: [
      "Only percentage",
      "Only fixed amount",
      "Percentage or fixed amount",
      "No discounts, only overrides"
    ],
    correct: 2,
    explanation: "Catalog price rules support both percentage and fixed amount discounts."
  },
  {
    question: "Can catalog price rules filter products by attributes?",
    options: [
      "No",
      "Yes, by attributes, categories, SKU, etc.",
      "Only by SKU",
      "Only by category"
    ],
    correct: 1,
    explanation: "Rules can filter by attributes, categories, SKU, price ranges, and more."
  },
  {
    question: "What happens during catalog rule indexing?",
    options: [
      "Prices are cached",
      "Indexer evaluates products, calculates discounts, stores in catalogrule_product_price",
      "Products are deleted",
      "Rules are disabled"
    ],
    correct: 1,
    explanation: "Indexer matches products to rules, calculates discounted prices, and stores results in the index table."
  },
  {
    question: "Can you have multiple catalog price rules active at once?",
    options: [
      "No, only one at a time",
      "Yes, with priority determining application order",
      "Only in multi-store setups",
      "Only for different customer groups"
    ],
    correct: 1,
    explanation: "Multiple rules can be active; priority determines which applies first."
  },
  {
    question: "What does 'Stop Further Rules Processing' do?",
    options: [
      "Disables all rules",
      "Prevents lower-priority rules from applying to matched products",
      "Pauses indexing",
      "Clears cache"
    ],
    correct: 1,
    explanation: "When enabled, lower-priority rules won't be evaluated for products matching this rule."
  },
  {
    question: "Are catalog price rules website-specific?",
    options: [
      "No, global only",
      "Yes, can be scoped to specific websites",
      "Only in multi-currency setups",
      "Only in Enterprise"
    ],
    correct: 1,
    explanation: "Catalog rules can be configured for specific websites in multi-website setups."
  },
  {
    question: "What is stored in the catalogrule_product_price table?",
    options: [
      "Product prices",
      "Rule-based discounted prices per product, customer group, website, and date",
      "Rule configurations",
      "Customer data"
    ],
    correct: 1,
    explanation: "The table stores calculated rule prices for each product/customer group/website/date combination."
  },
  {
    question: "How do catalog price rules differ from shopping cart rules?",
    options: [
      "No difference",
      "Catalog rules apply to product price display; cart rules apply during checkout",
      "Cart rules are deprecated",
      "Catalog rules are faster"
    ],
    correct: 1,
    explanation: "Catalog rules affect displayed product prices; shopping cart rules apply discounts in the cart/checkout."
  }
];
