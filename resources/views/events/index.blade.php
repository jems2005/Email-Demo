@extends('layouts.app')

@section('title', 'Events - Email Demo')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">📅 Events Management</h1>
    </div>

    @if($events->count() === 0)
        <div style="text-align: center; padding: 40px; color: #888;">
            <div style="font-size: 64px; margin-bottom: 15px;">📭</div>
            <p>No events found.</p>
            <p style="margin-top: 10px;">Run <code>php artisan db:seed</code> to seed sample data.</p>
        </div>
    @else
        <div style="display: grid; gap: 20px;">
            @foreach ($events as $event)
                <div style="background: #f8f9fa; border-radius: 10px; padding: 20px; border-left: 4px solid #667eea;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 15px;">
                        <div style="flex: 1;">
                            <h3 style="color: #333; margin-bottom: 8px; font-size: 20px;">{{ $event->title }}</h3>
                            <div style="display: flex; gap: 20px; color: #666; margin-bottom: 10px; flex-wrap: wrap;">
                                <span style="display: flex; align-items: center; gap: 5px;">
                                    📆 {{ $event->event_date->format('M d, Y') }}
                                </span>
                            </div>
                            <p style="color: #555; line-height: 1.6;">{{ $event->description }}</p>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('events.notify') }}">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Send notification for this event to all users?');">
                                    🔔 Notify Users
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

