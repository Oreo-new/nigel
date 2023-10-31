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

        $redirectUri = route('survey-monkey-callback');
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
        // Make an API request to retrieve a list of surveys
        $accessToken = 'aH53VJ63H0NmzlwgO-fYiz4HAn-lUW748wgHnsQoTijtqCEJZnjBb9fCqlU.8bRtBUCeJhfCGZPegxoHeODoAX9owjuowBfL9pl9eAnasTUTAi2waLn1DPcyBPueExLv'; // Replace with the actual access token
        $url = "https://api.surveymonkey.com/v3/surveys";

        $httpClient = new Client();
        $response = $httpClient->get($url, [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
            ],
        ]);
        

        $surveys = json_decode($response->getBody());

        $page = Page::where('slug', 'survey')->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        
        
        return view('pages.surveymonkey')
        ->with('page', $page)
        ->with('surveys', $surveys);
    }
}
