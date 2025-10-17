# M-Docs - Magento 2 Documentation & Certification Guide

A comprehensive documentation site for Magento 2 database structure and Adobe Commerce Developer Professional (AD0-E717) certification preparation.

## Features

### ✨ Recent Updates

- **Font Awesome Icons** - Professional icons throughout the navigation
- **Shared Navigation** - Centralized navigation component loaded dynamically
- **Search Functionality** - Real-time search across all documentation
- **Responsive Design** - Mobile-first approach with collapsible sidebar
- **Two Main Sections**:
  - Database Documentation (Sales, Catalog, Customer, EAV, Inventory, CMS)
  - Adobe Certification Study Guide (AD0-E717)

## Project Structure

```
m-docs.bonlineco.com/
├── index.html                      # Database documentation overview
├── includes/
│   └── nav.html                    # Shared navigation component
├── js/
│   ├── nav-loader.js              # Loads shared navigation
│   ├── common.js                  # Common utilities (back-to-top, etc.)
│   └── search.js                  # Search functionality
├── css/
│   └── common.css                 # Shared styles
├── Database Pages:
│   ├── sales.html
│   ├── catalog.html
│   ├── customer.html
│   ├── eav.html
│   ├── inventory.html
│   └── cms.html
└── Certification Pages:
    ├── cert-overview.html         # Exam overview
    ├── cert-architecture.html     # Architecture topics
    ├── cert-customization.html    # Customization techniques
    ├── cert-database.html         # Database & models
    ├── cert-ui.html              # UI development
    └── cert-practice.html        # Practice questions
```

## How It Works

### Shared Navigation

Navigation is loaded dynamically using the nav-loader.js script:

1. **includes/nav.html** - Contains the complete navigation HTML with Font Awesome icons
2. **js/nav-loader.js** - Fetches and injects navigation, sets active state based on current page
3. **All pages** - Have `<div id="nav-placeholder"></div>` where navigation loads

### Adding Navigation to New Pages

To add the shared navigation to any page:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="css/common.css" rel="stylesheet">
    <!-- Your custom styles -->
</head>
<body>
    <!-- Mobile menu toggle -->
    <button class="mobile-menu-toggle d-md-none" id="mobileMenuToggle">
        <span></span><span></span><span></span>
    </button>
    
    <!-- Sidebar overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Navigation (Loaded Dynamically) -->
            <div id="nav-placeholder"></div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <!-- Your page content here -->
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/nav-loader.js"></script>
    <script src="js/common.js"></script>
    <script src="js/search.js"></script>
</body>
</html>
```

### Adding a New Navigation Item

Edit `includes/nav.html` and add your link with a Font Awesome icon:

```html
<li class="nav-item">
    <a class="nav-link" href="your-page.html" data-page="your-page">
        <i class="fas fa-icon-name"></i> Your Page Title
    </a>
</li>
```

The `data-page` attribute should match your filename without `.html`.

## Technologies Used

- **Bootstrap 5.3** - Responsive framework
- **Font Awesome 6.4** - Icon library
- **Vanilla JavaScript** - No framework dependencies
- **CSS3** - Modern styling with transitions

## Features in Detail

### Search Functionality
- Real-time search across headings, tables, and paragraphs
- Highlight search terms in results
- Smooth scroll to results
- Keyboard accessible

### Mobile Responsive
- Collapsible sidebar on mobile devices
- Hamburger menu toggle
- Touch-friendly navigation
- Optimized for all screen sizes

### Dynamic Features
- Back-to-top button (appears after scrolling)
- Table filtering
- Collapsible sections
- Smooth scrolling for anchor links
- Toast notifications

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Future Enhancements

- [ ] Complete remaining certification pages (cert-ui.html, cert-practice.html)
- [ ] Add more practice questions
- [ ] Include code examples playground
- [ ] Add PDF export functionality
- [ ] Implement dark mode
- [ ] Add progress tracking for certification study
- [ ] Include video tutorials

## License

Internal use only - Bonlineco

## Contact

For questions or contributions, contact the development team.
