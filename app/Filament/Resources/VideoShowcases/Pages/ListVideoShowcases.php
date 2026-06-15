<?php

namespace App\Filament\Resources\VideoShowcases\Pages;

use App\Filament\Resources\VideoShowcases\VideoShowcaseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVideoShowcases extends ListRecords
{
    protected static string $resource = VideoShowcaseResource::class;

    public function mount(): void
    {
        $this->redirect(static::$resource::getUrl('edit', ['record' => 1]));
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
