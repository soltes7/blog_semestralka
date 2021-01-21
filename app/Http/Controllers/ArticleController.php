<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Stat;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::all();
        return view('article.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return view('article.create', [
            'action' => route('article.store'),
            'method' => 'post'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'url' => 'required
        ']);

        $article = Article::create($request->all());
        $article->setChangedate();
        $article->setAuthor();
        $article->save();
        return redirect()->route('article.index');
    }

    public function edit(Article $article)
    {
        return view('article.edit', [
            'action' => route('article.update', $article->id),
            'method' => 'put',
            'model' => $article
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'url' => 'required'
        ]);
        $article->setChangedate();
        $article->update($request->all());
        return redirect()->route('article.index');
    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }

    public function expand(Article $article)
    {
        $article->incrementTimes();
        return view('article.expand', [
            'article' => $article,
        ]);
    }
}
