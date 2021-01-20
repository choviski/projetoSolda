@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12  bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Selecione quais qualificacoes esse soldador ja possui:</p>
    </div>
    <div class="container-fluid">
        <div class="row text-center d-flex justify-content-center">
            <form action="{{route("adicionarQualificacao")}}" class="form-group col-12" method="post" enctype="multipart/form-data">
                @csrf
                <div class="bg-light p-2 rounded mt-2 ">

                    <label  for="">Código RQS:</label>
                    <input type="text" class="form-control" id="" placeholder="Insira o código RQS" name="cod_rqs" required>

                   <input type="hidden" name="id_soldador" value="{{$soldador}}">
                        <label for="cod_eps">Código:</label>
                        <input type="text" class="form-control" id="cod_eps" placeholder="Insira o código do processo" name="cod_eps" required>

                        <label for="id_processo">Processo:</label>
                        <select class="form-control" id="id_processo" name="id_processo" required>
                            <option id="op1" value="-1" selected>Selecione o processo</option>

                            @foreach($processos as $processo)
                                <option value="{{$processo->id}}" name="id_processo">{{$processo->nome}}</option>
                            @endforeach
                        </select>


                        <label  for="descricao">Descrição:</label>
                        <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição da qualificação" name="descricao" required></textarea>

                    <label  for="data_qualificacao">Insira a data da qualificação:</label>
                    <input type="date" class="form-control" id="data_qualificacao" name="data_qualificacao" required>

                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="-1" disabled selected>Selecione o status</option>
                        <option value="1">Qualificado</option>
                        <option value="2">Em processo</option>
                        <option value="3">Atrasado</option>
                        <option value="4">Não Qualificado</option>
                    </select>


                    <label  for="nome_certificado">Nome do certificado:</label>
                    <input type="text" class="form-control" id="nome_certificado" placeholder="Insira o nome da certificado" name="nome_certificado" required>

                    <label  for="caminho_certificado">Insira o caminho do certificado:</label>
                    <input type="file" class="form-control" id="caminho_certificado" placeholder="Insira o caminho do certificado" name="caminho_certificado" required>

                        <p class="lead">Insira as informações sobre qual a norma que fala sobre essa qualificação:</p>
                        <label  for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" placeholder="Insira o nome da norma" name="nome_norma" required>

                        <label  for="descricao">Descrição:</label>
                        <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição da norma" name="descricao_norma" required></textarea>

                        <label for="validade">Validade:</label>
                        <select name="validade" class="form-control" id="validade">
                            <option value="1">6 meses</option>
                            <option value="2">12 meses</option>
                            <option value="3">24 meses</option>
                        </select>


                    </div>
                <input type="submit" class="btn btn-outline-primary mt-3 col-12" value="Salvar">

            </form>
        </div>
    </div>


@endsection