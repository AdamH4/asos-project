<?php

namespace App\Models;

use Laravel\Scout\EngineManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class MeiliArticle extends Model
{
    use Searchable;
    use HasFactory;
    protected $table = 'articles';

    protected $casts = [
        'tags' => 'json',
    ];

    /* ************************ Laravel Scout ************************* */

    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'articles';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }

    /**
     * Get the engine used to index the model.
     *
     * @return \Laravel\Scout\Engines\Engine
     */
    public function searchableUsing()
    {
        return app(EngineManager::class)->engine('meilisearch');
    }
}
