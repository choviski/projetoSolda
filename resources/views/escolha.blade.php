@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12  bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Cadastrar Soldador/Empresa:</p>
    </div>
    <div class="container-fluid">
        <div class="row text-center d-flex justify-content-center">
            <div class="col-8 col-sm-2 col-md-8  rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                <form action="{{route("inserirQualificacao")}}" class="text-dark text-decoration-none" method="post">
                    @csrf
                    <i class="fas fa-plus fa-3x"></i>
                    <input type="hidden" name="soldador" value="{{$soldador}}">
                    <input type="submit" class="mt-2 btn btn-outline-primary" value="Adicionar mais qualificações">
                </form>
            </div>

        </div>
        <div class="row text-center d-flex justify-content-center">
            <div class="col-8 col-sm-2 col-md-8 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                <a href="{{route("paginaInicial")}}" class="text-dark text-decoration-none">
                    <i class="fas fa-check fa-4x"></i>
                    <h4 class="mt-2">Cadastrar</h4>
                </a>
            </div>
        </div>
    </div>
@endsection