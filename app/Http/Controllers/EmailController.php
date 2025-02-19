<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendUserMail;
use Illuminate\Contracts\Mail\Mailer;
use Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to($request->email)->send(new SendUserMail($request->email, $request->message));

        return back()->with('success', 'Email sent successfully!');
    }
}