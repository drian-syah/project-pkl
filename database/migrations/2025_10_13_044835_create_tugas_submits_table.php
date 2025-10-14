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
        Schema::create('tugas_submits', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel tugas
            $table->foreignId('tugas_id')
                ->constrained('tugas')
                ->onDelete('cascade');

            // Relasi ke tabel siswa_profile
            $table->foreignId('siswa_id')
                ->constrained('siswa_profile')
                ->onDelete('cascade');

            $table->text('jawaban')->nullable();
            $table->string('file_path', 255)->nullable();
            $table->timestamp('submitted_at')->nullable();

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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_submits');
    }
};
