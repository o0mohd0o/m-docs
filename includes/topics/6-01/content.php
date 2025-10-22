<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Why This Matters:</strong> Understanding category and product management is fundamental to Magento development. Knowing when to use data interfaces vs implementations, factory/repository patterns, and product-to-category assignment mechanisms ensures clean, maintainable code.
</div>

<!-- Mind Map Section -->
<div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
    <h2 style="text-align: center; margin-bottom: 20px;"><i class="fas fa-project-diagram"></i> Category & Product Management</h2>
    <div class="mermaid" style="display: flex; justify-content: center;">
mindmap
  root((Category Product Mgmt))
    Data Interfaces
      CategoryInterface
      Use for type hints
      Future proof
    Implementations
      Category model
      Use when methods not in interface
    Factories
      CategoryInterfaceFactory
      CategoryFactory
    Repositories
      CategoryRepositoryInterface
      save method
    Product Assignment
      setPostedProducts
      getProductsPosition
      CategoryLinkRepository
    Indexing
      catalog category product
      Update on Save or Schedule
    URL Rewrites
      CategoryProcessUrlRewriteSavingObserver
      ProductUrlRewriteGenerator
    </div>
</div>

<h2>Data Interfaces vs Implementations</h2>

<div class="directory-card">
    <p>When working with categories and products, understand the difference between <strong>data interfaces</strong> and <strong>implementations</strong>.</p>
    <h3>CategoryInterface (Data Interface)</h3>
    <div class="directory-path">\Magento\Catalog\Api\Data\CategoryInterface</div>
    <p>Represents Magento's <strong>contract</strong>—unchangeable throughout releases (until Magento 3). Always prefer using data interfaces for type hints.</p>
    <pre><code>public function getCategoryPath(CategoryInterface $category): string {
    return $category->getPath();
}</code></pre>
    <div class="success-box"><strong>Best Practice:</strong> Use data interfaces for forward compatibility.</div>
</div>

<div class="directory-card">
    <h3>Category Model (Implementation)</h3>
    <div class="directory-path">\Magento\Catalog\Model\Category</div>
    <p>Implementation of <code>CategoryInterface</code>. Use when you need methods not available in the interface (e.g., <code>getUrl()</code>).</p>
    <pre><code>public function getCategoryUrl(CategoryInterface $category): string {
    if (!($category instanceof \Magento\Catalog\Model\Category)) {
        throw new \InvalidArgumentException('Category must be a Category model.');
    }
    return $category->getUrl();
}</code></pre>
    <div class="warning-box"><strong>Note:</strong> Writing against implementations risks incompatibility in future Magento versions.</div>
</div>

<h2>Creating Categories</h2>

<div class="directory-card">
    <h3>Factory Pattern</h3>
    <p>Two factory options:</p>
    <ul>
        <li><strong>CategoryInterfaceFactory:</strong> Uses preference for <code>CategoryInterface</code> (ultimately <code>CategoryFactory</code>).</li>
        <li><strong>CategoryFactory:</strong> Directly creates <code>Category</code> model instances.</li>
    </ul>
    <div class="key-point"><strong>Tip:</strong> IDEs may warn that <code>CategoryInterfaceFactory</code> doesn't exist, but Magento generates it at runtime via <code>\Magento\Framework\Code\Generator</code>.</div>
</div>

<div class="directory-card">
    <h3>Example: Creating a Category (Data Patch)</h3>
    <pre><code>class CreateCategory implements DataPatchInterface
{
    private $categoryFactory;
    private $categoryRepository;

    public function __construct(
        \Magento\Catalog\Api\Data\CategoryInterfaceFactory $categoryFactory,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->categoryRepository = $categoryRepository;
    }

    public function apply()
    {
        $category = $this->categoryFactory->create();
        $category->setName('My Category');
        $category->setIsActive(true);
        $category->setParentId(2); // Root category
        $this->categoryRepository->save($category);
    }
}</code></pre>
</div>

<h3>Autoloader Magic</h3>

<div class="directory-card">
    <p>How does <code>CategoryInterfaceFactory</code> work if it doesn't exist?</p>
    <ol>
        <li>PHP calls <code>spl_autoload_register</code> autoloader.</li>
        <li>Magento's autoloader (<code>\Magento\Framework\Code\Generator\Autoloader</code>) intercepts.</li>
        <li>Generator (<code>\Magento\Framework\Code\Generator</code>) creates the factory class on-the-fly.</li>
    </ol>
    <div class="success-box"><strong>Result:</strong> Factory classes are auto-generated when needed.</div>
</div>

<h2>Assigning Products to Categories</h2>

<div class="directory-card">
    <p>Two approaches to assign/unassign products:</p>
    <ol>
        <li><strong>Via Category Model</strong></li>
        <li><strong>Via CategoryLinkRepository</strong></li>
    </ol>
</div>

<h3>Approach 1: Via Category Model</h3>

<div class="directory-card">
    <div class="directory-path">\Magento\Catalog\Controller\Adminhtml\Category\Save</div>
    <p>Admin uses <code>setPostedProducts()</code> on category.</p>
    <pre><code>// Load category
$category = $categoryRepository->get($categoryId);

// Get original positions
$originalPositions = $category->getProductsPosition();

// Set new products (key = product ID, value = sort order)
$category->setPostedProducts([
    1 => 10,  // Product ID 1, sort order 10
    2 => 20,  // Product ID 2, sort order 20
]);

// Save (triggers _saveCategoryProducts in resource model)
$categoryRepository->save($category);</code></pre>
    <div class="directory-path">\Magento\Catalog\Model\ResourceModel\Category::_saveCategoryProducts()</div>
    <p>Called from <code>_afterSave()</code> in the resource model.</p>
    <div class="warning-box"><strong>Note:</strong> If indexer is "Update on Schedule" and cron is running, associations may take up to an hour to appear.</div>
</div>

<h3>Approach 2: Via CategoryLinkRepository</h3>

<div class="directory-card">
    <div class="directory-path">\Magento\Catalog\Model\CategoryLinkRepository::save()</div>
    <p>API-based approach (found via Admin REST API docs).</p>
    <pre><code>$categoryLinkRepository->save($categoryLink);</code></pre>
    <p>This method performs the same operations as the category model approach.</p>
</div>

<h2>Indexing</h2>

<div class="directory-card">
    <p>When category/product associations change:</p>
    <ul>
        <li><strong>Update on Save:</strong> Index updates immediately.</li>
        <li><strong>Update on Schedule:</strong> <code>catalog_category_product</code> index marked for update; cron processes later.</li>
    </ul>
    <div class="directory-path">\Magento\Catalog\Observer\CategoryProductIndexer</div>
    <div class="directory-path">\Magento\Elasticsearch\Observer\CategoryProductIndexer</div>
    <p>Indexers triggered from <code>\Magento\Catalog\Model\Category</code> class.</p>
</div>

<h2>URL Rewrite Generation</h2>

<div class="directory-card">
    <p>Category product URLs are created when category is saved.</p>
    <div class="directory-path">\Magento\CatalogUrlRewrite\Observer\CategoryProcessUrlRewriteSavingObserver</div>
    <p><strong>Flow:</strong></p>
    <ol>
        <li>Observer fetches URL rewrites from <code>UrlRewriteHandler</code>.</li>
        <li><code>UrlRewriteHandler</code> iterates changed products, gets rewrites from <code>ProductUrlRewriteGenerator</code>.</li>
        <li>Traversal continues to <code>ProductScopeRewriteGenerator</code> (per store view).</li>
        <li>Generators:
            <ul>
                <li><code>CanonicalUrlRewriteGenerator</code></li>
                <li><code>CurrentUrlRewritesRegenerator</code></li>
            </ul>
        </li>
    </ol>
    <div class="key-point"><strong>Debugging Tip:</strong> Set breakpoint in <code>CategoryProcessUrlRewriteSavingObserver</code> to trace URL rewrite generation.</div>
</div>

<h2>Service Contracts</h2>

<div class="directory-card">
    <p>Service contracts define <strong>data interfaces</strong> and <strong>service interfaces</strong> (repositories).</p>
    <ul>
        <li><strong>Data Interface:</strong> <code>CategoryInterface</code>, <code>ProductInterface</code></li>
        <li><strong>Service Interface:</strong> <code>CategoryRepositoryInterface</code>, <code>ProductRepositoryInterface</code></li>
    </ul>
    <p>Benefits:</p>
    <ul>
        <li>Forward compatibility</li>
        <li>Stable API for extensions</li>
        <li>Web API generation</li>
    </ul>
    <p>See: <a href="https://developer.adobe.com/commerce/php/development/components/service-contracts/" target="_blank">Service Contracts</a>, <a href="https://www.vinai kopp.com/2016/09/14/magento-2-repositories-interfaces-web-api" target="_blank">Repositories & Web API</a></p>
</div>

<h2>Further Reading</h2>
<div class="directory-card">
    <ul class="mb-0">
        <li><a href="https://developer.adobe.com/commerce/php/development/components/service-contracts/" target="_blank">DevDocs: Service Contracts</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/catalog/products/settings/product-settings.html" target="_blank">Product Settings</a></li>
        <li><a href="https://experienceleague.adobe.com/docs/commerce-admin/catalog/products/digital-assets/catalog-images-video.html" target="_blank">Catalog Images and Video</a></li>
    </ul>
</div>

<h2>Exam Tips</h2>
<div class="alert alert-warning">
    <ul class="mb-0">
        <li><strong>Data Interfaces:</strong> Use <code>CategoryInterface</code> for type hints; future-proof.</li>
        <li><strong>Implementations:</strong> Use <code>Category</code> model when methods not in interface (e.g., <code>getUrl()</code>).</li>
        <li><strong>Factories:</strong> <code>CategoryInterfaceFactory</code> auto-generated; creates instances.</li>
        <li><strong>Repositories:</strong> <code>CategoryRepositoryInterface::save()</code> persists categories.</li>
        <li><strong>Product Assignment:</strong> <code>setPostedProducts()</code> on category; <code>CategoryLinkRepository::save()</code> via API.</li>
        <li><strong>Indexing:</strong> <code>catalog_category_product</code> index; Update on Save vs Schedule.</li>
        <li><strong>URL Rewrites:</strong> Generated via observers when category saved.</li>
    </ul>
</div>
