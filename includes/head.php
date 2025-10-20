<?php
/**
 * Shared HTML Head Component
 * Provides consistent head section across all pages with customization options
 * Author: Mohamed Tawfik
 * Date: October 20, 2025
 */

// Set defaults if not provided
$pageTitle = $pageTitle ?? 'M-Docs - Magento 2 Documentation Hub';
$pageType = $pageType ?? 'default'; // 'default', 'lesson', 'quiz', 'database'
$includeMermaid = $includeMermaid ?? false;
$customCSS = $customCSS ?? [];
$customJS = $customJS ?? [];
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    
    <?php
    // Include SEO meta tags if $seo array is defined
    if (isset($seo)) {
        include 'includes/seo-meta.php';
    }
    ?>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <?php if ($pageType === 'lesson' || $pageType === 'quiz'): ?>
    <!-- Common Lesson Styles -->
    <link href="css/common.css" rel="stylesheet">
    <?php endif; ?>
    
    <?php if ($pageType === 'quiz'): ?>
    <!-- Quiz Specific Styles -->
    <link href="css/quiz.css" rel="stylesheet">
    <?php endif; ?>
    
    <!-- Author Footer CSS (All Pages) -->
    <link rel="stylesheet" href="css/author-footer.css">
    
    <?php
    // Include custom CSS files
    foreach ($customCSS as $css) {
        echo '<link rel="stylesheet" href="' . htmlspecialchars($css) . '">' . "\n    ";
    }
    ?>
    
    <?php if ($includeMermaid): ?>
    <!-- Mermaid for Diagrams -->
    <script type="module">
        import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs';
        mermaid.initialize({ startOnLoad: true, theme: 'default' });
    </script>
    <?php endif; ?>
    
    <?php
    // Include custom JS files in head if needed
    foreach ($customJS as $js) {
        if (isset($js['position']) && $js['position'] === 'head') {
            echo '<script src="' . htmlspecialchars($js['src']) . '"></script>' . "\n    ";
        }
    }
    ?>
