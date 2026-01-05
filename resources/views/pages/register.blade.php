@extends('layouts.app')

@section('title', 'Register - Smartify Tech')

@section('content')
<div class="register-form-wrapper">
    <div class="register-info-container">
        <div class="register-info-header">
            <h2 class="register-info-title">Join our network</h2>
            <p class="register-info-subtitle">Access exclusive services and benefits by becoming a registered partner</p>
        </div>
        
        <!-- Step Progress -->
        <div class="step-progress">
            <div class="step-item active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-title">General Information</div>
            </div>
            <div class="step-item" data-step="2">
                <div class="step-number">2</div>
                <div class="step-title">Company Details</div>
            </div>
            <div class="step-item" data-step="3">
                <div class="step-number">3</div>
                <div class="step-title">Business Information</div>
            </div>
            <div class="step-item" data-step="4">
                <div class="step-number">4</div>
                <div class="step-title">Contact Persons</div>
            </div>
            <div class="step-item" data-step="5">
                <div class="step-number">5</div>
                <div class="step-title">Documents</div>
            </div>
            <div class="step-item" data-step="6">
                <div class="step-number">6</div>
                <div class="step-title">Terms & Conditions</div>
            </div>
            <div class="step-item" data-step="7">
                <div class="step-number">7</div>
                <div class="step-title">Final Review</div>
            </div>
        </div>
        
        <form class="modern-register-form" method="post" action="{{ route('register.submit') }}" enctype="multipart/form-data">
            @csrf
                    
                    <!-- Step 1: General Information -->
                    <div class="form-step active" data-step="1">
                        <div class="step-header">
                            <h3>General information</h3>
                            <p>Smartify Tech Application</p>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email" class="form-label">Email address *</label>
                                <input type="email" id="email" name="email" class="form-input" placeholder="Your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password *</label>
                                <input type="password" id="password" name="password" class="form-input" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm Password *</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="company_name" class="form-label">Company Name *</label>
                                <input type="text" id="company_name" name="company_name" class="form-input" placeholder="Company name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone number *</label>
                                <input type="tel" id="phone" name="phone" class="form-input" placeholder="Phone number" required>
                            </div>
                            <div class="form-group">
                                <label for="type" class="form-label">Type *</label>
                                <select id="type" name="type" class="form-input" required>
                                    <option value="">Select Type</option>
                                    <option value="supplier">Supplier</option>
                                    <option value="client">Client</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="general_info" class="form-label">General information</label>
                                <textarea id="general_info" name="general_info" class="form-textarea" placeholder="General information"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 2: Company Details -->
                    <div class="form-step" data-step="2">
                        <div class="step-header">
                            <h3>Company details</h3>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="bank_name" class="form-label">Bank Name *</label>
                                <input type="text" id="bank_name" name="bank_name" class="form-input" placeholder="Bank name" required>
                            </div>
                            <div class="form-group">
                                <label for="iban" class="form-label">IBAN *</label>
                                <input type="text" id="iban" name="iban" class="form-input" placeholder="IBAN" required>
                            </div>
                            <div class="form-group">
                                <label for="swift" class="form-label">SWIFT/BIC *</label>
                                <input type="text" id="swift" name="swift" class="form-input" placeholder="SWIFT/BIC" required>
                            </div>
                            <div class="form-group">
                                <label for="account_holder" class="form-label">Account holder name *</label>
                                <input type="text" id="account_holder" name="account_holder" class="form-input" placeholder="Account holder name" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 3: Business Information -->
                    <div class="form-step" data-step="3">
                        <div class="step-header">
                            <h3>Business information</h3>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="type_of_business" class="form-label">Type of business *</label>
                                <input type="text" id="type_of_business" name="type_of_business" class="form-input" placeholder="Business type" required>
                            </div>
                            <div class="form-group">
                                <label for="legal_entity" class="form-label">Type of legal entity *</label>
                                <input type="text" id="legal_entity" name="legal_entity" class="form-input" placeholder="Legal entity type" required>
                            </div>
                            <div class="form-group">
                                <label for="ceo_name" class="form-label">CEO or legal representative full name *</label>
                                <input type="text" id="ceo_name" name="ceo_name" class="form-input" placeholder="CEO name" required>
                            </div>
                            <div class="form-group">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" id="website" name="website" class="form-input" placeholder="Website">
                            </div>
                            <div class="form-group">
                                <label for="invoice_address" class="form-label">Invoice/Delivery address *</label>
                                <input type="text" id="invoice_address" name="invoice_address" class="form-input" placeholder="Invoice address" required>
                            </div>
                            <div class="form-group">
                                <label for="delivery_address" class="form-label">Delivery address</label>
                                <input type="text" id="delivery_address" name="delivery_address" class="form-input" placeholder="Delivery address">
                            </div>
                            <div class="form-group">
                                <label for="accountant_name" class="form-label">Accountant name *</label>
                                <input type="text" id="accountant_name" name="accountant_name" class="form-input" placeholder="Accountant name" required>
                            </div>
                            <div class="form-group">
                                <label for="accountant_email" class="form-label">Accountant email address *</label>
                                <input type="email" id="accountant_email" name="accountant_email" class="form-input" placeholder="Accountant email" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="company_reg_no" class="form-label">Company registration NO. *</label>
                                <input type="text" id="company_reg_no" name="company_reg_no" class="form-input" placeholder="Registration NO." required>
                            </div>
                            <div class="form-group">
                                <label for="vat_reg_no" class="form-label">VAT Registration NO. *</label>
                                <input type="text" id="vat_reg_no" name="vat_reg_no" class="form-input" placeholder="VAT NO." required>
                            </div>
                            <div class="form-group">
                                <label for="num_employees" class="form-label">Number of employees *</label>
                                <input type="number" id="num_employees" name="num_employees" class="form-input" placeholder="Number of employees" required>
                            </div>
                            <div class="form-group">
                                <label for="date_registration" class="form-label">Date of registration *</label>
                                <input type="date" id="date_registration" name="date_registration" class="form-input" placeholder="Date of registration" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 4: Contact Persons -->
                    <div class="form-step" data-step="4">
                        <div class="step-header">
                            <h3>Contact persons</h3>
                        </div>
                        
                        <div class="person-section">
                            <h4>Person 1</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="contact1_name" class="form-label">Name *</label>
                                    <input type="text" id="contact1_name" name="contact1_name" class="form-input" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact1_phone" class="form-label">Phone *</label>
                                    <input type="tel" id="contact1_phone" name="contact1_phone" class="form-input" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact1_email" class="form-label">Email *</label>
                                    <input type="email" id="contact1_email" name="contact1_email" class="form-input" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="person-section">
                            <h4>Person 2</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="contact2_name" class="form-label">Name</label>
                                    <input type="text" id="contact2_name" name="contact2_name" class="form-input" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="contact2_phone" class="form-label">Phone</label>
                                    <input type="tel" id="contact2_phone" name="contact2_phone" class="form-input" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="contact2_email" class="form-label">Email</label>
                                    <input type="email" id="contact2_email" name="contact2_email" class="form-input" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 5: Documents -->
                    <div class="form-step" data-step="5">
                        <div class="step-header">
                            <h3>Documents</h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="company_incorporation" class="form-label">Company Incorporation Certificate *</label>
                            <input type="file" id="company_incorporation" name="company_incorporation" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>
                            <div class="form-group">
                                <label for="vat_certificate" class="form-label">VAT Certificate *</label>
                                <input type="file" id="vat_certificate" name="vat_certificate" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>
                            <div class="form-group">
                                <label for="completed_references" class="form-label">Completed references and company representatives *</label>
                                <input type="file" id="completed_references" name="completed_references" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>
                            <div class="form-group">
                                <label for="bank_account_details" class="form-label">Bank Account Details *</label>
                                <input type="file" id="bank_account_details" name="bank_account_details" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>
                            <div class="form-group">
                                <label for="utility_bill" class="form-label">Copy of recent utility bill (Electric/Water/Gas/Landline Telephone) *</label>
                                <input type="file" id="utility_bill" name="utility_bill" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>
                            <div class="form-group">
                                <label for="director_id" class="form-label">Director ID document *</label>
                                <input type="file" id="director_id" name="director_id" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 6: Terms & Conditions -->
                    <div class="form-step" data-step="6">
                        <div class="step-header">
                            <h3>Terms and Conditions</h3>
                        </div>
                        
                        <div class="terms-content">
                            <h4>Agreement to Company's Terms and Conditions</h4>
                            <div class="terms-text">
                                <p>1. The Customer acknowledges and agrees that the Company's Terms and Conditions for the Supply of Goods, which the Customer has received or are attached, will govern all sales to the Customer. The Customer agrees to adhere to the Terms for each transaction. The Customer understands that the Company may update these Terms occasionally, and revised Terms will apply to transactions after the Customer has been informed of any changes. All terms are attached on the final invoice.</p>
                                <p>2. The Customer acknowledges that acceptance of this application by the Company will result in a modification of the Terms. The Customer confirms that if credit facilities are granted, it will adhere to the payment terms outlined and agrees that failure to do so will allow the Company to immediately withdraw the credit facility without notice, making all outstanding amounts immediately due.</p>
                                <p>3. In evaluating this application for credit facilities, the Company will induct inquiries with credit reference DutchFix Service B.V. and other third parties. which may document these inquiries. The Company may also share information regarding the Customer's account activities, credit reference agencies and other third parties. Information obtained or provided to these agencies may be utilized for assessing future credit applications, dept collection, tracing, and fraud prevention.</p>
                                <p>4. The Customer hereby declares that all purchase and sale documents between our companies will be included in their tax books & tax declarations. Moreover hereby declare that the goods sold by mentioned above, to the best of our knowledge come from a legal source. The place of jurisdiction for all disputes under the contractual relationship with DutchFix Service B.V. shall be the competent court in the Netherlands. The customer declares that all statements that were made are, to the best of our knowledge, correct and complete. At last also declare that they are paying taxes according to current VAT laws. This form serves as authorization for all mentioned persons, delivery addresses and communication information.</p>
                                <p>5. For comprehensive details regarding the Company's practices on collecting, processing, storing, and retaining personal data-including the purposes for which the data is used, the legal grounds for its use, the rights of the individual, and any applicable data sharing-please consult the Company's Privacy notice available upon request.</p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Do you agree to the Company's Terms and Conditions?</label>
                            <div class="form-radio">
                                <label><input type="radio" name="agree_terms" value="no" required> Don't agree</label>
                                <label><input type="radio" name="agree_terms" value="yes" required> Agree</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 7: Final Review -->
                    <div class="form-step" data-step="7">
                        <div class="step-header">
                            <h3>Final Review</h3>
                            <p>Please review all information before submitting your application.</p>
                        </div>
                        
                        <div class="progress-indicator">
                            <div class="progress-step" data-step="1">✓</div>
                            <div class="progress-step" data-step="2">✓</div>
                            <div class="progress-step" data-step="3">✓</div>
                            <div class="progress-step" data-step="4">✓</div>
                            <div class="progress-step" data-step="5">✓</div>
                            <div class="progress-step" data-step="6">✓</div>
                        </div>
                    </div>
                    
                    <!-- Navigation Buttons -->
                    <div class="form-navigation">
                        <button type="button" class="btn-prev" id="prevBtn" style="display: none;">Previous</button>
                        <button type="button" class="btn-next" id="nextBtn">Next</button>
                        <button type="submit" class="btn-submit" id="submitBtn" style="display: none;">Submit Application</button>
                    </div>
                </form>
    </div>
</div>
@endsection