<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {

        $page = Page::where('slug', 'home')->firstorFail();
        return view('pages.home')
        ->with('page', $page);
    }
}
