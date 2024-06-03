<?php

namespace App\Providers;

use App\class\Day;
use Illuminate\Support\ServiceProvider;

class DayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        app()->bind('days',function(){
            return new Day;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
