<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\EventComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
       
        $request->validate(['comment'=>'required','name'=>'required']);
        $input = $request->all();

        Comment::create($input);

        return back();
    }
    public function store2(Request $request)
    {
       
        $request->validate(['comment'=>'required','name'=>'required']);
        $input = $request->all();

        EventComment::create($input);

        return back();
    }
    
}
