<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;



//********************************************************************************
//**************************** FREE USER NAVIGATION   ****************************
//********************************************************************************


Route::get('/home', 'App\Http\Controllers\FrontEndController@index')->name('home');


Route::get('/disclaimer', function () {
    return view('FrontEnd.pages.disclaimer');
})->name('disclaimer');
Route::get('/privacy_policy', function () {
    return view('FrontEnd.pages.privacy_policy');
})->name('privacy_policy');
Route::get('/terms_and_conditions', function () {
    return view('FrontEnd.pages.terms_and_conditions');
})->name('terms_and_conditions');
Route::get('/menu_kit_pages', function () {
    return view('FrontEnd.pages.menu_kit_pages');
})->name('menu_kit_pages');
Route::get('/online_booking', function () {
    return view('FrontEnd.pages.online_booking');
})->name('online_booking');
Route::get('/visiting_hours', function () {
    return view('FrontEnd.pages.visiting_hours');
})->name('visiting_hours');





Route::get('/products', function () {
    return view('FrontEnd.pages.products');
})->name('products');
Route::get('/all_products', function () {
    return view('FrontEnd.pages.menu_products');
})->name('all_products');
/*
Route::get('/home', function () {
    return view('FrontEnd.pages.home');
});
*/





Route::get('/order_complete', function () {
    return view('FrontEnd.checkOut.order_complete');
})->name('order_complete');



//***********************     SEARCH ******************************
//Route::post('/search', 'App\Http\Controllers\FrontEndController@search')->name('search');products
Route::get('/search', 'App\Http\Controllers\FrontEndController@search')->name('search');
Route::get('/products', 'App\Http\Controllers\FrontEndController@products')->name('products');
Route::get('/search/{offer}', 'App\Http\Controllers\FrontEndController@search_offers')->name('search.offers');

Route::get('/images', 'App\Http\Controllers\FrontEndController@images')->name('images');

Route::get('/catering', 'App\Http\Controllers\FrontEndController@catering')->name('catering');
Route::get('/menu', 'App\Http\Controllers\FrontEndController@menu')->name('menu');
Route::get('/contact_us', 'App\Http\Controllers\FrontEndController@contact_us')->name('contact_us');
Route::get('/menu/download/part/{slug}', 'App\Http\Controllers\FrontEndController@download_menu_part')->name('download_menu');
Route::get('/category/dish/show/{id}', 'App\Http\Controllers\FrontEndController@dish_show')->name('category_dish');
Route::get('/category/dish/shows/{id}/{dish_id}', 'App\Http\Controllers\FrontEndController@dish_shows')->name('category_dishs');
Route::get('/banquet_facility', 'App\Http\Controllers\FrontEndController@gallery_show')->name('banquet_facility');

//****************************  CART ROUTE START HERE   ****************************

Route::post('/add/cart', 'App\Http\Controllers\CartController@insert')->name('add_to_cart');
Route::get('/cart/show', 'App\Http\Controllers\CartController@show')->name('cart_show');
Route::get('/cart/remove/{rowId}', 'App\Http\Controllers\CartController@remove')->name('remove_item');
Route::post('/cart/update/{rowId}', 'App\Http\Controllers\CartController@update')->name('update_cart');


//*********************************************************************************
//**************************** LOGIN USER NAVIGATION   ****************************
//*********************************************************************************

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {

    //****************  ORDER COMPLETE 

    Route::get('/order_complete', 'App\Http\Controllers\Order_completeController@index')->name('order_complete');

    //****************************  SHIPPING   ****************************

    Route::get('/shipping', 'App\Http\Controllers\CustomerController@shipping')->name('add_informations');
    Route::get('/selectProducts', 'App\Http\Controllers\CustomerController@select_products');
    Route::post('/shipping/store', 'App\Http\Controllers\CustomerController@save')->name('store_shipping');


    //***********************     CHECKOUT START HERE  ******************************

    Route::get('/checkout/payment', 'App\Http\Controllers\CheckOutController@payment')->name('checkout_payment'); //VERS MODE DE PAIEMENT
    Route::post('/checkout/new/order', 'App\Http\Controllers\CheckOutController@order')->name('new_order'); //LE CONTROLLER
    Route::get('/stripe/payment', 'App\Http\Controllers\CheckOutController@stripe'); //CAS DU PAYEMENT PAR CARTE :: PAGE POUR ENREGISTRER LES DONNEES DE LA CARTE (SUITE)
    //Route::get('/checkout/order/complete', 'App\Http\Controllers\CheckOutController@complete')->name('order_complete'); //CAS DU PAYEMENT DIRECT

    //***********************     STRIPE PAYMENT ONLY  ******************************

    Route::post('/Stripe-payment', 'App\Http\Controllers\StripeController@handlePost')->name('stripe.payment');
    Route::get('/Stripe-payment', 'App\Http\Controllers\StripeController@handleGet');

    Route::get('/checkout/payment', 'App\Http\Controllers\CheckOutController@payment')->name('checkout_payment');

    //***********************     PAYPAL PAYMENT ONLY  ******************************

    Route::post('/Paypal-payment', 'App\Http\Controllers\PaypalController@handlePost')->name('paypal.payment');
    Route::get('/Paypal-payment', 'App\Http\Controllers\PaypalController@handleGet')->name('make.payment');
});


//******************************************************************************
//**************************** DEFAULT NAVIGATION   ****************************
//******************************************************************************

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
