<style>
    
    .table-aquecimento tr td,th{
        text-align: left;
        padding-left: 5px;
    }
    .table-aquecimento{
        width:  100%;
        font-size: 12px;
        border-collapse: collapse;
        border: 1px solid black !important; 
        font-weight: normal;
    }
    .divisao-tabelas{
      border-right: 1px solid black;
    }
</style>

<table class="table-aquecimento">
  <thead>
    <tr>   
      <th colspan="4" class="titulo divisao-tabelas">
        PRÉ-AQUECIMENTO {{($eps->processos->first()->preAquecimento->artigo) ? '('.$eps->processos->first()->preAquecimento->artigo.')':''}}
      </th>
      <th colspan="4" class="titulo" >
        TRAT. APÓS SOLDAGEM {{($eps->processos->first()->posAquecimento->artigo) ? '('.strtoupper($eps->processos->first()->posAquecimento->artigo).')':''}}
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="2">TEMP. PRÉ-AQUEC. MÍNIMO:</td>
      <th colspan="2" class="divisao-tabelas">{{$eps->processos->first()->preAquecimento->temperatura}} ºC</th>
    
      <td colspan="1">FAIXA DE TEMPERATURA:</td>
      <th colspan="1">{{$eps->processos->first()->posAquecimento->faixa_temperatura}} ºC</th>
      <td colspan="1">TAXA DE AQUECIMENTO:</td>
      <th colspan="1" class="divisao-tabelas">{{$eps->processos->first()->posAquecimento->taxa_aquecimento}} ºC/h</th>
    </tr>
    <tr>
      <td colspan="2">PROGRESSÃO SOLDAGEM: </td>
      <th colspan="2" class="divisao-tabelas">{{$eps->processos->first()->preAquecimento->temperatura_interpasse}} ºC</th>
    
      <td colspan="1">TEMPO DE PERMANÊNCIA:</td>
      <th colspan="1">{{$eps->processos->first()->posAquecimento->tempo_permanencia}} ºC</th>
      <td colspan="1">TAXA DE RESFRIAMENTO:</td>
      <th colspan="1" class="divisao-tabelas">{{$eps->processos->first()->posAquecimento->taxa_resfriamento}} ºC/h</th>
    </tr>
  </tbody>
  </table>
