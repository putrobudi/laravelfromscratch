<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ContactMe;
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
      // Send raw email
      // Mail::raw('It works!', function($message) {
      //   $message->to(request('email'))
      //     ->subject('Hello There'); // You could defined the sender here or be explicit in global email address in config.mail
      // });

      // send html email
      // Mail::to(request('email'))->send(new ContactMe);
      // Mail::to(request('email'))->send(new ContactMe(/* usually this is a result of database query or from a form. */ 'shirts'));
      Mail::to(request('email'))->send(new Contact());


      // flash message = a data that's passed into a session for exactly one request.
      return redirect('/contact')
        ->with('message', 'Email sent!');
    }
}
