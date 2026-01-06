<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            // Step 1: General Information
            $table->string('email')->unique();
            $table->string('password');
            $table->string('company_name');
            $table->string('phone');
            $table->string('type_of_business');
            $table->string('legal_entity');
            $table->string('ceo_name');
            $table->string('website')->nullable();
            $table->string('invoice_address');
            $table->string('delivery_address')->nullable();
            $table->string('accountant_name');
            $table->string('accountant_email');
            $table->string('company_reg_no');
            $table->string('vat_reg_no');
            $table->integer('num_employees');
            $table->date('date_registration');

            // Step 2: Bank Details
            $table->string('bank_name');
            $table->string('iban');
            $table->string('bank_address');
            $table->string('swift');
            $table->string('country_of_bank');
            $table->string('account_holder');
            $table->string('bank_phone');
            $table->integer('years_with_bank');

            // Step 3: References
            $table->string('ref1_bank_name')->nullable();
            $table->string('ref1_address')->nullable();
            $table->string('ref1_phone')->nullable();
            $table->string('ref1_name')->nullable();
            $table->string('ref2_bank_name')->nullable();
            $table->string('ref2_address')->nullable();
            $table->string('ref2_phone')->nullable();
            $table->string('ref2_name')->nullable();

            // Step 4: Authorization
            $table->boolean('email_orders');
            $table->boolean('phone_orders');
            $table->boolean('telephone_orders');
            $table->boolean('whatsapp_orders');

            // Step 5: Traders/Brokers
            $table->string('trader1_name');
            $table->string('trader1_phone');
            $table->string('trader1_email');
            $table->string('trader2_name')->nullable();
            $table->string('trader2_skype')->nullable();
            $table->string('trader2_phone')->nullable();
            $table->string('trader2_email')->nullable();
            $table->string('trader3_name')->nullable();
            $table->string('trader3_skype')->nullable();
            $table->string('trader3_phone')->nullable();
            $table->string('trader3_email')->nullable();

            // Step 6: Documents
            $table->string('company_incorporation_cert');
            $table->string('vat_cert');
            $table->string('completed_refs');
            $table->string('bank_details_cert');
            $table->string('utility_bill_copy');
            $table->string('director_id_doc');

            // Step 7: Terms & Conditions
            $table->boolean('agree_terms');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
