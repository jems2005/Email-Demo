<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Mail\EventNotificationMail;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    // GET /events
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // POST /events/notify
    public function notifyStudents(Request $request)
    {
        $event = Event::findOrFail($request->event_id);

        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(
                new EventNotificationMail($event)
            );
        }

        return back()->with('success', 'Emails sent!');
    }
}
