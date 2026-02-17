<?php

namespace App\Models;

use App\Enums\Tour\TourItemTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TourPackageItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_package_id',
        'type',
        'title',
        'description',
        'day_number',
        'order',
        'meta_data',
        'cover_image',
        'gallery',
    ];

    protected function casts(): array
    {
        return [
            'type' => TourItemTypeEnum::class,
            'meta_data' => 'array',
            'gallery' => 'array',
            'title' => 'array',
            'description' => 'array',
        ];
    }

    public function tourPackage(): BelongsTo
    {
        return $this->belongsTo(TourPackage::class);
    }

    public function translatedTitle(): string
    {
        $titles = $this->getAttributes()['title'] ?? null;
        $titles = is_string($titles) ? json_decode($titles, true) : $titles;
        return $titles[app()->getLocale()] ?? $titles['uz'] ?? '';
    }

    public function translatedDescription(): ?string
    {
        $descriptions = $this->getAttributes()['description'] ?? null;
        $descriptions = is_string($descriptions) ? json_decode($descriptions, true) : $descriptions;
        if (!$descriptions) return null;
        return $descriptions[app()->getLocale()] ?? $descriptions['uz'] ?? null;
    }
}
