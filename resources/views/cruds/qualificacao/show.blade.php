@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">QUALIFICACAO:</a>
            <hr class="bg-white">
            <p class="lead text-white">{{$qualificacao->processo->nome}}</p>
        </div>
        <div class="col-12">
            <table class="table rounded mt-2 col-12 shadow">
                <thead class="bg-primary text-white rounded">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME DO PROCESSO</th>
                    <th scope="col">CÓDIGO {{$qualificacao->processo->nome}}</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">DELETED_AT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$qualificacao->id}}</td>
                    <td>{{$qualificacao->processo->nome}}</td>
                    <td>{{$qualificacao->cod_eps}}</td>
                    <td>{{$qualificacao->descricao}}</td>
                    <td>{{$qualificacao->created_at}}</td>
                    <td>{{$qualificacao->updated_at}}</td>
                    <td>{{$qualificacao->deleted_at}}</td>
                </tr>
                </tbody>
            </table>
            <a href="/qualificacao"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
