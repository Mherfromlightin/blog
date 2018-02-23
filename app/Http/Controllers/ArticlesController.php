<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Mail\welcome;
use App\Mail\Welcomeagain;
use App\Repositories\ArticleRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ArticlesController extends Controller
{
    public function index(Request $request, ArticleRepository $articleRepository)
    {
        $filters = $request->only(['month', 'year']);
        $with = ['tags', 'categories', 'user', 'comments'];

        $articles = $articleRepository->getArchived($filters, $with);

        return view('articles.index', compact('articles'));
    }

    public function sqlIndex()
    {
        $users = DB::table('users')
            ->join('articles', 'users.id', '=', 'articles.user_id')
            ->join('categories', 'users.id', '=', 'categories.user_id')
            ->select('users.*', 'articles.title', 'categories.name')
            ->where()
            ->get();

        return view('sqlTest.sql', compact('users'));
    }

    public function articlesTable()
    {
        $articles = Article::latest()->get();

        return view('scripts.articlesTable', compact('articles'));
    }

    public function categoryIndex(Category $category)
    {
        $articles = $category->articles;

        return view('articles.category_index', compact('articles', 'category'));
    }

    public function create(Article $article)
    {
        $categories = Category::all();
        $currentCategoryIds = $article->categories()->pluck('categories.id')->toArray();

        return view('articles.create', compact('categories', 'currentCategoryIds', 'article'));
    }

    public function store(ArticleRequest $request)
    {
        $data = [
            'title' => $request->title,
            'text' => $request->text,
            'user_id' => auth()->id()
        ];

        $article = User::publishArticle($data);

        $article->categories()->attach($request->categories);

        session()->flash('message', 'You have new article');

        return response()->json([
            'data' => [
                'article_id' => $article->id,
            ],
            'message' => 'Article save successfully!'
        ], 200);
    }

    public function show(Article $article, Category $category)
    {
        $comments = $article->comments;

        return view('articles.show', compact('article', 'comments', 'category'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $currentCategoryIds = $article->categories()->pluck('categories.id')->toArray();

        return view('articles.edit', compact('article', 'categories', 'currentCategoryIds'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'text' => $request->text,
            'user_id' => auth()->id(),
        ]);

        $article->categories()->sync($request->categories);

        return response()->json([
            'data' => [
                'article_id' => $article->id,
            ],
            'message' => 'Article updated successfully!'
        ], 200);
    }

    public function destroy(Article $article, Request $request)
    {
        $article->delete();

        return response()->json([
            'data' => [
                'article_id' => $article->id,
            ],
            'message' => 'Article updated successfully!'
        ], 200);
    }
}