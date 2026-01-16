@extends('layouts.app')

@section('title', 'Terms & Conditions - Smartify Tech')

@section('content')

<!-- Modern Terms Hero Section -->
<section class="terms-hero" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="terms-hero-container">
        <div class="terms-hero-content">
            <div class="terms-hero-left">
                <div class="terms-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Smartify Tech Logo" class="terms-logo-img">
                </div>
                <div class="terms-hero-text">
                    <h1 class="terms-hero-title">{{ __('messages.terms_conditions') }}</h1>
                    <p class="terms-hero-subtitle">{{ __('messages.agreement_terms') }}</p>
                </div>
            </div>
            <div class="terms-hero-right">
                <div class="terms-hero-image">
                    <img src="{{ asset('images/terms.png') }}" alt="Terms and Conditions" class="terms-image">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Terms Content Section -->
<section class="terms-content-section">
    <div class="terms-content-container">
        <div class="terms-content-grid">
            
            <div class="terms-item">
                <div class="terms-number">1</div>
                <div class="terms-text">
                    <h3>{{ __('messages.acceptance_of_terms') }}</h3>
                    <p>{{ __('messages.term1') }}</p>
                </div>
            </div>

            <div class="terms-item">
                <div class="terms-number">2</div>
                <div class="terms-text">
                    <h3>{{ __('messages.service_description') }}</h3>
                    <p>{{ __('messages.term2') }}</p>
                </div>
            </div>

            <div class="terms-item">
                <div class="terms-number">3</div>
                <div class="terms-text">
                    <h3>{{ __('messages.user_responsibilities') }}</h3>
                    <p>{{ __('messages.term3') }}</p>
                </div>
            </div>

            <div class="terms-item">
                <div class="terms-number">4</div>
                <div class="terms-text">
                    <h3>{{ __('messages.privacy_policy') }}</h3>
                    <p>{{ __('messages.term4') }}</p>
                </div>
            </div>

            <div class="terms-item">
                <div class="terms-number">5</div>
                <div class="terms-text">
                    <h3>{{ __('messages.contact_information') }}</h3>
                    <p>{{ __('messages.term5') }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
