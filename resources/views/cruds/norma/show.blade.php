@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Normas:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded bg-white mt-2 col-12 shadow">
                    <thead class=" rounded">
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
                    <td>{{$norma->validade}} meses</td>
                    <td>{{$norma->created_at}}</td>
                    <td>{{$norma->updated_at}}</td>
                    <td>{{$norma->deleted_at}}</td>
                </tr>
                </tbody>
            </table>
            <a href="/norma"><button class="btn btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
