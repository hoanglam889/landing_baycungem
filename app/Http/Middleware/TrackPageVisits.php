<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Chỉ đếm các request GET hợp lệ ở Frontend (không đếm trang admin, api, livewire)
        if ($request->isMethod('GET') && !$request->is('admin*') && !$request->is('livewire*') && !$request->is('api*')) {
            $date = now()->toDateString();
            $sessionKey = 'visited_today_' . $date;

            if (!$request->session()->has($sessionKey)) {
                \App\Models\PageVisit::firstOrCreate(['date' => $date])->increment('views_count');
                $request->session()->put($sessionKey, true);
            }
        }

        return $next($request);
    }
}
