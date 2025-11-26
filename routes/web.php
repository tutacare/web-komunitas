<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutFrontendController;
use App\Http\Controllers\Frontend\ArticleFrontendController;
use App\Http\Controllers\Frontend\EventFrontendController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/articles', [ArticleFrontendController::class, 'index'])->name('article.index');
Route::get('/articles/{slug}', [ArticleFrontendController::class, 'show'])->name('article.show');

// halaman detail event
Route::get('/event/{slug}', [EventFrontendController::class, 'show'])->name('event.show');


Route::get('/about', [AboutFrontendController::class, 'index'])->name('about.show');

Route::get('/events', [EventFrontendController::class, 'index'])->name('events.index');
Route::get('/event/{slug}', [EventFrontendController::class, 'show'])->name('event.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
