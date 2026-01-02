<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRegistrationRequest extends FormRequest
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
        return [
            'company' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:registrations,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'industry' => 'required|string|max:100',
            'needs' => 'required|string|max:1000',
            'terms' => 'accepted',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'company.required' => 'The company name field is required.',
            'company.string' => 'The company name must be a string.',
            'company.max' => 'The company name may not be greater than 255 characters.',
            'contact.required' => 'The contact person field is required.',
            'contact.string' => 'The contact person must be a string.',
            'contact.max' => 'The contact person may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'This email has already been registered.',
            'phone.required' => 'The phone field is required.',
            'phone.string' => 'The phone must be a string.',
            'phone.max' => 'The phone may not be greater than 20 characters.',
            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 500 characters.',
            'industry.required' => 'The industry field is required.',
            'industry.string' => 'The industry must be a string.',
            'industry.max' => 'The industry may not be greater than 100 characters.',
            'needs.required' => 'The service requirements field is required.',
            'needs.string' => 'The service requirements must be a string.',
            'needs.max' => 'The service requirements may not be greater than 1000 characters.',
            'terms.accepted' => 'You must accept the terms and conditions.',
        ];
    }
}
