<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Source extends Model
{
    protected $fillable = [
        'source_id',
        'name',
        'description',
        'url',
        'category_id',
        'language',
        'country'
    ];

    /**
     * get the category that owns the source
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo( Category::class );
    }
}
