@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .login_info {
            background-color: #fff;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 5px;
            border: solid 1px #ced4da;
        }

        .formDelBtn {
            position: relative;
            transition: 0.3s ease;
        }

        .nomeEmpresa {
            position: relative;
            top: 22px;
            left: 15px;
            margin-bottom: 0px;
            background-color: white;
            width: auto;
            display: inline-block;
            padding: 0 0.5vw 0 0.5vw;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            text-decoration: underline;
            text-align: center;
        }

        .delBtn {
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top: -10px;
            right: 13px;
            z-index: 1;
            background-color: white;
            color: #d92b2b;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+50%);
            align-items: center;
            text-align: center;
            transition: 0.3s ease;
            border-style: solid;
            border-width: 1px;
            border-color: #d92b2b;
        }

        .formDelBtn {
            position: relative;
            transition: 0.3s ease;
        }

        .nomeEmpresa {
            position: absolute;
            top: -15px;
            left: 15px;
            margin-bottom: 0px;
            background-color: white;
            width: fit-content;
            display: inline-block;
            padding: 0 0.5vw 0 0.5vw;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            text-decoration: underline;
            text-align: center;
        }

        .delBtn {
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top: -10px;
            right: 13px;
            z-index: 1;
            background-color: white;
            color: #d92b2b;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+50%);
            align-items: center;
            text-align: center;
            transition: 0.3s ease;
            border-style: solid;
            border-width: 1px;
            border-color: #d92b2b;
        }

        .delBtn:hover {
            background-color: #d92b2b;
            color: white;
        }

        .delBtn:hover {
            background-color: #d92b2b;
        }

        .formEditBtn {
            position: relative;
        }

        .editBtn {
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top: -10px;
            right: 43px;
            z-index: 1;
            background-color: white;
            color: #228db8;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+50%);
            align-items: center;
            text-align: center;
            border-style: solid;
            border-width: 1px;
            border-color: #0c7eab;
            transition: 0.3s ease;
        }

        .editBtn:hover {
            background-color: #0c7eab;
            color: white;
            align-items: center;
            text-align: center;
        }

        .delBtn:hover {
            background-color: #d92b2b;
            color: white;
        }

        .delBtn:hover {
            background-color: #d92b2b;
        }

        .formEditBtn {
            position: relative;
        }

        .editBtn {
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top: -10px;
            right: 43px;
            z-index: 1;
            background-color: white;
            color: #228db8;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+50%);
            align-items: center;
            text-align: center;
            border-style: solid;
            border-width: 1px;
            border-color: #0c7eab;
            transition: 0.3s ease;
        }

        .editBtn:hover {
            background-color: #0c7eab;
            color: white;
            align-items: center;
            text-align: center;
        }
    </style>


    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">LOGINS:</p>
    </div>

    <div id="logins">
        <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 p-0 rounded-bottom">
            <div id="addLogin" class="col-12 mt-2 mb-2 p-0 popin">
                <form method="get" action="{{"cadastroLogin"}}">
                    @csrf
                    <input type="hidden" name="idEmpresa" id="idEmpresa">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Adicionar login">
                </form>
            </div>

            @foreach($usuarios as $usuario)
                <div class="warpLogin popin" style="relative">
                    <div class="col-sm-12 col-md-8 mx-auto mt-4 p-0 bg-white rounded d-flex align-itens-center flex-column">
                        <p class="nomeEmpresa" style="z-index: 1">{{$usuario->empresa ? $usuario->empresa->razao_social : 'Info Solda'}}</p>
                        <div class="login_info col-11 p-1 mt-4 mx-auto">
                            <p class="m-0">Email: {{$usuario->email}}</p>
                        </div>
                        <div class="login_info col-11 mt-2 mx-auto" style="padding: 0px; border:0px">
                            <input id="senha-1" type="password" disabled value="{{$usuario->senha}}"
                                   class="form-control text-center ">
                            <i id="mostrar-senha-1" class="fa fa-eye" onclick="mostrarSenha(1)" aria-hidden="true"
                               style="position: absolute; right:25px; top:12px; cursor: pointer"></i>
                            <!-- Onde tem "1" como valor nos ids e na funcao do onclick mudar para a { { empresa->id } } -->
                        </div>
                        <div class="login_info col-11 mt-2 mb-4 mx-auto">
                            <p class="m-0">Nível de acesso: Administrador</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <script>
        function mostrarSenha(empresaId) {
            var input = document.getElementById("senha-" + empresaId);
            if (input.type === "password") {
                input.type = "text";
                document.getElementById("mostrar-senha-" + empresaId).classList.remove("fa-eye");
                document.getElementById("mostrar-senha-" + empresaId).classList.add("fa-eye-slash");
            } else {
                document.getElementById("mostrar-senha-" + empresaId).classList.remove("fa-eye-slash");
                document.getElementById("mostrar-senha-" + empresaId).classList.add("fa-eye");
                input.type = "password";
            }
        }
    </script>
@endsection