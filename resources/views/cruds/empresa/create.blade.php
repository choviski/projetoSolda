
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Empresas:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="{{Route('empresa.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="cnpj">CNPJ:</label>
                <input type="text" class="form-control" id="cnpj" placeholder="Insira CNPJ da empresa" name="cnpj" required>

                <label  for="razao_social">Razão Social:</label>
                <input type="text" class="form-control" id="razao_social" placeholder="Insira a razão social da empresa" name="razao_social" required>

                <label  for="nome_fantasia">Nome Fantasia</label>
                <input type="text" class="form-control" id="nome_fantasia" placeholder="Insira o nome fantasia da empresa (se tiver)" name="nome_fantasia">

                <label  for="celular">Celular:</label>
                <input type="tel" class="form-control" id="celular" placeholder="insira o celular da empresa (apenas numeros)" name="celular" >

                <label  for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" placeholder="insira o telefone da empresa (apenas numeros)" name="telefone" required>

                <label  for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="insira o email da empresa" name="email" required>

                <input type="hidden" value="1" name="id_usuario" required>


                <label for="id_endereco">Endereço:</label>
                <select class="form-control" id="id_endereco" name="id_endereco" required>
                    <option value="-1">Selecione o Endereço</option>

                    @foreach($enderecos as $endereco)
                        <option value="{{$endereco->id}}">{{$endereco->cidade->nome}}, {{$endereco->cidade->estado}}, {{$endereco->bairro}}, {{$endereco->rua}}</option>
                    @endforeach
                </select>

                <label for="id_inspetor">Inspetor:</label>
                <select class="form-control" id="id_inspetor" name="id_inspetor" required>
                    <option value="-1">Selecione o Inspetor</option>

                    @foreach($inspetors as $inspetor)
                        <option value="{{$inspetor->id}}">{{$inspetor->nome}}, {{$inspetor->crea}}</option>
                    @endforeach
                </select>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("empresa.index")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

    <script>
        $(document).ready(function(){
            $('#telefone').mask('(99) 9999-9999');
        });
        $(document).ready(function(){
            $('#cnpj').mask('99.999.999/9999-99');
        });
        $(document).ready(function(){
            $('#celular').mask('(99) 99999-9999');
        });
    </script>
@endsection
