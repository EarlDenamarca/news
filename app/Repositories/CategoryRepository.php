<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function store( string $category ) : Category 
    {
        return Category::create([
            'category' => $category
        ]);
    }

    public function all() : Collection 
    {
        return Category::all();
    }

    public function findByCategory( string $category ) : Category 
    {
        return Category::where( 'category', $category )->first();
    }
}