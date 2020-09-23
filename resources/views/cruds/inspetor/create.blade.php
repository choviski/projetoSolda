
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Inspetores:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
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
        <a href="/inspetor"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection
