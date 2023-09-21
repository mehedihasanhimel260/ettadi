<?php
namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        view()->composer('*', function ($view) {
            $setting = Settings::first();
            $settings = $setting->website_title;
            $wesitetitle_1 = Str::substr($settings, 0, 1);
            $wesitetitle_2 = Str::substr($settings, 1);

            // Pass the data to the view as an associative array
            $view->with([
                'setting' => $settings,
                'wesitetitle_1' => $wesitetitle_1,
                'wesitetitle_2' => $wesitetitle_2,
            ]);
        });
    }
}
