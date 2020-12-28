@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12  bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Selecione a empresa do Soldador:</p>
    </div>
    <div class="container-fluid">
        <div class="row text-center d-flex justify-content-center">
                <form action="{{route("cadastroSoldador")}}" method="post">
                    @csrf
                @foreach($empresas as $empresa)
                        <div class="col-8 col-sm-2 col-md-8  rounded ml-md-1  pt-4 mt-3 text-center shadow-md ">
                        <input type="hidden" value="{{$empresa->id}}" name="empresa">
                        <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="{{$empresa->razao_social}}">
                        </div>
            @endforeach
            </form>

        </div>
@endsection