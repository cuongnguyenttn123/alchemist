<?php


Route::group(['middleware' => ['web']], function () {
    Route::group(['namespace'=>'Boss\Login\Controllers', 'prefix' => 'user'], function () {
        Route::get('hello','Login@index');
        Route::get("register", "Auth\RegisterController@showForm");
        Route::post("register", "Auth\RegisterController@register")->name('register');
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login')->name('plogin');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('/', 'Auth\LoginController@showLoginForm');
    });
});
