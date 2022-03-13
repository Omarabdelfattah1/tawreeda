<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::all()->mapWithKeys(function ($item, $key) {
                return [$item['key'] => $item['value']];
            })->toArray();

        view()->share([
            'settings' => $settings
        ]);
        Schema::defaultStringLength(191);
    }
}
