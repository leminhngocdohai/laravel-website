<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'PostController@index')->name('home');



// Route::resource('posts', 'PostController');
// Route::resource('users', 'UserController');
// Route::resource('roles', 'RoleController');
// Route::resource('permissions', 'PermissionController');
// Route::get('login', 'admin\AdminController@logout')->name('admin.logout');
//////////////////////
Route::group(['prefix' => 'auth','namespace'=>'admin\auth'], function () {
    Route::get('login', 'LoginController@login')->name('admin.login');

});

Route::group(['prefix' => 'admin','namespace'=>'admin',
    'middleware'=>['auth','clearance']
    ], function () {
    Route::get('', 'AdminController@index')->name('admin.index');
    //category
    Route::group(['prefix' => 'category','namespace'=>'Category'], function () {
        Route::get('', 'CategoryController@index')->name('category.index');
        Route::post('', 'CategoryController@store')->name('category.store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('update/{id}', 'CategoryController@update')->name('category.update');
    });
    //product
    Route::group(['prefix' => 'product','namespace'=>'Product'], function () {
        Route::get('', 'ProductController@index')->name('product.index');
        Route::get('create', 'ProductController@create')->name('product.create');
        Route::post('store', 'ProductController@store')->name('product.store');
        Route::get('edit/{id}','ProductController@edit' )->name('product.edit');
        Route::post('update/{id}','ProductController@update' )->name('product.update');
    });
    //user
    Route::group(['prefix' => 'user','namespace'=>'User','middleware'=>'isAdmin'], function () {
        Route::get('', 'UserController@index')->name('users.index');
        Route::get('create', 'UserController@create')->name('users.create');
        Route::post('store', 'UserController@store')->name('users.store');
        Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
        Route::post('update/{id}', 'UserController@update')->name('users.update');
        Route::get('delete/{id}', 'UserController@destroy')->name('users.destroy');
        Route::get('show', 'UserController@show')->name('users.show');
    });
    //role
    Route::group(['prefix' => 'permissions','namespace'=>'Permission'], function () {
        Route::get('', 'PermissionController@index')->name('permissions.index');
        Route::get('create', 'PermissionController@create')->name('permissions.create');
        Route::post('store', 'PermissionController@store')->name('permissions.store');
        Route::get('edit/{id}', 'PermissionController@edit')->name('permissions.edit');
        Route::post('update/{id}', 'PermissionController@update')->name('permissions.update');
        Route::get('delete/{id}', 'PermissionController@destroy')->name('permissions.destroy');
        Route::get('show', 'PermissionController@show')->name('permissions.show');
    });
    //permission
    Route::group(['prefix' => 'roles','namespace'=>'Role'], function () {
        Route::get('', 'RoleController@index')->name('roles.index');
        Route::get('create', 'RoleController@create')->name('roles.create');
        Route::post('store', 'RoleController@store')->name('roles.store');
        Route::get('edit/{id}', 'RoleController@edit')->name('roles.edit');
        Route::post('update/{id}', 'RoleController@update')->name('roles.update');
        Route::get('delete/{id}', 'RoleController@destroy')->name('roles.destroy');
        Route::get('show', 'RoleController@show')->name('roles.show');
    });
    //order
    Route::group(['prefix' => 'order','namespace'=>'Order'], function () {
        Route::get('', 'OrderController@index')->name('order.index');
        Route::get('detail/{id}', 'OrderController@detail')->name('order.detail');
        Route::get('update/{id}', 'OrderController@update')->name('order.update');
        Route::get('processed', 'OrderController@processed')->name('order.processed');
    });
});


Route::group(['prefix' => 'client','namespace'=>'client'], function () {
    Route::get('', 'ClientController@index')->name('client.index');

    //cart
    Route::group(['prefix' => 'cart','namespace'=>'Cart'], function () {
        Route::get('', 'CartController@index')->name('cart.index');
        Route::get('checkout', 'CartController@checkout')->name('cart.checkout');
        Route::get('complete', 'CartController@complete')->name('cart.complete');
        Route::post('addcart', 'CartController@addcart')->name('cart.addcart');
        Route::get('update/{rowId}/{qty}', 'CartController@update')->name('cart.update');
        Route::get('delete/{rowId}', 'CartController@delete')->name('cart.delete');
    });
    //product
    Route::group(['prefix' => 'product','namespace'=>'Product'], function () {
        Route::get('shop', 'ProductController@shop')->name('product.shop');
        Route::get('detail/{slug}.html', 'ProductController@detail')->name('product.detail');
    });
    //
    Route::get('about', 'ClientController@about')->name('client.about');
    Route::get('contact', 'ClientController@contact')->name('client.contact');
});
