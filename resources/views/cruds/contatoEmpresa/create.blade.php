
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">CONTATOS EM EMPRESAS</a>
            <hr class="bg-white">
            <p class="lead text-white">Cadastro</p>
        </div>
        <form  class="col-12 mt-2" action="{{Route('contatoEmpresa.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="contato">Contato:</label>
                <input type="number" class="form-control" id="contato" placeholder="Insira o id do contato" name="id_contato" required>

                <label  for="empresa">Empresa:</label>
                <input type="number" class="form-control" id="empresa" placeholder="insira o id da empresa" name="id_empresa" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/contatoEmpresa"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection
