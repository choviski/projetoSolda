
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">NORMA</a>
            <hr class="bg-white">
            <p class="lead text-white">Edição: {{$norma->nome}}, {{$norma->descricao}}, {{$norma->validade}}</p>
        </div>
        <form class="col-12 mt-2"action="{{Route('norma.update',['norma'=> $norma->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="{{$norma->nome}}" name="nome" required>

                <label  for="descricao">Descrição:</label>
                <textarea type="text" class="form-control" id="descricao" value="{{$norma->descricao}}" name="descricao" required>{{$norma->descricao}}</textarea>

                <label for="validade">Validade:</label>
                <select name="validade" class="form-control" id="validade">
                    <option value="{{$norma->validade}}">{{$norma->validade}} meses</option>
                    <option value="1">6 meses</option>
                    <option value="2">12 meses</option>
                    <option value="3">24 meses</option>
                </select>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/norma"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection
