@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Processos:</p>
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
                            <th scope="col">CREATED_AT</th>
                            <th scope="col">UPDATED_AT</th>
                            <th scope="col">DELETED_AT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$processo->id}}</td>
                    <td>{{$processo->nome}}</td>
                    <td>{{$processo->descricao}}</td>
                    <td>{{$processo->created_at}}</td>
                    <td>{{$processo->updated_at}}</td>
                    <td>{{$processo->deleted_at}}</td>
                </tr>
                </tbody>
            </table>
            <a href="{{route("processo.index")}}"><button class="btn btn-outline-light text-dark mt-2  "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection
