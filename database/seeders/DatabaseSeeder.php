<?php

namespace Database\Seeders;

use App\Models\AlgoliaArticle;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();
        Article::factory()->times(1000)->create();
    }
}
