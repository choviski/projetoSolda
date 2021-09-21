@foreach($requalificacaos as $requalificacao)
    <div class="popin">
        <p class="nomeEmpresa" style="z-index: 1">{{$requalificacao->soldador->empresa->razao_social}}</p>
        <div class="row d-flex justify-content-between p-2 bg-white rounded shadow-sm form-inline " style="margin-top: 30px ">
        
            <div class="">
                <div>
                    <img src="@if($requalificacao->soldador->foto){{asset($requalificacao->soldador->foto)}}@else{{asset("imagens/soldador_default.png")}}@endif" onerror="this.onerror=null;this.src='{{asset("imagens/soldador_default.png")}}';" width="100px" height="100px" class="rounded-circle border">
                </div>
                <p class="styleNomeQualificacao mb-md-0 mb-sm-1 mt-2"> {{$requalificacao->soldador->nome}} | Cod. RQS:{{$requalificacao->cod_rqs}}</p>
            </div>

            <div>
                <form method="post" action="{{route("avaliarRequalificacao")}}" class="form-group">
                    @csrf
                    <input type="hidden" value="{{$requalificacao->id}}" name="id">
                    <input type="submit" class="col-12 mt-md-1 btn btn-primary pt-2 pb-2 pl-3 ml-sm-0 pr-3 shadow-sm" value="Avaliar Requalificação">
                </form>
            </div>

        </div>
    </div>
@endforeach