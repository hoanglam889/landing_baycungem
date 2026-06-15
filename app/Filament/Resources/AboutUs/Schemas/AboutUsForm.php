<?php

namespace App\Filament\Resources\AboutUs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AboutUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image_url')
                    ->label('Hình ảnh minh họa')
                    ->image()
                    ->required(),
                TextInput::make('badge')
                    ->label('Huy hiệu đính kèm')
                    ->required(),
                TextInput::make('title')
                    ->label('Tiêu đề chính')
                    ->required(),
                Textarea::make('description')
                    ->label('Đoạn mô tả chi tiết')
                    ->required()
                    ->columnSpanFull(),
                \Filament\Forms\Components\Repeater::make('features')
                    ->label('Các điểm nổi bật (đánh dấu tích)')
                    ->simple(
                        TextInput::make('feature')
                            ->label('Tên đặc điểm')
                            ->required()
                    )
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
