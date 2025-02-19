<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('email_form');
});

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');