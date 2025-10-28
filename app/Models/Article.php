<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * get the sources that owns the article
     */
    public function source() : BelongsTo
    {
        return $this->belongsTo( Source::class );
    }
}
