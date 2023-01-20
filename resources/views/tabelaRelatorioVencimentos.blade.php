<div class="row col-12 d-flex justify-content-center m-0 p-0 " id="tabelaVencimentoAppend">
    <style>
        .color-code{
            height:10px;
            width:10px;
            border-radius:100%;
            margin: auto 5px;
        }
    </style>
    <div class="col-12">
        <div class="table table-sm table-responsive" id="tabelaVencimentos">
            <table class="table table-bordered rounded bg-white mt-2 col-12 ">

                <thead class="rounded">
                <tr>
                    <th colspan="12" id="tableVencimentoTitle" class="text-center" >Qualificações</th>
                </tr>
                <tr>
                    <th scope="col" colspan="3">Soldador</th>
                    <th scope="col" colspan="3">Empresa</th>  
                    <th scope="col" colspan="3">Código RQS</th>  
                    <th scope="col" colspan="3">Vencimento</th>  
                </tr>
                </thead>
                <tbody>
                @foreach($qualificacaoes as $qualificacao)
                    <tr>
                        <td colspan="3">{{$qualificacao->soldador->nome}}</td>
                        <td colspan="3">{{$qualificacao->soldador->empresa->nome_fantasia}}</td>      
                        <td colspan="3">{{$qualificacao->cod_rqs}}</td>  
                        <td colspan="3">{{$qualificacao->validade_qualificacao}}</td>                              
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
