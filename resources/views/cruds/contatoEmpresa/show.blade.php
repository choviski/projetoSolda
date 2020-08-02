@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">CONTATOS EM EMPRESAS:</a>
            <hr class="bg-white">
            <p class="lead text-white">{{$contatoEmpresa->contato->nome}} na empresa {{$contatoEmpresa->empresa->razao_social}}</p>
        </div>
        <div class="col-12">
            <table class="table rounded mt-2 col-12 shadow">
                <thead class="bg-primary text-white rounded">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CONTATO</th>
                    <th scope="col">EMPRESA</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">DELETED_AT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$contatoEmpresa->id}}</td>
                    <td>{{$contatoEmpresa->contato->nome}}</td>
                    <td>{{$contatoEmpresa->empresa->razao_social}}</td>
                    <td>{{$contatoEmpresa->created_at}}</td>
                    <td>{{$contatoEmpresa->updated_at}}</td>
                    <td>{{$contatoEmpresa->deleted_at}}</td>
                </tr>
                </tbody>
            </table>
            <a href="/contatoEmpresa"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
