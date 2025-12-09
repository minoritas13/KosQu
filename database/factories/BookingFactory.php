<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Kamar;

class BookingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'user_id' => null,
            'kamar_id' => null,
            'tgl_mulai' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'tgl_selesai' => $this->faker->dateTimeBetween('now', '+2 months'),
            'status' => $this->faker->randomElement(['pending', 'disetujui', 'batal']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
