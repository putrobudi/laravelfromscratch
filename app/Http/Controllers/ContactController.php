<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show() {
      return view('contact');
    }

    public function store() {
      request()->validate(['email' => 'required|email']);

      // send the email
      // $email = request('email');
      // dd($email);
      Mail::raw('It works!', function($message) {
        $message->to(request('email'))
          ->subject('Hello There'); // You could defined the sender here or be explicit in global email address in config.mail
      });

      // flash message = a data that's passed into a session for exactly one request.
      return redirect('/contact')
        ->with('message', 'Email sent!');
    }
}
