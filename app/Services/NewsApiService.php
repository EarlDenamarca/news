<?php

namespace App\Services;

use jcobhams\NewsApi\NewsApi;

class NewsApiService
{
    private string  $news_api_key;
    private NewsApi $news_api;

    public function __construct()
    {
        $this->news_api_key = env('NEWS_API');
        $this->news_api     = new NewsApi($this->news_api_key);
    }

    public function fetchCategories() : array 
    {
        $categories = $this->news_api->getCategories();
        
        return $categories;
    }

    public function fetchArticles( string $category, string $from, string $to, $page_limit )
    {

    }
}