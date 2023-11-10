
@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_soldadores{
            text-decoration: none;
            font-weight: normal;
        }
        #nav_entidades{
            text-decoration: underline;
            font-weight: bold;
        }
        input[type="file"]{
            margin: 0px;
            padding: 0px;
            display: none;
        }
        .btnImg{
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
        .btnImg:hover{
            background-color: #0275d8;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">CADASTRO DA ANÚNCIO:</p>
        @if(!empty($erro))
            <div class="alert alert-danger mt-2">
                {{$erro}}
            </div>
        @endif
    </div>

    <div class="container-fluid col-12 d-flex justify-content-center mt-2 ">
        <form class=" col-md-9 col-sm-10 mt-2" action="#"enctype="multipart/form-data">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control mb-2" id="nome" placeholder="Insira o nome do anúncio" name="nome" required>


                <label for="ad">Link para redirecionar:</label>
                <input type="text" class="form-control" id="ad" placeholder="Insira o link para redirecionar quando o anúncio for clicado" name="ad" required>


                <label for="imgV" id="labelImgs1" class="mt-2 col-12 p-0">Escolha a imagem vertical do anúncio: </label>
                <label for="imgV" id="labelImgV" class="btnImg">Escolha a imagem vertical do anúncio</label>
                <input type="file"id="imgV" name="imgV" multiple required>


                <label for="imgH" id="labelImgs2" class="mt-2 col-12 p-0">Escolha a imagem horizontal do anúncio: </label>
                <label for="imgH" id="labelImgH" class="btnImg">Escolha a imagem horizontal do anúncio</label>
                <input type="file"id="imgH"  name="imgH" multiple required>      <input type="hidden" name="criado" value="1">

                <input type="submit" class="btn btn-outline-primary mt-3 col-12" value="Cadastrar">
            </div>
            <a href="{{route("listarAds")}}" class="btn btn-outline-light mt-1 mb-2 col-12 text-dark "><i class="fas fa-arrow-left"></i> Voltar</a>

        </form>
    </div>
    <script >
        $("#imgV").on("change", function(){
            nImg = document.getElementById('imgV').files.length;
            if(nImg>0){
                document.getElementById('labelImgV').innerHTML='Imagem vertical escolhida';
                document.getElementById('labelImgV').style.backgroundColor='#0275d8';

            }else{
                document.getElementById('labelImgV').innerHTML='Escolha a imagem vertical do anúncio';
                document.getElementById('labelImgV').style.backgroundColor='#59acff';
            }
        })
        $("#imgH").on("change", function(){
            nImg = document.getElementById('imgH').files.length;
            if(nImg>0){
                document.getElementById('labelImgH').innerHTML='Imagem horizontal escolhida';
                document.getElementById('labelImgH').style.backgroundColor='#0275d8';

            }else{
                document.getElementById('labelImgH').innerHTML='Escolha a imagem horizontal do anúncio';
                document.getElementById('labelImgH').style.backgroundColor='#59acff';
            }
        })
    </script>

@endsection
