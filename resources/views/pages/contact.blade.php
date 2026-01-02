@extends('layouts.app')

@section('title', 'Contact - Smartify Tech')

@section('content')
<!-- Modern Contact Hero Section -->
<section class="contact-hero">
    <div class="contact-hero-container">
        <div class="contact-hero-content">
            <div class="contact-hero-left">
                <div class="contact-logo">
                    <img src="https://dutch-fix.com/wp-content/uploads/2025/02/DFS.png" alt="DutchFix Logo" class="contact-logo-img">
                </div>
                <div class="contact-hero-text">
                    <h1 class="contact-hero-title">Contact us now!</h1>
                    <p class="contact-hero-subtitle">Get in touch with our team for all your consumer electronics needs</p>
                    <a href="https://dutch-fix.com/wp-content/uploads/2025/03/Price.pdf" target="_blank" class="price-list-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14,2 14,8 20,8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                        <span>Price list</span>
                    </a>
                </div>
            </div>
            <div class="contact-hero-right">
                <!-- Right side content can be used for additional elements or left empty -->
            </div>
        </div>
    </div>
</section>

<!-- Supplier/Client Section -->
<section class="supplier-client-section">
    <div class="supplier-client-container">
        <div class="supplier-client-grid">
            <div class="supplier-card">
                <div class="supplier-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#6c757d" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                        <polyline points="3.27,6.96 12,12.01 20.73,6.96"/>
                        <line x1="12" y1="22.08" x2="12" y2="12"/>
                    </svg>
                </div>
                <h3 class="supplier-title">Supplier</h3>
                <a href="https://dutch-fix.com/register/" target="_blank" class="supplier-btn">Download List</a>
            </div>
            
            <div class="client-card">
                <div class="client-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#6c757d" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3 class="client-title">Client</h3>
                <a href="https://dutch-fix.com/register/" target="_blank" class="client-btn">Download list</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="contact-form-section">
    <div class="contact-form-container">
        <div class="contact-form-content">
            <div class="contact-form-header">
                <h2 class="contact-form-title">Get in Touch</h2>
                <p class="contact-form-subtitle">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
            </div>
            
            <div class="contact-form-wrapper">
                <form class="modern-contact-form" method="post" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name" class="form-label">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                                Full Name
                            </label>
                            <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" placeholder="John Doe" required>
                            @error('name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                                Email Address
                            </label>
                            <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="john@example.com" required>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone" class="form-label">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                                Phone Number
                            </label>
                            <input type="tel" id="phone" name="phone" class="form-input" value="{{ old('phone') }}" placeholder="+31 6 87 06 26 26" pattern="[0-9\s\-]{3,17}" title="Only numbers allowed. Minimum length: 3 characters. Maximum length: 17 characters." maxlength="17" required>
                            @error('phone')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subject" class="form-label">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                                </svg>
                                Subject
                            </label>
                            <input type="text" id="subject" name="subject" class="form-input" value="{{ old('subject') }}" placeholder="How can we help?" required>
                            @error('subject')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="form-label">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14,2 14,8 20,8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                            </svg>
                            Message
                        </label>
                        <textarea id="message" name="message" class="form-textarea" placeholder="Tell us more about your needs and requirements...">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="submit-btn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="22" y1="2" x2="11" y2="13"/>
                                <polygon points="22,2 15,22 11,13"/>
                                <circle cx="11" cy="11" r="9"/>
                            </svg>
                            <span>Send Message</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Office Location Section -->
<section class="office-location-section">
    <div class="office-location-container">
        <div class="office-location-header">
            <h2 class="office-location-title">Visit Our Office</h2>
            <p class="office-location-subtitle">Come visit us at our Rotterdam headquarters</p>
        </div>
        
        <div class="office-location-content">
            <div class="office-map">
                <iframe loading="lazy" width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&height=450&hl=en&q=Innsbruckweg%2096%20%203047%20AH%20Rotterdam+(DutchFix)&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe>
            </div>
            
            <div class="office-info">
                <div class="office-details">
                    <h3 class="office-name">Dutchfix Service B.V.</h3>
                    <div class="office-address">
                        <p class="address-line">Innsbruckweg 96</p>
                        <p class="address-line">3047 AH Rotterdam</p>
                    </div>
                    <div class="office-contact">
                        <p class="contact-email">Finance@dutch-fix.com</p>
                        <p class="contact-phone">+31 6 87 06 26 26</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Decorative Line -->
<section class="decorative-section">
    <div class="decorative-container">
        <img src="https://dutch-fix.com/wp-content/uploads/2025/02/Line.png" alt="Line" class="decorative-line">
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
                    <p>&copy; 2026 Smartify Tech. All rights reserved.</p>
                </div>
                <div class="footer-credits">
                    <p>Designed by <a href="https://libaxis.com/" class="footer-credit-link">LIB<span class="credit-highlight">A</span>XIS</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
