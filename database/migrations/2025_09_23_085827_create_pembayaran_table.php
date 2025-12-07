<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('booking_id');
            $table->date('tgl_bayar');
            $table->decimal('jumlah_bayar', 12, 2);
            $table->enum('metode_bayar', ['transfer', 'cash', 'e-wallet']);
            $table->enum('status', ['pending', 'selesai'])->default('pending');
            $table->string('bukti_bayar')->nullable()->after('metode_bayar');
            $table->timestamps();

            // Foreign key
            $table->foreign('booking_id')->references('id')->on('booking')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('pembayaran');
    }
};
