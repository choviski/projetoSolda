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
            <div class="col-8 col-sm-2 col-md-8  rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                <a href="{{route("selecionarEmpresa")}}" class="text-dark text-decoration-none" >
                    <i class="fas fa-plus"></i> <i class="fas fa-fire fa-3x"></i>
                    <h4 class="mt-2">Soldador</h4>
                </a>
            </div>

        </div>
        <div class="row text-center d-flex justify-content-center">
            <div class="col-8 col-sm-2 col-md-8 rounded mb-2 ml-md-1  pt-4 mt-3 text-center shadow-md  btn btn-outline-light rounded" style="height: 150px">
                <a href="{{route("inserirEmpresa")}}" class="text-dark text-decoration-none">
                    <i class="fas fa-plus"></i> <i class="fas fa-industry fa-4x"></i>
                    <h4 class="mt-2">Empresa</h4>
                </a>
            </div>
        </div>
    </div>
@endsection