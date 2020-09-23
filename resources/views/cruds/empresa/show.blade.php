@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Empresa:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded bg-white mt-2 col-12 shadow">
                    <thead class=" rounded">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOME FANTASIA</th>
                            <th scope="col">RAZAO SOCIAL</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">TELEFONE</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ENDEREÇO</th>
                            <th scope="col">INSPETOR</th>
                            <th scope="col">CREATED_AT</th>
                            <th scope="col">UPDATED_AT</th>
                            <th scope="col">DELETED_AT</th>
                        </tr>
                    </thead>
                <tbody>
                <tr>
                    <td>{{$empresa->id}}</td>
                    <td>{{$empresa->nome_fantasia}}</td>
                    <td>{{$empresa->razao_social}}</td>
                    <td>{{$empresa->cnpj}}</td>
                    <td>{{$empresa->telefone}}</td>
                    <td>{{$empresa->email}}</td>
                    <td>Rua: {{$empresa->endereco->rua}} | {{$empresa->endereco->bairro}} CEP: {{$empresa->endereco->cep}} {{$empresa->endereco->cidade->nome}}-{{$empresa->endereco->cidade->estado}}</td>
                    <td>{{$empresa->inspetor->nome}}</td>
                    <td>{{$empresa->created_at}}</td>
                    <td>{{$empresa->updated_at}}</td>
                    <td>{{$empresa->deleted_at}}</td>
                </tr>
                </tbody>
            </table>
            <a href="/empresa"><button class="btn btn-outline-light text-dark mt-2"><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
