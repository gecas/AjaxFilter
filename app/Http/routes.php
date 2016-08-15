<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Product;


Route::get('/admin', function(){
	return view('admin.index');
});

// Route::get('edit', function(){
// 	$products = Product::all();
// 	foreach ($products as $product) {
// 		$product->image_path = '/images/';
// 		$product->save();
// 	}
// });

Route::get('/', 'HomeController@index');
Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');
Route::resource('colors', 'ColorsController');
Route::resource('sizes', 'SizesController');

//Route::group(['prefix' => 'ajax'], function () {
    Route::post('/ajax/products/filtered','ProductsController@fetchColorProducts');
    Route::get('/ajax/products','ProductsController@fetchAllProducts');
//});

// Route::auth();

