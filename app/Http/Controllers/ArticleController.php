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

    public function index() : View 
    {
        $articles = $this->article_service->paginateArticles( 10 );
        
        return view(
            'article.index', 
            [
                'articles'  => $articles
            ]
        );
    }

    public function show( int $id )
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
