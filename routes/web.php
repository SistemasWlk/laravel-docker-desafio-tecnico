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

// Route::get('/', function () {
//     echo "okay";
//     //return view('welcome');
// });

Route::get('/',                          'Site\SiteController@index')->name('principal'); 
Route::get('resultadocorredororderbyid', 'DesafioTecnico\ResultadoCorredorController@orderByIdade')->name('orderbyidade'); 


Route::resource('corredor',              'DesafioTecnico\CorredorController');
Route::resource('prova',                 'DesafioTecnico\ProvaController');
Route::resource('corredorprova',         'DesafioTecnico\CorredorProvaController');
Route::resource('resultadocorredor',     'DesafioTecnico\ResultadoCorredorController');
Route::resource('tipoprova',             'DesafioTecnico\TipoProvaController');