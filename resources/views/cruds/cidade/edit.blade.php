
@extends('../../../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Cidades:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

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
        <a href="/cidade"><button class="btn btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>


@endsection
