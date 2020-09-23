@extends('../../../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Qualificações:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">
        <form class="col-12 mt-2"action="{{Route('qualificacao.update',['qualificacao'=> $qualificacao->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="cod_eps">Código:</label>
                <input type="text" class="form-control" id="cod_eps" value="{{$qualificacao->cod_eps}}" name="cod_eps" required>

                <label for="id_processo">Processo:</label>
                <select class="form-control" id="id_processo" name="id_processo" required>
                    <option id="op1" value="{{$qualificacao->processo->id}}">{{$qualificacao->processo->nome}}</option>

                    @foreach($processos as $processo)
                        <option value="{{$processo->id}}">{{$processo->nome}}</option>
                    @endforeach
                </select>

                <label  for="descricao">Descrição:</label>
                <textarea type="text" class="form-control" id="descricao" value="{{$qualificacao->descricao}}" name="descricao" required>{{$qualificacao->descricao}}</textarea>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/qualificacao"><button class="btn btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection
