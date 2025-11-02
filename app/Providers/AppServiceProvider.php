<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // === Gate untuk Admin ===
         Gate::define('isAdmin', function (User $user) {
            return $user->role === 'Admin';
        });

        // === Gate untuk Pembimbing ===
        Gate::define('isPembimbing', function (User $user) {
            return $user->role === 'Pembimbing';
        });

        // === Gate untuk Siswa ===
        Gate::define('isSiswa', function (User $user) {
            return $user->role === 'Siswa';
        });

        // === Gate untuk Sekolah
        Gate::define('isSekolah', function (User $user){
            return $user->role === 'Sekolah';
        });
    }
}
