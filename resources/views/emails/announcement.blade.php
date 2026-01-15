<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }
        .content {
            padding: 30px;
            color: #333;
            line-height: 1.6;
        }
        .announcement-title {
            color: #11998e;
            font-size: 22px;
            margin-bottom: 15px;
            border-bottom: 2px solid #11998e;
            padding-bottom: 10px;
        }
        .message-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #11998e;
        }
        .date-info {
            color: #666;
            font-size: 14px;
            margin-top: 20px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-icon">📢</div>
            <h1>New Announcement</h1>
        </div>

        <div class="content">
            <h2 class="announcement-title">{{ $announcement->title }}</h2>

            <div class="message-box">
                <p>{{ $announcement->message }}</p>
            </div>

            <div class="date-info">
                <p><strong>Published:</strong> {{ $announcement->publish_date->format('l, F d, Y') }}</p>
            </div>
        </div>

        <div class="footer">
            <p>This is an automated message from the Email Demo System.</p>
            <p>© {{ date('Y') }} Email Demo. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

