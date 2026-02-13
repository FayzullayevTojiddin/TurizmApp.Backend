<?php

namespace App\Enums;

enum BookingStatusEnum: string
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Cancelled = 'cancelled';
    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Kutilmoqda',
            self::Confirmed => 'Tasdiqlangan',
            self::Cancelled => 'Bekor qilingan',
            self::Completed => 'Yakunlangan',
        };
    }
}