<?php

use Illuminate\Support\Facades\Route;



//Route::get('admin/category/add', 'App\Http\Controllers\CategoryController@index')->name('show_cate_table');


Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'auth.login')->name('login');
        Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'store']);
    });

    //****************************************************************************
    //****************************  ADMIN NAVIGATION   ****************************
    //****************************************************************************

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'destroy'])->name('logout');
        //Route::view('/home', 'home')->name('home');//dashbroad
        //Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
        Route::get('/home', [App\Http\Controllers\Admin\AuthController::class, 'home'])->name('home');


        Route::group(['prefix' => 'offers'], function () {
            /*========================   SETTING START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\OfferController@index');
            Route::post('/save', 'App\Http\Controllers\OfferController@save');
            Route::get('/manage', 'App\Http\Controllers\OfferController@manage');
            Route::get('edit/{id}', 'App\Http\Controllers\OfferController@edit');
            Route::get('/active/{id}', 'App\Http\Controllers\OfferController@active');
            Route::get('/inactive/{id}', 'App\Http\Controllers\OfferController@inactive');
            Route::get('/delete/{id}', 'App\Http\Controllers\OfferController@delete');
            Route::post('/update/{id}', 'App\Http\Controllers\OfferController@update');

            /*========================    setting end here    ===========================*/
        });



        Route::group(['prefix' => 'setting'], function () {
            /*========================   SETTING START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\SettingController@index')->name('show_set_table');
            Route::post('/save', 'App\Http\Controllers\SettingController@save_settings')->name('cate_set');
            Route::get('/manage', 'App\Http\Controllers\SettingController@setting_manage')->name('manage_set');
            Route::get('/active/{id}', 'App\Http\Controllers\SettingController@activeSetting')->name('active_set');
            Route::get('/Inactive/{id}', 'App\Http\Controllers\SettingController@InactiveSetting')->name('Inactive_set');
            Route::get('/delete/{id}', 'App\Http\Controllers\SettingController@setting_delete')->name('set_delete');
            Route::post('/update/{id}', 'App\Http\Controllers\SettingController@update_setting')->name('set_update');

            /*========================    setting end here    ===========================*/
        });


        Route::group(['prefix' => 'package'], function () {
            /*========================   SETTING START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\PackageController@index')->name('show_pack_table');
            Route::post('/save', 'App\Http\Controllers\PackageController@save')->name('cate_pack');
            Route::get('/manage', 'App\Http\Controllers\PackageController@manage')->name('manage_pack');
            Route::get('edit/{id}', 'App\Http\Controllers\PackageController@edit')->name('edit_pack');
            Route::get('/active/{id}', 'App\Http\Controllers\PackageController@active')->name('active_pack');
            Route::get('/Inactive/{id}', 'App\Http\Controllers\PackageController@Inactive')->name('Inactive_pack');
            Route::get('/delete/{id}', 'App\Http\Controllers\PackageController@delete')->name('pack_delete');
            Route::post('/update/{id}', 'App\Http\Controllers\PackageController@update')->name('pack_update');

            /*========================    setting end here    ===========================*/
        });

        Route::group(['prefix' => 'wedding_deluxe'], function () {
            /*========================   SETTING START HERE    ===========================*/

            Route::get('/add/{selectdb}', 'App\Http\Controllers\WeddingDeluxeController@index')->name('show_wed');

            Route::post('/save/{selectdb}', 'App\Http\Controllers\WeddingDeluxeController@save')->name('save_wed');
            Route::get('/manage/{selectdb}', 'App\Http\Controllers\WeddingDeluxeController@manage')->name('manage_wed');

            Route::get('/delete/{selectdb}/{id}', 'App\Http\Controllers\WeddingDeluxeController@delete')->name('delete_wed');
            Route::post('/update/{selectdb}', 'App\Http\Controllers\WeddingDeluxeController@update')->name('update_wed');

            /*========================    setting end here    ===========================*/
        });


        Route::group(['prefix' => 'wedding_standard'], function () {
            /*========================   SETTING START HERE    ===========================*/

            Route::get('/add/{selectdb}', 'App\Http\Controllers\WeddingStandardController@index')->name('show_wed');

            Route::post('/save/{selectdb}', 'App\Http\Controllers\WeddingStandardController@save')->name('save_wed');
            Route::get('/manage/{selectdb}', 'App\Http\Controllers\WeddingStandardController@manage')->name('manage_wed');

            Route::get('/delete/{selectdb}/{id}', 'App\Http\Controllers\WeddingStandardController@delete')->name('delete_wed');
            Route::post('/update/{selectdb}', 'App\Http\Controllers\WeddingStandardController@update')->name('update_wed');

            /*========================    setting end here    ===========================*/
        });


        Route::group(['prefix' => 'wedding_gold'], function () {
            /*========================   WEDDING GOLD START HERE    ===========================*/

            Route::get('/add/{selectdb}', 'App\Http\Controllers\WeddingGoldController@index')->name('show_wed');

            Route::post('/save/{selectdb}', 'App\Http\Controllers\WeddingGoldController@save')->name('save_wed');
            Route::get('/manage/{selectdb}', 'App\Http\Controllers\WeddingGoldController@manage')->name('manage_wed');

            Route::get('/delete/{selectdb}/{id}', 'App\Http\Controllers\WeddingGoldController@delete')->name('delete_wed');
            Route::post('/update/{selectdb}', 'App\Http\Controllers\WeddingGoldController@update')->name('update_wed');

            /*========================    gold end here    ===========================*/
        });


        Route::group(['prefix' => 'wedding_optional'], function () {
            /*========================   SETTING START HERE    ===========================*/

            Route::get('/add/{selectdb}', 'App\Http\Controllers\WeddingOptionalController@index')->name('show_wed');

            Route::post('/save/{selectdb}', 'App\Http\Controllers\WeddingOptionalController@save')->name('save_wed');
            Route::get('/manage/{selectdb}', 'App\Http\Controllers\WeddingOptionalController@manage')->name('manage_wed');

            Route::get('/delete/{selectdb}/{id}', 'App\Http\Controllers\WeddingOptionalController@delete')->name('delete_wed');
            Route::post('/update/{selectdb}', 'App\Http\Controllers\WeddingOptionalController@update')->name('update_wed');

            /*========================    setting end here    ===========================*/
        });




        Route::group(['prefix' => 'category'/*,'as'=>'categorie.'*/], function () {
            /*========================   CATEGORY START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\CategoryController@index')->name('show_cate_table');
            Route::post('/save', 'App\Http\Controllers\CategoryController@save')->name('cate_save');
            Route::get('/manage', 'App\Http\Controllers\CategoryController@manage')->name('manage_cate');
            Route::get('/active/{id}', 'App\Http\Controllers\CategoryController@active')->name('active_cate');
            Route::get('/Inactive/{id}', 'App\Http\Controllers\CategoryController@Inactive')->name('Inactive_cate');
            Route::get('/delete/{id}', 'App\Http\Controllers\CategoryController@delete')->name('cate_delete');
            Route::post('/update/{id}', 'App\Http\Controllers\CategoryController@update')->name('cate_update');

            /*========================    cetegory end here    ===========================*/
        });


        Route::group(['prefix' => 'wedding'/*,'as'=>'dish.'*/], function () {
            /*========================   WEDDING START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\WeddingController@index')->name('show_Dish_add_table');
            Route::post('/save', 'App\Http\Controllers\WeddingController@save')->name('Dish_save');
            Route::get('/manage', 'App\Http\Controllers\WeddingController@manage')->name('Dish_manage');
            Route::get('/delete/{id}', 'App\Http\Controllers\WeddingController@delete')->name('Dish_delete');
            Route::post('update/{id}', 'App\Http\Controllers\WeddingController@update')->name('Dish_update');

            /*========================    contact end here    ===========================*/
        });


        Route::group(['prefix' => 'tray'/*,'as'=>'categorie.'*/], function () {
            /*========================   CATEGORY START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\TrayController@index')->name('show_cate_table');
            Route::post('/save', 'App\Http\Controllers\TrayController@save')->name('cate_save');
            Route::get('/manage', 'App\Http\Controllers\TrayController@manage')->name('manage_cate');
            Route::get('/active/{category_id}', 'App\Http\Controllers\TrayController@active')->name('active_cate');
            Route::get('/Inactive/{category_id}', 'App\Http\Controllers\TrayController@Inactive')->name('Inactive_cate');
            Route::get('/delete/{category_id}', 'App\Http\Controllers\TrayController@delete')->name('cate_delete');
            Route::post('/update/{category_id}', 'App\Http\Controllers\TrayController@update')->name('cate_update');

            /*========================    cetegory end here    ===========================*/
        });




        Route::group(['prefix' => 'delivery'/*,'as'=>'deliveri.'*/], function () {
            /*========================   DELIVERY BOY START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\deliverBoyController@index')->name('show_deliveryBoy_add_table');
            Route::post('/save', 'App\Http\Controllers\deliverBoyController@save_boy')->name('delivery_save');
            Route::get('/manage', 'App\Http\Controllers\deliverBoyController@boy_manage')->name('delivery_boy_manage');
            Route::get('/delete/{delivery_boy_id}', 'App\Http\Controllers\deliverBoyController@boy_delete')->name('delivery_boy_delete');
            Route::get('/activeBoy/{delivery_boy_id}', 'App\Http\Controllers\deliverBoyController@activeBoy')->name('active_Boy');
            Route::get('/InactiveBoy/{delivery_boy_id}', 'App\Http\Controllers\deliverBoyController@InactiveBoy')->name('Inactive_Boy');
            Route::post('/update/{delivery_boy_id}', 'App\Http\Controllers\deliverBoyController@updateBoy')->name('boy_update');

            /*========================    delivery Boy end here    ===========================*/
        });


        Route::group(['prefix' => 'coupon'/*,'as'=>'coupons.'*/], function () {
            /*========================   COUPON START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\CouponController@index')->name('show_Coupon_add_table');
            Route::post('/save', 'App\Http\Controllers\CouponController@save_coupon')->name('Coupon_save');
            Route::get('/manage', 'App\Http\Controllers\CouponController@coupon_manage')->name('Coupon_manage');
            Route::get('/delete/{coupon_id}', 'App\Http\Controllers\CouponController@coupon_delete')->name('Coupon_delete');
            Route::get('/activeCoupon/{coupon_id}', 'App\Http\Controllers\CouponController@activeCoupon')->name('active_Coupon');
            Route::get('/InactiveCoupon/{coupon_id}', 'App\Http\Controllers\CouponController@InactiveCoupon')->name('Inactive_Coupon');
            Route::post('/update/{coupon_id}', 'App\Http\Controllers\CouponController@updateCoupon')->name('Coupon_update');

            /*========================    coupon end here    ===========================*/
        });




        Route::group(['prefix' => 'gallery'/*,'as'=>'dish.'*/], function () {
            /*========================   GALLERY START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\GalleryController@index')->name('show_Dish_add_table');
            Route::post('/save', 'App\Http\Controllers\GalleryController@save')->name('Dish_save');
            Route::get('/manage', 'App\Http\Controllers\GalleryController@manage')->name('Dish_manage');
            Route::get('/delete/{id}', 'App\Http\Controllers\GalleryController@delete')->name('Dish_delete');
            Route::get('/active/{id}', 'App\Http\Controllers\GalleryController@active')->name('active_Dish');
            Route::get('/Inactive/{id}', 'App\Http\Controllers\GalleryController@Inactive')->name('Inactive_Dish');
            Route::post('update/{id}', 'App\Http\Controllers\GalleryController@update')->name('Dish_update');





            /*========================    gallery end here    ===========================*/
        });



        Route::group(['prefix' => 'images'/*,'as'=>'dish.'*/], function () {
            /*========================   GALLERY START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\ImageController@index')->name('show_Dish_add_table');
            Route::post('/save', 'App\Http\Controllers\ImageController@save')->name('Dish_save');
            Route::get('/manage', 'App\Http\Controllers\ImageController@manage')->name('Dish_manage');
            Route::get('/delete/{id}', 'App\Http\Controllers\ImageController@delete')->name('Dish_delete');
            Route::get('/active/{id}', 'App\Http\Controllers\ImageController@active')->name('active_Dish');
            Route::get('/Inactive/{id}', 'App\Http\Controllers\ImageController@Inactive')->name('Inactive_Dish');
            Route::post('update/{id}', 'App\Http\Controllers\ImageController@update')->name('Dish_update');





            /*========================    gallery end here    ===========================*/
        });







        Route::group(['prefix' => 'post'/*,'as'=>'dish.'*/], function () {
            /*========================   GALLERY START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\TestimonialController@index')->name('show_Dish_add_table');
            Route::post('/save', 'App\Http\Controllers\TestimonialController@save')->name('Dish_save');
            Route::get('/manage', 'App\Http\Controllers\TestimonialController@manage')->name('Dish_manage');
            Route::get('/delete/{id}', 'App\Http\Controllers\TestimonialController@delete')->name('Dish_delete');
            Route::get('/active/{id}', 'App\Http\Controllers\TestimonialController@active')->name('active_Dish');
            Route::get('/Inactive/{id}', 'App\Http\Controllers\TestimonialController@Inactive')->name('Inactive_Dish');
            Route::post('update/{id}', 'App\Http\Controllers\TestimonialController@update')->name('Dish_update');





            /*========================    gallery end here    ===========================*/
        });






        Route::group(['prefix' => 'dish'/*,'as'=>'dish.'*/], function () {
            /*========================   DISH START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\DishController@index')->name('show_Dish_add_table');
            Route::post('/save', 'App\Http\Controllers\DishController@save_Dish')->name('Dish_save');
            Route::get('/manage', 'App\Http\Controllers\DishController@dish_manage')->name('Dish_manage');
            Route::get('/delete/{id}', 'App\Http\Controllers\DishController@dish_delete')->name('Dish_delete');
            Route::get('/activeDish/{id}', 'App\Http\Controllers\DishController@activeDish')->name('active_Dish');
            Route::get('/InactiveDish/{id}', 'App\Http\Controllers\DishController@InactiveDish')->name('Inactive_Dish');
            Route::post('update/{id}', 'App\Http\Controllers\DishController@updateDish')->name('Dish_update');

            /*========================    dish end here    ===========================*/
        });

        Route::group(['prefix' => 'contact'/*,'as'=>'dish.'*/], function () {
            /*========================   CONTACT START HERE    ===========================*/

            Route::get('/add', 'App\Http\Controllers\ContactController@index')->name('show_Dish_add_table');
            Route::post('/save', 'App\Http\Controllers\ContactController@save')->name('Dish_save');
            Route::get('/manage', 'App\Http\Controllers\ContactController@manage')->name('Dish_manage');
            Route::get('/delete/{id}', 'App\Http\Controllers\ContactController@delete')->name('Dish_delete');
            Route::get('/active/{id}', 'App\Http\Controllers\ContactController@active')->name('active_Dish');
            Route::get('/Inactive/{id}', 'App\Http\Controllers\ContactController@Inactive')->name('Inactive_Dish');
            Route::post('update/{id}', 'App\Http\Controllers\ContactController@update')->name('Dish_update');

            /*========================    contact end here    ===========================*/
        });




        Route::group(['prefix' => 'order'/*,'as'=>'coupons.'*/], function () {
            /*========================   ORDER START HERE    ===========================*/

            Route::get('/manage', 'App\Http\Controllers\OrderController@manageOrder')->name('show_order');
            Route::get('/detail/{order_id}', 'App\Http\Controllers\OrderController@viewOrder')->name('view_order');
            Route::get('/invoice/{order_id}', 'App\Http\Controllers\OrderController@viewInvoice')->name('view_order_invoice');
            Route::get('invoiceDownload/{order_id}', 'App\Http\Controllers\OrderController@downloadInvoice')->name('download_order_invoice');
            Route::get('/delete/{order_id}', 'App\Http\Controllers\OrderController@deleteOrder')->name('delete_order');

            /*========================    order end here    ===========================*/
        });
    });
});
