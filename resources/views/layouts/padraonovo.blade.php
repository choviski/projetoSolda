<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../imagens/Mascara.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8ac21f36ef.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.6.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.js"></script>

    <title>Projeto Solda</title>
    <style>
        /* BACKGROUND */
        body{
            overflow-x: hidden;
            width: 100%;
            height:100%;
            background-image: url("{{asset("imagens/Background low polyv2.png")}}");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:cover;
        }
        #nav_entidades{
            text-decoration: underline;
            font-weight: bold;
        }
        .popin{
            transition: 0.09s ease;

        }
        .popin:hover{
            transform: scale(1.01);
            transform: translateZ(1);
            backface-visibility: hidden;
        }
        .formularioFiltro{
            position: relative;
        }
        .botaoProcurar{
            position: absolute;
            right: 15px;
            border-radius: 5px;
            border:none;
            color: white;
            background-color: #007bff;
            height: 25px;
            width: 30px;
            font-weight: lighter;

        }
        #nomeSoldador{
            border-radius: 5px;
            border-width: 1px;
            margin-bottom: 5px;
            font-weight: lighter;
            padding-right: 50px;
            height: 25px;
            border-width: 1px;
        }
        #nomeSoldador:focus{
            outline: none;
        }
        .warpNotificacao{
            position: absolute;
            display: flex;
            background-color: #007bff;
            width: 15px;
            height: 15px;
            text-align: center;
            justify-content: center;
            border-radius: 50%;
            right: -10px;
            top: -5px;
        }
        .notificacao{
            position: absolute;
            margin: 0px;
            color: white;
            font-weight: lighter;
            font-size: 0.7rem;
            top: -2px;
        }
    </style>
</head>
<div style="width:100%;height:100%;background-color: rgba(255,255,255,0.8);position: fixed;left: 0px;display: none; z-index: 10000;background-repeat: no-repeat; background-size: cover" class="p-2" id="divFullscreen" >
    <button id="exitFullscreen" class="btn btn-outline-primary mt-3" style="position: absolute;z-index: 20000" ><i class="fas fa-times fa-2x"></i></button>
    <img id="imagemFullscreen" src="" class="rounded bg-shadow"  height="100%" width="auto">
</div>

<body class="container-fluid">
    <header class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-white col-12 ">
            <a class="navbar-brand" href="#">
                <img src="{{asset("imagens/logo v1.png")}}" width="70" height="70" class="d-inline-block align-top " alt="  Projeto Solda">
            </a>
            <button class="navbar-toggler text-center" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @if($usuario->tipo == 1)
                    <li class="nav-item active" >
                        <a class="nav-link font-weight-light " id="nav_empresas" style="font-size: 25px" href="{{route("paginaInicial")}}" >EMPRESAS<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active"  >
                        <a class="nav-link font-weight-light "  id="nav_soldadores" style="font-size: 25px" href="{{route("hubSoldadores")}}" >SOLDADORES</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-light " id="nav_requalificacao" style="font-size: 25px;position: relative" href="{{route("requalificacoes")}}">

                            <span style="position: relative">REQUALIFICAÇÕES
                                @if((\App\SoldadorQualificacao::where('status','=','em-processo')->count()) > 0)
                                <div class="warpNotificacao">
                                    <p class="notificacao">{{\App\SoldadorQualificacao::where('status','=','em-processo')->count()}}</p>
                                </div>
                                @endif
                            </span>

                        </a>
                            <span class="sr-only">(current)</span></a>

                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-light " style="font-size: 25px" id="nav_cadastro" href="{{route("cadastrar")}}">CADASTRAR<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active " >
                        <a  class="nav-link font-weight-light"  id="nav_entidades"  style="font-size: 25px" href="{{route("entidades")}}">ENTIDADES</a>
                    </li>
                    @endif
                    @if($usuario->tipo==2)
                            <li class="nav-item active"  >
                                <a class="nav-link font-weight-light"  id="nav_soldadores" style="font-size: 25px" href="{{route("hubSoldadores")}}" >SOLDADORES</a>
                            </li>
                            <li class="nav-item active" >
                                <a  class="nav-link font-weight-light"  id="nav_perfil"  style="font-size: 25px" href="{{route("editarUsuario")}}">PERFIL</a>
                            </li>
                    @endif
                </ul>
                <div class="d-flex justify-content-center">
                    <p class="btn btn-outline-primary mb-0 mr-sm-0 mr-md-1"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="width:50px"><i class="fas fa-search"></i></p>
                </div>
                <div class="form-inline d-flex justify-content-center my-2 my-lg-0 mt-0">
                    <a href="{{route("sair")}}" class="btn btn-outline-danger my-2 my-sm-0" style="width:50px" type="submit">Sair</a>
                </div>
            </div>

        </nav>
        <div class="collapse col-12 p-0" id="collapseExample">
            <form class="bg-white col-12 formularioFiltro" method="post" action="{{route("soldadoresFiltrados")}}">
                @csrf
                <input class="col-12 " name="nomeSoldador" id="nomeSoldador" placeholder="Insira o nome do soldador..." autocomplete="off">
                <button class="botaoProcurar"><i class="fas fa-arrow-right"></i></button>


            </form>
        </div>
    </header>
    <div class="row">
        @yield('content')
    </div>
</body>

</html>
