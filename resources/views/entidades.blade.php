
@extends('../../layouts/padraonovo')

@section('content')

        <style>
            #warpMoreOptions{
                position: fixed;
                bottom: 0%;
                width:100%;
                height:40px;
                padding: 0px;

            }
            .more-options{
                background-color:rgba(255,255,255,0.3);
            }
            .expand-option{
                text-weight:bold;
                text-decoration:none;
                color:black;
                padding-top: 6px;
                padding-bottom:6px;
                margin-bottom:3px;
            }
            .expand-option:hover{
                text-decoration:underline;
                cursor: pointer;
            }
            .options{
                display:none;
            }
            .pop-in{
                animation: pop-in 200ms ease;
            }
            @keyframes pop-in {
            0% {
                opacity: 0;
                transform: translateY(-110px);
            }
            100% {
                opacity: 1;
                transform: translateY(0px);
                color:black;
            }
        }
        </style>
        <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
            <hr class="p-0 m-0 mb-1">
            <p class="lead p-1 m-0" style="font-size: 22px">GERENCIAR ENTIDADES:</p>
        </div>

        <div class="container-fluid mb-3">
            <div class="row text-center d-flex justify-content-center">
                <a href="{{route("dashboard")}}"  class="col-md-5 col-sm-12">
                    <div class="col-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                        <i class="fas fa-chart-line fa-3x text-dark"></i>
                        <h4 class="mt-2 text-dark text-decoration-underline">Dados</h4>
                    </div>
                </a>

                <a href="{{route("controleAcesso")}}" class="col-md-5 col-sm-12">
                    <div class="col-12 rounded mb-2 ml-md-1 mb-ms-1 mt-ms-1 pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                        <i class="fas fa-calendar-alt fa-3x   text-dark"></i>
                        <h4 class="mt-2  text-dark text-decoration-underline">Controle de Acesso</h4>
                    </div>
                </a>

                <a href="{{route("relatorioQualificacao")}}" class="col-md-5 col-sm-12">
                    <div class="col-12 rounded mb-2 ml-md-1 pt-4 mt-3 text-center shadow-md btn btn-outline-light rounded" style="height: 150px">
                        <i class="fas fa-certificate fa-3x text-dark"></i>
                        <h4 class="mt-2 text-dark text-decoration-underline">Relatório das Qualificações</h4>
                    </div>
                </a>

                <a href="{{route("listagemLogin")}}" class="col-md-5 col-sm-12">
                    <div class="col-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                        <i class="fa fa-sign-in fa-3x text-dark"></i>
                        <h4 class="mt-2 text-dark text-decoration-underline">Logins</h4>
                    </div>
                </a>

                <a href="{{route("cadastrarAd")}}" class="col-md-10 col-sm-12">
                    <div class="col-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                        <i class="fa fa-ad  fa-3x text-dark"></i>
                        <h4 class="mt-2 text-dark text-decoration-underline">Anúncios</h4>
                    </div>
                </a>

            </div>

        </div>
        <div id="warpMoreOptions">
            <div class="more-options">
                <div class="container-fluid options" id="options" style="margin-top: 80px">
                    <div class="row text-center d-flex justify-content-center">
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("cidade.index")}}" class="text-dark">
                                <i class="fas fa-city fa-3x"></i>
                                <h4 class="mt-2">Cidade</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("contato.index")}}" class="text-dark">
                                <i class="fas fa-calendar-week fa-3x"></i>
                                <h4 class="mt-2">Contato</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("empresa.index")}}" class="text-dark">
                                <i class="fas fa-industry fa-3x"></i>
                                <h4 class="mt-2">Empresa</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("contatoEmpresa.index")}}" class="text-dark text-decoration-none">
                                <i class="fas fa-industry fa-3x"></i>
                                <i class="fas fa-calendar-week fa-3x"></i>
                                <h4 class="mt-2">Contato-Empresa</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("endereco.index")}}" class="text-dark">
                                <i class="fas fa-map-pin fa-3x"></i>
                                <h4 class="mt-2">Endereço</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("inspetor.index")}}" class="text-dark">
                                <i class="fas fa-hard-hat fa-3x"></i>
                                <h4 class="mt-2">Inspetor</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("norma.index")}}" class="text-dark">
                                <i class="fas fa-scroll fa-3x"></i>
                                <h4 class="mt-2">Norma</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("normaqualificacao.index")}}" class="text-dark text-decoration-none">
                                <i class="fas fa-scroll fa-3x"></i>
                                <i class="fas fa-certificate fa-3x"></i>
                                <h4 class="mt-2">Norma-Qualificação</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("processo.index")}}" class="text-dark">
                                <i class="fas fa-burn fa-3x"></i>
                                <h4 class="mt-2">Processos</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("qualificacao.index")}}" class="text-dark">
                                <i class="fas fa-certificate fa-3x"></i>
                                <h4 class="mt-2">Qualificação</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("soldador.index")}}" class="text-dark">
                                <i class="fas fa-fire fa-3x"></i>
                                <h4 class="mt-2">Soldador</h4>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                            <a href="{{route("soldadorqualificacao.index")}}" class="text-dark text-decoration-none">
                                <i class="fas fa-fire fa-3x"></i>
                                <i class="fas fa-certificate fa-3x"></i>
                                <h4 class="mt-2">Soldador-Qualificação</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
