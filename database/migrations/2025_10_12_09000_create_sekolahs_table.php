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
        Schema::create('sekolahs', function (Blueprint $table) {

            $table->id();
            $table->string('nama', 150);
            $table->string('npsn', 50)->unique();
            $table->string('alamat', 150);
            $table->string('kontak', 100);

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
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
