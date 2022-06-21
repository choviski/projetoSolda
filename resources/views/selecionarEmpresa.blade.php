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
        <p class="lead p-1 m-0" style="font-size: 22px">SELECIONE A EMPRESA DO SOLDADOR:</p>
    </div>
    <div class="container-fluid">
        <div class="row text-center d-flex justify-content-center mt-2">
            <form action="{{route("cadastroSoldador")}}" class="col-8" method="post">
                @csrf
                <select class="form-control" id="empresa" name="empresa" required>
                    <option value="" disabled>Selecione a Empresa:</option>
                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->razao_social}}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn btn-primary mt-2 col-12" VALUE="Continuar cadastro">

            </form>

        </div>
@endsection