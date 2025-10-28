<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use jcobhams\NewsApi\NewsApi;
use App\Repositories\CategoryRepository;
use App\Repositories\SourceRepository;

class SourceSeeder extends Seeder
{
    private CategoryRepository  $category_repo;
    private SourceRepository    $source_repo;
    private NewsApi             $news_api;
    private string              $news_api_key;
    /**
     * Run the database seeds.
     */
    public function run(
        CategoryRepository  $category_repo,
        SourceRepository    $source_repo
    ): void
    {
        $this->category_repo    = $category_repo;
        $this->source_repo      = $source_repo;
        $this->news_api_key     = env( 'NEWS_API' );
        $this->news_api         = new NewsApi( $this->news_api_key );

        $categories             = $this->category_repo->all();

        foreach ( $categories as $category ) {

            $sources            = $this->news_api->getSources( $category->category, 'en', 'us' );

            foreach ( $sources->sources as $source ) {
                $this->source_repo->store(
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
