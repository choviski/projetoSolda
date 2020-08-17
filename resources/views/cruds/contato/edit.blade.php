
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">CONTATO</a>
            <hr class="bg-white">
            <p class="lead text-white">Edição: {{$contato->nome}}</p>
        </div>
        <form class="col-12 mt-2"action="{{Route('contato.update',['contato'=> $contato->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="{{$contato->nome}}" name="nome" required>

                <label  for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" value="{{$contato->telefone}}" name="telefone" required>

                <label  for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="{{$contato->email}}" name="email" required>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/contato"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    <script>
        $(document).ready(function(){
            $('#telefone').mask('(99) 99999-9999');
        });
    </script>
@endsection
