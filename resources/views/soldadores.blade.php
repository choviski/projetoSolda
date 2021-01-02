@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Soldadores:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-8 col-12">
            @if(!is_null($soldadores))
                @if($usuario->tipo==1)
                    @foreach($soldadores as $soldador)
                        <div class="row d-flex justify-content-between mt-2 p-2 bg-white rounded shadow-sm">
                            <a> {{$soldador->soldador->empresa->nome_fantasia}} | {{$soldador->soldador->nome}} </a>
                            <!--IF para checar o status do soldador-->
                            @if($soldador->status=="qualificado")
                                <span class="d-flex justify-content-center">
                                    <form method="post" action="{{route("requalificar")}}" class="form-group">
                                        <label class="h5"><span class="badge badge-success text-white">Qualificado!</span></label>
                                        @csrf
                                        <input type="hidden" value="{{$soldador->id}}" name="soldadorQualificacao">
                                        <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                    </form>
                                    <i class="fas fa-envelope ml-1"></i>@if($soldador->soldador->aviso==1)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                 </span>
                            @elseif($soldador->status=="em-processo")
                                <span class="d-flex justify-content-center">
                                    <form method="post" action="{{route("requalificar")}}" class="form-group">
                                        <label class="h5"><span class="badge badge-primary text-white">Pendente</span></label>
                                        @csrf
                                        <input type="hidden" value="{{$soldador->id}}" name="soldadorQualificacao">
                                        <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar" disabled>
                                    </form>
                                    <i class="fas fa-envelope ml-1"></i>@if($soldador->soldador->aviso==1)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                </span>
                            @elseif($soldador->status=="atrasado")
                                <span class="d-flex justify-content-center">
                                    <form method="post" action="{{route("requalificar")}}" class="form-group">
                                        <label class="h5"><span class="badge badge-warning text-white">Atrasado</span></label>
                                        @csrf
                                        <input type="hidden" value="{{$soldador->id}}" name="soldadorQualificacao">
                                        <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                    </form>
                                    <i class="fas fa-envelope ml-1"></i>@if($soldador->soldador->aviso==1)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                </span>
                            @elseif($soldador->status=="nao-qualificado")
                                <span class="d-flex justify-content-center">
                                    <form method="post" action="{{route("requalificar")}}" class="form-group">
                                        <label class="h5"><span class="badge badge-danger text-white">Não qualificado!</span></label>
                                        @csrf
                                        <input type="hidden" value="{{$soldador->id}}" name="soldadorQualificacao">
                                        <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                    </form>
                                    <i class="fas fa-envelope ml-1"></i>@if($soldador->soldador->aviso==1)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                </span>
                            @endif
                        </div>
                    @endforeach
                @elseif($usuario->tipo==2)
                    @foreach($soldadores as $soldador)
                        <div class="row d-flex justify-content-between mt-2 p-2 bg-white rounded shadow-sm">
                            <a> @if($usuario->tipo==1){{$soldador[0]->soldador->empresa->nome_fantasia}} |@endif
                                {{$soldador[0]->soldador->nome}} |
                                @if($usuario->tipo==2){{$soldador[0]->soldador->matricula}} @endif
                            </a>
                            <!--IF para checar o status do soldador-->
                            @if($soldador[0]->status=="qualificado")
                                <span class="d-flex justify-content-center">
                                   @if($usuario->tipo==3)
                                        <a class="h5"><span class="badge badge-success text-white">Qualificado</span></a>
                                        <button class="ml-1 btn btn-secondary btn-sm " type="button" >Requalificar</button>
                                   @else
                                        <form method="post" action="{{route("requalificar")}}" class="form-group">
                                            <label class="h5"><span class="badge badge-success text-white">Qualificado!</span></label>
                                            @csrf
                                            <input type="hidden" value="{{$soldador[0]->id}}" name="soldadorQualificacao">
                                            <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                        </form>
                                   @endif
                                    <i class="fas fa-envelope ml-1"></i>@if($soldador[0]->soldador->aviso==1)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                </span>
                            @elseif($soldador[0]->status=="em-processo")
                                <span class="d-flex justify-content-center">
                                    @if($usuario->tipo==3)
                                        <a class="h5"><span class="badge badge-primary text-white">Pendente</span></a>
                                        <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                                    @else
                                        <form method="post" action="{{route("requalificar")}}" class="form-group">
                                            <label class="h5"><span class="badge badge-primary text-white">Pendente</span></label>
                                            @csrf
                                            <input type="hidden" value="{{$soldador[0]->id}}" name="soldadorQualificacao">
                                            <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar" disabled>
                                        </form>
                                    @endif
                                    <i class="fas fa-envelope ml-1"></i>@if($soldador[0]->soldador->aviso==1)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                </span>
                            @elseif($soldador[0]->status=="atrasado")
                                <span class="d-flex justify-content-center">
                                    @if($usuario->tipo==3)
                                        <a class="h5"><span class="badge badge-warning text-white">Atrasado</span></a>
                                        <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                                    @else
                                        <form method="post" action="{{route("requalificar")}}" class="form-group">
                                            <label class="h5"><span class="badge badge-warning text-white">Atrasado</span></label>
                                            @csrf
                                            <input type="hidden" value="{{$soldador[0]->id}}" name="soldadorQualificacao">
                                            <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                        </form>
                                    @endif
                                    <i class="fas fa-envelope ml-1"></i>@if($soldador[0]->soldador->aviso==1)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                </span>
                            @elseif($soldador[0]->status=="nao-qualificado")
                                <span class="d-flex justify-content-center">
                                    @if($usuario->tipo==3)
                                        <a class="h5"><span class="badge badge-danger text-white">Não qualificado</span></a>
                                        <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                                    @else
                                        <form method="post" action="{{route("requalificar")}}" class="form-group">
                                            <label class="h5"><span class="badge badge-danger text-white">Não qualificado!</span></label>
                                            @csrf
                                            <input type="hidden" value="{{$soldador[0]->id}}" name="soldadorQualificacao">
                                            <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                        </form>
                                    @endif
                                    <i class="fas fa-envelope ml-1"></i>@if($soldador[0]->soldador->aviso==1)<i class="fas fa-check ml-1"></i> @else<i class="fas fa-times ml-1"></i>@endif
                                </span>
                            @endif

                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>


@endsection