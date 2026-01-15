<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Notification</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        .event-title {
            color: #667eea;
            font-size: 22px;
            margin-bottom: 15px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }
        .event-info {
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 4px 4px 0;
        }
        .event-info strong {
            color: #667eea;
        }
        .description {
            margin: 20px 0;
            font-size: 16px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 25px;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-icon">📅</div>
            <h1>New Event Notification</h1>
        </div>

        <div class="content">
            <h2 class="event-title">{{ $event->title }}</h2>

            <div class="event-info">
                <p><strong>📆 Event Date:</strong> {{ $event->event_date->format('l, F d, Y') }}</p>
            </div>

            <div class="description">
                <p>{{ $event->description }}</p>
            </div>

            <div style="text-align: center;">
                <a href="{{ url('/events') }}" class="button">View All Events</a>
            </div>
        </div>

        <div class="footer">
            <p>This is an automated message from the Email Demo System.</p>
            <p>© {{ date('Y') }} Email Demo. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

