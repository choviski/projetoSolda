
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">ENDEREÇO</a>
            <hr class="bg-white">
            <p class="lead text-white">Edição: {{$endereco->rua}}, {{$endereco->cidade->nome}}</p>
        </div>
        <form class="col-12 mt-2"action="{{Route('endereco.update',['endereco'=> $endereco->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">
                <label  for="rua">Rua:</label>
                <input type="text" class="form-control" id="rua" value="{{$endereco->rua}}" name="rua" required>

                <label  for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" value="{{$endereco->bairro}}" name="bairro" required>

                <label  for="complemento">Complemento:</label>
                <input type="text" class="form-control" id="complemento" value="{{$endereco->complemento}}" name="complemento" required>

                <label  for="cep">CEP:</label>
                <input type="number" class="form-control" id="cep" value="{{$endereco->cep}}" name="cep" required>

                <label for="id_cidade">Cidade:</label>
                <select class="form-control" id="id_cidade" name="id_cidade" required>
                    <option value="{{$endereco->cidade->id}}">{{$endereco->cidade->nome}}, {{$endereco->cidade->estado}}</option>

                    @foreach($cidades as $cidade)
                        <option value="{{$cidade->id}}">{{$cidade->nome}}, {{$cidade->estado}}</option>
                    @endforeach
                </select>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/endereco"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection