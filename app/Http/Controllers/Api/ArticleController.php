<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticlesResource;
use App\Http\Resources\ArticleColection;

class ArticleController extends Controller
{
    
    public function show(Article $article) :ArticlesResource
    {
        return ArticlesResource::make($article);
    }

    public function index(): ArticleColection
    {
        $articles = Article::all();
        return ArticleColection::make($articles);
    }



}
