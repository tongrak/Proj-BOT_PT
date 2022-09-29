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

Route::group(['namespace' => 'App\Http\Controllers'], function(){
    // Homepage route
    Route::get('/', function () {return view('home');});
    // catalog route
    Route::get('/catalog', 'ProductController@show')->name('catalog.show');
    // client as guest
    Route::group(['middleware'=>['guest']], function(){
        // Registing route
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        // Login route
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    }); 
    // client as customer
    Route::group(['middleware' => ['customer']], function(){
        // Auth routing
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        // shop routing:
        // cart routing:
        Route::get('/cart', 'CartController@cart')->name('cart');
        Route::get('/add-t-cart/{cusId}', 'ProductController@addToCart')->name('add.to.cart');
        Route::delete('/remove-from-cart/{cusId}/{productId}', 'ProductController@remove')->name('remove.from.cart');
        // contact employee route:
        Route::post('/confirm-cart/{id}', 'CartController@confirm')->name('confirm.cart');
        Route::post('/confirm-payment/{id}', 'CartController@endComm')->name('confirm.payment');
    });
    // client as employee
    Route::group(['middleware'=>['employee']], function(){
        // commsion broads route:
        Route::get('/commissions', 'CommissionController@show')->name('commission.show');
        // commsion action route:
        Route::post('/confirm-commis/{id}', 'CommissionController@confirm')->name('commission.confirm');
        Route::post('/confirm-comm-end/{id}', 'CommissionController@endComm')->name('commission.end.comm');

    });


});


/**login route */
Route::get('/login',function() { return view('login');});

/**register route */
Route::get('register',function() { return view('register');});

/**register Home */
Route::get('home',function() { return view('Home');});