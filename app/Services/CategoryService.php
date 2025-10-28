<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    private CategoryRepository $category_repo;

    public function __construct( CategoryRepository $category_repo )
    {
        $this->category_repo = $category_repo;
    }

    public function storeCategory( string $category ) : void 
    {
        $this->category_repo->store( $category );
    }
}