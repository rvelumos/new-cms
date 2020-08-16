<?php

use Illuminate\Support\Facades\Route;

Route::put('/users/{user}/profile/update', 'UserController@update')->name('user.profile.update');

Route::delete('/users/{user}/delete', 'UserController@destroy')->name('users.destroy');
Route::get('/users/{user}/edit', 'UserController@edit')->middleware('can:view,post')->name('users.edit');

Route::middleware('role:Admin')->group(function(){
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::put('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    Route::put('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');
});

Route::middleware('auth', 'can:view,user')->group(function(){
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});