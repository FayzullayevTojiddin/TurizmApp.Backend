<?php

namespace Database\Seeders;

use App\Models\MyTour;
use App\Models\MyTourItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class MyTourSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        $users->each(function (User $user) {
            $draft = MyTour::factory()->draft()->create(['user_id' => $user->id]);
            MyTourItem::factory()->destination()->create(['my_tour_id' => $draft->id, 'day_number' => 1, 'order' => 1]);
            MyTourItem::factory()->hotel()->create(['my_tour_id' => $draft->id, 'day_number' => 1, 'order' => 2]);

            $pending = MyTour::factory()->pending()->create(['user_id' => $user->id]);
            MyTourItem::factory()->destination()->create(['my_tour_id' => $pending->id, 'day_number' => 1, 'order' => 1]);
            MyTourItem::factory()->hotel()->create(['my_tour_id' => $pending->id, 'day_number' => 1, 'order' => 2]);
            MyTourItem::factory()->attraction()->create(['my_tour_id' => $pending->id, 'day_number' => 2, 'order' => 1]);
            MyTourItem::factory()->activity()->create(['my_tour_id' => $pending->id, 'day_number' => 3, 'order' => 1]);

            $approved = MyTour::factory()->approved()->create(['user_id' => $user->id]);
            MyTourItem::factory()->destination()->create(['my_tour_id' => $approved->id, 'day_number' => 1, 'order' => 1]);
            MyTourItem::factory()->hotel()->create(['my_tour_id' => $approved->id, 'day_number' => 1, 'order' => 2]);
            MyTourItem::factory()->attraction()->count(2)->sequence(
                ['day_number' => 2, 'order' => 1],
                ['day_number' => 2, 'order' => 2],
            )->create(['my_tour_id' => $approved->id]);
            MyTourItem::factory()->activity()->create(['my_tour_id' => $approved->id, 'day_number' => 3, 'order' => 1]);
        });
    }
}