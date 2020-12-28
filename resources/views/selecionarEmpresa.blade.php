@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12  bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Selecione a empresa do Soldador:</p>
    </div>
    <div class="container-fluid">
        <div class="row text-center d-flex justify-content-center mt-2">
            <form action="{{route("cadastroSoldador")}}" class="col-8" method="post">
                @csrf
                <select class="form-control" id="empresa" name="empresa" required>
                    <option value="-1" disabled>Selecione a Empresa:</option>
                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->razao_social}}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn btn-primary mt-2 col-12">

            </form>

        </div>
@endsection