<?php

namespace App\Filament\Resources\ContactMessages\Tables;

use App\Enums\ContactMessageStatusEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContactMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Ism')
                    ->searchable()
                    ->sortable()
                    ->weight(fn ($record) => $record->status === ContactMessageStatusEnum::New ? 'bold' : 'normal'),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                TextColumn::make('subject')
                    ->label('Mavzu')
                    ->searchable()
                    ->limit(40),

                TextColumn::make('status')
                    ->label('Holat')
                    ->formatStateUsing(fn (ContactMessageStatusEnum $state) => $state->label())
                    ->badge()
                    ->color(fn (ContactMessageStatusEnum $state) => match ($state) {
                        ContactMessageStatusEnum::New => 'danger',
                        ContactMessageStatusEnum::Read => 'warning',
                        ContactMessageStatusEnum::Replied => 'success',
                        ContactMessageStatusEnum::Archived => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Yuborilgan')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Holat')
                    ->options(ContactMessageStatusEnum::options()),
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
