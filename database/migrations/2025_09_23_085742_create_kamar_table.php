<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kamar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('admin_id');
            $table->string('nomor_kamar')->unique();
            $table->string('tipe_kamar'); // contoh: "Standard", "Deluxe"
            $table->decimal('harga', 12, 2);
            $table->enum('status', ['tersedia', 'terisi', 'perbaikan'])->default('tersedia');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable(); 
            $table->timestamps();

            // Foreign key
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('kamar');
    }
};
