<?php
use App\Routes\Route;
use App\Controllers\AccueilController;
use App\Controllers\PortailController;

Route::get('/accueil', 'AccueilController@index');
Route::get('/portail-encheres', 'PortailController@index');
Route::dispatch();
?>