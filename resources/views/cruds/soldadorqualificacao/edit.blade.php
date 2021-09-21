@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_perfil{
            text-decoration: none;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: underline;
            font-weight: normal;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">EDITAR QUALIFICAÇÃO:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">
        <form class="col-9 p-0 mt-3"action="{{Route('soldadorqualificacao.update',['soldadorqualificacao'=> $soldadorqualificacao->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="">Código RQS:</label>
                <input type="text" class="form-control" id="" value="{{$soldadorqualificacao->cod_rqs}}" name="cod_rqs" required>

                <label for="id_soldador">Soldador:</label>
                <select class="form-control" id="id_soldador" name="id_soldador" >
                    <option selected value="{{$soldadorqualificacao->id_soldador}}" >{{$soldadorqualificacao->soldador->nome}}</option>

                    @foreach($soldadors as $soldador)
                        <option value="{{$soldador->id}}">{{$soldador->nome}}</option>
                    @endforeach
                </select>

                <label for="id_qualificacao">Código da Qualificação:</label>
                <select class="form-control" id="id_qualificacao" name="id_qualificacao" >
                    <option selected value="{{$soldadorqualificacao->id_qualificacao}}" >{{$soldadorqualificacao->qualificacao->cod_eps}}</option>

                    @foreach($qualificaos as $qualificaos)
                        <option value="{{$qualificaos->id}}">{{$qualificaos->cod_eps}}</option>
                    @endforeach
                </select>

                <label  for="data_qualificacao">Insira a data da qualificação:</label>
                <input type="date" class="form-control" id="data_qualificacao" name="data_qualificacao" required value="{{$soldadorqualificacao->data_qualificacao}}">

                <label  for="validade_qualificacao">Insira a validade da qualificação:</label>
                <input type="date" class="form-control" id="validade_qualificacao" name="validade_qualificacao" required value="{{$soldadorqualificacao->validade_qualificacao}}">

                <label  for="lancamento_qualificacao">Insira o lançamento da qualificação:</label>
                <input type="date" class="form-control" id="lancamento_qualificacao" name="lancamento_qualificacao" required value="{{$soldadorqualificacao->lancamento_qualificacao}}">

                <label  for="nome_certificado">Nome do certificado:</label>
                <input type="text" class="form-control" id="nome_certificado" value="{{$soldadorqualificacao->nome_certificado}}" name="nome_certificado" required>

                <label  for="nome_certificado">Posição de soldagem:</label>
                <input type="text" class="form-control" id="nome_certificado" value="{{$soldadorqualificacao->posicao}}" name="posicao" required>

                <label  for="nome_certificado">Eletrodo:</label>
                <input type="text" class="form-control" id="nome_certificado" value="{{$soldadorqualificacao->eletrodo}}" name="eletrodo" required>

                <input type="hidden" class="form-control" id="aviso" value=1 name="aviso" required>

                <label  for="descricao">Descrição:</label>
                <textarea type="text" class="form-control" id="descricao" value="{{$soldadorqualificacao->texto}}" name="texto" required>{{$soldadorqualificacao->texto}}}</textarea>
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="{{$soldadorqualificacao->status}}" selected>{{$soldadorqualificacao->status}}</option>
                    <option value="1">Qualificado</option>
                    <option value="2">Em processo</option>
                    <option value="3">Não Qualificado</option>
                    <option value="4">Atrasado</option>

                </select>

                <label  for="caminho_certificado">Insira o caminho do certificado:</label>
                <input type="text" class="form-control" id="caminho_certificado" value="{{$soldadorqualificacao->caminho_certificado}}" name="caminho_certificado" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
            <a href="{{route("soldadorqualificacao.index")}}" class="btn btn-outline-light text-dark mt-2  mt-1  mb-2 col-12"><i class="fas fa-arrow-left"></i> Voltar</a>

        </form>
    </div>

@endsection