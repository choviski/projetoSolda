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
    </style>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 mt-3 p-0 rounded-bottom ">
        <div id="soldadorCard" class="col-12 bg-white rounded shadow-sm" >
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
        @if($usuario->tipo==1)
        <div id="addQualificacao" class="col-12 mt-2 p-0">
            <form method="post" action="{{route("novaQualificacao")}}">
                @csrf
                <input type="hidden" name="soldador" id="soldador" value="{{$soldador->id}}">
                <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Adicionar qualificação">
            </form>
        </div>
        @endif
        @foreach($qualificacoes as $qualificacao)
        <!-- Lista de qualificações do Soldador -->
        <div id="qualificacoes" class="col-12 bg-white rounded shadow-sm mt-2 d-flex justify-content-between">
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
                <form method="#" action="#" class="d-flex justify-content-end">
                    @csrf
                    <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao">
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
                    <form method="#" action="#" class="form-group d-flex justify-content-end">
                        @csrf
                        <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao" value="{{$qualificacao->soldador->id}}">
                        <input type="submit" class="btn btn-secondary" value="Requalificar"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                    </form>
                @elseif($qualificacao->status=="nao-qualificado")
                    <span class="d-flex justify-content-end mb-0 pb-0">
                        <p class="text-right bg-danger rounded p-1 text-white mb-1">Não Qualificado</p>
                    </span>
                    <form method="#" action="#" class="form-group d-flex justify-content-end">
                        @csrf
                        <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao" value="{{$qualificacao->soldador->id}}">
                        <input type="submit" class="btn btn-secondary" value="Requalificar"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                    </form>
                @elseif($qualificacao->status=="atrasado")
                    <span class="d-flex justify-content-end mb-0 pb-0">
                        <p class="text-right bg-warning rounded p-1 text-white mb-1">Atrasado</p>
                    </span>
                    <form method="#" action="#" class="form-group d-flex justify-content-end">
                        @csrf
                        <input type="hidden" id="soldadorQualificacao" name="soldadorQualificacao" value="{{$qualificacao->soldador->id}}">
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