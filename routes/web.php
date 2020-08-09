<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/entidades', function () {
    return view('entidades');
});
Route::resource("/cidade","CidadeController",['except'=>'destroy']);
Route::delete('/cidade/remover/{id}', "CidadeController@destroy");


Route::resource("/soldador","SoldadorController",['except'=>'destroy']);
Route::delete('/soldador/remover/{id}', "SoldadorController@destroy");

Route::resource("/endereco","EnderecoController",['except'=>'destroy']);
Route::delete('/endereco/remover/{id}', "EnderecoController@destroy");

Route::resource("/soldadorqualificacao","SoldadorQualificacaoController",['except'=>'destroy']);
Route::delete('/soldadorqualificacao/remover/{id}', "SoldadorQualificacaoController@destroy");

Route::resource("/normaqualificacao","NormaQualificacaoController",['except'=>'destroy']);
Route::delete('/normaqualificacao/remover/{id}', "NormaQualificacaoController@destroy");


Route::resource("/norma","NormaController",['except'=>'destroy']);
Route::delete('/norma/remover/{id}', "NormaController@destroy");

Route::resource("/contato","ContatoController",['except'=>'destroy']);
Route::delete('/contato/remover/{id}', "ContatoController@destroy");

Route::resource("/inspetor","InspetorController",['except'=>'destroy']);
Route::delete('/inspetor/remover/{id}', "InspetorController@destroy");

Route::resource("/qualificacao","QualificacaoController",['except'=>'destroy']);
Route::delete('/qualificacao/remover/{id}', "QualificacaoController@destroy");

Route::resource("/empresa","EmpresaController",['except'=>'destroy']);
Route::delete('/empresa/remover/{id}', "EmpresaController@destroy");

Route::resource("/contatoEmpresa","contatoEmpresaController",['except'=>'destroy']);
Route::delete('/contatoEmpresa/remover/{id}', "contatoEmpresaController@destroy");



