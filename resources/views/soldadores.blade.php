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
                        <span>
                            <a class="h5"><span class="badge badge-success ">Qualificado</span></a>
                            <button class="ml-1 btn btn-secondary btn-sm" type="button">Requalificar</button>
                        </span>
                    @elseif($soldador->status=="em-processo")
                        <span>
                            <a class="h5"><span class="badge badge-primary text-white">Pendente</span></a>
                            <button class="ml-1 btn btn-secondary btn-sm " type="button" disabled>Requalificar</button>
                        </span>
                    @elseif($soldador->status=="atrasado")
                        <span>
                            <a class="h5"><span class="badge badge-warning text-white">Atrasado</span></a>
                            <button class="ml-1 btn btn-secondary btn-sm " type="button">Requalificar<spam class="badge badge-warning ml-1 text-white">!</spam></button>
                        </span>
                    @elseif($soldador->status=="nao-qualificado")
                        <span>
                            <a class="h5"><span class="badge badge-danger text-white">Não qualificado!</span></a>
                            <button class="ml-1 btn btn-secondary btn-sm " type="button">Requalificar<spam class="badge badge-danger ml-1 text-white">!</spam></button>
                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>


@endsection