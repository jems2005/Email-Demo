@extends('layouts.app')

@section('title', 'Announcements - Email Demo')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">📢 Send Announcement</h1>
    </div>

    <form method="POST" action="{{ route('announcement.send') }}">
        @csrf

        <div class="form-group">
            <label class="form-label">Title (Email Subject)</label>
            <input type="text" name="title" class="form-control" placeholder="Enter announcement title..." required>
        </div>

        <div class="form-group">
            <label class="form-label">Message (Email Content)</label>
            <textarea name="message" class="form-control" placeholder="Enter your announcement message..." rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-success" onclick="return confirm('Send this announcement to all users?');">
            📤 Send Announcement
        </button>
    </form>
</div>

@if(isset($announcements) && $announcements->count() > 0)
<div class="card" style="margin-top: 20px;">
    <div class="card-header">
        <h2 class="card-title">📜 Recent Announcements</h2>
    </div>

    <div style="display: grid; gap: 15px;">
        @foreach ($announcements as $announcement)
            <div style="background: #f8f9fa; border-radius: 8px; padding: 20px; border-left: 4px solid #11998e;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                    <h3 style="color: #11998e; margin: 0;">{{ $announcement->title }}</h3>
                    <span style="color: #888; font-size: 13px;">
                        {{ $announcement->created_at->format('M d, Y H:i') }}
                    </span>
                </div>
                <p style="color: #555; margin: 0; line-height: 1.6;">{{ $announcement->message }}</p>
            </div>
        @endforeach
    </div>
</div>
@endif
@endsection

