<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Article;

class ArticlesController extends Controller
{
    public function index() {
        return Article::all();
    }

    public function store(ArticleRequest $request) {
        return Article::create($request->all());
    }

    public function show(Article $article) {
        return $article;
    }

    public function update(Article $article, ArticleRequest $request) {
        $article->update($request->all());

        return $article;
    }

    public function destroy(Article $article) {
        $article->delete();

        return $article;
    }
}
