<?php
/**
 * Footer Include
 */
?>
    <!-- Pre-Footer Banner -->
    <section class="vip-cta-strip">
        <div class="container vip-cta-container">
            <div class="vip-cta-text">
                <h3>Ready to Acquire or List Your Signature Residence?</h3>
                <p>Connect directly with Cindy Shi for discrete advisory, unlisted off-market opportunities, and tailored GTA representation.</p>
            </div>
            <div class="vip-cta-actions">
                <a href="#contact" class="btn-primary-gold"><i class="fa-solid fa-paper-plane"></i> Contact Cindy Shi</a>
                <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>" class="btn-secondary-outline"><i class="fa-solid fa-envelope"></i> <?php echo htmlspecialchars(CONTACT_EMAIL); ?></a>
            </div>
        </div>
    </section>

    <!-- Main Footer -->
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-col brand-col">
                <div class="footer-logo">
                    <span class="logo-name">CINDY SHI</span>
                    <span class="logo-sub">TORONTO & GTA LUXURY REAL ESTATE</span>
                </div>
                <p class="footer-bio">
                    Independent real estate specialist offering discerning clients over 10 years of unparalleled expertise across Toronto and the Greater Toronto Area. Delivering tailored guidance, strategic negotiation, and confidential service.
                </p>
                <div class="footer-socials">
                    <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://youtube.com" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://wechat.com" target="_blank" rel="noopener" aria-label="WeChat"><i class="fa-brands fa-weixin"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Curated Regions</h4>
                <ul class="footer-links">
                    <li><a href="#featured">The Bridle Path & Hoggs Hollow</a></li>
                    <li><a href="#featured">Yorkville & Historic Rosedale</a></li>
                    <li><a href="#featured">Forest Hill & Lawrence Park</a></li>
                    <li><a href="#featured">Oakville & Burlington Waterfront</a></li>
                    <li><a href="#featured">Richmond Hill & Markham Luxury</a></li>
                    <li><a href="#featured">Mississauga & Lorne Park</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Services</h4>
                <ul class="footer-links">
                    <li><a href="#matchmaker">Personalized Property Matchmaker</a></li>
                    <li><a href="#contact">Private Listing Representation</a></li>
                    <li><a href="#contact">Buyer Bespoke Acquisition</a></li>
                    <li><a href="#calculator">Mortgage & Land Transfer Calculator</a></li>
                    <li><a href="#contact">Off-Market Confidential Sales</a></li>
                    <li><a href="#about">GTA Market Trend Evaluation</a></li>
                </ul>
            </div>

            <div class="footer-col contact-col">
                <h4 class="footer-heading">Direct Contact</h4>
                <ul class="footer-contact-list">
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <div>
                            <span>Email:</span>
                            <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a>
                        </div>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <div>
                            <span>Direct Line:</span>
                            <a href="tel:6475542070"><?php echo htmlspecialchars(CONTACT_PHONE); ?></a>
                        </div>
                    </li>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <div>
                            <span>Coverage:</span>
                            <p>Toronto, York, Peel, Halton, Durham (All GTA)</p>
                        </div>
                    </li>
                    <li>
                        <i class="fa-solid fa-clock"></i>
                        <div>
                            <span>Consultation Hours:</span>
                            <p>Monday to Sunday: 8:00 AM to 9:00 PM EST</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container footer-bottom">
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> Cindy Shi. All Rights Reserved. Independent Luxury Real Estate Specialist. Licensed in Ontario, Canada.</p>
                <p class="disclaimer">The trademarks REALTOR®, REALTORS®, and the REALTOR® logo are controlled by The Canadian Real Estate Association (CREA) and identify real estate professionals who are members of CREA. Not intended to solicit properties already listed for sale.</p>
            </div>
            <div class="bottom-links">
                <a href="#privacyModal" class="modal-trigger">Privacy Policy</a>
                <span class="sep">•</span>
                <a href="#termsModal" class="modal-trigger">Terms of Service</a>
                <span class="sep">•</span>
                <a href="#siteHeader">Back to Top <i class="fa-solid fa-arrow-up"></i></a>
            </div>
        </div>
    </footer>

    <!-- Property Details Modal -->
    <div class="modal-overlay" id="propertyModal" aria-hidden="true">
        <div class="modal-container">
            <button class="modal-close" id="closePropertyModal" aria-label="Close modal">&times;</button>
            <div class="modal-body" id="propertyModalContent">
                <!-- Dynamically populated via JS -->
            </div>
        </div>
    </div>

    <!-- Quick Notification Toast -->
    <div class="toast-notification" id="toastNotification">
        <i class="fa-solid fa-circle-check"></i>
        <div class="toast-body">
            <strong id="toastTitle">Success</strong>
            <p id="toastMessage">Your message has been dispatched.</p>
        </div>
    </div>

    <!-- Main JavaScript Application -->
    <script src="js/main.js"></script>
</body>
</html>

