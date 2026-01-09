<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartify Tech Services Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #dddddd;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333333;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            font-size: 20px;
            color: #333333;
            border-bottom: 2px solid #eeeeee;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 12px 15px;
            border: 1px solid #dddddd;
            text-align: left;
        }
        .table th {
            background-color: #f8f8f8;
            font-weight: bold;
            color: #555555;
            width: 35%;
        }
        .table td {
            background-color: #ffffff;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Smartify Tech Services Registration</h1>
        </div>

        <div class="section">
            <h2>General information</h2>
            <table class="table">
                <tr>
                    <th>Company Name</th>
                    <td>{{ $registration->company_name }}</td>
                </tr>
                <tr>
                    <th>Type of business</th>
                    <td>{{ $registration->type_of_business }}</td>
                </tr>
                <tr>
                    <th>Type of legal entity</th>
                    <td>{{ $registration->legal_entity }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ $registration->phone }}</td>
                </tr>
                <tr>
                    <th>Ceo or legal representative full name</th>
                    <td>{{ $registration->ceo_name }}</td>
                </tr>
                <tr>
                    <th>Email address</th>
                    <td>{{ $registration->email }}</td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td>{{ $registration->website }}</td>
                </tr>
                <tr>
                    <th>Invoice/Delivery address</th>
                    <td>{{ $registration->invoice_address }}</td>
                </tr>
                <tr>
                    <th>Delivery address</th>
                    <td>{{ $registration->delivery_address }}</td>
                </tr>
                <tr>
                    <th>Accountant name</th>
                    <td>{{ $registration->accountant_name }}</td>
                </tr>
                <tr>
                    <th>Accountant email address</th>
                    <td>{{ $registration->accountant_email }}</td>
                </tr>
                <tr>
                    <th>Company registration NO.</th>
                    <td>{{ $registration->company_reg_no }}</td>
                </tr>
                <tr>
                    <th>VAT Registration NO.</th>
                    <td>{{ $registration->vat_reg_no }}</td>
                </tr>
                <tr>
                    <th>Number of empoyees</th>
                    <td>{{ $registration->num_employees }}</td>
                </tr>
                <tr>
                    <th>Date of registration</th>
                    <td>{{ $registration->date_registration }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>Bank details</h2>
            <table class="table">
                <tr>
                    <th>Name of bank</th>
                    <td>{{ $registration->bank_name }}</td>
                </tr>
                <tr>
                    <th>IBAN</th>
                    <td>{{ $registration->iban }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $registration->bank_address }}</td>
                </tr>
                <tr>
                    <th>SWIFT</th>
                    <td>{{ $registration->swift }}</td>
                </tr>
                <tr>
                    <th>Country of bank</th>
                    <td>{{ $registration->country_of_bank }}</td>
                </tr>
                <tr>
                    <th>Account holder</th>
                    <td>{{ $registration->account_holder }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ $registration->bank_phone }}</td>
                </tr>
                <tr>
                    <th>Number of years with bank</th>
                    <td>{{ $registration->years_with_bank }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>References</h2>
            <table class="table">
                <tr>
                    <th>Name of bank</th>
                    <td>{{ $registration->ref1_bank_name }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $registration->ref1_address }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ $registration->ref1_phone }}</td>
                </tr>
                <tr>
                    <th>Name and Surname</th>
                    <td>{{ $registration->ref1_name }}</td>
                </tr>
                <tr>
                    <th>Name of bank</th>
                    <td>{{ $registration->ref2_bank_name }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $registration->ref2_address }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ $registration->ref2_phone }}</td>
                </tr>
                <tr>
                    <th>Name and Surname</th>
                    <td>{{ $registration->ref2_name }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>Authorization for online and phone orders</h2>
            <table class="table">
                <tr>
                    <th>E-mail orders allowed</th>
                    <td>{{ $registration->email_orders ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Phone orders allowed</th>
                    <td>{{ $registration->phone_orders ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Telephone orders allowed</th>
                    <td>{{ $registration->telephone_orders ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>WhatsApp orders allowed</th>
                    <td>{{ $registration->whatsapp_orders ? 'Yes' : 'No' }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>Traders / Contact for sale & purchase / Brokers who are allowed for orders</h2>
            <table class="table">
                <tr>
                    <th>First & Last name</th>
                    <td>{{ $registration->trader1_name }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ $registration->trader1_phone }}</td>
                </tr>
                <tr>
                    <th>E-mail address</th>
                    <td>{{ $registration->trader1_email }}</td>
                </tr>
                <tr>
                    <th>First & Last name</th>
                    <td>{{ $registration->trader2_name }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ $registration->trader2_phone }}</td>
                </tr>
                <tr>
                    <th>E-mail address</th>
                    <td>{{ $registration->trader2_email }}</td>
                </tr>
                <tr>
                    <th>First & Last name</th>
                    <td>{{ $registration->trader3_name }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ $registration->trader3_phone }}</td>
                </tr>
                <tr>
                    <th>E-mail address</th>
                    <td>{{ $registration->trader3_email }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>IMPORTANT - PLEASE SUPPLY THE FOLLOWING:</h2>
            <table class="table">
                <tr>
                    <th>Company Incorporation Certificate.</th>
                    <td>{{ $registration->company_incorporation_cert ? 'Attached' : 'Not Provided' }}</td>
                </tr>
                <tr>
                    <th>VAT Certificate</th>
                    <td>{{ $registration->vat_cert ? 'Attached' : 'Not Provided' }}</td>
                </tr>
                <tr>
                    <th>Completed references and company representatives</th>
                    <td>{{ $registration->completed_refs ? 'Attached' : 'Not Provided' }}</td>
                </tr>
                <tr>
                    <th>Bank Account Details</th>
                    <td>{{ $registration->bank_details_cert ? 'Attached' : 'Not Provided' }}</td>
                </tr>
                <tr>
                    <th>Copy of recent utility bill (Electric/Water/Gas/Landline Telephone).</th>
                    <td>{{ $registration->utility_bill_copy ? 'Attached' : 'Not Provided' }}</td>
                </tr>
                <tr>
                    <th>Director ID document</th>
                    <td>{{ $registration->director_id_doc ? 'Attached' : 'Not Provided' }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>Terms and Conditions</h2>
            <table class="table">
                <tr>
                    <th>Agreement to the Company’s Terms and Conditions</th>
                    <td>{{ $registration->agree_terms ? 'Agree' : 'Disagree' }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Smartify Tech Services. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
