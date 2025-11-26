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
            'username' => 'ProLight',
            'email' => 'aung@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('ProLight1256'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Tono',
            'username' => 'Tono',
            'email' => 'tonokaryawan@gmail.com',
            'role' => 'Pembimbing',
            'password' => Hash::make('123123123'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Bagus',
            'username' => 'Bagus',
            'email' => 'baguskaryawan@gmail.com',
            'role' => 'Sekolah',
            'password' => Hash::make('123123123'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Mohammad Teguh Adriansyah',
            'username' => 'Mohammad Teguh Adriansyah',
            'email' => 'teguh@gmail.com',
            'role' => 'Pembimbing',
            'password' => Hash::make('123123123'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Dhonan',
            'username' => 'Dhonan',
            'email' => 'dhonan@gmail.com',
            'role' => 'Siswa',
            'password' => Hash::make('Dhonan1256'),
            'is_tugas' => false,
        ]);
    }
}
