
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">EMPRESA</a>
            <hr class="bg-white">
            <p class="lead text-white">Edição: {{$empresa->razao_social}}</p>
        </div>
        <form class="col-12 mt-2"action="{{Route('empresa.update',['empresa'=> $empresa->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="razao_social">Razão social:</label>
                <input type="text" class="form-control" id="razao_social" value="{{$empresa->razao_social}}" name="razao_social" required>

                <label  for="nome_fantasia">Nome fantasia:</label>
                <input type="text" class="form-control" id="nome_fantasia" value="{{$empresa->nome_fantasia}}" name="nome_fantasia" required>

                <label  for="cnpj">CNPJ:</label>
                <input type="text" class="form-control" id="cnpj" value="{{$empresa->cnpj}}" name="cnpj" required>

                <label  for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" value="{{$empresa->telefone}}" name="telefone" required>

                <label  for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="{{$empresa->email}}" name="email" required>

                <label  for="endereco">Endereço:</label>
                <input type="number" class="form-control" id="endereco" value="{{$empresa->id_endereco}}" name="id_endereco" required>

                <label  for="inspetor">Inspetor:</label>
                <input type="number" class="form-control" id="inspetor" value="{{$empresa->id_inspetor}}" name="id_inspetor" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/empresa"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection
