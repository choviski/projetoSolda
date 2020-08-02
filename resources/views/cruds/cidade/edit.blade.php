
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">

            <a class="text-white  display-4 ">CIDADES</a>

            <hr class="bg-white">
            <p class="lead text-white">Edição: {{$cidade->nome}}, {{$cidade->estado}}</p>
        </div>
        <form class="col-12 mt-2"action="{{Route('cidade.update',['cidade'=> $cidade->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="{{$cidade->nome}}" name="nome" required>

                <label  for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" value="{{$cidade->estado}}" name="estado" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/cidade"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>

@endsection
