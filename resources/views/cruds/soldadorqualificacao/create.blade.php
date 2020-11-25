
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Soldadores-Qualificações:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="{{Route('soldadorqualificacao.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">

                <label  for="">Código RQS:</label>
                <input type="text" class="form-control" id="" placeholder="Insira o código RQS" name="cod_rqs" required>

                <label for="id_soldador">Soldador:</label>
                <select class="form-control" id="id_soldador" name="id_soldador" required>
                    <option value="-1">Selecione o Soldador</option>

                    @foreach($soldadors as $soldador)
                        <option value="{{$soldador->id}}">{{$soldador->nome}}</option>
                    @endforeach
                </select>

                <label for="id_qualificacao">Código da Qualificação:</label>
                <select class="form-control" id="id_qualificacao" name="id_qualificacao" required>
                    <option value="-1">Selecione a qualificação</option>

                    @foreach($qualificaos as $qualificaos)
                        <option value="{{$qualificaos->id}}">{{$qualificaos->cod_eps}}</option>
                    @endforeach
                </select>

                <label  for="data_qualificacao">Insira a data da qualificação:</label>
                <input type="date" class="form-control" id="data_qualificacao" name="data_qualificacao" required>

                <label  for="validade_qualificacao">Insira a validade da qualificação:</label>
                <input type="date" class="form-control" id="validade_qualificacao" name="validade_qualificacao" required>

                <label  for="lancamento_qualificacao">Insira o lançamento da qualificação:</label>
                <input type="date" class="form-control" id="lancamento_qualificacao" name="lancamento_qualificacao" required>

                <label  for="nome_certificado">Nome do certificado:</label>
                <input type="text" class="form-control" id="nome_certificado" placeholder="Insira o nome da certificado" name="nome_certificado" required>

                <label  for="nome_certificado">Posição de soldagem:</label>
                <input type="text" class="form-control" id="nome_certificado" placeholder="Insira a posição de soldagem" name="posicao" required>

                <label  for="nome_certificado">Eletrodo:</label>
                <input type="text" class="form-control" id="nome_certificado" placeholder="Insira o eletrodo ultilizado na soldagem" name="eletrodo" required>

                <label  for="caminho_certificado">Insira o caminho do certificado:</label>
                <input type="text" class="form-control" id="caminho_certificado" placeholder="Insira o caminho do certificado" name="caminho_certificado" required>

                <label  for="caminho_certificado">Insira a foto do corpo de prova:</label>
                <input type="file" class="form-control" id="caminho_certificado" placeholder="a foto do corpo de prova" name="foto" required>

                <label  for="descricao">Descrição do processo de soldagem:</label>
                <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição do processo que você ultilizou na soldagem" name="texto" required></textarea>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("soldadorqualificacao.index")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection