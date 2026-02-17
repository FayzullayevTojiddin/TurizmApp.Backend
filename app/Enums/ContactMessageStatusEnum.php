<?php

namespace App\Enums;

enum ContactMessageStatusEnum: string
{
    case New = 'new';
    case Read = 'read';
    case Replied = 'replied';
    case Archived = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::New => 'Yangi',
            self::Read => 'O\'qilgan',
            self::Replied => 'Javob berilgan',
            self::Archived => 'Arxivlangan',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [$case->value => $case->label()])
            ->toArray();
    }
}
