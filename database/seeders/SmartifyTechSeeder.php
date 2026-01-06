<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SmartifyTechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample companies
        $companies = [
            [
                'company_name' => 'Tech Solutions B.V.',
                'type' => 'supplier',
                'general_info' => 'Leading supplier of consumer electronics and IT equipment',
                'address' => 'Innovation Boulevard 123',
                'city' => 'Amsterdam',
                'postal_code' => '1012 AB',
                'country' => 'Netherlands',
                'phone' => '+31 20 123 4567',
                'email' => 'info@techsolutions.nl',
                'website' => 'https://www.techsolutions.nl',
                'bank_name' => 'ING Bank',
                'iban' => 'NL91 INGB 0001 2345 67',
                'swift' => 'INGBNL2A',
                'account_holder' => 'Tech Solutions B.V.',
                'type_of_business' => 'Electronics Wholesale',
                'legal_entity' => 'Besloten Vennootschap (BV)',
                'ceo_name' => 'Jan van der Berg',
                'invoice_address' => 'Innovation Boulevard 123, 1012 AB Amsterdam',
                'delivery_address' => 'Innovation Boulevard 123, 1012 AB Amsterdam',
                'accountant_name' => 'Maria Jansen',
                'accountant_email' => 'finance@techsolutions.nl',
                'company_reg_no' => '12345678',
                'vat_reg_no' => 'NL123456789B01',
                'num_employees' => 50,
                'date_registration' => '2015-03-15',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'Digital Retail Group',
                'type' => 'client',
                'general_info' => 'Multi-channel electronics retailer with stores across Europe',
                'address' => 'Königstraße 456',
                'city' => 'Berlin',
                'postal_code' => '10115',
                'country' => 'Germany',
                'phone' => '+49 30 987 6543',
                'email' => 'contact@digitalretail.de',
                'website' => 'https://www.digitalretail.de',
                'bank_name' => 'Deutsche Bank',
                'iban' => 'DE89 3704 0044 0532 0130 00',
                'swift' => 'DEUTDEFF',
                'account_holder' => 'Digital Retail Group GmbH',
                'type_of_business' => 'Retail Trade',
                'legal_entity' => 'Gesellschaft mit beschränkter Haftung (GmbH)',
                'ceo_name' => 'Klaus Mueller',
                'invoice_address' => 'Königstraße 456, 10115 Berlin',
                'delivery_address' => 'Königstraße 456, 10115 Berlin',
                'accountant_name' => 'Anna Schmidt',
                'accountant_email' => 'buchhaltung@digitalretail.de',
                'company_reg_no' => 'HRB 123456',
                'vat_reg_no' => 'DE123456789',
                'num_employees' => 200,
                'date_registration' => '2018-07-22',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'ElectroSupply Ltd',
                'type' => 'supplier',
                'general_info' => 'Specialized in B2B electronics distribution',
                'address' => '123 Business Park',
                'city' => 'London',
                'postal_code' => 'SW1A 0AA',
                'country' => 'United Kingdom',
                'phone' => '+44 20 7946 0958',
                'email' => 'sales@electrosupply.co.uk',
                'website' => 'https://www.electrosupply.co.uk',
                'bank_name' => 'HSBC UK',
                'iban' => 'GB29 NWBK 6016 1331 9268 19',
                'swift' => 'HBUKGB4B',
                'account_holder' => 'ElectroSupply Ltd',
                'type_of_business' => 'Electronics Distribution',
                'legal_entity' => 'Limited Company',
                'ceo_name' => 'James Wilson',
                'invoice_address' => '123 Business Park, SW1A 0AA London',
                'delivery_address' => '123 Business Park, SW1A 0AA London',
                'accountant_name' => 'Sarah Johnson',
                'accountant_email' => 'accounts@electrosupply.co.uk',
                'company_reg_no' => '12345678',
                'vat_reg_no' => 'GB123456789',
                'num_employees' => 75,
                'date_registration' => '2016-11-08',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $companyIds = [];
        foreach ($companies as $company) {
            $id = DB::table('companies')->insertGetId($company);
            $companyIds[] = $id;
        }

        // Create contact persons for each company
        $contactPersons = [
            // For Tech Solutions B.V.
            [
                'company_id' => $companyIds[0],
                'name' => 'Peter de Vries',
                'phone' => '+31 6 123 45678',
                'email' => 'p.devries@techsolutions.nl',
                'person_number' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => $companyIds[0],
                'name' => 'Lisa Bakker',
                'phone' => '+31 6 876 54321',
                'email' => 'l.bakker@techsolutions.nl',
                'person_number' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // For Digital Retail Group
            [
                'company_id' => $companyIds[1],
                'name' => 'Hans Weber',
                'phone' => '+49 172 123 4567',
                'email' => 'h.weber@digitalretail.de',
                'person_number' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => $companyIds[1],
                'name' => 'Elena Fischer',
                'phone' => '+49 163 987 6543',
                'email' => 'e.fischer@digitalretail.de',
                'person_number' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // For ElectroSupply Ltd
            [
                'company_id' => $companyIds[2],
                'name' => 'Michael Brown',
                'phone' => '+44 77 1234 5678',
                'email' => 'm.brown@electrosupply.co.uk',
                'person_number' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('contact_persons')->insert($contactPersons);

        // Create sample documents
        $documents = [
            [
                'company_id' => $companyIds[0],
                'document_type' => 'company_incorporation',
                'file_path' => 'documents/techsolutions/incorporation.pdf',
                'original_name' => 'Tech_Solutions_Incorporation.pdf',
                'mime_type' => 'application/pdf',
                'file_size' => 1024000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => $companyIds[0],
                'document_type' => 'vat_certificate',
                'file_path' => 'documents/techsolutions/vat_certificate.pdf',
                'original_name' => 'Tech_Solutions_VAT_Certificate.pdf',
                'mime_type' => 'application/pdf',
                'file_size' => 512000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => $companyIds[1],
                'document_type' => 'company_incorporation',
                'file_path' => 'documents/digitalretail/incorporation.pdf',
                'original_name' => 'Digital_Retail_Incorporation.pdf',
                'mime_type' => 'application/pdf',
                'file_size' => 2048000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('documents')->insert($documents);

        // Create terms agreements
        $termsAgreements = [
            [
                'company_id' => $companyIds[0],
                'agree_terms' => 'yes',
                'agreed_at' => Carbon::now()->subDays(30),
                'ip_address' => '192.168.1.100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => $companyIds[1],
                'agree_terms' => 'yes',
                'agreed_at' => Carbon::now()->subDays(15),
                'ip_address' => '10.0.0.50',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('terms_agreements')->insert($termsAgreements);

        // Create sample contact form submissions
        $contacts = [
            [
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'phone' => '+44 20 1234 5678',
                'subject' => 'Business Partnership Inquiry',
                'message' => 'We are interested in exploring partnership opportunities with Smartify Tech for our electronics distribution business.',
                'status' => 'new',
                'created_at' => Carbon::now()->subHours(2),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'maria.garcia@company.es',
                'phone' => '+34 91 123 4567',
                'subject' => 'Product Information Request',
                'message' => 'I would like to receive more information about your consumer electronics product catalog and pricing.',
                'status' => 'read',
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subHours(12),
            ],
            [
                'name' => 'Pierre Dubois',
                'email' => 'pierre.dubois@tech.fr',
                'phone' => '+33 1 23 45 67 89',
                'subject' => 'Technical Support',
                'message' => 'We need technical support for some of the products we purchased. Please contact us to schedule a support call.',
                'status' => 'replied',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(2),
            ],
        ];

        DB::table('contacts')->insert($contacts);

        $this->command->info('Smartify Tech sample database seeded successfully!');
    }
}
