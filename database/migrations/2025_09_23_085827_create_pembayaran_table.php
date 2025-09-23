<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('booking')->onDelete('cascade');
            $table->date('tgl_bayar');
            $table->decimal('jumlah_bayar', 12, 2);
            $table->string('metode_bayar');
            $table->string('status_bayar')->default('pending'); // pending, lunas, gagal
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
