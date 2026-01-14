<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 30px;
            border: 1px solid #ddd;
            border-top: none;
        }
        .field {
            margin-bottom: 20px;
        }
        .field-label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }
        .field-value {
            background: white;
            padding: 10px;
            border-left: 4px solid #007bff;
            border-radius: 3px;
        }
        .footer {
            background: #f1f1f1;
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
        <p>Smartify Tech - Contact Form</p>
    </div>
    
    <div class="content">
        <p>You have received a new contact form submission. Here are the details:</p>
        
        <div class="field">
            <div class="field-label">Name:</div>
            <div class="field-value">{{ $contact->name }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">Email:</div>
            <div class="field-value">{{ $contact->email }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">Phone:</div>
            <div class="field-value">{{ $contact->phone }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">Subject:</div>
            <div class="field-value">{{ $contact->subject }}</div>
        </div>
        
        @if($contact->message)
        <div class="field">
            <div class="field-label">Message:</div>
            <div class="field-value">{{ nl2br($contact->message) }}</div>
        </div>
        @endif
        
        <div class="field">
            <div class="field-label">Submitted At:</div>
            <div class="field-value">{{ $contact->created_at->format('Y-m-d H:i:s') }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>This email was sent automatically from the Smartify Tech contact form.</p>
        <p>&copy; {{ date('Y') }} Smartify Tech. All rights reserved.</p>
    </div>
</body>
</html>
