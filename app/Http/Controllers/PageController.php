<?php

namespace App\Http\Controllers;

use App\Models\MoreVideo;
use App\Models\Page;
use Illuminate\Http\Request;

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
 }
