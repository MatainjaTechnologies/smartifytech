<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\SupplierRegistrationRequest;
use App\Http\Requests\ClientRegistrationRequest;
use App\Models\Contact;
use App\Models\Registration;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle contact form submission.
     *
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function submit(ContactRequest $request): RedirectResponse
    {
        try {
            $contact = Contact::create($request->validated());
            
            // Send email to admin with contact form data
            $adminEmail = 'info@smartify-tech.com'; // You can make this configurable
            Mail::to($adminEmail)->send(new ContactFormSubmitted($contact));
            
            return redirect()
                ->route('contact')
                ->with('success', 'Thank you for your message! We will get back to you soon.');
                
        } catch (\Exception $e) {
            \Log::error('Contact form submission failed: ' . $e->getMessage());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while submitting your message. Please try again.');
        }
    }

    /**
     * Handle comprehensive registration form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function registerSubmit(\Illuminate\Http\Request $request): RedirectResponse
    {
        try {
            // Validate the form data
            $validated = $request->validate([
                'email' => 'required|email|unique:registrations,email',
                'password' => 'required|min:8|confirmed',
                'company_name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'type' => 'required|in:supplier,client',
                'general_info' => 'nullable|string',
                'bank_details' => 'nullable|string',
                'references' => 'nullable|string',
                'authorization' => 'nullable|string',
                'traders' => 'nullable|string',
                'fleet_list' => 'nullable|string',
                'terms' => 'nullable|string',
                'contact_purchase' => 'nullable|string',
                'agree' => 'required|in:yes,no',
            ]);

            // Store the registration data
            $registration = Registration::create([
                'type' => $validated['type'],
                'company' => $validated['company_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'general_info' => $validated['general_info'] ?? null,
                'bank_details' => $validated['bank_details'] ?? null,
                'references' => $validated['references'] ?? null,
                'authorization' => $validated['authorization'] ?? null,
                'traders' => $validated['traders'] ?? null,
                'fleet_list' => $validated['fleet_list'] ?? null,
                'terms' => $validated['terms'] ?? null,
                'contact_purchase' => $validated['contact_purchase'] ?? null,
                'terms_accepted' => $validated['agree'] === 'yes',
                'password' => bcrypt($validated['password']), // Hash the password
            ]);
            
            \Log::info('New registration submitted', [
                'registration_id' => $registration->id,
                'type' => $validated['type'],
                'email' => $validated['email']
            ]);
            
            return redirect()
                ->route('register')
                ->with('success', 'Thank you for your registration! We will review your application and contact you soon.');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
                
        } catch (\Exception $e) {
            \Log::error('Registration submission failed: ' . $e->getMessage());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while processing your registration. Please try again.');
        }
    }

    /**
     * Handle supplier registration form submission.
     *
     * @param SupplierRegistrationRequest $request
     * @return RedirectResponse
     */
    public function registerSupplier(SupplierRegistrationRequest $request): RedirectResponse
    {
        try {
            $registration = Registration::create([
                'type' => 'supplier',
                'company' => $request->validated('company'),
                'contact_person' => $request->validated('contact'),
                'email' => $request->validated('email'),
                'phone' => $request->validated('phone'),
                'address' => $request->validated('address'),
                'services_offered' => $request->validated('services'),
                'experience' => $request->validated('experience'),
                'terms_accepted' => $request->has('terms'),
            ]);
            
            \Log::info('New supplier registration', ['registration_id' => $registration->id]);
            
            return redirect()
                ->route('register')
                ->with('success', 'Thank you for registering as a supplier! We will review your application and contact you soon.');
                
        } catch (\Exception $e) {
            \Log::error('Supplier registration failed: ' . $e->getMessage());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while processing your registration. Please try again.');
        }
    }

    /**
     * Handle client registration form submission.
     *
     * @param ClientRegistrationRequest $request
     * @return RedirectResponse
     */
    public function registerClient(ClientRegistrationRequest $request): RedirectResponse
    {
        try {
            $registration = Registration::create([
                'type' => 'client',
                'company' => $request->validated('company'),
                'contact_person' => $request->validated('contact'),
                'email' => $request->validated('email'),
                'phone' => $request->validated('phone'),
                'address' => $request->validated('address'),
                'industry' => $request->validated('industry'),
                'service_requirements' => $request->validated('needs'),
                'terms_accepted' => $request->has('terms'),
            ]);
            
            \Log::info('New client registration', ['registration_id' => $registration->id]);
            
            return redirect()
                ->route('register')
                ->with('success', 'Thank you for registering as a client! Welcome to Smartify Tech.');
                
        } catch (\Exception $e) {
            \Log::error('Client registration failed: ' . $e->getMessage());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while processing your registration. Please try again.');
        }
    }
}
