<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Booking;
use App\Models\Pembayaran;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admins = User::factory(3)->state(['role' => 'admin'])->create();
        $penyewa = User::factory(10)->state(['role' => 'penyewa'])->create();
        $this->call(AdminUserSeeder::class);

        // 15 kamar untuk admin random
        $kamar = Kamar::factory(15)->create([
            'admin_id' => $admins->random()->id,
        ]);

        // 10 booking oleh penyewa dan kamar random
        $booking = Booking::factory(10)->create([
            'user_id' => $penyewa->random()->id,
            'kamar_id' => $kamar->random()->id,
        ]);

        // 10 pembayaran untuk booking random
        Pembayaran::factory(10)->create([
            'booking_id' => $booking->random()->id,
        ]);
    }
}
