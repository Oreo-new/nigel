<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\MailNotification;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function submitForm(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new Captcha]
        ]);

        $input = $request->all();
        Mail::to('clintscopy@gmail.com')->send(new MailNotification($input));

        return redirect()->back()->with(['success' => 'Thank you for contacting us']);
    }
}