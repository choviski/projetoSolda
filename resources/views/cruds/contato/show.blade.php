@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">CONTATO:</a>
            <hr class="bg-white">
            <p class="lead text-white">{{$contato->nome}}</p>
        </div>
        <div class="col-12">
            <table class="table rounded mt-2 col-12 shadow">
                <thead class="bg-primary text-white rounded">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">DELETED_AT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$contato->id}}</td>
                    <td>{{$contato->nome}}</td>
                    <td>{{$contato->telefone}}</td>
                    <td>{{$contato->email}}</td>
                    <td>{{$contato->created_at}}</td>
                    <td>{{$contato->updated_at}}</td>
                    <td>{{$contato->deleted_at}}</td>
                </tr>
                </tbody>
            </table>
            <a href="/contato"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
