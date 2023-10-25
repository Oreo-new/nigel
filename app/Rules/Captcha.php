<?php

namespace App\Rules;


use Closure;
use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Captcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Verify the reCAPTCHA response
        
        $response = Http::get("https://www.google.com/recaptcha/api/siteverify",[

            'secret' => env('GOOGLE_RECAPTCHA_SECRET'),

            'response' => $value

        ]);

  

        if (!($response->json()["success"] ?? false)) {

              $fail('The google recaptcha is required.');

        }
    }
    
}
