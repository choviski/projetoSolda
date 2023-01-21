@extends('../../../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Normas:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

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
                    <option value="{{$norma->validade}}" selected>{{$norma->validade}} meses</option>
                    <option value="3">3 meses</option>
                    <option value="6">6 meses</option>
                    <option value="9">9 meses</option>
                    <option value="12">12 meses</option>
                    <option value="24">24 meses</option>
                    <option value="36">36 meses</option>
                </select>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("norma.index")}}"><button class="btn btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection
