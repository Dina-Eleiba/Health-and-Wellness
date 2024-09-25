<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactUs()
    {
        return view('Store.contact');
    }


    public function contactForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);


        Mail::to('hello@dina-wellness.com')->send(new ContactMail($data));
        return redirect()->back()->with('message', 'Your message has been sent successfully');



    }
}
