<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\CategoryService;
use App\Services\NewsApiService;

class CategorySeeder extends Seeder
{
    private CategoryService $category_service;
    private NewsApiService  $news_api_service;

    /**
     * Run the database seeds.
     */
    public function run( CategoryService $category_service, NewsApiService  $news_api_service ): void
    {
        $this->category_service = $category_service;
        $this->news_api_service = $news_api_service;

        $categories = $this->news_api_service->fetchCategories();

        foreach ( $categories as $key => $category ) {
            $this->category_service->storeCategory( $category );
        }
    }
}
