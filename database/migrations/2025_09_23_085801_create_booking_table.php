<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('booking', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('kamar_id');
            $table->date('tgl_booking')->default(now());
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->enum('status', ['pending', 'disetujui', 'batal'])->default('pending');
            $table->timestamps();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamar')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('booking');
    }
};
