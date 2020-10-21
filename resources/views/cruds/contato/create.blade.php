
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Contatos:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="{{Route('contato.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome do contato" name="nome" required>

                <label  for="telefone"> Telefone:</label>
                <input  type="tel"  id="telefone"   class="form-control " placeholder="Insira o telefone para contato (apenas numeros)" name="telefone" required>

                <label  for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" required>



                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("contato.index")}}"><button class="btn btn-outline-light mt-2 text-dark  "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>


    <script>
        $(document).ready(function(){
            $('#telefone').mask('(99) 99999-9999');
        });
    </script>
@endsection
