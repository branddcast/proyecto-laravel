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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rutas Usuario
Route::get('/perfil', 'UsuarioController@index')->name('perfil');
Route::get('/modificar/{id}', 'UsuarioController@edit')->name('edit');
Route::post('/modificar/{id}', ['as' => 'usuario.update', 'uses' => 'UsuarioController@update']);
