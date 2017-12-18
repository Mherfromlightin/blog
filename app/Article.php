<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'text',
        'title',
        'user_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function addComment($data)
    {
        return $this->comments()->create($data);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
