@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">INSPETOR:</a>
            <hr class="bg-white">
            <p class="lead text-white">{{$inspetor->nome}}</p>
        </div>
        <div class="col-12">
            <table class="table rounded mt-2 col-12 shadow">
                <thead class="bg-primary text-white rounded">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">CREA</th>
                    <th scope="col">FUNÇÃO</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">DELETED_AT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$inspetor->id}}</td>
                    <td>{{$inspetor->nome}}</td>
                    <td>{{$inspetor->crea}}</td>
                    <td>{{$inspetor->funcao}}</td>
                    <td>{{$inspetor->created_at}}</td>
                    <td>{{$inspetor->updated_at}}</td>
                    <td>{{$inspetor->deleted_at}}</td>
                </tr>
                </tbody>
            </table>
            <a href="/inspetor"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
