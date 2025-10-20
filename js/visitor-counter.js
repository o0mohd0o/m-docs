// Visitor Counter System
// Server-side visitor tracking using PHP API
(function() {
    'use strict';

    const API_URL = 'api/visitor-counter.php';

    // Get current page identifier
    function getPageId() {
        const pathname = window.location.pathname;
        const page = pathname.split('/').pop() || 'index';
        return page.replace(/\.(html|php)$/i, '');
    }

    // Format number with commas
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    // Record visit and get counts from server
    async function recordVisit() {
        const pageId = getPageId();
        
        try {
            const response = await fetch(`${API_URL}?action=record&page=${encodeURIComponent(pageId)}`);
            const data = await response.json();
            
            if (data.success) {
                updateDisplay(data.page_visits, data.total_visits);
            } else {
                console.error('Failed to record visit:', data.error);
                // Fallback to showing zeros
                updateDisplay(0, 0);
            }
        } catch (error) {
            console.error('Error recording visit:', error);
            // Fallback to showing zeros
            updateDisplay(0, 0);
        }
    }

    // Get visit counts from server without recording
    async function getVisitCounts() {
        const pageId = getPageId();
        
        try {
            const response = await fetch(`${API_URL}?action=get&page=${encodeURIComponent(pageId)}`);
            const data = await response.json();
            
            if (data.success) {
                return {
                    page: data.page_visits,
                    total: data.total_visits
                };
            }
        } catch (error) {
            console.error('Error getting visit counts:', error);
        }
        
        return { page: 0, total: 0 };
    }

    // Update display elements
    function updateDisplay(pageVisits, totalVisits) {
        const pageCountElement = document.getElementById('page-visit-count');
        const totalCountElement = document.getElementById('total-visit-count');

        if (pageCountElement) {
            pageCountElement.textContent = formatNumber(pageVisits);
            pageCountElement.classList.add('count-updated');
        }

        if (totalCountElement) {
            totalCountElement.textContent = formatNumber(totalVisits);
            totalCountElement.classList.add('count-updated');
        }

        // Animate the counter
        setTimeout(() => {
            if (pageCountElement) pageCountElement.classList.remove('count-updated');
            if (totalCountElement) totalCountElement.classList.remove('count-updated');
        }, 300);
    }

    // Initialize counter on page load
    function initVisitorCounter() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', recordVisit);
        } else {
            recordVisit();
        }
    }

    // Export functions for external use
    window.VisitorCounter = {
        getPageVisits: async function() {
            const counts = await getVisitCounts();
            return counts.page;
        },
        getTotalVisits: async function() {
            const counts = await getVisitCounts();
            return counts.total;
        },
        refresh: async function() {
            const counts = await getVisitCounts();
            updateDisplay(counts.page, counts.total);
        }
    };

    // Initialize
    initVisitorCounter();
})();
