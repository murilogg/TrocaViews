<?php

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/troca', 'HomeController@logado')->name('homeLogado');
Route::get('/ranking', 'RankingController@index');


Route::get('/api/ativaDesativa/{id}', 'HomeController@ativaDesativa')->name('ativaDesativa');

//Controlador API
Route::post('/api/addVideo', 'HomeController@addVideo')->name('adicionaVideo');
Route::get('/api/obter', 'HomeController@obter')->name('obterVideo');