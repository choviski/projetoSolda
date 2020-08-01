@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">NORMAS - QUALIFICAÇÕES:</a>
            <hr class="bg-white">
            <p class="lead text-white">{{$normaqualificacao->norma->nome}}, {{$normaqualificacao->qualificacao->cod_eps}}</p>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded mt-2 col-12 shadow">
                    <thead class="bg-primary text-white rounded">
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
            <a href="/normaqualificacao"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection