<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Source;

class SourceRepository
{
    /**
     * Store a new news source in the database
     * 
     * @param string    $source_id      The id of the news source (from api response).
     * @param string    $name           The name of the source
     * @param string    $description    The description of the source.
     * @param string    $url            The url of the news source
     * @param int       $category_id    The category of the news source(foreign key)
     * @param string    $language       The langauge of the news source
     * @param string    $country        The country of the news source
     * 
     * @return App\Models\Source
     */
    public function store(
        string  $source_id,
        string  $name,
        string  $description,
        string  $url,
        int     $category_id,
        string  $language,
        string  $country
    ) : Source 
    {
        return Source::create([
            'source_id'     => $source_id,
            'name'          => $name,
            'description'   => $description,
            'url'           => $url,
            'category_id'   => $category_id,
            'language'      => $language,
            'country'       => $country
        ]);
    }

    /**
     * retrieve all the news source data from the database
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all() : Collection 
    {
        return Source::all();
    }

    public function findBySourceId( string $source_id ) : Source 
    {
        return Source::where( 'source_id', $source_id )->first();
    }
}