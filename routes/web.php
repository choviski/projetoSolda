<?php

use App\Http\Middleware\CheckSession;
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



Route::get('/entidades', function () {
    return view('entidades');
})->middleware(CheckSession::class)->name("entidades");



Route::resource("/cidade","CidadeController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/cidade/remover/{id}', "CidadeController@destroy")->name('cidade.remover')->middleware(CheckSession::class);

Route::resource("/soldador","SoldadorController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/soldador/remover/{id}', "SoldadorController@destroy")->name('soldador.remover')->middleware(CheckSession::class);

Route::resource("/endereco","EnderecoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/endereco/remover/{id}', "EnderecoController@destroy")->name('endereco.remover')->middleware(CheckSession::class);
Route::post('/acharCidade', "EnderecoController@cidadeAjax")->name("acharCidade")->middleware(CheckSession::class);

Route::resource("/soldadorqualificacao","SoldadorQualificacaoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/soldadorqualificacao/remover/{id}', "SoldadorQualificacaoController@destroy")->name('soldadorqualificacao.remover')->middleware(CheckSession::class);

Route::resource("/normaqualificacao","NormaQualificacaoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/normaqualificacao/remover/{id}', "NormaQualificacaoController@destroy")->name('normaqualificacao.remover')->middleware(CheckSession::class);

Route::resource("/norma","NormaController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/norma/remover/{id}', "NormaController@destroy")->name('norma.remover')->middleware(CheckSession::class);

Route::resource("/contato","ContatoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/contato/remover/{id}', "ContatoController@destroy")->name('contato.remover')->middleware(CheckSession::class);

Route::resource("/inspetor","InspetorController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/inspetor/remover/{id}', "InspetorController@destroy")->name('inspetor.remover')->middleware(CheckSession::class);

Route::resource("/qualificacao","QualificacaoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/qualificacao/remover/{id}', "QualificacaoController@destroy")->name('qualificacao.remover')->middleware(CheckSession::class);

Route::resource("/empresa","EmpresaController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/empresa/remover/{id}', "EmpresaController@destroy")->name('empresa.remover')->middleware(CheckSession::class);

Route::resource("/contatoEmpresa","ContatoEmpresaController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/contatoEmpresa/remover/{id}', "contatoEmpresaController@destroy")->name('contatoEmpresa.remover')->middleware(CheckSession::class);

Route::resource("/processo","ProcessoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/processo/remover/{id}', "ProcessoController@destroy")->name('processo.remover')->middleware(CheckSession::class);

Route::post('/login','LoginController@entrar')->name("login");
Route::get('/', "LoginController@index")->name("inicio");
Route::get('/novoUsuario', "LoginController@create")->name("novoUsuario");
Route::post('/cadastrar', "LoginController@cadastrar")->name("cadastrar");
Route::get('/sair', "LoginController@sair")->name("sair");


