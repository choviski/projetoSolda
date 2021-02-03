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
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">SOLDADORES:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 mt-3 p-0 rounded-bottom shadow-sm">
        @if($usuario->tipo==1)
            <div id="addSoldaodre" class="col-12 mt-2 p-0">
                <form method="post" action="{{route("cadastroSoldador")}}">
                    @csrf
                    <input type="hidden" name="empresa" id="idEmpresa" value="{{$empresa}}">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Adicionar soldador">
                </form>
            </div>
        @endif
        @foreach($soldadores as $soldador)
        <!-- Aqui começa a listagem das empresas-->
            <div id="soldadorCard" class="col-12 bg-white rounded shadow-sm d-flex justify-content-between mt-3">
                <div id="infoEmpresa" class="p-2 mt-1 d-flex justify-content-end flex-column ">
                    <img id="imgSoldador" class="rounded-circle border" src="{{asset("$soldador->foto")}}" onerror="this.onerror=null;this.src='{{asset("imagens/soldador_default.png")}}';" height="125 px" width="125px">
                    <p class="nomeSoldador mt-2 border col-12">{{$soldador->nome}}</p>
                </div>
                <div id="btnVerQualificacoes" class="d-flex align-items-center">
                    <form method="POST" action="{{route("perfilSoldador")}}" class="">
                        @csrf
                        <input type="hidden" id="id_soldador" name="id_soldador" value="{{$soldador->id}}">
                        <input type="submit" class="btn btn-primary pt-2 pb-2 pl-3 pr-3 shadow-sm" value="VISUALIZAR QUALIFICAÇÕES"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                    </form>
                </div>
            </div>
            <!-- Aqui acaba a listagem das empresas-->
        @endforeach
    </div>
@endsection