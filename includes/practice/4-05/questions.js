window.questions = [
  {
    question: "Where do Magento JS modules live in a module?",
    options: [
      "view/(area)/web/js",
      "view/(area)/templates",
      "etc/frontend/js",
      "web/js at project root"
    ],
    correct: 0,
    explanation: "Module JS files are placed under view/(frontend|adminhtml|base)/web/js." 
  },
  {
    question: "What RequireJS module path maps to view/frontend/web/js/product/view/product-info.js in Magento_Catalog?",
    options: [
      "Magento_Catalog/product/view/product-info",
      "Magento_Catalog/js/product/view/product-info",
      "Magento_Catalog::product/view/product-info",
      "Magento_Catalog/web/js/product/view/product-info"
    ],
    correct: 1,
    explanation: "Use Module_Name/js/...; Magento_Catalog/js/product/view/product-info maps to the JS file in web/js." 
  },
  {
    question: "Where are aliases for RequireJS modules configured?",
    options: [
      "requirejs-config.js",
      "di.xml",
      "module.xml",
      "routes.xml"
    ],
    correct: 0,
    explanation: "Aliases are set via the map section in requirejs-config.js." 
  },
  {
    question: "Which map entry creates alias compareList -> Magento_Catalog/js/list?",
    options: [
      "paths: { compareList: 'Magento_Catalog/js/list' }",
      "map: { '*': { compareList: 'Magento_Catalog/js/list' } }",
      "shim: { compareList: ['Magento_Catalog/js/list'] }",
      "deps: ['compareList']"
    ],
    correct: 1,
    explanation: "Use map → '*' → { alias: module } to create global aliases." 
  },
  {
    question: "A plain AMD module used with data-mage-init should usually return:",
    options: [
      "A string",
      "A jQuery plugin",
      "A function (callback)",
      "A UI component instance"
    ],
    correct: 2,
    explanation: "Magento initializers invoke the returned function with (element, config)." 
  },
  {
    question: "What two arguments does Magento pass to a module returned function when initialized via data-mage-init?",
    options: [
      "(config, element)",
      "(element, config)",
      "(window, document)",
      "(require, exports)"
    ],
    correct: 1,
    explanation: "The initializer calls your factory with (element, config)." 
  },
  {
    question: "Which directive initializes modules via a JSON script block?",
    options: [
      "data-mage-init",
      "type=\"text/x-magento-init\"",
      "data-module-init",
      "x-require-init"
    ],
    correct: 1,
    explanation: "The x-magento-init script defines selector → module → config mappings." 
  },
  {
    question: "In x-magento-init, what happens if the selector matches multiple elements?",
    options: [
      "Only the first is initialized",
      "All matching elements initialize the module",
      "The module is skipped",
      "It throws an error"
    ],
    correct: 1,
    explanation: "A new instance runs for each matched element (downloaded once)." 
  },
  {
    question: "In x-magento-init, what does '*' as a selector mean?",
    options: [
      "Match all elements",
      "Match body only",
      "Do not bind to any element; pass false as node",
      "Run on window load"
    ],
    correct: 2,
    explanation: "'*' causes Magento to pass false for the element argument." 
  },
  {
    question: "Which example declares a jQuery UI widget correctly?",
    options: [
      "$.widget('mage.modal', function(){})",
      "$.widget('mage.modal', { options: {}, _create: function(){} }); return $.mage.modal;",
      "$.fn.modal = function(){}; return $.fn.modal;",
      "window.mage.modal = function(){};"
    ],
    correct: 1,
    explanation: "Declare via $.widget(ns, prototype) and return the created widget." 
  },
  {
    question: "What is the base class for UI Component elements?",
    options: [
      "uiCollection",
      "uiElement",
      "uiLayout",
      "uiBase"
    ],
    correct: 1,
    explanation: "UI Components extend Magento_Ui/js/lib/core/element/element (uiElement)." 
  },
  {
    question: "Which UI Component method is commonly overridden to observe properties?",
    options: [
      "initObservable",
      "initialize",
      "setup",
      "bind"
    ],
    correct: 0,
    explanation: "initObservable uses this._super().observe('...') to track observables." 
  },
  {
    question: "Which is NOT a typical way to execute a module in Magento?",
    options: [
      "data-mage-init",
      "x-magento-init",
      "Imperative require()",
      "Adding to module.xml"
    ],
    correct: 3,
    explanation: "module.xml is unrelated to JS module execution." 
  },
  {
    question: "Where do you configure a JavaScript mixin?",
    options: [
      "requirejs-config.js → config.mixins",
      "di.xml → type plugins",
      "theme.xml",
      "routes.xml"
    ],
    correct: 0,
    explanation: "Mixins map core module paths to your mixin module in requirejs-config.js." 
  },
  {
    question: "What is the main benefit of JS mixins over file overrides?",
    options: [
      "They are faster",
      "They allow augmenting core behavior with less maintenance",
      "They are required by Magento",
      "They avoid RequireJS"
    ],
    correct: 1,
    explanation: "Mixins change specific behaviors without replacing the whole file." 
  },
  {
    question: "Which file scope(s) can contain requirejs-config.js?",
    options: [
      "view/frontend only",
      "view/adminhtml only",
      "view/base only",
      "view/frontend, view/adminhtml, or view/base"
    ],
    correct: 3,
    explanation: "You can scope config per area or in base for both." 
  },
  {
    question: "Choose the correct alias mapping to use 'toolbarForm' for product list toolbar:",
    options: [
      "map: { '*': { toolbarForm: 'Magento_Catalog/js/product/list/toolbar' } }",
      "paths: { toolbarForm: 'Magento_Catalog/js/product/list/toolbar' }",
      "deps: ['toolbarForm']",
      "shim: { toolbarForm: [] }"
    ],
    correct: 0,
    explanation: "map '*' is the standard aliasing mechanism across scopes." 
  },
  {
    question: "Which statement about imperative require() is accurate?",
    options: [
      "Preferred over initializers",
      "Not recommended but sometimes practical",
      "Only works with ES modules",
      "Loads modules synchronously"
    ],
    correct: 1,
    explanation: "Prefer initializers; use imperative require for simple or legacy needs." 
  },
  {
    question: "What does a Magento initializer pass as the first argument?",
    options: [
      "The module instance",
      "The element (DOM node)",
      "The config object",
      "The Knockout view model"
    ],
    correct: 1,
    explanation: "Initializers pass (element, config)." 
  },
  {
    question: "Which is the correct AMD define signature?",
    options: [
      "define(callback, deps)",
      "define([deps], callback)",
      "define('name', callback)",
      "define(require, exports)"
    ],
    correct: 1,
    explanation: "AMD define takes an array of dependencies followed by a factory callback." 
  },
  {
    question: "How do you map multiple aliases in one config?",
    options: [
      "map: { '*': { a: 'X', b: 'Y' } }",
      "paths: { a: ['X','Y'] }",
      "aliases: { a: 'X', b: 'Y' }",
      "mixins: { a: 'X', b: 'Y' }"
    ],
    correct: 0,
    explanation: "Add multiple alias entries inside the '*' map object." 
  },
  {
    question: "What should a jQuery UI widget module return?",
    options: [
      "Nothing",
      "The widget constructor (e.g., $.mage.modal)",
      "A DOM element",
      "An options object"
    ],
    correct: 1,
    explanation: "Return the newly created widget for consumption elsewhere." 
  },
  {
    question: "Which file path is correct for a module's mixin file?",
    options: [
      "view/frontend/requirejs-config.js",
      "view/frontend/web/js/mixin/some-mixin.js",
      "view/frontend/web/mixin.js",
      "view/frontend/web/js/mixins.js"
    ],
    correct: 1,
    explanation: "Mixins are regular JS modules, typically under web/js/mixin/." 
  },
  {
    question: "In a UI Component module, where do default bindable properties live?",
    options: [
      "this.config",
      "defaults object",
      "this.state",
      "options hash"
    ],
    correct: 1,
    explanation: "UI Components expose defaults which KO templates can bind to." 
  },
  {
    question: "Which section configures JS mixins in requirejs-config.js?",
    options: [
      "paths",
      "map",
      "config.mixins",
      "deps"
    ],
    correct: 2,
    explanation: "mixins are declared under config: { mixins: { 'Core/Module': { 'Vendor/Module/mixin': true } } }." 
  },
  {
    question: "How many times is a module downloaded when initialized on multiple elements?",
    options: [
      "Once per element",
      "Once total; instantiated per element",
      "Never reused",
      "Twice"
    ],
    correct: 1,
    explanation: "RequireJS loads modules once and reuses the definition." 
  },
  {
    question: "Which is the best way to augment a core JS method without copying the file?",
    options: [
      "Override the file in theme",
      "Create a JS mixin",
      "Edit vendor file",
      "Use inline script"
    ],
    correct: 1,
    explanation: "Mixins let you extend behavior in a maintainable way." 
  },
  {
    question: "Which statement about base area is true?",
    options: [
      "base assets are ignored",
      "Assets in view/base apply to multiple areas",
      "base is adminhtml only",
      "base is frontend only"
    ],
    correct: 1,
    explanation: "The base area contains assets shared by multiple areas." 
  },
  {
    question: "Which config section preloads modules on every page?",
    options: [
      "deps: [...] in requirejs-config.js",
      "map: { '*': {...} }",
      "paths: {...}",
      "shim: {...}"
    ],
    correct: 0,
    explanation: "Using deps causes RequireJS to load those modules early on every page." 
  },
  {
    question: "Which pattern correctly defines a mixin module factory?",
    options: [
      "return function (Target) { return Target; }",
      "return function (Target) { return Target.extend({}); }",
      "return new Target();",
      "return Target.prototype;"
    ],
    correct: 1,
    explanation: "A mixin returns a function receiving the target, often returning Target.extend({...})." 
  },
  {
    question: "How do you refer to a module inside another module's define?",
    options: [
      "Use its alias only",
      "Use alias or full path 'Module_Name/js/...'",
      "Only full path allowed",
      "Only relative path allowed"
    ],
    correct: 1,
    explanation: "You can depend on either the full module ID or an alias defined in map." 
  }
];
