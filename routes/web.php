<?php
use App\Routes\Route; 
use App\Controllers\AccueilController;
use App\Controllers\PortailController;
use App\Controllers\AuthController;
use App\Controllers\MembreController;
use App\Controllers\ResetPassword;
 

Route::get('/accueil', 'AccueilController@index');
Route::get('/portail-encheres', 'PortailController@index');

Route::get('/membre/inscription', 'MembreController@create');
Route::post('/membre/inscription', 'MembreController@store');

Route::get('/membre/profil', 'MembreController@show');
Route::get('/membre/edit', 'MembreController@edit');
Route::post('/membre/edit', 'MembreController@update');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::get('/resetpwd/forgot-password', 'ResetPassword@index');
Route::post('/resetpwd/forgot-password', 'ResetPassword@token');

Route::get('/resetpwd/reset-password', 'ResetPassword@recuperationToken');
Route::post('/resetpwd/reset-password', 'ResetPassword@resetPassword'); 

Route::dispatch();
?>