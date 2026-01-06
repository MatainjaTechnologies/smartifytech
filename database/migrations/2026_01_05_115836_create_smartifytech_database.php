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
        // Create companies table
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('type'); // supplier, client
            $table->text('general_info')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->string('phone');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('bank_name');
            $table->string('iban');
            $table->string('swift');
            $table->string('account_holder');
            $table->string('type_of_business');
            $table->string('legal_entity');
            $table->string('ceo_name');
            $table->string('invoice_address');
            $table->string('delivery_address')->nullable();
            $table->string('accountant_name');
            $table->string('accountant_email');
            $table->string('company_reg_no');
            $table->string('vat_reg_no');
            $table->integer('num_employees');
            $table->date('date_registration');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });

        // Create contact persons table
        Schema::create('contact_persons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->integer('person_number'); // Person 1, Person 2, etc.
            $table->timestamps();
        });

        // Create documents table
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('document_type'); // company_incorporation, vat_certificate, etc.
            $table->string('file_path');
            $table->string('original_name');
            $table->string('mime_type');
            $table->integer('file_size');
            $table->timestamps();
        });

        // Create terms_agreements table
        Schema::create('terms_agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->enum('agree_terms', ['yes', 'no']);
            $table->timestamp('agreed_at');
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms_agreements');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('contact_persons');
        Schema::dropIfExists('companies');
    }
};
