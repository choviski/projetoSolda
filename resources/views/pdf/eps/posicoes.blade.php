<style>
    .table-posicoes{
        width:  100%;
        font-size: 12px;
        border: 1px solid black !important;
        border-collapse: collapse;
        font-weight: normal;
    }
    .table-posicoes tr td,th{
        text-align: left;
        padding-left: 5px;
    }
    .divisao-tabelas{
      border-right: 1px solid black;
    }
</style>

<table class="table-posicoes">
  <thead>
    <tr>
      <th colspan="{{$eps->processos->count()+1}}" class="divisao-tabelas titulo">
        POSIÇÕES {{($eps->processos->first()->posicaoSoldagem->artigo) ? '('.$eps->processos->first()->posicaoSoldagem->artigo.')':''}}
      </th>
    </tr>
  </thead>
    <tbody>
      <tr>
        <td></td>
        @foreach ($eps->processos as $processo )
            <td>{{$processo->qual_processo}}</td>
        @endforeach
      </tr>
      <tr>
        <th colspan="1">POSIÇÃO: </th>
        @foreach ($eps->processos as $processo )
          <td>{{ucfirst($processo->posicaoSoldagem->posicao_soldagem)}}</td>
        @endforeach
      </tr>
      <tr>
        <th colspan="1">PROGRESSÃO SOLDAGEM: </th>
        @foreach ($eps->processos as $processo )
          <td>{{ucfirst($processo->posicaoSoldagem->direcao_soldagem)}}</td>
        @endforeach
      </tr>
    </tbody>
  </table>
