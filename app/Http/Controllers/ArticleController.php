<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', ['articles' => Article::all()]);
    }

    public function create()
    {
        return view('articles.create', ['article' => new Article()]);
    }

    public function store(Request $request)
    {
        $data = $request->only(['subject', 'body', 'summary']);
        $article = new Article();
        $article->fill($data)->save();
        return to_route('articles.index');
    }

    public function show(Article $article)
    {
        // return "記事id：{$article->id}";
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->only(['subject', 'body', 'summary']);
        $article->fill($data)->save();
        return to_route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return to_route('articles.index');
    }
}
