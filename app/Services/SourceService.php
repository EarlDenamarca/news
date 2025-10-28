<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Source;
use App\Repositories\SourceRepository;

class SourceService
{
    private SourceRepository $source_repo;

    public function __construct( SourceRepository $source_repo )
    {
        $this->source_repo = $source_repo;
    }

    /**
     * This method stores a news source in the database
     * 
     * @param string    $source_id      The id of the news source (from api response).
     * @param string    $name           The name of the source
     * @param string    $description    The description of the source.
     * @param string    $url            The url of the news source
     * @param int       $category_id    The category of the news source(foreign key)
     * @param string    $language       The langauge of the news source
     * @param string    $country        The country of the news source
     * 
     * @return void
     */
    public function storeSource(
        string  $source_id,
        string  $name,
        string  $description,
        string  $url,
        int     $category_id,
        string  $language,
        string  $country
    ) : void
    {
        $this->source_repo->store(
            $source_id,
            $name,
            $description,
            $url,
            $category_id,
            $language,
            $country
        );
    }

    /**
     * This method retreives all the news source data
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAllSources() : Collection 
    {
        return $this->source_repo->all();
    }

    public function findSource( string $source_id ) : Source 
    {
        return $this->source_repo->findBySourceId( $source_id );
    }
}