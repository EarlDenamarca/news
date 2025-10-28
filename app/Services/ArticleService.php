<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Article;
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

    /**
     * This method retrieves paginated articles
     * and formats the published_data
     * 
     * @param string    $query  Query string for searcing articles
     * @param int       $limit  Number of records to be retreived
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateArticles( ?string $query, int $limit ) : LengthAwarePaginator 
    {
        $articles = $this->article_repo->paginate( $query, $limit );

        foreach ( $articles as $article ) {
            $article->published_date = Carbon::parse( $article->published_date )->format('F j, Y H:i:s');
        }

        return $articles;
    }

    /**
     * This method finds specific article based on ID
     * 
     * @param int $id   Uniqueu identifier of the article
     * 
     * @return App\Models\Article
     */
    public function findById( int $id ) : Article 
    {
        $article = $this->article_repo->find( $id );
        $article->published_date = Carbon::parse( $article->published_date )->format('F j, Y H:i:s');
        
        return $article;
    }
}