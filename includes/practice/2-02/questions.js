window.questions = [
    {
        question: "What is the first step in creating an admin grid?",
        options: [
            "Create the UI Component XML file",
            "Create a new controller in adminhtml",
            "Configure DataSource in di.xml",
            "Create the layout XML file"
        ],
        correct: 1,
        explanation: "The first step in creating an admin grid is to create a new controller in the adminhtml area. This controller will handle the grid page display."
    },
    {
        question: "How many steps are required to create a standard admin grid?",
        options: [
            "4 steps (controller, layout, UI component, DataSource)",
            "5 steps (adding mass actions controller)",
            "6 steps (including optional inline editing controller)",
            "3 steps (controller, layout, UI component)"
        ],
        correct: 2,
        explanation: "Creating an admin grid requires 6 steps: 1) Create controller, 2) Modify layout, 3) Create UI Component XML, 4) Configure DataSource, 5) Create mass actions controllers, and 6) Optionally create inline editing controller."
    },
    {
        question: "What does a standard admin grid assume exists in the system?",
        options: [
            "A REST API endpoint",
            "An underlying table and collection for fetching data",
            "A GraphQL resolver",
            "A JavaScript module"
        ],
        correct: 1,
        explanation: "Standard admin grids assume there is an underlying table and collection that allows fetching data from the table."
    },
    {
        question: "In the layout XML, which element is used to reference the UI Component?",
        options: [
            "&lt;uiComponent name=\"...\"/&gt;",
            "&lt;block class=\"...\"/&gt;",
            "&lt;container name=\"...\"/&gt;",
            "&lt;referenceBlock name=\"...\"/&gt;"
        ],
        correct: 0,
        explanation: "The &lt;uiComponent name=\"entity_listing\"/&gt; element is used in layout XML to reference and render the UI Component."
    },
    {
        question: "What is the root element for a grid UI Component XML file?",
        options: [
            "&lt;form&gt;",
            "&lt;grid&gt;",
            "&lt;listing&gt;",
            "&lt;component&gt;"
        ],
        correct: 2,
        explanation: "Grid UI Component XML files use &lt;listing&gt; as the root element. Forms use &lt;form&gt; as their root element."
    },
    {
        question: "Where is the DataSource for a grid configured?",
        options: [
            "In the UI Component XML file only",
            "In etc/di.xml using CollectionFactory",
            "In the controller",
            "In etc/config.xml"
        ],
        correct: 1,
        explanation: "The DataSource for a grid is configured in etc/di.xml by adding the collection to Magento\\Framework\\View\\Element\\UiComponent\\DataProvider\\CollectionFactory arguments."
    },
    {
        question: "Why do grids typically use a separate Grid Collection class?",
        options: [
            "To improve performance",
            "To implement SearchResultInterface",
            "To add custom filtering",
            "To support pagination"
        ],
        correct: 1,
        explanation: "The main reason for having a separate Grid Collection is to implement SearchResultInterface. You may use the standard collection as well if implementing this interface."
    },
    {
        question: "What must match between di.xml and the UI Component XML?",
        options: [
            "The controller name",
            "The collection class name",
            "The DataSource name",
            "The table name"
        ],
        correct: 2,
        explanation: "The collection name (DataSource name) in di.xml must match the dataSource name specified in the UI Component XML file for the grid to load data correctly."
    },
    {
        question: "Where are mass actions configured in the UI Component XML?",
        options: [
            "listing/massaction/action",
            "listing/listingToolbar/massaction/action",
            "columns/massaction/action",
            "settings/massaction/action"
        ],
        correct: 1,
        explanation: "Mass actions are configured in the listing/listingToolbar/massaction/action nodes of the UI Component XML file."
    },
    {
        question: "Which class is used in mass action controllers to filter the collection?",
        options: [
            "Magento\\Framework\\Filter",
            "Magento\\Ui\\Component\\MassAction\\Filter",
            "Magento\\Framework\\Data\\Filter",
            "Magento\\Backend\\Model\\Filter"
        ],
        correct: 1,
        explanation: "Mass action controllers use Magento\\Ui\\Component\\MassAction\\Filter to get the filtered collection based on user selection in the grid."
    },
    {
        question: "What can mass actions do besides issuing immediate requests?",
        options: [
            "Refresh the page automatically",
            "Trigger a JavaScript module",
            "Send email notifications",
            "Update the database directly"
        ],
        correct: 1,
        explanation: "Some mass actions (like edit) may trigger a JavaScript module rather than issuing an immediate request. This is useful for inline editing functionality."
    },
    {
        question: "How many steps are required to enable inline editing in a grid?",
        options: [
            "1 step: configure editorConfig",
            "2 steps: configure editorConfig and field editor",
            "3 steps: configure editorConfig, field editor, and create InlineEdit controller",
            "4 steps: including di.xml configuration"
        ],
        correct: 2,
        explanation: "Enabling inline editing requires 3 steps: 1) Configure the editorConfig node, 2) Configure the editor for each field, and 3) Create a controller to save the result."
    },
    {
        question: "Where is the editorConfig node placed in the UI Component XML?",
        options: [
            "In the listing root element",
            "In the columns/settings node",
            "In the dataSource element",
            "In the listingToolbar element"
        ],
        correct: 1,
        explanation: "The editorConfig node is placed in columns/settings to configure inline editing for the grid columns."
    },
    {
        question: "What type of response does an InlineEdit controller return?",
        options: [
            "HTML response",
            "XML response",
            "JSON response",
            "Redirect response"
        ],
        correct: 2,
        explanation: "An InlineEdit controller returns a JSON response containing messages and error status, since it's called via AJAX from the grid interface."
    },
    {
        question: "How do admin forms differ from admin grids in terms of UI Component?",
        options: [
            "They use the same root element",
            "Forms use &lt;form&gt; root element, grids use &lt;listing&gt;",
            "Forms don't use UI Components",
            "Forms use &lt;grid&gt; root element"
        ],
        correct: 1,
        explanation: "Admin forms use &lt;form&gt; as the root element in their UI Component XML, while grids use &lt;listing&gt;. The overall pattern is similar but the structure differs."
    },
    {
        question: "Which controllers are typically needed for an admin form?",
        options: [
            "Only Index and Save controllers",
            "New, Edit, Save, and Delete controllers",
            "Only Edit and Save controllers",
            "Index, Edit, and MassDelete controllers"
        ],
        correct: 1,
        explanation: "Admin forms typically need controllers for New/Edit (form display), Save, and Delete actions. You may also need additional controllers for file uploading."
    },
    {
        question: "Is the layout XML modification different for forms compared to grids?",
        options: [
            "Yes, forms require special layout structure",
            "No, layout modification is exactly the same - just reference the UI Component",
            "Yes, forms need additional container elements",
            "Yes, forms require different XML namespaces"
        ],
        correct: 1,
        explanation: "Layout modification is exactly the same for both grids and forms - you simply reference the UI Component using &lt;uiComponent name=\"...\"/&gt;."
    },
    {
        question: "What class typically provides data for admin forms?",
        options: [
            "Collection class",
            "ResourceModel class",
            "DataProvider class",
            "Repository class"
        ],
        correct: 2,
        explanation: "Admin forms use a DataProvider class (extending AbstractDataProvider) to fetch and provide form data."
    },
    {
        question: "In a form UI Component, what is a fieldset used for?",
        options: [
            "To validate form data",
            "To group related fields together",
            "To save form data",
            "To configure form actions"
        ],
        correct: 1,
        explanation: "A fieldset is used to group related fields together in a form, providing logical organization and visual separation."
    },
    {
        question: "What is the purpose of the primaryFieldName in DataSource configuration?",
        options: [
            "To specify the main column for filtering",
            "To specify the primary key field (ID field) of the entity",
            "To specify the first column in the grid",
            "To specify the required field"
        ],
        correct: 1,
        explanation: "The primaryFieldName specifies the primary key field (typically the ID field like 'entity_id' or 'page_id') of the entity being managed."
    },
    {
        question: "What is the purpose of the requestFieldName in DataSource configuration?",
        options: [
            "To specify the parameter name in the URL request",
            "To specify required form fields",
            "To specify AJAX request type",
            "To specify the form action URL"
        ],
        correct: 0,
        explanation: "The requestFieldName specifies the parameter name used in the URL request (typically 'id') when loading a specific record."
    },
    {
        question: "Which Magento core module provides good examples of admin grids and forms?",
        options: [
            "Magento_Backend",
            "Magento_Ui",
            "Magento_Cms",
            "Magento_Admin"
        ],
        correct: 2,
        explanation: "Magento_Cms module provides excellent examples of admin grids and forms, including CMS pages with mass actions, inline editing, and CRUD operations."
    },
    {
        question: "In a mass delete action configuration, what does the &lt;confirm&gt; element do?",
        options: [
            "Validates the selected items",
            "Displays a confirmation dialog before executing the action",
            "Confirms the delete was successful",
            "Sends a confirmation email"
        ],
        correct: 1,
        explanation: "The &lt;confirm&gt; element in mass action configuration displays a confirmation dialog with a custom message and title before executing the potentially destructive action."
    },
    {
        question: "What does the 'path' attribute in a mass action URL specify?",
        options: [
            "The full URL to the controller",
            "The route path like '*/*/massDelete' (module/controller/action)",
            "The file system path",
            "The database table path"
        ],
        correct: 1,
        explanation: "The 'path' attribute specifies the route path in the format module/controller/action, where '*/*/' represents current module and controller, followed by the action name."
    },
    {
        question: "What interface must a Grid Collection implement?",
        options: [
            "CollectionInterface",
            "SearchResultInterface",
            "GridInterface",
            "DataProviderInterface"
        ],
        correct: 1,
        explanation: "Grid Collections must implement SearchResultInterface (from Magento\\Framework\\Api\\Search) to work properly with UI Component grids."
    },
    {
        question: "In form field configuration, what does formElement specify?",
        options: [
            "The form ID",
            "The HTML form element type (input, textarea, checkbox, etc.)",
            "The form action",
            "The form validation"
        ],
        correct: 1,
        explanation: "The formElement attribute specifies the type of HTML form element to render, such as 'input', 'textarea', 'checkbox', 'select', etc."
    },
    {
        question: "What is the purpose of the editorType in inline editing field configuration?",
        options: [
            "To specify which admin user can edit the field",
            "To specify the editor interface type (text, select, date, etc.)",
            "To specify the editor's ACL permission",
            "To specify the code editor syntax"
        ],
        correct: 1,
        explanation: "The editorType specifies which type of editor interface to use for inline editing, such as 'text' for text input, 'select' for dropdown, 'date' for date picker, etc."
    },
    {
        question: "In an InlineEdit controller, what parameter indicates it's an AJAX request?",
        options: [
            "isPost",
            "isAjax",
            "isXhr",
            "isAsync"
        ],
        correct: 1,
        explanation: "The InlineEdit controller checks for the 'isAjax' parameter using $this->getRequest()->getParam('isAjax') to ensure it's handling an AJAX request."
    },
    {
        question: "What data does an InlineEdit controller receive for updating records?",
        options: [
            "A single item with changed values",
            "An 'items' parameter containing an array of entity IDs and their updated values",
            "A JSON string with all grid data",
            "Only the entity ID"
        ],
        correct: 1,
        explanation: "The InlineEdit controller receives an 'items' parameter containing an array where keys are entity IDs and values are arrays of updated field data."
    },
    {
        question: "What should a form DataProvider class extend?",
        options: [
            "Magento\\Framework\\Data\\DataProvider",
            "Magento\\Ui\\DataProvider\\AbstractDataProvider",
            "Magento\\Framework\\Model\\AbstractModel",
            "Magento\\Backend\\Model\\DataProvider"
        ],
        correct: 1,
        explanation: "Form DataProvider classes should extend Magento\\Ui\\DataProvider\\AbstractDataProvider to provide data for UI Component forms."
    }
];
