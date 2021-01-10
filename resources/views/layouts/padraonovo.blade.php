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
                    <li class="nav-item active">
                        <a class="nav-link" style="font-size: 25px" href="{{route("paginaInicial")}}">Início<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active"  >
                        <a class="nav-link"  id="nav_soldadores" style="font-size: 25px" href="{{route("hubSoldadores")}}">Soldadores</a>
                    </li>
                    @if($usuario->tipo == 1)
                    <li class="nav-item active">
                            <a class="nav-link" style="font-size: 25px" href="{{route("requalificacoes")}}">Requalificações<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="font-size: 25px" href="{{route("cadastrar")}}">Cadastro<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active" >
                        <a  class="nav-link"  id="nav_entidades"  style="font-size: 25px" href="{{route("entidades")}}">Entidades</a>
                    </li>
                    @endif
                    @if($usuario->tipo==2)
                        <li class="nav-item active" >
                            <a  class="nav-link"  id="nav_perfil"  style="font-size: 25px" href="{{route("editarUsuario")}}">Perfil</a>
                        </li>
                    @endif
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="{{route("sair")}}" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Sair</a>
                </form>
            </div>
        </nav>
    </header>
    <div class="row">
                @yield('content')
    </div>
</body>

</html>