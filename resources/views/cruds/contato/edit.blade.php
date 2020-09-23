
@extends('../../../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Contatos:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

    <form class="col-12 mt-2"action="{{Route('contato.update',['contato'=> $contato->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded mt-2">

                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="{{$contato->nome}}" name="nome" required>

                <label  for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" value="{{$contato->telefone}}" name="telefone" required>

                <label  for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="{{$contato->email}}" name="email" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="/contato"><button class="btn btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

    <script>
        $(document).ready(function(){
            $('#telefone').mask('(99) 99999-9999');
        });
    </script>
@endsection
