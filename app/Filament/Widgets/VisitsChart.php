<?php

namespace App\Filament\Widgets;

use App\Models\PageVisit;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class VisitsChart extends ChartWidget
{
    protected ?string $heading = 'Lưu lượng truy cập (30 ngày qua)';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        // Lấy 30 ngày gần nhất
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $label = Carbon::now()->subDays($i)->format('d/m');
            
            $visits = PageVisit::where('date', $date)->value('views_count') ?? 0;
            
            $data[] = $visits;
            $labels[] = $label;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Lượt truy cập',
                    'data' => $data,
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.2)', // Amber-500 with opacity
                    'borderColor' => '#f59e0b', // Amber-500
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
