<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');

    }

    public function store(Request $request)
    {
       $this->validate($request, [
           'title' => 'required|string|min:5|max:2000',
           'text' => 'required|string|min:15|max:2000'
       ]);
       Article::create($request->only(['title','text']));
       return redirect('/articles');
    }

    public function show(Article $article)
    {
        $comments = $article->comments;
        return view('articles.show', compact('article', 'comments'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' => 'required|string|min:5|max:2000',
            'text' => 'required|string|min:15|max:2000'
        ]);
        $article->update([
            'title' => $request->title,
            'text' => $request->text,

        ]);
        return redirect('/articles');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/articles');
    }
}
