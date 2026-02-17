<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use App\Enums\ContactMessageStatusEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(3)->schema([
                Grid::make(1)->schema([
                    self::messageSection(),
                    self::adminSection(),
                ])->columnSpan(2),

                Grid::make(1)->schema([
                    self::statusSection(),
                    self::infoSection(),
                ])->columnSpan(1),
            ])
            ->columnSpanFull(),
        ]);
    }

    private static function messageSection(): Section
    {
        return Section::make('Xabar ma\'lumotlari')
            ->schema([
                TextInput::make('name')
                    ->label('Ism')
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('email')
                    ->label('E-mail')
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('subject')
                    ->label('Mavzu')
                    ->disabled()
                    ->dehydrated(false),

                Textarea::make('message')
                    ->label('Xabar matni')
                    ->disabled()
                    ->dehydrated(false)
                    ->rows(5)
                    ->columnSpanFull(),
            ]);
    }

    private static function adminSection(): Section
    {
        return Section::make('Admin izohi')
            ->schema([
                Textarea::make('admin_notes')
                    ->label('Ichki izoh')
                    ->rows(3)
                    ->placeholder('Admin uchun ichki izoh...')
                    ->columnSpanFull(),
            ]);
    }

    private static function statusSection(): Section
    {
        return Section::make('Holat')
            ->schema([
                Select::make('status')
                    ->label('Status')
                    ->options(ContactMessageStatusEnum::options())
                    ->required(),
            ]);
    }

    private static function infoSection(): Section
    {
        return Section::make('Ma\'lumot')
            ->schema([
                Placeholder::make('created_at')
                    ->label('Yuborilgan vaqt')
                    ->content(fn ($record) => $record?->created_at?->format('d.m.Y H:i') ?? '-'),

                Placeholder::make('read_at')
                    ->label('O\'qilgan vaqt')
                    ->content(fn ($record) => $record?->read_at?->format('d.m.Y H:i') ?? 'O\'qilmagan'),
            ]);
    }
}
