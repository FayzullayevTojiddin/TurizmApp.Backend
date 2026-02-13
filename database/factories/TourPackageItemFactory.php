<?php

namespace Database\Factories;

use App\Enums\Tour\TourItemTypeEnum;
use App\Models\TourPackage;
use App\Models\TourPackageItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourPackageItemFactory extends Factory
{
    protected $model = TourPackageItem::class;

    private const DESTINATIONS = [
        ['title' => 'Istanbul', 'country' => 'Turkiya', 'city' => 'Istanbul'],
        ['title' => 'Antalya', 'country' => 'Turkiya', 'city' => 'Antalya'],
        ['title' => 'Kapadokiya', 'country' => 'Turkiya', 'city' => 'Nevsehir'],
        ['title' => 'Dubai', 'country' => 'BAA', 'city' => 'Dubai'],
        ['title' => 'Sharm el-Sheikh', 'country' => 'Misr', 'city' => 'Sharm el-Sheikh'],
        ['title' => 'Roma', 'country' => 'Italiya', 'city' => 'Roma'],
    ];

    private const HOTELS = [
        ['title' => 'Rixos Premium', 'stars' => 5, 'meal_plan' => 'AI'],
        ['title' => 'Hilton Garden Inn', 'stars' => 4, 'meal_plan' => 'BB'],
        ['title' => 'Delphin Imperial', 'stars' => 5, 'meal_plan' => 'AI'],
        ['title' => 'Marriott Resort', 'stars' => 5, 'meal_plan' => 'HB'],
        ['title' => 'Ramada Hotel', 'stars' => 4, 'meal_plan' => 'BB'],
        ['title' => 'Sheraton Grand', 'stars' => 5, 'meal_plan' => 'FB'],
    ];

    private const ATTRACTIONS = [
        ['title' => 'Ayasofya', 'category' => 'historical', 'fee' => 25, 'duration' => 120],
        ['title' => 'Ko\'k Masjid', 'category' => 'religious', 'fee' => 0, 'duration' => 60],
        ['title' => 'Burj Khalifa', 'category' => 'entertainment', 'fee' => 40, 'duration' => 90],
        ['title' => 'Kolizey', 'category' => 'historical', 'fee' => 16, 'duration' => 150],
        ['title' => 'Kapadokiya sharlar', 'category' => 'nature', 'fee' => 150, 'duration' => 180],
        ['title' => 'Grand Bozor', 'category' => 'shopping', 'fee' => 0, 'duration' => 120],
    ];

    private const ACTIVITIES = [
        ['title' => 'Bosfor sayohati', 'category' => 'excursion', 'hours' => 3, 'price' => 35],
        ['title' => 'Rafting', 'category' => 'adventure', 'hours' => 4, 'price' => 45],
        ['title' => 'Cho\'l safari', 'category' => 'adventure', 'hours' => 5, 'price' => 60],
        ['title' => 'Snorkeling', 'category' => 'water_sport', 'hours' => 3, 'price' => 30],
        ['title' => 'Shahar ekskursiyasi', 'category' => 'cultural', 'hours' => 6, 'price' => 50],
        ['title' => 'Gastro tur', 'category' => 'food_tour', 'hours' => 4, 'price' => 40],
    ];

    public function definition(): array
    {
        return [
            'tour_package_id' => TourPackage::factory(),
            'type' => fake()->randomElement(TourItemTypeEnum::cases()),
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(),
            'day_number' => fake()->numberBetween(1, 10),
            'order' => fake()->numberBetween(1, 5),
            'meta_data' => [],
            'cover_image' => null,
            'gallery' => null,
        ];
    }

    public function destination(): static
    {
        $dest = fake()->randomElement(self::DESTINATIONS);

        return $this->state([
            'type' => TourItemTypeEnum::Destination,
            'title' => $dest['title'],
            'description' => $dest['title'] . ' shahri',
            'meta_data' => [
                'country' => $dest['country'],
                'city' => $dest['city'],
                'days_count' => fake()->numberBetween(2, 5),
                'nights_count' => fake()->numberBetween(1, 4),
            ],
        ]);
    }

    public function hotel(): static
    {
        $hotel = fake()->randomElement(self::HOTELS);

        return $this->state([
            'type' => TourItemTypeEnum::Hotel,
            'title' => $hotel['title'],
            'description' => $hotel['stars'] . ' yulduzli mehmonxona',
            'meta_data' => [
                'stars' => $hotel['stars'],
                'room_type' => fake()->randomElement(['standard', 'deluxe', 'suite']),
                'meal_plan' => $hotel['meal_plan'],
                'amenities' => fake()->randomElements(
                    ['basseyn', 'spa', 'wifi', 'fitnes', 'plyaj', 'restoran'],
                    fake()->numberBetween(3, 5)
                ),
            ],
        ]);
    }

    public function attraction(): static
    {
        $attr = fake()->randomElement(self::ATTRACTIONS);

        return $this->state([
            'type' => TourItemTypeEnum::Attraction,
            'title' => $attr['title'],
            'meta_data' => [
                'category' => $attr['category'],
                'entrance_fee' => $attr['fee'],
                'estimated_duration' => $attr['duration'],
            ],
        ]);
    }

    public function activity(): static
    {
        $act = fake()->randomElement(self::ACTIVITIES);

        return $this->state([
            'type' => TourItemTypeEnum::Activity,
            'title' => $act['title'],
            'meta_data' => [
                'category' => $act['category'],
                'duration_hours' => $act['hours'],
                'price_per_person' => $act['price'],
                'includes' => fake()->randomElements(
                    ['transport', 'gid', 'tushlik', 'jihozlar', 'suv'],
                    fake()->numberBetween(2, 4)
                ),
            ],
        ]);
    }

    public function transport(): static
    {
        $cities = ['Toshkent', 'Istanbul', 'Antalya', 'Dubai', 'Roma'];
        $from = fake()->randomElement($cities);
        $to = fake()->randomElement(array_diff($cities, [$from]));

        return $this->state([
            'type' => TourItemTypeEnum::Transport,
            'title' => $from . ' → ' . $to,
            'meta_data' => [
                'mode' => fake()->randomElement(['flight', 'bus', 'train']),
                'from' => $from,
                'to' => $to,
                'carrier' => fake()->randomElement(['Turkish Airlines', 'Uzbekistan Airways', 'FlyDubai']),
            ],
        ]);
    }
}