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
    return view('contacto.create');
});



Auth::routes();

Route::get('/home', 'ContactoController@index')->name('home');

Route::resource('contactos', 'ContactoController');
