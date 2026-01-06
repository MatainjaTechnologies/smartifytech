<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Registration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email', 'password', 'company_name', 'phone', 'type_of_business', 'legal_entity',
        'ceo_name', 'website', 'invoice_address', 'delivery_address', 'accountant_name',
        'accountant_email', 'company_reg_no', 'vat_reg_no', 'num_employees', 'date_registration',
        'bank_name', 'iban', 'bank_address', 'swift', 'country_of_bank', 'account_holder',
        'bank_phone', 'years_with_bank', 'ref1_bank_name', 'ref1_address', 'ref1_phone',
        'ref1_name', 'ref2_bank_name', 'ref2_address', 'ref2_phone', 'ref2_name',
        'email_orders', 'phone_orders', 'telephone_orders', 'whatsapp_orders',
        'trader1_name', 'trader1_phone', 'trader1_email', 'trader2_name', 'trader2_skype',
        'trader2_phone', 'trader2_email', 'trader3_name', 'trader3_skype', 'trader3_phone',
        'trader3_email', 'company_incorporation_cert', 'vat_cert', 'completed_refs',
        'bank_details_cert', 'utility_bill_copy', 'director_id_doc', 'agree_terms',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'terms_accepted' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'updated_at',
    ];

    /**
     * Get the formatted phone number.
     *
     * @return string
     */
    public function getFormattedPhoneAttribute(): string
    {
        return $this->formatPhoneNumber($this->phone);
    }

    /**
     * Get the registration type as a formatted string.
     *
     * @return string
     */
    public function getFormattedTypeAttribute(): string
    {
        return ucfirst($this->type);
    }

    /**
     * Check if the registration is for a supplier.
     *
     * @return bool
     */
    public function isSupplier(): bool
    {
        return $this->type === 'supplier';
    }

    /**
     * Check if the registration is for a client.
     *
     * @return bool
     */
    public function isClient(): bool
    {
        return $this->type === 'client';
    }

    /**
     * Format a phone number.
     *
     * @param string $phone
     * @return string
     */
    private function formatPhoneNumber(string $phone): string
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

    /**
     * Scope a query to only include supplier registrations.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeSuppliers(Builder $query): Builder
    {
        return $query->where('type', 'supplier');
    }

    /**
     * Scope a query to only include client registrations.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeClients(Builder $query): Builder
    {
        return $query->where('type', 'client');
    }

    /**
     * Scope a query to only include registrations from the last month.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeRecent(Builder $query): Builder
    {
        return $query->where('created_at', '>=', now()->subMonth());
    }

    /**
     * Scope a query to search by company, contact person, or email.
     *
     * @param Builder $query
     * @param string $search
     * @return Builder
     */
    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($q) use ($search) {
            $q->where('company', 'like', "%{$search}%")
              ->orWhere('contact_person', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }

    /**
     * Scope a query to filter by industry.
     *
     * @param Builder $query
     * @param string $industry
     * @return Builder
     */
    public function scopeByIndustry(Builder $query, string $industry): Builder
    {
        return $query->where('industry', $industry);
    }

    /**
     * Scope a query to filter by experience level.
     *
     * @param Builder $query
     * @param string $experience
     * @return Builder
     */
    public function scopeByExperience(Builder $query, string $experience): Builder
    {
        return $query->where('experience', $experience);
    }

    /**
     * Get the available experience levels.
     *
     * @return array<string>
     */
    public static function getExperienceLevels(): array
    {
        return [
            '0-2' => '0-2 years',
            '3-5' => '3-5 years',
            '6-10' => '6-10 years',
            '10+' => '10+ years',
        ];
    }

    /**
     * Get the available industries.
     *
     * @return array<string>
     */
    public static function getIndustries(): array
    {
        return [
            'technology' => 'Technology',
            'manufacturing' => 'Manufacturing',
            'retail' => 'Retail',
            'healthcare' => 'Healthcare',
            'education' => 'Education',
            'finance' => 'Finance',
            'other' => 'Other',
        ];
    }
}
