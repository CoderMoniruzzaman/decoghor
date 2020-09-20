<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home/', 'HomeController@index')->name('home');

//User Route
Route::get('/user/users', 'User\UserController@index');

//Product Route
Route::get('product', 'product\ProductController@index');
Route::get('/product/create', 'product\ProductController@createview');
Route::post('product/store', 'product\ProductController@store');
Route::get('product/view/{id}', 'product\ProductController@show');
Route::get('change/status/product/{id}', 'product\ProductController@changestatus');
Route::get('product/edit/{id}', 'product\ProductController@edit');
Route::post('/product/update', 'product\ProductController@update');
Route::post('/edit/product/single/{single_photo}/{single_id}','product\ProductController@editproductsingle');
Route::get('/delete/product/single/{single_photo}/{single_id}','product\ProductController@deleteproductsingle');

//Category Route
Route::resource('category', 'product\CategoryController');
Route::get('change/status/category/{id}', 'product\CategoryController@changestatus');

//sub Category Route
Route::resource('subcategory', 'product\SubCategoryController');
Route::get('change/status/subcategory/{id}', 'product\SubCategoryController@changestatus');

//Brand Route
Route::resource('brand', 'product\BrandController');
Route::get('change/status/brand/{id}', 'product\BrandController@changestatus');

//Unit Route
Route::resource('unit', 'product\UnitController');
Route::get('change/status/unit/{id}', 'product\UnitController@changestatus');

//Tax Route
Route::resource('tax', 'product\TaxController');
Route::get('change/status/tax/{id}', 'product\TaxController@changestatus');

