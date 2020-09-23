@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Soldadores-Qualificações:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded bg-white mt-2 col-12 shadow">
                    <thead class=" rounded">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CÓDIGO RQS</th>
                        <th scope="col">ID SOLDADOR</th>
                        <th scope="col">NOME SOLDADOR</th>
                        <th scope="col">ID QUALIFICAÇÃO</th>
                        <th scope="col">CÓDIGO QUALIFICAÇÃO</th>
                        <th scope="col">DATA QUALIFICAÇÃO</th>
                        <th scope="col">VALIDADE QUALIFICAÇÃO</th>
                        <th scope="col">LANÇAMENTO QUALIFICAÇÃO</th>
                        <th scope="col">NOME CERTIFICADO</th>
                        <th scope="col">CAMINHO CERTIFICADO</th>
                        <th scope="col">CREATED_AT</th>
                        <th scope="col">UPDATED_AT</th>
                        <th scope="col">DELETED_AT</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$soldadorqualificacao->id}}</td>
                        <td>{{$soldadorqualificacao->cod_rqs}}</td>
                        <td>{{$soldadorqualificacao->id_soldador}}</td>
                        <td>{{$soldadorqualificacao->soldador->nome}}</td>
                        <td>{{$soldadorqualificacao->id_qualificacao}}</td>
                        <td>{{$soldadorqualificacao->qualificacao->cod_eps}}</td>
                        <td>{{$soldadorqualificacao->data_qualificacao}}</td>
                        <td>{{$soldadorqualificacao->validade_qualificacao}}</td>
                        <td>{{$soldadorqualificacao->lancamento_qualificacao}}</td>
                        <td>{{$soldadorqualificacao->nome_certificado}}</td>
                        <td>{{$soldadorqualificacao->caminho_certificado}}</td>
                        <td>{{$soldadorqualificacao->created_at}}</td>
                        <td>{{$soldadorqualificacao->updated_at}}</td>
                        <td>{{$soldadorqualificacao->deleted_at}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a href="/soldadorqualificacao"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection