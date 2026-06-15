<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('badge_text')
                    ->label('Nhãn phụ phía trên')
                    ->required(),
                TextInput::make('title')
                    ->label('Tiêu đề chính')
                    ->required(),
                Textarea::make('description')
                    ->label('Đoạn mô tả ngắn')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('background_image_url')
                    ->label('Ảnh nền chính')
                    ->image()
                    ->required(),
                TextInput::make('primary_button_text')
                    ->label('Tên nút chính')
                    ->required(),
                TextInput::make('primary_button_url')
                    ->label('Liên kết nút chính (có thể dùng anchor như #service1 hoặc link đầy đủ)')
                    ->required(),
                TextInput::make('secondary_button_text')
                    ->label('Tên nút phụ')
                    ->required(),
                TextInput::make('secondary_button_url')
                    ->label('Liên kết nút phụ (có thể dùng anchor như #about hoặc link đầy đủ)')
                    ->required(),
            ]);
    }
}
