<?php

use Illuminate\Http\Request;

Route::get('photos', 'MediaController@getVisible');
Route::get('strings-sorted', 'LangController@getStrings');
Route::post('contact', 'EmailController@send');

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // user
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
    Route::put('users/{id}', 'UserController@update')->middleware('isAdminOrSelf');
    Route::delete('users/{id}', 'UserController@delete')->middleware('isAdmin');

    // settings
    Route::get('settings', 'SettingsController@index')->middleware('isAdmin');
    Route::put('setting/{id}', 'SettingsController@update')->middleware('isAdmin');

    // photos
    Route::get('synchronize', 'MediaController@instagramSyncronization')->middleware('isAdmin');
    Route::get('photos-all', 'MediaController@getAll')->middleware('isAdmin');
    Route::put('photo-change-visibiliety/{id}', 'MediaController@changeVisibility')->middleware('isAdmin');
    Route::delete('photo/{id}', 'MediaController@delete')->middleware('isAdmin');
    
    // strings
    Route::get('strings', 'LangController@index')->middleware('isAdmin');
    Route::get('strings/{id}', 'LangController@getItem')->middleware('isAdmin');
    Route::post('strings', 'LangController@create')->middleware('isAdmin');
    Route::put('strings/{id}', 'LangController@update')->middleware('isAdmin');
    Route::delete('strings/{id}', 'LangController@delete')->middleware('isAdmin');

    // emails 
    Route::get('emails', 'EmailController@index');
    Route::delete('emails/{id}', 'EmailController@delete');
});
