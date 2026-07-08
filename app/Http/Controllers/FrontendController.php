<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function showService($id)
    {
        $setting = Setting::first();
        $service = Service::findOrFail($id);
        
        // Lấy danh sách dịch vụ khác để gợi ý
        $otherServices = Service::where('id', '!=', $id)->orderBy('order')->get();
        
        return view('services.show', compact('setting', 'service', 'otherServices'));
    }

    public function showNews($slug)
    {
        $setting = Setting::first();
        $news = News::where('slug', $slug)->firstOrFail();
        
        // Lấy danh sách bài viết khác để gợi ý
        $otherNews = News::where('id', '!=', $news->id)->orderBy('published_date', 'desc')->take(3)->get();
        
        return view('news.show', compact('setting', 'news', 'otherNews'));
    }
}
