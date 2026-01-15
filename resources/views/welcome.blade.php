@extends('layouts.app')

@section('title', 'Email Demo - Home')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">📧 Welcome to Email Demo System</h1>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-top: 20px;">
        <!-- Events Card -->
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; padding: 25px; color: white;">
            <div style="font-size: 48px; margin-bottom: 15px;">📅</div>
            <h2 style="margin-bottom: 10px; font-size: 22px;">Event Notifications</h2>
            <p style="margin-bottom: 20px; opacity: 0.9;">Send email notifications to all users about upcoming events. Track attendance and keep everyone informed.</p>
            <a href="{{ url('/events') }}" class="btn btn-primary" style="background: white; color: #667eea;">
                View Events →
            </a>
        </div>

        <!-- Announcements Card -->
        <div style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); border-radius: 12px; padding: 25px; color: white;">
            <div style="font-size: 48px; margin-bottom: 15px;">📢</div>
            <h2 style="margin-bottom: 10px; font-size: 22px;">Announcements</h2>
            <p style="margin-bottom: 20px; opacity: 0.9;">Create and broadcast announcements to all users. Share important updates and news.</p>
            <a href="{{ url('/announcement') }}" class="btn btn-primary" style="background: white; color: #11998e;">
                Create Announcement →
            </a>
        </div>

        <!-- Features Card -->
        <div style="background: white; border-radius: 12px; padding: 25px; border: 2px solid #e0e0e0;">
            <div style="font-size: 48px; margin-bottom: 15px;">✨</div>
            <h2 style="margin-bottom: 10px; font-size: 22px; color: #333;">Key Features</h2>
            <ul style="list-style: none; padding: 0; color: #555; line-height: 1.8;">
                <li>✓ Queue-based email sending</li>
                <li>✓ Professional HTML email templates</li>
                <li>✓ Error handling & logging</li>
                <li>✓ Responsive design</li>
                <li>✓ Database seeders included</li>
            </ul>
        </div>
    </div>
</div>

<div class="card" style="margin-top: 20px;">
    <div class="card-header">
        <h2 class="card-title">📊 Quick Stats</h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        <div style="text-align: center; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <div style="font-size: 36px; font-weight: bold; color: #667eea;">
                {{ \App\Models\User::count() }}
            </div>
            <div style="color: #666;">Total Users</div>
        </div>

        <div style="text-align: center; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <div style="font-size: 36px; font-weight: bold; color: #11998e;">
                {{ \App\Models\Event::count() }}
            </div>
            <div style="color: #666;">Total Events</div>
        </div>

        <div style="text-align: center; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <div style="font-size: 36px; font-weight: bold; color: #f39c12;">
                {{ \App\Models\Announcement::count() }}
            </div>
            <div style="color: #666;">Total Announcements</div>
        </div>
    </div>
</div>
@endsection

