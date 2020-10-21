@extends('../../../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Inspetores:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

    <form class="col-12 mt-2"action="{{Route('inspetor.update',['inspetor'=> $inspetor->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="{{$inspetor->nome}}" name="nome" required>

                <label  for="crea">CREA:</label>
                <input type="text" class="form-control" id="crea" value="{{$inspetor->crea}}" name="crea" required>

                <label  for="funcao">Função:</label>
                <input type="text" class="form-control" id="funcao" value="{{$inspetor->funcao}}" name="funcao" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("inspetor.index")}}"><button class="btn btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>
@endsection
