<style>
    .table-pos-aquecimento-gas{
        width:  100%;
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        font-weight: normal;
    }
    .table-pos-aquecimento-gas tr td,th{
        text-align: left;
        padding-left: 5px;
    }
</style>
<table class="table-pos-aquecimento-gas">
    <thead>
      <tr>
        <th colspan="4" class="divisao-tabelas titulo" >
          TRAT. APÓS SOLDAGEM {{($processo->posAquecimento->artigo) ? '('.strtoupper($processo->posAquecimento->artigo).')':''}}
        </th>
        <th colspan="4" class="titulo">
          GÁS {{($processo->gas->artigo) ? '('.strtoupper($processo->gas->artigo).')':''}}
        </th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td colspan="2">FAIXA DE TEMPERATURA:</td>
          <th colspan="2" class="divisao-tabelas">{{$processo->posAquecimento->faixa_temperatura}} ºC</th>
          <td></td>
          <th>GÁS(ES)</th>
          <th>COMPOSIÇÃO</th>
          <th>VAZÃO</th>
        </tr>
        <tr>
          <td colspan="2">TAXA DE AQUECIMENTO:</td>
          <th colspan="2" class="divisao-tabelas">{{$processo->posAquecimento->taxa_aquecimento}} ºC/h</th>
          <th>PROTEÇÃO</th>
          <th>{{$processo->gas->gas_protecao}}</th>
          <th>{{$processo->gas->composicao}}</th>
          <th>{{$processo->gas->vazao}} t/min</th>
        </tr>
        <tr>
            <td colspan="2">TEMPO DE PERMANÊNCIA:</td>
            <th colspan="2" class="divisao-tabelas">{{$processo->posAquecimento->tempo_permanencia}} min</th>
            <th>PURGA</th>
            <th>{{$processo->gas->purga}}</th>
            <th>{{$processo->gas->composicao_purga}}</th>
            <th>{{$processo->gas->vazao_purga}} t/min</th>
        </tr>
        <tr>
            <td colspan="2">TAXA DE RESFRIAMENTO:</td>
            <th colspan="2" class="divisao-tabelas">{{$processo->posAquecimento->taxa_resfriamento}} ºC/h</th>
            <th>ARRASTE</th>
            <th>N/A</th>
            <th>N/A</th>
            <th>N/A</th>
        </tr>
      </tbody>
    </table>
