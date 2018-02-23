<?php

namespace App\Http\Controllers;

use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = $tag->articles;

        return view('articles.index', compact('articles'));
    }
}