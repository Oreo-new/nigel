<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class LatestArticle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $articles = DB::table('articles');
        $latest = $articles->latest()->take(5)->get();

        $sorted =   $articles->get();

        $groupedArticles = $sorted->groupBy(function($sort) {
            $date = Carbon::parse($sort->created_at);
            return $date->format('Y-m');
        });
        $groupedArticles->all();
        
        return view('components.latest-article')
        ->with('latest', $latest)
        ->with('groupedArticles', $groupedArticles);
    }
}
