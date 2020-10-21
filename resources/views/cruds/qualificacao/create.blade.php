
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Qualificações:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="{{Route('qualificacao.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label for="cod_eps">Código:</label>
                <input type="text" class="form-control" id="cod_eps" placeholder="Insira o código " name="cod_eps" required>

                <label for="id_processo">Processo:</label>
                <select class="form-control" id="id_processo" name="id_processo" required>
                    <option id="op1" value="-1" selected>Selecione o processo</option>

                    @foreach($processos as $processo)
                        <option value="{{$processo->id}}" name="id_processo">{{$processo->nome}}</option>
                    @endforeach
                </select>

                <label  for="descricao">Descrição:</label>
                <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição da qualificação" name="descricao" required></textarea>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("qualificacao.index")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection
