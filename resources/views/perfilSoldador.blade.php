@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .codigoQualificacao {
            text-align: center;
            padding: 0.5rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 18px;
            background-color: #eeeeee;
        }

        #nav_soldadores {
            text-decoration: underline;
            font-weight: bold;
        }

        #nav_entidades {
            text-decoration: none;
            font-weight: normal;
        }

        .formDelBtn {
            position: relative;
            transition: 0.3s ease;
        }

        .delBtn {
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top: 0px;
            right: 13px;
            z-index: 1;
            background-color: white;
            color: #d92b2b;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(-20%);
            align-items: center;
            text-align: center;
            transition: 0.3s ease;
            border-style: solid;
            border-width: 1px;
            border-color: #d92b2b;
        }

        .delBtn:hover {
            background-color: #d92b2b;
            color: white;
        }

        .formEditBtn {
            position: relative;
        }

        .editBtn {
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top: 0px;
            right: 43px;
            z-index: 1;
            background-color: white;
            color: #0c7eab;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(-20%);
            align-items: center;
            text-align: center;
            border-style: solid;
            border-width: 1px;
            border-color: #0c7eab;
            transition: 0.3s ease;

        }

        .editBtn:hover {
            background-color: #0c7eab;
            color: white;
        }


    </style>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-8 col-sm-10 mt-3 p-0 rounded-bottom ad-margin ">
        <div class="wrapSoldadorCard popin">
            @if($usuario->tipo==1)
                <div class="formDelBtn">
                    <form method="post" action="{{route("soldador.remover",['id'=>$soldador->id])}}"
                          onsubmit="return confirm('Tem certeza que deseja excluir {{$soldador->nome}} ?')">
                        @csrf
                        @method('DELETE')
                        <button class="delBtn"><i class="fas fa-times"></i></button>
                    </form>
                </div>
                <div class="formEditBtn">
                    <form method="get" action="{{route("soldador.edit",['soldador'=>$soldador->id])}}">
                        @csrf
                        <button class="editBtn"><i class="fas fa-pen"></i></button>
                    </form>
                </div>
            @endif
            <div id="soldadorCard" class="col-12 bg-white rounded shadow-sm mt-2">
                <div id="soldadorInfo" class="col-12 pt-3 d-flex ">
                    <div id="imagemSoldador">
                        <img src="{{asset($soldador->foto)}}"
                             onerror="this.onerror=null;this.src='{{asset("imagens/soldador_default.png")}}';"
                             class="rounded-circle border" width="150px" height="150px">
                    </div>
                    <div id="informacaoSoldador" class="d-flex flex-column p-3">
                        <p class="p-0 font-weight-light" style="font-size: 22px">Nome: {{$soldador->nome}}</p>
                        <p class="p-0 font-weight-light" style="font-size: 22px">CPF: {{$soldador->cpf}}</p>
                        <p class="p-0 font-weight-light" style="font-size: 22px">Matrícula: {{$soldador->matricula}}</p>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <hr class="p-0 m-0 mb-1">
                    <p class="lead p-1 m-0" style="font-size: 22px">QUALIFICAÇÕES:</p>
                </div>
            </div>
        </div>
        @if($usuario->tipo==1)
            <div id="addQualificacao" class="col-12 mt-2 p-0 popin">
                <form method="post" action="{{route("novaQualificacao")}}">
                    @csrf
                    <input type="hidden" name="soldador" id="soldador" value="{{$soldador->id}}">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light"
                           value="Adicionar qualificação">
                </form>
            </div>
        @endif
        @if($usuario->tipo==2)
            <div id="addQualificacao" class="col-12 mt-2 p-0 popin">
                <form method="get" action="{{route("requisitarQualificacao")}}">
                    @csrf
                    <input type="hidden" name="idEmpresa" id="idEmpresa" value="{{$usuario->empresa->id}}">
                    <input type="hidden" name="soldador" id="soldador" value="{{$soldador->id}}">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light"
                           value="Requisitar cadastro de qualificação">
                </form>
            </div>
        @endif
        @foreach($qualificacoes as $qualificacao)
            <!-- Lista de qualificações do Soldador -->
            <div class="popin">
                @if($usuario->tipo==1)
                    <div class="formDelBtn">
                        <form method="post" action="{{route("soldadorqualificacao.remover",['id'=>$qualificacao->id])}}"
                              onsubmit="return confirm('Tem certeza que deseja excluir a qualificação de código {{$qualificacao->cod_rqs}} ?')">
                            @csrf
                            @method('DELETE')
                            <button class="delBtn"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                    <div class="formEditBtn">
                        <form method="post" action="{{route("editarQualificacaoSoldador",['id'=>$qualificacao->id])}}">
                            @csrf
                            @method('PUT')
                            <button class="editBtn"><i class="fas fa-pen"></i></button>
                        </form>
                    </div>
                @endif
                <div id="qualificacoes"
                     class="col-12 bg-white rounded shadow-sm mt-3 mb-1 d-flex justify-content-between ">
                    <div id="infoDireita" class="d-flex flex-column p-2 pt-3">
                        <p class="border mb-0 mt-2 codigoQualificacao">{{$qualificacao->qualificacao->eps->nome}}</p>
                        <p class="font-weight-light pt-1 mt-0 mb-0">Data
                            Validade: {{$qualificacao->validade_qualificacao}}</p>
                        <!-- a class="font-weight-light pt-1 mt-0 mb-0" style="text-decoration: none;cursor: pointer;" onclick="getFile('{ {asset($qualificacao->caminho_certificado)}}','{ {$qualificacao->nome_certificado}}');downloadAll(window.links)"><i class="fas fa-file-download"></i> Download certificado</a-->
                        <a class="font-weight-light pt-1 mt-0 mb-0" style="text-decoration: none;cursor: pointer;"
                           onclick="certificadoAjax({{$qualificacao->id}});getFile('{{asset($qualificacao->caminho_certificado)}}','{{$qualificacao->nome_certificado}}');downloadAll(window.links)"><i
                                    class="fas fa-file-download"></i> Download certificado</a>

                    </div>

                    <div id="infoEsquerda" class="d-flex flex-column p-2 pt-1 pb-1 text-left">
                        <!-- Aqui vai o IF para setar o status da Badge -->
                        @if($qualificacao->status=="em-processo")
                            <span class="d-flex justify-content-end mb-0 pb-0">
                    <p class="text-right bg-primary rounded p-1 text-white mb-1">Em Avaliação</p>
                </span>
                            @if($usuario->tipo==2)
                                <form method="post" action="{{route("requalificar")}}"
                                      class="d-flex justify-content-end">
                                    @csrf
                                    <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao"
                                           value="{{$qualificacao->id}}">
                                    <input type="submit" class="btn btn-secondary" value="Requalificar" disabled>
                                    <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                                </form>
                            @elseif($usuario->tipo==1)
                                <form method="post" action="{{route("avaliarRequalificacao")}}"
                                      class="d-flex justify-content-end">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{$qualificacao->id}}">
                                    <input type="submit" class="btn btn-secondary" value="Avaliar">
                                    <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                                </form>
                            @endif
                        @elseif($qualificacao->status=="qualificado")
                            <span class="d-flex justify-content-end mb-0 pb-0">
                        <p class="text-right bg-success rounded p-1 text-white mb-1">Qualificado</p>
                    </span>
                            @if($usuario->tipo!=3)
                                <form method="post" action="{{route("requalificar")}}"
                                      class="form-group d-flex justify-content-end">
                                    @csrf
                                    <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao"
                                           value="{{$qualificacao->id}}">
                                    <input type="submit" class="btn btn-secondary" value="Requalificar">
                                    <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                                </form>
                            @endif
                        @elseif($qualificacao->status=="nao-qualificado")
                            <span class="d-flex justify-content-end mb-0 pb-0">
                        <p class="text-right bg-danger rounded p-1 text-white mb-1">Não Qualificado</p>
                    </span>
                            <form method="post" action="{{route("requalificar")}}"
                                  class="form-group d-flex justify-content-end">
                                @csrf
                                <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao"
                                       value="{{$qualificacao->id}}">
                                <input type="submit" class="btn btn-secondary" value="Requalificar">
                                <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                            </form>
                        @elseif($qualificacao->status=="atrasado")
                            <span class="d-flex justify-content-end mb-0 pb-0">
                        <p class="text-right bg-warning rounded p-1 text-white mb-1">Atrasado</p>
                    </span>
                            <form method="post" action="{{route("requalificar")}}"
                                  class="form-group d-flex justify-content-end">
                                @csrf
                                <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao"
                                       value="{{$qualificacao->id}}">
                                <input type="submit" class="btn btn-secondary" value="Requalificar">
                                <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                            </form>
                        @endif
                        <!-- Aqui terminha o IF para setar o status da Badge -->
                        <p class="text-right">Tentativas de Requalificação: 0</p>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Fim da lista de qualificações -->
        @if(isset($rota))
            @if($rota=="hubSoldadores")
                <a href="{{route("hubSoldadores")}}">
                    <button class="btn btn-outline-light mt-2 mb-2 text-dark col-12"><i class="fas fa-arrow-left"></i>
                        Voltar
                    </button>
                </a>
            @elseif($rota=="listarSoldador")
                <form method="post" action="{{Route("listarSoldador",['id'=>$empresa])}}">
                    @csrf
                    <input type="hidden" id="id_empresa" name="id_empresa" value="{{$empresa}}">
                    <button class="btn btn-outline-light mt-2 mb-2 text-dark col-12"><i class="fas fa-arrow-left"></i>
                        Voltar
                    </button>
                </form>
            @elseif($rota=="soldadoresFiltrados")
                <form method="post" action="{{Route("soldadoresFiltrados")}}">
                    @csrf
                    <input type="hidden" id="nomeSoldador" name="nomeSoldador" value="{{$nomeSoldador}}">
                    <button class="btn btn-outline-light mt-2 mb-2 text-dark col-12"><i class="fas fa-arrow-left"></i>
                        Voltar
                    </button>
                </form>
            @endif
        @else
            <a href="{{route("hubSoldadores")}}">
                <button class="btn btn-outline-light mt-2 mb-2 text-dark col-12"><i class="fas fa-arrow-left"></i>
                    Voltar
                </button>
            </a>
        @endif
    </div>
    <div id="download"></div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"
    >
    </script>
    <script>
        var nome_certificado = "";
        var links = [];

        function getFile(caminho, nome) {
            links = [caminho];
            nome_certificado = nome;
        }

        function downloadAll(urls) {
            var link = document.createElement('a');
            link.setAttribute('download', nome_certificado);
            link.style.display = 'none';
            document.body.appendChild(link);
            for (var i = 0; i < urls.length; i++) {
                link.setAttribute('href', urls[i]);
                link.click();
            }
            document.body.removeChild(link);
            links = [];
        }
    </script>
    <script>
        function certificadoAjax(idQualificacao) {
            var linkAjax = '{{route("certificadoAjax",":id")}}';
            linkAjax = linkAjax.replace(':id', idQualificacao);
            $.ajax({
                url: linkAjax,
                type: 'get',
            })
                .done(function (data) {
                    console.log(data);
                    links = data.certificados;
                    urls = window.links;
                    var link = document.createElement('a');
                    link.setAttribute('download', "Certificado");
                    link.style.display = 'none';
                    document.body.appendChild(link);
                    for (var i = 0; i < urls.length; i++) {
                        // no site da infosolda fica como: link.setAttribute('href','https://infosolda.com.br/rastrea'+ urls[i]);
                        link.setAttribute('href', 'https://infosolda.com.br/rastrea' + urls[i]);
                        // local host fica como: link.setAttribute('href',urls[i]);
                        link.click();
                    }
                    document.body.removeChild(link);
                    links = [];

                })
                .fail(function (jqHXR, ajaxOptions, thrownError) {
                    alert("Erro ao baixar certificado.")
                })
            idQualificacao = 0;
            linkAjax = "";
        }</script>
@endsection
