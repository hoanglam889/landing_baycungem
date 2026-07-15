<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

Route::get('/', function () {
    $setting = \App\Models\Setting::first();
    $hero = \App\Models\HeroSection::first();
    $services = \App\Models\Service::orderBy('order')->take(3)->get();
    $about = \App\Models\AboutUs::first();
    $videoShowcase = \App\Models\VideoShowcase::first();
    $tiktokVideos = \App\Models\TikTokVideo::orderBy('order')->get();
    $newsList = \App\Models\News::orderBy('published_date', 'desc')->take(3)->get();

    return view('welcome', compact('setting', 'hero', 'services', 'about', 'videoShowcase', 'tiktokVideos', 'newsList'));
});

Route::get('/dich-vu', [FrontendController::class, 'indexService'])->name('services.index');
Route::get('/dich-vu/{id}', [FrontendController::class, 'showService'])->name('services.show');
Route::get('/tin-tuc', [FrontendController::class, 'indexNews'])->name('news.index');
Route::get('/tin-tuc/{slug}', [FrontendController::class, 'showNews'])->name('news.show');

Route::redirect('/dashboard', '/admin')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
