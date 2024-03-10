<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Components\Alert;
use Illuminate\Support\Facades\Blade;
// use  App\View\Components\Inputs\Button;
use Illuminate\Pagination\Paginator;

// use  App\View\Components\Form\Button as FormButton;
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

        Blade::component('package-alert', Alert::class);
      //  Blade::component('button',  FormButton::class);
      //  Blade::component('button',  FormButton::class);
       Paginator::useBootstrap();

    }
    }

