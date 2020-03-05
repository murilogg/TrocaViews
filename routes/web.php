<?php

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/geral', 'HomeController@logado')->middleware('auth');
Route::get('/ranking', 'RankingController@index')->middleware('auth');
Route::get('/quaseLa', 'AlmostController@index')->middleware('auth');
Route::get('/configuracao', 'SettingController@index')->middleware('auth');
Route::get('/conquistas', 'ConquestController@index')->middleware('auth');
Route::get('/ajuda', 'HelpController@index')->middleware('auth');

Route::post('/foto', 'HelpController@store')->middleware('auth');


Route::get('/api/ativaDesativa/{id}', 'HomeController@ativaDesativa')->name('ativaDesativa');

//Controlador API
Route::post('/api/addVideo', 'HomeController@addVideo')->name('adicionaVideo');
Route::get('/api/obter', 'HomeController@obter')->name('obterVideo');