<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Event;
use App\Models\MoreVideo;
use App\Models\Page;
use App\Models\PageArticle;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home() 
    {

        $page = Page::where('slug', 'home')->firstorFail();
        return view('pages.home')
        ->with('page', $page);
    }
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstorFail();
        
        if($slug == 'introduction-video') {
            return view('pages.intro')
                ->with('page', $page);
        } elseif($slug == 'home'){
            return abort(404);
        }
        
        return view('pages.page')
        ->with('page', $page);
    }
    public function more() 
    {
        $page = Page::where('slug', 'more-videos')->firstorFail();
        $videos = MoreVideo::all();
        return view('pages.more-videos')
            ->with('page', $page)
            ->with('videos', $videos);
    }
    public function documents() 
    {
        $page = Page::where('slug', 'documents')->firstorFail();
        $documents = Document::all()->sortBy("created_at");
        return view('pages.documents')
            ->with('page', $page)
            ->with('documents', $documents);
    }
    public function about() 
    {
        $page = Page::where('slug', 'about-the-author')->firstorFail();
        $document = $page->pageArticle()->first();
        return view('pages.about')
            ->with('page', $page)
            ->with('document', $document);
    }
    public function ordering() 
    {
        $page = Page::where('slug', 'book-ordering')->firstorFail();
        $document = $page->pageArticle()->first();
        return view('pages.ordering')
            ->with('page', $page)
            ->with('document', $document);
    }
    public function contact() 
    {
        $page = Page::where('slug', 'contact')->firstorFail();
        return view('pages.contact')
            ->with('page', $page);
    }
    public function articles() 
    {
        $page = Page::where('slug', 'tbm-articles')->firstorFail();
        $articles = DB::table('articles');
        $latest = $articles->latest()->take(5)->get();
        $sortedArticles = $articles->join('users', 'articles.user_id', '=', 'users.id')
        ->select('articles.*', 'users.name as user_name')
        ->orderBy('created_at', 'desc')->paginate(5);

        return view('pages.articles')
        ->with('page', $page)
        ->with('latest', $latest)
        ->with('sortedArticles', $sortedArticles);
    }
    public function article($slug) 
    {
        
        $articles = DB::table('articles');
        $article = $articles->join('users', 'articles.user_id', '=', 'users.id')
        ->where('articles.slug', $slug)
        ->select('articles.*', 'users.name as author_name', 'users.email as author_email')
        ->first();
        $comments = Comment::where('article_id', $article->id)
        ->whereNull('parent_id')
        ->with('replies')
        ->orderBy('created_at', 'asc')
        ->get();
        
        return view('pages.article')->with('article', $article)
        ->with('comments', $comments);
    }
    public function archive($slug) 
    {
        $date = Carbon::createFromFormat('F-Y', $slug)->format('Y-m');

        list($year, $month) = explode('-', $date);

        $articles = DB::table('articles');

        $sortedArticles = $articles
        ->whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)->paginate(5);

        $latest = $articles->latest()->take(5)->get();
        return view('pages.archived')
        ->with('latest', $latest)
        ->with('date', $date)
        ->with('sortedArticles', $sortedArticles);
        
    }
    public function survey() 
    {
        $page = Page::where('slug', 'survey')->firstorFail();
        $questions = Question::all();
        
        return view('pages.survey')
        ->with('page', $page)
        ->with('questions', $questions);
    }

    public function news() 
    {
        $page = Page::where('slug', 'news')->firstorFail();
        $news = DB::table('events');
        $allnews = $news->orderBy('created_at', 'desc')->paginate(5);
        
        return view('pages.news')
        ->with('page', $page)
        ->with('allnews', $allnews);
    }
    public function news1($slug) 
    {
        
        $article = Event::where('slug', $slug)->firstorFail();
        
        return view('pages.singlenews')->with('article', $article);
    }

 }
