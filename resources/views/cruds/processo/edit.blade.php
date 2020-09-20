
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">PROCESSO</a>
            <hr class="bg-white">
            <p class="lead text-white">Edição: {{$processo->nome}}, {{$processo->descricao}}</p>
        </div>
        <form class="col-12 mt-2"action="{{Route('processo.update',['processo'=> $processo->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="{{$processo->nome}}" name="nome" required>

                <label  for="descricao">Descrição:</label>
                <textarea type="text" class="form-control" id="descricao" value="{{$processo->descricao}}" name="descricao" required>{{$processo->descricao}}</textarea>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/processo"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection
