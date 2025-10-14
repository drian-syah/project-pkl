<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel pembimbing
            $table->foreignId('pembimbing_id')
                ->nullable()
                ->constrained('pembimbing')
                ->nullOnDelete();

            $table->string('judul', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamp('tenggat')->nullable();

            // ENUM status: pending / sudah dinilai
            $table->enum('status', ['pending', 'sudah dinilai'])->default('pending');

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
        Schema::dropIfExists('tugas');
    }
};
