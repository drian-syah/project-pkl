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
        Schema::create('tugas_pengumpulan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->id();
            $table->unsignedBigInteger('id_tugas');
            $table->unsignedBigInteger('id_siswa');
            $table->string('file');
            $table->text('catatan')->nullable();
            $table->string('status')->default('Menunggu');
            $table->timestamps();

            $table->foreign('id_tugas')->references('id')->on('tugas')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_pengumpulan');
    }
};
