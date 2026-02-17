<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
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
        // Share settings with all views
        // We use cache to avoid querying the database on every page load
        $settings = Cache::rememberForever('site_settings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        View::share('settings', $settings);
    }
}
