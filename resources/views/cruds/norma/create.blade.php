
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Normas:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="{{Route('norma.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome da norma" name="nome" required>

                <label  for="descricao">Descrição:</label>
                <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição da norma" name="descricao" required></textarea>

                <label for="validade">Validade:</label>
                <select name="validade" class="form-control" id="validade">
                    <option value="3">3 meses</option>
                    <option value="6">6 meses</option>
                    <option value="9">9 meses</option>
                    <option value="12">12 meses</option>
                    <option value="24">24 meses</option>
                    <option value="36">36 meses</option>
                </select>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("norma.index")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection
