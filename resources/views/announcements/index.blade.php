@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Send Announcement</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('announcement.send') }}">
        @csrf

        <div>
            <label>Title (Email Subject)</label><br>
            <input type="text" name="title" required>
        </div>

        <br>

        <div>
            <label>Message (Email Content)</label><br>
            <textarea name="message" rows="5" required></textarea>
        </div>

        <br>

        <button type="submit">Send Announcement</button>
    </form>
</div>
@endsection
