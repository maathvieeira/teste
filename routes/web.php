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
    return view('formulario');
});

//Inserir o formulario no banco de dados
Route::post('/inserir', 'FormularioController@store')->name('salvar');
//Listagem das informações inseridas no banco de dados
Route::get('/lista', 'FormularioController@index')->name('listagem');
//Exclusão lógica das informações no banco de dados
Route::get('excluir/{id}', 'FormularioController@logicDelete')->name('excluir');
//Resgata as informações contidas no banco de dados
Route::get('editar/{id}', 'FormularioController@edit')->name('editar');
//Envia as informações editadas.
Route::put('atualizar/{id}', 'FormularioController@update')->name('atualizar');
