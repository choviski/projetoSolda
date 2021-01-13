
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Renovar qualificacao:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form class="col-12 mt-2"action="{{Route('editarQualificacao',['id'=> $soldadorQualificacao->id])}}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">
                <label  for="">Código RQS:</label><input type="text" class="form-control"  name="cu" value="{{$soldadorQualificacao->cod_rqs}}" required disabled>
                <input type="hidden" class="form-control" name="cu" value="{{$soldadorQualificacao->cod_rqs}}"  required disabled>

                <label for="id_soldador">Soldador:</label>
                <input type="text" class="form-control" id=""  value="{{$soldadorQualificacao->soldador->nome}}" required disabled>
                <input type="hidden" class="form-control" id=""  name="id_soldador" value="{{$soldadorQualificacao->soldador->id}}" required>

                <input type="hidden" class="form-control" id=""  name="oi" value="{{$soldadorQualificacao->cod_rqs}}" required>


                <label for="id_qualificacao">Código da Qualificação:</label>
                <input type="text" class="form-control" id=""  value="{{$soldadorQualificacao->qualificacao->id}}" required disabled>
                <input type="hidden" class="form-control" id=""  name="id_qualificacao" value="{{$soldadorQualificacao->qualificacao->id}}" required>
                <input type="hidden" class="form-control" id=""  name="data_qualificacao" value="{{$soldadorQualificacao->data_qualificacao}}" required>
                <input type="hidden" class="form-control" id=""  name="lancamento_qualificacao" value="{{$soldadorQualificacao->lancamento_qualificacao}}" required>
                <input type="hidden" class="form-control" id=""  name="validade_qualificacao" value="{{$soldadorQualificacao->validade_qualificacao}}" required>


                <label  for="data_qualificacao">Insira a data da qualificação:</label>
                <input type="date" class="form-control" id="data_qualificacao"  value="{{$soldadorQualificacao->data_qualificacao}}" required disabled>

                <label  for="validade_qualificacao">Insira a validade da qualificação:</label>
                <input type="date" class="form-control" id="validade_qualificacao"  value="{{$soldadorQualificacao->validade_qualificacao}}" required disabled>

                <label  for="lancamento_qualificacao">Insira o lançamento da qualificação:</label>
                <input type="date" class="form-control" id="lancamento_qualificacao"  value="{{$soldadorQualificacao->lancamento_qualificacao}}" required disabled>

                <input type="hidden" class="form-control" id="nome_certificado" placeholder="Insira o nome da certificado" name="nome_certificado"  value="{{$soldadorQualificacao->nome_certificado}}" required>
                <input type="hidden" class="form-control" id="nome_certificado" placeholder="Insira o nome da certificado" name="caminho_certificado"  value="{{$soldadorQualificacao->caminho_certificado}}" required>

                <label  for="nome_certificado">Posição de soldagem:</label>
                <input type="text" class="form-control" id="nome_certificado" placeholder="Insira a posição de soldagem" name="posicao" required>

                <label  for="nome_certificado">Eletrodo:</label>
                <input type="text" class="form-control" id="nome_certificado" placeholder="Insira o eletrodo ultilizado na soldagem" name="eletrodo" required>



                <label  for="caminho_certificado">Insira a foto do corpo de prova:</label>
                <input type="file" class="form-control" id="foto" placeholder="a foto do corpo de prova" name="fotos[]" multiple required>

                <label  for="descricao">Descrição do processo de soldagem:</label>
                <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição do processo que você ultilizou na soldagem" name="texto" required></textarea>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("soldadorqualificacao.index")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection