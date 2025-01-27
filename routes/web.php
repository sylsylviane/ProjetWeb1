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

Route::get('/forgot-password', 'ResetPassword@index');
Route::post('/forgot-password', 'ResetPassword@token');

Route::get('/reset-password', 'ResetPassword@recuperationToken');
Route::post('/reset-password', 'ResetPassword@resetPassword'); 

Route::dispatch();
?>