@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Avaliar Requalificações:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-8 col-12">
            <!--Aqui começa o Foreach e plau, ali nas informações da linha 12 da pra mudar para outras que achar mais relevante. -->
                <div class="row d-flex justify-content-between mt-2 p-2 bg-white rounded shadow-sm">
                    <a> Nome Soldador | Processo | Data de expiração</a>
                    <span>
                        <button class="ml-1 btn btn-secondary btn-sm" type="button">Avaliar requisição</button>
                    </span>
                </div>
            <!--Aqui acaba o Foreach e plau -->
        </div>
    </div>
@endsection