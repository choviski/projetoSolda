@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Contato-Empresa:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded bg-white mt-2 col-12 shadow">
                    <thead class=" rounded">
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
            <a href="/contatoEmpresa"><button class="btn btn-outline-light text-dark mt-2  "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
