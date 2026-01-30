<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

class StaticFilesLogProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Log::info('=== APPLICATION STARTED ===', [
            'environment' => config('app.env'),
            'debug' => config('app.debug'),
            'timestamp' => now()
        ]);

        Log::info('=== STATIC FILES CONFIGURATION ===', [
            'filesystem_disk' => config('filesystems.default'),
            'storage_path' => storage_path(),
            'public_path' => public_path()
        ]);

        // Log semua akses ke public folder
        if (app()->environment('production')) {
            Log::info('=== RUNNING IN PRODUCTION ===', [
                'app_url' => config('app.url'),
                'https_forced' => true
            ]);
        }
    }
}
