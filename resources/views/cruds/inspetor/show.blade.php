@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Inspetores:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded bg-white mt-2 col-12 shadow">
                    <thead class=" rounded">
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
            <a href="/inspetor"><button class="btn btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
