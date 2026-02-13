<?php

namespace App\Models;

use App\Enums\Tour\MealPlanEnum;
use App\Enums\Tour\TourPackageStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class TourPackage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'description',
        'duration_days',
        'duration_nights',
        'start_date',
        'end_date',
        'base_price',
        'discount_percent',
        'max_people',
        'min_people',
        'included_services',
        'excluded_services',
        'meal_plan',
        'status',
        'featured',
        'cover_image',
        'gallery',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'base_price' => 'decimal:2',
            'included_services' => 'array',
            'excluded_services' => 'array',
            'meal_plan' => MealPlanEnum::class,
            'status' => TourPackageStatusEnum::class,
            'featured' => 'boolean',
            'gallery' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(TourPackageItem::class)->orderBy('day_number')->orderBy('order');
    }

    public function destinations(): HasMany
    {
        return $this->items()->where('type', 'destination');
    }

    public function hotels(): HasMany
    {
        return $this->items()->where('type', 'hotel');
    }

    public function attractions(): HasMany
    {
        return $this->items()->where('type', 'attraction');
    }

    public function activities(): HasMany
    {
        return $this->items()->where('type', 'activity');
    }

    public function transports(): HasMany
    {
        return $this->items()->where('type', 'transport');
    }

    public function restaurants(): HasMany
    {
        return $this->items()->where('type', 'restaurant');
    }

    public function discountedPrice(): float
    {
        return $this->base_price * (1 - $this->discount_percent / 100);
    }

    public function isAvailable(): bool
    {
        return $this->status === TourPackageStatusEnum::Active;
    }
}