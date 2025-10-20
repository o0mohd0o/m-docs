// Global Search System for M-Docs
// Works across all pages with intelligent search results

(function() {
    'use strict';

    // Search index - all pages and their content
    const SEARCH_INDEX = [
        // Homepage
        { title: 'Home', url: 'index.php', keywords: 'home magento documentation certification database', type: 'page' },
        
        // Database Documentation
        { title: 'Database Overview', url: 'database-overview.php', keywords: 'database schema tables overview structure', type: 'database' },
        { title: 'Sales & Orders', url: 'sales.php', keywords: 'sales orders invoice shipment creditmemo payment quote', type: 'database' },
        { title: 'Catalog', url: 'catalog.php', keywords: 'catalog product category attributes eav inventory', type: 'database' },
        { title: 'Customer', url: 'customer.php', keywords: 'customer address entity group account', type: 'database' },
        { title: 'EAV System', url: 'eav.php', keywords: 'eav entity attribute value flexible schema', type: 'database' },
        { title: 'Inventory (MSI)', url: 'inventory.php', keywords: 'inventory msi multi source stock reservation', type: 'database' },
        { title: 'CMS & Content', url: 'cms.php', keywords: 'cms page block content url rewrite', type: 'database' },
        
        // Certification Overview
        { title: 'AD0-E717 Certification', url: 'cert-overview.php', keywords: 'certification exam ad0-e717 adobe commerce developer professional', type: 'cert' },
        { title: 'Practice Quizzes', url: 'cert-practice.php', keywords: 'practice quiz test exam questions', type: 'cert' },
        { title: 'UI Development', url: 'cert-ui.php', keywords: 'ui frontend theme layout template component', type: 'cert' },
        
        // Certification Topics
        { title: '1.01 File Structure', url: 'cert-topic-1-01.php', keywords: 'file structure directory app vendor pub module', type: 'lesson' },
        { title: '1.02 Module Structure', url: 'cert-topic-1-02.php', keywords: 'module structure registration component architecture', type: 'lesson' },
        { title: '1.03 di.xml Usage', url: 'cert-topic-1-03.php', keywords: 'di.xml dependency injection preference plugin virtual type', type: 'lesson' },
        { title: '1.04 Plugins & Observers', url: 'cert-topic-1-04.php', keywords: 'plugin observer event preference interception', type: 'lesson' },
        { title: '1.05 Create Controllers', url: 'cert-topic-1-05.php', keywords: 'controller action routing frontend adminhtml', type: 'lesson' },
        { title: '1.06 CLI Commands', url: 'cert-topic-1-06.php', keywords: 'cli command console bin/magento terminal', type: 'lesson' },
        { title: '1.07 Index Functionality', url: 'cert-topic-1-07.php', keywords: 'index indexer reindex mview catalog search', type: 'lesson' },
        { title: '1.08 Localization', url: 'cert-topic-1-08.php', keywords: 'localization translation i18n language locale csv', type: 'lesson' },
        { title: '1.09 Cron Functionality', url: 'cert-topic-1-09.php', keywords: 'cron job scheduled task crontab automation', type: 'lesson' },
        { title: '1.10 Custom Routes', url: 'cert-topic-1-10.php', keywords: 'route routing custom url frontname router', type: 'lesson' },
        { title: '1.11 URL Rewrites', url: 'cert-topic-1-11.php', keywords: 'url rewrite redirect seo friendly permalink', type: 'lesson' },
        { title: '1.12 Caching System', url: 'cert-topic-1-12.php', keywords: 'cache caching full page varnish redis performance', type: 'lesson' },
        { title: '1.13 Stores & Scope', url: 'cert-topic-1-13.php', keywords: 'store website scope multi-store configuration', type: 'lesson' },
        
        // Practice Quizzes
        { title: 'Practice: File Structure', url: 'cert-practice-1-01.php', keywords: 'practice quiz file structure test', type: 'quiz' },
        { title: 'Practice: Module Structure', url: 'cert-practice-1-02.php', keywords: 'practice quiz module structure test', type: 'quiz' },
        { title: 'Practice: di.xml', url: 'cert-practice-1-03.php', keywords: 'practice quiz di.xml dependency injection test', type: 'quiz' },
        { title: 'Practice: Plugins & Observers', url: 'cert-practice-1-04.php', keywords: 'practice quiz plugin observer test', type: 'quiz' },
        { title: 'Practice: Controllers', url: 'cert-practice-1-05.php', keywords: 'practice quiz controller action test', type: 'quiz' },
        { title: 'Practice: CLI Commands', url: 'cert-practice-1-06.php', keywords: 'practice quiz cli command test', type: 'quiz' },
        { title: 'Practice: Index', url: 'cert-practice-1-07.php', keywords: 'practice quiz index indexer test', type: 'quiz' },
        { title: 'Practice: Localization', url: 'cert-practice-1-08.php', keywords: 'practice quiz localization translation test', type: 'quiz' },
        { title: 'Practice: Cron', url: 'cert-practice-1-09.php', keywords: 'practice quiz cron job test', type: 'quiz' },
        { title: 'Practice: Custom Routes', url: 'cert-practice-1-10.php', keywords: 'practice quiz route routing test', type: 'quiz' },
        { title: 'Practice: URL Rewrites', url: 'cert-practice-1-11.php', keywords: 'practice quiz url rewrite test', type: 'quiz' },
        { title: 'Practice: Caching', url: 'cert-practice-1-12.php', keywords: 'practice quiz cache caching test', type: 'quiz' },
        { title: 'Practice: Stores & Scope', url: 'cert-practice-1-13.php', keywords: 'practice quiz store scope test', type: 'quiz' }
    ];

    // Type icons
    const TYPE_ICONS = {
        'page': '🏠',
        'database': '🗄️',
        'cert': '🎓',
        'lesson': '📚',
        'quiz': '✏️'
    };

    // Type labels
    const TYPE_LABELS = {
        'page': 'Page',
        'database': 'Database',
        'cert': 'Certification',
        'lesson': 'Lesson',
        'quiz': 'Practice Quiz'
    };

    class GlobalSearch {
        constructor() {
            this.searchInput = null;
            this.searchResults = null;
            this.init();
        }

        init() {
            // Wait for DOM to be ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', () => this.setupSearch());
            } else {
                this.setupSearch();
            }
        }

        setupSearch() {
            // Find all search inputs on the page
            const searchInputs = document.querySelectorAll('#searchInput, input[placeholder*="Search"]');
            
            searchInputs.forEach(input => {
                this.attachSearchListener(input);
            });
        }

        attachSearchListener(input) {
            if (!input) return;

            // Create results container if it doesn't exist
            let resultsContainer = input.parentElement.querySelector('.global-search-results');
            
            if (!resultsContainer) {
                resultsContainer = document.createElement('div');
                resultsContainer.className = 'global-search-results';
                resultsContainer.style.cssText = `
                    position: absolute;
                    top: 100%;
                    left: 0;
                    right: 0;
                    background: white;
                    border: 1px solid #e0e0e0;
                    border-radius: 8px;
                    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
                    max-height: 400px;
                    overflow-y: auto;
                    display: none;
                    z-index: 1000;
                    margin-top: 8px;
                `;
                input.parentElement.style.position = 'relative';
                input.parentElement.appendChild(resultsContainer);
            }

            // Search on input
            input.addEventListener('input', (e) => {
                const query = e.target.value.trim();
                
                if (query.length < 2) {
                    resultsContainer.style.display = 'none';
                    return;
                }

                this.performSearch(query, resultsContainer);
            });

            // Close results when clicking outside
            document.addEventListener('click', (e) => {
                if (!input.parentElement.contains(e.target)) {
                    resultsContainer.style.display = 'none';
                }
            });

            // Handle Enter key
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    const firstResult = resultsContainer.querySelector('.search-result-item');
                    if (firstResult) {
                        firstResult.click();
                    }
                }
            });
        }

        performSearch(query, resultsContainer) {
            const lowerQuery = query.toLowerCase();
            
            // Search through index
            const results = SEARCH_INDEX.filter(item => {
                const searchText = `${item.title} ${item.keywords}`.toLowerCase();
                return searchText.includes(lowerQuery);
            }).slice(0, 8); // Limit to 8 results

            if (results.length === 0) {
                resultsContainer.innerHTML = `
                    <div style="padding: 20px; text-align: center; color: #666;">
                        <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 10px; opacity: 0.3;"></i>
                        <p>No results found for "${query}"</p>
                    </div>
                `;
                resultsContainer.style.display = 'block';
                return;
            }

            resultsContainer.innerHTML = results.map(result => {
                const icon = TYPE_ICONS[result.type] || '📄';
                const label = TYPE_LABELS[result.type] || 'Page';
                
                return `
                    <div class="search-result-item" data-url="${result.url}" style="
                        padding: 12px 16px;
                        border-bottom: 1px solid #f0f0f0;
                        cursor: pointer;
                        transition: background 0.2s;
                    ">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <span style="font-size: 1.5rem; flex-shrink: 0;">${icon}</span>
                            <div style="flex: 1; min-width: 0;">
                                <div style="font-weight: 600; color: #333; margin-bottom: 4px;">
                                    ${this.highlightMatch(result.title, query)}
                                </div>
                                <div style="font-size: 0.85rem; color: #666;">
                                    <span style="background: #e8f4fd; padding: 2px 8px; border-radius: 12px; font-weight: 500;">
                                        ${label}
                                    </span>
                                </div>
                            </div>
                            <i class="fas fa-arrow-right" style="color: #0d6efd; opacity: 0.5; flex-shrink: 0;"></i>
                        </div>
                    </div>
                `;
            }).join('');

            resultsContainer.style.display = 'block';

            // Add click handlers
            resultsContainer.querySelectorAll('.search-result-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.background = '#f8f9fa';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.background = 'white';
                });
                
                item.addEventListener('click', function() {
                    window.location.href = this.dataset.url;
                });
            });
        }

        highlightMatch(text, query) {
            const regex = new RegExp(`(${this.escapeRegex(query)})`, 'gi');
            return text.replace(regex, '<mark style="background: #fff3cd; padding: 2px 4px; border-radius: 3px;">$1</mark>');
        }

        escapeRegex(string) {
            return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        }
    }

    // Initialize global search
    new GlobalSearch();
})();
