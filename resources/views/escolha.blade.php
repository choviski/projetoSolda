@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_cadastro{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
    </style>
    <div class="col-12  bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">CADASTRAR EMPRESA/SOLDADOR:</p>
    </div>
    <div class="container-fluid">
        <div class="row text-center d-flex justify-content-center">
            <form action="{{route("inserirQualificacao")}}" class="text-decoration-none col-12 col-sm-8 col-md-8  rounded mb-2 ml-md-1  pt-4 mt-3 p-0" method="post">
                @csrf
                <input type="hidden" name="soldador" value="{{$soldador}}">
                <input type="submit" style="height: 150px; font-size: 1.5rem" class="mt-2 text-bottom btn btn-outline-light text-dark col-12" value="Adicionar outra qualificação">

            </form>
        </div>
        <div class="row text-center d-flex justify-content-center">
            <a href="{{route("paginaInicial")}}" class="text-dark text-decoration-none col-12 col-sm-8 col-md-8 btn btn-outline-light mt-4 d-flex align-items-center justify-content-center" style="height: 150px;">
                <p class="mt-2" style="font-size: 1.5rem">Terminar cadastro</p>
            </a>
        </div>
    </div>
@endsection