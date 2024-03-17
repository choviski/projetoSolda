<?php

use App\Http\Middleware\CheckSession;
use App\Http\Middleware\CheckAdm;
use App\Http\Middleware\CheckAdmOrMaster;
use App\SoldadorQualificacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;

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


Route::get('/entidades', "InicioController@entidades")->middleware(CheckSession::class, CheckAdm::class)->name("entidades");
Route::get('/cadastrar', "InicioController@cadastrar")->middleware(CheckSession::class, CheckAdm::class)->name("cadastrar");
Route::get('/requalificacoes', "InicioController@requalificacoes")->middleware(CheckSession::class, CheckAdm::class)->name("requalificacoes");
Route::get("/editarUsuario", "EmpresaController@editarUsuario")->middleware(CheckSession::class)->name("editarUsuario");
Route::put("/salvarUsuario/{id}", "EmpresaController@salvarUsuario")->middleware(CheckSession::class)->name("salvarUsuario");
Route::get('/listagemLogin', "InicioController@listagemLogin")->middleware(CheckSession::class, CheckAdm::class)->name("listagemLogin");
Route::get('/cadastroLogin', "InicioController@cadastroLogin")->middleware(CheckSession::class)->name("cadastroLogin");
Route::post('/editarLogin/{id}', "InicioController@editarLogin")->middleware(CheckAdmOrMaster::class)->name("editarLogin");
Route::put("/salvarLogin/{id}", "InicioController@salvarLogin")->middleware(CheckAdmOrMaster::class)->name("salvarLogin");
Route::delete("/deletarLogin/{id}", "InicioController@deletarLogin")->middleware(CheckAdmOrMaster::class)->name("deletarLogin");
Route::post('/novoUsuario', "UsuarioController@cadastrarNovoUsuario")->middleware(CheckSession::class)->name("novoUsuario");


Route::get('/requisicoes', "InicioController@requisicoes")->middleware(CheckSession::class, CheckAdm::class)->name("requisicoes");
Route::post("/avaliarRequisicao", "InicioController@avaliarRequisicao")->name("avaliarRequisicao")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/processarRequisicao", "InicioController@processarRequisicao")->name("processarRequisicao")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/salvandoRequisicao", "InicioController@salvandoRequisicao")->name("salvandoRequisicao")->middleware(CheckSession::class);
Route::get("/requisitarSoldador", "InicioController@requisitarSoldador")->name("requisitarSoldador")->middleware(CheckSession::class);
Route::get("/requisitarQualificacao", "InicioController@requisitarQualificacao")->name("requisitarQualificacao")->middleware(CheckSession::class);
Route::post("/salvandoRequisicaoQualificacao", "InicioController@salvandoRequisicaoQualificacao")->name("salvandoRequisicaoQualificacao")->middleware(CheckSession::class);
Route::post("/avaliarRequisicaoQualificacao", "InicioController@avaliarRequisicaoQualificacao")->name("avaliarRequisicaoQualificacao")->middleware(CheckSession::class);
Route::post("/processarRequisicaoQualificacao", "InicioController@processarRequisicaoQualificacao")->name("processarRequisicaoQualificacao")->middleware(CheckSession::class, CheckAdm::class);
Route::get("/requisitarEps", "InicioController@requisitarEps")->name("requisitarEps")->middleware(CheckSession::class);
Route::post("/salvandoRequisicaoEps", "InicioController@salvandoRequisicaoEps")->name("salvandoRequisicaoEps")->middleware(CheckSession::class);
Route::post("/avaliarRequisicaoEps", "InicioController@avaliarRequisicaoEps")->name("avaliarRequisicaoEps")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/processarRequisicaoEps", "InicioController@processarRequisicaoEps")->name("processarRequisicaoEps")->middleware(CheckSession::class, CheckAdm::class);


Route::group(['middleware' => [CheckSession::class, CheckAdm::class]], function () {
    Route::resource("/cidade", "CidadeController", ['except' => 'destroy']);
    Route::delete('/cidade/remover/{id}', "CidadeController@destroy")->name('cidade.remover');

    Route::resource("/soldador", "SoldadorController", ['except' => 'destroy']);
    Route::delete('/soldador/remover/{id}', "SoldadorController@destroy")->name('soldador.remover');

    Route::resource("/endereco", "EnderecoController", ['except' => 'destroy']);
    Route::delete('/endereco/remover/{id}', "EnderecoController@destroy")->name('endereco.remover');

    Route::resource("/soldadorqualificacao", "SoldadorQualificacaoController", ['except' => 'destroy']);
    Route::delete('/soldadorqualificacao/remover/{id}', "SoldadorQualificacaoController@destroy")->name('soldadorqualificacao.remover');

    Route::resource("/normaqualificacao", "NormaQualificacaoController", ['except' => 'destroy']);
    Route::delete('/normaqualificacao/remover/{id}', "NormaQualificacaoController@destroy")->name('normaqualificacao.remover');

    Route::resource("/norma", "NormaController", ['except' => 'destroy']);
    Route::delete('/norma/remover/{id}', "NormaController@destroy")->name('norma.remover');

    Route::resource("/contato", "ContatoController", ['except' => 'destroy']);
    Route::delete('/contato/remover/{id}', "ContatoController@destroy")->name('contato.remover');

    Route::resource("/inspetor", "InspetorController", ['except' => 'destroy']);
    Route::delete('/inspetor/remover/{id}', "InspetorController@destroy")->name('inspetor.remover');

    Route::resource("/qualificacao", "QualificacaoController", ['except' => 'destroy']);
    Route::delete('/qualificacao/remover/{id}', "QualificacaoController@destroy")->name('qualificacao.remover');

    Route::resource("/empresa", "EmpresaController", ['except' => 'destroy']);
    Route::delete('/empresa/remover/{id}', "EmpresaController@destroy")->name('empresa.remover');

    Route::resource("/contatoEmpresa", "ContatoEmpresaController", ['except' => 'destroy']);
    Route::delete('/contatoEmpresa/remover/{id}', "contatoEmpresaController@destroy")->name('contatoEmpresa.remover');

    Route::resource("/processo", "ProcessoController", ['except' => 'destroy']);
    Route::delete('/processo/remover/{id}', "ProcessoController@destroy")->name('processo.remover');


});


//Route::resource("/cidade","CidadeController",['except'=>'destroy'])->middleware(CheckSession::class,CheckAdm::class);
//Route::delete('/cidade/remover/{id}', "CidadeController@destroy")->name('cidade.remover')->middleware(CheckSession::class,CheckAdm::class);

//Route::resource("/soldador","SoldadorController",['except'=>'destroy'])->middleware(CheckSession::class,CheckAdm::class);
//Route::delete('/soldador/remover/{id}', "SoldadorController@destroy")->name('soldador.remover')->middleware(CheckSession::class);

//Route::resource("/endereco","EnderecoController",['except'=>'destroy'])->middleware(CheckSession::class);
//Route::delete('/endereco/remover/{id}', "EnderecoController@destroy")->name('endereco.remover')->middleware(CheckSession::class);

Route::post('/acharCidade', "EnderecoController@cidadeAjax")->name("acharCidade")->middleware(CheckSession::class);
Route::get('/dadosEmpresaAjax/{id}', "DashboardController@dadosEmpresaAjax")->name("dadosEmpresaAjax")->middleware(CheckSession::class, CheckAdm::class);
Route::get('/certificadoAjax/{id}', "InicioController@certificadoAjax")->name("certificadoAjax")->middleware(CheckSession::class);
Route::get('/arquivoAjax/{id}', "InicioController@arquivoAjax")->name("arquivoAjax")->middleware(CheckSession::class);

Route::get('/requalificacoesMensaisAjax/{mes}/{ano}', "DashboardController@requalificacoesMensaisAjax")->name("requalificacoesMensaisAjax")->middleware(CheckSession::class, CheckAdm::class);
Route::get('/controleAcessoAjax/{dataInicial}/{dataFinal}', "AcessoController@controleAcessoAjax")->name("controleAcessoAjax")->middleware(CheckSession::class, CheckAdm::class);
Route::get('/relatorioQualificacaoAjax/{opcao}', "RelatorioQualificacao@relatorioQualificacaoAjax")->name("relatorioQualificacaoAjax")->middleware(CheckSession::class, CheckAdm::class);
Route::get('/relatorioVencimentoAjax/{ano}', "RelatorioQualificacao@relatorioVencimentoAjax")->name("relatorioVencimentoAjax")->middleware(CheckSession::class, CheckAdm::class);


Route::get('/requalificacoesMensaisAjax/{mes}/{ano}', "DashboardController@requalificacoesMensaisAjax")->name("requalificacoesMensaisAjax")->middleware(CheckSession::class, CheckAdm::class);

Route::get("/selecionarEmpresa", "SoldadorController@selecionarEmpresa")->name("selecionarEmpresa")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/cadastroSoldador", "SoldadorController@criar")->name("cadastroSoldador")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/salvarSoldador", "SoldadorController@salvar")->name("salvarSoldador")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/salvarEmpresa", "EmpresaController@salvar")->name("salvarEmpresa")->middleware(CheckSession::class);
Route::post("/listarSoldador/{id}", "SoldadorController@listar")->name("listarSoldador")->middleware(CheckSession::class);
Route::post("/adicionarQualificacao", "SoldadorController@adicionarQualificacao")->name("adicionarQualificacao")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/inserirQualificacao", "SoldadorController@inserirQualificacao")->name("inserirQualificacao")->middleware(CheckSession::class, CheckAdm::class);
Route::get("/inserirEmpresa", "EmpresaController@selecionar")->name("inserirEmpresa")->middleware(CheckSession::class, CheckAdm::class);

Route::put("/editarQualificacao/{id}", "QualificacaoController@editar")->name("editarQualificacao")->middleware(CheckSession::class);
Route::post("/requalificacao", "QualificacaoController@requalificar")->name("requalificar")->middleware(CheckSession::class);
Route::post("/avaliarRequalificacao", "QualificacaoController@avaliarRequalificacao")->name("avaliarRequalificacao")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/processarRequalificacao", "QualificacaoController@processarRequalificacao")->name("processarRequalificacao")->middleware(CheckSession::class, CheckAdm::class);
Route::post('/municipio/{estado}', "CidadeController@municipio")->middleware(CheckSession::class)->name("municipio/{estado}");
Route::post("/novaQualificacao", "SoldadorController@novaQualificacao")->name("novaQualificacao")->middleware(CheckSession::class, CheckAdm::class);

Route::get('envio-email', "EmailController@envioEmailQualificacao")->name("email");
Route::get('envio-email2/{id}', "EmailController@envioEmailCadastro")->name("email2");
Route::get('envio-email3/{id}', "EmailController@envioEmailRespostaRequalificacao")->name("email3");
Route::get('envio-email4/{id}', 'EmailController@envioEmailRequisicaoRequalificacao')->name("email4");
Route::get('envio-email5', "EmailController@envioEmailLead")->name("email5");

Route::post('/login', 'LoginController@entrar')->name("login");
Route::get('/', "LoginController@index")->name("inicio");
Route::post('/cadastrar', "LoginController@cadastrar")->name("cadastrar");
Route::get('/sair', "LoginController@sair")->name("sair");

Route::get('/listagemEps', "InicioController@listarEps")->middleware(CheckSession::class)->name("listarEps");

Route::post('/perfilSoldador', "SoldadorController@perfilSoldador")->middleware(CheckSession::class)->name("perfilSoldador");
Route::get('/listagemEmpresa', "InicioController@listarEmpresas")->middleware(CheckSession::class, CheckAdm::class)->name("paginaInicial");
Route::get('/dashboard', "DashboardController@getMonthlyAllData")->middleware(CheckSession::class, CheckAdm::class)->name("dashboard");
Route::get('/controleAcesso', "AcessoController@acessoControler")->middleware(CheckSession::class, CheckAdm::class)->name("controleAcesso");
Route::get('/listagemSoldador', "InicioController@listarSoldadores")->middleware(CheckSession::class)->name("hubSoldadores");
//Route::post('/listagemSoldadorFiltrados',"SoldadorController@listarFiltrado")->middleware(CheckSession::class)->name("soldadoresFiltrados");
Route::get('/relatorioQualificacao', "RelatorioQualificacao@relatorioQualificacao")->middleware(CheckSession::class, CheckAdm::class)->name("relatorioQualificacao");


Route::get("/inserirEps", "EpsController@create")->name("inserirEps")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/cadastrarEps", "EpsController@store")->name("cadastrarEps")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/deletarEps", "EpsController@destroy")->name("deletarEps")->middleware(CheckSession::class, CheckAdm::class);
Route::put("/editarQualificacaoSoldador/{id}", "SoldadorQualificacaoController@editar")->name("editarQualificacaoSoldador")->middleware(CheckSession::class);
Route::post("/updateQualificacao", "SoldadorQualificacaoController@atualizar")->name("updateQualificacao")->middleware(CheckSession::class);

# --- Anúncios --- #

Route::get("/cadastrarAd", "AnuncioController@cadastrarAd")->name("cadastrarAd")->middleware(CheckSession::class, CheckAdm::class);
Route::get("/listarAds", "AnuncioController@listarAds")->name("listarAds")->middleware(CheckSession::class, CheckAdm::class);
Route::post("/salvarAd", "AnuncioController@storeAds")->name("salvarAd")->middleware(CheckSession::class, CheckAdm::class);
Route::delete("/deletarAd/{id}", "AnuncioController@deletarAd")->name("deletarAd")->middleware(CheckSession::class, CheckAdm::class);

# --- EPS avançada --- #

Route::get("/listarEpsAvancada","EpsAvancadaController@listarEpsAvancada")->name("listarEpsAvancada")->middleware(CheckSession::class);
Route::get("/cadastrarEpsAvancada","EpsAvancadaController@cadastrarEpsAvancada")->name("cadastrarEpsAvancada")->middleware(CheckSession::class);
Route::get("/armazenarEpsAvancada","EpsAvancadaController@armazenarEpsAvancada")->name("armazenarEpsAvancada")->middleware(CheckSession::class);
Route::delete("/deleteEpsAvancada/{id}","EpsAvancadaController@deleteEpsAvancada")->name("deleteEpsAvancada")->middleware(CheckSession::class);
Route::post("/geraEPS","EpsAvancadaController@geraEps")->name("geraEps")->middleware(CheckSession::class);

# --- EPS Processo --- #
Route::get("/cadastraEPSProcesso","EpsProcessoController@cadastraOuEditaProcesso")->name("cadastraOuEditaProcesso")->middleware(CheckSession::class);
Route::get("/cadastraEPSJunta","EpsProcessoController@cadastraOuEditaJunta")->name("cadastraOuEditaJunta")->middleware(CheckSession::class);
Route::get("/cadastraEPSMaterialBase","EpsProcessoController@cadastraOuEditaMaterialBase")->name("cadastraOuEditaMaterialBase")->middleware(CheckSession::class);
Route::get("/cadastraEPSMetalAdicao","EpsProcessoController@cadastraOuEditaMetalAdicao")->name("cadastraOuEditaMetalAdicao")->middleware(CheckSession::class);
Route::get("/cadastraEPSPreAquecimento","EpsProcessoController@cadastraOuEditaPreAquecimento")->name("cadastraOuEditaPreAquecimento")->middleware(CheckSession::class);
Route::get("/cadastraEPSPosAquecimento","EpsProcessoController@cadastraOuEditaPosAquecimento")->name("cadastraOuEditaPosAquecimento")->middleware(CheckSession::class);
Route::get("/cadastraEPSCaracteristicasEletricas","EpsProcessoController@cadastraOuEditaCaracteristicasEletricas")->name("cadastraOuEditaCaracteristicasEletricas")->middleware(CheckSession::class);
Route::get("/cadastraEPSGas","EpsProcessoController@cadastraOuEditaGas")->name("cadastraOuEditaGas")->middleware(CheckSession::class);
Route::get("/cadastraEPSPosicaoSoldagem","EpsProcessoController@cadastraOuEditaPosicaoSoldagem")->name("cadastraOuEditaPosicaoSoldagem")->middleware(CheckSession::class);
Route::get("/getEPSMetalAdicao/{id}","EpsProcessoController@getMetalAdicao")->name("getMetalAdicao")->middleware(CheckSession::class);
Route::delete("/deleteEPSMetalAdicao/{id}","EpsProcessoController@deleteMetalAdicao")->name("deleteMetalAdicao")->middleware(CheckSession::class);
Route::get("/getEPSMaterialBase/{id}","EpsProcessoController@getMaterialBase")->name("getMaterialBase")->middleware(CheckSession::class);
Route::delete("/deleteEPSMaterialBase/{id}","EpsProcessoController@deleteMaterialBase")->name("deleteMaterialBase")->middleware(CheckSession::class);