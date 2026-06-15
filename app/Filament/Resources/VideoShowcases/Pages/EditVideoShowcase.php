<?php

namespace App\Filament\Resources\VideoShowcases\Pages;

use App\Filament\Resources\VideoShowcases\VideoShowcaseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVideoShowcase extends EditRecord
{
    protected static string $resource = VideoShowcaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
