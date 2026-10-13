<?php
/**
 * Cindy Shi - Real Estate Specialist (Toronto & Entire GTA)
 * Main Landing Page (PHP / HTML5 / Modern JS)
 * High-end design inspired by Barry Cohen Homes, with natural human copywriting
 */

require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section" id="hero">
    <div class="hero-background">
        <img src="images/hero-mansion.jpg" alt="Toronto and GTA Real Estate with Cindy Shi">
    </div>
    <div class="hero-overlay"></div>
    
    <div class="container hero-content">
        <div class="hero-badge">
            <i class="fa-solid fa-star"></i> 10+ Years Dedicated Experience | Toronto and All GTA
        </div>
        <h1 class="hero-title">
            Your Trusted Guide Across<br>
            <em>Toronto and the Greater Toronto Area</em>
        </h1>
        <p class="hero-description">
            Whether you are buying your first condo, moving into a detached family home, finding an executive rental, or selling a property, Cindy Shi delivers clear advice, skilled negotiation, and genuine care across every part of the GTA.
        </p>

        <div class="hero-actions">
            <a href="#matchmaker" class="btn-primary-gold">
                <i class="fa-solid fa-wand-magic-sparkles"></i> 60-Sec Property Matchmaker
            </a>
            <a href="#featured" class="btn-secondary-outline">
                <i class="fa-solid fa-house-chimney"></i> Browse Available Properties
            </a>
            <a href="#contact" class="btn-secondary-outline">
                <i class="fa-solid fa-envelope"></i> Message Cindy
            </a>
        </div>

        <!-- Quick Filter / Search Ribbon -->
        <div class="hero-quick-search">
            <div class="search-bar-grid">
                <div class="search-field">
                    <label for="searchPurpose"><i class="fa-solid fa-crosshairs"></i> I Am Looking To</label>
                    <div class="search-select-wrapper">
                        <i class="fa-solid fa-key select-icon"></i>
                        <select id="searchPurpose">
                            <option value="buy">Buy a Home / Condo</option>
                            <option value="rent">Rent / Find a Lease</option>
                            <option value="sell">Sell My Property</option>
                            <option value="invest">Real Estate Investment</option>
                        </select>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </div>
                </div>

                <div class="search-field">
                    <label for="searchRegion"><i class="fa-solid fa-location-dot"></i> GTA Region</label>
                    <div class="search-select-wrapper">
                        <i class="fa-solid fa-map-pin select-icon"></i>
                        <select id="searchRegion">
                            <option value="all">All Greater Toronto Area</option>
                            <option value="downtown">Downtown Toronto and Midtown</option>
                            <option value="york">Markham and Richmond Hill (York)</option>
                            <option value="peel">Mississauga and Brampton (Peel)</option>
                            <option value="halton">Oakville and Burlington (Halton)</option>
                            <option value="durham">Pickering and Ajax (Durham)</option>
                        </select>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </div>
                </div>

                <div class="search-field">
                    <label for="searchType"><i class="fa-solid fa-building-circle-check"></i> Property Type</label>
                    <div class="search-select-wrapper">
                        <i class="fa-solid fa-house-chimney-window select-icon"></i>
                        <select id="searchType">
                            <option value="all">Any Property Type</option>
                            <option value="condo">Condo / Apartment</option>
                            <option value="townhouse">Townhouse / Semi-Detached</option>
                            <option value="family">Detached Family Home</option>
                            <option value="luxury">Luxury Estate and Penthouse</option>
                        </select>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </div>
                </div>

                <div class="search-btn-container">
                    <a href="#matchmaker" class="btn-primary-gold" style="width: 100%; white-space: nowrap;">
                        <i class="fa-solid fa-sliders"></i> Find Matches
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Ribbon -->
<section class="stats-ribbon">
    <div class="container stats-grid">
        <?php foreach ($stats as $stat): ?>
        <div class="stat-item">
            <div class="stat-num"><?php echo htmlspecialchars($stat['number']); ?></div>
            <div class="stat-lbl"><?php echo htmlspecialchars($stat['label']); ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Curated Portfolio (Featured Listings across budgets) -->
<section class="featured-section" id="featured">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Featured GTA Listings</span>
            <h2 class="section-title">Properties Across The GTA</h2>
            <p class="section-subtitle">
                From accessible downtown condominiums and family residences to executive rentals and signature homes, explore current opportunities.
            </p>
            <div class="gold-divider"></div>
        </div>

        <!-- Filter tabs -->
        <div class="portfolio-filter-tabs">
            <button class="filter-btn active" data-filter="all">All Properties</button>
            <button class="filter-btn" data-filter="condo">Condos and Apartments</button>
            <button class="filter-btn" data-filter="family">Family Homes</button>
            <button class="filter-btn" data-filter="rental">For Rent / Lease</button>
            <button class="filter-btn" data-filter="luxury">Luxury and Estates</button>
        </div>

        <div class="listings-grid">
            <?php foreach ($featured_listings as $listing): ?>
            <article class="property-card" data-category="<?php echo $listing['category']; ?>" id="<?php echo $listing['id']; ?>">
                <div class="property-media">
                    <img src="<?php echo htmlspecialchars($listing['image']); ?>" alt="<?php echo htmlspecialchars($listing['title']); ?>" loading="lazy">
                    <span class="property-badge"><?php echo htmlspecialchars($listing['tag']); ?></span>
                    <span class="property-price"><?php echo htmlspecialchars($listing['price']); ?></span>
                </div>
                <div class="property-details">
                    <span class="property-location"><i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars($listing['location']); ?></span>
                    <h3 class="property-title"><?php echo htmlspecialchars($listing['title']); ?></h3>
                    <p class="property-desc"><?php echo htmlspecialchars($listing['description']); ?></p>

                    <div class="property-specs">
                        <span><i class="fa-solid fa-bed"></i> <?php echo $listing['beds']; ?> Beds</span>
                        <span><i class="fa-solid fa-bath"></i> <?php echo $listing['baths']; ?> Baths</span>
                        <span><i class="fa-solid fa-ruler-combined"></i> <?php echo $listing['sqft']; ?></span>
                    </div>

                    <div class="property-card-actions">
                        <button class="btn-primary-gold btn-sm view-property-trigger">
                            <i class="fa-solid fa-eye"></i> View Details
                        </button>
                        <a href="mailto:<?php echo CONTACT_EMAIL; ?>?subject=Inquiry for <?php echo urlencode($listing['title']); ?>" class="btn-secondary-outline btn-sm">
                            <i class="fa-regular fa-envelope"></i> Inquire
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- GAMIFIED PROPERTY MATCHMAKER SECTION -->
<section class="matchmaker-section" id="matchmaker">
    <div class="container">
        <div class="matchmaker-wrapper">
            <div class="matchmaker-header">
                <span class="section-tag"><i class="fa-solid fa-sparkles"></i> Quick Matchmaker</span>
                <h3>Find Your Next Property in Under 60 Seconds</h3>
                <p>Looking to buy, rent, or sell? Tell us what you need in 4 quick taps, and Cindy Shi will send you tailored options matching your exact criteria.</p>
            </div>

            <!-- Gamified Progress Bar -->
            <div class="gamified-progress">
                <div class="progress-line-fill" id="progressLineFill"></div>
                <div class="step-indicator active" data-step="1">
                    <div class="step-circle">1</div>
                    <span class="step-label">Goal</span>
                </div>
                <div class="step-indicator" data-step="2">
                    <div class="step-circle">2</div>
                    <span class="step-label">Property and Area</span>
                </div>
                <div class="step-indicator" data-step="3">
                    <div class="step-circle">3</div>
                    <span class="step-label">Budget</span>
                </div>
                <div class="step-indicator" data-step="4">
                    <div class="step-circle">4</div>
                    <span class="step-label">Your Matches</span>
                </div>
            </div>

            <!-- Form Container -->
            <form id="quizForm">
                <div id="quizStepsContainer">
                    <!-- Step 1: Goal/Objective -->
                    <div class="quiz-step-pane active" data-step="1">
                        <h4 class="step-question-title">What are you looking to do?</h4>
                        <p class="step-question-sub">Select your primary goal:</p>
                        
                        <div class="choice-cards-grid">
                            <div class="choice-card" data-intent="Buy a Home or Condo">
                                <i class="fa-solid fa-house-chimney choice-icon"></i>
                                <span class="choice-title">Buy / Purchase</span>
                                <span class="choice-subtitle">Looking for a home or condo</span>
                            </div>
                            <div class="choice-card" data-intent="Rent / Lease a Property">
                                <i class="fa-solid fa-key choice-icon"></i>
                                <span class="choice-title">Rent / Lease</span>
                                <span class="choice-subtitle">Looking for a place to rent</span>
                            </div>
                            <div class="choice-card" data-intent="Sell My Property">
                                <i class="fa-solid fa-hand-holding-dollar choice-icon"></i>
                                <span class="choice-title">Sell My Property</span>
                                <span class="choice-subtitle">Get the best return with Cindy</span>
                            </div>
                            <div class="choice-card" data-intent="Real Estate Investment">
                                <i class="fa-solid fa-chart-line-up choice-icon"></i>
                                <span class="choice-title">Invest</span>
                                <span class="choice-subtitle">Rental income and growth</span>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Property Type & GTA Region -->
                    <div class="quiz-step-pane" data-step="2">
                        <h4 class="step-question-title">What type of property and where in the GTA?</h4>
                        <p class="step-question-sub">Pick the style and area that fits your lifestyle:</p>

                        <div style="margin-bottom: 1.5rem;">
                            <label style="display:block; font-family:var(--font-accent); font-size:0.75rem; color:var(--color-gold); text-transform:uppercase; letter-spacing:1.5px; margin-bottom:10px;">Select Property Type:</label>
                            <div class="choice-cards-grid" style="grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));">
                                <div class="choice-card" data-prop-type="Condo / Apartment">
                                    <i class="fa-solid fa-building choice-icon"></i>
                                    <span class="choice-title">Condo / Apartment</span>
                                    <span class="choice-subtitle">Low maintenance living</span>
                                </div>
                                <div class="choice-card" data-prop-type="Townhouse / Semi-Detached">
                                    <i class="fa-solid fa-house-user choice-icon"></i>
                                    <span class="choice-title">Townhouse / Semi</span>
                                    <span class="choice-subtitle">Great family balance</span>
                                </div>
                                <div class="choice-card" data-prop-type="Detached Family Home">
                                    <i class="fa-solid fa-house choice-icon"></i>
                                    <span class="choice-title">Detached House</span>
                                    <span class="choice-subtitle">Private yard and space</span>
                                </div>
                                <div class="choice-card" data-prop-type="Luxury Estate / Mansion">
                                    <i class="fa-solid fa-landmark choice-icon"></i>
                                    <span class="choice-title">Luxury Estate</span>
                                    <span class="choice-subtitle">Prestigious enclave</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label style="display:block; font-family:var(--font-accent); font-size:0.75rem; color:var(--color-gold); text-transform:uppercase; letter-spacing:1.5px; margin-bottom:10px;">Select Target Area in GTA:</label>
                            <div class="choice-cards-grid" style="grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));">
                                <div class="choice-card" data-region="Downtown Toronto & Core">
                                    <i class="fa-solid fa-city choice-icon"></i>
                                    <span class="choice-title">Toronto Core</span>
                                    <span class="choice-subtitle">Downtown, Yorkville, Waterfront</span>
                                </div>
                                <div class="choice-card" data-region="North York & Midtown">
                                    <i class="fa-solid fa-tree choice-icon"></i>
                                    <span class="choice-title">North York and Midtown</span>
                                    <span class="choice-subtitle">Transit, parks, and schools</span>
                                </div>
                                <div class="choice-card" data-region="York Region (Markham, Richmond Hill)">
                                    <i class="fa-solid fa-graduation-cap choice-icon"></i>
                                    <span class="choice-title">Markham and Richmond Hill</span>
                                    <span class="choice-subtitle">Top schools and family areas</span>
                                </div>
                                <div class="choice-card" data-region="Peel Region (Mississauga, Brampton)">
                                    <i class="fa-solid fa-compass choice-icon"></i>
                                    <span class="choice-title">Mississauga and Brampton</span>
                                    <span class="choice-subtitle">Connected suburbs and transit</span>
                                </div>
                                <div class="choice-card" data-region="Halton Region (Oakville, Burlington)">
                                    <i class="fa-solid fa-sailboat choice-icon"></i>
                                    <span class="choice-title">Oakville and Burlington</span>
                                    <span class="choice-subtitle">Lakeside lifestyle and parks</span>
                                </div>
                                <div class="choice-card" data-region="Durham / All GTA Open">
                                    <i class="fa-solid fa-map-location-dot choice-icon"></i>
                                    <span class="choice-title">All GTA / Flexible</span>
                                    <span class="choice-subtitle">Open to recommendations</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Budget Range & Preferences -->
                    <div class="quiz-step-pane" data-step="3">
                        <h4 class="step-question-title">What is your estimated budget or rental range?</h4>
                        <p class="step-question-sub">Pick the bracket that fits your plans:</p>

                        <div class="choice-cards-grid">
                            <div class="choice-card" data-budget="$2,000 - $4,500/mo (Rental)">
                                <span class="choice-title">$2K to $4.5K / mo</span>
                                <span class="choice-subtitle">Condo and Home Rental</span>
                            </div>
                            <div class="choice-card" data-budget="Under $800K (Purchase)">
                                <span class="choice-title">Under $800,000</span>
                                <span class="choice-subtitle">Starter Condos and Freeholds</span>
                            </div>
                            <div class="choice-card" data-budget="$800K - $1.5M (Purchase)">
                                <span class="choice-title">$800K to $1.5M</span>
                                <span class="choice-subtitle">Townhouses and Detached</span>
                            </div>
                            <div class="choice-card" data-budget="$1.5M - $3M (Purchase)">
                                <span class="choice-title">$1.5M to $3.0M</span>
                                <span class="choice-subtitle">Spacious Family Detached</span>
                            </div>
                            <div class="choice-card" data-budget="$3M+ (Luxury & Custom)">
                                <span class="choice-title">$3.0M+</span>
                                <span class="choice-subtitle">Custom Homes and Estates</span>
                            </div>
                        </div>

                        <label style="display:block; text-align:center; font-family:var(--font-accent); font-size:0.75rem; color:var(--color-gold); text-transform:uppercase; letter-spacing:1.5px; margin-bottom:12px;">Priorities (Select any that apply):</label>
                        <div class="amenities-pills-grid">
                            <div class="amenity-pill" data-feature="Close to Subway / GO Transit"><i class="fa-solid fa-train-subway"></i> Near Subway / GO</div>
                            <div class="amenity-pill" data-feature="Top-Ranked School Zone"><i class="fa-solid fa-school"></i> Top-Ranked Schools</div>
                            <div class="amenity-pill" data-feature="Parking / Garage Included"><i class="fa-solid fa-square-parking"></i> Garage / Parking</div>
                            <div class="amenity-pill" data-feature="Balcony or Backyard Yard"><i class="fa-solid fa-tree"></i> Private Yard / Balcony</div>
                            <div class="amenity-pill" data-feature="Pet Friendly"><i class="fa-solid fa-paw"></i> Pet Friendly</div>
                            <div class="amenity-pill" data-feature="Low Maintenance Fees"><i class="fa-solid fa-coins"></i> Low Maintenance Fees</div>
                            <div class="amenity-pill" data-feature="Swimming Pool / Fitness Center"><i class="fa-solid fa-dumbbell"></i> Pool / Gym</div>
                        </div>
                    </div>

                    <!-- Step 4: Contact Delivery (Direct to cindy@cindyshi.ca) -->
                    <div class="quiz-step-pane" data-step="4">
                        <h4 class="step-question-title">Your Property Matches Are Ready</h4>
                        <p class="step-question-sub">Where should Cindy send your personalized options?</p>

                        <div class="quiz-final-form">
                            <div class="input-group">
                                <label for="quizName">Your Name *</label>
                                <input type="text" id="quizName" required placeholder="Full Name">
                            </div>
                            <div class="input-group">
                                <label for="quizEmail">Email Address *</label>
                                <input type="email" id="quizEmail" required placeholder="your.email@example.com">
                            </div>
                            <div class="input-group">
                                <label for="quizPhone">Phone / Mobile (Optional)</label>
                                <input type="tel" id="quizPhone" placeholder="(647) 000-0000">
                            </div>
                            <div class="input-group">
                                <label for="quizTimeline">When are you hoping to move or act?</label>
                                <select id="quizTimeline">
                                    <option value="Next 30 Days (Immediate)">Next 30 Days (Immediate)</option>
                                    <option value="1 to 3 Months">1 to 3 Months</option>
                                    <option value="3 to 6 Months">3 to 6 Months</option>
                                    <option value="Just Exploring & Looking">Just Exploring and Looking</option>
                                </select>
                            </div>
                            <div class="input-group full-col">
                                <label for="quizNotes">Any specific preferences or questions? (Optional)</label>
                                <textarea id="quizNotes" rows="2" placeholder="Tell Cindy about bedrooms, preferred street, moving date, or current home sale..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Controls -->
                <div class="quiz-nav-controls">
                    <button type="button" class="btn-secondary-outline btn-sm" id="quizPrevBtn" style="visibility:hidden;">
                        <i class="fa-solid fa-arrow-left"></i> Previous
                    </button>
                    <button type="button" class="btn-primary-gold btn-sm" id="quizNextBtn">
                        Continue <i class="fa-solid fa-arrow-right"></i>
                    </button>
                    <button type="submit" class="btn-primary-gold btn-sm" id="quizSubmitBtn" style="display:none;">
                        <i class="fa-solid fa-paper-plane"></i> Send to Cindy Shi
                    </button>
                </div>
            </form>

            <!-- Results View After Submit -->
            <div class="matchmaker-results-box" id="matchmakerResults">
                <div class="match-success-badge">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <h3 style="font-family:var(--font-heading); font-size:2.2rem; margin-bottom:8px;">
                    Thank you, <span id="matchedClientName">Friend</span>
                </h3>
                <p style="color:var(--color-gold-light); font-size:1.05rem; margin-bottom:1.5rem;">
                    Your preferences: <strong id="matchedRegionSummary">GTA</strong> | <strong id="matchedBudgetSummary">Selected Budget</strong>
                </p>

                <div class="curated-recommendation-card">
                    <img src="images/prop-condo.jpg" class="curated-thumb" alt="Recommended Property">
                    <div>
                        <span style="font-family:var(--font-accent); font-size:0.7rem; color:var(--color-gold); letter-spacing:1.5px; text-transform:uppercase;">Handpicked Options Incoming</span>
                        <h4 style="font-family:var(--font-heading); font-size:1.4rem;">Cindy Shi is reviewing listings for you right now</h4>
                        <p style="font-size:0.85rem; color:var(--color-text-muted); margin-top:4px;">
                            Your criteria has been sent straight to <strong>cindy@cindyshi.ca</strong>. Cindy will reach out with curated options matching your exact price range and timeline.
                        </p>
                    </div>
                </div>

                <div style="display:flex; justify-content:center; gap:16px; margin-top:2rem;">
                    <a href="tel:6475542070" class="btn-primary-gold btn-sm"><i class="fa-solid fa-phone"></i> Call Cindy Directly (647) 554-2070</a>
                    <a href="mailto:cindy@cindyshi.ca" class="btn-secondary-outline btn-sm"><i class="fa-solid fa-envelope"></i> Email cindy@cindyshi.ca</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Cindy Shi Section -->
<section class="about-section" id="about">
    <div class="container about-grid">
        <div class="about-image-frame">
            <img src="images/cindy-portrait.jpg" alt="Cindy Shi - Toronto and GTA Independent Realtor" class="about-img">
            <div class="about-frame-accent"></div>
            <div class="about-experience-badge">
                <span class="badge-number">10+</span>
                <span class="badge-text">Years Helping<br>Clients Across GTA</span>
            </div>
        </div>

        <div class="about-content">
            <span class="section-tag">Independent Realtor</span>
            <h2 class="section-title">Meet Cindy Shi</h2>
            <p class="about-lead">
                Dedicated, transparent, and client-first real estate guidance across Toronto and the entire Greater Toronto Area for over 10 years.
            </p>
            <p class="about-paragraph">
                With more than a decade of active real estate experience in Ontario, Cindy Shi provides direct, personal service for every client. Whether you are a first-time home buyer looking for an accessible condo, a family searching for the right neighborhood and top schools in Markham, Richmond Hill, or Oakville, or an owner selling a prized property, you get her personal attention from start to finish.
            </p>
            <p class="about-paragraph">
                Cindy is known for being approachable, detail-oriented, and protective of her clients' best interests. From realistic market evaluations and sharp pricing strategies to hands-on showings and patient consultation, she guides you step by step so you feel confident at every decision.
            </p>

            <div class="about-pillars">
                <div class="pillar-item">
                    <i class="fa-solid fa-handshake"></i>
                    <div class="pillar-text">
                        <h5>Client-First Dedication</h5>
                        <p>No high-pressure sales. Honest advice tailored to your life and budget.</p>
                    </div>
                </div>
                <div class="pillar-item">
                    <i class="fa-solid fa-shield-halved"></i>
                    <div class="pillar-text">
                        <h5>Strong Negotiation</h5>
                        <p>Protecting your money whether you are buying, selling, or renting.</p>
                    </div>
                </div>
                <div class="pillar-item">
                    <i class="fa-solid fa-map-location"></i>
                    <div class="pillar-text">
                        <h5>GTA-Wide Coverage</h5>
                        <p>Active insight across Toronto, York, Peel, Halton, and Durham.</p>
                    </div>
                </div>
                <div class="pillar-item">
                    <i class="fa-solid fa-comments"></i>
                    <div class="pillar-text">
                        <h5>Accessible and Responsive</h5>
                        <p>Quick answers to your calls, texts, and emails at (647) 554-2070.</p>
                    </div>
                </div>
            </div>

            <div style="display:flex; gap:16px;">
                <a href="#contact" class="btn-primary-gold">Get in Touch with Cindy</a>
                <a href="tel:6475542070" class="btn-secondary-outline"><i class="fa-solid fa-phone"></i> (647) 554-2070</a>
            </div>
        </div>
    </div>
</section>

<!-- GTA Regions Serviced -->
<section class="neighborhoods-section" id="neighborhoods">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Where Cindy Works</span>
            <h2 class="section-title">Toronto and The Greater Toronto Area</h2>
            <p class="section-subtitle">
                Whatever neighborhood you have your eyes on, Cindy brings 10+ years of local market knowledge to help you find the right fit.
            </p>
            <div class="gold-divider"></div>
        </div>

        <div class="neighborhoods-grid">
            <?php foreach ($neighborhoods as $nh): ?>
            <div class="neighborhood-card">
                <span class="neighborhood-region"><?php echo htmlspecialchars($nh['region']); ?></span>
                <h3 class="neighborhood-title"><?php echo htmlspecialchars($nh['name']); ?></h3>
                <p class="neighborhood-desc"><?php echo htmlspecialchars($nh['type']); ?></p>
                <a href="#featured" class="neighborhood-link">
                    View Available Options <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Investment & Mortgage Tool -->
<section class="calculator-section" id="calculator">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Planning Tool</span>
            <h2 class="section-title">Mortgage and Budget Estimator</h2>
            <p class="section-subtitle">
                Estimate your monthly payments and see Ontario and Toronto Land Transfer Tax figures across any budget range.
            </p>
            <div class="gold-divider"></div>
        </div>

        <div class="calc-wrapper">
            <div class="calc-controls">
                <div class="calc-field">
                    <div class="calc-field-top">
                        <span class="calc-label">Purchase Price</span>
                        <span class="calc-val-display" id="calcPriceDisplay">$1,200,000</span>
                    </div>
                    <input type="range" class="calc-range" id="calcHomePrice" min="400000" max="15000000" step="50000" value="1200000">
                </div>

                <div class="calc-field">
                    <div class="calc-field-top">
                        <span class="calc-label">Down Payment Percentage</span>
                        <span class="calc-val-display" id="calcDownDisplay">20%</span>
                    </div>
                    <input type="range" class="calc-range" id="calcDownPayment" min="5" max="50" step="5" value="20">
                </div>

                <div class="calc-field">
                    <div class="calc-field-top">
                        <span class="calc-label">Interest Rate</span>
                        <span class="calc-val-display" id="calcRateDisplay">4.85%</span>
                    </div>
                    <input type="range" class="calc-range" id="calcRate" min="2.0" max="8.0" step="0.05" value="4.85">
                </div>

                <div class="calc-field">
                    <div class="calc-field-top">
                        <span class="calc-label">Amortization Period</span>
                        <span class="calc-val-display" id="calcAmortDisplay">25 Years</span>
                    </div>
                    <input type="range" class="calc-range" id="calcAmortization" min="15" max="30" step="5" value="25">
                </div>
            </div>

            <div class="calc-results-card">
                <div class="calc-main-num">
                    <span class="sub">Estimated Monthly Payment</span>
                    <div class="amount" id="calcMonthlyPayment">$5,510/mo</div>
                </div>

                <div class="calc-breakdown">
                    <div class="breakdown-row">
                        <span>Mortgage Loan Amount:</span>
                        <strong id="calcTotalLoan">$960,000</strong>
                    </div>
                    <div class="breakdown-row">
                        <span>Estimated Land Transfer Tax:</span>
                        <strong id="calcLTT">$40,950 (Toronto est.)</strong>
                    </div>
                    <div class="breakdown-row">
                        <span>Questions on Financing?</span>
                        <strong style="color:var(--color-gold);">Cindy connects you to trusted mortgage specialists</strong>
                    </div>
                </div>

                <a href="#contact" class="btn-primary-gold" style="width: 100%;">
                    <i class="fa-solid fa-calculator"></i> Discuss Your Budget With Cindy
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Direct Contact Section -->
<section class="contact-section" id="contact">
    <div class="container contact-layout">
        <div class="contact-info-panel">
            <div class="contact-card-box">
                <span class="section-tag">Direct Contact</span>
                <h4>Get in Touch with Cindy Shi</h4>
                <p style="color:var(--color-text-muted); font-size:0.92rem; margin-bottom:1.8rem;">
                    Have questions about the market, need advice on whether to buy or rent, or thinking of selling? Cindy is always glad to chat.
                </p>

                <ul class="direct-channels">
                    <li>
                        <div class="channel-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div class="channel-text">
                            <span>Email Directly</span>
                            <a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo CONTACT_EMAIL; ?></a>
                        </div>
                    </li>
                    <li>
                        <div class="channel-icon"><i class="fa-solid fa-phone"></i></div>
                        <div class="channel-text">
                            <span>Call or Text Cindy</span>
                            <a href="tel:6475542070"><?php echo CONTACT_PHONE; ?></a>
                        </div>
                    </li>
                    <li>
                        <div class="channel-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="channel-text">
                            <span>Service Area</span>
                            <p><?php echo OFFICE_LOCATION; ?></p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="contact-card-box" style="border-left: 3px solid var(--color-gold);">
                <h5 style="font-family:var(--font-heading); font-size:1.3rem; margin-bottom:8px;">Fast, Direct Responses</h5>
                <p style="font-size:0.85rem; color:var(--color-text-muted); line-height:1.6;">
                    Every inquiry submitted on this site routes directly to Cindy's inbox at <strong>cindy@cindyshi.ca</strong>. You will hear back promptly with honest answers and no pressure.
                </p>
            </div>
        </div>

        <!-- Direct Contact Form -->
        <div class="contact-form-panel">
            <h3 class="form-title">Send Cindy a Message</h3>
            <p class="form-subtitle">Messages are sent directly to <strong><?php echo CONTACT_EMAIL; ?></strong>.</p>

            <form id="directContactForm">
                <div class="direct-form-grid">
                    <div class="input-group">
                        <label for="contactName">Your Name *</label>
                        <input type="text" id="contactName" required placeholder="Full Name">
                    </div>
                    <div class="input-group">
                        <label for="contactEmail">Your Email *</label>
                        <input type="email" id="contactEmail" required placeholder="email@address.com">
                    </div>
                    <div class="input-group">
                        <label for="contactPhone">Phone / Text</label>
                        <input type="tel" id="contactPhone" placeholder="(647) 000-0000">
                    </div>
                    <div class="input-group">
                        <label for="contactInterest">What can Cindy help you with?</label>
                        <select id="contactInterest">
                            <option value="Looking to Buy a Home or Condo">Looking to Buy a Home or Condo</option>
                            <option value="Looking for a Rental / Lease">Looking for a Rental / Lease</option>
                            <option value="Thinking of Selling My Property">Thinking of Selling My Property</option>
                            <option value="Schedule a Showing on a Listing">Schedule a Showing on a Listing</option>
                            <option value="Free Home Valuation / Market Question">Free Home Valuation / Market Question</option>
                            <option value="General Real Estate Advisory">General Real Estate Question</option>
                        </select>
                    </div>
                    <div class="input-group full-span">
                        <label for="contactMessage">Your Message *</label>
                        <textarea id="contactMessage" rows="4" required placeholder="Tell Cindy about your preferred location in the GTA, timing, or any questions you have..."></textarea>
                    </div>
                    <div class="full-span" style="margin-top: 10px;">
                        <button type="submit" class="btn-primary-gold" id="contactSubmitBtn" style="width: 100%;">
                            <i class="fa-solid fa-paper-plane"></i> Send Message Directly to Cindy
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

