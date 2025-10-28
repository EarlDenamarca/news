<?php

namespace App\Services;

use App\Repositories\SourceRepository;

class SourceService
{
    private SourceRepository $source_repo;

    public function __construct( SourceRepository $source_repo )
    {
        $this->source_repo = $source_repo;
    }

    public function storeSource(
        string  $id,
        string  $name,
        string  $description,
        string  $url,
        int     $category_id,
        string  $language,
        string  $country
    ) : void
    {
        $this->source_repo->store(
            $id,
            $name,
            $description,
            $url,
            $category_id,
            $language,
            $country
        );
    }
}