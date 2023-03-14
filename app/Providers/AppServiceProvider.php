<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositry\Interface\BookRepositryInterface;
use App\Repositry\BookFunLogics;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(BookRepositryInterface::class,BookFunLogics::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    Paginator::useBootstrapFive();
    Paginator::useBootstrapFour();

    
    }
}
