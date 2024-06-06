<?php

namespace App\Providers;

use App\Facades\DemoFacade;

use Illuminate\Support\ServiceProvider;

class MyFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        
        $this->app->bind('myfacade',function($app){
            
            return new DemoFacade;
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
