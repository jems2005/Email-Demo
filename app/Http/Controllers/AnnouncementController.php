<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Announcement;
use App\Mail\AnnouncementMail;
use Illuminate\Support\Facades\Mail;

class AnnouncementController extends Controller
{
    // GET /announcement
    public function index()
    {
        return view('announcements.index');
    }

    // POST /announcement/send
    public function send(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);

        $announcement = Announcement::create([
            'title' => $request->title,
            'message' => $request->message,
        ]);

        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(
                new AnnouncementMail($announcement)
            );
        }

        return back()->with('success', 'Announcement sent!');
    }
}

