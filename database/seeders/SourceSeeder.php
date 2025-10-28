<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\NewsApiServices;
use App\Services\CategoryService;
use App\Services\SourceService;

class SourceSeeder extends Seeder
{
    private NewsApiServices $news_api_service;
    private CategoryService $category_service;
    private SourceService   $source_service;

    /**
     * Run the database seeds.
     */
    public function run(
        NewsApiServices $news_api_service,
        CategoryService $category_service,
        SourceService   $source_service
    ): void
    {
        $this->news_api_service = $news_api_service;
        $this->category_service = $category_service;
        $this->source_service   = $source_service;

        $categories             = $this->category_service->all();

        foreach ( $categories as $category ) {

            $sources = $this->news_api_service->fetchSources();

            foreach ( $sources->sources as $source ) {
                $this->source_service->store(
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
