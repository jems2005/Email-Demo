@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Events List</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($events->count() === 0)
        <p>No events found.</p>
    @else
        <ul>
            @foreach ($events as $event)
                <li>
                    <strong>{{ $event->title }}</strong><br>
                    {{ $event->description ?? '' }}

                    <form method="POST" action="{{ route('events.notify') }}" style="margin-top:5px;">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <button type="submit">Notify Students</button>
                    </form>
                </li>
                <hr>
            @endforeach
        </ul>
    @endif

</div>
@endsection
