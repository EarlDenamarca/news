<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    /**
     * store a category in the database
     * 
     * @param string $category  The category of the news
     * 
     * @return void
     */
    public function store( string $category ) : void 
    {
        Category::create([
            'category' => $category
        ]);
    }

    /**
     * retreive all the category from the database
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all() : Collection 
    {
        return Category::all();
    }

    /**
     * find a category from the database
     * 
     * @param string $category  The category of the news
     * 
     * @return App\Models\Category
     */
    public function findByCategory( string $category ) : Category 
    {
        return Category::where( 'category', $category )->first();
    }
}