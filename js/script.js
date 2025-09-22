// DOM Elements
const navToggle = document.getElementById('nav-toggle');
const navMenu = document.getElementById('nav-menu');
const header = document.getElementById('header');
const contactForm = document.getElementById('contact-form');

// Navigation Toggle
navToggle.addEventListener('click', () => {
    navMenu.classList.toggle('active');
    const icon = navToggle.querySelector('i');
    
    if (navMenu.classList.contains('active')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
});

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        navMenu.classList.remove('active');
        const icon = navToggle.querySelector('i');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    });
});

// Header Scroll Effect
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Smooth Scrolling Function
function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        const headerHeight = header.offsetHeight;
        const elementPosition = element.offsetTop - headerHeight;
        
        window.scrollTo({
            top: elementPosition,
            behavior: 'smooth'
        });
    }
}

// Tech Watch Filter Functionality
const filterTabs = document.querySelectorAll('.filter-tab');
const articleCards = document.querySelectorAll('.article-card');

filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Remove active class from all tabs
        filterTabs.forEach(t => t.classList.remove('active'));
        // Add active class to clicked tab
        tab.classList.add('active');
        
        const category = tab.getAttribute('data-category');
        
        // Filter articles
        articleCards.forEach(card => {
            const cardCategory = card.getAttribute('data-category');
            
            if (category === 'all' || cardCategory === category) {
                card.style.display = 'block';
                card.style.animation = 'fade-in 0.5s ease-out';
            } else {
                card.style.display = 'none';
            }
        });
    });
});

// Contact Form Handling
contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(contactForm);
    const data = Object.fromEntries(formData);
    
    // Simple validation
    if (!data.firstName || !data.lastName || !data.email || !data.subject || !data.message) {
        showNotification('Veuillez remplir tous les champs.', 'error');
        return;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(data.email)) {
        showNotification('Veuillez entrer une adresse email valide.', 'error');
        return;
    }
    
    // Simulate form submission
    const submitButton = contactForm.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
    submitButton.disabled = true;
    
    setTimeout(() => {
        showNotification('Message envoyé avec succès ! Je vous répondrai rapidement.', 'success');
        contactForm.reset();
        submitButton.innerHTML = originalText;
        submitButton.disabled = false;
    }, 2000);
});

// Notification System
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
            <span>${message}</span>
            <button class="notification-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 10000;
        background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        transform: translateX(100%);
        transition: transform 0.3s ease;
        max-width: 400px;
    `;
    
    notification.querySelector('.notification-content').style.cssText = `
        display: flex;
        align-items: center;
        gap: 0.75rem;
    `;
    
    notification.querySelector('.notification-close').style.cssText = `
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        padding: 0;
        margin-left: auto;
    `;
    
    // Add to DOM
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Close functionality
    notification.querySelector('.notification-close').addEventListener('click', () => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => notification.remove(), 300);
    });
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => notification.remove(), 300);
        }
    }, 5000);
}

// CV Download Function
function downloadCV() {
    // Create a temporary link element
    const link = document.createElement('a');
    link.href = 'CV AOUZAL-Jawad.pdf'; // Make sure to place your CV file in the root directory
    link.download = 'CV AOUZAL-Jawad.pdf'; // Replace with your actual name
    
    // Check if file exists
    fetch(link.href)
        .then(response => {
            if (response.ok) {
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                showNotification('Téléchargement du CV en cours...', 'success');
            } else {
                showNotification('Fichier CV non trouvé. Veuillez placer votre CV (cv.pdf) dans le dossier racine.', 'error');
            }
        })
        .catch(() => {
            showNotification('Erreur lors du téléchargement. Veuillez réessayer.', 'error');
        });
}

// Intersection Observer for Animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            
            // Animate skill bars when CV section is visible
            if (entry.target.id === 'cv') {
                animateSkillBars();
            }
        }
    });
}, observerOptions);

// Observe elements for scroll animations
document.querySelectorAll('.fade-in-on-scroll, .slide-in-left-on-scroll, .slide-in-right-on-scroll, .scale-in-on-scroll').forEach(el => {
    observer.observe(el);
});

// Observe sections
document.querySelectorAll('section').forEach(section => {
    observer.observe(section);
});

// Animate Skill Bars
function animateSkillBars() {
    const skillBars = document.querySelectorAll('.skill-progress');
    skillBars.forEach((bar, index) => {
        setTimeout(() => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 100);
        }, index * 200);
    });
}

// Add scroll animations to elements
function addScrollAnimations() {
    // Project cards
    document.querySelectorAll('.project-card').forEach((card, index) => {
        card.classList.add('fade-in-on-scroll');
        card.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Article cards
    document.querySelectorAll('.article-card').forEach((card, index) => {
        card.classList.add('scale-in-on-scroll');
        card.style.animationDelay = `${index * 0.1}s`;
    });
    
    // CV cards
    document.querySelectorAll('.cv-card').forEach((card, index) => {
        if (index % 2 === 0) {
            card.classList.add('slide-in-left-on-scroll');
        } else {
            card.classList.add('slide-in-right-on-scroll');
        }
    });
}

// Bookmark functionality
document.querySelectorAll('.btn-bookmark').forEach(button => {
    button.addEventListener('click', () => {
        const icon = button.querySelector('i');
        const text = button.querySelector('span') || button.childNodes[2];
        
        if (icon.classList.contains('fa-bookmark')) {
            icon.classList.remove('fa-bookmark');
            icon.classList.add('fa-bookmark', 'fas');
            button.style.color = '#f59e0b';
            if (text) text.textContent = ' Sauvegardé';
            showNotification('Article sauvegardé !', 'success');
        } else {
            icon.classList.remove('fas');
            icon.classList.add('far');
            button.style.color = '';
            if (text) text.textContent = ' Sauvegarder';
            showNotification('Article retiré des favoris.', 'info');
        }
    });
});

// Typing Animation for Hero Title
function typeWriter(element, text, speed = 100) {
    let i = 0;
    element.innerHTML = '';
    
    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

// Parallax Effect for Hero Section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallaxElements = document.querySelectorAll('.hero-bg');
    
    parallaxElements.forEach(element => {
        const speed = 0.5;
        element.style.transform = `translateY(${scrolled * speed}px)`;
    });
});

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    addScrollAnimations();
    
    // Add page transition
    document.body.classList.add('page-transition');
    
    // Animate hero elements on load
    setTimeout(() => {
        const heroElements = document.querySelectorAll('.animate-fade-in, .animate-fade-in-delay, .animate-fade-in-delay-2, .animate-fade-in-delay-3');
        heroElements.forEach(element => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        });
    }, 500);
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const headerHeight = header.offsetHeight;
            const elementPosition = target.offsetTop - headerHeight;
            
            window.scrollTo({
                top: elementPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Add loading states to external links
document.querySelectorAll('a[href^="http"]').forEach(link => {
    link.addEventListener('click', (e) => {
        const originalText = link.innerHTML;
        link.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Chargement...';
        
        setTimeout(() => {
            link.innerHTML = originalText;
        }, 2000);
    });
});

// Performance optimization: Lazy load images
const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.classList.remove('lazy');
            imageObserver.unobserve(img);
        }
    });
});

document.querySelectorAll('img[data-src]').forEach(img => {
    imageObserver.observe(img);
});

// Add keyboard navigation support
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        // Close mobile menu
        navMenu.classList.remove('active');
        const icon = navToggle.querySelector('i');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
        
        // Close any open notifications
        document.querySelectorAll('.notification').forEach(notification => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => notification.remove(), 300);
        });
    }
});

// Add focus management for accessibility
const focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';

function trapFocus(element) {
    const focusableContent = element.querySelectorAll(focusableElements);
    const firstFocusableElement = focusableContent[0];
    const lastFocusableElement = focusableContent[focusableContent.length - 1];

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            if (e.shiftKey) {
                if (document.activeElement === firstFocusableElement) {
                    lastFocusableElement.focus();
                    e.preventDefault();
                }
            } else {
                if (document.activeElement === lastFocusableElement) {
                    firstFocusableElement.focus();
                    e.preventDefault();
                }
            }
        }
    });
}

// Initialize focus trap for mobile menu
navToggle.addEventListener('click', () => {
    if (navMenu.classList.contains('active')) {
        trapFocus(navMenu);
    }
});

console.log('Portfolio BTS SIO SLAM - Thème Cinéma chargé avec succès ! 🎬');