// Common JavaScript functionality for all pages

// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    // Mobile sidebar toggle
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarClose = document.getElementById('sidebarClose');
    
    function toggleSidebar() {
        sidebar.classList.toggle('show');
        sidebarOverlay.classList.toggle('show');
    }
    
    function closeSidebar() {
        sidebar.classList.remove('show');
        sidebarOverlay.classList.remove('show');
    }
    
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', toggleSidebar);
    }
    
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }
    
    if (sidebarClose) {
        sidebarClose.addEventListener('click', closeSidebar);
    }
    
    // Close sidebar when clicking on navigation links on mobile
    if (sidebar) {
        const navLinks = sidebar.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    closeSidebar();
                }
            });
        });
    }

    // Back to top button
    createBackToTopButton();

    // Table search functionality
    setupTableSearch();

    // Collapsible sections
    setupCollapsibleSections();

    // Smooth scroll for anchor links
    setupSmoothScroll();
});

// Back to top button
function createBackToTopButton() {
    const backToTop = document.createElement('button');
    backToTop.id = 'backToTop';
    backToTop.className = 'back-to-top';
    backToTop.innerHTML = '↑';
    backToTop.title = 'Back to top';
    document.body.appendChild(backToTop);

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Table search functionality
function setupTableSearch() {
    const tables = document.querySelectorAll('.table');
    
    tables.forEach((table, index) => {
        // Skip if table already has search
        if (table.parentElement.querySelector('.table-search')) return;

        // Create search input
        const searchWrapper = document.createElement('div');
        searchWrapper.className = 'table-search mb-2';
        searchWrapper.innerHTML = `
            <input type="text" 
                   class="form-control form-control-sm" 
                   placeholder="Search table..." 
                   data-table-index="${index}">
        `;

        // Insert before table
        table.parentElement.insertBefore(searchWrapper, table);

        const searchInput = searchWrapper.querySelector('input');
        searchInput.addEventListener('input', (e) => {
            filterTable(table, e.target.value);
        });
    });
}

function filterTable(table, query) {
    const tbody = table.querySelector('tbody');
    if (!tbody) return;

    const rows = tbody.querySelectorAll('tr');
    const lowerQuery = query.toLowerCase();

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(lowerQuery)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Collapsible sections
function setupCollapsibleSections() {
    const sections = document.querySelectorAll('.collapsible-section');
    
    sections.forEach(section => {
        const header = section.querySelector('.section-header');
        const content = section.querySelector('.section-content');
        
        if (!header || !content) return;

        header.style.cursor = 'pointer';
        header.addEventListener('click', () => {
            section.classList.toggle('collapsed');
            
            if (section.classList.contains('collapsed')) {
                content.style.display = 'none';
            } else {
                content.style.display = 'block';
            }
        });
    });
}

// Smooth scroll for anchor links
function setupSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                const offset = 80;
                const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
                const offsetPosition = elementPosition - offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Utility: Copy to clipboard
function copyToClipboard(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Copied to clipboard!');
        });
    } else {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        showToast('Copied to clipboard!');
    }
}

// Utility: Show toast notification
function showToast(message, duration = 2000) {
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('show');
    }, 10);

    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, duration);
}
