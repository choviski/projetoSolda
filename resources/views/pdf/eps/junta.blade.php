<style>
    .table-junta{
        width: 100%;
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        font-weight: normal;
    }
    .check-box{
        border: 1px solid black;
        padding: 5px 10px;
    }
    .table-junta tr td,th{
        text-align: left;
        padding-left: 5px;
    }
</style>

<table class="table-junta">
    <thead>
      <tr>
        <th colspan="2" style="text-align: left;">
          <b>JUNTAS {{($processo->junta->artigo) ? '('.$processo->junta->artigo.')':''}}</b>
        </th>
        <td>TIPO DE JUNTA:</td>
        <td style="text-align: left;font-size:10px"><b>CONFORME DESENHOS DE FABRICAÇÃO</b></td> <!-- (?) -->
      </tr>
    </thead>
    <tbody>
      <tr>
        <td  rowspan="4">  <!--Imagem junta -->
            <img src="{{$imagem_junta}}" style="width: 180px; max-height:100px">
        </td>
        <th style="text-align: left">T = {{$processo->junta->cota_t}} {{$processo->junta->unidade_medida_cotas}}</th>
        <td>COBRE JUNTA:</td>
        <td style="text-align: left;">
            <a>Sim </a> <span class="check-box">{{$processo->junta->cobre_junta ? 'X' : ''}} </span>
            <a>Não </a> <span class="check-box"> {{$processo->junta->cobre_junta ? '' : 'X'}}</span>
        </td>
      </tr>

      <tr>
        <th style="text-align: left" >R = {{$processo->junta->cota_r}} {{$processo->junta->unidade_medida_cotas}}</th>
        @if ($processo->junta->material_cobre_junta)                  
          <td>MATERIAL COBRE JUNTA (TIPO):</td>
          <th style="text-align: left;"> {{$processo->junta->material_cobre_junta}}</th>        
        @else
          <td></td>
          <th></th>
        @endif

      </tr>
     
      <tr>
        <th style="text-align: left">F = {{$processo->junta->cota_f}} {{$processo->junta->unidade_medida_cotas}}</th>
        <td>ABERTURA DE RAIZ:</td>
        <td style="text-align: left;">{{$processo->junta->abertura_raiz}} mm</td>
      </tr>
      <tr>
        <th style="text-align: left">alfa = {{$processo->junta->angulo_primario}}°</th> <!-- (!) -->
        <td>RETENTORES:</td>
        <th style="text-align: left;">{{$processo->junta->retentores}}</th>
      </tr>
    </tbody>
    </table>
