@extends('layouts.app')

@section('title', 'Register - Smartify Tech')

@section('content')

<!-- Register Info Section -->
<section class="register-info-section">
    <div class="register-info-container">
        <div class="register-info-content">
            <div class="register-info-header">
                <h2 class="register-info-title">Join our network</h2>
                <p class="register-info-subtitle">Access exclusive services and benefits by becoming a registered partner</p>
            </div>
            
            <div class="register-form-wrapper">
                <form class="modern-register-form" method="post" action="{{ route('register.submit') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="Email" required>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-input" placeholder="Password" required>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Confirm Password" required>
                            @error('password_confirmation')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" id="company_name" name="company_name" class="form-input" value="{{ old('company_name') }}" placeholder="Company Name" required>
                            @error('company_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" id="phone" name="phone" class="form-input" value="{{ old('phone') }}" placeholder="Phone" required>
                            @error('phone')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Type</label>
                            <select id="type" name="type" class="form-input" required>
                                <option value="">Select Type</option>
                                <option value="supplier" {{ old('type') == 'supplier' ? 'selected' : '' }}>Supplier</option>
                                <option value="client" {{ old('type') == 'client' ? 'selected' : '' }}>Client</option>
                            </select>
                            @error('type')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="general_info" class="form-label">General information</label>
                        <textarea id="general_info" name="general_info" class="form-textarea" placeholder="General information">{{ old('general_info') }}</textarea>
                        @error('general_info')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bank_details" class="form-label">Bank details</label>
                            <textarea id="bank_details" name="bank_details" class="form-textarea" placeholder="Bank details">{{ old('bank_details') }}</textarea>
                            @error('bank_details')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="references" class="form-label">References</label>
                            <textarea id="references" name="references" class="form-textarea" placeholder="References">{{ old('references') }}</textarea>
                            @error('references')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="authorization" class="form-label">Authorization for online and phone orders</label>
                        <textarea id="authorization" name="authorization" class="form-textarea" placeholder="Authorization for online and phone orders">{{ old('authorization') }}</textarea>
                        @error('authorization')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="traders" class="form-label">IMPORTANT - PLEASE SUPPLY THE FOLLOWING - FLEET LIST</label>
                        <textarea id="traders" name="traders" class="form-textarea" placeholder="IMPORTANT - PLEASE SUPPLY THE FOLLOWING - FLEET LIST">{{ old('traders') }}</textarea>
                        @error('traders')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="terms" class="form-label">Terms and Conditions</label>
                            <textarea id="terms" name="terms" class="form-textarea" placeholder="Terms and Conditions">{{ old('terms') }}</textarea>
                            @error('terms')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contact_purchase" class="form-label">Contact for sale & purchase</label>
                            <textarea id="contact_purchase" name="contact_purchase" class="form-textarea" placeholder="Contact for sale & purchase">{{ old('contact_purchase') }}</textarea>
                            @error('contact_purchase')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Do you agree?</label>
                            <div class="form-radio">
                                <label><input type="radio" name="agree" value="yes" {{ old('agree') == 'yes' ? 'checked' : '' }} required> Don't agree</label>
                                <label><input type="radio" name="agree" value="no" {{ old('agree') == 'no' ? 'checked' : '' }} required> Agree</label>
                            </div>
                            @error('agree')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="submit-btn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M19 21H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8z"/>
                                <polyline points="17,2 17,8 23,8"/>
                                <line x1="15" y1="13" x2="7" y2="13"/>
                                <line x1="15" y1="17" x2="7" y2="17"/>
                            </svg>
                            <span>Submit Registration</span>
                        </button>
                    </div>
                </form>
            </div>
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
