<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'ProLight',
            'email' => 'aung@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('ProLight1256'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Tono',
            'email' => 'tonokaryawan@gmail.com',
            'role' => 'Pembimbing',
            'password' => Hash::make('123123123'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Bagus',
            'email' => 'baguskaryawan@gmail.com',
            'role' => 'Siswa',
            'password' => Hash::make('123123123'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Dhonan',
            'email' => 'dhonan@gmail.com',
            'role' => 'Siswa',
            'password' => Hash::make('Dhonan1256'),
            'is_tugas' => false,
        ]);
    }
}
