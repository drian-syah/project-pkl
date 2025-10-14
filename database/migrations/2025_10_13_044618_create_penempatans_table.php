<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('penempatan', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY

            // Relasi ke tabel pengajuan_pklmagang
            $table->unsignedBigInteger('pengajuan_id')->nullable();
            $table->foreign('pengajuan_id')
                  ->references('id')
                  ->on('pengajuan_pklmagang')
                  ->onDelete('cascade');

            // Relasi ke tabel bidang
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->foreign('bidang_id')
                  ->references('id')
                  ->on('bidangs')
                  ->onDelete('cascade');

            $table->timestamp('created_date')->nullable();
            $table->foreignId('created_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('updated_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamp('updated_date')->nullable();

            $table->foreignId('deleted_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamp('deleted_date')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('penempatan');
    }
};
