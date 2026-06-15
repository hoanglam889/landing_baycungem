<?php

namespace App\Filament\Resources\VideoShowcases;

use App\Filament\Resources\VideoShowcases\Pages\CreateVideoShowcase;
use App\Filament\Resources\VideoShowcases\Pages\EditVideoShowcase;
use App\Filament\Resources\VideoShowcases\Pages\ListVideoShowcases;
use App\Filament\Resources\VideoShowcases\Schemas\VideoShowcaseForm;
use App\Filament\Resources\VideoShowcases\Tables\VideoShowcasesTable;
use App\Models\VideoShowcase;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VideoShowcaseResource extends Resource
{
    protected static ?string $model = VideoShowcase::class;

    protected static ?string $navigationLabel = 'Video nổi bật';

    protected static ?string $modelLabel = 'Video nổi bật';

    protected static ?string $pluralModelLabel = 'Video nổi bật';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return VideoShowcaseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VideoShowcasesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVideoShowcases::route('/'),
            'create' => CreateVideoShowcase::route('/create'),
            'edit' => EditVideoShowcase::route('/{record}/edit'),
        ];
    }
}
