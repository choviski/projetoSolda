<?php

use App\Http\Middleware\CheckSession;
use App\SoldadorQualificacao;
use Illuminate\Support\Facades\DB;
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



Route::get('/hubSoldadores',"HubSoldadoresController@hubSoldadores")->middleware(CheckSession::class)->name("hubSoldadores");
Route::get('/entidades',"InicioController@entidades")->middleware(CheckSession::class)->name("entidades");
Route::get('/inicio',"InicioController@inicio")->middleware(CheckSession::class)->name("paginaInicial");
Route::get('/cadastrar',"InicioController@cadastrar")->middleware(CheckSession::class)->name("cadastrar");
Route::get('/requalificacoes',"InicioController@requalificacoes")->middleware(CheckSession::class)->name("requalificacoes");
Route::get("/editarUsuario","EmpresaController@editarUsuario")->middleware(CheckSession::class)->name("editarUsuario");
Route::put("/salvarUsuario/{id}","EmpresaController@salvarUsuario")->middleware(CheckSession::class)->name("salvarUsuario");


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

Route::get("/selecionarEmpresa","SoldadorController@selecionarEmpresa")->name("selecionarEmpresa");
Route::post("/cadastroSoldador","SoldadorController@criar")->name("cadastroSoldador");
Route::post("/salvarSoldador","SoldadorController@salvar")->name("salvarSoldador");
Route::post("/salvarEmpresa","EmpresaController@salvar")->name("salvarEmpresa");

Route::post("/adicionarQualificacao","SoldadorController@adicionarQualificacao")->name("adicionarQualificacao");
Route::post("/inserirQualificacao","SoldadorController@inserirQualificacao")->name("inserirQualificacao");
Route::get("/inserirEmpresa","EmpresaController@selecionar")->name("inserirEmpresa");
Route::put("/editarQualificacao/{id}","QualificacaoController@editar")->name("editarQualificacao");
Route::post("/requalificacao","QualificacaoController@requalificar")->name("requalificar");
Route::post("/avaliarRequalificacao","QualificacaoController@avaliarRequalificacao")->name("avaliarRequalificacao");
Route::post("/processarRequalificacao","QualificacaoController@processarRequalificacao")->name("processarRequalificacao");


Route::get('envio-email',function (){

    //return new \App\Mail\Email();
    $qualificacaos = SoldadorQualificacao::select(DB::raw("*,(TIMESTAMPDIFF(day,now(),validade_qualificacao)) as tempo
   "))->orderBy('validade_qualificacao', 'desc')->get();
    foreach ($qualificacaos as $qualificacao) {
        if ($qualificacao->tempo < 40 && $qualificacao->soldador->aviso == 1) {
            \Illuminate\Support\Facades\Mail::send(new \App\Mail\Email());
        }
    }
    return redirect()->route("paginaInicial");
})->name("email");

Route::post('/login','LoginController@entrar')->name("login");
Route::get('/', "LoginController@index")->name("inicio");
Route::get('/novoUsuario', "LoginController@create")->name("novoUsuario");
Route::post('/cadastrar', "LoginController@cadastrar")->name("cadastrar");
Route::get('/sair', "LoginController@sair")->name("sair");


