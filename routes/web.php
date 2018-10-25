<?php

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
Route::group(['namespace' => 'Page'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('contact', 'HomeController@contact')->name('contact');
    Route::post('handlecontact', 'HomeController@handleContact')->name('handlecontact');
    Route::get('about', 'HomeController@about')->name('about');
    Route::get('question', 'HomeController@question')->name('question');

    Route::get('detail/{id}', 'ProductController@detail')->name('detail');
    Route::get('category/{id}', 'ProductController@categories')->name('categories');
    Route::get('search', 'ProductController@search')->name('search');

    Route::get('cart', 'CartController@index')->name('cart');
    Route::get('addcart/{id}', 'CartController@add')->name('cart.add');
    Route::get('updatecart', 'CartController@update')->name('cart.update');
    Route::get('removecart/{id}', 'CartController@remove')->name('cart.remove');
    Route::get('checkout','CartController@checkout')->name('checkout');
    Route::post('handlecheckout', 'CartController@handleCheckout')->name('handlecheckout');

    Route::get('post', 'PostController@index')->name('post');
    Route::get('post/{id}', 'PostController@content')->name('post.content');

    Route::get('infomation', 'UserController@index')->name('info');
    Route::post('update', 'UserController@update')->name('info.update');

    Route::get('orderdetail/{id}', 'OrderController@detail')->name('order.detail');
    Route::get('removeorder/{id}', 'OrderController@remove')->name('order.remove');
    Route::get('order', 'OrderController@index')->name('order');
});

Route::group(['namespace' => 'Backend', 'as' => 'admin.', 'prefix' => '/admin', 'middleware' => 'checkLogin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('update', 'DashboardController@update')->name('update');
    Route::get('question', 'DashboardController@question')->name('question');
    Route::get('contact', 'DashboardController@contact')->name('contact');
    Route::post('reply', 'DashboardController@reply')->name('contact.reply');

    Route::get('category', 'CategoryController@index')->name('category');
    Route::post('addcategory', 'CategoryController@add')->name('category.add');
    Route::post('deletecategory', 'CategoryController@delete')->name('category.delete');
    Route::post('updatecategory/{id}', 'CategoryController@update')->name('category.update');

    Route::get('product', 'ProductController@index')->name('product');
    Route::get('addproduct', 'ProductController@add')->name('product.add');
    Route::post('addproduct', 'ProductController@handleadd')->name('product.handleadd');
    Route::post('deleteproduct', 'ProductController@delete')->name('product.delete');
    Route::get('editproduct/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('editproduct/{id}', 'ProductController@handleedit')->name('product.handleedit');

    Route::get('user', 'UserController@index')->name('user');
    Route::get('adduser', 'UserController@add')->name('user.add');
    Route::post('adduser', 'UserController@handleadd')->name('user.handleadd');
    Route::post('deleteuser', 'UserController@delete')->name('user.delete');
    Route::get('edituser/{id}', 'UserController@edit')->name('user.edit');
    Route::post('edituser/{id}', 'UserController@handleedit')->name('user.handleedit');

    Route::get('order', 'OrderController@index')->name('order');
    Route::get('detail/{id}', 'OrderController@detail')->name('order.detail');
    Route::post('deleteorder', 'OrderController@delete')->name('order.delete');
    Route::post('ship', 'OrderController@ship')->name('order.ship');
    Route::post('done', 'OrderController@done')->name('order.done');
    Route::get('editorder/{id}', 'OrderController@edit')->name('order.edit');
    Route::post('editorder/{id}', 'OrderController@handleedit')->name('order.handleedit');
});
