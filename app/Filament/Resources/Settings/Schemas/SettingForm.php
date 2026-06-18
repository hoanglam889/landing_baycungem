<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
                TextInput::make('zalo_url')
                    ->label('Liên kết Zalo')
                    ->url()
                    ->default(null),
                Toggle::make('show_phone_button')
                    ->label('Hiển thị nút gọi điện thoại')
                    ->default(true),
                Toggle::make('show_zalo_button')
                    ->label('Hiển thị nút chat Zalo')
                    ->default(true),
                TextInput::make('copyright')
                    ->label('Dòng chữ bản quyền (Copyright)')
                    ->required(),
            ]);
    }
}
