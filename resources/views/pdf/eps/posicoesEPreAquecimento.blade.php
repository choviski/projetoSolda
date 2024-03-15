<style>
    .table-posicoes-pre-aquecimento{
        width:  100%;
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        font-weight: normal;
    }
    .table-posicoes-pre-aquecimento tr td,th{
        text-align: left;
        padding-left: 5px;
    }
    .divisao-tabelas{
      border-right: 1px solid black;
    }
</style>

<table class="table-posicoes-pre-aquecimento">
  <thead>
    <tr>
      <th colspan="2" class="divisao-tabelas titulo">
        POSIÇÕES {{($processo->posicaoSoldagem->artigo) ? '('.$processo->posicaoSoldagem->artigo.')':''}}
      </th>
      <th colspan="2" class="titulo">
        PRÉ-AQUECIMENTO {{($processo->preAquecimento->artigo) ? '('.$processo->preAquecimento->artigo.')':''}}
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>POSIÇÃO: </td>
      <th class="divisao-tabelas">{{$processo->posicaoSoldagem->posicao_soldagem}}</th>
      <td>TEMP. PRÉ-AQUEC. MÍNIMO:</td>
      <th>{{$processo->preAquecimento->temperatura}} ºC</th>
    </tr>
    <tr>
      <td>PROGRESSÃO SOLDAGEM: </td>
      <th class="divisao-tabelas">{{$processo->posicaoSoldagem->direcao_soldagem}}</th>
      <td>TEMP. DE INTERPASSE MÁXIMO:</td>
      <th>{{$processo->preAquecimento->temperatura_interpasse}}°C</th>
    </tr>
  </tbody>
  </table>
