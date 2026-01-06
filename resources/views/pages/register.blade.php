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
                <div class="step-title">Bank Details</div>
            </div>
            <div class="step-item" data-step="3">
                <div class="step-number">3</div>
                <div class="step-title">References</div>
            </div>
            <div class="step-item" data-step="4">
                <div class="step-number">4</div>
                <div class="step-title">Authorization</div>
            </div>
            <div class="step-item" data-step="5">
                <div class="step-number">5</div>
                <div class="step-title">Traders/Brokers</div>
            </div>
            <div class="step-item" data-step="6">
                <div class="step-number">6</div>
                <div class="step-title">Supply Documents</div>
            </div>
            <div class="step-item" data-step="7">
                <div class="step-number">7</div>
                <div class="step-title">Terms & Conditions</div>
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
                    
                    <!-- Step 2: Bank Details -->
                    <div class="form-step" data-step="2">
                        <div class="step-header">
                            <h3>Bank details</h3>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="bank_name" class="form-label">Name of bank *</label>
                                <input type="text" id="bank_name" name="bank_name" class="form-input" placeholder="Bank name" required>
                            </div>
                            <div class="form-group">
                                <label for="iban" class="form-label">IBAN *</label>
                                <input type="text" id="iban" name="iban" class="form-input" placeholder="IBAN" required>
                            </div>
                            <div class="form-group">
                                <label for="bank_address" class="form-label">Address *</label>
                                <input type="text" id="bank_address" name="bank_address" class="form-input" placeholder="Bank address" required>
                            </div>
                            <div class="form-group">
                                <label for="swift" class="form-label">SWIFT *</label>
                                <input type="text" id="swift" name="swift" class="form-input" placeholder="SWIFT" required>
                            </div>
                            <div class="form-group">
                                <label for="country_of_bank" class="form-label">Country of bank *</label>
                                <input type="text" id="country_of_bank" name="country_of_bank" class="form-input" placeholder="Country" required>
                            </div>
                            <div class="form-group">
                                <label for="account_holder" class="form-label">Account holder *</label>
                                <input type="text" id="account_holder" name="account_holder" class="form-input" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="bank_phone" class="form-label">Phone number *</label>
                                <input type="tel" id="bank_phone" name="bank_phone" class="form-input" placeholder="06" required>
                            </div>
                            <div class="form-group">
                                <label for="years_with_bank" class="form-label">Number of years with bank *</label>
                                <input type="number" id="years_with_bank" name="years_with_bank" class="form-input" placeholder="Years" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 3: References -->
                    <div class="form-step" data-step="3">
                        <div class="step-header">
                            <h3>References</h3>
                            <p>Possible trading platforms</p>
                        </div>
                        <div class="person-section">
                            <h4>TRADE REFERENCE 1</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="ref1_bank_name" class="form-label">Name of bank</label>
                                    <input type="text" id="ref1_bank_name" name="ref1_bank_name" class="form-input" placeholder="Bank name">
                                </div>
                                <div class="form-group">
                                    <label for="ref1_address" class="form-label">Address</label>
                                    <input type="text" id="ref1_address" name="ref1_address" class="form-input" placeholder="Bank address">
                                </div>
                                <div class="form-group">
                                    <label for="ref1_phone" class="form-label">Phone number</label>
                                    <input type="tel" id="ref1_phone" name="ref1_phone" class="form-input" placeholder="06">
                                </div>
                                <div class="form-group">
                                    <label for="ref1_name" class="form-label">Name and Surname</label>
                                    <input type="text" id="ref1_name" name="ref1_name" class="form-input" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="person-section">
                            <h4>TRADE REFERENCE 2</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="ref2_bank_name" class="form-label">Name of bank</label>
                                    <input type="text" id="ref2_bank_name" name="ref2_bank_name" class="form-input" placeholder="Bank name">
                                </div>
                                <div class="form-group">
                                    <label for="ref2_address" class="form-label">Address</label>
                                    <input type="text" id="ref2_address" name="ref2_address" class="form-input" placeholder="Bank address">
                                </div>
                                <div class="form-group">
                                    <label for="ref2_phone" class="form-label">Phone number</label>
                                    <input type="tel" id="ref2_phone" name="ref2_phone" class="form-input" placeholder="06">
                                </div>
                                <div class="form-group">
                                    <label for="ref2_name" class="form-label">Name and Surname</label>
                                    <input type="text" id="ref2_name" name="ref2_name" class="form-input" placeholder="Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 4: Authorization for online and phone orders -->
                    <div class="form-step" data-step="4">
                        <div class="step-header">
                            <h3>Authorization for online and phone orders</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">E-mail orders allowed *</label>
                            <div class="form-radio">
                                <label><input type="radio" name="email_orders" value="no" required> No</label>
                                <label><input type="radio" name="email_orders" value="yes" required> Yes</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone orders allowed *</label>
                            <div class="form-radio">
                                <label><input type="radio" name="phone_orders" value="no" required> No</label>
                                <label><input type="radio" name="phone_orders" value="yes" required> Yes</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telephone orders allowed *</label>
                            <div class="form-radio">
                                <label><input type="radio" name="telephone_orders" value="no" required> No</label>
                                <label><input type="radio" name="telephone_orders" value="yes" required> Yes</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">WhatsApp orders allowed *</label>
                            <div class="form-radio">
                                <label><input type="radio" name="whatsapp_orders" value="no" required> No</label>
                                <label><input type="radio" name="whatsapp_orders" value="yes" required> Yes</label>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Traders / Contact for sale & purchase / Brokers -->
                    <div class="form-step" data-step="5">
                        <div class="step-header">
                            <h3>Traders / Contact for sale & purchase / Brokers who are allowed for orders</h3>
                        </div>
                        <div class="person-section">
                            <h4>Person 1</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="trader1_name" class="form-label">First & last name *</label>
                                    <input type="text" id="trader1_name" name="trader1_name" class="form-input" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="trader1_phone" class="form-label">Phone number *</label>
                                    <input type="tel" id="trader1_phone" name="trader1_phone" class="form-input" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="trader1_email" class="form-label">Email address *</label>
                                    <input type="email" id="trader1_email" name="trader1_email" class="form-input" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="person-section">
                            <h4>Person 2</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="trader2_name" class="form-label">First & last name</label>
                                    <input type="text" id="trader2_name" name="trader2_name" class="form-input" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="trader2_skype" class="form-label">Skype ID</label>
                                    <input type="text" id="trader2_skype" name="trader2_skype" class="form-input" placeholder="Skype">
                                </div>
                                <div class="form-group">
                                    <label for="trader2_phone" class="form-label">Phone number</label>
                                    <input type="tel" id="trader2_phone" name="trader2_phone" class="form-input" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="trader2_email" class="form-label">Email address</label>
                                    <input type="email" id="trader2_email" name="trader2_email" class="form-input" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="person-section">
                            <h4>Person 3</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="trader3_name" class="form-label">First & last name</label>
                                    <input type="text" id="trader3_name" name="trader3_name" class="form-input" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="trader3_skype" class="form-label">Skype ID</label>
                                    <input type="text" id="trader3_skype" name="trader3_skype" class="form-input" placeholder="Skype">
                                </div>
                                <div class="form-group">
                                    <label for="trader3_phone" class="form-label">Phone number</label>
                                    <input type="tel" id="trader3_phone" name="trader3_phone" class="form-input" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="trader3_email" class="form-label">Email address</label>
                                    <input type="email" id="trader3_email" name="trader3_email" class="form-input" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 6: IMPORTANT - PLEASE SUPPLY THE FOLLOWING: -->
                    <div class="form-step" data-step="6">
                        <div class="step-header">
                            <h3>IMPORTANT - PLEASE SUPPLY THE FOLLOWING:</h3>
                        </div>
                        <div class="form-group">
                            <label for="company_incorporation_cert" class="form-label">Company Incorporation Certificate *</label>
                            <input type="file" id="company_incorporation_cert" name="company_incorporation_cert" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                        <div class="form-group">
                            <label for="vat_cert" class="form-label">VAT Certificate *</label>
                            <input type="file" id="vat_cert" name="vat_cert" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                        <div class="form-group">
                            <label for="completed_refs" class="form-label">Completed references and company representatives *</label>
                            <input type="file" id="completed_refs" name="completed_refs" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                        <div class="form-group">
                            <label for="bank_details_cert" class="form-label">Bank Account Details *</label>
                            <input type="file" id="bank_details_cert" name="bank_details_cert" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                        <div class="form-group">
                            <label for="utility_bill_copy" class="form-label">Copy of recent utility bill (Electric/Water/Gas/Landline Telephone) *</label>
                            <input type="file" id="utility_bill_copy" name="utility_bill_copy" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                        <div class="form-group">
                            <label for="director_id_doc" class="form-label">Director ID document *</label>
                            <input type="file" id="director_id_doc" name="director_id_doc" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                    </div>

                    <!-- Step 7: Terms & Conditions -->
                    <div class="form-step" data-step="7">
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

                    <!-- Step 8: Final Review -->
                    <div class="form-step" data-step="8">
                        <div class="step-header">
                            <h3>Final Review</h3>
                            <p>Please review all information before submitting your application.</p>
                        </div>

                        <div class="progress-indicator">
                            <ul>
                                <li class="progress-step" data-step="1">✓</li>
                                <li class="progress-step" data-step="2">✓</li>
                                <li class="progress-step" data-step="3">✓</li>
                                <li class="progress-step" data-step="4">✓</li>
                                <li class="progress-step" data-step="5">✓</li>
                                <li class="progress-step" data-step="6">✓</li>
                                <li class="progress-step" data-step="7">✓</li>
                                <li class="progress-step" data-step="8">✓</li>
                            </ul>
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