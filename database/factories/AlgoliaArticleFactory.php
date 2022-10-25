<?php

namespace Database\Factories;

use App\Models\AlgoliaArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlgoliaArticleFactory extends Factory
{
    protected $model = AlgoliaArticle::class;

    public function definition()
    {

        return [
            'title' => $this->faker->realText(40),
            'body' => $this->faker->realText(800),
            'tags' => collect(['php', 'ruby', 'java', 'javascript', 'bash'])
                ->random(2)
                ->values()
                ->all(),
        ];
    }
}
