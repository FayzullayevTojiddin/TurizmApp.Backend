<?php

namespace App\Filament\Resources\TourPackages\RelationManagers;

use App\Enums\Language;
use App\Enums\Tour\TourItemTypeEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TourPackageItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Tur elementlari';

    protected static ?string $modelLabel = 'Element';

    protected static ?string $pluralModelLabel = 'Elementlar';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(3)->schema([

                Grid::make(1)->schema([
                    Section::make('Asosiy ma\'lumotlar')
                        ->schema([
                            Select::make('type')
                                ->label('Turi')
                                ->options(TourItemTypeEnum::options())
                                ->required(),

                            Tabs::make('Tillar')
                                ->tabs(
                                    collect(Language::cases())->map(fn (Language $lang) =>
                                        Tab::make($lang->label())
                                            ->badge($lang->flag())
                                            ->schema([
                                                TextInput::make("title.{$lang->value}")
                                                    ->label('Nomi')
                                                    ->required($lang === Language::UZ)
                                                    ->maxLength(255),
                                                Textarea::make("description.{$lang->value}")
                                                    ->label('Tavsif')
                                                    ->rows(2),
                                            ])
                                    )->toArray()
                                )
                                ->columnSpanFull(),
                        ]),
                ])->columnSpan(2),

                Grid::make(1)->schema([
                    Section::make('Sozlamalar')
                        ->schema([
                            TextInput::make('day_number')
                                ->label('Kun raqami')
                                ->numeric()
                                ->minValue(1)
                                ->nullable(),
                            TextInput::make('order')
                                ->label('Tartib')
                                ->numeric()
                                ->default(0)
                                ->minValue(0),
                        ]),
                ])->columnSpan(1),

            ])->columnSpanFull(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day_number')
                    ->label('Kun')
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('type')
                    ->label('Turi')
                    ->formatStateUsing(fn (TourItemTypeEnum $state) => $state->label())
                    ->badge(),
                TextColumn::make('title.uz')
                    ->label('Nomi')
                    ->searchable(query: function ($query, string $search): void {
                        $query->where(function ($q) use ($search) {
                            $q->where('title->uz', 'like', "%{$search}%")
                              ->orWhere('title->en', 'like', "%{$search}%")
                              ->orWhere('title->ru', 'like', "%{$search}%");
                        });
                    })
                    ->limit(50),
                TextColumn::make('order')
                    ->label('Tartib')
                    ->sortable()
                    ->alignCenter(),
            ])
            ->defaultSort('day_number')
            ->reorderable('order')
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make()->iconButton(),
                DeleteAction::make()->iconButton(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
