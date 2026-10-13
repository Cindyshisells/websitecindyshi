<?php
/**
 * Header Include
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/data.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo htmlspecialchars(SITE_NAME); ?></title>
    <meta name="description" content="Cindy Shi is an independent luxury realtor with 10+ years of premier experience across Toronto and the Greater Toronto Area (GTA). Explore exclusive estates and personalized bespoke real estate advisory.">
    <meta name="keywords" content="Cindy Shi, Toronto Realtor, GTA Real Estate, Barry Cohen style, Toronto Luxury Mansions, Bridle Path, Yorkville Penthouses, Oakville Waterfront">
    
    <!-- Open Graph / Meta -->
    <meta property="og:title" content="Cindy Shi | Toronto & GTA Luxury Real Estate">
    <meta property="og:description" content="Over a decade of elite real estate guidance across the Greater Toronto Area. Discover your dream property.">
    <meta property="og:image" content="images/hero-mansion.jpg">
    <meta property="og:type" content="website">

    <!-- Google Fonts: Cormorant Garamond (Editorial Luxury Serif) + Montserrat & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons for clean UI accents -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Top Announcement Bar -->
    <div class="top-bar">
        <div class="container top-bar-content">
            <div class="top-bar-left">
                <span><i class="fa-solid fa-location-dot"></i> Toronto & All Greater Toronto Area (GTA)</span>
                <span class="divider">|</span>
                <span><i class="fa-solid fa-award"></i> 10+ Years Independent Luxury Advisory</span>
            </div>
            <div class="top-bar-right">
                <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><i class="fa-regular fa-envelope"></i> <?php echo htmlspecialchars(CONTACT_EMAIL); ?></a>
                <span class="divider">|</span>
                <a href="tel:6475542070"><i class="fa-solid fa-phone"></i> <?php echo htmlspecialchars(CONTACT_PHONE); ?></a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="site-header" id="siteHeader">
        <div class="container header-container">
            <a href="index.php" class="brand-logo">
                <span class="logo-name">CINDY SHI</span>
                <span class="logo-sub">TORONTO & GTA REAL ESTATE</span>
            </a>

            <nav class="nav-menu" id="navMenu">
                <ul class="nav-list">
                    <li><a href="#featured" class="nav-link">Curated Portfolio</a></li>
                    <li><a href="#matchmaker" class="nav-link nav-highlight"><i class="fa-solid fa-sparkles"></i> Property Matchmaker</a></li>
                    <li><a href="#neighborhoods" class="nav-link">GTA Regions</a></li>
                    <li><a href="#about" class="nav-link">About Cindy</a></li>
                    <li><a href="#calculator" class="nav-link">Investment Tool</a></li>
                    <li><a href="#contact" class="nav-link">Private Consultation</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <a href="#matchmaker" class="btn-primary-gold btn-sm"><i class="fa-solid fa-compass"></i> Find Match</a>
                <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
