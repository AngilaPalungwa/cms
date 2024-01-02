<?php

namespace App\Providers;

use App\Services\SettingService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SettingService::class,function (){
            return new  SettingService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer(['backend.common.sidebar', 'backend.common.header'], function ($view){
            $settings = app(SettingService::class);
            $systemName =  $settings->getSystemName();
            $view->with(compact('systemName'));
        });
    }
}
