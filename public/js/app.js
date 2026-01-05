// Modern Corporate 7-Page Register Form JavaScript
document.addEventListener('DOMContentLoaded', function() {
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
            
            // Focus on the field
            field.focus();
            
            // Remove error after 5 seconds
            setTimeout(() => {
                clearFieldError(field);
            }, 5000);
        }
        
        function clearFieldError(field) {
            field.classList.remove('error');
            field.style.borderColor = '';
            field.style.backgroundColor = '';
            
            const errorElement = field.parentNode.querySelector('.field-error');
            if (errorElement) {
                errorElement.remove();
            }
        }
        
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
