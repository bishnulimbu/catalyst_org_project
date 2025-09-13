<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; }
        .header { text-align: center; padding-bottom: 20px; border-bottom: 2px solid #0056b3; }
        .header h1 { margin: 0; font-size: 24px; color: #0056b3; }
        .content { padding-top: 20px; }
        .info-item { margin-bottom: 15px; }
        .info-item strong { display: inline-block; width: 100px; font-weight: bold; color: #555; }
        .message-box { background-color: #fff; border-left: 4px solid #007bff; padding: 20px; margin-top: 20px; border-radius: 4px; }
        .footer { text-align: center; font-size: 12px; color: #999; margin-top: 30px; padding-top: 15px; border-top: 1px solid #e0e0e0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
        </div>
        
        <div class="content">
            <p>Hello,</p>
            <p>You have received a new message from the contact form on your website. Here are the details of the submission:</p>

            <div class="info-item">
                <strong>Name:</strong> {{ $data['first_name'] ?? '' }} {{ $data['last_name'] ?? '' }}
            </div>
            <div class="info-item">
                <strong>Email:</strong> <a href="mailto:{{ $data['email'] ?? '' }}" style="color: #007bff;">{{ $data['email'] ?? '' }}</a>
            </div>
            <div class="info-item">
                <strong>Company:</strong> {{ $data['company'] ?? 'N/A' }}
            </div>
            <div class="info-item">
                <strong>Subject:</strong> {{ $data['subject'] ?? 'N/A' }}
            </div>

            <p><strong>Message:</strong></p>
            <div class="message-box">
                <p>{{ $data['message'] }}</p>
            </div>
        </div>

        <div class="footer">
            <p>This message was automatically generated. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>