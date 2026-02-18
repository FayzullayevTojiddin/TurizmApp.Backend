<?php

namespace App\Filament\Resources\TourPackages\Schemas;

use App\Enums\Language;
use App\Enums\Tour\MealPlanEnum;
use App\Enums\Tour\TourPackageStatusEnum;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TourPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(3)->schema([

                Grid::make(1)->schema([
                    self::translationsSection(),
                    self::durationSection(),
                    self::pricingSection(),
                    self::servicesSection(),
                ])->columnSpan(2),

                Grid::make(1)->schema([
                    self::statusSection(),
                    self::mediaSection(),
                ])->columnSpan(1),

            ])->columnSpanFull(),
        ]);
    }

    private static function translationsSection(): Section
    {
        return Section::make('Umumiy ma\'lumotlar')
            ->schema([
                Tabs::make('Tillar')
                    ->tabs(
                        collect(Language::cases())->map(fn (Language $lang) =>
                            Tab::make($lang->label())
                                ->badge($lang->flag())
                                ->schema([
                                    TextInput::make("title.{$lang->value}")
                                        ->label('Nomi')
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function ($set, ?string $state) use ($lang) {
                                            if ($lang === Language::UZ) {
                                                $set('slug', Str::slug($state));
                                            }
                                        }),
                                    RichEditor::make("description.{$lang->value}")
                                        ->label('Tavsif')
                                        ->required(),
                                ])
                        )
                        ->toArray()
                    )
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
            ]);
    }

    private static function durationSection(): Section
    {
        return Section::make('Muddat')
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('duration_days')
                        ->label('Kunlar soni')
                        ->numeric()
                        ->required()
                        ->minValue(1),
                    TextInput::make('duration_nights')
                        ->label('Tunlar soni')
                        ->numeric()
                        ->required()
                        ->minValue(0),
                ]),
            ]);
    }

    private static function pricingSection(): Section
    {
        return Section::make('Narx va odamlar')
            ->schema([
                Grid::make(4)->schema([
                    TextInput::make('base_price')
                        ->label('Asosiy narx')
                        ->numeric()
                        ->required()
                        ->prefix('$'),
                    TextInput::make('discount_percent')
                        ->label('Chegirma (%)')
                        ->numeric()
                        ->default(0)
                        ->minValue(0)
                        ->maxValue(100)
                        ->suffix('%'),
                    TextInput::make('min_people')
                        ->label('Min. odamlar')
                        ->numeric()
                        ->default(1)
                        ->minValue(1),
                    TextInput::make('max_people')
                        ->label('Maks. odamlar')
                        ->numeric()
                        ->required()
                        ->minValue(1),
                ]),
                Select::make('meal_plan')
                    ->label('Ovqatlanish rejasi')
                    ->options(MealPlanEnum::options()),
            ]);
    }

    private static function servicesSection(): Section
    {
        return Section::make('Xizmatlar')
            ->schema([
                TagsInput::make('included_services')
                    ->label('Kiritilgan xizmatlar')
                    ->placeholder('Xizmat nomini yozing...')
                    ->suggestions(['Aviabilet', 'Mehmonxona', 'Transfer', 'Sug\'urta', 'Gid xizmati', 'Viza']),
                TagsInput::make('excluded_services')
                    ->label('Kiritilmagan xizmatlar')
                    ->placeholder('Xizmat nomini yozing...')
                    ->suggestions(['Shaxsiy xarajatlar', 'Qo\'shimcha ekskursiya', 'Minibar']),
            ]);
    }

    private static function statusSection(): Section
    {
        return Section::make('Holat')
            ->schema([
                Select::make('status')
                    ->label('Status')
                    ->options(TourPackageStatusEnum::options())
                    ->default(TourPackageStatusEnum::Active->value)
                    ->required(),
                Checkbox::make('featured')
                    ->label('Tavsiya etilgan'),
            ]);
    }

    private static function mediaSection(): Section
    {
        return Section::make('Media')
            ->schema([
                FileUpload::make('cover_image')
                    ->label('Muqova rasm')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(51200)
                    ->directory('tour-packages'),
                FileUpload::make('gallery')
                    ->label('Galereya')
                    ->image()
                    ->multiple()
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(51200)
                    ->directory('tour-packages/gallery')
                    ->reorderable(),
                FileUpload::make('videos')
                    ->label('Videolar')
                    ->multiple()
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(512000)
                    ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                    ->directory('tour-packages/videos')
                    ->reorderable(),
            ]);
    }
}