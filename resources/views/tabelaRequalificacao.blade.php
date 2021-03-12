<div class="row col-12 d-flex justify-content-center m-0 p-0 " id="tabelaAppend">

    <div class="col-12">
        <div class="table-responsive" id="tabelaRelatorio">
            <table class="table table-bordered rounded bg-white mt-2 col-12 ">

                <thead class="rounded">
                <tr>
                    <th colspan="12">Requalificações 02/2021</th>
                </tr>
                <tr>
                    <th scope="col">Empresa</th>
                    <th scope="col">Soldador</th>
                    <th scope="col">Código Rqs
                    <th scope="col">Status</th>
                    <th scope="col">Código da qualificação</th>
                    <th scope="col">Data da qualificação</th>
                    <th scope="col">Validade</th>
                    <th scope="col">Lançamento</th>
                    <th scope="col">Posição Soldagem</th>
                    <th scope="col">Eletrodo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requalificacaos as $requalificacao)
                    <tr>
                        <td>{{$requalificacao->soldador->empresa->razao_social}}</td>
                        <td>{{$requalificacao->soldador->nome}}</td>
                        <td>{{$requalificacao->cod_rqs}}</td>
                        <td>{{$requalificacao->status}}</td>
                        <td>{{$requalificacao->qualificacao->cod_eps}}</td>
                        <td>{{$requalificacao->data_qualificacao}}</td>
                        <td>{{$requalificacao->validade_qualificacao}}</td>
                        <td>{{$requalificacao->lancamento_qualificacao}}</td>
                        <td>{{$requalificacao->posicao}}</td>
                        <td>{{$requalificacao->eletrodo}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>