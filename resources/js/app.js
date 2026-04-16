// import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
RéservSalle – Main JavaScript

document.addEventListener('DOMContentLoaded', () => {

    // ── NAVBAR SCROLL EFFECT ────────────────────────────
    const navbar = document.getElementById('navbar');
    if (navbar) {
        const handleScroll = () => {
            if (window.scrollY > 60) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };
        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
    }

    // ── HAMBURGER MENU ──────────────────────────────────
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.nav-links');
    const navActions = document.querySelector('.nav-actions');

    if (hamburger) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('open');
            if (navLinks) {
                navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
                navLinks.style.flexDirection = 'column';
                navLinks.style.position = 'fixed';
                navLinks.style.top = '72px';
                navLinks.style.left = '0';
                navLinks.style.right = '0';
                navLinks.style.background = 'rgba(26,28,32,0.98)';
                navLinks.style.padding = '1.5rem 2rem';
                navLinks.style.gap = '0.5rem';
                navLinks.style.backdropFilter = 'blur(12px)';
                navLinks.style.zIndex = '999';
            }
        });
    }

    // ── ALERT CLOSE ─────────────────────────────────────
    document.querySelectorAll('.alert-close').forEach(btn => {
        btn.addEventListener('click', () => {
            btn.closest('.alert').style.opacity = '0';
            btn.closest('.alert').style.transform = 'translateX(100%)';
            setTimeout(() => btn.closest('.alert')?.remove(), 400);
        });
    });

    // Auto-dismiss alerts after 5 seconds
    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            if (alert) {
                alert.style.transition = 'all 0.5s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateX(100%)';
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    });

    // ── SMOOTH REVEAL ON SCROLL ─────────────────────────
    const observerOptions = {
        threshold: 0.08,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.salle-card, .step-card, .feature-item, .testimonial-card, .category-card, .contact-item').forEach((el, i) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(28px)';
        el.style.transition = `opacity 0.55s ease ${i * 0.06}s, transform 0.55s ease ${i * 0.06}s`;
        observer.observe(el);
    });

    // ── COUNTER ANIMATION ───────────────────────────────
    const counters = document.querySelectorAll('.stat-num');
    const countObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const text = el.textContent;
                const num = parseFloat(text.replace(/[^0-9.]/g, ''));
                const suffix = text.replace(/[0-9.]/g, '');
                if (isNaN(num)) return;

                let start = 0;
                const duration = 1800;
                const startTime = performance.now();

                const animate = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const current = start + (num - start) * eased;

                    if (num < 10) {
                        el.textContent = current.toFixed(1) + suffix;
                    } else {
                        el.textContent = Math.round(current).toLocaleString() + suffix;
                    }

                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    }
                };

                requestAnimationFrame(animate);
                countObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => countObserver.observe(counter));

    // ── ACTIVE NAV LINK ─────────────────────────────────
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-links a').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        }
    });

    // ── IMAGE LAZY LOAD ─────────────────────────────────
    if ('IntersectionObserver' in window) {
        const imgObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    imgObserver.unobserve(img);
                }
            });
        });
        document.querySelectorAll('img[data-src]').forEach(img => imgObserver.observe(img));
    }

});