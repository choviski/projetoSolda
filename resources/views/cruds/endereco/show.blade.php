@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">ENDEREÇO:</a>
            <hr class="bg-white">
            <p class="lead text-white">{{$endereco->rua}}, {{$endereco->cidade->nome}}</p>
        </div>
        <div class="col-12 ">
            <div class="table-responsive">
                <table class="table rounded mt-2 col-12 shadow">
                    <thead class="bg-primary text-white rounded">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">RUA</th>
                        <th scope="col">BAIRRO</th>
                        <th scope="col">COMPLEMENTO</th>
                        <th scope="col">CEP</th>
                        <th scope="col">CIDADE</th>
                        <th scope="col">ID CIDADE</th>
                        <th scope="col">CREATED_AT</th>
                        <th scope="col">UPDATED_AT</th>
                        <th scope="col">DELETED_AT</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$endereco->id}}</td>
                        <td>{{$endereco->rua}}</td>
                        <td>{{$endereco->bairro}}</td>
                        <td>{{$endereco->complemento}}</td>
                        <td>{{$endereco->cep}}</td>
                        <td>{{$endereco->cidade->nome}}</td>
                        <td>{{$endereco->cidade->id}}</td>
                        <td>{{$endereco->created_at}}</td>
                        <td>{{$endereco->updated_at}}</td>
                        <td>{{$endereco->deleted_at}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a href="/endereco"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection