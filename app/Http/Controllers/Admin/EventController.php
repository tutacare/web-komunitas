<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'description' => 'required',
            'event_date'  => 'required|date',
            'thumbnail'   => 'nullable|image|max:2048'
        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('events', 'public');
        }

        Event::create([
            'title'       => $request->title,
            'location'    => $request->location,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'event_date'  => $request->event_date,
            'thumbnail'   => $thumbnail,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'description' => 'required',
            'event_date'  => 'required|date',
            'thumbnail'   => 'nullable|image|max:2048'
        ]);

        $thumbnail = $event->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($event->thumbnail) {
                Storage::disk('public')->delete($event->thumbnail);
            }
            $thumbnail = $request->file('thumbnail')->store('events', 'public');
        }

        $event->update([
            'title'       => $request->title,
            'location'    => $request->location,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'event_date'  => $request->event_date,
            'thumbnail'   => $thumbnail,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        if ($event->thumbnail) {
            Storage::disk('public')->delete($event->thumbnail);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
