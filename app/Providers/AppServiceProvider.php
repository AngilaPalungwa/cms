<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
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

        view()->composer(['frontend.common.footer'], function ($view){
            $data['tags'] =Category::take(10)->get();
            $data['posts'] =  Post::orderByDesc('views')->take(5)->get();
            $view->with($data);
        });
    }
}
