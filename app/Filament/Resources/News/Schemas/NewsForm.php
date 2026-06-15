<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Tiêu đề bài viết')
                    ->required(),
                TextInput::make('category')
                    ->label('Chuyên mục / Thể loại')
                    ->required(),
                FileUpload::make('image_url')
                    ->label('Hình ảnh tiêu đề')
                    ->image()
                    ->required(),
                Textarea::make('summary')
                    ->label('Tóm tắt nội dung')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('published_date')
                    ->label('Ngày xuất bản')
                    ->required(),
            ]);
    }
}
