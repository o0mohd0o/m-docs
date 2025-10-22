window.questions = [
  {
    question: "What is a simple product?",
    options: [
      "A product without options",
      "A 1:1 mapping of Magento product to physical shelf item—basic unit of inventory",
      "A virtual product",
      "A product with no price"
    ],
    correct: 1,
    explanation: "Simple products are the basic unit of inventory with 1:1 mapping to physical items."
  },
  {
    question: "Which product types can have simple products as children?",
    options: [
      "Only configurable",
      "Only bundle",
      "Configurable, bundle, and grouped",
      "Virtual products"
    ],
    correct: 2,
    explanation: "Simple products can be children in configurable, bundle, and grouped products."
  },
  {
    question: "Can a simple product with custom options be a child product?",
    options: [
      "Yes, always",
      "No—you can associate in admin but it won't appear on frontend",
      "Only in configurables",
      "Only in bundles"
    ],
    correct: 1,
    explanation: "Simple products with custom options cannot function as children; they won't display on frontend."
  },
  {
    question: "What differentiates virtual products from simple products?",
    options: [
      "Virtual products are cheaper",
      "Virtual products do not represent physical inventory",
      "Virtual products can't be sold",
      "No difference"
    ],
    correct: 1,
    explanation: "Virtual products represent non-tangible goods with no physical inventory."
  },
  {
    question: "Which are typical use cases for virtual products?",
    options: [
      "T-shirts, shoes",
      "Subscriptions, memberships, gift cards",
      "Electronics",
      "Furniture"
    ],
    correct: 1,
    explanation: "Virtual products are ideal for subscriptions, memberships, and digital goods."
  },
  {
    question: "What is the best way to think of a configurable product?",
    options: [
      "A discount tool",
      "A tool to filter down a list of products to one product",
      "A bundle of products",
      "A list of similar products"
    ],
    correct: 1,
    explanation: "Configurable products help customers filter options to select one specific product."
  },
  {
    question: "Which attribute types are required for configurable products?",
    options: [
      "Any attribute type",
      "Global scope and dropdown or swatch",
      "Store scope only",
      "Text attributes"
    ],
    correct: 1,
    explanation: "Configurable products require global scope attributes that are dropdown or swatch type."
  },
  {
    question: "In a configurable product, what is actually shipped?",
    options: [
      "The parent configurable product",
      "Both parent and child",
      "Only the simple child product",
      "Nothing"
    ],
    correct: 2,
    explanation: "Only the simple child product is shipped; the parent helps customer select."
  },
  {
    question: "In quote_item for a configurable product, if parent qty = 2 and child qty = 1, how many children ship?",
    options: [
      "1",
      "2 (Child Qty × Parent Qty)",
      "3",
      "0"
    ],
    correct: 1,
    explanation: "Shipped quantity = Child Qty × Parent Qty = 1 × 2 = 2 children shipped."
  },
  {
    question: "What is base currency?",
    options: [
      "The default store currency",
      "Currency in which product price is uploaded and order is charged",
      "Display currency",
      "Customer's local currency"
    ],
    correct: 1,
    explanation: "Base currency is the upload price currency used for charging and reporting."
  },
  {
    question: "Why use base currency for reporting?",
    options: [
      "It's required by law",
      "Provides consistent values across orders regardless of display currency",
      "It's faster",
      "It's more accurate"
    ],
    correct: 1,
    explanation: "Base currency ensures consistent reporting; display currency varies by customer."
  },
  {
    question: "What differentiates grouped products from configurable products?",
    options: [
      "Grouped products are cheaper",
      "Grouped products allow adding multiple products to cart at once",
      "Grouped products have no children",
      "No difference"
    ],
    correct: 1,
    explanation: "Grouped products let customers add multiple similar items at once; configurables select one."
  },
  {
    question: "Which are typical use cases for grouped products?",
    options: [
      "Computers",
      "Sandpaper with different roughnesses, pipe fittings in multiple sizes",
      "T-shirts in sizes",
      "Subscriptions"
    ],
    correct: 1,
    explanation: "Grouped products suit scenarios where customers want multiple similar items (e.g., various sandpaper grits)."
  },
  {
    question: "Do grouped product parents appear in quote_item or sales_order_item tables?",
    options: [
      "Yes, always",
      "No—only children appear; product_type inherits 'grouped' from parent",
      "Only in quote_item",
      "Only in sales_order_item"
    ],
    correct: 1,
    explanation: "Grouped product parents don't appear in tables; only children with inherited product_type."
  },
  {
    question: "What is the primary use case for bundle products?",
    options: [
      "Display multiple products",
      "Allow customers to configure the product they want",
      "Group similar items",
      "Virtual goods"
    ],
    correct: 1,
    explanation: "Bundle products let customers configure their own product (e.g., build a computer)."
  },
  {
    question: "Can bundle products apply discounts?",
    options: [
      "No, never",
      "Yes, to incentivize bundling vs buying individually",
      "Only in certain countries",
      "Only for virtual products"
    ],
    correct: 1,
    explanation: "Bundle products can offer discounts to encourage purchasing bundles."
  },
  {
    question: "Which two approaches can obtain products by type?",
    options: [
      "Factory and Repository",
      "SearchCriteriaBuilder with ProductRepository, or Product Collection with addFieldToFilter",
      "Only SearchCriteriaBuilder",
      "Only Collections"
    ],
    correct: 1,
    explanation: "Use SearchCriteriaBuilder + ProductRepository or Product Collection with filtering."
  },
  {
    question: "When using SearchCriteriaBuilder, what must you call before passing to repository?",
    options: [
      "build()",
      "create()",
      "execute()",
      "save()"
    ],
    correct: 1,
    explanation: "Must call create()—SearchCriteriaBuilder doesn't inherit SearchCriteriaInterface."
  },
  {
    question: "What is the advantage of using collections over SearchCriteriaBuilder?",
    options: [
      "Faster",
      "Only specified attributes are loaded, reducing overhead",
      "Required by Magento",
      "No advantage"
    ],
    correct: 1,
    explanation: "Collections load only specified attributes via addAttributeToSelect(), reducing memory/query overhead."
  },
  {
    question: "What are the two parts of a product in Magento?",
    options: [
      "Model and Factory",
      "Product Model and Product Type Model",
      "Interface and Implementation",
      "Entity and Collection"
    ],
    correct: 1,
    explanation: "Product Model (data) and Product Type Model (type-specific methods)."
  },
  {
    question: "What does the Product Model contain?",
    options: [
      "Type-specific methods",
      "Product data from database (ID, SKU, name, etc.)",
      "Cart logic",
      "Payment methods"
    ],
    correct: 1,
    explanation: "Product Model is the doorway to product data (ID, SKU, name, etc.)."
  },
  {
    question: "What does the Product Type Model contain?",
    options: [
      "Product data",
      "Methods specific to this product type (e.g., getChildrenIds)",
      "Database schema",
      "Payment logic"
    ],
    correct: 1,
    explanation: "Product Type Model has type-specific methods like getChildrenIds() for grouped products."
  },
  {
    question: "How do you access the Product Type Model?",
    options: [
      "$product->getType()",
      "$product->getTypeInstance()",
      "$product->getTypeModel()",
      "$product->typeModel()"
    ],
    correct: 1,
    explanation: "Use getTypeInstance() to access the product type model."
  },
  {
    question: "Which method finds product IDs of all child products in a grouped product?",
    options: [
      "getChildren()",
      "getChildrenIds()",
      "getProducts()",
      "getAssociatedIds()"
    ],
    correct: 1,
    explanation: "getChildrenIds() returns product IDs of all children."
  },
  {
    question: "Which method finds all parents associated with a child product?",
    options: [
      "getParents()",
      "getParentIdsByChild()",
      "findParents()",
      "getAssociatedParents()"
    ],
    correct: 1,
    explanation: "getParentIdsByChild() finds all parent IDs for a given child."
  },
  {
    question: "Which method loads all products associated with a parent?",
    options: [
      "getChildren()",
      "getProducts()",
      "getAssociatedProducts()",
      "loadChildren()"
    ],
    correct: 2,
    explanation: "getAssociatedProducts() loads all associated product objects."
  },
  {
    question: "Which layout handle stores cart item renderers?",
    options: [
      "checkout_cart_index",
      "checkout_cart_item_renderers",
      "cart_item_renderers",
      "checkout_renderers"
    ],
    correct: 1,
    explanation: "checkout_cart_item_renderers is the layout handle for cart item renderers."
  },
  {
    question: "Which block renders cart items?",
    options: [
      "checkout.cart.items",
      "checkout.cart.item.renderers",
      "cart.renderers",
      "checkout.items"
    ],
    correct: 1,
    explanation: "checkout.cart.item.renderers block renders cart items."
  },
  {
    question: "Which class is the base for all product type models?",
    options: [
      "\\Magento\\Catalog\\Model\\Product",
      "\\Magento\\Catalog\\Model\\Product\\Type\\AbstractType",
      "\\Magento\\Catalog\\Model\\ProductType",
      "\\Magento\\Framework\\Model\\AbstractModel"
    ],
    correct: 1,
    explanation: "All product type models extend AbstractType."
  },
  {
    question: "What field in quote_item/sales_order_item identifies the product type?",
    options: [
      "type",
      "product_type_id",
      "type_id",
      "product_type"
    ],
    correct: 3,
    explanation: "The product_type column identifies the product type (simple, configurable, etc.)."
  }
];
