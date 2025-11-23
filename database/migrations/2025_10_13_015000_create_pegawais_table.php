<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();

            // Relasi ke users dan bidang
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete(); // ON DELETE SET NULL

            $table->string('nip', 50)->unique();
            $table->string('nama', 100);
            $table->string('jabatan_id', 100)->nullable();

            $table->foreignId('bidang_id')
                ->nullable()
                ->constrained('bidangs')
                ->nullOnDelete();

            // Audit trail
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
        Schema::dropIfExists('pegawai');
    }
};

