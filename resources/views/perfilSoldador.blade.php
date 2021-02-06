@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .codigoQualificacao{
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
            transform: translateY(-20%);
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
            color: #0c7eab;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(-20%);
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
        }


    </style>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 mt-3 p-0 rounded-bottom ">
        <div class="wrapSoldadorCard popin">
            <div class="formDelBtn">
                <form action="#" method="">
                    <button type="button" class="delBtn"><i class="fas fa-times"></i></button>
                </form>
            </div>
            <div class="formEditBtn">
                <form action="#" method="">
                    <button type="button" class="editBtn"><i class="fas fa-pen"></i></button>
                </form>
            </div>

            <div id="soldadorCard" class="col-12 bg-white rounded shadow-sm mt-2" >
                <div id="soldadorInfo" class="col-12 pt-3 d-flex ">
                    <div id="imagemSoldador">
                        <img src="{{asset($soldador->foto)}}" onerror="this.onerror=null;this.src='{{asset("imagens/soldador_default.png")}}';" class="rounded-circle border" width="150px" height="150px">
                    </div>
                    <div id="informacaoSoldador" class="d-flex flex-column p-3">
                        <p class="p-0 font-weight-light" style="font-size: 22px">{{$soldador->nome}}</p>
                        <p class="p-0 font-weight-light" style="font-size: 22px">{{$soldador->cpf}}</p>
                        <p class="p-0 font-weight-light" style="font-size: 22px">{{$soldador->matricula}}</p>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <hr class="p-0 m-0 mb-1">
                    <p class="lead p-1 m-0" style="font-size: 22px">QUALIFICAÇÕES:</p>
                </div>
            </div>
        </div>
        @if($usuario->tipo==1)
        <div id="addQualificacao" class="col-12 mt-2 p-0 popin">
            <form method="post" action="{{route("novaQualificacao")}}">
                @csrf
                <input type="hidden" name="soldador" id="soldador" value="{{$soldador->id}}">
                <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Adicionar qualificação">
            </form>
        </div>
        @endif
        @foreach($qualificacoes as $qualificacao)
        <!-- Lista de qualificações do Soldador -->
        <div id="qualificacoes" class="col-12 bg-white rounded shadow-sm mt-2 d-flex justify-content-between popin">
            <div id="infoDireita" class="d-flex flex-column p-2 pt-3">
                <p class="border mb-0 mt-2 codigoQualificacao">{{$qualificacao->cod_rqs}}</p>
                <p class="font-weight-light pt-1 mt-0 mb-0">Data Validade: {{$qualificacao->validade_qualificacao}}</p>
            </div>

            <div id="infoEsquerda" class="d-flex flex-column p-2 pt-1 pb-1 text-left">
                <!-- Aqui vai o IF para setar o status da Badge -->
                @if($qualificacao->status=="em-processo")
                <span class="d-flex justify-content-end mb-0 pb-0">
                    <p class="text-right bg-primary rounded p-1 text-white mb-1">Em Avaliação</p>
                </span>
                @if($usuario->tipo==2)
                <form method="post" action="{{route("requalificar")}}" class="d-flex justify-content-end">
                    @csrf
                    <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao" value="{{$qualificacao->id}}">
                    <input type="submit" class="btn btn-secondary" value="Requalificar" disabled> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                </form>
                    @elseif($usuario->tipo==1)
                        <form method="post" action="{{route("avaliarRequalificacao")}}" class="d-flex justify-content-end">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{$qualificacao->id}}">
                            <input type="submit" class="btn btn-secondary" value="Avaliar"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                        </form>
                    @endif
                @elseif($qualificacao->status=="qualificado")
                    <span class="d-flex justify-content-end mb-0 pb-0">
                        <p class="text-right bg-success rounded p-1 text-white mb-1">Qualificado</p>
                    </span>
                    <form method="post" action="{{route("requalificar")}}" class="form-group d-flex justify-content-end">
                        @csrf
                        <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao" value="{{$qualificacao->id}}">
                        <input type="submit" class="btn btn-secondary" value="Requalificar"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                    </form>
                @elseif($qualificacao->status=="nao-qualificado")
                    <span class="d-flex justify-content-end mb-0 pb-0">
                        <p class="text-right bg-danger rounded p-1 text-white mb-1">Não Qualificado</p>
                    </span>
                    <form method="post" action="{{route("requalificar")}}" class="form-group d-flex justify-content-end">
                        @csrf
                        <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao" value="{{$qualificacao->id}}">
                        <input type="submit" class="btn btn-secondary" value="Requalificar"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                    </form>
                @elseif($qualificacao->status=="atrasado")
                    <span class="d-flex justify-content-end mb-0 pb-0">
                        <p class="text-right bg-warning rounded p-1 text-white mb-1">Atrasado</p>
                    </span>
                    <form method="post" action="{{route("requalificar")}}" class="form-group d-flex justify-content-end">
                        @csrf
                        <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao" value="{{$qualificacao->id}}">
                        <input type="submit" class="btn btn-secondary" value="Requalificar"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                    </form>
                @endif
                    <!-- Aqui terminha o IF para setar o status da Badge -->
                <p class="text-right m-0 mb-0">Tentativas de Requalificação: 0</p>
            </div>
        </div>
        @endforeach
        <!-- Fim da lista de qualificações -->
        <a href="{{route("hubSoldadores")}}"><button class="btn btn-outline-light mt-2 mb-2 text-dark col-12"><i class="fas fa-arrow-left"></i> Voltar</button></a>

    </div>

@endsection