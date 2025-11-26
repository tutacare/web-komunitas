<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.index', compact('setting'));
    }

    public function updateHero(Request $request)
    {
        $request->validate([
            'hero_title' => 'required',
            'hero_description' => 'required',
            'hero_image' => 'nullable|image|max:2048',
        ]);

        $setting = Setting::firstOrCreate([]);

        // Upload Hero Image
        if ($request->hasFile('hero_image')) {
            if ($setting->hero_image) {
                Storage::delete('public/' . $setting->hero_image);
            }
            $setting->hero_image = $request->file('hero_image')->store('hero', 'public');
        }

        $setting->hero_title = $request->hero_title;
        $setting->hero_description = $request->hero_description;
        $setting->save();

        return back()->with('success', 'Hero section updated successfully!');
    }

    public function updateAbout(Request $request)
    {
        $request->validate([
            'about_title' => 'required',
            'about_description' => 'required',
            'about_image' => 'nullable|image|max:2048',
        ]);

        $setting = Setting::firstOrCreate([]);

        // Upload About Image
        if ($request->hasFile('about_image')) {
            if ($setting->about_image) {
                Storage::delete('public/' . $setting->about_image);
            }
            $setting->about_image = $request->file('about_image')->store('about', 'public');
        }

        $setting->about_title = $request->about_title;
        $setting->about_description = $request->about_description;
        $setting->save();

        return back()->with('success', 'About section updated successfully!');
    }
}
