<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Announcement;
use App\Mail\AnnouncementMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AnnouncementController extends Controller
{
    /**
     * Show the form for creating a new announcement.
     */
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Store and send a new announcement.
     */
    public function send(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            $announcement = Announcement::create([
                'title' => $request->title,
                'message' => $request->message,
            ]);

            $users = User::whereNotNull('email')->get();

            if ($users->isEmpty()) {
                return back()->with('error', 'No users found to send emails.');
            }

            $emailsSent = 0;
            $emailsFailed = 0;

            foreach ($users as $user) {
                try {
                    Mail::to($user->email)->send(
                        new AnnouncementMail($announcement)
                    );
                    $emailsSent++;
                } catch (\Exception $e) {
                    $emailsFailed++;
                    Log::error("Failed to send announcement email to {$user->email}: " . $e->getMessage());
                }
            }

            $message = "Announcement sent to {$emailsSent} users.";
            if ($emailsFailed > 0) {
                $message .= " {$emailsFailed} emails failed.";
            }

            return back()->with('success', $message);

        } catch (\Exception $e) {
            Log::error('Announcement send error: ' . $e->getMessage());
            return back()->with('error', 'Failed to send announcement. Please try again.');
        }
    }
}

