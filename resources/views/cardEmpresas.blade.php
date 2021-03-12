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