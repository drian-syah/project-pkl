<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_pklmagang', function (Blueprint $table) {
            $table->id();

            $table->string('no_surat', 50)->nullable();
            $table->date('tgl_surat')->nullable();

            // Relasi ke tabel sekolah
            $table->foreignId('sekolah_id')
                ->nullable()
                ->constrained('sekolahs')
                ->nullOnDelete(); // ON DELETE SET NULL

            $table->integer('jumlah_siswa')->nullable();
            $table->date('periode_mulai')->nullable();
            $table->date('periode_selesai')->nullable();

            // ENUM status
            $table->enum('status', ['draft', 'diproses', 'diterima', 'ditolak', 'selesai'])
                ->default('draft');

            $table->string('file_surat_path', 255)->nullable();

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
        Schema::dropIfExists('pengajuan_pklmagang');
    }
};
