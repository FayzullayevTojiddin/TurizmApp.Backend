<?php

namespace App\Models;

use App\Enums\ContactMessageStatusEnum;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
        'read_at',
        'admin_notes',
    ];

    protected function casts(): array
    {
        return [
            'status' => ContactMessageStatusEnum::class,
            'read_at' => 'datetime',
        ];
    }

    public function isNew(): bool
    {
        return $this->status === ContactMessageStatusEnum::New;
    }

    public function markAsRead(): void
    {
        if ($this->isNew()) {
            $this->update([
                'status' => ContactMessageStatusEnum::Read,
                'read_at' => now(),
            ]);
        }
    }
}
