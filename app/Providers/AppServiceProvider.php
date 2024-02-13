<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;
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
        Blade::if('env', function($value){ // @env('local')
           // Trả về giá trị boolean
           if(config('app.env')===$value){
            return true;
           }
           return false;

        });
    }
}
