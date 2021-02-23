@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .nomeEmpresa{
            text-align: center;
            padding: 0.5rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 18px;
            background-color: #eeeeee;
        }
        #nav_empresas{
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


    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">EMPRESAS:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 p-0 rounded-bottom ">
        @if($usuario->tipo==1)
            <div id="addEmpresa" class="col-12 mt-2 p-0 popin">
                <form method="get" action="{{route("inserirEmpresa")}}">
                    @csrf
                    <input type="hidden" name="idSoldador" id="idSoldador">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Adicionar empresa">
                </form>
            </div>
    @endif
    @foreach($empresas as $empresa)
        <!-- Aqui começa a listagem das empresas-->
            <div class="warpSoldadorCard popin">
                @if($usuario->tipo==1)
                    <div class="formDelBtn">
                        <form method="post" action="{{Route("empresa.remover",['id'=>$empresa->id])}}" onsubmit="return confirm('Tem certeza que deseja remover a empresa {{$empresa->razao_social}} ?')">
                            @csrf
                            @method('DELETE')
                            <button class="delBtn"><i class="fas fa-times"></i></button>                        </form>
                    </div>
                    <div class="formEditBtn">
                        <form method="get" action="{{Route("empresa.edit",['empresa'=>$empresa->id])}}">
                            @csrf
                            <button class="editBtn"><i class="fas fa-pen"></i></button>
                        </form>
                    </div>
                @endif
            <div id="empresaCard" class="col-12 bg-white rounded shadow-sm d-flex justify-content-between mt-3 popin">
                <div id="infoEmpresa" class="p-2 mt-1 d-flex  justify-content-end flex-column">
                    <img id="imgEmpresa" class="rounded-circle border" src="{{asset("$empresa->foto")}}" onerror="this.onerror=null;this.src='{{asset("imagens/empresa_default.png")}}';"height="125 px" width="125px">
                    <p class="nomeEmpresa mt-2 border col-12">{{$empresa->razao_social}}</p>
                </div>
                <div id="btnVerSoldadores" class="d-flex align-items-center">
                    <form method="post" action="{{Route("listarSoldador",['id'=>$empresa->id])}}" class="">
                        @csrf
                        <input type="hidden" id="id_empresa" name="id_empresa" value="{{$empresa->id}}">
                        <input type="submit" class="btn btn-primary pt-2 pb-2 pl-3 pr-3 shadow-sm" value="VISUALIZAR SOLDADORES"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                    </form>
                </div>
            </div>
            </div>
    @endforeach
    <!-- Aqui acaba a listagem das empresas-->
    </div>
@endsection