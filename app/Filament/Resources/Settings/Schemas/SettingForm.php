<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->label('Tên website')
                    ->required(),
                TextInput::make('phone')
                    ->label('Số điện thoại')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Địa chỉ Email')
                    ->email()
                    ->required(),
                TextInput::make('address')
                    ->label('Địa chỉ')
                    ->required(),
                TextInput::make('facebook_url')
                    ->label('Liên kết Facebook')
                    ->url()
                    ->default(null),
                TextInput::make('instagram_url')
                    ->label('Liên kết Instagram')
                    ->url()
                    ->default(null),
                TextInput::make('youtube_url')
                    ->label('Liên kết Youtube')
                    ->url()
                    ->default(null),
                TextInput::make('tiktok_url')
                    ->label('Liên kết TikTok')
                    ->url()
                    ->default(null),
                TextInput::make('copyright')
                    ->label('Dòng chữ bản quyền (Copyright)')
                    ->required(),
            ]);
    }
}
