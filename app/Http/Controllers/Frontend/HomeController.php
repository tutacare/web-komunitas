<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Event;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Setting;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'setting'   => Setting::first(),
            'events'    => Event::latest()->take(3)->get(),
            'articles'  => Article::latest()->take(3)->get(),
            'galleries' => Gallery::latest()->take(6)->get(),
        ]);
    }
}
