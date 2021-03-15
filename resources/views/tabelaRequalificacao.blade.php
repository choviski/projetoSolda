<div class="row col-12 d-flex justify-content-center m-0 p-0 " id="tabelaAppend">

    <div class="col-12">
        <div class="table table-sm table-responsive" id="tabelaRelatorio">
            <table class="table table-bordered rounded bg-white mt-2 col-12 ">

                <thead class="rounded">
                <tr>
                    <th colspan="12" id="tableTitle">Requalificações 02/2021</th>
                </tr>
                <tr>
                    <th scope="col" colspan="1">Empresa</th>
                    <th scope="col" colspan="1">Soldador</th>
                    <th scope="col" colspan="1">Código Rqs
                    <th scope="col" colspan="1">Status</th>
                    <th scope="col" colspan="1">Código da qualificação</th>
                    <th scope="col" colspan="1">Data da qualificação</th>
                    <th scope="col" colspan="1">Validade</th>
                    <th scope="col" colspan="1">Lançamento</th>
                    <th scope="col" colspan="1">Posição Soldagem</th>
                    <th scope="col" colspan="1">Eletrodo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requalificacaos as $requalificacao)
                    <tr>
                        <td colspan="1">{{$requalificacao->soldador->empresa->razao_social}}</td>
                        <td colspan="1">{{$requalificacao->soldador->nome}}</td>
                        <td colspan="1">{{$requalificacao->cod_rqs}}</td>
                        <td colspan="1">{{$requalificacao->status}}</td>
                        <td colspan="1">{{$requalificacao->qualificacao->cod_eps}}</td>
                        <td colspan="1">{{$requalificacao->data_qualificacao}}</td>
                        <td colspan="1">{{$requalificacao->validade_qualificacao}}</td>
                        <td colspan="1">{{$requalificacao->lancamento_qualificacao}}</td>
                        <td colspan="1">{{$requalificacao->posicao}}</td>
                        <td colspan="1">{{$requalificacao->eletrodo}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
