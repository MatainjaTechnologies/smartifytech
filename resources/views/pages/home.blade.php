@extends('layouts.app')

@section('title', 'Smartify Tech')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- Modern Hero Section -->
{{-- <section class="hero-section" style="background-color: white;">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-left">
                <div class="hero-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Smartify Tech Logo" class="logo-img">
                    <h1 class="hero-title">Smartify Tech</h1>
                </div>
                <div class="hero-description">
                    <p class="hero-tagline">{{ __('messages.hero_tagline') }}</p>
                    <p class="hero-subtitle">{{ __('messages.hero_subtitle') }}</p>
                </div>
                <div class="hero-actions">
                    <a href="{{ route('contact') }}" class="btn-primary">{{ __('messages.contact_us') }}</a>
                    <a href="{{ route('register') }}" class="btn-secondary">{{ __('messages.register_now') }}</a>
                </div>
            </div>

            <div class="hero-right">
                <div class="hero-image-container"
                     style="position: relative; width: 100%; height: 420px; overflow: hidden;">

                    @if(isset($banners) && $banners->count())
                        @foreach($banners as $index => $banner)
                            <img
                                src="{{ asset('storage/' . $banner->image) }}"
                                alt="Banner"
                                data-slide
                                style="
                                    position: absolute;
                                    inset: 0;
                                    width: 100%;
                                    height: 100%;
                                    object-fit: contain;
                                    opacity: {{ $index === 0 ? '1' : '0' }};
                                    transition: opacity 1s ease-in-out;
                                "
                            >
                        @endforeach
                    @else
                        <img src="{{ asset('images/hero-image1.png') }}"
                             alt="Hero Image"
                             class="hero-image slideshow-image">
                        <img src="{{ asset('images/hero-image2.png') }}"
                             alt="Hero Image"
                             class="hero-image slideshow-image">
                    @endif

                    <div class="hero-image-bg"></div>
                </div>
            </div>

        </div>
    </div>
</section> --}}

<section class="hero-container-home">
    <div class="banner-frame">

        @if(isset($banners) && $banners->count())
            @foreach($banners as $index => $banner)
                <img src="{{ asset('storage/' . $banner->image) }}" 
                     alt="Banner" 
                     class="banner-img"
                     data-slide
                     style="opacity: {{ $index === 0 ? '1' : '0' }};">
            @endforeach
        @else
            <img src="{{ asset('images/hero-image1.png') }}" 
                 alt="Hero Banner" 
                 class="banner-img"
                 style="opacity: 1;">
        @endif

    </div>
</section>

<!-- Modern About Section -->
<!-- <section class="about-section"> -->
<section id="about-section" class="about-section">
    <div class="about-container">
        <div class="about-header">
            <h2 class="about-title">{{ __('messages.about_us') }}</h2>
            <div class="about-divider"></div>
        </div>
        
        <div class="about-content">
            <div class="about-left">
                <div class="about-image-card">
                    <img src="{{ asset('images/about-image.png') }}" alt="Diverse team brainstorming ideas on whiteboard" class="about-image">
                    <div class="about-image-overlay"></div>
                </div>
            </div>
            
            <div class="about-right">
                <div class="about-text">
                    <h3 class="about-heading">{{ __('messages.about_heading') }}</h3>
                    <div class="about-description">
                        <p>{{ __('messages.about_p1') }}</p>
                        <p>{{ __('messages.about_p2') }}</p>
                        <p>{{ __('messages.about_p3') }}</p>
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
                            <h4>{{ __('messages.feature1_title') }}</h4>
                            <p>{{ __('messages.feature1_desc') }}</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h4>{{ __('messages.feature2_title') }}</h4>
                            <p>{{ __('messages.feature2_desc') }}</p>
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
                            <h4>{{ __('messages.feature3_title') }}</h4>
                            <p>{{ __('messages.feature3_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="about-gallery">
            <div class="gallery-item">
                <img src="{{ asset('images/gallery-image.png') }}" alt="Diverse team brainstorming ideas on whiteboard" class="gallery-image">
                <div class="gallery-overlay">
                    <div class="gallery-text">
                        <h4>{{ __('messages.gallery_title') }}</h4>
                        <p>{{ __('messages.gallery_desc') }}</p>
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
            <h2 class="cta-title">{{ __('messages.cta_title') }}</h2>
            <p class="cta-description">{{ __('messages.cta_desc') }}</p>
            <div class="cta-actions">
                <a href="{{ route('register') }}" class="btn-cta-primary">{{ __('messages.get_started') }}</a>
                <a href="{{ route('contact') }}" class="btn-cta-secondary">{{ __('messages.learn_more') }}</a>
            </div>
        </div>
        <!-- <div class="cta-decoration">
            <img src="{{ asset('images/cta-line.png') }}" alt="Line" class="cta-line">
        </div> -->
    </div>
</section>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('[data-slide]');
        let current = 0;

        if (slides.length <= 1) return;

        setInterval(() => {
            slides[current].style.opacity = '0';
            current = (current + 1) % slides.length;
            slides[current].style.opacity = '1';
        }, 4000); // change slide every 4 seconds
    });
</script>

