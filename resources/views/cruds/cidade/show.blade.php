@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">CIDADE:</a>
            <hr class="bg-white">
            <p class="lead text-white">{{$cidade->nome}}, {{$cidade->estado}}</p>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded mt-2 col-12 shadow">
                    <thead class="bg-primary text-white rounded">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">CREATED_AT</th>
                        <th scope="col">UPDATED_AT</th>
                        <th scope="col">DELETED_AT</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$cidade->id}}</td>
                        <td>{{$cidade->nome}}</td>
                        <td>{{$cidade->estado}}</td>
                        <td>{{$cidade->created_at}}</td>
                        <td>{{$cidade->updated_at}}</td>
                        <td>{{$cidade->deleted_at}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a href="/cidade"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
