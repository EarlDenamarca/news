<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\CategoryRepository;

class CategoryService
{
    private CategoryRepository $category_repo;

    public function __construct( CategoryRepository $category_repo )
    {
        $this->category_repo = $category_repo;
    }

    /**
     * This method stores category data
     * 
     * @param string $company   The news category to be stored
     * @return void
     */
    public function storeCategory( string $category ) : void 
    {
        $this->category_repo->store( $category );
    }

    /**
     * This method retreives all the news categories
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategories() : Collection 
    {
        return $this->category_repo->all();
    }
}