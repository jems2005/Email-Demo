<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AnnouncementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index']);
Route::post('/events/notify', [EventController::class, 'notifyStudents'])
    ->name('events.notify');

    Route::get('/announcement', [AnnouncementController::class, 'index']);
    Route::post('/announcement/send', [AnnouncementController::class, 'send'])->name('announcement.send');