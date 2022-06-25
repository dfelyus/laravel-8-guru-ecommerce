<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\Dishes;
use App\Models\Offers;
use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        $globalSettings = Settings::where('setting_status', 1)->get()->first();

        $globalOffers = Offers::with('getOffersRelationDishes')->where('offer_status', 1)->get();
        $globaldishes = Dishes::with('getCategoryRelation')->get();
        $globalcategories = Categories::all();

        /*
        View::composer('FrontEnd.include.banner', function ($view) {

            
            $view->with('categories', $settings);
            //$view->compact('settings');
        });
        */


        View::share('set_', $globalSettings);
        View::share('cate_', $globalcategories);
        View::share('dish_', $globaldishes);
        View::share('offer_', $globalOffers);
    }
}
