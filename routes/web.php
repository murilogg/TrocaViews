<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/troca', 'HomeController@logado')->name('homeLogado');

//Controlador API
Route::post('/api/addVideo', 'HomeController@addVideo')->name('adicionaVideo');
Route::get('/api/obter', 'HomeController@obter')->name('obterVideo');