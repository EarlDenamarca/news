<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use Carbon\Carbon;

class ArticleService
{
    private ArticleRepository $article_repo;

    public function __construct( ArticleRepository $article_repo )
    {
        $this->article_repo = $article_repo;
    }

    /**
     * This method checks for an existing article in the database
     * And stores the article in the database if it does not exist
     * 
     * @param string $title           The title of the article.
     * @param string $description     A short description or summary of the article.
     * @param string $content         The content of the article.
     * @param string $author          The author of the article.
     * @param int    $source_id       The ID of the article's source (foreign key).
     * @param string $published_date  The publication date in string format.
     * @param string $url             The url of the article.
     * @param string $image_url       The URL image or thumbnail of the article.
     * 
     * @return void
     */
    public function storeArticle(
        string  $title,
        string  $description,
        string  $content,
        string  $author,
        int     $source_id,
        string  $published_date,
        string  $url,
        string  $image_url
    ) : void 
    {
        $article = $this->article_repo->findByTitle( $title );
        
        // if article title did not exist then store
        if ( !$article ) {
            $published_date = Carbon::parse( $published_date )->format( 'Y-m-d H:i:s' );

            $this->article_repo->store(
                $title,
                $description,
                $content,
                $author,
                $source_id,
                $published_date,
                $url,
                $image_url
            );
        }

    }
}