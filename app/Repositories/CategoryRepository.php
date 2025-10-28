<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function store( string $category ) : Category 
    {
        return Category::create([
            'category' => $category
        ]);
    }
}