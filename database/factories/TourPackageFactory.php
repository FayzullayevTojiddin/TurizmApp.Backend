<?php

namespace Database\Factories;

use App\Enums\Tour\MealPlanEnum;
use App\Enums\Tour\TourPackageStatusEnum;
use App\Models\TourPackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TourPackageFactory extends Factory
{
    protected $model = TourPackage::class;

    public function definition(): array
    {
        $title = fake()->randomElement([
            'Turkiya Grand Tur',
            'Dubai Premium Sayohat',
            'Misr Piramidalar Turi',
            'Malayziya Ekzotik Tur',
            'Tailand Tropik Sayohat',
            'Gretsiya Orollar Turi',
            'Italiya Klassik Tur',
            'Ispaniya Quyoshli Tur',
            'Fransiya Romantik Sayohat',
            'Yaponiya Sakura Turi',
        ]);

        $durationDays = fake()->randomElement([5, 7, 10, 12, 14]);

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(100, 999),
            'description' => fake()->paragraphs(2, true),
            'duration_days' => $durationDays,
            'duration_nights' => $durationDays - 1,
            'base_price' => fake()->randomElement([500, 800, 1200, 1500, 2000, 2500, 3000]),
            'discount_percent' => fake()->randomElement([0, 0, 0, 5, 10, 15, 20]),
            'max_people' => fake()->randomElement([10, 15, 20, 25, 30]),
            'min_people' => fake()->randomElement([1, 2, 4, 5]),
            'included_services' => fake()->randomElements(
                ['Aviabilet', 'Mehmonxona', 'Transfer', 'Sug\'urta', 'Gid xizmati', 'Viza'],
                fake()->numberBetween(3, 6)
            ),
            'excluded_services' => fake()->randomElements(
                ['Shaxsiy xarajatlar', 'Qo\'shimcha ekskursiya', 'Minibar', 'Telefon qo\'ng\'iroqlari'],
                fake()->numberBetween(1, 3)
            ),
            'meal_plan' => fake()->randomElement(MealPlanEnum::cases()),
            'status' => fake()->randomElement(TourPackageStatusEnum::cases()),
            'featured' => fake()->boolean(30),
            'cover_image' => null,
            'gallery' => null,
        ];
    }

    public function active(): static
    {
        return $this->state(['status' => TourPackageStatusEnum::Active]);
    }

    public function featured(): static
    {
        return $this->state(['featured' => true]);
    }
}