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

        .formDelBtn {
            position: relative;
            transition: 0.3s ease;
        }
        
        .wrapForm{
            position: absolute;
            right: -150px;
            top: -20px;
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

        .formularioFiltro{
            position: relative;
        }
        .botaoProcurar{
            position: absolute;
            right: 0px;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
            border:none;
            color: white;
            background-color: #007bff;
            height: 30px;
            width: 32px;
            padding: 2px;
            font-weight: lighter;
        }
        .select{
            height: 38px;
        }
        .filteredBy{
            background: #5398ff;
            color:white;
            border-radius: 5px;
            padding: 2px 12px;
        }
        .removeFilter{
            background: #ff6464;
            color:white;
            border-radius: 5px;
            padding: 2px 6px 2px 12px;
            cursor: pointer;
        }
        .removeFilterBtn{
            background: white;
            color:#ff6464;
            border-radius: 100%;
            width: 15px;
            height: 15px;
            position: relative;
        }
    </style>


    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">LOGINS:</p>
        <div class="d-flex justify-content-center pr-2" style="position: absolute;top:5px; right:0px;">
            <p class="btn btn-outline-primary mb-0 mr-sm-0 mr-md-1"  data-toggle="collapse" href="#filtroForm" role="button" aria-expanded="false" aria-controls="collapseExample" style="width:50px"><i class="fas fa-search"></i></p>
        </div>        
        <div class="collapse col-12 p-0" id="filtroForm">
            <form class="bg-white col-12 formularioFiltro p-0 mb-2" method="get" action="#">
                @csrf  
                @if ($usuario->tipo==1)
                <select class="form-control col-12" id="filtro" name="filtro" required>
                    <option id="op1" value=""  selected>Selecione a empresa</option>
                    @foreach($empresas as $empresas)
                        <option value="{{$empresas->id}}">{{$empresas->nome_fantasia}}</option>
                    @endforeach
                </select>              
                <button class="botaoProcurar select" style="top:0px; "><i class="fas fa-arrow-right"></i></button>    
                @else
                <input class="col-12" name="filtro" id="filtro" placeholder="Insira o nome do eps..." autocomplete="off">
                <button class="botaoProcurar"><i class="fas fa-arrow-right"></i></button>  
                @endif
                  
            </form>
        </div>
    </div>

    <div id="logins">
        <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 p-0 rounded-bottom">
            @if($termo)
            <div class="d-flex mt-2">
                <div class="filteredBy shadow mr-2 ">
                    <a>Filtrado por: "<b>{{$termo}}</b>"</a>
                </div>
                <form method="get" action="#">
                    @csrf            
                    <input type="hidden" name="filtro" id="filtro" value="">
                    <button style="background-color: transparent; padding: 0px; border:none; box-size:border-box">
                        <div class="removeFilter shadow d-flex align-items-center">                    
                            <a>Remover filtro                        
                            </a>
                            <div class="removeFilterBtn ml-1">
                                <span style="position: absolute; top:-6px; right:4px ">x</span>
                            </div>
                        </div>
                    </button>    
                </form>                
            </div>
        @endif

            <div id="addLogin" class="col-12 mt-2 mb-2 p-0 popin">
                <form method="get" action="{{"cadastroLogin"}}">
                    @csrf
                    <input type="hidden" name="idEmpresa" id="idEmpresa">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Adicionar login">
                </form>
            </div>

            @foreach($logins as $login)
                <div class="warpLogin popin" style="relative">
                    <div class="col-sm-12 col-md-8 mx-auto mt-4 p-0 bg-white rounded d-flex align-itens-center flex-column">
                        <div class="wrapForm">
                            @if($usuario->tipo==1)
                            <div class="formDelBtn">
                                <form method="post" action="{{route("deletarLogin",['id'=>$login->id])}}" onsubmit="return confirm('Tem certeza que deseja remover o login {{$login->email}} ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delBtn"><i class="fas fa-times"></i></button> 
                                </form>
                            </div>
                            <div class="formEditBtn">
                                <form method="post" action="{{route("editarLogin",['id'=>$login->id])}}">
                                    @csrf
                                    <button class="editBtn"><i class="fas fa-pen"></i></button>
                                </form>
                            </div>
                            @endif
                        </div>
                        <p class="nomeEmpresa" style="z-index: 1">{{$login->empresa ? $login->empresa->razao_social : 'Info Solda'}}</p>
                        <div class="login_info col-11 p-1 mt-4 mx-auto">
                            <p class="m-0">Email: {{$login->email}}</p>
                        </div>
                        <div class="login_info col-11 mt-2 mx-auto" style="padding: 0px; border:0px">
                            <input id="senha-{{$login->id}}" type="password" disabled value="{{$login->senha}}"
                                   class="form-control text-center ">
                            <i id="mostrar-senha-{{$login->id}}" class="fa fa-eye" onclick="mostrarSenha({{$login->id}})" aria-hidden="true"
                               style="position: absolute; right:25px; top:12px; cursor: pointer"></i>
                        </div>
                        <div class="login_info col-11 mt-2 mb-4 mx-auto">
                            Nível de acesso: @if($login->tipo==1) Administrador Sistema 
                                            @elseif ($login->tipo==2) Master
                                            @elseif ($login->tipo == 3)Consulta
                                            @endif
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