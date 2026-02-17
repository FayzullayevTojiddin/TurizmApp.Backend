<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'avatar',
        'role',
        'name',
        'email',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'super';
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'is_active' => 'boolean'
        ];
    }
}
