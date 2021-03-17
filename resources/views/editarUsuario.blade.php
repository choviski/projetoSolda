
@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_perfil{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">EDITAR INFORMAÇÕES:</p>
    </div>
    <div class="row col-12 d-flex justify-content-center ">

        <form class="col-9 p-0 mt-3"action="{{Route('salvarUsuario',['id'=> $empresa->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="razao_social">Razão social:</label>
                <input type="text" class="form-control" id="razao_social" value="{{$empresa->razao_social}}" name="razao_social" required>

                <label  for="nome_fantasia">Nome fantasia:</label>
                <input type="text" class="form-control" id="nome_fantasia" value="{{$empresa->nome_fantasia}}" name="nome_fantasia" required>

                <label  for="cnpj">CNPJ:</label>
                <input type="text" class="form-control" id="cnpj" value="{{$empresa->cnpj}}" name="cnpj" required disabled>

                <label  for="celular">Celular:</label>
                <input type="text" class="form-control" id="celular" value="{{$empresa->celular}}" name="celular" >

                <label  for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" value="{{$empresa->telefone}}" name="telefone" required>

                <label  for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="{{$empresa->email}}" name="email" required>

                <label for="senha">Senha:</label>
                <input type="text" class="form-control" id="senha" value="{{$usuarioEmpresa->senha}}" name="senha" required>

                <label for="id_endereco">Endereço:</label>
                <select class="form-control" id="id_endereco" name="id_endereco" required>
                    <option value="{{$empresa->endereco->id}}" selected>{{$empresa->endereco->cidade->nome}}, {{$empresa->endereco->cidade->estado}}, {{$empresa->endereco->bairro}}, {{$empresa->endereco->rua}}</option>

                    @foreach($enderecos as $endereco)
                        <option value="{{$endereco->id}}">{{$endereco->cidade->nome}}, {{$endereco->cidade->estado}}, {{$endereco->bairro}}, {{$endereco->rua}}</option>
                    @endforeach
                </select>

                <label for="id_inspetor">Inspetor:</label>
                <select class="form-control" id="id_inspetor" name="id_inspetor" required>
                    <option value="{{$empresa->inspetor->id}}">{{$empresa->inspetor->nome}}, {{$empresa->inspetor->crea}}</option>

                    @foreach($inspetors as $inspetor)
                        <option value="{{$inspetor->id}}">{{$inspetor->nome}}, {{$inspetor->crea}}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn btn-outline-primary mt-3 mb-0 col-12">
            </div>
            <a href="{{route("paginaInicial")}}"><button class="btn btn-outline-light btn-block text-dark mt-1  mb-2 col-12"><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#telefone').mask('(99) 9999-9999');
        });
        $(document).ready(function(){
            $('#celular').mask('(99) 99999-9999');
        });
        $(document).ready(function(){
            $('#cnpj').mask('99.999.999/9999-99');
        });
    </script>
@endsection()
