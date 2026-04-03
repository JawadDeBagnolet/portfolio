/**
 * Jawad Aouzal — Portfolio Script
 * Clean, minimal, no dependencies
 */

(function () {
    'use strict';

    /* ── DOM refs ──────────────────────────────────────── */
    const header     = document.getElementById('header');
    const navToggle  = document.getElementById('navToggle');
    const navDrawer  = document.getElementById('navDrawer');
    const contactForm = document.getElementById('contactForm');
    const submitBtn  = document.getElementById('submitBtn');
    const formFeedback = document.getElementById('formFeedback');

    /* ── Header scroll effect ──────────────────────────── */
    const onScroll = () => {
        header.classList.toggle('scrolled', window.scrollY > 30);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // run once on load

    /* ── Mobile nav ─────────────────────────────────────── */
    navToggle.addEventListener('click', () => {
        const isOpen = navDrawer.classList.toggle('open');
        navToggle.classList.toggle('open', isOpen);
        navToggle.setAttribute('aria-expanded', isOpen);
        navDrawer.setAttribute('aria-hidden', !isOpen);
    });

    // Close on link click
    navDrawer.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', closeNav);
    });

    // Close on Escape
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeNav();
    });

    function closeNav() {
        navDrawer.classList.remove('open');
        navToggle.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
        navDrawer.setAttribute('aria-hidden', 'true');
    }

    /* ── Smooth scroll for anchor links ────────────────── */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', e => {
            const href = anchor.getAttribute('href');
            if (href === '#') return;
            const target = document.querySelector(href);
            if (!target) return;
            e.preventDefault();
            const offset = header.offsetHeight + 12;
            const top = target.getBoundingClientRect().top + window.scrollY - offset;
            window.scrollTo({ top, behavior: 'smooth' });
        });
    });

    /* ── Hero entrance animation ────────────────────────── */
    // Trigger [data-animate] elements shortly after load
    window.addEventListener('load', () => {
        document.querySelectorAll('[data-animate]').forEach(el => {
            const delay = parseInt(el.dataset.delay || '0', 10);
            setTimeout(() => el.classList.add('is-visible'), 80 + delay);
        });
    });

    /* ── Scroll reveal (IntersectionObserver) ───────────── */
    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver(
            entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // CSS transition-delay handles stagger via data-delay attribute
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.08, rootMargin: '0px 0px -40px 0px' }
        );

        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
    } else {
        // Fallback: show all immediately
        document.querySelectorAll('.reveal, [data-animate]').forEach(el => {
            el.classList.add('is-visible');
        });
    }

    /* ── Project rows — click to expand ────────────────── */
    document.querySelectorAll('.project-row').forEach(row => {
        row.addEventListener('click', e => {
            // Don't toggle when clicking the GitHub link
            if (e.target.closest('.project-arrow')) return;
            row.classList.toggle('open');
        });

        // Keyboard accessibility
        row.setAttribute('tabindex', '0');
        row.setAttribute('role', 'button');
        row.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                row.classList.toggle('open');
            }
        });
    });

    /* ── Contact form — AJAX via FormSubmit.co ──────────── */
    if (contactForm) {
        contactForm.addEventListener('submit', async e => {
            e.preventDefault();

            const name    = contactForm.querySelector('#cf-name');
            const email   = contactForm.querySelector('#cf-email');
            const subject = contactForm.querySelector('#cf-subject');
            const message = contactForm.querySelector('#cf-message');

            // Basic validation
            let valid = true;

            [name, email, subject, message].forEach(field => {
                field.classList.remove('error');
                if (!field.value.trim()) {
                    field.classList.add('error');
                    valid = false;
                }
            });

            const emailRx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.value && !emailRx.test(email.value)) {
                email.classList.add('error');
                valid = false;
            }

            if (!valid) {
                showFeedback('Veuillez remplir tous les champs correctement.', false);
                return;
            }

            // Loading state
            setLoading(true);

            try {
                const res = await fetch('https://formsubmit.co/ajax/cjawad.a@gmail.com', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name:    name.value.trim(),
                        email:   email.value.trim(),
                        objet:   subject.value.trim(),
                        message: message.value.trim(),
                        _subject: 'Nouveau message depuis le portfolio'
                    })
                });

                if (res.ok) {
                    showFeedback('Message envoyé avec succès ! Je vous répondrai dans les plus brefs délais.', true);
                    contactForm.reset();
                } else {
                    throw new Error('Network response was not ok');
                }
            } catch {
                showFeedback(
                    'Une erreur est survenue. Vous pouvez me contacter directement à cjawad.a@gmail.com',
                    false
                );
            } finally {
                setLoading(false);
            }
        });
    }

    function setLoading(loading) {
        if (!submitBtn) return;
        const textEl    = submitBtn.querySelector('.btn-text');
        const loadingEl = submitBtn.querySelector('.btn-loading');
        submitBtn.disabled = loading;
        if (textEl)    textEl.hidden    = loading;
        if (loadingEl) loadingEl.hidden = !loading;
    }

    function showFeedback(msg, success) {
        if (!formFeedback) return;
        formFeedback.textContent = msg;
        formFeedback.className   = 'form-feedback ' + (success ? 'success' : 'error-msg');
        formFeedback.hidden      = false;
        formFeedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        if (success) {
            // Hide after 8 seconds on success
            setTimeout(() => { formFeedback.hidden = true; }, 8000);
        }
    }

})();
