@extends('layouts.app')

@section('title', 'About - DutchFix Services')

@section('content')
<div class="container">
    <!-- Navigation Links as Content -->
    <div class="nav-links">
        <a href="https://api.whatsapp.com/send/?phone=31687062626&text&type=phone_number&app_absent=0">Whatsapp</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="{{ route('register') }}">Register</a>
        <a href="https://dutch-fix.com/nl/">https://dutch-fix.com/nl/</a>
    </div>

    <!-- About Content -->
    <div class="about-section">
        <h1>About DutchFix Services</h1>
        <p><strong>DutchFix Service B.V.</strong> is a leading service provider based in Rotterdam, Netherlands. We specialize in connecting suppliers with clients, providing efficient and reliable service solutions that meet the diverse needs of modern businesses.</p>
        
        <h2>Our Mission</h2>
        <p>To bridge the gap between suppliers and clients through innovative service solutions, ensuring seamless communication and efficient business operations.</p>
        
        <h2>What We Do</h2>
        <p>We offer comprehensive service management solutions that help businesses streamline their operations. Our platform serves as a trusted intermediary, facilitating connections and ensuring quality service delivery.</p>
        
        <h2>Why Choose Us</h2>
        <ul>
            <li>Professional and reliable service</li>
            <li>Extensive network of suppliers and clients</li>
            <li>Competitive pricing and transparent processes</li>
            <li>Dedicated customer support</li>
            <li>Innovative solutions tailored to your needs</li>
        </ul>

        <h2>Our Statistics</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <strong>1000+</strong>
                <p>Active Clients</p>
            </div>
            <div class="stat-item">
                <strong>500+</strong>
                <p>Verified Suppliers</p>
            </div>
            <div class="stat-item">
                <strong>99%</strong>
                <p>Customer Satisfaction</p>
            </div>
            <div class="stat-item">
                <strong>24/7</strong>
                <p>Support Available</p>
            </div>
        </div>
    </div>

    <!-- Office Information -->
    <div class="office-section">
        <h2>Visit Our Office</h2>
        <div class="office-info">
            <p><strong>Dutchfix Service B.V.</strong></p>
            <p>Innsbruckweg 96</p>
            <p>3047 AH Rotterdam</p>
            <p>Finance@dutch-fix.com</p>
            <p>+31 6 87 06 26 26</p>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="cta-section">
        <h2>Ready to Work With Us?</h2>
        <p>Join our network of satisfied clients and trusted suppliers</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="btn-primary">Register Now</a>
            <a href="{{ route('contact') }}" class="btn-secondary">Contact Us</a>
        </div>
    </div>

    <!-- Footer Links -->
    <div class="footer-links">
        <p><a href="#">Algemene Voorwaarden</a> | <a href="#">Privacy Verklaring</a></p>
        <p>Copyright of <a href="https://libaxis.com/">LIBAXIS</a>2025 – DutchFix Service B.V.</p>
        <p><a href="https://api.whatsapp.com/send/?phone=31687062626&text&type=phone_number&app_absent=0">WhatsApp</a></p>
    </div>
</div>

<style>
/* About Page Styles */
.nav-links {
    margin: 20px 0;
}

.nav-links a {
    display: block;
    margin: 5px 0;
    color: #0066cc;
    text-decoration: none;
}

.nav-links a:hover {
    text-decoration: underline;
}

.about-section {
    margin: 30px 0;
}

.about-section h1 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

.about-section h2 {
    font-size: 1.5rem;
    margin: 25px 0 15px 0;
    color: #333;
}

.about-section p {
    margin: 15px 0;
    color: #333;
    line-height: 1.6;
}

.about-section ul {
    margin: 15px 0;
    padding-left: 20px;
}

.about-section li {
    margin: 8px 0;
    color: #333;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin: 25px 0;
}

.stat-item {
    text-align: center;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 5px;
    border: 1px solid #dee2e6;
}

.stat-item strong {
    display: block;
    font-size: 2rem;
    color: #0066cc;
    margin-bottom: 5px;
}

.stat-item p {
    margin: 0;
    color: #666;
    font-weight: 500;
}

.office-section {
    margin: 30px 0;
}

.office-section h2 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
}

.office-info p {
    margin: 5px 0;
    color: #333;
}

.cta-section {
    margin: 40px 0;
    text-align: center;
    padding: 30px;
    background: #f8f9fa;
    border-radius: 5px;
    border: 1px solid #dee2e6;
}

.cta-section h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333;
}

.cta-section p {
    margin-bottom: 20px;
    color: #666;
}

.cta-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-primary, .btn-secondary {
    display: inline-block;
    padding: 12px 24px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 500;
    transition: background-color 0.3s;
}

.btn-primary {
    background: #0066cc;
    color: white;
}

.btn-primary:hover {
    background: #0052a3;
}

.btn-secondary {
    background: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background: #545b62;
}

.footer-links {
    margin: 40px 0 20px 0;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.footer-links p {
    margin: 8px 0;
    color: #666;
    font-size: 14px;
}

.footer-links a {
    color: #0066cc;
    text-decoration: none;
}

.footer-links a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-primary, .btn-secondary {
        width: 200px;
        text-align: center;
    }
}
</style>
@endsection
