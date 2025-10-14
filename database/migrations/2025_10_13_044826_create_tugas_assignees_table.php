<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tugas_assignee', function (Blueprint $table) {
            $table->id();
        
            // Relasi ke tabel tugas
            $table->foreignId('tugas_id')
                ->nullable()
                ->constrained('tugas')
                ->nullOnDelete();
        
            // Relasi ke tabel siswa_profile
            $table->foreignId('siswa_id')
                ->nullable()
                ->constrained('siswa_profile')
                ->nullOnDelete();
        
            // Kolom tanggal dan user tracking
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
        
            // Status aktif
            $table->boolean('is_active')->default(true);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_assignee');
    }
};
