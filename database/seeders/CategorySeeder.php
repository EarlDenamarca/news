<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Repositories\CategoryRepository;
use jcobhams\NewsApi\NewsApi;

class CategorySeeder extends Seeder
{
    private CategoryRepository $category_repo;

    /**
     * Run the database seeds.
     */
    public function run( CategoryRepository $category_repo ): void
    {
        $this->category_repo    = $category_repo;
        $news_api_key           = env('NEWS_API');
        $newsapi                = new NewsApi($news_api_key);
        $categories             = $newsapi->getCategories();

        foreach ($categories as $key => $category) {
            $this->category_repo->store( $category );
        }
    }
}
