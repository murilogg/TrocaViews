<?php

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// homeController
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/geral', 'HomeController@logado')->middleware('auth');

// rankingController
Route::get('/ranking', 'RankingController@index')->middleware('auth');

// almostController
Route::get('/quaseLa', 'AlmostController@index')->middleware('auth');

// settingController
Route::get('/configuracao', 'SettingController@index')->middleware('auth');

// conquestController
Route::get('/conquistas', 'ConquestController@index')->middleware('auth');

// helpController
Route::get('/ajuda', 'HelpController@index')->middleware('auth');
Route::post('/foto', 'HelpController@store')->middleware('auth');

//Controlador API
Route::get('/api/ativaDesativa/{id}', 'HomeController@ativaDesativa')->middleware('auth')->name('ativaDesativa');
Route::post('/api/addVideo', 'HomeController@addVideo')->middleware('auth')->name('adicionaVideo');
Route::get('/api/obter', 'HomeController@obter')->middleware('auth')->name('obterVideo');
Route::post('/api/comment', 'HomeController@comment')->middleware('auth')->name('adicionaVideo');