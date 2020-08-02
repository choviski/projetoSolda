@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">NORMA:</a>
            <hr class="bg-white">
            <p class="lead text-white">{{$norma->nome}}, {{$norma->descricao}}, {{$norma->validade}}</p>
        </div>
        <div class="col-12">
            <table class="table rounded mt-2 col-12 shadow">
                <thead class="bg-primary text-white rounded">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">VALIDADE</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">DELETED_AT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$norma->id}}</td>
                    <td>{{$norma->nome}}</td>
                    <td>{{$norma->descricao}}</td>
                    <td>{{$norma->validade}}</td>
                    <td>{{$norma->created_at}}</td>
                    <td>{{$norma->updated_at}}</td>
                    <td>{{$norma->deleted_at}}</td>
                </tr>
                </tbody>
            </table>
            <a href="/norma"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
