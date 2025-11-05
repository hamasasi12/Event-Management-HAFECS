<?php

namespace App\Providers;

use App\Http\Middleware\AdminRole;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
        Route::aliasMiddleware('role', AdminRole::class);
        Carbon::setLocale('id');
    }
}
