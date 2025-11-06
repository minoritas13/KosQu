<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class KamarFactory extends Factory
{
    // database/factories/KamarFactory.php
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'admin_id' => null, // kosong dulu, nanti diisi seeder
            'nomor_kamar' => 'A' . $this->faker->unique()->numberBetween(101, 199),
            'tipe_kamar' => $this->faker->randomElement(['Standard', 'Deluxe', 'Suite']),
            'harga' => $this->faker->numberBetween(500000, 1500000),
            'status' => $this->faker->randomElement(['tersedia', 'terisi']),
            'deskripsi' => $this->faker->sentence(8),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
