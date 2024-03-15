<style>
    .table-tecnica{
        width:  100%;
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        font-weight: normal;
    }
    .table-tecnica tr td,th{
        text-align: left;
        padding: 2px 5px;
    }
</style>
<table class="table-tecnica">
    <thead>
      <tr>
        <th colspan="2">
          TÉCNICA {{($eps->informacaoTecnica->artigo) ? '('.$eps->informacaoTecnica->artigo.')':''}}    
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>MÉTODO DE GOIVAGEM:
            <b>{{$eps->informacaoTecnica->goivagem}}</b>
        </td>
        <td>MARTELAMENTO:
            <b>{{$eps->informacaoTecnica->martelamento}}</b>
        </td>
      </tr>
      <tr>
        <td>CORDÕES RETILÍNEOS OU TRANÇADOS:
            <b>{{$eps->informacaoTecnica->cordoes}}</b>
        </td>
        <td>OSCILAÇÃO:
            <b>{{$eps->informacaoTecnica->oscilacao}}</b>
        </td>
      </tr>
      <tr>
        <td>ELETRODO SIMLPES OU MÚLTIPLOS:
            <b>{{$eps->informacaoTecnica->eletrodo}}</b>
        </td>
        <td>ESPAÇAMENTO ENTRE ELETRODOS:
            <b>{{$eps->informacaoTecnica->espacamento_eletrodo}}{{$eps->informacaoTecnica->unidade_medida_espacamento}}</b>
        </td>
      </tr>
      <tr>
        <td>PROCESSO TÉRMICO DE PREPARAÇÃO:
            <b>{{$eps->informacaoTecnica->processo_termico}}</b>
        </td>
        <td>DIÂMETRO BOCAL DE GAS:
            <b>>{{$eps->informacaoTecnica->diametro_bocal}}{{$eps->informacaoTecnica->unidade_medida_bocal}}</b>
        </td>
      </tr>
      <tr>
        <td colspan="2">PASSES SIMPLES OU MÚLTIPLOS:
            <b>{{$eps->informacaoTecnica->tipo_passe}}</b>
        </td>
      </tr>
      <tr>
        <td colspan="2">INSPEÇÃO FINAL:
            <b>{{$eps->informacaoTecnica->inspecao_final}}</b>
        </td>
      </tr>
      <tr>
        <td colspan="2">LIMPEZA INICIAL E INTERPASSES:
            <b>{{$eps->informacaoTecnica->limpeza}}</b>
        </td>
      </tr>
    </tbody>
</table>
