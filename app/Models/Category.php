<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'category'
    ];

    /**
     * get the sources owned by the categorys
     */
    public function sources() : HasMany
    {
        return $this->hasMany( Source::class );
    }
}
