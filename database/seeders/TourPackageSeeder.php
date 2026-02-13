<?php

namespace Database\Seeders;

use App\Models\TourPackage;
use App\Models\TourPackageItem;
use Illuminate\Database\Seeder;

class TourPackageSeeder extends Seeder
{
    public function run(): void
    {
        TourPackage::factory(10)->active()->create()->each(function (TourPackage $tour) {
            $day = 1;

            TourPackageItem::factory()
                ->destination()
                ->create(['tour_package_id' => $tour->id, 'day_number' => $day, 'order' => 1]);

            TourPackageItem::factory()
                ->hotel()
                ->create(['tour_package_id' => $tour->id, 'day_number' => $day, 'order' => 2]);

            TourPackageItem::factory()
                ->transport()
                ->create(['tour_package_id' => $tour->id, 'day_number' => $day, 'order' => 3]);

            TourPackageItem::factory()
                ->attraction()
                ->count(2)
                ->sequence(
                    ['day_number' => $day + 1, 'order' => 1],
                    ['day_number' => $day + 1, 'order' => 2],
                )
                ->create(['tour_package_id' => $tour->id]);

            TourPackageItem::factory()
                ->activity()
                ->create(['tour_package_id' => $tour->id, 'day_number' => $day + 2, 'order' => 1]);
        });

        TourPackage::factory(3)->featured()->active()->create()->each(function (TourPackage $tour) {
            TourPackageItem::factory()->destination()->create(['tour_package_id' => $tour->id, 'day_number' => 1, 'order' => 1]);
            TourPackageItem::factory()->hotel()->create(['tour_package_id' => $tour->id, 'day_number' => 1, 'order' => 2]);
            TourPackageItem::factory()->attraction()->create(['tour_package_id' => $tour->id, 'day_number' => 2, 'order' => 1]);
            TourPackageItem::factory()->activity()->create(['tour_package_id' => $tour->id, 'day_number' => 3, 'order' => 1]);
        });

        TourPackage::factory(2)->create(['status' => \App\Enums\Tour\TourPackageStatusEnum::SoldOut]);
        TourPackage::factory(2)->create(['status' => \App\Enums\Tour\TourPackageStatusEnum::Upcoming]);
    }
}