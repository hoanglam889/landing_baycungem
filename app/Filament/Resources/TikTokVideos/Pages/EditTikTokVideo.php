<?php

namespace App\Filament\Resources\TikTokVideos\Pages;

use App\Filament\Resources\TikTokVideos\TikTokVideoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTikTokVideo extends EditRecord
{
    protected static string $resource = TikTokVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
