<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'alalhaq1@mail.ru',
            'password' => bcrypt('123QwertY'),
            'role' => 'super',
        ]);
    }
}
