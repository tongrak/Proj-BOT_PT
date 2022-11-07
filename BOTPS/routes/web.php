<?php

use App\Http\Controllers\CommissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function(){


    // Homepage route
    
    Route::get('/catalog', 'ProductController@showCatalog')->name('catalog.show');
    Route::get('/catalog/search{term}', 'ProductController@showSearch')->name('catalog.show.search');
    Route::get('/catalog/category={category}', 'ProductController@showByCategory')->name('catelog.show.category');
    
    //this route is for 'guest' only
    Route::middleware('isGuest')->group(function() {
        

        // Route::get('/test', function () {return view('login2');});
        // Route::get('/test/home', 'TestController@show')->name('test.home');
        
        
        // Route::get('/test/login', 'LoginController@showLogin')->name('test.showLogin');
        // Route::post('/test/login', 'LoginController@login')->name('test.login');
        
        // Route::post('/test/register', 'RegisterController@registerTest')->name('test.register');
        // Route::get('/test/register', 'RegisterController@showTest')->name('test.showRegister');
        
        // Registing route
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        
        // Login route
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    // this route is for 'user' only
    Route::middleware('isUser')->group(function() {
        // cart routing:
        Route::get('/cart', 'CartController@showCartDetail')->name('cart');
        Route::get('/add-to-cart/{pId}', 'CartController@addToCart')->name('add.to.cart');
        Route::delete('/remove-from-cart/{pId}', 'CartController@removeInCart')->name('remove.from.cart');
        
        Route::post('/confirm-order', 'CommissionController@customerConfirm')->name('confirm.order');
        Route::post('/cancel-order', 'CommissionController@customerCancel')->name('cancel.order');
    });
    
    // this route is for 'admin' only
    Route::middleware('isAdmin')->group(function() {
        // contact employee route:
        // TODO: Yet to implement
        // Route::post('/confirm-cart/{id}', 'CartController@confirm')->name('confirm.cart');
        
        // commission action route:
        Route::post('/confirm-commit/{customerNum}', 'CommissionController@salerepConfirm')->name('commission.confirm');
        Route::get('/commissions', 'CartController@showCartOfSaleRep')->name('commission.show');
        
        // use for canceling order
        Route::post('/admin-cancel-order/{cID}', 'CommissionController@adminCancel')->name('admin.cancel.order');

        // use for denied order
        Route::post('/admin-denied-order/{cID}', 'CommissionController@adminDenied')->name('admin.denied.order');

        // use for insert SaleRep to customer
        Route::post('admin-add-sale/{cID}', 'CommissionController@insertSaleRep')->name('admin.add.sale');
    });
    
    //this route is for 'user or admin' only
    Route::middleware('isUserOrAdmin')->group(function() {
        // catalog route
        
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        // Route::get('/test/logout', 'LogoutController@perform')->name('test.logout');
    });
    
    // this route is for 'guest or admin' only
    Route::middleware('isGuestOrUser')->group(function() {
        Route::get('/home', 'ProductController@showHome')->name('home.show');
        Route::get('/', 'ProductController@showHome')->name('home.show');
    });
    // Testing
    // Route::get('/test', 'TestController@show')->name('test.show');
    // Route::get('/test/create', 'TestController@showCreate')->name('test.show.create');
    // Route::post('/test/create', 'TestController@create')->name('test.create');
});
