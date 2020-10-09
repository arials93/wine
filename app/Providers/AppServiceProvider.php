<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\Category;
use App\Model\BlogCategory;
use Illuminate\Support\Facades\View;

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
        
       try {
        View::share('menu_cates', Category::with('sub_categories')->get());
        View::share('menu_blogs',BlogCategory::all());
       } catch (\Illuminate\Database\QueryException $e) {
           //Không làm gì
       }
    }
}
