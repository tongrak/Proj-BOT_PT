<?php

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

    Route::get('/', 'ProductController@showHome')->name('home.show');

    Route::middleware('isGuest')->group(function() {
        
        Route::get('/test/login', 'LoginController@showLogin')->name('test.showLogin');
        Route::post('/test/login', 'LoginController@login')->name('test.login');

        Route::get('/test/register', 'RegisterController@showTest')->name('test.showRegister');
        Route::post('/test/register', 'RegisterController@registerTest')->name('test.register');

        // Registing route
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        
        // Login route
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::middleware('isUser')->group(function() {
        // cart routing:
        Route::get('/cart', 'CartController@cart')->name('cart');
        Route::get('/add-t-cart/{cusId}', 'ProductController@addToCart')->name('add.to.cart');
        Route::delete('/remove-from-cart/{cusId}/{productId}', 'ProductController@remove')->name('remove.from.cart');

    });

    Route::middleware('isAdmin')->group(function() {
        // contact employee route:
        Route::post('/confirm-cart/{id}', 'CartController@confirm')->name('confirm.cart');
        Route::post('/confirm-payment/{id}', 'CartController@endComm')->name('confirm.payment');

        // commsion action route:
        Route::post('/confirm-commis/{id}', 'CommissionController@confirm')->name('commission.confirm');
        Route::post('/confirm-comm-end/{id}', 'CommissionController@endComm')->name('commission.end.comm');
    });

    Route::middleware('isUser', 'isAdmin')->group(function() {
        // catalog route
        Route::get('/catalog', 'ProductController@show')->name('catalog.show');
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/test/logout', 'LogoutController@perform')->name('test.logout');
    });

    // Testing
    Route::get('/test', 'TestController@show')->name('test.show');
    Route::get('/test/create', 'TestController@showCreate')->name('test.show.create');
    Route::post('/test/create', 'TestController@create')->name('test.create');
    Route::get('/test/home', 'HomeController@show')->name('test.home');

    // Homepage route
    Route::get('/home', function () {return view('home');});
    // client as guest
    Route::group(['middleware'=>['guest']], function(){
    }); 
    // client as customer

    Route::group(['middleware' => ['customer']], function(){
        // Auth routing

        // shop routing:

    });
    // client as employee
    Route::group(['middleware'=>['employee']], function(){
        // commsion broads route:
        Route::get('/commissions', 'CommissionController@show')->name('commission.show');
    });


});
