# Navigation Structure

## Overview

The documentation now has **two separate navigation systems** for different content sections.

## Navigation Files

### 1. Database Documentation Navigation
**File:** `includes/nav-database.html`

**Used by:**
- sales.html
- catalog.html
- customer.html
- eav.html
- inventory.html
- cms.html

**Menu Items:**
- 🏠 Home
- 📖 Database Overview
- 🛒 Sales & Orders
- 📦 Catalog
- 👤 Customer
- 🔗 EAV
- 📋 Inventory
- 📝 CMS & Content

### 2. Certification Navigation
**File:** `includes/nav-certification.html`

**Used by:**
- cert-overview.html
- cert-architecture.html
- cert-customization.html
- cert-database.html
- cert-ui.html
- cert-practice.html

**Menu Items:**
- 🏠 Home
- 🎓 AD0-E717 Overview
- 🏗️ Architecture
- ⚙️ Customization
- 💾 Database & Models
- 🎨 UI Development
- ✅ Practice Questions

## How It Works

### Automatic Detection
The `js/nav-loader.js` script automatically detects which navigation to load:

```javascript
// Pages starting with 'cert-' → Load certification nav
if (currentPage.startsWith('cert-')) {
    navFile = 'includes/nav-certification.html';
}
// All other pages → Load database nav
else {
    navFile = 'includes/nav-database.html';
}
```

### Manual Override
You can manually specify which navigation to use:

```html
<!-- Force database navigation -->
<div id="nav-placeholder" data-nav-type="database"></div>

<!-- Force certification navigation -->
<div id="nav-placeholder" data-nav-type="certification"></div>
```

## Standalone Pages

Some pages don't use sidebar navigation:

- **index.html** - Modern card-based homepage (no sidebar)
- **database-overview.html** - Standalone overview with header nav (no sidebar)

## Implementation

All pages using sidebar navigation have:

1. **Font Awesome CDN** in `<head>`:
```html
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
```

2. **Navigation placeholder** in HTML:
```html
<div id="nav-placeholder"></div>
```

3. **Nav loader script** before `</body>`:
```html
<script src="js/nav-loader.js"></script>
<script src="js/common.js"></script>
```

## Benefits

✅ **Separation of Concerns** - Database docs don't show certification links, and vice versa
✅ **Cleaner Navigation** - Each section has focused, relevant links only
✅ **Easy Maintenance** - Update one file to change all pages in that section
✅ **Automatic Detection** - No manual configuration needed per page
✅ **Consistent Styling** - All navigation uses Font Awesome icons and modern design

## Adding New Pages

### For Database Documentation:
1. Create page (e.g., `newmodule.html`)
2. Add nav-placeholder: `<div id="nav-placeholder"></div>`
3. Include scripts: `nav-loader.js` and `common.js`
4. Add menu item to `includes/nav-database.html`

### For Certification Content:
1. Create page starting with `cert-` prefix (e.g., `cert-newpage.html`)
2. Add nav-placeholder: `<div id="nav-placeholder"></div>`
3. Include scripts: `nav-loader.js` and `common.js`
4. Add menu item to `includes/nav-certification.html`

The nav-loader will automatically detect and load the correct navigation!
