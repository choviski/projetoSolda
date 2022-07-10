@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .styleNomeQualificacao{
            text-align: center;
            padding: 0.5rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 18px;
            background-color: #eeeeee;
        }
        .nomeEmpresa{
            position: relative;
            top:34px;
            left: -1px;
            margin-bottom: 0px;
            background-color: white;
            width:auto;
            display:inline-block;
            padding: 0 0.5vw 0 0.5vw;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            text-decoration: underline;
            text-align: center;
        }
        #nav_requalificacao{
            text-decoration: none;
            font-weight: bold;
        }
        #nav_requisicoes{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
        .ativo{
            background-color: #EEEEEE;
            text-decoration: underline;
        }
        .listagem_ativa{
            display:block;
        }
        .listagem_inativa{
            display:none;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">REQUISIÇÕES</p>
    </div>
    <div class="col-12 p-0 bg-white text-center d-md-flex shadow-sm rounded-bottom border-top">
        <div class="col-md-4 col-sm-12 border p-2 ativo" id="requisicoes_soldador" style="font-size: 16px; cursor: pointer" onclick="mostrarSoldadores()">
            <span style="position: relative">SOLDADORES
                @if((\App\Soldador::where('criado',0)->count()) > 0)
                    <div class="warpNotificacao" style="right:-15px">
                        <p class="notificacao">{{\App\Soldador::where('criado',0)->count()}}</p>
                    </div>
                @endif
            </span>
        </div>
        <div class="col-md-4 col-sm-12 border p-2" id="requisicoes_eps" style="font-size: 16px; cursor: pointer" onclick="mostrarEps()">
            <span style="position: relative">EPS
                @if((\App\Eps::where('criado',0)->count()) > 0)
                    <div class="warpNotificacao" style="right:-15px">
                        <p class="notificacao">{{\App\Eps::where('criado',0)->count()}}</p>
                    </div>
                @endif
            </span>
        </div>
        <div class="col-md-4 col-sm-12 border p-2" id="requisicoes_qualificacao" style="font-size: 16px; cursor: pointer" onclick="mostrarQualificacoes()">
            <span style="position: relative">QUALIFICAÇÕES
                @if((\App\SoldadorQualificacao::where('criado',0)->count()) > 0)
                    <div class="warpNotificacao" style="right:-15px">
                        <p class="notificacao">{{\App\SoldadorQualificacao::where('criado',0)->count()}}</p>
                    </div>
                @endif
            </span>
        </div>
    </div>

    <div id="listagem_soldador" class="listagem_ativa">
        @foreach($soldadores as $soldador)
        <div class="container-fluid d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <div id="dadosRequalificacoes">
                    <div class="popin">
                        <p class="nomeEmpresa" style="z-index: 1">{{$soldador->empresa->razao_social}}</p>
                        <div class="row d-flex justify-content-between p-2 bg-white rounded shadow-sm form-inline " style="margin-top: 30px ">
                            <div class="">
                                <div>
                                    <img src="@if($soldador->foto){{asset($soldador->foto)}} @else{{asset("imagens/soldador_default.png")}}@endif" onerror="this.onerror=null;this.src='{{asset("imagens/soldador_default.png")}}';" width="100px" height="100px" class="rounded-circle border">
                                </div>
                                <p class="styleNomeQualificacao mb-md-0 mb-sm-1 mt-2"> {{$soldador->nome}}</p>
                            </div>
                            <div>
                                <form method="post" action="{{route("avaliarRequisicao")}}" class="form-group">
                                    @csrf
                                    <input type="hidden" value="{{$soldador->id}}" name="id">
                                    <input type="submit" class="mt-2 col-12 btn btn-primary pt-2 pb-2 pl-3 pr-3 shadow-sm" value="Avaliar Cadastro">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div id="listagem_eps" class="listagem_inativa">
        @foreach($epss as $eps)
        <div class="container-fluid d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <div id="dadosRequalificacoes">
                    <div class="popin">
                        <p class="nomeEmpresa" style="z-index: 1">{{$eps->empresa->razao_social}}</p>
                        <div class="row d-flex justify-content-between p-2 bg-white rounded shadow-sm form-inline " style="margin-top: 30px ">
                            <div class="">                           
                                <p class="styleNomeQualificacao mb-md-0 mb-sm-1 mt-2"> {{$eps->nome}}</p>
                            </div>
                            <div>
                                <form method="post" action="{{route("avaliarRequisicaoEps")}}" class="form-group">
                                    <!--  -->
                                    @csrf
                                    <input type="hidden" value="{{$eps->id}}" name="id">
                                    <input type="submit" class="mt-2 col-12 btn btn-primary pt-2 pb-2 pl-3 pr-3 shadow-sm" value="Avaliar Cadastro">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div id="listagem_qualificacao" class="listagem_inativa">
    @foreach($qualificacaos as $qualificacao)
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-8 col-12">
            <div id="dadosRequalificacoes">
                <div class="popin">
                    <p class="nomeEmpresa" style="z-index: 1">{{$qualificacao->soldador->empresa->razao_social}}</p>
                    <div class="row d-flex justify-content-between p-2 bg-white rounded shadow-sm form-inline " style="margin-top: 30px ">
                        <div class="">                           
                            <p class="styleNomeQualificacao mb-md-0 mb-sm-1 mt-2">Código RQS: {{$qualificacao->cod_rqs}}</p>
                            <p class="styleNomeQualificacao mb-md-0 mb-sm-1 mt-2">Nome Soldador: {{$qualificacao->soldador->nome}}</p>
                        </div>
                        <div>
                            <form method="post" action="{{route("avaliarRequisicaoQualificacao")}}" class="form-group">
                                <!--  -->
                                @csrf
                                <input type="hidden" value="{{$qualificacao->id}}" name="id">
                                <input type="submit" class="mt-2 col-12 btn btn-primary pt-2 pb-2 pl-3 pr-3 shadow-sm" value="Avaliar Cadastro">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>

    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"
    >
    </script>

    <script>
        function removeClasses(){
            document.getElementById("requisicoes_soldador").classList.remove("ativo");
            document.getElementById("requisicoes_eps").classList.remove("ativo");
            document.getElementById("requisicoes_qualificacao").classList.remove("ativo");
            
            document.getElementById("listagem_soldador").classList.remove("listagem_ativa");
            document.getElementById("listagem_eps").classList.remove("listagem_ativa");
            document.getElementById("listagem_qualificacao").classList.remove("listagem_ativa");

            document.getElementById("listagem_soldador").classList.add("listagem_inativa");
            document.getElementById("listagem_eps").classList.add("listagem_inativa");
            document.getElementById("listagem_qualificacao").classList.add("listagem_inativa");
        }

        function mostrarSoldadores(){
            removeClasses();            
            document.getElementById("listagem_soldador").classList.remove("listagem_inativa");
            document.getElementById("listagem_soldador").classList.add("listagem_ativa");
            document.getElementById("requisicoes_soldador").classList.add("ativo");            
        }

        function mostrarEps(){
            removeClasses();            
            document.getElementById("listagem_eps").classList.remove("listagem_inativa");
            document.getElementById("listagem_eps").classList.add("listagem_ativa");
            document.getElementById("requisicoes_eps").classList.add("ativo");  
        }

        function mostrarQualificacoes(){
            removeClasses();            
            document.getElementById("listagem_qualificacao").classList.remove("listagem_inativa");
            document.getElementById("listagem_qualificacao").classList.add("listagem_ativa");
            document.getElementById("requisicoes_qualificacao").classList.add("ativo");  
        }
    </script>

@endsection