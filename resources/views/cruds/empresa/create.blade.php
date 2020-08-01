
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">EMPRESA</a>
            <hr class="bg-white">
            <p class="lead text-white">Cadastro</p>
        </div>
        <form  class="col-12 mt-2" action="{{Route('empresa.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="cnpj">CNPJ:</label>
                <input type="text" class="form-control" id="cnpj" placeholder="Insira CNPJ da empresa" name="cnpj" required>

                <label  for="razao_social">Razão Social:</label>
                <input type="text" class="form-control" id="razao_social" placeholder="Insira a razão social da empresa" name="razao_social" required>

                <label  for="nome_fantasia">Nome Fantasia</label>
                <input type="text" class="form-control" id="nome_fantasia" placeholder="Insira o nome fantasia da empresa (se tiver)" name="nome_fantasia">

                <label  for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" placeholder="insira o telefone da empresa (apenas numeros)" name="telefone" required>

                <label  for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="insira o email da empresa" name="email" required>

                <label  for="endereco">Endereco:</label>
                <input type="number" class="form-control" id="endereco" placeholder="insira o endereco da empresa" name="id_endereco" required>

                <label  for="inspetor">Inspetor:</label>
                <input type="number" class="form-control" id="inspetor" placeholder="insira o inspetor da empresa" name="id_inspetor" required>






                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/empresa"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection