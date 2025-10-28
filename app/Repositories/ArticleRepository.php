<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Article;

class ArticleRepository
{
    /**
     * Store a new article in the database
     * 
     * @param string $title           The title of the article.
     * @param string $description     The description of the article.
     * @param string $content         The content of the article.
     * @param string $author          The author of the article.
     * @param int    $source_id       The ID of the article's source (foreign key).
     * @param string $published_date  The publication date in string format.
     * @param string $url             The url of the article.
     * @param string $image_url       The URL image or thumbnail of the article.
     * 
     * @return App\Models\Article
     */
    public function store(
        string  $title,
        string  $description,
        string  $content,
        string  $author,
        int     $source_id,
        string  $published_date,
        string  $url,
        string  $image_url
    ) : Article 
    {
        return Article::create([
            'title'             => $title,
            'description'       => $description,
            'content'           => $content,
            'author'            => $author,
            'source'            => $source,
            'published_date'    => $published_date,
            'url'               => $url,
            'image_url'         => $image_url
        ]);
    }

    /**
     * This method finds an article in the database
     * 
     * @param string $title     The title of the article
     * 
     * @return null or App\Models\Article
     */
    public function findByTitle( string $title ) : ?Article 
    {
        return Article::where( 'title', $title )->first();
    }

    /**
     * retrieves paginated data from the database
     * 
     * @param string    $query  Query string for searcing articles
     * @param int       $limit  Number of records to retrieve
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate( ?string $query, int $limit ) : LengthAwarePaginator 
    {
        return Article::where( 'title', 'like', '%' . $query . '%' )
                    ->orWhere( 'description', 'like', '%' . $query . '%' )
                    ->orWhere( 'content', 'like', '%' . $query . '%' )
                    ->paginate( $limit );
    }

    /**
     * finds a specific article from the database
     * 
     * @param int $limit    Number of records to retrieve
     * 
     * @return App\Models\Article 
     */
    public function find( int $id ) : Article
    {
        return Article::find( $id );
    }
}