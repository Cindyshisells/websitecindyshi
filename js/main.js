/**
 * Cindy Shi - Luxury Real Estate
 * Interactive Features: Gamified Matchmaker, Mortgage Calculator, Dynamic Filter & Inquiries
 */

document.addEventListener('DOMContentLoaded', () => {
    // -------------------------------------------------------------
    // 1. Mobile Menu Navigation
    // -------------------------------------------------------------
    const mobileToggle = document.getElementById('mobileToggle');
    const navMenu = document.getElementById('navMenu');

    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', () => {
            navMenu.classList.toggle('open');
        });

        // Close menu on nav link click
        navMenu.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('open');
            });
        });
    }

    // -------------------------------------------------------------
    // 2. Portfolio Filtering
    // -------------------------------------------------------------
    const filterBtns = document.querySelectorAll('.filter-btn');
    const propertyCards = document.querySelectorAll('.property-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filterValue = btn.getAttribute('data-filter');

            propertyCards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filterValue === 'all' || category === filterValue) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // -------------------------------------------------------------
    // 3. GAMIFIED PROPERTY MATCHMAKER
    // -------------------------------------------------------------
    const quizState = {
        currentStep: 1,
        totalSteps: 4,
        intent: '',
        property_type: '',
        target_region: '',
        budget_range: '',
        timeframe: '',
        features: []
    };

    const stepPanes = document.querySelectorAll('.quiz-step-pane');
    const stepIndicators = document.querySelectorAll('.step-indicator');
    const progressLineFill = document.getElementById('progressLineFill');
    const nextBtn = document.getElementById('quizNextBtn');
    const prevBtn = document.getElementById('quizPrevBtn');
    const quizSubmitBtn = document.getElementById('quizSubmitBtn');
    const matchmakerResults = document.getElementById('matchmakerResults');
    const quizFormElement = document.getElementById('quizForm');

    function updateStepUI() {
        stepPanes.forEach(pane => {
            pane.classList.remove('active');
            if (parseInt(pane.getAttribute('data-step')) === quizState.currentStep) {
                pane.classList.add('active');
            }
        });

        stepIndicators.forEach(indicator => {
            const stepNum = parseInt(indicator.getAttribute('data-step'));
            indicator.classList.remove('active', 'completed');
            if (stepNum === quizState.currentStep) {
                indicator.classList.add('active');
            } else if (stepNum < quizState.currentStep) {
                indicator.classList.add('completed');
            }
        });

        // Progress line calculation
        const percent = ((quizState.currentStep - 1) / (quizState.totalSteps - 1)) * 100;
        if (progressLineFill) {
            progressLineFill.style.width = `${percent}%`;
        }

        // Button visibility
        if (prevBtn) {
            prevBtn.style.visibility = quizState.currentStep > 1 ? 'visible' : 'hidden';
        }
        if (nextBtn && quizSubmitBtn) {
            if (quizState.currentStep === quizState.totalSteps) {
                nextBtn.style.display = 'none';
                quizSubmitBtn.style.display = 'inline-flex';
            } else {
                nextBtn.style.display = 'inline-flex';
                quizSubmitBtn.style.display = 'none';
            }
        }
    }

    // Step 1: Goal/Intent Choice Cards
    document.querySelectorAll('[data-intent]').forEach(card => {
        card.addEventListener('click', () => {
            document.querySelectorAll('[data-intent]').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            quizState.intent = card.getAttribute('data-intent');
        });
    });

    // Step 2: Property Type Cards
    document.querySelectorAll('[data-prop-type]').forEach(card => {
        card.addEventListener('click', () => {
            document.querySelectorAll('[data-prop-type]').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            quizState.property_type = card.getAttribute('data-prop-type');
        });
    });

    // Step 2: Region Selection
    document.querySelectorAll('[data-region]').forEach(card => {
        card.addEventListener('click', () => {
            document.querySelectorAll('[data-region]').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            quizState.target_region = card.getAttribute('data-region');
        });
    });

    // Step 3: Budget Pill/Cards
    document.querySelectorAll('[data-budget]').forEach(card => {
        card.addEventListener('click', () => {
            document.querySelectorAll('[data-budget]').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            quizState.budget_range = card.getAttribute('data-budget');
        });
    });

    // Step 3: Feature Pills (Multi-select)
    document.querySelectorAll('.amenity-pill').forEach(pill => {
        pill.addEventListener('click', () => {
            pill.classList.toggle('selected');
            const featureName = pill.getAttribute('data-feature');
            if (pill.classList.contains('selected')) {
                if (!quizState.features.includes(featureName)) {
                    quizState.features.push(featureName);
                }
            } else {
                quizState.features = quizState.features.filter(f => f !== featureName);
            }
        });
    });

    // Navigation Next
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            // Validation per step
            if (quizState.currentStep === 1 && !quizState.intent) {
                showToast('Please select your primary real estate objective.', 'Selection Required');
                return;
            }
            if (quizState.currentStep === 2 && (!quizState.property_type || !quizState.target_region)) {
                showToast('Please choose both your preferred property style and GTA region.', 'Details Required');
                return;
            }
            if (quizState.currentStep === 3 && !quizState.budget_range) {
                showToast('Please select an estimated budget range.', 'Budget Required');
                return;
            }

            if (quizState.currentStep < quizState.totalSteps) {
                quizState.currentStep++;
                updateStepUI();
            }
        });
    }

    // Navigation Prev
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            if (quizState.currentStep > 1) {
                quizState.currentStep--;
                updateStepUI();
            }
        });
    }

    // Matchmaker Submit Handler
    if (quizFormElement) {
        quizFormElement.addEventListener('submit', async (e) => {
            e.preventDefault();

            const nameInput = document.getElementById('quizName');
            const emailInput = document.getElementById('quizEmail');
            const phoneInput = document.getElementById('quizPhone');
            const timelineInput = document.getElementById('quizTimeline');
            const notesInput = document.getElementById('quizNotes');

            if (!nameInput.value.trim() || !emailInput.value.trim()) {
                showToast('Please provide your name and email address.', 'Validation Error');
                return;
            }

            const submitBtn = document.getElementById('quizSubmitBtn');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Analyzing Matches...';
            submitBtn.disabled = true;

            const payload = {
                source: 'matchmaker_quiz',
                name: nameInput.value.trim(),
                email: emailInput.value.trim(),
                phone: phoneInput.value.trim(),
                timeframe: timelineInput ? timelineInput.value : 'Immediate',
                message: notesInput ? notesInput.value.trim() : '',
                intent: quizState.intent || 'Acquire / Purchase',
                property_type: quizState.property_type || 'Luxury Estate',
                target_region: quizState.target_region || 'Toronto Central',
                budget_range: quizState.budget_range || '$3.5M - $6M',
                features: quizState.features.join(', ') || 'Waterfront, Pool, Smart Home'
            };

            try {
                const response = await fetch('api/contact.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });
                const result = await response.json();

                if (result.status === 'success') {
                    // Show Match Results Box
                    document.getElementById('quizStepsContainer').style.display = 'none';
                    if (matchmakerResults) {
                        matchmakerResults.style.display = 'block';
                        document.getElementById('matchedClientName').textContent = payload.name;
                        document.getElementById('matchedRegionSummary').textContent = `${payload.target_region} • ${payload.property_type}`;
                        document.getElementById('matchedBudgetSummary').textContent = `Target Range: ${payload.budget_range}`;
                    }
                    showToast(`Thank you! Your tailored profile has been sent to Cindy Shi (cindy@cindyshi.ca).`, 'Match Found');
                } else {
                    showToast(result.message || 'Error processing request.', 'Submission Error');
                }
            } catch (err) {
                // Fallback graceful mailto trigger if offline or php direct
                showToast('Opening your mail client directly to cindy@cindyshi.ca...', 'Routing to Cindy');
                window.location.href = `mailto:cindy@cindyshi.ca?subject=VIP Matchmaker Inquiry: ${payload.name}&body=Objective: ${payload.intent}%0D%0ARegion: ${payload.target_region}%0D%0AProperty: ${payload.property_type}%0D%0ABudget: ${payload.budget_range}%0D%0APhone: ${payload.phone}%0D%0AEmail: ${payload.email}`;
            } finally {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
    }

    // -------------------------------------------------------------
    // 4. Contact Form Handler (Direct Contact Section)
    // -------------------------------------------------------------
    const directContactForm = document.getElementById('directContactForm');
    if (directContactForm) {
        directContactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const name = document.getElementById('contactName').value.trim();
            const email = document.getElementById('contactEmail').value.trim();
            const phone = document.getElementById('contactPhone').value.trim();
            const interest = document.getElementById('contactInterest').value;
            const message = document.getElementById('contactMessage').value.trim();

            if (!name || !email) {
                showToast('Please fill out your name and email.', 'Required Fields');
                return;
            }

            const sendBtn = document.getElementById('contactSubmitBtn');
            const originalBtnText = sendBtn.innerHTML;
            sendBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending message...';
            sendBtn.disabled = true;

            const payload = {
                source: 'direct_contact_form',
                name: name,
                email: email,
                phone: phone,
                intent: interest,
                message: message
            };

            try {
                const res = await fetch('api/contact.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });
                const data = await res.json();

                if (data.status === 'success') {
                    showToast('Your message has been sent directly to Cindy Shi (cindy@cindyshi.ca).', 'Message Delivered');
                    directContactForm.reset();
                } else {
                    showToast(data.message || 'Failed to submit form.', 'Error');
                }
            } catch (err) {
                showToast('Routing to Cindy Shi email...', 'Direct Dispatch');
                window.location.href = `mailto:cindy@cindyshi.ca?subject=Inquiry from ${name}&body=${encodeURIComponent(message)}%0D%0A%0D%0APhone: ${phone}%0D%0AEmail: ${email}`;
            } finally {
                sendBtn.innerHTML = originalBtnText;
                sendBtn.disabled = false;
            }
        });
    }

    // -------------------------------------------------------------
    // 5. Interactive Mortgage & Land Transfer Tax Calculator
    // -------------------------------------------------------------
    const homePriceInput = document.getElementById('calcHomePrice');
    const downPaymentPercentInput = document.getElementById('calcDownPayment');
    const interestRateInput = document.getElementById('calcRate');
    const amortizationInput = document.getElementById('calcAmortization');

    const priceValDisplay = document.getElementById('calcPriceDisplay');
    const downValDisplay = document.getElementById('calcDownDisplay');
    const rateValDisplay = document.getElementById('calcRateDisplay');
    const amortValDisplay = document.getElementById('calcAmortDisplay');

    const monthlyPaymentDisplay = document.getElementById('calcMonthlyPayment');
    const totalLoanDisplay = document.getElementById('calcTotalLoan');
    const lttDisplay = document.getElementById('calcLTT');

    function calculateMortgage() {
        if (!homePriceInput) return;

        const price = parseFloat(homePriceInput.value);
        const downPercent = parseFloat(downPaymentPercentInput.value);
        const rate = parseFloat(interestRateInput.value) / 100 / 12;
        const years = parseInt(amortizationInput.value);
        const months = years * 12;

        const downPaymentAmount = price * (downPercent / 100);
        const principal = price - downPaymentAmount;

        // Displays
        priceValDisplay.textContent = `$${price.toLocaleString()}`;
        downValDisplay.textContent = `${downPercent}% ($${Math.round(downPaymentAmount).toLocaleString()})`;
        rateValDisplay.textContent = `${parseFloat(interestRateInput.value).toFixed(2)}%`;
        amortValDisplay.textContent = `${years} Years`;

        // Monthly Mortgage calculation
        let monthly = 0;
        if (principal > 0 && rate > 0) {
            monthly = principal * (rate * Math.pow(1 + rate, months)) / (Math.pow(1 + rate, months) - 1);
        }

        monthlyPaymentDisplay.textContent = `$${Math.round(monthly).toLocaleString()}/mo`;
        totalLoanDisplay.textContent = `$${Math.round(principal).toLocaleString()}`;

        // Ontario & Toronto Land Transfer Tax (LTT) rough estimate
        // Ontario progressive brackets + Toronto municipal tax
        let ontarioTax = 0;
        if (price > 2000000) {
            ontarioTax = (price - 2000000) * 0.025 + 36475;
        } else {
            ontarioTax = price * 0.02;
        }
        // In Toronto city (double LTT)
        const torontoTotalLTT = ontarioTax * 2;
        lttDisplay.textContent = `$${Math.round(torontoTotalLTT).toLocaleString()} (Toronto est.)`;
    }

    if (homePriceInput) {
        [homePriceInput, downPaymentPercentInput, interestRateInput, amortizationInput].forEach(slider => {
            slider.addEventListener('input', calculateMortgage);
        });
        calculateMortgage();
    }

    // -------------------------------------------------------------
    // 6. Toast Notification Helper
    // -------------------------------------------------------------
    function showToast(message, title = 'Notification') {
        const toast = document.getElementById('toastNotification');
        const toastTitle = document.getElementById('toastTitle');
        const toastMessage = document.getElementById('toastMessage');

        if (!toast) return;

        toastTitle.textContent = title;
        toastMessage.textContent = message;

        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 5000);
    }

    // -------------------------------------------------------------
    // 7. Property Details Modal Logic
    // -------------------------------------------------------------
    const propertyModal = document.getElementById('propertyModal');
    const closePropertyModal = document.getElementById('closePropertyModal');
    const propertyModalContent = document.getElementById('propertyModalContent');

    document.querySelectorAll('.view-property-trigger').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const card = btn.closest('.property-card');
            if (!card) return;

            const title = card.querySelector('.property-title').textContent;
            const price = card.querySelector('.property-price').textContent;
            const location = card.querySelector('.property-location').textContent;
            const desc = card.querySelector('.property-desc').textContent;
            const imgSrc = card.querySelector('.property-media img').src;
            const specs = card.querySelector('.property-specs').innerHTML;

            propertyModalContent.innerHTML = `
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div style="height: 380px; overflow: hidden; border-radius: 4px; border: 1px solid rgba(212,175,55,0.3);">
                        <img src="${imgSrc}" alt="${title}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div>
                        <span style="font-family: var(--font-accent); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-gold);">${location}</span>
                        <h2 style="font-family: var(--font-heading); font-size: 2.4rem; color: #fff; margin: 4px 0 8px;">${title}</h2>
                        <div style="font-family: var(--font-heading); font-size: 2rem; color: var(--color-gold-light); font-weight: 600; margin-bottom: 16px;">${price}</div>
                        <div style="display: flex; gap: 20px; font-size: 0.95rem; color: #CBD5E1; padding: 12px 0; border-top: 1px solid rgba(255,255,255,0.1); border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 16px;">
                            ${specs}
                        </div>
                        <p style="color: var(--color-text-muted); line-height: 1.8; font-size: 1rem; margin-bottom: 24px;">${desc}</p>
                        
                        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
                            <a href="#contact" class="btn-primary-gold" onclick="document.getElementById('propertyModal').classList.remove('open'); document.getElementById('contactInterest').value='Inquire on Specific Listing';"><i class="fa-solid fa-calendar-check"></i> Book Private Showing</a>
                            <a href="mailto:cindy@cindyshi.ca?subject=Inquiry for ${encodeURIComponent(title)}" class="btn-secondary-outline"><i class="fa-regular fa-envelope"></i> Email Cindy Directly</a>
                        </div>
                    </div>
                </div>
            `;

            propertyModal.classList.add('open');
        });
    });

    if (closePropertyModal && propertyModal) {
        closePropertyModal.addEventListener('click', () => {
            propertyModal.classList.remove('open');
        });

        propertyModal.addEventListener('click', (e) => {
            if (e.target === propertyModal) {
                propertyModal.classList.remove('open');
            }
        });
    }
});
