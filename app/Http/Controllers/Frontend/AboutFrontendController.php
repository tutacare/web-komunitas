<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting; // kita anggap about disimpan di table settings
use Illuminate\Http\Request;

class AboutFrontendController extends Controller
{
    public function index()
    {
        // Ambil data about dari table settings
        $about = Setting::select('about_title', 'about_description', 'about_image')->first();

        return view('frontend.about', compact('about'));
    }
}
