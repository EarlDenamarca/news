<?php

namespace App\Repositories;

use App\Models\Source;

class SourceRepository
{
    public function store(
        string  $id,
        string  $name,
        string  $description,
        string  $url,
        int     $category_id,
        string  $language,
        string  $country
    ) : Source 
    {
        return Source::create([
            'id'            => $id,
            'name'          => $name,
            'description'   => $description,
            'url'           => $url,
            'category_id'   => $category_id,
            'language'      => $language,
            'country'       => $country
        ]);
    }
}