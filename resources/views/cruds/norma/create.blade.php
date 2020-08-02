
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">NORMAS</a>
            <hr class="bg-white">
            <p class="lead text-white">Cadastro</p>
        </div>
        <form  class="col-12 mt-2" action="{{Route('norma.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome da norma" name="nome" required>

                <label  for="descricao">Descrição:</label>
                <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição da norma" name="descricao" required></textarea>

                <label  for="validade">Data validade:</label>
                <input type=a"date" class="form-control" id="validade" placeholder="Insira a data de validade da norma" name="validade" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/norma"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection
