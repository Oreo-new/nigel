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
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimplePie;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PageController extends Controller
{
    public function home() 
    {
        $page = Page::where('slug', 'home')->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        
        return view('pages.home')
        ->with('page', $page);
    }
    public function intro()
    {
        $page = Page::where('slug', 'introduction-video')->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        return view('pages.intro')
                ->with('page', $page);
    }
    public function page($slug)
    {
       if($slug == 'home'){
            return abort(404);
        }

        $page = Page::where('slug', $slug)->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        return view('pages.page')
        ->with('page', $page);
    }
    public function more() 
    {
        $page = Page::where('slug', 'more-videos')->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        $videos = MoreVideo::all();
        return view('pages.more-videos')
            ->with('page', $page)
            ->with('videos', $videos);
    }
    public function documents() 
    {
        $page = Page::where('slug', 'documents')->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        $documents = Document::all()->sortBy("created_at");
        return view('pages.documents')
            ->with('page', $page)
            ->with('documents', $documents);
    }
    public function about() 
    {
        $page = Page::where('slug', 'about-the-author')->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        $document = $page->pageArticle()->first();
        return view('pages.about')
            ->with('page', $page)
            ->with('document', $document);
    }
    public function ordering() 
    {
        $page = Page::where('slug', 'book-ordering')->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        $document = $page->pageArticle()->first();
        return view('pages.ordering')
            ->with('page', $page)
            ->with('document', $document);
    }
    public function contact() 
    {
        $page = Page::where('slug', 'contact')->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        return view('pages.contact')
            ->with('page', $page);
    }
    public function articles() 
    {
        $page = Page::where('slug', 'tbm-articles')->firstorFail();

        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

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

        SEOTools::setTitle($article->title);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

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
        
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        list($month, $year) = explode('-', $slug);

        $parsedDate = Carbon::create($year, $month, 1);
        $date = $parsedDate->format('Y-F');

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
        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        $questions = Question::all();
        
        return view('pages.survey')
        ->with('page', $page)
        ->with('questions', $questions);
    }

    public function news() 
    {
        $page = Page::where('slug', 'news')->firstorFail();
        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        $news = DB::table('events');
        $allnews = $news->orderBy('created_at', 'desc')->paginate(5);


        return view('pages.news')
        ->with('page', $page)
        ->with('allnews', $allnews);

        
        
    }

    public function substack() 
    {
        $page = Page::where('slug', 'tbm-on-substack')->firstorFail();
        SEOTools::setTitle($page->meta_title);
        SEOTools::setDescription(strip_tags($page->meta_description));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        $news = DB::table('events');
        $allnews = $news->orderBy('created_at', 'desc')->paginate(5);


        $rssFeedUrl = 'https://nigelsouthway.substack.com/feed';

        $client = new Client([
            'base_uri' => 'https://nigelsouthway.substack.com/',
            'timeout'  => 2.0,
            ]);
          $response = $client->get('feed/');

          
          $data = $response->getBody()->getContents();


          
        try {
            $response = Cache::remember('rss_feed', now()->addHours(10), function () use ($rssFeedUrl) {
                return Http::get($rssFeedUrl)->body();
            });

            $feed = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
            $items = [];
            

            foreach ($feed->channel->item as $item) {
                // dd($item->enclosure->attributes()['url']);
                $items[] = [
                    'title' => (string) $item->title,
                    'link' => (string) $item->link,
                    'description' => (string) $item->description,
                    'date' =>  $item->pubDate,
                    'img' => $item->enclosure->attributes()['url']
                ];
            }

            return view('pages.substack')
            ->with('page', $page)
            ->with('items', $items);

        } catch (\Exception $e) {
            throw new HttpException(500, 'Failed to fetch RSS feed');
        }
        
    }



    public function news1($slug) 
    {
        
        $article = Event::where('slug', $slug)->firstorFail();
        SEOTools::setTitle($article->title);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        
        return view('pages.singlenews')->with('article', $article);
    }

 }
