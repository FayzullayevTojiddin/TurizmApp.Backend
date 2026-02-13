<?php

namespace App\Enums\Tour;

enum MealPlanEnum: string
{
    case BB = 'BB';
    case HB = 'HB';
    case FB = 'FB';
    case AI = 'AI';

    public function label(): string
    {
        return match ($this) {
            self::BB => 'Nonushta (BB)',
            self::HB => 'Yarim pension (HB)',
            self::FB => 'To\'liq pension (FB)',
            self::AI => 'All Inclusive (AI)',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(
            fn (self $case) => [$case->value => $case->label()]
        )->toArray();
    }
}