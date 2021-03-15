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
        <div id="soldadorCard" class="col-12 bg-white rounded shadow-sm d-flex justify-content-between mt-4 font-size">
            <div id="infoEmpresa" class="p-2 mt-1 d-flex justify-content-end flex-column ">
                <img id="imgSoldador" class="rounded-circle border" src="{{asset("$soldador->foto")}}" onerror="this.onerror=null;this.src='{{asset("imagens/soldador_default.png")}}';" height="125 px" width="125px">
                <p class="nomeSoldador mt-2 border col-12">{{$soldador->nome}}</p>
            </div>
            <div id="btnVerQualificacoes" class="d-flex align-items-center">
                <form method="POST" action="{{route("perfilSoldador")}}" class="">
                    @csrf
                    <input type="hidden" id="id_soldador" name="id_soldador" value="{{$soldador->id}}">
                    @if(isset($rota))
                        <input type="hidden" id="rota" name="rota" value="{{$rota}}">
                        @if($rota=="soldadoresFiltrados")
                            <input type="hidden" id="nomeSoldador" name="nomeSoldador" value="{{$nomeSoldador}}">
                        @endif
                    @endif
                    <input type="submit" class="btn btn-primary pt-2 pb-2 pl-3 pr-3 shadow-sm" value="VISUALIZAR QUALIFICAÇÕES"> <!-- Mini IF para verificar o Status e setar como DISABLED el botao -->
                </form>
            </div>
        </div>
    </div>
    <!-- Aqui acaba a listagem das empresas-->
@endforeach