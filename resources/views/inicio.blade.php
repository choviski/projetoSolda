@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">INÍCIO:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-8 col-12 ">
            @if(!is_null($soldadorqualificacaos))
                @foreach($soldadorqualificacaos as $soldadorqualificacao)
                    <div class="row d-flex justify-content-md-between justify-content-sm-center mt-2 p-2 bg-white rounded shadow-sm mb-1 ">
                        <span>
                            <div>
                                 <img src="@if($soldadorqualificacao->soldador->foto){{asset($soldadorqualificacao->soldador->foto)}}@else{{asset("imagens/soldador_default.png")}}@endif" width="100px" height="100px" class="rounded-circle border">

                            </div>
                            <a> @if($usuario->tipo==1)
                                    {{$soldadorqualificacao->soldador->empresa->nome_fantasia}} | {{$soldadorqualificacao->soldador->nome}} | {{$soldadorqualificacao->cod_rqs}}
                                @else
                                    {{$soldadorqualificacao->soldador->nome}} | {{$soldadorqualificacao->soldador->matricula}} | {{$soldadorqualificacao->cod_rqs}}
                                @endif
                            </a>
                        </span>
                        <!--IF para checar o status do soldador-->
                        @if($soldadorqualificacao->status=="em-processo")
                            <span class="d-flex justify-content-center flex-column">
                                <div>
                                   <form method="post" action="{{route("requalificar")}}" class="form-group">
                                        <label class="h5"><span class="badge badge-primary text-white">Pendente</span></label>
                                        @csrf
                                        <input type="hidden" value="{{$soldadorqualificacao->id}}" name="soldadorQualificacao">
                                        <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar" disabled>
                                        <i class="fas fa-envelope ml-1"></i>@if($soldadorqualificacao->aviso==0)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                    </form>
                                </div>
                                <div>
                                   <p>Tentativas de requalificação: {{$reprovacoes[$loop->index]}}</p>
                                </div>
                            </span>
                        @elseif($soldadorqualificacao->status=="atrasado")
                            <span class="d-flex justify-content-center flex-column">
                                <div>
                                    <form method="post" action="{{route("requalificar")}}" class="form-group">
                                        <label class="h5"><span class="badge badge-warning text-white">Atrasado</span></label>
                                        @csrf
                                        <input type="hidden" value="{{$soldadorqualificacao->id}}" name="soldadorQualificacao">
                                        <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                        <i class="fas fa-envelope ml-1"></i>@if($soldadorqualificacao->aviso==0)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                    </form>
                                </div>
                                <div>
                                   <p>Tentativas de requalificação: {{$reprovacoes[$loop->index]}}</p>
                                 </div>
                            </span>
                        @elseif($soldadorqualificacao->status=="nao-qualificado")
                            <span class="d-flex justify-content-center flex-column">
                                <div>
                                    <form method="post" action="{{route("requalificar")}}" class="form-group">
                                        <label class="h5"><span class="badge badge-danger text-white">Não qualificado!</span></label>
                                        @csrf
                                        <input type="hidden" value="{{$soldadorqualificacao->id}}" name="soldadorQualificacao">
                                        <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                        <i class="fas fa-envelope ml-1"></i>@if($soldadorqualificacao->aviso==0)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                    </form>
                               </div>
                                <div>
                                    <p>Tentativas de requalificação: {{$reprovacoes[$loop->index]}}</p>
                                </div>
                            </span>
                        @endif

                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection