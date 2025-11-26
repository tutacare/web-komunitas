<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleFrontendController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(12);
        return view('frontend.articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('frontend.articles.show', compact('article'));
    }
}
