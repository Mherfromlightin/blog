<?php

namespace App\Repositories;

use App\Article;

class ArticleRepository
{
    public function getArchived($filters)
    {
        return  Article::latest()->filters($filters)->get();
    }
}