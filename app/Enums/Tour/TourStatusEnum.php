<?php

namespace App\Enums\Tour;

enum TourStatusEnum: string
{
    case Draft = 'draft';
    case Pending = 'pending';
    case Reviewing = 'reviewing';
    case Quoted = 'quoted';
    case Approved = 'approved';
    case Booked = 'booked';
    case Cancelled = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::Draft => 'Qoralama',
            self::Pending => 'Kutilmoqda',
            self::Reviewing => 'Ko\'rib chiqilmoqda',
            self::Quoted => 'Narxlangan',
            self::Approved => 'Tasdiqlangan',
            self::Booked => 'Band qilingan',
            self::Cancelled => 'Bekor qilingan',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(
            fn (self $case) => [$case->value => $case->label()]
        )->toArray();
    }
}