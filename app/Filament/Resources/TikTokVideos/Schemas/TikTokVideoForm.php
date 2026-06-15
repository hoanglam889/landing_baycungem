<?php

namespace App\Filament\Resources\TikTokVideos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TikTokVideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tiktok_url')
                    ->label('Liên kết TikTok gốc')
                    ->url()
                    ->required(),
                TextInput::make('local_video_path')
                    ->label('Đường dẫn file video cục bộ (Ví dụ: videos/video1.mp4)')
                    ->required(),
                TextInput::make('order')
                    ->label('Thứ tự hiển thị')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
