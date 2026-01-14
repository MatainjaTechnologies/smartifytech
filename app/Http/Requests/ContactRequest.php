<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\Recaptcha;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'nullable|string|max:1000',
        ];

        // Only require reCAPTCHA in production
        if (config('app.env') === 'production') {
            $rules['g-recaptcha-response'] = ['required', new Recaptcha()];
        }

        return $rules;
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'phone.required' => 'The phone field is required.',
            'phone.string' => 'The phone must be a string.',
            'phone.max' => 'The phone may not be greater than 20 characters.',
            'subject.required' => 'The subject field is required.',
            'subject.string' => 'The subject must be a string.',
            'subject.max' => 'The subject may not be greater than 255 characters.',
            'message.string' => 'The message must be a string.',
            'message.max' => 'The message may not be greater than 1000 characters.',
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.recaptcha' => 'reCAPTCHA verification failed. Please try again.',
        ];
    }
}
