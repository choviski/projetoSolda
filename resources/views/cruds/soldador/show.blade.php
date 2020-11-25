@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Soldadores:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded bg-white mt-2 col-12 shadow">
                    <thead class=" rounded">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">SINETE</th>
                            <th scope="col">MATRÍCULA</th>
                            <th scope="col">E-MAIL</th>
                            <th scope="col">EMPRESA</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ID EMPRESA</th>
                            <th scope="col">CREATED_AT</th>
                            <th scope="col">UPDATED_AT</th>
                            <th scope="col">DELETED_AT</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$soldador->id}}</td>
                        <td>{{$soldador->nome}}</td>
                        <td>{{$soldador->sinete}}</td>
                        <td>{{$soldador->matricula}}</td>
                        <td>{{$soldador->email}}</td>
                        <td>{{$soldador->empresa->nome_fantasia}}</td>
                        <td>{{$soldador->status}}</td>
                        <td>{{$soldador->empresa->id}}</td>
                        <td>{{$soldador->created_at}}</td>
                        <td>{{$soldador->updated_at}}</td>
                        <td>{{$soldador->deleted_at}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{route("soldador.index")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
@endsection