@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Soldadores</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">
        <form class="col-12 mt-2"action="{{Route('soldador.update',['soldador'=> $soldador->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="{{$soldador->nome}}" name="nome" required>

                <label  for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" value="{{$soldador->cpf}}" name="cpf" required>

                <label  for="foto">Foto:</label>
                <input type="file" class="form-control" id="foto" placeholder="foto do Soldador" value="{{$soldador->foto}}" name="foto">
                <div  style="height: 150px">
                    <img src="@if($soldador->foto){{asset("$soldador->foto")}}@else{{asset("imagens/soldador_default.png")}}@endif" style="max-width: 100%;max-height: 100%;"  id="fotoSoldador">
                </div>
                <label  for="sinete">Sinete:</label>

                <input type="text" class="form-control" id="sinete" value="{{$soldador->sinete}}" name="sinete" required>

                <label  for="matricula">Matricula:</label>
                <input type="text" class="form-control" id="matricula" value="{{$soldador->matricula}}" name="matricula" required>

                <label  for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" value="{{$soldador->email}}" name="email">

                <label for="id_empresa">Empresa:</label>
                <select class="form-control" id="id_empresa" name="id_empresa" required>
                    <option value="{{$soldador->empresa->id}}" selected>{{$soldador->empresa->nome_fantasia}}</option>

                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->nome_fantasia}}</option>
                    @endforeach
                </select>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("soldador.index")}}"><button class="btn btn-outline-light text-dark mt-2"><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection