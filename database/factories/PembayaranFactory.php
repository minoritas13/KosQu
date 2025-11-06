<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Booking;

class PembayaranFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'booking_id' => null,
            'jumlah_bayar' => $this->faker->numberBetween(500000, 2000000),
            'metode_bayar' => $this->faker->randomElement(['transfer', 'e-wallet', 'cash']),
            'status' => $this->faker->randomElement(['pending', 'selesai']),
            'tggl_bayar' => $this->faker->dateTimeBetween('-1 months', 'now'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
