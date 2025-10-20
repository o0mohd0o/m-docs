<?php
/**
 * SEO Meta Tags Component
 * Comprehensive SEO optimization for M-Docs Magento Documentation
 * Author: Mohamed Tawfik
 * Date: October 20, 2025
 */

// Default values
$defaults = [
    'site_name' => 'M-Docs - Magento 2 Documentation Hub',
    'author' => 'Mohamed Tawfik',
    'site_url' => 'https://m-docs.bonlineco.com',
    'keywords' => 'Magento 2, Adobe Commerce, Magento Development, Magento Certification, AD0-E717, Magento Database, Magento Tutorial, Magento Documentation',
    'twitter_handle' => '@MohamedTawfik',
    'og_image' => '/images/mohamed-tawfik.jpeg',
    'language' => 'en',
    'locale' => 'en_US',
];

// Merge with provided SEO data
$seo = array_merge($defaults, $seo ?? []);

// Get current URL
$current_url = $seo['site_url'] . $_SERVER['REQUEST_URI'];

// Ensure required fields
$page_title = $seo['title'] ?? $defaults['site_name'];
$page_description = $seo['description'] ?? 'Comprehensive Magento 2 and Adobe Commerce documentation, certification guides, database references, and tutorials by Mohamed Tawfik.';
$page_keywords = $seo['keywords'] ?? $defaults['keywords'];
$page_type = $seo['type'] ?? 'website';
$page_image = $seo['image'] ?? $defaults['og_image'];
$canonical_url = $seo['canonical'] ?? $current_url;

// Breadcrumb JSON-LD data
$breadcrumbs = $seo['breadcrumbs'] ?? [];
?>

<!-- Primary Meta Tags -->
<meta name="title" content="<?= htmlspecialchars($page_title) ?>">
<meta name="description" content="<?= htmlspecialchars($page_description) ?>">
<meta name="keywords" content="<?= htmlspecialchars($page_keywords) ?>">
<meta name="author" content="<?= htmlspecialchars($seo['author']) ?>">
<meta name="language" content="<?= htmlspecialchars($seo['language']) ?>">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">

<!-- Canonical URL -->
<link rel="canonical" href="<?= htmlspecialchars($canonical_url) ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="<?= htmlspecialchars($page_type) ?>">
<meta property="og:url" content="<?= htmlspecialchars($current_url) ?>">
<meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($page_description) ?>">
<meta property="og:image" content="<?= htmlspecialchars($seo['site_url'] . $page_image) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="<?= htmlspecialchars($seo['site_name']) ?>">
<meta property="og:locale" content="<?= htmlspecialchars($seo['locale']) ?>">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="<?= htmlspecialchars($current_url) ?>">
<meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($page_description) ?>">
<meta name="twitter:image" content="<?= htmlspecialchars($seo['site_url'] . $page_image) ?>">
<meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter_handle']) ?>">
<meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter_handle']) ?>">

<!-- Additional SEO Meta Tags -->
<meta name="rating" content="general">
<meta name="distribution" content="global">
<meta name="revisit-after" content="7 days">
<meta name="theme-color" content="#667eea">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">

<!-- Structured Data - Organization -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "<?= htmlspecialchars($seo['site_name']) ?>",
  "url": "<?= htmlspecialchars($seo['site_url']) ?>",
  "logo": "<?= htmlspecialchars($seo['site_url'] . $page_image) ?>",
  "description": "<?= htmlspecialchars($page_description) ?>",
  "author": {
    "@type": "Person",
    "name": "<?= htmlspecialchars($seo['author']) ?>"
  },
  "sameAs": []
}
</script>

<!-- Structured Data - WebPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "<?= htmlspecialchars($page_title) ?>",
  "description": "<?= htmlspecialchars($page_description) ?>",
  "url": "<?= htmlspecialchars($current_url) ?>",
  "inLanguage": "<?= htmlspecialchars($seo['language']) ?>",
  "author": {
    "@type": "Person",
    "name": "<?= htmlspecialchars($seo['author']) ?>"
  },
  "publisher": {
    "@type": "Organization",
    "name": "<?= htmlspecialchars($seo['site_name']) ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "<?= htmlspecialchars($seo['site_url'] . $page_image) ?>"
    }
  }
}
</script>

<?php if (!empty($breadcrumbs)): ?>
<!-- Structured Data - BreadcrumbList -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    <?php foreach ($breadcrumbs as $index => $crumb): ?>
    {
      "@type": "ListItem",
      "position": <?= $index + 1 ?>,
      "name": "<?= htmlspecialchars($crumb['name']) ?>",
      "item": "<?= htmlspecialchars($seo['site_url'] . $crumb['url']) ?>"
    }<?= $index < count($breadcrumbs) - 1 ? ',' : '' ?>
    <?php endforeach; ?>
  ]
}
</script>
<?php endif; ?>

<?php if (isset($seo['article']) && $seo['article']): ?>
<!-- Structured Data - Article -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "TechArticle",
  "headline": "<?= htmlspecialchars($page_title) ?>",
  "description": "<?= htmlspecialchars($page_description) ?>",
  "image": "<?= htmlspecialchars($seo['site_url'] . $page_image) ?>",
  "author": {
    "@type": "Person",
    "name": "<?= htmlspecialchars($seo['author']) ?>"
  },
  "publisher": {
    "@type": "Organization",
    "name": "<?= htmlspecialchars($seo['site_name']) ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "<?= htmlspecialchars($seo['site_url'] . $page_image) ?>"
    }
  },
  "datePublished": "<?= $seo['date_published'] ?? date('Y-m-d') ?>",
  "dateModified": "<?= $seo['date_modified'] ?? date('Y-m-d') ?>",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?= htmlspecialchars($current_url) ?>"
  }
}
</script>
<?php endif; ?>

<?php if (isset($seo['course']) && $seo['course']): ?>
<!-- Structured Data - Course -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Course",
  "name": "<?= htmlspecialchars($page_title) ?>",
  "description": "<?= htmlspecialchars($page_description) ?>",
  "provider": {
    "@type": "Organization",
    "name": "<?= htmlspecialchars($seo['site_name']) ?>",
    "sameAs": "<?= htmlspecialchars($seo['site_url']) ?>"
  }
}
</script>
<?php endif; ?>
