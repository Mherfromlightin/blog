<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'text',
        'title',
        'user_id'
    ];

    public function scopeFilters($query, $filters)
    {
        if (isset($filters['year'])) {
            $query->whereYear('created_at', $filters['year']);
        }

        if (isset($filters['month'])) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }
    }

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

    public function comaSeparatedCategories()
    {
        return $this->categories();
    }
}