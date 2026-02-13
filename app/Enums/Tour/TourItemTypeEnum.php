<?php

namespace App\Enums\Tour;

enum TourItemTypeEnum: string
{
    case Destination = 'destination';
    case Hotel = 'hotel';
    case Attraction = 'attraction';
    case Activity = 'activity';
    case Transport = 'transport';
    case Restaurant = 'restaurant';

    public function label(): string
    {
        return match ($this) {
            self::Destination => 'Yo\'nalish',
            self::Hotel => 'Mehmonxona',
            self::Attraction => 'Mashhur joy',
            self::Activity => 'Faoliyat',
            self::Transport => 'Transport',
            self::Restaurant => 'Restoran',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(
            fn (self $case) => [$case->value => $case->label()]
        )->toArray();
    }
}