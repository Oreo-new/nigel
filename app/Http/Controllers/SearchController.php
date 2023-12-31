<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Document;
use App\Models\Event;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) 
    {
        
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        $searchkey = $request->query('search');
        $articles = Article::search($request->query('search'))->get();
        
        $articles->each(function ($article) {
            $article->load('user');
        });

        $news = Event::search($request->query('search'))->get();
        $documents = Document::search($request->query('search'))->get();

        return view('pages.search')
        ->with('documents', $documents)
        ->with('searchkey', $searchkey)
        ->with('news', $news)
        ->with('articles', $articles);
    }
}