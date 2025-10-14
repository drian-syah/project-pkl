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
            $table->foreignId('pembimbing_id')->constrained('pembimbing')->onDelete('cascade');
            $table->string('judul', 255);
            $table->text('deskripsi')->nullable();
            $table->timestamp('tenggat')->nullable();
            $table->enum('status', ['pending', 'sudah dinilai'])->default('pending');
            $table->timestamp('created_date')->nullable();
            $table->integer('created_id')->nullable();
            $table->integer('updated_id')->nullable();
            $table->timestamp('updated_date')->nullable();
            $table->integer('deleted_id')->nullable();
            $table->timestamp('deleted_date')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
