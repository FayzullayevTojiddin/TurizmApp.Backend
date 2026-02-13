<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(3)->schema([
                Grid::make(1)->schema([
                    self::generalSection(),
                ])->columnSpan(2),

                Grid::make(1)->schema([
                    self::avatarSection(),
                ])->columnSpan(1),
            ])->columnSpanFull(),
        ]);
    }

    private static function generalSection(): Section
    {
        return Section::make('Shaxsiy ma\'lumotlar')
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('name')
                        ->label('Ism')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),

                    TextInput::make('phone')
                        ->label('Telefon')
                        ->tel()
                        ->maxLength(20),

                    Select::make('role')
                        ->label('Rol')
                        ->options([
                            'client' => 'Mijoz',
                            'manager' => 'Menejer',
                            'admin' => 'Admin',
                        ])
                        ->default('client')
                        ->required(),
                ]),                
            ]);
    }

    private static function avatarSection(): Section
    {
        return Section::make('Rasm')
            ->schema([
                FileUpload::make('avatar')
                    ->label('Avatar')
                    ->image()
                    ->avatar()
                    ->circleCropper()
                    ->directory('avatars')
                    ->alignCenter(),
            ]);
    }
}