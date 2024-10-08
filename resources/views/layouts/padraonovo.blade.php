<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../imagens/Mascara.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8ac21f36ef.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.6.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <title>Rastrea</title>
    <style>
        /* BACKGROUND */
        body {
            overflow-x: hidden;
            width: 100%;
            height: 100%;
            background-image: url("{{asset("imagens/Background low polyv2.png")}}");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        #nav_entidades {
            text-decoration: underline;
            font-weight: bold;
        }

        .popin {
            transition: 0.09s ease;

        }

        .popin:hover {
            transform: scale(1.01);
            transform: translateZ(1);
            backface-visibility: hidden;
        }

        #nomeSoldador {
            border-radius: 5px;
            border-width: 1px;
            margin-bottom: 5px;
            font-weight: lighter;
            padding-right: 50px;
            height: 25px;
            border-width: 1px;
        }

        #nomeSoldador:focus {
            outline: none;
        }

        .wrapNotificacao {
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

        .notificacao {
            position: absolute;
            margin: 0px;
            color: white;
            font-weight: lighter;
            font-size: 0.7rem;
            top: -2px;
        }

        .ad {
            width: 190px;
            height: 450px;
            background: rgba(255,255,255,0.9);
            border-radius: 5px;
            position: fixed;
            top: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transform: translateY(-50%);
        }

        .ad-bottom {
            width: 90%;
            height: 100px;
            background: white;
            position: fixed;
            top: 100%;
            transform: translate(50%, -110%);
            z-index: 100;
            right: 50%;
            display: none;
            justify-content: center;
        }

        .ad-click {
            text-decoration: none;
            cursor: pointer;
        }

        .ad-img {
            max-width: 100%;
        }


        .right {
            right: 1%;
        }

        .left {
            left: 1%;
        }

        .ad-margin {
            margin-top: 15px;
        }

        .badge-novo{
            position: absolute;
            top: 0%;
            display: flex;
            right:-10%;
        }

        @media (max-width: 1220px) {


            .ad-img {
                max-height: 100%;
            }

            .left {
                display: none;
            }

            .right {
                display: none
            }

            .ad-bottom {
                border-radius: 5px;
                background-color: rgba(255,255,255,0.9);
                display: flex;
            }

            .ad-margin {
                margin-bottom: 110px;
            }
        }

    </style>
</head>
<div style="width:100%;height:100%;background-color: rgba(255,255,255,0.8);position: fixed;left: 0px;display: none; z-index: 10000;background-repeat: no-repeat; background-size: cover"
     class="p-2" id="divFullscreen">
    <button id="exitFullscreen" class="btn btn-outline-primary mt-3" style="position: absolute;z-index: 20000"><i
                class="fas fa-times fa-2x"></i></button>
    <img id="imagemFullscreen" src="" class="rounded bg-shadow" height="100%" width="auto">
</div>

<body class="container-fluid">
<header class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-white col-12 " id="header">
        <a class="navbar-brand" href="#">
            <img src="{{asset("imagens/logo v1.png")}}" width="70" height="70" class="d-inline-block align-top "
                 alt="  Projeto Solda">
        </a>
        <button class="navbar-toggler text-center" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if($usuario->tipo == 1)
                    <li class="nav-item active">
                        <a class="nav-link font-weight-light " id="nav_empresas" style="font-size: 20px"
                           href="{{route("paginaInicial")}}">EMPRESAS<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-light " id="nav_soldadores" style="font-size: 20px"
                           href="{{route("hubSoldadores")}}">SOLDADORES</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-light" id="nav_eps" style="font-size: 20px"
                           href="{{route("listarEps")}}">EPS</a>
                    </li>

                    <li class="nav-item active position-relative">
                        <a class="nav-link font-weight-light" id="nav_eps_avancada" style="font-size: 20px"
                           href="{{route("listarEpsAvancada")}}">
                           <span style="position: relative">EPS AVANÇADA
                                <div class="wrapNotificacao">                         
                                    <p class="notificacao font-weight-bold">!</p>
                                </div>
                            </span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link font-weight-light " id="nav_requalificacao"
                           style="font-size: 20px;position: relative" href="{{route("requalificacoes")}}">

                            <span style="position: relative">REQUALIFICAÇÕES
                                @if((\App\SoldadorQualificacao::where('status','=','em-processo')->count()) > 0)
                                    <div class="wrapNotificacao">
                                    <p class="notificacao">{{\App\SoldadorQualificacao::where('status','=','em-processo')->count()}}</p>
                                </div>
                                @endif
                            </span>

                        </a>
                        <span class="sr-only">(current)</span></a>

                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-light " id="nav_requisicoes"
                           style="font-size: 20px;position: relative" href="{{route("requisicoes")}}">

                            <span style="position: relative">REQUISIÇÕES
                                @if(((\App\SoldadorQualificacao::where('criado','=','0')->count()) > 0) or ((\App\Soldador::where('criado','=','0')->count()) > 0) or ((\App\Eps::where('criado','=','0')->count()) > 0) )
                                    <div class="wrapNotificacao">
                                        <div id="valoresRequisicao" style="display: none">
                                            {{$soldadores=\App\Soldador::where('criado','=','0')->count()}}
                                            {{$eps=\App\Eps::where('criado','=','0')->count()}}
                                            {{$qualificacao=\App\SoldadorQualificacao::where('criado','=','0')->count()}}
                                        </div>
                                        <p class="notificacao">{{$soldadores+$eps+$qualificacao}}</p>
                                    </div>
                                @endif

                            </span>

                        </a>
                        <span class="sr-only">(current)</span></a>

                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-light " style="font-size: 20px" id="nav_cadastro"
                           href="{{route("cadastrar")}}">CADASTRAR<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link font-weight-light" id="nav_entidades" style="font-size: 20px"
                           href="{{route("entidades")}}">ENTIDADES</a>
                    </li>
                @endif
                <li>

                </li>
                @if($usuario->tipo!=1)
                    <li class="nav-item active">
                        <a class="nav-link font-weight-light" id="nav_soldadores" style="font-size: 20px"
                           href="{{route("hubSoldadores")}}">SOLDADORES</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-light" id="nav_eps" style="font-size: 20px"
                           href="{{route("listarEps")}}">EPS</a>
                    </li>
                    <li class="nav-item active position-relative">
                        <a class="nav-link font-weight-light" id="nav_eps_avancada" style="font-size: 20px"
                           href="{{route("listarEpsAvancada")}}">
                           <span style="position: relative">EPS AVANÇADA
                                <div class="wrapNotificacao">                         
                                    <p class="notificacao font-weight-bold pt-1" style="font-size: 7px"><i class="fa fa-star" aria-hidden="true"></i></p>
                                </div>
                            </span>
                        </a>
                    </li>
                    @if($usuario->tipo!=3)
                        <li class="nav-item active">
                            <a class="nav-link font-weight-light" id="nav_perfil" style="font-size: 20px"
                               href="{{route("editarUsuario")}}">PERFIL</a>
                        </li>
                    @endif
                @endif
            </ul>
            <div class="form-inline d-flex justify-content-center my-2 my-lg-0 mt-0">
                <a href="{{route("sair")}}" class="btn btn-outline-danger my-2 my-sm-0" style="width:50px"
                   type="submit">Sair</a>
            </div>
        </div>

    </nav>

</header>

<div class="row">
    @if($usuario->tipo!=1)
    @php($anuncios = \App\Anuncio::all())
        @if($anuncios->count()>0)
        <!-- Ad da esquerda -->
        <div class="ad left">
            <div id="carousel-ad-right" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- fazer um foreach aqui, so n pode esquecer de colocar o active no primeiro -->
                    @foreach($anuncios as $index => $anuncio)

                        <div class="carousel-item @if($index ==0) active @endif">
                            <a href="{{$anuncio->link}}" class="ad-click">
                                <img class="d-block w-100 ad-img" src="{{asset($anuncio->imagem_vertical)}}"
                                     alt="{{$anuncio->nome}}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Ad da direita -->
        <div class="ad right">
            <div id="carousel-ad-right" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- fazer um foreach aqui, so n pode esquecer de colocar o active no primeiro -->
                    @foreach($anuncios as $index => $anuncio)

                        <div class="carousel-item @if($index ==0) active @endif">
                            <a href="{{$anuncio->link}}" class="ad-click">
                                <img class="d-block w-100 ad-img" src="{{asset($anuncio->imagem_vertical)}}"
                                     alt="{{$anuncio->nome}}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Ad de baixo, nao esquecer de colocar a imagem na horizontal! -->
        <div class="ad-bottom">
            <div id="carousel-ad-right" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- fazer um foreach aqui, so n pode esquecer de colocar o active no primeiro -->
                    @foreach($anuncios as $index => $anuncio)

                        <div class="carousel-item @if($index ==0) active @endif">
                            <a href="{{$anuncio->link}}" class="ad-click">
                                <img class="d-block ad-img" style="height: 100px" src="{{asset($anuncio->imagem_horizontal)}}"
                                     alt="{{$anuncio->nome}}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @endif
    @yield('content')
</div>

</body>

</html>
