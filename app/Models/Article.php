<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
        'author',
        'source_id',
        'published_date',
        'url',
        'image_url',
    ];
}
