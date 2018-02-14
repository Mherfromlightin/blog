<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('layouts.partials.sidebar', function ($view) {
            $archives = Article::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as items')
                ->groupBy('year', 'month')->orderByDesc('created_at')->get();
            $view->with(compact('archives'));
        });
    }
}