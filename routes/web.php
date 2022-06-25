<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth', function () {
    return view('auth.login');
});

//Route::get('admin/category/add', 'App\Http\Controllers\CategoryController@index')->name('show_cate_table');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('BackEnd.Home.index');
})->name('dashboard');


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
