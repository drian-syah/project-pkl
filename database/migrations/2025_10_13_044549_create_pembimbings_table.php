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
        Schema::create('pembimbing', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY

            // Relasi ke tabel pengajuan_pklmagang
            $table->unsignedBigInteger('pengajuan_id')->nullable();
            $table->foreign('pengajuan_id')->references('id')->on('pengajuan_pklmagang')->onDelete('cascade');

            // Relasi ke tabel pegawai
            $table->unsignedBigInteger('pegawai_id')->nullable();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');

            $table->integer('tahun')->nullable();

            $table->timestamp('created_date')->nullable();
            $table->unsignedBigInteger('created_id')->nullable();

            $table->unsignedBigInteger('updated_id')->nullable();
            $table->timestamp('updated_date')->nullable();

            $table->unsignedBigInteger('deleted_id')->nullable();
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
        Schema::dropIfExists('pembimbing');
    }
};
