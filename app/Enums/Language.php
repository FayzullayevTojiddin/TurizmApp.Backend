<?php

namespace App\Enums;

enum Language: string
{
    case UZ = 'uz';
    case RU = 'ru';
    case EN = 'en';
    case ZH = 'zh';
    case AR = 'ar';
    case TR = 'tr';
    case KO = 'ko';
    case JA = 'ja';
    case HI = 'hi';
    case FA = 'fa';

    public function label(): string
    {
        return match ($this) {
            self::UZ => "O'zbek",
            self::RU => 'Русский',
            self::EN => 'English',
            self::ZH => '中文',
            self::AR => 'العربية',
            self::TR => 'Türkçe',
            self::KO => '한국어',
            self::JA => '日本語',
            self::HI => 'हिन्दी',
            self::FA => 'فارسی',
        };
    }

    public function flag(): string
    {
        return match ($this) {
            self::UZ => '🇺🇿',
            self::RU => '🇷🇺',
            self::EN => '🇬🇧',
            self::ZH => '🇨🇳',
            self::AR => '🇸🇦',
            self::TR => '🇹🇷',
            self::KO => '🇰🇷',
            self::JA => '🇯🇵',
            self::HI => '🇮🇳',
            self::FA => '🇮🇷',
        };
    }
}