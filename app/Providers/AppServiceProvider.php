<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Force HTTPS when APP_ENV is not local
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }

        // Custom validation rule for current password
        Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, auth()->user()->password);
        });

        Validator::replacer('current_password', function ($message, $attribute, $rule, $parameters) {
            return 'Password saat ini tidak sesuai.';
        });

        Schema::defaultStringLength(191);
    }

    public function register(): void
    {
        //
    }
}
