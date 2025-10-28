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
    
    /**
     * fetch all the categories from external new api
     * 
     * @return array
     */
    public function fetchCategories() : array 
    {
        $categories = $this->news_api->getCategories();
        
        return $categories;
    }

    /**
     * fetch all news sources based on the category, language and country
     * 
     * @param string category   The category of the news source
     * @param string language   The language of the news source
     * @param string country    The origin country of the news source
     * 
     * @return object
     */
    public function fetchSources( string $category, string $language, string $country ) : object 
    {
        $sources = $this->news_api->getSources( $category, $language, $country );

        return $sources;
    }

    /**
     * fetch news articles from an external api
     * 
     * @param string    $source     The source of the news
     * @param string    $from       Date in string format(Y-m-d)
     * @param string    $to         Date in string format(Y-m-d)
     * @param int       $page_limit The number of records for each page
     * @param int       $page       The page number to retreive (eg. 1, 2, 3)
     */
    public function fetchArticles( 
        string  $source, 
        string  $from, 
        string  $to, 
        int     $page_limit, 
        int     $page 
    ) : array 
    {
        $articles = $this->news_api->getEverything('', $source, '', '', $from, $to, 'en', 'publishedAt',  $page_limit, $page);
        
        return $articles->articles;
    }
}