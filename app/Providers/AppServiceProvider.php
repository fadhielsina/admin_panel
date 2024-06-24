<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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
        Gate::define('super-admin', function () {
            return Auth::user()->roles->pluck('name')[0] === 'super-admin';
        });

        Gate::define('admin', function () {
            return Auth::user()->roles->pluck('name')[0] === 'admin';
        });
    }
}
