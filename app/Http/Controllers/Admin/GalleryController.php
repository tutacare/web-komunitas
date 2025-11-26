<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,pdf,video',

            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:5000',
            'youtube_url' => 'nullable|url'
        ]);

        $data = [
            'title' => $request->title,
            'type' => $request->type,
        ];

        if ($request->type === 'video') {
            $data['youtube_url'] = $request->youtube_url;
        } else {
            if ($request->hasFile('file_path')) {
                $data['file_path'] = $request->file('file_path')->store('gallery', 'public');
            }
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery item created.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,pdf,video',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:5000',
            'youtube_url' => 'nullable|url'
        ]);

        $data = [
            'title' => $request->title,
            'type' => $request->type,
        ];

        // Handle video
        if ($request->type === 'video') {
            $data['youtube_url'] = $request->youtube_url;
            if ($gallery->file_path) {
                Storage::disk('public')->delete($gallery->file_path);
            }
            $data['file_path'] = null;
        }

        // Handle file upload (image/pdf)
        if (($request->type === 'image' || $request->type === 'pdf') && $request->hasFile('file_path')) {

            if ($gallery->file_path) {
                Storage::disk('public')->delete($gallery->file_path);
            }

            $data['file_path'] = $request->file('file_path')->store('gallery', 'public');
            $data['youtube_url'] = null;
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery updated.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->file_path) {
            Storage::disk('public')->delete($gallery->file_path);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery deleted.');
    }
}
