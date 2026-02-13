<?php

namespace App\Models;

use App\Enums\Tour\TourItemTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MyTourItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'my_tour_id',
        'type',
        'title',
        'description',
        'day_number',
        'order',
        'meta_data',
        'cover_image',
    ];

    protected function casts(): array
    {
        return [
            'type' => TourItemTypeEnum::class,
            'meta_data' => 'array',
        ];
    }

    public function myTour(): BelongsTo
    {
        return $this->belongsTo(MyTour::class);
    }
}