
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">CONTATOS</a>
            <hr class="bg-white">
            <p class="lead text-white">Cadastro</p>
        </div>
        <form  class="col-12 mt-2" action="{{Route('contato.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome do contato" name="nome" required>

                <label  for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" placeholder="insira o telefone para contato (apenas numeros)" name="telefone" required>

                <label  for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="insira o email" name="email" required>



                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/contato"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection
