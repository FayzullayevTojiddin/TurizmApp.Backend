<?php

namespace App\Filament\Resources\TourPackages\Tables;

use App\Enums\Tour\MealPlanEnum;
use App\Enums\Tour\TourPackageStatusEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TourPackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('')
                    ->circular()
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?name=TP&background=0D8ABC&color=fff'),

                TextColumn::make('title')
                    ->label('Nomi')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(30),

                TextColumn::make('duration_days')
                    ->label('Muddat')
                    ->formatStateUsing(fn ($record) => $record->duration_days . ' / ' . $record->duration_nights)
                    ->sortable(),

                TextColumn::make('base_price')
                    ->label('Narx')
                    ->money('USD')
                    ->sortable(),

                TextColumn::make('meal_plan')
                    ->label('Ovqat')
                    ->formatStateUsing(fn (MealPlanEnum $state) => $state->label())
                    ->badge(),

                TextColumn::make('max_people')
                    ->label('Maks.'),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn (TourPackageStatusEnum $state) => $state->label())
                    ->badge()
                    ->color(fn (TourPackageStatusEnum $state) => match ($state) {
                        TourPackageStatusEnum::Active => 'success',
                        TourPackageStatusEnum::Upcoming => 'info',
                        TourPackageStatusEnum::SoldOut => 'warning',
                        TourPackageStatusEnum::Archived => 'gray',
                    }),

                IconColumn::make('featured')
                    ->label('⭐')
                    ->boolean(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(TourPackageStatusEnum::options()),

                SelectFilter::make('meal_plan')
                    ->label('Ovqat rejasi')
                    ->options(MealPlanEnum::options()),
            ])
            ->actions([
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