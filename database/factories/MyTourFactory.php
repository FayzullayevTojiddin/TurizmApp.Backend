<?php

namespace Database\Factories;

use App\Enums\Tour\TourStatusEnum;
use App\Models\MyTour;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MyTourFactory extends Factory
{
    protected $model = MyTour::class;

    public function definition(): array
    {
        $durationDays = fake()->randomElement([3, 5, 7, 10, 14]);
        $startDate = fake()->dateTimeBetween('+1 week', '+4 months');

        return [
            'user_id' => User::factory(),
            'title' => fake()->randomElement([
                'Mening Turkiya sayohatim',
                'Oilaviy Dubai sayohati',
                'Yozgi Antalya dam olish',
                'Evropa turi',
                'Romantik Parizh sayohati',
                'Tailand sarguzashti',
                'Maldiv orollari dam olish',
            ]),
            'start_date' => $startDate,
            'end_date' => (clone $startDate)->modify("+{$durationDays} days"),
            'duration_days' => $durationDays,
            'duration_nights' => $durationDays - 1,
            'adults_count' => fake()->numberBetween(1, 4),
            'children_count' => fake()->randomElement([0, 0, 0, 1, 2]),
            'include_flight' => fake()->boolean(70),
            'include_transfer' => fake()->boolean(60),
            'include_insurance' => fake()->boolean(40),
            'special_requests' => fake()->optional(0.3)->sentence(),
            'estimated_price' => fake()->randomElement([400, 700, 1000, 1500, 2000]),
            'final_price' => null,
            'status' => TourStatusEnum::Draft,
            'manager_notes' => null,
        ];
    }

    public function draft(): static
    {
        return $this->state(['status' => TourStatusEnum::Draft]);
    }

    public function pending(): static
    {
        return $this->state(['status' => TourStatusEnum::Pending]);
    }

    public function approved(): static
    {
        return $this->state(fn () => [
            'status' => TourStatusEnum::Approved,
            'final_price' => fake()->randomElement([500, 800, 1200, 1800, 2500]),
        ]);
    }

    public function booked(): static
    {
        return $this->state(fn () => [
            'status' => TourStatusEnum::Booked,
            'final_price' => fake()->randomElement([500, 800, 1200, 1800, 2500]),
        ]);
    }
}