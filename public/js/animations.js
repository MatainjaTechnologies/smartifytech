// Enhanced Animation Controller for All Pages
document.addEventListener('DOMContentLoaded', function() {
    // Initialize animations with delays
    initializeAnimations();
    
    // Smooth scroll behavior for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Enhanced Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                
                // Add staggered animation for child elements
                const children = entry.target.querySelectorAll('*');
                children.forEach((child, index) => {
                    setTimeout(() => {
                        child.style.opacity = '1';
                        child.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            }
        });
    }, observerOptions);

    // Observe elements with animation classes
    const animatedElements = document.querySelectorAll('.animate-on-scroll, section, .feature-item, .gallery-item, .supplier-card, .client-card, .contact-form-wrapper');
    animatedElements.forEach(el => {
        el.classList.add('animate-on-scroll');
        observer.observe(el);
    });

    // Enhanced parallax effect for hero sections
    const parallaxElements = document.querySelectorAll('.hero-section, .contact-hero, .register-hero');
    
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        
        parallaxElements.forEach(element => {
            const speed = element.classList.contains('parallax-slow') ? 0.3 : 0.5;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });

    // Enhanced hover effects with magnetic cursor
    const cards = document.querySelectorAll('.supplier-card, .client-card, .feature-item, .gallery-item');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.classList.add('glow');
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.classList.remove('glow');
        });

        // Magnetic effect
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            this.style.transform = `translateY(-8px) scale(1.02) rotateX(${-y * 0.1}deg) rotateY(${x * 0.1}deg)`;
        });
    });

    // Enhanced button ripple effect
    const buttons = document.querySelectorAll('.btn-primary, .btn-secondary, .submit-btn, .supplier-btn, .client-btn, .price-list-btn');
    
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });

        // Button hover magnetic effect
        button.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            this.style.transform = `translateY(-3px) translateX(${x * 0.1}px) translateY(${y * 0.1}px)`;
        });

        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(-3px)';
        });
    });

    // Loading animation for images
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        img.addEventListener('load', function() {
            this.style.animation = 'imageLoad 0.6s ease-out';
        });
    });

    // Enhanced form input animations
    const formInputs = document.querySelectorAll('.form-input, .form-textarea');
    
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
            this.parentElement.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
            this.parentElement.style.transform = 'scale(1)';
        });

        // Floating label effect
        input.addEventListener('input', function() {
            if (this.value) {
                this.parentElement.classList.add('has-value');
            } else {
                this.parentElement.classList.remove('has-value');
            }
        });
    });

    // Typewriter effect for headings
    const typewriterElements = document.querySelectorAll('.typewriter');
    typewriterElements.forEach(element => {
        const text = element.textContent;
        element.textContent = '';
        element.style.opacity = '1';
        
        let index = 0;
        const typeWriter = () => {
            if (index < text.length) {
                element.textContent += text.charAt(index);
                index++;
                setTimeout(typeWriter, 100);
            }
        };
        
        setTimeout(typeWriter, 500);
    });

    // Floating animation for logos and icons
    const floatingElements = document.querySelectorAll('.contact-logo, .supplier-icon, .client-icon');
    floatingElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.5}s`;
        element.classList.add('floating');
    });

    // Pulse animation for important buttons
    const importantButtons = document.querySelectorAll('.submit-btn, .price-list-btn');
    importantButtons.forEach(button => {
        button.classList.add('pulse');
    });

    // Glow animation on scroll
    window.addEventListener('scroll', () => {
        const glowElements = document.querySelectorAll('.glow');
        glowElements.forEach(element => {
            const rect = element.getBoundingClientRect();
            const isInViewport = rect.top >= 0 && rect.bottom <= window.innerHeight;
            
            if (isInViewport) {
                element.style.animation = 'glow 2s ease-in-out infinite alternate';
            }
        });
    });

    // Staggered animation for lists
    const staggeredLists = document.querySelectorAll('.stagger-fade');
    staggeredLists.forEach(list => {
        const items = list.children;
        Array.from(items).forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                item.style.transition = 'all 0.6s ease-out';
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, index * 200);
        });
    });
});

// Initialize animations function
function initializeAnimations() {
    // Add page transition class to body
    document.body.classList.add('page-transition');
    
    // Add entrance animations to sections
    const sections = document.querySelectorAll('section');
    sections.forEach((section, index) => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(50px)';
        
        setTimeout(() => {
            section.style.transition = 'all 0.8s ease-out';
            section.style.opacity = '1';
            section.style.transform = 'translateY(0)';
        }, index * 300);
    });

    // Add rotation to decorative elements
    const decorativeElements = document.querySelectorAll('.decorative-line img');
    decorativeElements.forEach(element => {
        element.classList.add('rotate-slow');
    });
}

// Add CSS for enhanced animations
const enhancedAnimationCSS = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes imageLoad {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .form-group.focused {
        transform: scale(1.02);
    }
    
    .form-group.focused .form-label {
        color: #6c757d;
        transform: translateY(-2px);
    }
    
    .form-group.has-value .form-label {
        color: #6c757d;
        font-size: 0.9em;
        transform: translateY(-8px);
    }
    
    .animated {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    
    /* Enhanced hover effects */
    .card-hover-effect {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover-effect:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    /* Loading skeleton animation */
    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }
    
    @keyframes loading {
        0% {
            background-position: 200% 0;
        }
        100% {
            background-position: -200% 0;
        }
    }
`;

// Inject enhanced animation CSS
const styleSheet = document.createElement('style');
styleSheet.textContent = enhancedAnimationCSS;
document.head.appendChild(styleSheet);
