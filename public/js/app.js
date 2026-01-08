// Modern Corporate 7-Page Register Form JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide success messages after 5 seconds
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.classList.add('fade-out');
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 300);
        }, 5000);
    }

    // Auto-hide error messages after 8 seconds (longer for reading)
    const errorAlert = document.getElementById('error-alert');
    if (errorAlert) {
        setTimeout(() => {
            errorAlert.classList.add('fade-out');
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 300);
        }, 8000);
    }

    // Mobile Navigation Toggle
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const mobileNavMenu = document.querySelector('.mobile-nav-menu');

    if (mobileNavToggle && mobileNavMenu) {
        mobileNavToggle.addEventListener('click', () => {
            mobileNavToggle.classList.toggle('is-active');
            mobileNavMenu.classList.toggle('is-active');
        });
    }

    // Only run on register page
    if (document.querySelector('.modern-register-form')) {
        let currentStep = 1;
        const totalSteps = 7;
        
        const steps = document.querySelectorAll('.form-step');
        const stepItems = document.querySelectorAll('.step-item');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        
        function showStep(step) {
            // Hide all steps
            steps.forEach(s => s.classList.remove('active'));
            stepItems.forEach(item => item.classList.remove('active'));
            
            // Show current step
            document.querySelector(`.form-step[data-step="${step}"]`).classList.add('active');
            document.querySelector(`.step-item[data-step="${step}"]`).classList.add('active');
            
            // Update navigation buttons
            prevBtn.style.display = step === 1 ? 'none' : 'inline-block';
            nextBtn.style.display = step === totalSteps ? 'none' : 'inline-block';
            submitBtn.style.display = step === totalSteps ? 'inline-block' : 'none';
            
            // Scroll to top of form
            document.querySelector('.register-form-wrapper').scrollIntoView({ behavior: 'smooth' });
        }
        
        // Add real-time validation for all form fields
        function setupRealTimeValidation() {
            const allInputs = document.querySelectorAll('.form-input, .form-textarea, .form-select');
            
            allInputs.forEach(input => {
                // Don't clear errors on focus - let user see the error
                // input.addEventListener('focus', function() {
                //     clearFieldError(this);
                // });
                
                // Validate on blur (when user leaves the field)
                input.addEventListener('blur', function() {
                    validateField(this);
                });
                
                // Validate on input (with debounce for better UX)
                let debounceTimer;
                input.addEventListener('input', function() {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        validateField(this); // Always validate on input - will clear if valid
                    }, 500);
                });
                
                // Validate on change (for selects and file inputs)
                input.addEventListener('change', function() {
                    validateField(this); // Always validate - will clear if valid
                });
                
                // Don't clear errors on keydown - let validation handle it
                // input.addEventListener('keydown', function() {
                //     clearFieldError(this);
                // });
            });
            
            // Handle radio buttons separately
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(radio => {
                // Clear errors when user clicks on any radio option
                radio.addEventListener('click', function() {
                    const radioGroup = document.querySelectorAll(`input[name="${this.name}"]`);
                    radioGroup.forEach(r => clearFieldError(r));
                });
                
                // Validate on change
                radio.addEventListener('change', function() {
                    validateField(this);
                });
            });
        }
        
        async function validateField(field) {
            let errorMessage = '';
            let isValid = true;
            
            // Clear previous error for this field
            clearFieldError(field);
            
            // Check if field is required and empty
            if (field.hasAttribute('required') && !field.value.trim()) {
                const label = document.querySelector(`label[for="${field.id}"]`);
                const labelText = label ? label.textContent.replace('*', '').trim() : 'This field';
                errorMessage = `${labelText} is required`;
                isValid = false;
            }
            
            // Email validation with AJAX check
            if (field.type === 'email' && field.value.trim() && isValid) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(field.value.trim())) {
                    errorMessage = 'Please enter a valid email address';
                    isValid = false;
                } else {
                    // Check if email is already registered via AJAX
                    isValid = await checkEmailAvailability(field.value.trim());
                    if (!isValid) {
                        errorMessage = 'This email is already registered';
                    }
                }
            }
            
            // Phone validation
            if (field.type === 'tel' && field.value.trim() && isValid) {
                const phoneRegex = /^[\d\s\-\+\(\)]+$/;
                if (!phoneRegex.test(field.value.trim()) || field.value.trim().length < 10) {
                    errorMessage = 'Please enter a valid phone number';
                    isValid = false;
                }
            }
            
            // Password confirmation validation
            if (field.id === 'password_confirmation' && field.value.trim() && isValid) {
                const passwordField = document.getElementById('password');
                if (passwordField && field.value !== passwordField.value) {
                    errorMessage = 'Password confirmation does not match';
                    isValid = false;
                }
            }
            
            // Password strength validation
            if (field.id === 'password' && field.value.trim() && isValid) {
                if (field.value.length < 8) {
                    errorMessage = 'Password must be at least 8 characters long';
                    isValid = false;
                }
            }
            
            // Number validation
            if (field.type === 'number' && field.value.trim() && isValid) {
                const num = parseFloat(field.value);
                if (isNaN(num) || num <= 0) {
                    const label = document.querySelector(`label[for="${field.id}"]`);
                    const labelText = label ? label.textContent.replace('*', '').trim() : 'This field';
                    errorMessage = `Please enter a valid ${labelText.toLowerCase()}`;
                    isValid = false;
                }
            }
            
            // Company registration number validation with AJAX check
            if (field.id === 'company_reg_no' && field.value.trim() && isValid) {
                // Check if company reg no is already registered via AJAX
                isValid = await checkCompanyRegNoAvailability(field.value.trim());
                if (!isValid) {
                    errorMessage = 'This company registration number is already registered';
                }
            }
            
            // File validation
            if (field.type === 'file' && field.hasAttribute('required') && isValid) {
                if (field.files.length === 0) {
                    const label = document.querySelector(`label[for="${field.id}"]`);
                    const labelText = label ? label.textContent.replace('*', '').trim() : 'This file';
                    errorMessage = `Please upload ${labelText}`;
                    isValid = false;
                }
            }
            
            // Radio button validation
            if (field.type === 'radio' && isValid) {
                const radioGroup = document.querySelectorAll(`input[name="${field.name}"]`);
                const isChecked = Array.from(radioGroup).some(radio => radio.checked);
                if (!isChecked) {
                    const label = document.querySelector(`label[for="${field.id}"]`) || 
                                 document.querySelector(`label:has(input[name="${field.name}"])`);
                    const labelText = label ? label.textContent.replace('*', '').trim() : 'This option';
                    errorMessage = `Please select ${labelText}`;
                    isValid = false;
                }
            }
            
            // Select validation
            if (field.tagName === 'SELECT' && isValid && !field.value) {
                const label = document.querySelector(`label[for="${field.id}"]`);
                const labelText = label ? label.textContent.replace('*', '').trim() : 'This field';
                errorMessage = `Please select ${labelText}`;
                isValid = false;
            }
            
            // Show error or success
            if (!isValid) {
                showError(field, errorMessage);
            } else {
                // Add success indicator
                field.style.borderColor = '#28a745';
                field.style.backgroundColor = '#f8fff9';
            }
            
            return isValid;
        }
        
        // Initialize real-time validation
        setupRealTimeValidation();
        
        // AJAX helper functions for unique field validation
        async function checkEmailAvailability(email) {
            try {
                const response = await fetch('/validate/email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                    },
                    body: JSON.stringify({ email: email })
                });
                
                const data = await response.json();
                return data.valid;
            } catch (error) {
                console.error('Error checking email availability:', error);
                return true; // Assume valid on error to not block user
            }
        }
        
        async function checkCompanyRegNoAvailability(regNo) {
            try {
                const response = await fetch('/validate/company-reg-no', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                    },
                    body: JSON.stringify({ company_reg_no: regNo })
                });
                
                const data = await response.json();
                return data.valid;
            } catch (error) {
                console.error('Error checking company reg no availability:', error);
                return true; // Assume valid on error to not block user
            }
        }
        
        function validateCurrentStep() {
            const currentStepElement = document.querySelector(`.form-step[data-step="${currentStep}"]`);
            const requiredFields = currentStepElement.querySelectorAll('[required]');
            
            // Clear previous errors
            clearErrors();
            
            for (let field of requiredFields) {
                let errorMessage = '';
                
                // Check if field is empty
                if (!field.value.trim()) {
                    const label = currentStepElement.querySelector(`label[for="${field.id}"]`);
                    const labelText = label ? label.textContent.replace('*', '').trim() : 'This field';
                    errorMessage = `${labelText} is required`;
                    
                    showError(field, errorMessage);
                    return false;
                }
                
                // Validate email fields
                if (field.type === 'email' && field.value.trim()) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(field.value.trim())) {
                        showError(field, 'Please enter a valid email address');
                        return false;
                    }
                }
                
                // Validate phone fields
                if (field.type === 'tel' && field.value.trim()) {
                    const phoneRegex = /^[\d\s\-\+\(\)]+$/;
                    if (!phoneRegex.test(field.value.trim()) || field.value.trim().length < 10) {
                        showError(field, 'Please enter a valid phone number');
                        return false;
                    }
                }
                
                // Validate file inputs
                if (field.type === 'file' && field.files.length === 0) {
                    const label = currentStepElement.querySelector(`label[for="${field.id}"]`);
                    const labelText = label ? label.textContent.replace('*', '').trim() : 'This file';
                    showError(field, `Please upload ${labelText}`);
                    return false;
                }
                
                // Validate radio buttons
                if (field.type === 'radio') {
                    const radioGroup = currentStepElement.querySelectorAll(`input[name="${field.name}"]`);
                    const isChecked = Array.from(radioGroup).some(radio => radio.checked);
                    if (!isChecked) {
                        const label = currentStepElement.querySelector(`label[for="${field.id}"]`) || 
                                     currentStepElement.querySelector(`label:has(input[name="${field.name}"])`);
                        const labelText = label ? label.textContent.replace('*', '').trim() : 'This option';
                        showError(field, `Please select ${labelText}`);
                        return false;
                    }
                }
                
                // Validate number fields
                if (field.type === 'number' && field.value.trim()) {
                    const num = parseFloat(field.value);
                    if (isNaN(num) || num <= 0) {
                        const label = currentStepElement.querySelector(`label[for="${field.id}"]`);
                        const labelText = label ? label.textContent.replace('*', '').trim() : 'This field';
                        showError(field, `Please enter a valid ${labelText.toLowerCase()}`);
                        return false;
                    }
                }
                
                // Validate select fields
                if (field.tagName === 'SELECT' && !field.value) {
                    const label = currentStepElement.querySelector(`label[for="${field.id}"]`);
                    const labelText = label ? label.textContent.replace('*', '').trim() : 'This field';
                    showError(field, `Please select ${labelText}`);
                    return false;
                }
            }
            
            return true;
        }
        
        function showError(field, message) {
            // Add error styling to field
            field.classList.add('error');
            field.style.borderColor = '#dc3545';
            field.style.backgroundColor = '#fff8f8';
            
            // Create or update error message
            let errorElement = field.parentNode.querySelector('.field-error');
            if (!errorElement) {
                errorElement = document.createElement('div');
                errorElement.className = 'field-error';
                errorElement.style.color = '#dc3545';
                errorElement.style.fontSize = '12px';
                errorElement.style.marginTop = '4px';
                errorElement.style.fontFamily = "'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif";
                field.parentNode.appendChild(errorElement);
            }
            errorElement.textContent = message;
            
            // Don't auto-focus on error to allow user to interact with other fields
            // field.focus(); // Removed this line
            
            // Don't auto-remove error - it will stay until user fixes the field
            // setTimeout(() => {
            //     clearFieldError(field);
            // }, 8000); // Removed auto-clear
        }
        
        function clearFieldError(field) {
            field.classList.remove('error');
            field.style.borderColor = '';
            field.style.backgroundColor = '';
            
            const errorElement = field.parentNode.querySelector('.field-error');
            if (errorElement) {
                errorElement.remove();
            }
            
            // Also clear errors from related radio buttons
            if (field.type === 'radio') {
                const radioGroup = document.querySelectorAll(`input[name="${field.name}"]`);
                radioGroup.forEach(radio => {
                    radio.classList.remove('error');
                    radio.style.borderColor = '';
                    radio.style.backgroundColor = '';
                    const radioErrorElement = radio.parentNode.querySelector('.field-error');
                    if (radioErrorElement) {
                        radioErrorElement.remove();
                    }
                });
            }
        }
        
        // Initialize radio validation is now handled in setupRealTimeValidation()
        
        function clearErrors() {
            // Clear all field errors
            const errorFields = document.querySelectorAll('.error');
            errorFields.forEach(field => clearFieldError(field));
            
            // Remove all error messages
            const errorMessages = document.querySelectorAll('.field-error');
            errorMessages.forEach(msg => msg.remove());
        }
        
        nextBtn.addEventListener('click', function() {
            if (validateCurrentStep()) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });
        
        prevBtn.addEventListener('click', function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });
        
        // Add click handlers to step items for direct navigation
        stepItems.forEach((item, index) => {
            item.addEventListener('click', function() {
                const targetStep = parseInt(this.dataset.step);
                
                // Only allow navigation to completed steps or next step
                if (targetStep <= currentStep || targetStep === currentStep + 1) {
                    if (targetStep > currentStep && !validateCurrentStep()) {
                        return;
                    }
                    currentStep = targetStep;
                    showStep(currentStep);
                }
            });
        });
        
        // Mark steps as completed when navigating forward
        nextBtn.addEventListener('click', function() {
            if (validateCurrentStep() && currentStep > 1) {
                markStepCompleted(currentStep - 1);
            }
        });
        
        // Add visual feedback for completed steps
        function markStepCompleted(step) {
            const stepItem = document.querySelector(`.step-item[data-step="${step}"]`);
            if (stepItem) {
                stepItem.classList.add('completed');
                stepItem.innerHTML = '&#10004;'; // Changed to HTML entity for checkmark
            }
        }
    }
});

// Additional utility functions can be added here for future use
