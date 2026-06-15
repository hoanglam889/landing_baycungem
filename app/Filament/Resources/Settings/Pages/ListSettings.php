<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    public function mount(): void
    {
        $this->redirect(static::$resource::getUrl('edit', ['record' => 1]));
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
