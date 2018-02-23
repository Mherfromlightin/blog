<?php

namespace App\Repositories;

use App\Article;

class ArticleRepository
{
    protected $model;

    public function getArchived($filters, $with = [])
    {
        return Article::with($with)->filters($filters)->latest()->get();
    }

}