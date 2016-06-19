<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    public function index() {
        return view('articles.index', ['articles' => Article::all()]);
    }

    public function create() {
        return view('articles.create');
    }

    public function store(ArticleRequest $request) {
        $article = Article::create($request->all());

        return redirect('articles/'.$article->id);
    }

    public function show(Article $article) {
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article) {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article, ArticleRequest $request) {
        $article->update($request->all());

        return redirect('articles/'.$article->id);
    }

    public function destroy(Article $article) {
        $article->delete();

        return redirect('articles');
    }

    public function spa()
    {
        return view('articles.spa.index', ['articles' => Article::all()->toJson()]);
    }
}
