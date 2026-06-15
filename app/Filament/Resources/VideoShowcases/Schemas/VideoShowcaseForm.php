<?php

namespace App\Filament\Resources\VideoShowcases\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VideoShowcaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('badge')
                    ->label('Nhãn phụ phía trên')
                    ->required(),
                TextInput::make('title')
                    ->label('Tiêu đề chính')
                    ->required(),
                Textarea::make('description')
                    ->label('Đoạn mô tả ngắn')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('youtube_embed_url')
                    ->label('Liên kết nhúng Youtube (Ví dụ: https://www.youtube.com/embed/9aiZ-FieyvY?si=nLiXKdkKAy0mAfMv)')
                    ->required(),
            ]);
    }
}
