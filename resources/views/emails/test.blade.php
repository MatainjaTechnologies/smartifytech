<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smartify Tech - Test Mail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
            border-radius: 0 0 5px 5px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Smartify Tech</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>This is a test email to verify that the mail configuration is working correctly for the Smartify Tech application.</p>
            <p>If you have received this email, it means the mail service is functioning as expected.</p>
            <p>Thank you!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Smartify Tech. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
