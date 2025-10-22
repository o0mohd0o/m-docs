<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pageTitle = 'Magento AD0-E717 Certification Guide | Adobe Commerce Developer Professional Study Resources';
$pageType = 'lesson';
$seo = [
    'title' => 'Magento AD0-E717 Certification Guide | Adobe Commerce Developer Professional',
    'description' => 'Complete Adobe Commerce Developer Professional (AD0-E717) certification study guide with comprehensive lessons, practice quizzes, and exam preparation resources. Master Magento 2 development for certification success.',
    'keywords' => 'AD0-E717, Magento Certification, Adobe Commerce Certification, Magento Developer Certification, Adobe Commerce Developer Professional, Magento 2 Certification Exam, Magento Study Guide',
    'type' => 'website',
    'course' => true,
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/index.php'],
        ['name' => 'Certification Overview', 'url' => '/cert-overview.php']
    ]
];
include 'includes/head.php';
?>
    <style>
        :root {
            --primary: #0d6efd;
            --secondary: #6c757d;
            --success: #198754;
            --info: #0dcaf0;
            --warning: #ffc107;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f8f9fa;
        }

        /* Header */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
            font-size: 0.95rem;
        }

        .breadcrumb-nav a {
            color: var(--primary);
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb-nav a:hover {
            color: var(--info);
        }

        .header-actions {
            display: flex;
            gap: 15px;
        }

        .btn-header {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary-header {
            background: var(--primary);
            color: white;
        }

        .btn-primary-header:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        .btn-outline-header {
            border: 2px solid #e0e0e0;
            color: #666;
        }

        .btn-outline-header:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Hero */
        .hero {
            background: linear-gradient(135deg, #ffc107 0%, #ff6b6b 100%);
            color: white;
            padding: 60px 30px;
        }

        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.25rem;
            opacity: 0.95;
            max-width: 700px;
        }

        .certification-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 30px;
            margin-top: 20px;
            backdrop-filter: blur(10px);
        }

        /* Main Content */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 50px 30px;
        }

        .content-section {
            background: white;
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-title i {
            color: var(--warning);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin: 30px 0;
        }

        .info-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 12px;
            padding: 25px;
            border-left: 4px solid var(--warning);
        }

        .info-card h5 {
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-card ul {
            margin: 0;
            padding-left: 20px;
        }

        .info-card li {
            margin-bottom: 8px;
            color: #666;
        }

        .topic-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .topic-card {
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 30px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .topic-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--topic-color), transparent);
        }

        .topic-card:hover {
            border-color: var(--topic-color);
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .topic-card h4 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .topic-percentage {
            display: inline-block;
            background: var(--topic-color);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .topic-links {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .topic-link {
            flex: 1;
            padding: 10px;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .topic-link-primary {
            background: var(--topic-color);
            color: white;
        }

        .topic-link-primary:hover {
            opacity: 0.9;
        }

        .topic-link-secondary {
            border: 2px solid #e0e0e0;
            color: #666;
        }

        .topic-link-secondary:hover {
            border-color: var(--topic-color);
            color: var(--topic-color);
        }

        /* Study Path Table */
        .study-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 25px 0;
        }

        .study-table thead {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .study-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #444;
            font-size: 0.95rem;
        }

        .study-table td {
            padding: 15px;
            border-top: 1px solid #f0f0f0;
            color: #666;
        }

        .study-table tr:hover {
            background: #f8f9fa;
        }

        .phase-badge {
            display: inline-block;
            width: 30px;
            height: 30px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .info-grid, .topic-grid {
                grid-template-columns: 1fr;
            }

            .content-section {
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="breadcrumb-nav">
                <a href="index.php"><i class="fas fa-home"></i> Home</a>
                <span>/</span>
                <span>Certification Guide</span>
            </div>
            <div class="header-actions">
                <a href="cert-practice.php" class="btn-header btn-outline-header">
                    <i class="fas fa-check-circle"></i>
                    Practice Questions
                </a>
                <a href="index.php" class="btn-header btn-primary-header">
                    <i class="fas fa-database"></i>
                    Database Docs
                </a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-content">
            <h1><i class="fas fa-graduation-cap"></i> Adobe Commerce Developer Professional</h1>
            <p>Complete study guide for AD0-E717 certification exam with comprehensive coverage of all topics</p>
            <div class="certification-badge">
                <i class="fas fa-certificate"></i>
                <span>Professional Level Certification</span>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Exam Overview -->
        <div class="content-section">
            <h2 class="section-title">
                <i class="fas fa-info-circle"></i>
                Exam Overview
            </h2>
            
            <div class="info-grid">
                <div class="info-card">
                    <h5><i class="fas fa-clipboard-list"></i> Exam Details</h5>
                    <ul>
                        <li><strong>Format:</strong> Multiple choice</li>
                        <li><strong>Questions:</strong> 50</li>
                        <li><strong>Duration:</strong> 100 minutes</li>
                        <li><strong>Passing score:</strong> 68%</li>
                        <li><strong>Language:</strong> English</li>
                    </ul>
                </div>

                <div class="info-card">
                    <h5><i class="fas fa-check-square"></i> Prerequisites</h5>
                    <ul>
                        <li>1-3 years of Adobe Commerce experience</li>
                        <li>Strong PHP knowledge</li>
                        <li>Understanding of MVC architecture</li>
                        <li>Experience with MySQL</li>
                        <li>Familiarity with JavaScript and CSS</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Exam Topics -->
        <div class="content-section">
            <h2 class="section-title">
                <i class="fas fa-book-open"></i>
                Exam Topics & Weights
            </h2>
            
            <div class="alert alert-info mb-4">
                <i class="fas fa-info-circle"></i> <strong>Note:</strong> The following percentages represent the approximate weight of each domain on the AD0-E717 exam.
            </div>
            
            <div class="topic-grid">
                <div class="topic-card" style="--topic-color: #0d6efd;">
                    <span class="topic-percentage">29%</span>
                    <h4>Section 2: Architecture</h4>
                    <p style="color: #666;">File structure, CLI commands, DI, controllers, module structure, indexes, localization, plugins, preferences, observers, caching.</p>
                    <div class="topic-links">
                        <a href="cert-topic-1-01.php" class="topic-link topic-link-primary">Study Architecture</a>
                        <a href="cert-topic-1-04.php" class="topic-link topic-link-secondary">Customization</a>
                    </div>
                </div>

                <div class="topic-card" style="--topic-color: #0dcaf0;">
                    <span class="topic-percentage">15%</span>
                    <h4>Section 4: Layout/UI</h4>
                    <p style="color: #666;">Product types, catalog entities, indexes, price output, multi-source inventory.</p>
                    <div class="topic-links">
                        <a href="cert-topic-4-01.php" class="topic-link topic-link-primary">Study UI</a>
                    </div>
                </div>

                <div class="topic-card" style="--topic-color: #198754;">
                    <span class="topic-percentage">13%</span>
                    <h4>Section 3: EAV/Database</h4>
                    <p style="color: #666;">Attribute sets/attributes, DB schema, models, resource models, collections, EAV basics.</p>
                    <div class="topic-links">
                        <a href="cert-topic-3-01.php" class="topic-link topic-link-primary">Study EAV</a>
                        <a href="database-overview.php" class="topic-link topic-link-secondary">DB Docs</a>
                    </div>
                </div>

                <div class="topic-card" style="--topic-color: #dc3545;">
                    <span class="topic-percentage">12%</span>
                    <h4>Section 7: Cloud Architecture</h4>
                    <p style="color: #666;">Cloud workflow, project files, services, logs, patches, ECE tools, support tickets.</p>
                    <div class="topic-links">
                        <a href="cloud-overview.php" class="topic-link topic-link-primary">Cloud Guide</a>
                        <a href="cloud-practice.php" class="topic-link topic-link-secondary">Practice</a>
                    </div>
                </div>

                <div class="topic-card" style="--topic-color: #6f42c1;">
                    <span class="topic-percentage">8%</span>
                    <h4>Section 5: Checkout & Sales</h4>
                    <p style="color: #666;">Cart components, promo rules, checkout modifications, quote data, payment/shipping, tax.</p>
                    <div class="topic-links">
                        <a href="cert-topic-5-01.php" class="topic-link topic-link-primary">Study Checkout</a>
                    </div>
                </div>

                <div class="topic-card" style="--topic-color: #20c997;">
                    <span class="topic-percentage">8%</span>
                    <h4>Section 6: Catalog</h4>
                    <p style="color: #666;">Category/product management, product types, price rules, price types.</p>
                    <div class="topic-links">
                        <a href="cert-topic-6-01.php" class="topic-link topic-link-primary">Study Catalog</a>
                    </div>
                </div>

                <div class="topic-card" style="--topic-color: #fd7e14;">
                    <span class="topic-percentage">6%</span>
                    <h4>Section 9: Cloud CLI Tool</h4>
                    <p style="color: #666;">CLI exclusive features, email activation, rebase, snapshots, db dump, branching, cloud services connection.</p>
                    <div class="topic-links">
                        <a href="cloud-overview.php" class="topic-link topic-link-primary">Cloud CLI</a>
                    </div>
                </div>

                <div class="topic-card" style="--topic-color: #6610f2;">
                    <span class="topic-percentage">5%</span>
                    <h4>Section 1: Working with Admin</h4>
                    <p style="color: #666;">ACL roles/resources, admin grid/form, store/admin config, menu items.</p>
                    <div class="topic-links">
                        <a href="cert-topic-1-02.php" class="topic-link topic-link-primary">Admin Dev</a>
                    </div>
                </div>

                <div class="topic-card" style="--topic-color: #d63384;">
                    <span class="topic-percentage">4%</span>
                    <h4>Section 8: Cloud Setup/Config</h4>
                    <p style="color: #666;">Cloud setup, troubleshooting, user management, environment management UI, plan capabilities.</p>
                    <div class="topic-links">
                        <a href="cloud-overview.php" class="topic-link topic-link-primary">Cloud Setup</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Study Path -->
        <div class="content-section">
            <h2 class="section-title">
                <i class="fas fa-route"></i>
                Recommended Study Path
            </h2>
            
            <table class="study-table">
                <thead>
                    <tr>
                        <th>Phase</th>
                        <th>Topic</th>
                        <th>Exam Weight</th>
                        <th>Resources</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="phase-badge">1</span></td>
                        <td>Architecture & Customization</td>
                        <td><strong>29%</strong></td>
                        <td><a href="cert-topic-1-01.php">Architecture Guide</a></td>
                        <td>2-3 weeks</td>
                    </tr>
                    <tr>
                        <td><span class="phase-badge">2</span></td>
                        <td>Layout/UI Development</td>
                        <td><strong>15%</strong></td>
                        <td><a href="cert-topic-4-01.php">UI Guide</a></td>
                        <td>1-2 weeks</td>
                    </tr>
                    <tr>
                        <td><span class="phase-badge">3</span></td>
                        <td>EAV/Database</td>
                        <td><strong>13%</strong></td>
                        <td><a href="database-overview.php">Database Guide</a></td>
                        <td>1 week</td>
                    </tr>
                    <tr>
                        <td><span class="phase-badge">4</span></td>
                        <td>Cloud Architecture (Section 7)</td>
                        <td><strong>12%</strong></td>
                        <td><a href="cloud-overview.php">Cloud Architecture</a></td>
                        <td>1 week</td>
                    </tr>
                    <tr>
                        <td><span class="phase-badge">5</span></td>
                        <td>Checkout & Sales</td>
                        <td><strong>8%</strong></td>
                        <td><a href="cert-topic-5-01.php">Checkout Guide</a></td>
                        <td>3-5 days</td>
                    </tr>
                    <tr>
                        <td><span class="phase-badge">6</span></td>
                        <td>Catalog Management</td>
                        <td><strong>8%</strong></td>
                        <td><a href="cert-topic-6-01.php">Catalog Guide</a></td>
                        <td>3-5 days</td>
                    </tr>
                    <tr>
                        <td><span class="phase-badge">7</span></td>
                        <td>Cloud CLI Tool (Section 9)</td>
                        <td><strong>6%</strong></td>
                        <td><a href="cloud-overview.php">Cloud CLI</a></td>
                        <td>2-3 days</td>
                    </tr>
                    <tr>
                        <td><span class="phase-badge">8</span></td>
                        <td>Working with Admin (Section 1)</td>
                        <td><strong>5%</strong></td>
                        <td><a href="cert-topic-1-02.php">Admin Dev</a></td>
                        <td>2-3 days</td>
                    </tr>
                    <tr>
                        <td><span class="phase-badge">9</span></td>
                        <td>Cloud Setup/Config (Section 8)</td>
                        <td><strong>4%</strong></td>
                        <td><a href="cloud-overview.php">Cloud Setup</a></td>
                        <td>1-2 days</td>
                    </tr>
                    <tr style="background: #f8f9fa;">
                        <td><span class="phase-badge">10</span></td>
                        <td><strong>Practice & Review</strong></td>
                        <td>-</td>
                        <td><a href="cert-practice.php">Practice Questions</a></td>
                        <td>1-2 weeks</td>
                    </tr>
                </tbody>
            </table>
            <div class="alert alert-success mt-3">
                <strong><i class="fas fa-clock"></i> Total Study Time:</strong> Approximately 8-12 weeks for comprehensive preparation. Adjust based on your current experience level.
            </div>
        </div>

        <!-- Exam Tips -->
        <div class="content-section">
            <h2 class="section-title">
                <i class="fas fa-lightbulb"></i>
                Exam Tips & Best Practices
            </h2>
            <div class="info-grid">
                <div class="info-card" style="border-left-color: #0d6efd;">
                    <h5><i class="fas fa-brain"></i> Study Approach</h5>
                    <ul>
                        <li>Focus on understanding concepts, not memorization</li>
                        <li>Practice coding with local Magento installation</li>
                        <li>Review official exam guide thoroughly</li>
                    </ul>
                </div>
                <div class="info-card" style="border-left-color: #198754;">
                    <h5><i class="fas fa-code"></i> Hands-On Practice</h5>
                    <ul>
                        <li>Build custom modules from scratch</li>
                        <li>Work with database structure directly</li>
                        <li>Implement various customization techniques</li>
                    </ul>
                </div>
                <div class="info-card" style="border-left-color: #ffc107;">
                    <h5><i class="fas fa-tasks"></i> Exam Day</h5>
                    <ul>
                        <li>Read questions carefully</li>
                        <li>Manage your time wisely</li>
                        <li>Review flagged questions before submitting</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/author-footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/visitor-counter.js"></script>
</body>
</html>
