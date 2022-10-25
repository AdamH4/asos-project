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
        $articles = Article::search("$request->search", function ($client, $body) {
            return $client->search(['index' => 'articles', 'body' => $body->toArray()]);
        })->get();

        $articles = Article::search("$request->search", function ($client, $body) {
            return $client->search(['index' => 'articles', 'body' => $body->toArray()]);
        })->get();

        $articles = AlgoliaArticle::search("$request->search")->get();

        return view('welcome', [
            'articles' => $articles,
            'search' => $request->search
        ]);
    }
}
