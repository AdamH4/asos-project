<?php

namespace App\Http\Controllers;

use App\Models\AlgoliaArticle;
use App\Models\Article;
use App\Models\MeiliArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function search(Request $request)
    {
        // dd(Article::all()->count());
        $search = $request->search;
        $performances = [];

        $start = microtime(true);
        // Elasticsearch
        $elasticArticles = Article::search("$request->search", function ($client, $body) {
            return $client->search(['index' => 'articles', 'body' => $body->toArray()]);
        })->get();
        $performances['elastic'] = round((microtime(true) - $start) * 1000, 2);

        $start = microtime(true);
        $meilisearchArticles = MeiliArticle::search($search)->get();
        $performances['meili'] = round((microtime(true) - $start) * 1000, 2);

        $start = microtime(true);
        $algoliaArticles = AlgoliaArticle::search($search)->get();
        $performances['algolia'] = round((microtime(true) - $start) * 1000, 2);

        return view('welcome', compact('elasticArticles', 'meilisearchArticles', 'algoliaArticles', 'search', 'performances'));
    }
}
