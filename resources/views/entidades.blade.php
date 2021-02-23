
@extends('../../layouts/padraonovo')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->

        <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
            <hr class="p-0 m-0 mb-1">
            <p class="lead p-1 m-0" style="font-size: 22px">GERENCIAR ENTIDADES:</p>
        </div>
        <!-- Conteudo da CRUD -->

        <div class="container-fluid">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-md-9 col-sm-12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="{{route("dashboard")}}" class="text-dark">
                        <i class="fas fa-chart-line fa-3x"></i>
                        <h4 class="mt-2">Dados</h4>
                    </a>
                </div>
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
                        <i class="fas fa-chart-line fa-3x"></i>
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






@endsection
