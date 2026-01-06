<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->all();

        // Transform boolean fields from 'yes'/'no' to true/false
        $booleanFields = ['email_orders', 'phone_orders', 'telephone_orders', 'whatsapp_orders', 'agree_terms'];
        foreach ($booleanFields as $field) {
            if (isset($validatedData[$field])) {
                $validatedData[$field] = $validatedData[$field] === 'yes' ? true : false;
            }
        }

        $validator = Validator::make($validatedData, [
            'email' => 'required|email|unique:registrations',
            'password' => 'required|confirmed',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'type_of_business' => 'required|string|max:255',
            'legal_entity' => 'required|string|max:255',
            'ceo_name' => 'required|string|max:255',
            'invoice_address' => 'required|string|max:255',
            'accountant_name' => 'required|string|max:255',
            'accountant_email' => 'required|email|max:255',
            'company_reg_no' => 'required|string|max:255',
            'vat_reg_no' => 'required|string|max:255',
            'num_employees' => 'required|integer',
            'date_registration' => 'required|date',
            'bank_name' => 'required|string|max:255',
            'iban' => 'required|string|max:255',
            'bank_address' => 'required|string|max:255',
            'swift' => 'required|string|max:255',
            'country_of_bank' => 'required|string|max:255',
            'account_holder' => 'required|string|max:255',
            'bank_phone' => 'required|string|max:255',
            'years_with_bank' => 'required|integer',
            'email_orders' => 'required|boolean',
            'phone_orders' => 'required|boolean',
            'telephone_orders' => 'required|boolean',
            'whatsapp_orders' => 'required|boolean',
            'trader1_name' => 'required|string|max:255',
            'trader1_phone' => 'required|string|max:255',
            'trader1_email' => 'required|email|max:255',
            'company_incorporation_cert' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'vat_cert' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'completed_refs' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'bank_details_cert' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'utility_bill_copy' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'director_id_doc' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'agree_terms' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validatedData;
        $data['password'] = Hash::make($request->password);

        $fileFields = [
            'company_incorporation_cert',
            'vat_cert',
            'completed_refs',
            'bank_details_cert',
            'utility_bill_copy',
            'director_id_doc'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('documents', 'public');
            }
        }

        $registration = Registration::create($data);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }
}
