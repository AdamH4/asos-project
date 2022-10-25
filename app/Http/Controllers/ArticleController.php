<?php

namespace App\Http\Controllers;

use App\Models\AlgoliaArticle;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function search(Request $request)
    {

        // Elasticsearch
        $elasticArticles = Article::search("$request->search", function ($client, $body) {
            return $client->search(['index' => 'articles', 'body' => $body->toArray()]);
        })->get();

        $meiliSearchArticles = Article::search("$request->search", function ($client, $body) {
            return $client->search(['index' => 'articles', 'body' => $body->toArray()]);
        })->get();

        $algoliaArticles = AlgoliaArticle::search("$request->search")->get();

        return view('welcome', [
            'elasticArticles' => $elasticArticles,
            'meiliSearchArticles' => $meiliSearchArticles,
            'algoliaArticles' => $algoliaArticles,
            'search' => $request->search
        ]);
    }
}
