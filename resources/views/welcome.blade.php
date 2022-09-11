<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Rastrea</title>
    <link rel="icon" href={{asset("imagens/icon.png")}}>
    <style>
        /* BACKGROUND */
        body{
            overflow-x: hidden;
            width: 100%;
            height:100vh;
            background-image: url({{asset("imagens/bg.jpg")}});
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:cover;
            z-index: -2;
        }
        #background.blur{
            backdrop-filter: blur(5px);
        }
        #body.blur{
            filter: blur(5px);
            user-select: none;
            pointer-events: none;
        }
        .header{
            position: relative;
            height: 40vh;
        }
        .first-section{
            width: 55%;
            background: white;
            display: flex;
            justify-content: center;
            margin: 0px;
            padding: 0px;
            z-index: 11;
        }
        .first-section-content{
            width: 70%;
            margin: 0px;
            margin-top: 30px;
            padding: 0px;
            position: relative;
        }
        .info{
            position: absolute;
            top: 97%;
            z-index: 5;
            width: 100%;
            background: white;
            text-align: center;
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
            padding: 10px;
            z-index: -1;
        <!--box-shadow: 0px 10px 10px #262626 -->;
        }
        .second-section{
            width: 45%;
            background: white;
            display: flex;
            justify-content: start;
            margin: 0px;
            padding: 0px;
            z-index: 10;
        }
        .second-section-content{
            width: 80%;
            height: 80%;
            background: #1979de;
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
            position: relative;
            animation: drop 1.0s ease;
        }
        .btn-cadastra{
            width: 100%;
            font-size: 20px;
            padding: 25px;
            border: #fcfc70;
            border-width: 5px;
            border-style: solid;
            font-weight: bold;
            border-radius: 25px;
            background: #ffff9e;
            position: absolute;
            top:120%;
            animation: none;
            z-index: 10;
        <!-- box-shadow: 0px 10px 10px #262626 -->;
        }
        .btn-cadastra:hover{
            cursor: pointer;
            border: #fcfc48;
            border-width: 5px;
            border-style: solid;
            background: #fcfc70;
        }

        *:focus {
            outline: 0 !important;
        }
        .popup{
            background: #f5f5f5;
            position: fixed;
            top:40%;
            left:50%;
            transform: translate(-50%,-50%);
            max-width: 600px;
            min-width: 200px;
            padding: 50px;
            border-radius: 15px;
            visibility: hidden;
            opacity: 0;
            transition: 0.5s;
            z-index: 20;
        }
        .popup-content{
            position: relative;
        }
        .close-popup{
            padding: 0px;
            padding-left: 7px;
            padding-right: 7px;
            margin: 0px;
            position: absolute;
            top: -25px;
            right: -25px;

        }
        .popup.active{
            top: 50%;
            visibility: visible;
            opacity: 1;
            transition: 0.5s;
        }
        @keyframes drop {
            0% {
                opacity: 0;
                transform: translateY(-80px);
            }
            100% {
                opacity: 1;
                transform: translateY(0px);
            }
        }
        #email{
            font-size: 20px;
            border-radius: 15px;
        }
        #telefone{
            font-size: 20px;
            border-radius: 15px;
        }


        @media (max-width: 1150px) {
            .header{
                height: 15vh;
            }
            .first-section{
                width: 100%;
            }
            .first-section-content{
                width: 90%;
                margin-bottom: 15px;
            }
            .second-section{
                width: 100%;
                justify-content: center;
                background: none;
            }
            .second-section-content{
                border-top-right-radius: 0px;
                border-top-left-radius: 0px;
                height: 100%;
                z-index: -1;
            }
            .btn-cadastra{
                top: 120%;
            }
            .info{
                display: none;
            }
            #email{
                font-size: 15px;
            }
            #telefone{
                font-size: 15px;
            }
        }
    </style>
        <script>
        function formataTelefone(){
            var telefone = document.getElementById("telefone").value;
            if(telefone.length==11){
                var telefoneFormatado = telefone.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
            }else{
                var telefoneFormatado = telefone.replace(/^(\d{2})(\d{4})(\d{4}).*/, '($1) $2-$3');
            }
            document.getElementById("telefone").value=(telefoneFormatado);
        }
    </script>
</head>
<body id="background">
<div class="container-fluid" id="body">
    <header class="header row bg-white">
        <div class="first-section">
            <div class="first-section-content">
                <img src="{{asset("imagens/logo.png")}}" width="100%" style="margin: 0px">
                <p class="info shadow-sm">
                    Deixe que o Rastrea cuide para que sua empresa se mantenha em dia e adequada às exigências das normas de qualificação dos processos de soldagem.
                </p>
            </div>
        </div>
        <div class="second-section">
            <div class="second-section-content shadow-lg">
                <form action="{{route("login")}}" method="post" class="form-group col-12 mb-5 formulario" >
                    @csrf
                    <input type="email" name="email" class="form-control mt-4" placeholder="Email" style="font-size: 20px;border-radius: 15px;"  required>
                    <input type="password" name="senha" class="form-control mt-3" placeholder="Senha" style="font-size: 20px;border-radius: 15px;" required>
                    <input type="submit" value="Entrar" class="btn btn-block btn-outline-light btn-login  mt-3 mb-2" style="font-size: 20px;font-weight: bold;border-radius: 15px;" >
                    @if(!empty($mensagem))
                        <div class="alert alert-danger mt-2">
                            {{$mensagem}}
                        </div>
                    @endif
                    @if(!empty($criado))
                        <div class="alert alert-success mt-2">
                            {{$criado}}
                        </div>
                    @endif
                </form>
                <button class="btn-cadastra" onclick="popup()">CADASTRE-SE AQUI</button>
            </div>
        </div>
    </header>


</div>
<div class="popup" id="popUp">
    <div class="popup-content">
        <h2 style="text-align: center">Deixe seus dados para entrarmos em contato.</h2>
        <form method="get" action="{{route("email5")}}">
            <input type="email" id="email" name="email" class="form-control mt-5" placeholder="Email"  required>
            <input type="tel" id="telefone" name="telefone" class="form-control mt-4 mt-sm-2" placeholder="Número de telefone" onchange="formataTelefone()" required maxlength="11" required>
            <input type="submit" value="Enviar" class="btn btn-block btn-outline-dark btn-login mt-sm-2  mt-4 mb-2" style="font-size: 20px;font-weight: bold;border-radius: 15px;" >
        </form>
        <button class="close-popup btn btn-outline-dark" onclick="popup()">X</button>
    </div>
</div>
</body>
<script>
    function popup(){
        var blur = document.getElementById('body');
        blur.classList.toggle('blur');
        var background = document.getElementById('background');
        background.classList.toggle('blur');
        var popup = document.getElementById('popUp');
        popup.classList.toggle('active');
    }
</script>
