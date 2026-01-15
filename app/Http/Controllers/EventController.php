<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Mail\EventNotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of events.
     */
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    /**
     * Send event notification to all users.
     */
    public function notifyStudents(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        try {
            $event = Event::findOrFail($request->event_id);
            $users = User::whereNotNull('email')->get();

            if ($users->isEmpty()) {
                return back()->with('error', 'No users found to send emails.');
            }

            $emailsSent = 0;
            $emailsFailed = 0;

            foreach ($users as $user) {
                try {
                    Mail::to($user->email)->send(
                        new EventNotificationMail($event)
                    );
                    $emailsSent++;
                } catch (\Exception $e) {
                    $emailsFailed++;
                    Log::error("Failed to send event email to {$user->email}: " . $e->getMessage());
                }
            }

            $message = "Event notification sent to {$emailsSent} users.";
            if ($emailsFailed > 0) {
                $message .= " {$emailsFailed} emails failed.";
            }

            return back()->with('success', $message);

        } catch (\Exception $e) {
            Log::error('Event notification error: ' . $e->getMessage());
            return back()->with('error', 'Failed to send event notifications. Please try again.');
        }
    }
}
