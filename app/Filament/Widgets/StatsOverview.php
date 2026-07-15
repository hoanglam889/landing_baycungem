<?php

namespace App\Filament\Widgets;

use App\Models\News;
use App\Models\Service;
use App\Models\PageVisit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalVisits = PageVisit::sum('views_count');
        $totalNewsViews = News::sum('views_count');
        $totalServiceViews = Service::sum('views_count');

        // Lấy visits của hôm nay và hôm qua để tính trend
        $todayVisits = PageVisit::where('date', now()->toDateString())->value('views_count') ?? 0;
        $yesterdayVisits = PageVisit::where('date', now()->subDay()->toDateString())->value('views_count') ?? 0;
        
        $visitDiff = $todayVisits - $yesterdayVisits;
        $visitIcon = $visitDiff >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $visitColor = $visitDiff >= 0 ? 'success' : 'danger';
        $visitDesc = $visitDiff >= 0 ? ($visitDiff > 0 ? "Tăng $visitDiff so với hôm qua" : 'Bằng hôm qua') : "Giảm " . abs($visitDiff) . " so với hôm qua";

        return [
            Stat::make('Tổng lượt truy cập', number_format($totalVisits))
                ->description($visitDesc)
                ->descriptionIcon($visitIcon)
                ->color($visitColor),
                
            Stat::make('Lượt xem Tin tức', number_format($totalNewsViews))
                ->description('Tổng số lượt đọc bài viết')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),
                
            Stat::make('Lượt xem Dịch vụ', number_format($totalServiceViews))
                ->description('Tổng số lượt xem dịch vụ')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('info'),
        ];
    }
}
