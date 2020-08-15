<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth routes
Route::group(['namespace' => 'Api\Auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    
    Route::prefix('admin')->group(function() {
        // Route for admin permissions
        Route::post('login', 'AuthController@adminLogin');
        Route::post('register', 'AuthController@adminRegister');
    });
});

Route::group(['namespace' => 'Api', 'middleware' => ['auth:api']], function () {
    // User data
    Route::get('user', 'UserController@show');

    // Update Password & Email
    Route::put('settings/password', 'SettingsController@updatePassword');
    Route::put('settings/email', 'SettingsController@updateEmail');

    // User Profile
    Route::get('profile', 'ProfileController@show');
    Route::post('profile', 'ProfileController@store')->middleware(['scope:create-profile']);
    Route::put('profile', 'ProfileController@update')->middleware(['scope:edit-profile']);
});