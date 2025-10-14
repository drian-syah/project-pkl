<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel siswa_profile
            $table->foreignId('siswa_id')
                ->nullable()
                ->constrained('siswa_profile')
                ->nullOnDelete();

            $table->date('tanggal')->nullable();
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();

            // ENUM untuk status kehadiran
            $table->enum('status', ['hadir', 'absen', 'sakit'])
                ->default('hadir');

            $table->string('foto', 255)->nullable();

            // Kolom audit trail
            $table->timestamp('created_date')->useCurrent();

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
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
