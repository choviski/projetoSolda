
@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_soldadores{
            text-decoration: none;
            font-weight: bold;
        }
        #nav_eps{
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
        <p class="lead p-1 m-0" style="font-size: 22px">REQUISIÇÃO DE NOVA EPS:</p>
        @if(!empty($erro))
            <div class="alert alert-danger mt-2">
                {{$erro}}
            </div>
        @endif
    </div>

    <div class="container-fluid col-12 d-flex justify-content-center mt-2 ">
        <form  class=" col-md-9 col-sm-10 mt-2" action="{{route("salvandoRequisicaoEps")}}" method="post" enctype="multipart/form-data">
      
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome da EPS" name="nome" required>

                <label for="foto" id="labelFotos" class="mt-2 col-12 p-0">Insira o(s) documento(s) da EPS:</label>
                <label for="foto" id="btnFoto" class="">Escolha o(s) documento(s)</label>
                <input type="file" class="" id="foto" placeholder="Insira o(s) documento(s) da EPS:" name="fotos[]" multiple required>



                <input type="hidden" name="id_empresa" value="{{$empresa}}">

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
            <a href="{{route("paginaInicial")}}" class="btn btn-outline-light mt-1 mb-2 col-12 text-dark "><i class="fas fa-arrow-left"></i> Voltar</a>

        </form>
    </div>  
    <script >
        $("#foto").on("change", function(){
            nFotos = document.getElementById('foto').files.length;
            if(nFotos>0){
                document.getElementById('btnFoto').innerHTML='Documentos escolhidos: '+nFotos;
                document.getElementById('btnFoto').style.backgroundColor='#0275d8';

            }else{
                document.getElementById('btnFoto').innerHTML='Escolha o(s) documento(s):';
                document.getElementById('btnFoto').style.backgroundColor='#59acff';
            }
        })
    </script>
    
@endsection
