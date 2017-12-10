<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $this->validate($request, [
            'body' => 'required|string|min:1|max:10000'
        ]);

        $article->addComment($request->body);

        return back();
    }
}
