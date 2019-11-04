<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Facade\Ignition\Http\Controllers\ShareReportController;
use App\Category;
use App\Option;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
       View::share('categories',Category::get());
       View::share('categories_parent',Category::where('parent_id',null)->get());
       View::share('options',Option::get());
       View::share('options_parent',Option::where('value',null)->where('parent_id',null)->get());
    }
}
