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
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                TextInput::make('slug')
                    ->label('Đường dẫn (Slug)')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('category')
                    ->label('Chuyên mục / Thể loại')
                    ->required(),
                TextInput::make('youtube_url')
                    ->label('Link YouTube (Tùy chọn)')
                    ->url()
                    ->placeholder('VD: https://www.youtube.com/watch?v=...')
                    ->columnSpanFull(),
                FileUpload::make('image_url')
                    ->label('Hình ảnh tiêu đề')
                    ->image()
                    ->required(),
                \Filament\Forms\Components\RichEditor::make('content')
                    ->label('Nội dung bài viết')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('published_date')
                    ->label('Ngày xuất bản')
                    ->required(),
            ]);
    }
}
