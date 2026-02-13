<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Enums\BookingStatusEnum;
use App\Models\TourPackage;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(3)->schema([
                Grid::make(1)->schema([
                    self::generalSection(),
                    self::travelersSection(),
                    self::notesSection(),
                ])->columnSpan(2),

                Grid::make(1)->schema([
                    self::statusSection(),
                    self::priceSection(),
                ])->columnSpan(1),
            ])
            ->columnSpanFull(),
        ]);
    }

    private static function generalSection(): Section
    {
        return Section::make('Buyurtma ma\'lumotlari')
            ->schema([
                TextInput::make('booking_number')
                    ->label('Buyurtma raqami')
                    ->default(fn () => \App\Models\Booking::generateBookingNumber())
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->unique(ignoreRecord: true),

                Select::make('tour_package_id')
                    ->label('Tur paketi')
                    ->relationship('tourPackage', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('user_id')
                    ->label('Foydalanuvchi')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                TextInput::make('name')
                    ->label('Mijoz ismi')
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Telefon')
                    ->tel()
                    ->required()
                    ->maxLength(20),
            ]);
    }

    private static function travelersSection(): Section
    {
        return Section::make('Sayohatchilar')
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('adults_count')
                        ->label('Kattalar')
                        ->numeric()
                        ->required()
                        ->default(1)
                        ->minValue(1),

                    TextInput::make('children_count')
                        ->label('Bolalar')
                        ->numeric()
                        ->default(0)
                        ->minValue(0),
                ]),
            ]);
    }

    private static function notesSection(): Section
    {
        return Section::make('Izohlar')
            ->schema([
                Textarea::make('notes')
                    ->label('Mijoz izohi')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }

    private static function statusSection(): Section
    {
        return Section::make('Holat')
            ->schema([
                Select::make('status')
                    ->label('Status')
                    ->options(BookingStatusEnum::class)
                    ->default(BookingStatusEnum::Pending->value)
                    ->required(),
            ]);
    }

    private static function priceSection(): Section
    {
        return Section::make('Narx')
            ->schema([
                TextInput::make('total_price')
                    ->label('Umumiy narx')
                    ->numeric()
                    ->prefix('$')
                    ->default(0),
            ]);
    }
}