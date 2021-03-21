@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .nomeSoldador{
            text-align: center;
            padding: 0.5rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 18px;
            background-color: #eeeeee;
        }
        #nav_soldadores{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
        .formDelBtn{
            position: relative;
            transition: 0.3s ease;
        }
        .delBtn{
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top:0px;
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
        .delBtn:hover{
            background-color: #d92b2b;
            color: white;
        }
        .delBtn:hover{
            background-color: #d92b2b;
        }
        .formEditBtn{
            position: relative;
        }
        .editBtn{
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top:0px;
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
        .editBtn:hover{
            background-color: #0c7eab;
            color: white;
            align-items: center;
            text-align: center;
        }
        @media only screen and (max-width: 650px) {
            .empCard {
                flex-direction: column;
            }
            .visSold{
                margin-bottom: 8px;
                margin-left: 7px;
            }

        }



    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">SOLDADORES:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 mb-2 p-0 rounded-bottom ">
        @if($usuario->tipo==1)
            <div id="addSoldador" class="col-12 mt-2 p-0 popin">
                <form method="post" action="{{route("cadastroSoldador")}}">
                    @csrf
                    <input type="hidden" name="empresa" id="idEmpresa" value="{{$empresa}}">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Adicionar soldador">
                </form>
            </div>
        @endif
        @foreach($soldadores as $soldador)
        <!-- Aqui começa a listagem dos soldadores-->
            <div class="warpSoldadorCard popin">
                @if($usuario->tipo==1)
                    <div class="formDelBtn">
                        <form method="post" action="{{route("soldador.remover",['id'=>$soldador->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir {{$soldador->nome}} ?')">
                            @csrf
                            @method('DELETE')
                            <button class="delBtn"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                    <div class="formEditBtn">
                        <form method="get" action="{{route("soldador.edit",['soldador'=>$soldador->id])}}">
                            @csrf
                            <button class="editBtn"><i class="fas fa-pen"></i></button>
                        </form>
                    </div>
                @endif
                <div class="warpSoldadorCard bg-white shadow-sm rounded popin" >
                    <div id="soldadorCard" class="col-12 bg-white rounded  d-flex justify-content-between mt-4  empCard">
                        <div id="infoEmpresa" class="p-2 mt-1 d-flex justify-content-end flex-column ">
                            <img id="imgSoldador" class="rounded-circle border" src="{{asset("$soldador->foto")}}" onerror="this.onerror=null;this.src='{{asset("imagens/soldador_default.png")}}';" height="125 px" width="125px">
                            <p class="nomeSoldador mt-2 border col-12" style="cursor: pointer" id="showInfo" onclick="popUp({{$soldador->id}})">{{$soldador->nome}}</p>
                        </div>
                        <div id="btnVerQualificacoes" class="d-flex align-items-center">
                            <form method="POST" action="{{route("perfilSoldador")}}" class="">
                                @csrf
                                @if(isset($rota) and isset($empresa))
                                    <input type="hidden" id="rota" name="rota" value="{{$rota}}">
                                    <input type="hidden" id="empresa" name="empresa" value="{{$empresa}}">
                                @endif
                                <input type="hidden" id="id_soldador" name="id_soldador" value="{{$soldador->id}}">
                                <input type="submit" class="btn btn-primary pt-2 pb-2 pl-3 pr-3 shadow-sm visSold" value="VISUALIZAR QUALIFICAÇÕES"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                            </form>
                        </div>
                    </div>
                    <div class="col-12 soldadorCardInfo"  style="display:none;animation: fadeIn ease 0.5s"  id="info{{$soldador->id}}">
                        <hr class="mb-1 mt-1">
                        <form class="form-group ">
                            <input type="text" class="rounded col-12 mb-1" disabled value="Sinete: {{$soldador->sinete}}">
                            <input type="text" class="rounded col-12 mb-1" disabled value="Matricula: {{$soldador->matricula}}">
                            <input type="text" class="rounded col-12 mb-3" disabled value="CPF: {{$soldador->cpf}}">
                        </form>
                    </div>
                </div>
            </div>
            <!-- Aqui acaba a listagem das empresas-->
        @endforeach
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"
    >
    </script>
    <script>
        function popUp(id){
            console.log(id);
            if($('#info'+id).css("display")=='block'){
                $('#info'+id).css("display","none")
            }else{
                $('#info'+id).css("display","block")
            }
        }
    </script>
@endsection