@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_perfil {
            text-decoration: underline;
            font-weight: bold;
        }

        #nav_entidades {
            text-decoration: none;
            font-weight: normal;
        }

        .ativo {
            background-color: #EEEEEE;
            text-decoration: underline;
        }

        .bloco_ativo {
            display: block;
        }

        .bloco_inativo {
            display: none;
        }

        .login_info {
            background-color: #fff;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 5px;
            border: solid 1px #ced4da;
        }
        .delBtn {
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top: -10px;
            right: 165px;
            z-index: 10;
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

        .formEditBtn {
            position: relative;
            width: 100%;
            z-index: 100;
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

          
        .formDelBtn {
            position: relative;
            transition: 0.3s ease;
        }
        
        .wrapForm{
            position: absolute;
            right: -150px;
            top: -20px;
        }

        .formEditBtn {
            position: relative;
            right: 0px;
            width: 100%;
        }

        .editBtn {
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top: -10px;
            right: 200px;
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
    </style>
    <div class="col-12 bg-white text-center shadow-sm ">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">EDITAR INFORMAÇÕES:</p>
    </div>
    <div class="col-12 p-0 bg-white text-center d-md-flex shadow-sm rounded-bottom">
        <div class="col-md-6 col-sm-12 border p-2 ativo" id="info_option" style="font-size: 16px; cursor: pointer"
             onclick="mostrarInfo()">
            <span style="position: relative">INFORMAÇÕES               
            </span>
        </div>
        <div class="col-md-6 col-sm-12 border p-2" id="login_option" style="font-size: 16px; cursor: pointer"
             onclick="mostrarLogins()">
            <span style="position: relative">LOGINS              
            </span>
        </div>
    </div>
    <!--  Inicio Bloco de informacoes da empresa -->
    <div id="form_info" class="bloco_ativo">
        <div class="row col-12 d-flex justify-content-center ">
            <form class="col-md-9 col-sm-12 p-0 mt-3" action="{{Route('salvarUsuario',['id'=> $empresa->id])}}"
                  method="post">
                @csrf
                @method('PUT')
                <div class="form-group bg-light p-2 rounded">
                    <div class="row">
                        <div class=" col">
                            <label for="razao_social" class="mb-0">Razão social:</label>
                            <input type="text" class="form-control" id="razao_social" value="{{$empresa->razao_social}}"
                                   name="razao_social" required>
                        </div>
                        <div class="col">
                            <label for="nome_fantasia" class="mb-0">Nome fantasia:</label>
                            <input type="text" class="form-control col" id="nome_fantasia"
                                   value="{{$empresa->nome_fantasia}}" name="nome_fantasia" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="cnpj" class="mb-0">CNPJ:</label>
                            <input type="text" class="form-control" id="cnpj" value="{{$empresa->cnpj}}" name="cnpj"
                                   required disabled>
                        </div>
                        <div class="col">
                            <label for="celular" class="mb-0">Celular:</label>
                            <input type="text" class="form-control" id="celular" value="{{$empresa->celular}}"
                                   name="celular">
                        </div>
                        <div class="col">
                            <label for="telefone" class="mb-0">Telefone:</label>
                            <input type="text" class="form-control" id="telefone" value="{{$empresa->telefone}}"
                                   name="telefone" required>
                        </div>
                    </div>

                    <label for="id_endereco" class="mb-0">Endereço:</label>
                    <select class="form-control" id="id_endereco" name="id_endereco" required>
                        <option value="{{$empresa->endereco->id}}" selected>{{$empresa->endereco->cidade->nome}}
                            , {{$empresa->endereco->cidade->estado}}, {{$empresa->endereco->bairro}}
                            , {{$empresa->endereco->rua}}</option>

                        @foreach($enderecos as $endereco)
                            <option value="{{$endereco->id}}">{{$endereco->cidade->nome}}, {{$endereco->cidade->estado}}
                                , {{$endereco->bairro}}, {{$endereco->rua}}</option>
                        @endforeach
                    </select>

                    <label for="id_inspetor">Inspetor:</label>
                    <select class="form-control" id="id_inspetor" name="id_inspetor" required>
                        <option value="{{$empresa->inspetor->id}}">{{$empresa->inspetor->nome}}
                            , {{$empresa->inspetor->crea}}</option>

                        @foreach($inspetors as $inspetor)
                            <option value="{{$inspetor->id}}">{{$inspetor->nome}}, {{$inspetor->crea}}</option>
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-outline-primary mt-3 mb-0 col-12">
                </div>
                <a href="{{route("email")}}">
                    <button class="btn btn-outline-light btn-block text-dark mt-1  mb-2 col-12"><i
                                class="fas fa-arrow-left"></i> Voltar
                    </button>
                </a>
            </form>
        </div>
    </div>
    <!--  Fim Bloco de informacoes da empresa -->
    <!--  Inicio Bloco de listagem de logins -->

    <div id="logins" class="bloco_inativo">
        <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 p-0 rounded-bottom">
            @if($usuario->tipo<=2)
                <div id="addLogin" class="col-12 mt-2 mb-2 p-0 popin">
                    <form method="get" action="{{"cadastroLogin"}}">
                        @csrf
                        <input type="hidden" name="idEmpresa" id="idEmpresa">
                        <input type="submit" class="btn btn-primary btn-block font-weight-light"
                               value="Adicionar login">
                    </form>
                </div>
            @endif

            @foreach($usuarios as $usuario)
                <div class="warpLogin popin" style="relative">
                    <div class="col-sm-12 col-md-8 mx-auto mt-3 p-0 bg-white rounded d-flex align-itens-center flex-column">
                        @if($usuario->tipo==2)
                        <div class="wrapForm">
                            <div class="formDelBtn">
                                <form method="post" action="{{route("deletarLogin",['id'=>$usuario->id,'id_empresa'=>$usuario->id_empresa])}}" onsubmit="return confirm('Tem certeza que deseja remover o login {{$usuario->email}} ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delBtn"><i class="fas fa-times"></i></button> 
                                </form>
                            </div>
                            <div class="formEditBtn">
                                <form method="post" action="{{route("editarLogin",['id'=>$usuario->id,'id_empresa'=>$usuario->id_empresa])}}">
                                    @csrf
                                    <button class="editBtn"><i class="fas fa-pen"></i></button>
                                </form>
                            </div>
                        </div>
                        @endif                        
                        <div class="login_info col-11 p-1 mt-4 mx-auto">
                            <p class="m-0">Email: {{$usuario->email}}</p>
                        </div>
                        <div class="login_info col-11 mt-2 mx-auto" style="padding: 0px; border:0px">
                            <input id="senha-{{$usuario->id}}" type="password" disabled value="{{$usuario->senha}}"
                                class="form-control text-center ">
                            <i id="mostrar-senha-{{$usuario->id}}" class="fa fa-eye" onclick="mostrarSenha({{$usuario->id}})" aria-hidden="true"
                            style="position: absolute; right:25px; top:12px; cursor: pointer"></i>
                            <!-- Onde tem "1" como valor nos ids e na funcao do onclick mudar para a { { empresa->id } } -->
                        </div>
                        <div class="login_info col-11 mt-2 mb-4 mx-auto">
                            <p class="m-0">
                                Nível de acesso: {{$usuario->tipo == 2 ? 'Master' : 'Consulta'}}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Fim das listagens -->
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#telefone').mask('(99) 9999-9999');
        });
        $(document).ready(function () {
            $('#celular').mask('(99) 99999-9999');
        });
        $(document).ready(function () {
            $('#cnpj').mask('99.999.999/9999-99');
        });

        function removeClasses() {
            document.getElementById("info_option").classList.remove("ativo");
            document.getElementById("login_option").classList.remove("ativo");

            document.getElementById("logins").classList.remove("bloco_ativo");
            document.getElementById("form_info").classList.remove("bloco_ativo");

            document.getElementById("logins").classList.add("bloco_inativo");
            document.getElementById("form_info").classList.add("bloco_inativo");
        }

        function mostrarInfo() {
            removeClasses();
            document.getElementById("form_info").classList.remove("bloco_inativo");
            document.getElementById("form_info").classList.add("bloco_ativo");
            document.getElementById("info_option").classList.add("ativo");
        }

        function mostrarLogins() {
            removeClasses();
            document.getElementById("logins").classList.remove("bloco_inativo");
            document.getElementById("logins").classList.add("bloco_ativo");
            document.getElementById("login_option").classList.add("ativo");
        }

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
@endsection()
