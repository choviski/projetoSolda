<div class="row col-12 d-flex justify-content-center m-0 p-0 " id="tabelaAppend">
    <style>
        .color-code{
            height:10px;
            width:10px;
            border-radius:100%;
            margin: auto 5px;
        }
        .green{
            background-color:green;
        }
        .blue{
            background-color:blue;
        }
        .red{
            background-color:red;
        }
        .yellow{
            background-color:yellow;
        }
    </style>
    <div class="col-12">
        <div class="table table-sm table-responsive" id="tabelaRequalificacoes">
            <table class="table table-bordered rounded bg-white mt-2 col-12 ">

                <thead class="rounded">
                <tr>
                    <th colspan="12" id="tableTitle" class="text-center" >Qualificações</th>
                </tr>
                <tr>
                    <th scope="col" colspan="3">Soldador</th>
                    <th scope="col" colspan="3">Empresa</th>  
                    <th scope="col" colspan="3">Código RQS</th>  
                    <th scope="col" colspan="3">Status</th>  
                </tr>
                </thead>
                <tbody>
                @foreach($qualificacaoes as $qualificacao)
                    <tr>
                        <td colspan="3">{{$qualificacao->soldador->nome}}</td>
                        <td colspan="3">{{$qualificacao->soldador->empresa->nome_fantasia}}</td>      
                        <td colspan="3">{{$qualificacao->cod_rqs}}</td>  
                        <td colspan="3">
                            <span style="display:flex;justify-content:space-between">
                            @if($qualificacao->status=="qualificado")
                                <div >Qualificado</div>
                                <div class="color-code green"></div>                          
                            @endif
                            @if($qualificacao->status=="nao-qualificado")
                                <div >Não Qualificado</div>
                                <div class="color-code red"></div>                          
                            @endif
                            @if($qualificacao->status=="atrasado")
                                <div >Vencida</div>
                                <div class="color-code yellow"></div>                        
                            @endif
                            @if($qualificacao->status=="em-processo")
                                <div >Em avaliação</div>
                                <div class="color-code blue"></div>                         
                            @endif
                            </span>
                        </td>                    
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
