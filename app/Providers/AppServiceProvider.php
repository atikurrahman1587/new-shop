<?php

namespace App\Providers;

use App\Models\Brand;
use Illuminate\Support\ServiceProvider;
use View;
use App\Models\category;
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

        view::composer('front-end.includes.header', function ($view) {
            $view->with('categories', category::where('publication_status', 1)->get() );
        });
        view::composer('front-end.includes.footer', function ($view) {
            $view->with('brands', Brand::where('publication_status', 1)->get() );
        });
        view::composer('front-end.category.category-content', function ($view) {
            $view->with('categories', category::where('publication_status', 1)->get() );
        });

        view::composer('front-end.category.category-content', function ($view) {
            $view->with('brands', Brand::where('publication_status', 1)->get() );
        });
    }
}
