@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Soldadores:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-8 col-12">
            @foreach($soldadores as $soldador)
                <div class="row d-flex justify-content-between mt-2 p-2 bg-white rounded shadow-sm">
                    <a> @if($usuario->id==1){{$soldador->soldador->empresa->nome_fantasia}} |@endif
                        {{$soldador->soldador->nome}} |
                        @if($usuario->id==2){{$soldador->soldador->matricula}} @endif
                    </a>
                    <!--IF para checar o status do soldador-->
                    @if($soldador->status=="qualificado")
                        <span class="d-flex justify-content-center">

                            @if($usuario->tipo==2)
                                <a class="h5"><span class="badge badge-success text-white">Qualificado</span></a>
                                <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                            @else
                                <form method="post" action="{{route("requalificar")}}" class="form-group">
                                    <label class="h5"><span class="badge badge-success text-white">Qualificado!</span></label>
                                    @csrf
                                    <input type="hidden" value="{{$soldador->id}}" name="soldadorQualificacao">
                                    <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                </form>
                            @endif

                        </span>
                    @elseif($soldador->status=="em-processo")
                        <span class="d-flex justify-content-center">

                            @if($usuario->tipo==2)
                                <a class="h5"><span class="badge badge-primary text-white">Pendente</span></a>
                                <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                            @else
                                <form method="post" action="{{route("requalificar")}}" class="form-group">
                                    <label class="h5"><span class="badge badge-primary text-white">Pendente</span></label>
                                    @csrf
                                    <input type="hidden" value="{{$soldador->id}}" name="soldadorQualificacao">
                                    <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar" disabled>
                                </form>
                            @endif

                        </span>
                    @elseif($soldador->status=="atrasado")
                        <span class="d-flex justify-content-center">

                            @if($usuario->tipo==2)
                                <a class="h5"><span class="badge badge-warning text-white">Atrasado</span></a>
                                <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                            @else
                                <form method="post" action="{{route("requalificar")}}" class="form-group">
                                    <label class="h5"><span class="badge badge-warning text-white">Atrasado</span></label>
                                    @csrf
                                    <input type="hidden" value="{{$soldador->id}}" name="soldadorQualificacao">
                                    <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                </form>
                            @endif

                        </span>
                    @elseif($soldador->status=="nao-qualificado")
                        <span class="d-flex justify-content-center">

                            @if($usuario->tipo==2)
                                <a class="h5"><span class="badge badge-danger text-white">Não qualificado</span></a>
                                <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                            @else
                                <form method="post" action="{{route("requalificar")}}" class="form-group">
                                    <label class="h5"><span class="badge badge-danger text-white">Não qualificado!</span></label>
                                    @csrf
                                    <input type="hidden" value="{{$soldador->id}}" name="soldadorQualificacao">
                                    <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
                                </form>
                            @endif

                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>


@endsection