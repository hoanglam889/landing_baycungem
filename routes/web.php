<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $setting = \App\Models\Setting::first();
    $hero = \App\Models\HeroSection::first();
    $services = \App\Models\Service::orderBy('order')->get();
    $about = \App\Models\AboutUs::first();
    $videoShowcase = \App\Models\VideoShowcase::first();
    $tiktokVideos = \App\Models\TikTokVideo::orderBy('order')->get();
    $newsList = \App\Models\News::orderBy('published_date', 'desc')->get();

    return view('welcome', compact('setting', 'hero', 'services', 'about', 'videoShowcase', 'tiktokVideos', 'newsList'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
