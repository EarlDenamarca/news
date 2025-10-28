<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title'             => 'Sample News Article',
            'description'       => 'Lorem Ipsum Dolor',
            'content'           => 'Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor',
            'author'            => 'Earl Denamarca',
            'source_id'         => 1,
            'published_date'    => '2025-10-28',
            'url'               => 'google.com',
            'image_url'         => 'https://picsum.photos/400/200?random=2'
        ]);
    }
}
