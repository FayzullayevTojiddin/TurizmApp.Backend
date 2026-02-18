<?php

namespace App\Filament\Resources\Bookings\Tables;

use App\Enums\BookingStatusEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('booking_number')
                    ->label('Raqam')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold')
                    ->color('primary'),

                TextColumn::make('tourPackage.title')
                    ->label('Tur paketi')
                    ->sortable(false)
                    ->limit(30),

                TextColumn::make('name')
                    ->label('Mijoz')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('Telefon')
                    ->searchable(),

                TextColumn::make('adults_count')
                    ->label('Kattalar')
                    ->alignCenter(),

                TextColumn::make('children_count')
                    ->label('Bolalar')
                    ->alignCenter(),

                TextColumn::make('total_price')
                    ->label('Narx')
                    ->money('usd')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Holat')
                    ->badge()
                    ->color(fn (BookingStatusEnum $state): string => match ($state) {
                        BookingStatusEnum::Pending => 'warning',
                        BookingStatusEnum::Confirmed => 'success',
                        BookingStatusEnum::Cancelled => 'danger',
                        BookingStatusEnum::Completed => 'info',
                    }),

                TextColumn::make('created_at')
                    ->label('Yaratilgan')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Holat')
                    ->options(BookingStatusEnum::class),

                SelectFilter::make('tour_package_id')
                    ->label('Tur paketi')
                    ->relationship('tourPackage', 'title->uz')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                ViewAction::make()->iconButton(),
                EditAction::make()->iconButton(),
                DeleteAction::make()->iconButton(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}