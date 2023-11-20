<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\MailNotification;
use App\Mail\MailSurvey;
use App\Models\Question;
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
        Mail::to('nsouthway@bell.net')->send(new MailNotification($input));

        return redirect()->back()->with(['success' => 'Thank you for contacting us']);
    }

    public function sendsurvey(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'g-recaptcha-response' => ['required', new Captcha]
        ]);

        $input = $request->all();
        $questions = Question::all();
        $allQuestion = $questions->toArray();
        $alldata = array_merge($allQuestion, $input);
        
        Mail::to('clintscopy@gmail.com')->send(new MailSurvey($alldata));
        return redirect()->back()->with(['success' => 'Thank you for taking the survey']);
    }
}