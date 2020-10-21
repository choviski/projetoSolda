
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Cidades:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">

        <form  class="col-12  mt-2" action="{{Route('cidade.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome da cidade" name="nome" required>

                <label  for="estado">Estado:</label>

                <input type="text" class="form-control" id="estado" placeholder="Insira o estado" name="estado" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("cidade.index")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>


@endsection

