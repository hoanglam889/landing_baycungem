<?php

namespace App\Filament\Resources\TikTokVideos;

use App\Filament\Resources\TikTokVideos\Pages\CreateTikTokVideo;
use App\Filament\Resources\TikTokVideos\Pages\EditTikTokVideo;
use App\Filament\Resources\TikTokVideos\Pages\ListTikTokVideos;
use App\Filament\Resources\TikTokVideos\Schemas\TikTokVideoForm;
use App\Filament\Resources\TikTokVideos\Tables\TikTokVideosTable;
use App\Models\TikTokVideo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TikTokVideoResource extends Resource
{
    protected static ?string $model = TikTokVideo::class;

    protected static ?string $navigationLabel = 'TikTok Videos';

    protected static ?string $modelLabel = 'Video TikTok';

    protected static ?string $pluralModelLabel = 'Video TikTok';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play-circle';

    protected static ?string $recordTitleAttribute = 'tiktok_url';

    public static function form(Schema $schema): Schema
    {
        return TikTokVideoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TikTokVideosTable::configure($table);
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
            'index' => ListTikTokVideos::route('/'),
            'create' => CreateTikTokVideo::route('/create'),
            'edit' => EditTikTokVideo::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
