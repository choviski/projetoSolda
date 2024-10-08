<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../imagens/Mascara.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8ac21f36ef.js"></script>
    <title>Projeto Solda</title>
    <script src="https://kit.fontawesome.com/8ac21f36ef.js"></script>

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

<body class="container-fluid ">
    <div class="row d-flex justify-content-center" id="warp-body" style="">
        <div class=" col-md-6 col-sm10 text-center" style="margin-top: 10%;transform: translateY(-20%)">
            <img src="{{asset("imagens/logo v1.png")}}" width="150px"  class="mt-5 mb-5 mb-md-0 mb-lg-0" id="logo">

            <div class=" p-2 bg-light rounded shadow text-center">

                    <form action="{{route("cadastrar")}}" method="post" class="form-group ">
                        @csrf
                        @if(!empty($erro))
                            <div class="alert alert-danger mt-2">
                                {{$erro}}
                            </div>
                        @endif
                        @if(!empty($erro2))
                            <div class="alert alert-danger mt-2">
                                {{$erro2}}
                            </div>
                        @endif

                        <input type="text" name="nome" class="form-control mt-2" placeholder="Nome" required>
                        <input type="email" name="email" class="form-control mt-2" placeholder="E-mail" required>
                        <input type="password" name="senha" class="form-control mt-2" placeholder="Senha" required>
                        <input type="hidden" name="tipo" value=2 required>
                        <input type="submit" value="Cadastrar" class="btn-block btn-primary rounded mt-2">

                    </form>
                    <a href="{{route("inicio")}}">Voltar</a>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
