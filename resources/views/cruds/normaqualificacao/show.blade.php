@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Norma-Qualificações:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded bg-white mt-2 col-12 shadow">
                    <thead class=" rounded">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID NORMA</th>
                            <th scope="col">NOME NORMA</th>
                            <th scope="col">ID QUALIFICAÇÃO</th>
                            <th scope="col">CÓDIGO QUALIFICAÇÃO</th>
                            <th scope="col">CREATED_AT</th>
                            <th scope="col">UPDATED_AT</th>
                            <th scope="col">DELETED_AT</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$normaqualificacao->id}}</td>
                        <td>{{$normaqualificacao->id_norma}}</td>
                        <td>{{$normaqualificacao->norma->nome}}</td>
                        <td>{{$normaqualificacao->id_qualificacao}}</td>
                        <td>{{$normaqualificacao->qualificacao->cod_eps}}</td>
                        <td>{{$normaqualificacao->created_at}}</td>
                        <td>{{$normaqualificacao->updated_at}}</td>
                        <td>{{$normaqualificacao->deleted_at}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{route("normaqualificacao.index")}}"><button class=" btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection