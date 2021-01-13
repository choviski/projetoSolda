
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Cadastrar novo Soldador:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="{{Route('salvarSoldador')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome do Soldador" name="nome" required>

                <label  for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" placeholder="Insira o CPF do Soldador" name="cpf" required>

                <label  for="foto">Foto:</label>
                <input type="file" class="form-control" id="foto" placeholder="Insira a imagem do Soldador" name="foto">


                <label  for="sinete">Sinete:</label>
                <input type="text" class="form-control" id="sinete" placeholder="Insira o sinete" name="sinete" required>

                <label  for="matricula">Matricula:</label>
                <input type="text" class="form-control" id="matricula" placeholder="Insira o matricula" name="matricula" required>

                <label  for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" >


                <input type="hidden" name="id_empresa" value="{{$empresa}}">

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("selecionarEmpresa")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>
    <script>
        $(document).ready(function(){
            $('#cpf').mask('999.999.999-99');
        });
    </script>
@endsection
