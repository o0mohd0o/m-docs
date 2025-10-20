<?php
/**
 * Shared JavaScript Scripts Component
 * Provides consistent scripts across all pages with customization options
 * Author: Mohamed Tawfik
 * Date: October 20, 2025
 */

// Set defaults if not provided
$pageType = $pageType ?? 'default'; // 'default', 'lesson', 'quiz', 'database'
$customJS = $customJS ?? [];
?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Visitor Counter -->
    <script src="js/visitor-counter.js"></script>
    
    <?php if ($pageType === 'lesson' || $pageType === 'quiz'): ?>
    <!-- Navigation Loader -->
    <script src="js/nav-loader.js"></script>
    
    <!-- Common Scripts -->
    <script src="js/common.js"></script>
    <?php endif; ?>
    
    <?php if ($pageType === 'quiz'): ?>
    <!-- Quiz Engine -->
    <script src="js/quiz-engine.js"></script>
    <?php endif; ?>
    
    <?php
    // Include custom JS files
    foreach ($customJS as $js) {
        if (!isset($js['position']) || $js['position'] !== 'head') {
            if (is_array($js)) {
                echo '<script src="' . htmlspecialchars($js['src']) . '"></script>' . "\n    ";
            } else {
                echo '<script src="' . htmlspecialchars($js) . '"></script>' . "\n    ";
            }
        }
    }
    ?>
