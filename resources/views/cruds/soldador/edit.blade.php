
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">SOLDADORES</a>
            <hr class="bg-white">
            <p class="lead text-white">Edição: {{$soldador->nome}}</p>
        </div>
        <form class="col-12 mt-2"action="{{Route('soldador.update',['soldador'=> $soldador->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="{{$soldador->nome}}" name="nome" required>

                <label  for="sinete">Sinete:</label>
                <input type="text" class="form-control" id="sinete" value="{{$soldador->sinete}}" name="sinete" required>

                <label  for="matricula">Matricula:</label>
                <input type="text" class="form-control" id="matricula" value="{{$soldador->matricula}}" name="matricula" required>

                <label  for="email">E-mail:</label>
                <input type="text" class="form-control" id="email" value="{{$soldador->email}}" name="email" required>

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
    </div>
    <a href="/soldador"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection