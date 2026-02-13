<?php

namespace App\Models;

use App\Enums\Tour\TourStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MyTour extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'start_date',
        'end_date',
        'duration_days',
        'duration_nights',
        'adults_count',
        'children_count',
        'include_flight',
        'include_transfer',
        'include_insurance',
        'special_requests',
        'estimated_price',
        'final_price',
        'status',
        'manager_notes',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'include_flight' => 'boolean',
            'include_transfer' => 'boolean',
            'include_insurance' => 'boolean',
            'estimated_price' => 'decimal:2',
            'final_price' => 'decimal:2',
            'status' => TourStatusEnum::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(MyTourItem::class)->orderBy('day_number')->orderBy('order');
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

    public function isDraft(): bool
    {
        return $this->status === TourStatusEnum::Draft;
    }

    public function isConfirmed(): bool
    {
        return in_array($this->status, [TourStatusEnum::Approved, TourStatusEnum::Booked]);
    }

    public function totalPeople(): int
    {
        return $this->adults_count + $this->children_count;
    }
}