<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image_url')
                    ->label('Hình ảnh đại diện')
                    ->image()
                    ->required(),
                TextInput::make('badge')
                    ->label('Huy hiệu đính kèm (Ví dụ: Hot, Mới)')
                    ->default(null),
                TextInput::make('title')
                    ->label('Tên dịch vụ')
                    ->required(),
                \Filament\Forms\Components\RichEditor::make('content')
                    ->label('Mô tả chi tiết')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label('Giá hiển thị (Ví dụ: Từ 4.900.000đ)')
                    ->required(),
                TextInput::make('detail_url')
                    ->label('Liên kết chi tiết (Ví dụ: #service1)')
                    ->required(),
                TextInput::make('order')
                    ->label('Thứ tự hiển thị')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
