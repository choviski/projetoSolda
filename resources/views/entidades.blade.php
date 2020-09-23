
@extends('../../layouts/padraonovo')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->

        <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
            <hr>
            <p class="lead">Gerenciar entidades:</p>
        </div>
        <!-- Conteudo da CRUD -->

        <div class="container-fluid">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/cidade" class="text-dark">
                        <i class="fas fa-city fa-3x"></i>
                        <h4 class="mt-2">Cidade</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/contato" class="text-dark">
                        <i class="fas fa-calendar-week fa-3x"></i>
                        <h4 class="mt-2">Contato</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/empresa" class="text-dark">
                        <i class="fas fa-industry fa-3x"></i>
                        <h4 class="mt-2">Empresa</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/contatoEmpresa" class="text-dark">
                        <i class="fas fa-industry fa-3x"></i>
                        <i class="fas fa-calendar-week fa-3x"></i>
                        <h4 class="mt-2">Contato-Empresa</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/endereco" class="text-dark">
                        <i class="fas fa-map-pin fa-3x"></i>
                        <h4 class="mt-2">Endereço</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/inspetor" class="text-dark">
                        <i class="fas fa-hard-hat fa-3x"></i>
                        <h4 class="mt-2">Inspetor</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/norma" class="text-dark">
                        <i class="fas fa-scroll fa-3x"></i>
                        <h4 class="mt-2">Norma</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/normaqualificacao" class="text-dark">
                        <i class="fas fa-scroll fa-3x"></i>
                        <i class="fas fa-certificate fa-3x"></i>
                        <h4 class="mt-2">Norma-Qualificação</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/processo" class="text-dark">
                        <i class="fas fa-chart-line fa-3x"></i>
                        <h4 class="mt-2">Processos</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/qualificacao" class="text-dark">
                        <i class="fas fa-certificate fa-3x"></i>
                        <h4 class="mt-2">Qualificação</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/soldador" class="text-dark">
                        <i class="fas fa-fire-alt fa-3x"></i>
                        <h4 class="mt-2">Soldador</h4>
                    </a>
                </div>
                <div class="col-md-3 col-sm12 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                    <a href="/soldadorqualificacao" class="text-dark">
                        <i class="fas fa-fire-alt fa-3x"></i>
                        <i class="fas fa-certificate fa-3x"></i>
                        <h4 class="mt-2">Soldador-Qualificação</h4>
                    </a>
                </div>
            </div>

        </div>






@endsection
