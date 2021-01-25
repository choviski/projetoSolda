@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_requalificacao{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">REQUALIFICAÇÕES:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-8 col-12">
            @foreach($requalificacaos as $requalificacao)
                <div class="row d-flex justify-content-between mt-2 p-2 bg-white rounded shadow-sm form-inline">
                    <span>
                        <div>
                            <img src="@if($requalificacao->soldador->foto){{asset($requalificacao->soldador->foto)}}@else{{asset("imagens/soldador_default.png")}}@endif" width="100px" height="100px" class="rounded-circle border">

                        </div>
                    <a> {{$requalificacao->soldador->nome}} | Cod. RQS:{{$requalificacao->cod_rqs}}
                    </a>
                        </span>
                    <span>
                        <form method="post" action="{{route("avaliarRequalificacao")}}" class="form-group">
                            @csrf
                            <input type="hidden" value="{{$requalificacao->id}}" name="id">
                            <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Avaliar">
                        </form>
                    </span>
                </div>
            @endforeach

        </div>
    </div>
@endsection