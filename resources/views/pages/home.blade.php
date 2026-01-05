@extends('layouts.app')

@section('title', 'Smartify Tech')

@section('content')
<!-- Modern Hero Section -->
<section class="hero-section" style="background-color: white;">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-left">
                <div class="hero-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Smartify Tech Logo" class="logo-img">
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

@endsection
