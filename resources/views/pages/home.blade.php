@extends('layouts.app')

@section('title', 'Smartify Tech')

@section('content')
<!-- Modern Hero Section -->
<section class="hero-section">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-left">
                <div class="hero-logo">
                    <img src="https://dutch-fix.com/wp-content/uploads/2025/02/DFS.png" alt="DutchFix Logo" class="logo-img">
                    <h1 class="hero-title">Smartify Tech</h1>
                </div>
                <div class="hero-description">
                    <p class="hero-tagline">Your Trusted Partner in Consumer Electronics</p>
                    <p class="hero-subtitle">Specialist wholesaler with 20+ years of experience serving B2B clients throughout Europe</p>
                </div>
                <div class="hero-actions">
                    <a href="{{ route('contact') }}" class="btn-primary">Contact Us</a>
                    <a href="{{ route('register') }}" class="btn-secondary">Register Now</a>
                </div>
            </div>
            <div class="hero-right">
                <div class="hero-image-container">
                    <img src="https://dutch-fix.com/wp-content/uploads/2025/02/iphone-hd.png" alt="iPhone" class="hero-image">
                    <div class="hero-image-bg"></div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Modern About Section -->
<section class="about-section">
    <div class="about-container">
        <div class="about-header">
            <h2 class="about-title">About Us</h2>
            <div class="about-divider"></div>
        </div>
        
        <div class="about-content">
            <div class="about-left">
                <div class="about-image-card">
                    <img src="https://dutch-fix.com/wp-content/uploads/2025/02/ax2-scaled.jpg" alt="Diverse team brainstorming ideas on whiteboard" class="about-image">
                    <div class="about-image-overlay"></div>
                </div>
            </div>
            
            <div class="about-right">
                <div class="about-text">
                    <h3 class="about-heading">Our Passionate Team Will Take You To The Top</h3>
                    <div class="about-description">
                        <p>DutchFix Service is a specialist wholesaler in consumer electronics such as mobile phones, tablets, gaming, mobile accessories and household appliances.</p>
                        <p>Our more than 20 years of experience in this branch, we are a trusted partner for our suppliers as well as for our customers throughout Europe. Our business segment is B2B.</p>
                        <p>We have faith in long haul associations with our clients dependent on common trust and regard. Dependability is our most significant standard in business.</p>
                    </div>
                </div>
                
                <div class="about-features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h4>20+ Years Experience</h4>
                            <p>Trusted industry expertise</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h4>B2B Focus</h4>
                            <p>Dedicated business solutions</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M2 12h20"/>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h4>European Reach</h4>
                            <p>Serving clients across Europe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="about-gallery">
            <div class="gallery-item">
                <img src="https://dutch-fix.com/wp-content/uploads/2025/02/ax1-scaled.jpg" alt="Diverse team brainstorming ideas on whiteboard" class="gallery-image">
                <div class="gallery-overlay">
                    <div class="gallery-text">
                        <h4>Expert Team</h4>
                        <p>Professional and experienced staff</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern CTA Section -->
<section class="cta-section">
    <div class="cta-container">
        <div class="cta-content">
            <h2 class="cta-title">Ready to Partner With Us?</h2>
            <p class="cta-description">Join our network of trusted suppliers and clients across Europe</p>
            <div class="cta-actions">
                <a href="{{ route('register') }}" class="btn-cta-primary">Get Started</a>
                <a href="{{ route('contact') }}" class="btn-cta-secondary">Learn More</a>
            </div>
        </div>
        <div class="cta-decoration">
            <img src="https://dutch-fix.com/wp-content/uploads/2025/02/Line.png" alt="Line" class="cta-line">
        </div>
    </div>
</section>

<!-- Modern Footer -->
<footer class="modern-footer">
    <div class="footer-container">
        <!-- Footer Top Section -->
        <div class="footer-top">
            <div class="footer-content">
                <div class="footer-brand">
                    <img src="https://dutch-fix.com/wp-content/uploads/2025/02/DFS-w.png" alt="DutchFix Logo" class="footer-logo">
                    <p class="footer-description">Your trusted partner in consumer electronics with 20+ years of experience serving B2B clients throughout Europe.</p>
                    <div class="footer-social">
                        <a href="https://api.whatsapp.com/send/?phone=31687062626&text&type=phone_number&app_absent=0" class="social-link whatsapp" target="_blank">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.488"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="footer-links">
                    <div class="footer-column">
                        <h3 class="footer-title">Quick Links</h3>
                        <ul class="footer-list">
                            <li><a href="{{ route('home') }}" class="footer-link">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="footer-link">Contact</a></li>
                            <li><a href="{{ route('register') }}" class="footer-link">Register</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3 class="footer-title">Services</h3>
                        <ul class="footer-list">
                            <li><a href="#" class="footer-link">Consumer Electronics</a></li>
                            <li><a href="#" class="footer-link">B2B Solutions</a></li>
                            <li><a href="#" class="footer-link">European Distribution</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3 class="footer-title">Legal</h3>
                        <ul class="footer-list">
                            <li><a href="#" class="footer-link">Algemene Voorwaarden</a></li>
                            <li><a href="#" class="footer-link">Privacy Verklaring</a></li>
                            <li><a href="#" class="footer-link">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom Section -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <div class="footer-copyright">
                    <p>&copy; 2026 Smartify Tech All rights reserved.</p>
                </div>
                <div class="footer-credits">
                    <p>Designed by <a href="https://libaxis.com/" class="footer-credit-link">LIB<span class="credit-highlight">A</span>XIS</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

@endsection
