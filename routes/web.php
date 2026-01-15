<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group.
|
*/

// Home Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Event Routes
Route::prefix('events')->name('events.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::post('/notify', [EventController::class, 'notifyStudents'])->name('notify');
});

// Announcement Routes
Route::prefix('announcement')->name('announcement.')->group(function () {
    Route::get('/', [AnnouncementController::class, 'index'])->name('index');
    Route::post('/send', [AnnouncementController::class, 'send'])->name('send');
});

// Email Preview Routes (for testing)
Route::get('/preview/event/{event}', function (App\Models\Event $event) {
    return new App\Mail\EventNotificationMail($event);
})->name('preview.event');

Route::get('/preview/announcement/{announcement}', function (App\Models\Announcement $announcement) {
    return new App\Mail\AnnouncementMail($announcement);
})->name('preview.announcement');
