<?php

namespace App\Filament\Resources\TikTokVideos\Pages;

use App\Filament\Resources\TikTokVideos\TikTokVideoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTikTokVideos extends ListRecords
{
    protected static string $resource = TikTokVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
