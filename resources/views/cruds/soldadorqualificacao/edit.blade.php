
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">SOLDADORES - QUALIFICAÇÕES</a>
            <hr class="bg-white">
            <p class="lead text-white">Edição: {{$soldadorqualificacao->soldador->nome}}, {{$soldadorqualificacao->qualificacao->cod_eps}}</p>
        </div>
        <form class="col-12 mt-2"action="{{Route('soldadorqualificacao.update',['soldadorqualificacao'=> $soldadorqualificacao->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label for="id_soldador">Soldador:</label>
                <select class="form-control" id="id_soldador" name="id_soldador" required>
                    <option value="{{$soldadorqualificacao->soldador_id}}" selected>{{$soldadorqualificacao->soldador->nome}}</option>

                    @foreach($soldadors as $soldador)
                        <option value="{{$soldador->id}}">{{$soldador->nome}}</option>
                    @endforeach
                </select>

                <label for="id_qualificacao">Código EPS da Qualificação:</label>
                <select class="form-control" id="id_qualificacao" name="id_qualificacao" required>
                    <option value="{{$soldadorqualificacao->qualificao_id}}" selected>{{$soldadorqualificacao->qualificacao->cod_eps}}</option>

                    @foreach($qualificaos as $qualificaos)
                        <option value="{{$qualificaos->id}}">{{$qualificaos->cod_eps}}</option>
                    @endforeach
                </select>

                <label  for="data_qualificacao">Insira a data da qualificação:</label>
                <input type="date" class="form-control" id="data_qualificacao" name="data_qualificacao" required value="{{$soldadorqualificacao->data_qualificacao}}">

                <label  for="validade_qualificacao">Insira a validade da qualificação:</label>
                <input type="date" class="form-control" id="validade_qualificacao" name="validade_qualificacao" required value="{{$soldadorqualificacao->lancamento_qualificacao}}">

                <label  for="lancamento_qualificacao">Insira o lançamento da qualificação:</label>
                <input type="date" class="form-control" id="lancamento_qualificacao" name="lancamento_qualificacao" required value="{{$soldadorqualificacao->lancamento_qualificacao}}">

                <label  for="nome_certificado">Nome do certificado:</label>
                <input type="text" class="form-control" id="nome_certificado" value="{{$soldadorqualificacao->nome_certificado}}" name="nome_certificado" required>

                <label  for="caminho_certificado">Insira o caminho do certificado:</label>
                <input type="text" class="form-control" id="caminho_certificado" value="{{$soldadorqualificacao->caminho_certificado}}" name="caminho_certificado" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/soldadorqualificacao"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection