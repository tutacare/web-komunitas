<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventFrontendController extends Controller
{
    // Menampilkan semua event
    public function index()
    {
        $events = Event::latest()->paginate(12); // pagination 12 per halaman
        return view('frontend.events.index', compact('events'));
    }

    // Menampilkan detail event
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('frontend.events.show', compact('event'));
    }
}
