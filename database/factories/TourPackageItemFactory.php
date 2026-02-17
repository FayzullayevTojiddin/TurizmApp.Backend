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
        ['uz' => 'Istanbul', 'en' => 'Istanbul', 'ru' => 'Стамбул', 'country' => 'Turkiya', 'city' => 'Istanbul'],
        ['uz' => 'Antalya', 'en' => 'Antalya', 'ru' => 'Анталья', 'country' => 'Turkiya', 'city' => 'Antalya'],
        ['uz' => 'Kapadokiya', 'en' => 'Cappadocia', 'ru' => 'Каппадокия', 'country' => 'Turkiya', 'city' => 'Nevsehir'],
        ['uz' => 'Dubai', 'en' => 'Dubai', 'ru' => 'Дубай', 'country' => 'BAA', 'city' => 'Dubai'],
        ['uz' => 'Sharm el-Sheikh', 'en' => 'Sharm el-Sheikh', 'ru' => 'Шарм-эль-Шейх', 'country' => 'Misr', 'city' => 'Sharm el-Sheikh'],
        ['uz' => 'Roma', 'en' => 'Rome', 'ru' => 'Рим', 'country' => 'Italiya', 'city' => 'Roma'],
    ];

    private const HOTELS = [
        ['uz' => 'Rixos Premium', 'en' => 'Rixos Premium', 'ru' => 'Rixos Premium', 'stars' => 5, 'meal_plan' => 'AI'],
        ['uz' => 'Hilton Garden Inn', 'en' => 'Hilton Garden Inn', 'ru' => 'Hilton Garden Inn', 'stars' => 4, 'meal_plan' => 'BB'],
        ['uz' => 'Delphin Imperial', 'en' => 'Delphin Imperial', 'ru' => 'Delphin Imperial', 'stars' => 5, 'meal_plan' => 'AI'],
        ['uz' => 'Marriott Resort', 'en' => 'Marriott Resort', 'ru' => 'Marriott Resort', 'stars' => 5, 'meal_plan' => 'HB'],
        ['uz' => 'Ramada Hotel', 'en' => 'Ramada Hotel', 'ru' => 'Ramada Hotel', 'stars' => 4, 'meal_plan' => 'BB'],
        ['uz' => 'Sheraton Grand', 'en' => 'Sheraton Grand', 'ru' => 'Sheraton Grand', 'stars' => 5, 'meal_plan' => 'FB'],
    ];

    private const ATTRACTIONS = [
        ['uz' => 'Ayasofya', 'en' => 'Hagia Sophia', 'ru' => 'Айя-София', 'category' => 'historical', 'fee' => 25, 'duration' => 120],
        ['uz' => 'Ko\'k Masjid', 'en' => 'Blue Mosque', 'ru' => 'Голубая мечеть', 'category' => 'religious', 'fee' => 0, 'duration' => 60],
        ['uz' => 'Burj Khalifa', 'en' => 'Burj Khalifa', 'ru' => 'Бурдж-Халифа', 'category' => 'entertainment', 'fee' => 40, 'duration' => 90],
        ['uz' => 'Kolizey', 'en' => 'Colosseum', 'ru' => 'Колизей', 'category' => 'historical', 'fee' => 16, 'duration' => 150],
        ['uz' => 'Kapadokiya sharlar', 'en' => 'Cappadocia Balloons', 'ru' => 'Воздушные шары Каппадокии', 'category' => 'nature', 'fee' => 150, 'duration' => 180],
        ['uz' => 'Grand Bozor', 'en' => 'Grand Bazaar', 'ru' => 'Гранд-Базар', 'category' => 'shopping', 'fee' => 0, 'duration' => 120],
    ];

    private const ACTIVITIES = [
        ['uz' => 'Bosfor sayohati', 'en' => 'Bosphorus Cruise', 'ru' => 'Круиз по Босфору', 'category' => 'excursion', 'hours' => 3, 'price' => 35],
        ['uz' => 'Rafting', 'en' => 'Rafting', 'ru' => 'Рафтинг', 'category' => 'adventure', 'hours' => 4, 'price' => 45],
        ['uz' => 'Cho\'l safari', 'en' => 'Desert Safari', 'ru' => 'Сафари в пустыне', 'category' => 'adventure', 'hours' => 5, 'price' => 60],
        ['uz' => 'Snorkeling', 'en' => 'Snorkeling', 'ru' => 'Снорклинг', 'category' => 'water_sport', 'hours' => 3, 'price' => 30],
        ['uz' => 'Shahar ekskursiyasi', 'en' => 'City Tour', 'ru' => 'Обзорная экскурсия', 'category' => 'cultural', 'hours' => 6, 'price' => 50],
        ['uz' => 'Gastro tur', 'en' => 'Gastro Tour', 'ru' => 'Гастрономический тур', 'category' => 'food_tour', 'hours' => 4, 'price' => 40],
    ];

    private static function multiLang(string $uz, string $en, string $ru): array
    {
        return ['uz' => $uz, 'en' => $en, 'ru' => $ru];
    }

    public function definition(): array
    {
        return [
            'tour_package_id' => TourPackage::factory(),
            'type' => fake()->randomElement(TourItemTypeEnum::cases()),
            'title' => self::multiLang('Element', 'Item', 'Элемент'),
            'description' => self::multiLang('Tavsif', 'Description', 'Описание'),
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
            'title' => self::multiLang($dest['uz'], $dest['en'], $dest['ru']),
            'description' => self::multiLang(
                $dest['uz'] . ' shahri',
                $dest['en'] . ' city',
                'Город ' . $dest['ru']
            ),
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
            'title' => self::multiLang($hotel['uz'], $hotel['en'], $hotel['ru']),
            'description' => self::multiLang(
                $hotel['stars'] . ' yulduzli mehmonxona',
                $hotel['stars'] . ' star hotel',
                $hotel['stars'] . '-звездочный отель'
            ),
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
            'title' => self::multiLang($attr['uz'], $attr['en'], $attr['ru']),
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
            'title' => self::multiLang($act['uz'], $act['en'], $act['ru']),
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
        $cities = [
            ['uz' => 'Toshkent', 'en' => 'Tashkent', 'ru' => 'Ташкент'],
            ['uz' => 'Istanbul', 'en' => 'Istanbul', 'ru' => 'Стамбул'],
            ['uz' => 'Antalya', 'en' => 'Antalya', 'ru' => 'Анталья'],
            ['uz' => 'Dubai', 'en' => 'Dubai', 'ru' => 'Дубай'],
            ['uz' => 'Roma', 'en' => 'Rome', 'ru' => 'Рим'],
        ];

        $from = fake()->randomElement($cities);
        $to = fake()->randomElement(array_filter($cities, fn ($c) => $c['uz'] !== $from['uz']));

        return $this->state([
            'type' => TourItemTypeEnum::Transport,
            'title' => self::multiLang(
                $from['uz'] . ' → ' . $to['uz'],
                $from['en'] . ' → ' . $to['en'],
                $from['ru'] . ' → ' . $to['ru']
            ),
            'meta_data' => [
                'mode' => fake()->randomElement(['flight', 'bus', 'train']),
                'from' => $from['uz'],
                'to' => $to['uz'],
                'carrier' => fake()->randomElement(['Turkish Airlines', 'Uzbekistan Airways', 'FlyDubai']),
            ],
        ]);
    }
}
