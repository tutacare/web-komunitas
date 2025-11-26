<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;

Route::middleware(['auth', 'role:admin|editor|pengurus'])->prefix('admin')->name('admin.')->group(function () {
    // Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('articles', ArticleController::class)
        ->names('articles');
    Route::resource('events', EventController::class)
        ->names('events');
    Route::resource('galleries', GalleryController::class)->names('galleries');

    // Route::resource('members', Admin\MemberController::class);

    Route::get('settings', [SettingController::class, 'index'])->name('settings');
    // Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    // Hero
    Route::post('/settings/hero/update', [SettingController::class, 'updateHero'])->name('settings.update.hero');

    // About
    Route::post('/settings/about/update', [SettingController::class, 'updateAbout'])->name('settings.update.about');
});
