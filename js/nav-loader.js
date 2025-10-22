// Navigation loader - loads shared navigation and sets active state
(function() {
    // Load navigation on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadNavigation();
    });

    function loadNavigation() {
        const navPlaceholder = document.getElementById('nav-placeholder');
        if (!navPlaceholder) return;

        // Determine which navigation to load based on data attribute or current page
        const navType = navPlaceholder.getAttribute('data-nav-type') || 'database';
        const currentPage = window.location.pathname.split('/').pop();
        
        // Auto-detect navigation type based on page name
        let navFile = 'includes/nav-database.php';
        if (currentPage.startsWith('cloud-')) {
            navFile = 'includes/nav-cloud.php';
        } else if (currentPage.startsWith('cert-')) {
            navFile = 'includes/nav-certification.php';
        } else if (navType === 'cloud') {
            navFile = 'includes/nav-cloud.php';
        } else if (navType === 'certification') {
            navFile = 'includes/nav-certification.php';
        }

        fetch(navFile)
            .then(response => response.text())
            .then(html => {
                navPlaceholder.innerHTML = html;
                setActiveNavItem();
                initializeNavigation();
            })
            .catch(error => {
                console.error('Error loading navigation:', error);
            });
    }

    function setActiveNavItem() {
        // Get current page filename (support .html and .php)
        const currentPage = (window.location.pathname.split('/').pop() || '')
            .replace(/\.(html|php)$/i, '') || 'index';
        
        // Find and activate the matching nav link
        const navLinks = document.querySelectorAll('.sidebar .nav-link');
        let activeLink = null;
        
        navLinks.forEach(link => {
            const linkPage = link.getAttribute('data-page');
            if (linkPage === currentPage) {
                link.classList.add('active');
                activeLink = link;
            } else {
                link.classList.remove('active');
            }
        });
        
        // Scroll the active link into view
        if (activeLink) {
            // Use setTimeout to ensure DOM is fully rendered
            setTimeout(() => {
                activeLink.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 100);
        }
    }

    function initializeNavigation() {
        // Mobile menu functionality
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
    }
})();
