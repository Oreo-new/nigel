<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Artesaos\SEOTools\Facades\SEOTools;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class SurveyMonkeyController extends Controller
{
    public function redirectToSurveyMonkey(Request $request)
    {
        // Redirect the user to the SurveyMonkey OAuth2 authorization URL
        $surveyMonkeyUrl = "https://api.surveymonkey.com/oauth/authorize";
        $clientId = env('SURVEYMONKEY_CLIENT_ID');

        // $redirectUri = route('survey-monkey-callback');
        $redirectUri = 'https://www.surveymonkey.com/tbm';
        $authorizationUrl = "$surveyMonkeyUrl?client_id=$clientId&redirect_uri=$redirectUri&response_type=code";

        return redirect($authorizationUrl);
    }

    public function handleSurveyMonkeyCallback(Request $request)
    {
        $code = $request->input('code');
       
        // Exchange the code for an access token
        $tokenUrl = "https://api.surveymonkey.com/oauth/token";
        $clientId = env('SURVEYMONKEY_CLIENT_ID');
        $clientSecret = env('SURVEYMONKEY_CLIENT_SECRET');;

        $httpClient = new Client();
        $response = $httpClient->post($tokenUrl, [
            'form_params' => [
                'code' => $code,
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'grant_type' => 'authorization_code',
            ],
        ]);

        $body = json_decode($response->getBody());
        $accessToken = $body->access_token;

        // Store the access token securely

        return "Access token: $accessToken";
    }
    public function getSurveys()
    {
       
       
        $page = Page::where('slug', 'survey')->firstOrFail();

        SEOTools::setTitle($page->meta_title ?? $page->title);
        SEOTools::setDescription(strip_tags($page->meta_description ?? ''));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        
        
        return view('pages.surveymonkey')
        ->with('page', $page);
        // ->with('surveys', $surveys);
    }
    public function getSurveyQuestions(Request $request)
    {
        // Obtain the access token through your authentication process
        $accessToken = 'MKGIdImxFYBgyHKOyrFs-LGmI2DASiMMb.2jxteLUO2LeIq6C-MRxeipOgLiz9QgmB4c85Or-n7AjIYREP5TPAwB5JmdF8nIDFS3sPr1JskmxxwhrAx2RH.X3jvznL5T';

        // Replace 'your-survey-id' with the actual SurveyMonkey survey ID you want to retrieve questions from
        $surveyId = '513531059';

        $url = "https://api.surveymonkey.com/v3/surveys/$surveyId/details";

        $httpClient = new Client();
        $response = $httpClient->get($url, [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
            ],
        ]);

        $surveyData = json_decode($response->getBody());
        dd( $surveyData );
        // Extract the questions and pass them to the view
        $questions = [];
        foreach ($surveyData->data as $page) {
            foreach ($page->questions as $question) {
                $questions[] = $question->headings[0]->heading;
            }
        }
       
        return view('survey-questions', ['questions' => $questions]);
    }
}
