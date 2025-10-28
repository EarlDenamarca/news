<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    private ArticleService $article_service;

    public function __construct( ArticleService $article_service )
    {
        $this->article_service = $article_service;
    }

    /**
     * display list of articles
     * 
     * @return Illuminate\View\View
     */
    public function index( Request $request ) : View 
    {
        $articles = $this->article_service->paginateArticles( $request->q, 12 );
        
        return view(
            'article.index', 
            [
                'articles'  => $articles
            ]
        );
    }

    /**
     * display article details based on its ID
     * 
     * @param int $id   Unique identifier of the article(primary key)
     * 
     * @return Illuminate\View\View
     */
    public function show( int $id ) : View 
    {
        $news_article = $this->article_service->findById( $id );

        return view(
            'article.show',
            [
                'article'   => $news_article
            ]
        );
    }
}
