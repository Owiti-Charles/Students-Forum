<?php

namespace App\Providers;

use App\Event;
use App\Notice;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
        view()->composer('frontend.includes.noticesidebar', function ($view){
            $view->with('noticeArchives', Notice::archives());
        });
        view()->composer('frontend.includes.eventsidebar',function($view){
           $view->with('archives', Event::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
