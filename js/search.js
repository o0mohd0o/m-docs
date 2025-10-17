// Search functionality for M-Docs
class DocSearch {
    constructor() {
        this.searchIndex = [];
        this.init();
    }

    init() {
        this.buildSearchIndex();
        this.setupSearchUI();
    }

    buildSearchIndex() {
        // Index main content
        const mainContent = document.querySelector('.main-content');
        if (!mainContent) return;

        // Index headings
        const headings = mainContent.querySelectorAll('h1, h2, h3, h4');
        headings.forEach(heading => {
            this.searchIndex.push({
                type: 'heading',
                text: heading.textContent.trim(),
                element: heading,
                level: heading.tagName
            });
        });

        // Index tables
        const tables = mainContent.querySelectorAll('table');
        tables.forEach(table => {
            const rows = table.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                if (cells.length > 0) {
                    const rowText = Array.from(cells).map(cell => cell.textContent.trim()).join(' ');
                    this.searchIndex.push({
                        type: 'table',
                        text: rowText,
                        element: row
                    });
                }
            });
        });

        // Index paragraphs
        const paragraphs = mainContent.querySelectorAll('p');
        paragraphs.forEach(p => {
            if (p.textContent.trim().length > 10) {
                this.searchIndex.push({
                    type: 'paragraph',
                    text: p.textContent.trim(),
                    element: p
                });
            }
        });
    }

    setupSearchUI() {
        const searchContainer = document.getElementById('searchContainer');
        if (!searchContainer) return;

        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');
        const clearSearch = document.getElementById('clearSearch');

        if (!searchInput || !searchResults) return;

        // Search on input
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.trim();
            
            if (query.length < 2) {
                searchResults.style.display = 'none';
                this.clearHighlights();
                if (clearSearch) clearSearch.style.display = 'none';
                return;
            }

            if (clearSearch) clearSearch.style.display = 'block';
            this.performSearch(query);
        });

        // Clear search
        if (clearSearch) {
            clearSearch.addEventListener('click', () => {
                searchInput.value = '';
                searchResults.style.display = 'none';
                clearSearch.style.display = 'none';
                this.clearHighlights();
            });
        }

        // Close results when clicking outside
        document.addEventListener('click', (e) => {
            if (!searchContainer.contains(e.target)) {
                searchResults.style.display = 'none';
            }
        });
    }

    performSearch(query) {
        const searchResults = document.getElementById('searchResults');
        if (!searchResults) return;

        this.clearHighlights();

        const results = this.searchIndex.filter(item => 
            item.text.toLowerCase().includes(query.toLowerCase())
        ).slice(0, 10); // Limit to 10 results

        if (results.length === 0) {
            searchResults.innerHTML = '<div class="search-result-item text-muted">No results found</div>';
            searchResults.style.display = 'block';
            return;
        }

        searchResults.innerHTML = results.map(result => {
            const snippet = this.getSnippet(result.text, query);
            const icon = this.getTypeIcon(result.type);
            return `
                <div class="search-result-item" data-result-id="${this.searchIndex.indexOf(result)}">
                    <span class="search-result-icon">${icon}</span>
                    <div class="search-result-content">
                        <div class="search-result-text">${snippet}</div>
                        <div class="search-result-type">${result.type}</div>
                    </div>
                </div>
            `;
        }).join('');

        searchResults.style.display = 'block';

        // Add click handlers to results
        searchResults.querySelectorAll('.search-result-item').forEach(item => {
            item.addEventListener('click', (e) => {
                const resultId = parseInt(item.dataset.resultId);
                const result = this.searchIndex[resultId];
                this.scrollToElement(result.element);
                this.highlightElement(result.element, query);
            });
        });
    }

    getSnippet(text, query, maxLength = 100) {
        const lowerText = text.toLowerCase();
        const lowerQuery = query.toLowerCase();
        const index = lowerText.indexOf(lowerQuery);

        if (index === -1) return this.escapeHtml(text.substring(0, maxLength)) + '...';

        const start = Math.max(0, index - 30);
        const end = Math.min(text.length, index + query.length + 70);
        
        let snippet = text.substring(start, end);
        if (start > 0) snippet = '...' + snippet;
        if (end < text.length) snippet += '...';

        // Highlight the query in the snippet
        const regex = new RegExp(`(${this.escapeRegex(query)})`, 'gi');
        snippet = this.escapeHtml(snippet).replace(regex, '<mark>$1</mark>');

        return snippet;
    }

    getTypeIcon(type) {
        const icons = {
            heading: '📄',
            table: '📊',
            paragraph: '📝'
        };
        return icons[type] || '•';
    }

    scrollToElement(element) {
        if (!element) return;
        
        const offset = 100;
        const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = elementPosition - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }

    highlightElement(element, query) {
        if (!element) return;

        element.classList.add('search-highlight-flash');
        setTimeout(() => {
            element.classList.remove('search-highlight-flash');
        }, 2000);
    }

    clearHighlights() {
        document.querySelectorAll('.search-highlight-flash').forEach(el => {
            el.classList.remove('search-highlight-flash');
        });
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    escapeRegex(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }
}

// Initialize search when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new DocSearch();
});
