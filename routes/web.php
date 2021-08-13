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
Route::group(['prefix' => '/admin', 'namespace' => '\App\Http\Controllers\Auth'], function () {
    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@postLogin');
    Route::get('/logout', 'LoginController@logout');
});
//
//Route::get('login', '\App\Http\Controllers\FrontEnd\LoginController@login');
//Route::post('login', '\App\Http\Controllers\FrontEnd\LoginController@postLogin');
//Route::get('register', '\App\Http\Controllers\FrontEnd\LoginController@register');
//Route::post('register', '\App\Http\Controllers\FrontEnd\LoginController@postRegister');
//Route::get('logout', '\App\Http\Controllers\FrontEnd\LoginController@logout');
//Route::get('forgot-password', '\App\Http\Controllers\FrontEnd\LoginController@forgotPassword');
//Route::post('forgot-password', '\App\Http\Controllers\FrontEnd\LoginController@forgotPassword');

Route::group(['namespace' => 'FrontEnd'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/select-coin', 'IndexController@selectCoin');
    Route::get('/find-coin', 'IndexController@findCoin');
    Route::get('/tin-tuc/{slug}', 'IndexController@showTinTuc');
    Route::get('/dai-ly', 'IndexController@daiLy');
});

/**
 * Route admin panel
 * Middelware
 */
Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashBoardController@index');
    Route::get('/render-site-map', 'DashBoardController@renderSiteMap');

    Route::group(['prefix' => 'widgets'], function () {
        Route::get('/index', 'WidgetController@index');
        Route::post('{id}/update', 'WidgetController@update');
        Route::get('{id}/delete', 'WidgetController@delete');
        Route::post('create','WidgetController@create');
    });

    Route::group(['prefix' => 'tien-ao'], function () {
        Route::get('/', 'VirualMonneyController@index');
        Route::get('/add', 'VirualMonneyController@create');
        Route::post('/create', 'VirualMonneyController@store');
        Route::get('/{id}/delete', 'VirualMonneyController@destroy');
        Route::get('/{id}/edit', 'VirualMonneyController@edit');
        Route::post('/{id}/edit', 'VirualMonneyController@update');
    });

    Route::group(['prefix' => 'ty-suat-ngan-hang'], function () {
        Route::get('/', 'BankController@index');
        Route::post('/add/usd', 'BankController@addUSD');
        Route::post('/add/vnd', 'BankController@addVND');
        Route::post('/edit/usd', 'BankController@editUSD');
        Route::post('/edit/vnd', 'BankController@editVND');
    });

    Route::group(['prefix' => 'tin-tuc'], function () {
        Route::get('/', 'ArticleController@index');
        Route::get('/add', 'ArticleController@create');
        Route::post('/create', 'ArticleController@store');
        Route::get('/{id}/edit', 'ArticleController@edit');
        Route::post('/{id}/update', 'ArticleController@update');
        Route::get('/{id}/delete', 'ArticleController@destroy');
    });

    Route::group(['prefix' => 'dai-ly'], function () {
        Route::get('/', 'AgencyController@index');
        Route::post('/{id}/update', 'AgencyController@update');
    });

    Route::group(['prefix' => 'banner'], function () {
        Route::get('/', 'BannerController@index');
        Route::post('/create', 'BannerController@store');
        Route::get('/{id}/active', 'BannerController@active');
        Route::get('/{id}/un-active', 'BannerController@unActive');
        Route::get('/{id}/delete', 'BannerController@destroy');
    });
});
