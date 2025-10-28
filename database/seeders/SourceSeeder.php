<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\NewsApiService;
use App\Services\CategoryService;
use App\Services\SourceService;

class SourceSeeder extends Seeder
{
    private NewsApiService  $news_api_service;
    private CategoryService $category_service;
    private SourceService   $source_service;

    /**
     * Run the database seeds.
     */
    public function run(
        NewsApiService  $news_api_service,
        CategoryService $category_service,
        SourceService   $source_service
    ): void
    {
        $this->news_api_service = $news_api_service;
        $this->category_service = $category_service;
        $this->source_service   = $source_service;

        $categories             = $this->category_service->getAllCategories();

        foreach ( $categories as $category ) {
            $sources = $this->news_api_service->fetchSources( 'sports', 'en', 'us' );

            foreach ( $sources->sources as $source ) {
                $this->source_service->storeSource(
                    $source->id,
                    $source->name,
                    $source->description,
                    $source->url,
                    $category->id,
                    $source->language,
                    $source->country
                );
            }
        }
    }
}
