
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">INSPETORES</a>
            <hr class="bg-white">
            <p class="lead text-white">Cadastro</p>
        </div>
        <form  class="col-12 mt-2" action="{{Route('inspetor.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome do inspetor" name="nome" required>

                <label  for="crea">CREA:</label>
                <input type="text" class="form-control" id="crea" placeholder="insira o CREA do inspetor" name="crea" required>

                <label  for="funcao">Função:</label>
                <input type="text" class="form-control" id="funcao" placeholder="insira a função do inspetor" name="funcao" required>



                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/inspetor"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection
