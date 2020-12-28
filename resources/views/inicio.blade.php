@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Início:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-8 col-12">
            @foreach($soldadorqualificacaos as $soldadorqualificacao)
                <div class="row d-flex justify-content-between mt-2 p-2 bg-white rounded shadow-sm">
                    <a> @if($usuario->tipo==1){{$soldadorqualificacao->soldador->empresa->nome_fantasia}} |@endif
                        {{$soldadorqualificacao->soldador->nome}} |
                        @if($usuario->tipo==2){{$soldadorqualificacao->soldador->matricula}} @endif
                    </a>
                    <!--IF para checar o status do soldador-->
                    @if($soldadorqualificacao->status=="em-processo")
                        <span>
                            <a class="h5"><span class="badge badge-primary text-white">Pendente</span></a>
                            @if($usuario->tipo==2)
                                <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                            @else
                                <form method="post" action="{{route("requalificar")}}">
                                    @csrf
                                    <input type="hidden" value="{{$soldadorqualificacao->id}}" name="soldadorQualificacao">
                                    <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="requalificar">
                            @endif

                        </span>
                    @elseif($soldadorqualificacao->status=="atrasado")
                        <span>
                            <a class="h5"><span class="badge badge-warning text-white">Atrasado</span></a>
                           @if($usuario->tipo==2)
                                <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                            @else
                                <form method="post" action="{{route("requalificar")}}">
                                    @csrf
                                    <input type="hidden" value="{{$soldadorqualificacao->id}}" name="soldadorQualificacao">
                                    <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="requalificar">
                            @endif

                        </span>
                    @elseif($soldadorqualificacao->status=="nao-qualificado")
                        <span>
                            <a class="h5"><span class="badge badge-danger text-white">Não qualificado!</span></a>
                            @if($usuario->tipo==2)
                                <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                            @else
                                <form method="post" action="{{route("requalificar")}}">
                                    @csrf
                                    <input type="hidden" value="{{$soldadorqualificacao->id}}" name="soldadorQualificacao">
                                    <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="requalificar">
                                </form>
                            @endif

                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection