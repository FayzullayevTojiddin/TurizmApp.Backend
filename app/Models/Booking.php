<?php

namespace App\Models;

use App\Enums\BookingStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'booking_number',
        'user_id',
        'tour_package_id',
        'name',
        'phone',
        'adults_count',
        'children_count',
        'notes',
        'total_price',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => BookingStatusEnum::class,
            'total_price' => 'decimal:2',
        ];
    }

    // ========== Relationships ==========

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tourPackage(): BelongsTo
    {
        return $this->belongsTo(TourPackage::class);
    }

    // ========== Helpers ==========

    public function totalPeople(): int
    {
        return $this->adults_count + $this->children_count;
    }

    public function isPending(): bool
    {
        return $this->status === BookingStatusEnum::Pending;
    }

    public static function generateBookingNumber(): string
    {
        $year = date('Y');
        $last = static::whereYear('created_at', $year)->max('id') ?? 0;

        return 'BK-' . $year . '-' . str_pad($last + 1, 5, '0', STR_PAD_LEFT);
    }
}