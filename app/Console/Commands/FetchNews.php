<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use jcobhams\NewsApi\NewsApi;

class FetchNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:fetch ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $news_api_key   = env('NEWS_API');
        $newsapi        = new NewsApi($news_api_key);
        
        // $sorts          = $newsapi->getSortBy();
        $news = $newsapi->getEverything('', 'nhl-news', '', '', '2025-10-01', '2025-10-28', 'en', 'publishedAt',  3, 1);
        dd( $news );
    }
}
