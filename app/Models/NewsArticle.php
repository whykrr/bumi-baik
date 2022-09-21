<?php

namespace App\Models;

use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    use HasFactory;

    protected $table = "news_articles";

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'author',
    ];

    protected $visible = [
        'id',
        'title',
        'slug',
        'content',
        'image',
        'author',
    ];

    protected $casts = [];

    public function setSlugAttribute($value)
    {
        $slugify = new Slugify();
        $this->attributes['slug'] = $slugify->slugify($value);
    }
}
