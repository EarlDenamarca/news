<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SourceService;
use App\Services\NewsApiService;
use App\Services\ArticleService;
use Carbon\Carbon;

class FetchNews extends Command
{
    private SourceService   $source_service;
    private NewsApiService  $news_api_service;
    private ArticleService  $article_service;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:fetch
        {--category= : category of the news}
        {--from= : format(YYYY-MM-DD)}
        {--to= : format(YYYY-MM-DD)}
        {--limit= : number of articles to be retreived}
        {--page= : page number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch news articles from external sources';

    /**
     * Execute the console command.
     */
    public function handle( 
        SourceService   $source_service,
        NewsApiService  $news_api_service,
        ArticleService  $article_service
    )
    {
        $category   = $this->option( 'category' );
        $from       = $this->option( 'from' );
        $to         = $this->option( 'to' );
        $limit      = $this->option( 'limit' );
        $page       = $this->option( 'page' );
        
        if ( !$category ) {
            return $this->error( '--category parameter is required (eg. business, entertainment, general, health, science, sports, technology)' );
        }

        if ( !$from ) {
            return $this->error( '--from parameter is required. Sample format (YYYY-MM-DD)' );
        }

        if ( !$to ) {
            return $this->error( '--to parameter is required. Sample format (YYYY-MM-DD)' );
        }

        if ( !$limit ) {
            return $this->error( '--limit parameter is required' );
        }

        if ( !$page ) {
            return $this->error( '--page parameter is required' );
        }

        $this->source_service   = $source_service;
        $this->news_api_service = $news_api_service;
        $this->article_service  = $article_service;

        $from       = Carbon::createFromFormat( 'Y-m-d', $from )->format( 'Y-m-d' );
        $to         = Carbon::createFromFormat( 'Y-m-d', $to )->format( 'Y-m-d' );
        $sources    = $this->source_service->getAllSources();
        $sources    = $sources->pluck( 'source_id' )->join( ',' );

        $news       = $this->news_api_service->fetchArticles( $sources, $from, $to, $limit, $page );

        foreach ( $news as $article ) {
            $source = $this->source_service->findSource( $article->source->id );
            
            $this->article_service->storeArticle(
                $title,
                $description,
                $content,
                $author,
                $source->id,
                $published_date,
                $url,
                $image_url
            );
        }
    }
}
