<?php
use App\Routes\Route; 
use App\Controllers\AccueilController;
use App\Controllers\PortailController;
use App\Controllers\AuthController;
use App\Controllers\MembreController;
use App\Controllers\ResetPassword;
use App\Controllers\TimbreController;
use App\Controllers\ImageController;
 

Route::get('/accueil', 'AccueilController@index');
Route::get('/portail-encheres', 'EnchereController@showPortailEncheres');
Route::get('/enchere', 'EnchereController@showEnchere');
Route::post('/image/delete', 'ImageController@deleteImage');
Route::post('/timbre/delete', 'TimbreController@deleteTimbreImages');

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

Route::get('/timbre', 'TimbreController@index');
Route::get('/timbre/create', 'TimbreController@create');
Route::post('/timbre/create', 'TimbreController@store');
Route::get('/timbre/show', 'TimbreController@show');
Route::get('/timbre/edit', 'TimbreController@edit');
Route::post('/timbre/edit', 'TimbreController@update');
Route::post('/timbre/delete', 'TimbreController@delete');


Route::get('/timbre/upload-img', 'ImageController@index');
Route::post('/timbre/upload-img', 'ImageController@uploadImage');

Route::dispatch();
?>