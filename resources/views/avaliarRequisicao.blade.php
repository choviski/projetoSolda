@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_requisicoes{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
        input[type="file"]{
            margin: 0px;
            padding: 0px;
            display: none;
        }
        #btnFoto{
            background-color: #59acff;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            font-weight: lighter;
            width: auto;
            display: block;
            text-align: center;
            transition: 0.3s ease;
        }
        #btnFoto:hover{
            background-color: #0275d8;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">AVALIAR REQUISIÇÃO DE CADASTRO:</p>
    </div>

    <div class="container-fluid col-12 d-flex justify-content-center mt-2 ">
        <form class="col-md-9 col-sm-10 mt-2" action="{{route("processarRequisicao")}}" method="post" id="form" >
            @csrf
            @method('POST')
            <div class="form-group bg-light col-12 p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="{{$soldador->nome}}"  value="{{$soldador->nome}}" name="nome" required>

                <label  for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" placeholder="CPF do Soldador" name="cpf" value="{{$soldador->cpf}}" required>

                <label for="foto" id="" class="mt-2 col-12 p-0">Foto do soldador:</label>
                <div>
                    <img src="@if($soldador->foto){{asset($soldador->foto)}}@else{{asset("imagens/soldador_default.png")}}@endif" onerror="this.onerror=null;this.src='{{asset("imagens/soldador_default.png")}}';" width="100px" height="100px" class="rounded-circle border">
                </div>
                <label for="foto" id="btnFoto" class="">Escolha a foto</label>
                <input type="file" class="" id="foto" placeholder="Imagem do Soldador" name="foto">


                <label  for="sinete" class="col-12 p-0">Sinete:</label>
                <input type="text" class="form-control" id="sinete" placeholder="Sinete" value="{{$soldador->sinete}}" name="sinete" required>

                <label  for="matricula">Matricula:</label>
                <input type="text" class="form-control" id="matricula" placeholder="Matricula" value="{{$soldador->matricula}}" name="matricula" required>

                <label  for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="{{$soldador->email}}" >


                <input type="hidden" name="id_empresa" value="value="{{$soldador->id_empresa}}"">

                <input type="submit" class="btn btn-outline-success mt-3 col-12" value="Aceitar" id="aceitar">
                <input type="submit" class="btn btn-outline-danger mt-3 col-12" value="Negar"  id="negar">
                <input type="hidden" value="{{$soldador->id}}" name="id">
                <input type="hidden" value="0" name="aceito" id="aceito">
                <script>
                    $( "#aceitar" ).click(function() {
                        $( "#aceito" ).val(1);
                    });
                    $( "#negar" ).click(function() {
                        $( "#aceito" ).val(0);
                    });
                </script>
            </div>
        </form>

    </div>
    <div class=" d-flex justify-content-center col-12">
        <a href="{{route("requisicoes")}}" class="col-md-9 col-sm-10"><button class="btn btn-outline-light mt-1 mb-3 col-12 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection
