<?php

namespace App\Enums\Tour;

enum TourPackageStatusEnum: string
{
    case Active = 'active';
    case SoldOut = 'sold_out';
    case Upcoming = 'upcoming';
    case Archived = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::Active => 'Faol',
            self::SoldOut => 'Sotilgan',
            self::Upcoming => 'Tez kunda',
            self::Archived => 'Arxivlangan',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(
            fn (self $case) => [$case->value => $case->label()]
        )->toArray();
    }
}