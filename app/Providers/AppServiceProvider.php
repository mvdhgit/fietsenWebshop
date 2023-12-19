<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
// app/Providers/AppServiceProvider.php



    public function boot()
    {
        Validator::extend('dutch_zipcode', function ($attribute, $value, $parameters, $validator) 
        {
            // Regular expression pattern for Dutch ZIP code (e.g., "1234 AB" or "1234AB")
            $pattern = '/^[1-9][0-9]{3}\s?[A-Z]{2}$/i';

            // Check if the value matches the pattern
            return preg_match($pattern, $value);
        });

        // Optionally, you can define a custom error message for the rule
        Validator::replacer('dutch_zipcode', function ($message, $attribute, $rule, $parameters) 
        {
            return str_replace(':attribute', $attribute, 'The :attribute field must be a valid Dutch ZIP code.');
        });
    }

}
