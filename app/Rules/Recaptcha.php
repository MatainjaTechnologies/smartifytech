<?php

namespace App\Rules;

use Closure;
use App\Services\RecaptchaService;
use Illuminate\Contracts\Validation\ValidationRule;

class Recaptcha implements ValidationRule
{
    protected $recaptchaService;

    public function __construct()
    {
        $this->recaptchaService = new RecaptchaService();
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->recaptchaService->verify($value)) {
            $fail('reCAPTCHA verification failed. Please try again.');
        }
    }
}
