@extends('layouts.app')

@section('title', 'Terms & Conditions - Smartify Tech')

@section('content')

    <div class="page-padding modern-terms">
        <section class="terms-section">
            <div class="terms-container">

                <!-- Header -->
                <div class="terms-header modern-header1">
                    <h1 class="terms-title">{{ __('messages.terms_conditions') }}</h1>
                    <p class="terms-subtitle">
                        {{ __('messages.agreement_terms') }}
                    </p>
                </div>

                <!-- Agreement Content -->
                <div class="terms-agreement modern-agreement">

                    <div class="agreement-item modern-item">
                        <span class="agreement-title modern-badge">1</span>
                        <p>
                            {{ __('messages.term1') }}
                        </p>
                    </div>

                    <div class="agreement-item modern-item">
                        <span class="agreement-title modern-badge">2</span>
                        <p>
                            {{ __('messages.term2') }}
                        </p>
                    </div>

                    <div class="agreement-item modern-item">
                        <span class="agreement-title modern-badge">3</span>
                        <p>
                            {{ __('messages.term3') }}
                        </p>
                    </div>

                    <div class="agreement-item modern-item">
                        <span class="agreement-title modern-badge">4</span>
                        <p>
                            {{ __('messages.term4') }}
                        </p>
                    </div>

                    <div class="agreement-item modern-item">
                        <span class="agreement-title modern-badge">5</span>
                        <p>
                            {{ __('messages.term5') }}
                        </p>
                    </div>

                </div>

            </div>
        </section>
    </div>

@endsection
