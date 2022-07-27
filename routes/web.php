<?php

use App\Http\Middleware\CheckSession;
use App\Http\Middleware\CheckAdm;
use App\SoldadorQualificacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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



Route::get('/entidades',"InicioController@entidades")->middleware(CheckSession::class,CheckAdm::class)->name("entidades");
Route::get('/listagemLogins',"InicioController@listagemLogins")->middleware(CheckSession::class,CheckAdm::class)->name("listagemLogins");
Route::get('/cadastrar',"InicioController@cadastrar")->middleware(CheckSession::class,CheckAdm::class)->name("cadastrar");
Route::get('/requalificacoes',"InicioController@requalificacoes")->middleware(CheckSession::class,CheckAdm::class)->name("requalificacoes");
Route::get("/editarUsuario","EmpresaController@editarUsuario")->middleware(CheckSession::class)->name("editarUsuario");
Route::put("/salvarUsuario/{id}","EmpresaController@salvarUsuario")->middleware(CheckSession::class)->name("salvarUsuario");


Route::get('/requisicoes',"InicioController@requisicoes")->middleware(CheckSession::class,CheckAdm::class)->name("requisicoes");
Route::post("/avaliarRequisicao","InicioController@avaliarRequisicao")->name("avaliarRequisicao")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/processarRequisicao","InicioController@processarRequisicao")->name("processarRequisicao")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/salvandoRequisicao","InicioController@salvandoRequisicao")->name("salvandoRequisicao")->middleware(CheckSession::class);
Route::get("/requisitarSoldador","InicioController@requisitarSoldador")->name("requisitarSoldador")->middleware(CheckSession::class);
Route::get("/requisitarQualificacao","InicioController@requisitarQualificacao")->name("requisitarQualificacao")->middleware(CheckSession::class);
Route::post("/salvandoRequisicaoQualificacao","InicioController@salvandoRequisicaoQualificacao")->name("salvandoRequisicaoQualificacao")->middleware(CheckSession::class);
Route::post("/avaliarRequisicaoQualificacao","InicioController@avaliarRequisicaoQualificacao")->name("avaliarRequisicaoQualificacao")->middleware(CheckSession::class);
Route::post("/processarRequisicaoQualificacao","InicioController@processarRequisicaoQualificacao")->name("processarRequisicaoQualificacao")->middleware(CheckSession::class,CheckAdm::class);
Route::get("/requisitarEps","InicioController@requisitarEps")->name("requisitarEps")->middleware(CheckSession::class);
Route::post("/salvandoRequisicaoEps","InicioController@salvandoRequisicaoEps")->name("salvandoRequisicaoEps")->middleware(CheckSession::class);
Route::post("/avaliarRequisicaoEps","InicioController@avaliarRequisicaoEps")->name("avaliarRequisicaoEps")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/processarRequisicaoEps","InicioController@processarRequisicaoEps")->name("processarRequisicaoEps")->middleware(CheckSession::class,CheckAdm::class);


Route::group(['middleware' => [CheckSession::class,CheckAdm::class]], function() {
    Route::resource("/cidade","CidadeController",['except'=>'destroy']);
    Route::delete('/cidade/remover/{id}', "CidadeController@destroy")->name('cidade.remover');

    Route::resource("/soldador","SoldadorController",['except'=>'destroy']);
    Route::delete('/soldador/remover/{id}', "SoldadorController@destroy")->name('soldador.remover');

    Route::resource("/endereco","EnderecoController",['except'=>'destroy']);
    Route::delete('/endereco/remover/{id}', "EnderecoController@destroy")->name('endereco.remover');

    Route::resource("/soldadorqualificacao","SoldadorQualificacaoController",['except'=>'destroy']);
    Route::delete('/soldadorqualificacao/remover/{id}', "SoldadorQualificacaoController@destroy")->name('soldadorqualificacao.remover');

    Route::resource("/normaqualificacao","NormaQualificacaoController",['except'=>'destroy']);
    Route::delete('/normaqualificacao/remover/{id}', "NormaQualificacaoController@destroy")->name('normaqualificacao.remover');

    Route::resource("/norma","NormaController",['except'=>'destroy']);
    Route::delete('/norma/remover/{id}', "NormaController@destroy")->name('norma.remover');

    Route::resource("/contato","ContatoController",['except'=>'destroy']);
    Route::delete('/contato/remover/{id}', "ContatoController@destroy")->name('contato.remover');

    Route::resource("/inspetor","InspetorController",['except'=>'destroy']);
    Route::delete('/inspetor/remover/{id}', "InspetorController@destroy")->name('inspetor.remover');

    Route::resource("/qualificacao","QualificacaoController",['except'=>'destroy']);
    Route::delete('/qualificacao/remover/{id}', "QualificacaoController@destroy")->name('qualificacao.remover');

    Route::resource("/empresa","EmpresaController",['except'=>'destroy']);
    Route::delete('/empresa/remover/{id}', "EmpresaController@destroy")->name('empresa.remover');

    Route::resource("/contatoEmpresa","ContatoEmpresaController",['except'=>'destroy']);
    Route::delete('/contatoEmpresa/remover/{id}', "contatoEmpresaController@destroy")->name('contatoEmpresa.remover');

    Route::resource("/processo","ProcessoController",['except'=>'destroy']);
    Route::delete('/processo/remover/{id}', "ProcessoController@destroy")->name('processo.remover');


});


//Route::resource("/cidade","CidadeController",['except'=>'destroy'])->middleware(CheckSession::class,CheckAdm::class);
//Route::delete('/cidade/remover/{id}', "CidadeController@destroy")->name('cidade.remover')->middleware(CheckSession::class,CheckAdm::class);

//Route::resource("/soldador","SoldadorController",['except'=>'destroy'])->middleware(CheckSession::class,CheckAdm::class);
//Route::delete('/soldador/remover/{id}', "SoldadorController@destroy")->name('soldador.remover')->middleware(CheckSession::class);

//Route::resource("/endereco","EnderecoController",['except'=>'destroy'])->middleware(CheckSession::class);
//Route::delete('/endereco/remover/{id}', "EnderecoController@destroy")->name('endereco.remover')->middleware(CheckSession::class);

Route::post('/acharCidade', "EnderecoController@cidadeAjax")->name("acharCidade")->middleware(CheckSession::class);
Route::get('/dadosEmpresaAjax/{id}', "DashboardController@dadosEmpresaAjax")->name("dadosEmpresaAjax")->middleware(CheckSession::class,CheckAdm::class);
Route::get('/certificadoAjax/{id}', "InicioController@certificadoAjax")->name("certificadoAjax")->middleware(CheckSession::class);
Route::get('/arquivoAjax/{id}', "InicioController@arquivoAjax")->name("arquivoAjax")->middleware(CheckSession::class);

Route::get('/requalificacoesMensaisAjax/{mes}/{ano}', "DashboardController@requalificacoesMensaisAjax")->name("requalificacoesMensaisAjax")->middleware(CheckSession::class,CheckAdm::class);
Route::get('/controleAcessoAjax/{dataInicial}/{dataFinal}', "AcessoController@controleAcessoAjax")->name("controleAcessoAjax")->middleware(CheckSession::class,CheckAdm::class);
Route::get('/relatorioQualificacaoAjax/{opcao}', "RelatorioQualificacao@relatorioQualificacaoAjax")->name("relatorioQualificacaoAjax")->middleware(CheckSession::class,CheckAdm::class);


Route::get('/requalificacoesMensaisAjax/{mes}/{ano}', "DashboardController@requalificacoesMensaisAjax")->name("requalificacoesMensaisAjax")->middleware(CheckSession::class,CheckAdm::class);

Route::get("/selecionarEmpresa","SoldadorController@selecionarEmpresa")->name("selecionarEmpresa")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/cadastroSoldador","SoldadorController@criar")->name("cadastroSoldador")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/salvarSoldador","SoldadorController@salvar")->name("salvarSoldador")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/salvarEmpresa","EmpresaController@salvar")->name("salvarEmpresa")->middleware(CheckSession::class);
Route::post("/listarSoldador/{id}","SoldadorController@listar")->name("listarSoldador")->middleware(CheckSession::class);
Route::post("/adicionarQualificacao","SoldadorController@adicionarQualificacao")->name("adicionarQualificacao")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/inserirQualificacao","SoldadorController@inserirQualificacao")->name("inserirQualificacao")->middleware(CheckSession::class,CheckAdm::class);
Route::get("/inserirEmpresa","EmpresaController@selecionar")->name("inserirEmpresa")->middleware(CheckSession::class,CheckAdm::class);
Route::get('envio-email4/{id}',function ($id){/*
    $qualificacao=\App\SoldadorQualificacao::find($id);
    \Illuminate\Support\Facades\Mail::send(new \App\Mail\Email4($qualificacao));*/
    return redirect()->route("paginaInicial");
})->name("email4");
Route::get('envio-email5',function (Request $request){/*
    $usuario = new stdClass();
    $usuario->email=$request->email;
    $usuario->telefone=$request->telefone;
    \Illuminate\Support\Facades\Mail::send(new \App\Mail\Email5($usuario));*/
    return redirect()->route("inicio");
})->name("email5");
Route::put("/editarQualificacao/{id}","QualificacaoController@editar")->name("editarQualificacao")->middleware(CheckSession::class);
Route::post("/requalificacao","QualificacaoController@requalificar")->name("requalificar")->middleware(CheckSession::class);
Route::post("/avaliarRequalificacao","QualificacaoController@avaliarRequalificacao")->name("avaliarRequalificacao")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/processarRequalificacao","QualificacaoController@processarRequalificacao")->name("processarRequalificacao")->middleware(CheckSession::class,CheckAdm::class);
Route::post('/municipio/{estado}',"CidadeController@municipio")->middleware(CheckSession::class)-> name("municipio/{estado}");
Route::post("/novaQualificacao","SoldadorController@novaQualificacao")->name("novaQualificacao")->middleware(CheckSession::class,CheckAdm::class);


Route::get('envio-email',function (){/*

        $qualificacaos = SoldadorQualificacao::select(DB::raw("*,(TIMESTAMPDIFF(day,now(),validade_qualificacao)) as tempo
       "))->orderBy('validade_qualificacao', 'desc')->where("aviso","=",1)->get();
        foreach ($qualificacaos as $qualificacao) {
            if ($qualificacao->tempo < 40) {
                \Illuminate\Support\Facades\Mail::send(new \App\Mail\Email());
                \Illuminate\Support\Facades\Mail::cc("infosolda@infosolda.com.br");
            }
        }
        \Illuminate\Support\Facades\Mail::send(new \App\Mail\Email6());*/
       return redirect()->route("paginaInicial");
})->name("email");

Route::get('envio-email2/{id}',function ($id){
    /*
    $usuario=\App\Usuario::find($id);
    \Illuminate\Support\Facades\Mail::send(new \App\Mail\Email2($usuario));*/
    return redirect()->route("paginaInicial");
})->name("email2");
Route::get('envio-email3/{id}',function ($id){
    /*
    $qualificacao=\App\SoldadorQualificacao::find($id);
    \Illuminate\Support\Facades\Mail::send(new \App\Mail\Email3($qualificacao));*/
    return redirect()->route("paginaInicial");
})->name("email3");

Route::post('/login','LoginController@entrar')->name("login");
Route::get('/', "LoginController@index")->name("inicio");
//Route::get('/novoUsuario', "LoginController@create")->name("novoUsuario");
Route::post('/cadastrar', "LoginController@cadastrar")->name("cadastrar");
Route::get('/sair', "LoginController@sair")->name("sair");

Route::get('/listagemEps',"InicioController@listarEPS")->middleware(CheckSession::class)->name("listarEps");

Route::post('/perfilSoldador',"SoldadorController@perfilSoldador")->middleware(CheckSession::class)->name("perfilSoldador");
Route::get('/listagemEmpresa',"InicioController@listarEmpresas")->middleware(CheckSession::class,CheckAdm::class)->name("paginaInicial");
Route::get('/dashboard',"DashboardController@getMonthlyAllData")->middleware(CheckSession::class,CheckAdm::class)->name("dashboard");
Route::get('/controleAcesso',"AcessoController@acessoControler")->middleware(CheckSession::class,CheckAdm::class)->name("controleAcesso");
Route::get('/listagemSoldador',"InicioController@listarSoldadores")->middleware(CheckSession::class)->name("hubSoldadores");
Route::post('/listagemSoldadorFiltrados',"SoldadorController@listarFiltrado")->middleware(CheckSession::class)->name("soldadoresFiltrados");
Route::get('/relatorioQualificacao',"RelatorioQualificacao@relatorioQualificacao")->middleware(CheckSession::class,CheckAdm::class)->name("relatorioQualificacao");


Route::get("/inserirEps","EpsController@create")->name("inserirEps")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/cadastrarEps","EpsController@store")->name("cadastrarEps")->middleware(CheckSession::class,CheckAdm::class);
Route::post("/deletarEps","EpsController@destroy")->name("deletarEps")->middleware(CheckSession::class,CheckAdm::class);
Route::put("/editarQualificacaoSoldador/{id}","SoldadorQualificacaoController@editar")->name("editarQualificacaoSoldador")->middleware(CheckSession::class);
Route::post("/updateQualificacao","SoldadorQualificacaoController@atualizar")->name("updateQualificacao")->middleware(CheckSession::class);
