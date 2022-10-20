<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;

class ArticleController extends Controller
{
    public function search(Request $request)
    {

        //Elasticsearch
        $articles = Article::search("$request->search", function ($client, $body) {
            //$body->setSize(10);
            return $client->search(['index' => 'articles', 'body' => $body->toArray()]);
        })->get();


        return view('welcome', [
            'articles' => $articles,
            'search' => $request->search
        ]);
    }
}
