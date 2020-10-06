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
Auth::routes(['verify' => true]);
Route::namespace('Store')->name('store.')->group( function() {
    //Home
    Route::get('/', 'HomeController@index')->name('home');

    //Products
    Route::get('categories/{category}/sub_categories/{sub_category}', 'ProductController@index')->name('products');
    Route::get('product/{id}', 'ProductController@show')->name('product');

    //Blogs
    Route::get('blog_categories/{blog_category}', 'BlogController@index')->name('blogs');
    Route::get('blog/{id}', 'BlogController@show')->name('blog');

    //Cart
    Route::get('cart', 'CartController@index')->name('cart');
    Route::get('checkout', 'CartController@checkout')->name('checkout');

    //Others
    Route::view('contact', 'store.others.contact')->name('contact');
    Route::view('about', 'store.others.about')->name('about');

});

Route::prefix('admin')->namespace('Manager')->name('manager.')->group( function() {
    //Dashboard
    Route::get('/','DashboardController@index')->name('dashboard');
    
    //Products
    Route::prefix('products')->name('products.')->group( function() {
        Route::resource('/categories','CategoryController');
        Route::resource('/sub_categories','SubCategoryController');
    });
    Route::resource('products','ProductController');
    
    //Others
    Route::prefix('others')->name('others.')->group( function() {
        Route::resource('/countries','CountryController');
        Route::resource('/brands','BrandController');
        Route::resource('/sizes','SizeController');
    });

    //Blogs
    Route::prefix('blogs')->name('blogs.')->group( function() {        
        Route::resource('/blog_categories','BlogCategoryController');
    });
    Route::resource('blogs','BlogController');

    //Users
    Route::resource('users','UserController');
    
} );