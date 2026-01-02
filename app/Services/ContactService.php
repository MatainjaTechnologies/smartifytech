<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Registration;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    /**
     * Store a new contact submission.
     *
     * @param array $data
     * @return Contact
     */
    public function storeContact(array $data): Contact
    {
        try {
            $contact = Contact::create($data);
            
            // Log the contact submission
            Log::info('New contact submission', [
                'contact_id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
            ]);
            
            // Send email notification (if configured)
            $this->sendContactNotification($contact);
            
            return $contact;
            
        } catch (\Exception $e) {
            Log::error('Failed to store contact submission: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Store a new supplier registration.
     *
     * @param array $data
     * @return Registration
     */
    public function storeSupplierRegistration(array $data): Registration
    {
        try {
            $registration = Registration::create([
                'type' => 'supplier',
                'company' => $data['company'],
                'contact_person' => $data['contact'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'services_offered' => $data['services'],
                'experience' => $data['experience'] ?? null,
                'terms_accepted' => $data['terms'] ?? false,
            ]);
            
            Log::info('New supplier registration', [
                'registration_id' => $registration->id,
                'company' => $registration->company,
                'email' => $registration->email,
            ]);
            
            // Send registration notification
            $this->sendRegistrationNotification($registration);
            
            return $registration;
            
        } catch (\Exception $e) {
            Log::error('Failed to store supplier registration: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Store a new client registration.
     *
     * @param array $data
     * @return Registration
     */
    public function storeClientRegistration(array $data): Registration
    {
        try {
            $registration = Registration::create([
                'type' => 'client',
                'company' => $data['company'],
                'contact_person' => $data['contact'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'industry' => $data['industry'],
                'service_requirements' => $data['needs'],
                'terms_accepted' => $data['terms'] ?? false,
            ]);
            
            Log::info('New client registration', [
                'registration_id' => $registration->id,
                'company' => $registration->company,
                'email' => $registration->email,
            ]);
            
            // Send registration notification
            $this->sendRegistrationNotification($registration);
            
            return $registration;
            
        } catch (\Exception $e) {
            Log::error('Failed to store client registration: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get contact statistics.
     *
     * @return array
     */
    public function getContactStatistics(): array
    {
        return [
            'total_contacts' => Contact::count(),
            'recent_contacts' => Contact::recent()->count(),
            'total_registrations' => Registration::count(),
            'supplier_registrations' => Registration::suppliers()->count(),
            'client_registrations' => Registration::clients()->count(),
            'recent_registrations' => Registration::recent()->count(),
        ];
    }

    /**
     * Search contacts.
     *
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function searchContacts(string $search)
    {
        return Contact::search($search)->get();
    }

    /**
     * Search registrations.
     *
     * @param string $search
     * @param string|null $type
     * @param string|null $industry
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function searchRegistrations(string $search, ?string $type = null, ?string $industry = null)
    {
        $query = Registration::search($search);
        
        if ($type) {
            $query = $type === 'supplier' ? $query->suppliers() : $query->clients();
        }
        
        if ($industry) {
            $query->byIndustry($industry);
        }
        
        return $query->get();
    }

    /**
     * Send contact notification email.
     *
     * @param Contact $contact
     * @return void
     */
    private function sendContactNotification(Contact $contact): void
    {
        try {
            // This would send an email notification to the admin
            // Mail::to('admin@dutch-fix.com')->send(new NewContactNotification($contact));
            Log::info('Contact notification would be sent', ['contact_id' => $contact->id]);
        } catch (\Exception $e) {
            Log::error('Failed to send contact notification: ' . $e->getMessage());
        }
    }

    /**
     * Send registration notification email.
     *
     * @param Registration $registration
     * @return void
     */
    private function sendRegistrationNotification(Registration $registration): void
    {
        try {
            // This would send an email notification to the admin
            // Mail::to('admin@dutch-fix.com')->send(new NewRegistrationNotification($registration));
            Log::info('Registration notification would be sent', ['registration_id' => $registration->id]);
        } catch (\Exception $e) {
            Log::error('Failed to send registration notification: ' . $e->getMessage());
        }
    }

    /**
     * Format phone number.
     *
     * @param string $phone
     * @return string
     */
    public function formatPhoneNumber(string $phone): string
    {
        // Remove all non-digit characters
        $cleaned = preg_replace('/\D/', '', $phone);
        
        // Format based on length (assuming Dutch numbers)
        if (strlen($cleaned) === 10) {
            return preg_replace('/(\d{2})(\d{3})(\d{4})/', '$1 $2 $3', $cleaned);
        } elseif (strlen($cleaned) === 11 && str_starts_with($cleaned, '31')) {
            return preg_replace('/(\d{2})(\d{2})(\d{3})(\d{4})/', '+$1 $2 $3 $4', $cleaned);
        }
        
        return $phone;
    }
}
