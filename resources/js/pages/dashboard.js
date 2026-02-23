/**
 * Page-specific JavaScript for Dashboard
 * Scripts di sini hanya akan dimuat di halaman dashboard
 */

$(document).ready(function() {
    'use strict';
    
    console.log('Dashboard page JavaScript loaded');
    
    // Initialize dashboard features
    initDashboardStats();
    initRecentBooksTable();
    initQuickActions();
});

/**
 * Animate statistics cards on load
 */
function initDashboardStats() {
    $('.stats-card').each(function(index) {
        const $card = $(this);
        $card.css('opacity', '0');
        $card.animate(
            { opacity: 1 },
            500,
            'swing',
            function() {
                // Animation complete
            }
        );
    });
}

/**
 * Initialize recent books table functionality
 */
function initRecentBooksTable() {
    $('.table tbody tr').hover(
        function() {
            $(this).addClass('table-active');
        },
        function() {
            $(this).removeClass('table-active');
        }
    );
}

/**
 * Initialize quick action buttons
 */
function initQuickActions() {
    // Add book button
    $('#addBookBtn').on('click', function() {
        showModal('Tambah Buku Baru');
    });
    
    // Add category button
    $('#addCategoryBtn').on('click', function() {
        showModal('Tambah Kategori Baru');
    });
}

/**
 * Show modal with title
 */
function showModal(title) {
    console.log('Opening modal: ' + title);
    // Modal implementation would go here
}

// Export functions for global use
window.Dashboard = {
    refreshData: function() {
        console.log('Refreshing dashboard data...');
        // Implement data refresh logic
    },
    exportPDF: function() {
        console.log('Exporting to PDF...');
        // Implement PDF export logic
    }
};
