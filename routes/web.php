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
})->middleware(CheckSession::class);



Route::resource("/cidade","CidadeController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/cidade/remover/{id}', "CidadeController@destroy")->middleware(CheckSession::class);

Route::resource("/soldador","SoldadorController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/soldador/remover/{id}', "SoldadorController@destroy")->middleware(CheckSession::class);

Route::resource("/endereco","EnderecoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/endereco/remover/{id}', "EnderecoController@destroy")->middleware(CheckSession::class);
Route::post('/acharCidade', "EnderecoController@cidadeAjax")->name("acharCidade")->middleware(CheckSession::class);

Route::resource("/soldadorqualificacao","SoldadorQualificacaoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/soldadorqualificacao/remover/{id}', "SoldadorQualificacaoController@destroy")->middleware(CheckSession::class);

Route::resource("/normaqualificacao","NormaQualificacaoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/normaqualificacao/remover/{id}', "NormaQualificacaoController@destroy")->middleware(CheckSession::class);

Route::resource("/norma","NormaController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/norma/remover/{id}', "NormaController@destroy")->middleware(CheckSession::class);

Route::resource("/contato","ContatoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/contato/remover/{id}', "ContatoController@destroy")->middleware(CheckSession::class);

Route::resource("/inspetor","InspetorController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/inspetor/remover/{id}', "InspetorController@destroy")->middleware(CheckSession::class);

Route::resource("/qualificacao","QualificacaoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/qualificacao/remover/{id}', "QualificacaoController@destroy")->middleware(CheckSession::class);

Route::resource("/empresa","EmpresaController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/empresa/remover/{id}', "EmpresaController@destroy")->middleware(CheckSession::class);

Route::resource("/contatoEmpresa","contatoEmpresaController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/contatoEmpresa/remover/{id}', "contatoEmpresaController@destroy")->middleware(CheckSession::class);

Route::resource("/processo","ProcessoController",['except'=>'destroy'])->middleware(CheckSession::class);
Route::delete('/processo/remover/{id}', "ProcessoController@destroy")->middleware(CheckSession::class);

Route::post('/login','LoginController@entrar');
Route::get('/', "LoginController@index")->name("inicio");
Route::get('/novoUsuario', "LoginController@create")->name("novoUsuario");
Route::post('/cadastrar', "LoginController@cadastrar")->name("cadastrar");
Route::get('/sair', "LoginController@sair")->name("sair");


