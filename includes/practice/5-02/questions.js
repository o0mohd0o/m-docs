window.questions = [
  {
    question: "Where are promo rules applied in the cart flow?",
    options: [
      "In the product repository",
      "Via the Totals framework during collectTotals()",
      "In the customer session",
      "In the index tables"
    ],
    correct: 1,
    explanation: "Promo rules are applied via Total models registered in Magento/SalesRule/etc/sales.xml."
  },
  {
    question: "Which file registers promo rule totals?",
    options: [
      "Magento/SalesRule/etc/di.xml",
      "Magento/SalesRule/etc/sales.xml",
      "Magento/SalesRule/etc/rules.xml",
      "Magento/SalesRule/etc/config.xml"
    ],
    correct: 1,
    explanation: "sales.xml registers the totals for applying promo rules."
  },
  {
    question: "Which two core elements define a promo rule?",
    options: [
      "Conditions and Actions",
      "Triggers and Observers",
      "Events and Plugins",
      "Sources and Targets"
    ],
    correct: 0,
    explanation: "Conditions define when a rule applies; Actions define how discounts are applied."
  },
  {
    question: "Which product attribute setting enables its use in promo rule conditions?",
    options: [
      "Used in Search",
      "Used in Promo Rule Conditions",
      "Visible on Frontend",
      "Used for Sorting"
    ],
    correct: 1,
    explanation: "Set 'Used in Promo Rule Conditions' to Yes to allow the attribute in rule conditions."
  },
  {
    question: "Which action type subtracts a percentage from each qualifying item?",
    options: [
      "Fixed amount discount",
      "Percent of product price discount",
      "Fixed amount for whole cart",
      "Buy X get Y free"
    ],
    correct: 1,
    explanation: "Percent of product price discount applies a percentage discount per item."
  },
  {
    question: "Which action type subtracts a fixed amount from each qualifying item?",
    options: [
      "Percent of product price discount",
      "Fixed amount discount",
      "Fixed amount for whole cart",
      "Buy X get Y free"
    ],
    correct: 1,
    explanation: "Fixed amount discount reduces each item's price by a set amount."
  },
  {
    question: "Which action type subtracts a fixed amount from the entire cart total?",
    options: [
      "Fixed amount discount",
      "Fixed amount discount for whole cart",
      "Percent of product price discount",
      "Buy X get Y free"
    ],
    correct: 1,
    explanation: "Fixed amount for whole cart applies a single discount to the cart subtotal."
  },
  {
    question: "What does 'Discount Amount' represent in a 'Buy X get Y free' action?",
    options: [
      "X (quantity customer must buy)",
      "Y (quantity customer gets free)",
      "Percentage discount",
      "Fixed dollar amount"
    ],
    correct: 1,
    explanation: "Discount Amount is Y—the free quantity."
  },
  {
    question: "Which option allows a promo rule discount to apply to shipping?",
    options: [
      "Free shipping action",
      "Apply to Shipping Amount",
      "Include Shipping in Conditions",
      "Discount Shipping Flag"
    ],
    correct: 1,
    explanation: "'Apply to Shipping Amount' extends the discount to shipping costs."
  },
  {
    question: "Who decides how free shipping is actually applied?",
    options: [
      "The promo rule itself",
      "The shipping method (carrier)",
      "The checkout observer",
      "The tax module"
    ],
    correct: 1,
    explanation: "The carrier/shipping method processes free shipping and discounts when calculating rates."
  },
  {
    question: "Which statement about coupons is true?",
    options: [
      "Promo rules cannot use coupons",
      "Promo rules can require specific, auto-generated, or no coupon",
      "Only catalog rules support coupons",
      "Coupons are always auto-generated"
    ],
    correct: 1,
    explanation: "Cart promo rules support specific codes, auto-generated codes, or no coupon."
  },
  {
    question: "What is the difference between cart promo rules and catalog price rules?",
    options: [
      "Catalog rules apply at product listing scope; promo rules apply at cart/checkout with coupon support",
      "Promo rules are faster",
      "Catalog rules use different conditions",
      "Promo rules cannot discount products"
    ],
    correct: 0,
    explanation: "Both use the same rule engine; key difference is scope and coupon support."
  },
  {
    question: "Where are tax calculation settings configured that affect discount application?",
    options: [
      "Stores → Configuration → Catalog → Tax",
      "Stores → Configuration → Sales → Tax → Calculation Settings",
      "Marketing → Promotions",
      "System → Tax Configuration"
    ],
    correct: 1,
    explanation: "Tax calculation settings (before/after discount, incl/excl tax) are under Sales → Tax."
  },
  {
    question: "Which action type best describes giving a customer 1 free item after buying 2?",
    options: [
      "Percent of product price",
      "Fixed amount discount",
      "Buy X get Y free (X=2, Y=1)",
      "Fixed amount for whole cart"
    ],
    correct: 2,
    explanation: "Buy X get Y free with X=2 and Y=1 gives 1 free after purchasing 2."
  },
  {
    question: "Which attribute flag must be enabled to use custom product attributes in promo conditions?",
    options: [
      "Visible on Frontend",
      "Used in Promo Rule Conditions",
      "Used for Sorting",
      "Filterable"
    ],
    correct: 1,
    explanation: "Enable 'Used in Promo Rule Conditions' for custom EAV attributes."
  },
  {
    question: "Which core module manages promo rules?",
    options: [
      "Magento_Checkout",
      "Magento_SalesRule",
      "Magento_Discount",
      "Magento_Promotion"
    ],
    correct: 1,
    explanation: "Magento_SalesRule handles shopping cart price rules (promo rules)."
  },
  {
    question: "Can promo rules use EAV product attributes in conditions?",
    options: [
      "No, never",
      "Yes, if 'Used in Promo Rule Conditions' is Yes",
      "Only for simple products",
      "Only with coupons"
    ],
    correct: 1,
    explanation: "EAV attributes can be used when properly configured."
  },
  {
    question: "Which action type applies a discount only after the customer enters a coupon code?",
    options: [
      "All action types can require a coupon",
      "Only percent discount",
      "Only fixed amount",
      "None—coupons are independent of action type"
    ],
    correct: 0,
    explanation: "Coupon requirement is set at the rule level, independent of the action type."
  },
  {
    question: "What happens if a custom shipping method ignores promo discounts?",
    options: [
      "Magento automatically applies them",
      "Discounts won't be applied to that shipping method",
      "Checkout breaks",
      "Taxes fail"
    ],
    correct: 1,
    explanation: "The carrier must handle discounts; ignoring them means they won't apply."
  },
  {
    question: "Which option best describes 'Apply to Shipping Amount'?",
    options: [
      "Forces free shipping",
      "Extends the discount to shipping costs",
      "Requires a specific carrier",
      "Applies tax to shipping"
    ],
    correct: 1,
    explanation: "This option allows the discount (e.g. 10% off) to also reduce shipping."
  },
  {
    question: "What subtlety exists when calculating discounts with taxes?",
    options: [
      "Taxes are never affected",
      "Tax calculation settings determine if discount is before/after tax and incl/excl tax",
      "Discounts always exclude tax",
      "Taxes are disabled when discounts apply"
    ],
    correct: 1,
    explanation: "The order and method of discount application vs tax calculation depends on settings."
  },
  {
    question: "Which promo rule action requires a 'Y' quantity configuration?",
    options: [
      "Percent discount",
      "Buy X get Y free",
      "Fixed amount for whole cart",
      "Fixed amount per item"
    ],
    correct: 1,
    explanation: "Buy X get Y free uses Discount Amount to define Y."
  },
  {
    question: "Where are cart promo rules managed in the admin?",
    options: [
      "Marketing → Promotions → Cart Price Rules",
      "Stores → Configuration → Promotions",
      "Catalog → Price Rules",
      "Sales → Discounts"
    ],
    correct: 0,
    explanation: "Cart Price Rules are under Marketing → Promotions."
  },
  {
    question: "Which rule type applies at product listing/catalog scope?",
    options: [
      "Cart promo rule",
      "Catalog price rule",
      "Checkout rule",
      "Customer segment rule"
    ],
    correct: 1,
    explanation: "Catalog price rules apply during product browsing; cart promo rules apply at cart/checkout."
  },
  {
    question: "What must you configure in a custom shipping method to honor promo discounts?",
    options: [
      "A plugin",
      "Logic to process discount/free shipping in rate calculation",
      "An observer",
      "A layout XML file"
    ],
    correct: 1,
    explanation: "Carriers must handle discount logic when calculating shipping rates."
  },
  {
    question: "Which coupon type lets Magento generate codes with a pattern?",
    options: [
      "Specific coupon",
      "Auto-generated coupon",
      "No coupon",
      "Dynamic coupon"
    ],
    correct: 1,
    explanation: "Auto-generated coupons use a prefix/pattern to create multiple codes."
  },
  {
    question: "Which scenario is a valid condition for a promo rule?",
    options: [
      "Cart subtotal > $100",
      "Product category = 'Electronics'",
      "Custom attribute 'brand' = 'Acme'",
      "All of the above"
    ],
    correct: 3,
    explanation: "Conditions support cart attributes, product categories, and EAV attributes."
  },
  {
    question: "Can a promo rule be set to auto-apply without a coupon?",
    options: [
      "No, coupons are required",
      "Yes, set 'No Coupon' and it auto-applies when conditions match",
      "Only for Buy X get Y",
      "Only for percent discounts"
    ],
    correct: 1,
    explanation: "Set 'No Coupon' for rules that auto-apply based on conditions."
  },
  {
    question: "What is the default scope for 'Fixed amount for whole cart' discount?",
    options: [
      "Grand total",
      "Cart subtotal",
      "Shipping only",
      "Tax only"
    ],
    correct: 1,
    explanation: "By default it applies to subtotal; optionally can include shipping."
  },
  {
    question: "Which rule engine component defines the boolean logic for rule applicability?",
    options: [
      "Actions",
      "Conditions",
      "Triggers",
      "Observers"
    ],
    correct: 1,
    explanation: "Conditions build boolean logic to determine if a rule should activate."
  }
];
