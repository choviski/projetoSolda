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
        padding-rigt:-10px;
    }
</style>

<table class="table-junta">
    <thead>
      <tr>
        <th colspan="1" style="text-align: left;">
          <b>JUNTAS {{($processo->junta->artigo) ? '('.strtoupper($processo->junta->artigo).')':''}}</b>
        </th>
        <th colspan="1" style="text-align: left">T = {{$processo->junta->cota_t}} mm</th>
        <td colspan="1">TIPO DE JUNTA:</td>
        <td colspan="1" style="text-align: left;font-size:10px"><b>CONFORME DESENHOS DE FABRICAÇÃO</b></td> <!-- (?) -->
      </tr>
    </thead>
    <tbody>
      <tr>
        <td  rowspan="4">  <!--Imagem junta -->
            <img src="{{$imagem_junta}}" style="width: 180px; max-height:100px">
        </td>
        <th style="text-align: left" >R = {{$processo->junta->cota_r}} mm</th>
        <td>COBRE JUNTA:</td>
        <td style="text-align: left;">
            <a>Sim </a> <span class="check-box"> {{$processo->junta->possui_cobre_junta ? 'X' : ''}} </span>
            <a>Não </a> <span class="check-box"> {{$processo->junta->possui_cobre_junta ? '' : 'X'}}</span>
        </td>
      </tr>

      <tr>
        <th style="text-align: left">F = {{$processo->junta->cota_f}} mm</th>
        @if ($processo->junta->material_cobre_junta)                  
          <td>MATERIAL COBRE JUNTA (TIPO):</td>
          <th style="text-align: left;"> {{$processo->junta->material_cobre_junta}}</th>        
        @else
          <td></td>
          <th></th>
        @endif

      </tr>
     
      <tr>
        <th style="text-align: left">
          1° <span style="font-family: DejaVu Sans, sans-serif;">α</span> = {{$processo->junta->angulo_primario}}°
        </th>
        <td>ABERTURA DE RAIZ:</td>
        <td style="text-align: left;">{{$processo->junta->cota_r}} mm</td>
      </tr>
      <tr>
        <!-- (!) -->
        @if($processo->junta->qtd_angulos>1)
          <th style="text-align: left">
            2° <span style="font-family: DejaVu Sans, sans-serif;">α</span> = {{$processo->junta->angulo_secundario}}°
          </th>
        @else
          <th></th>
        @endif
        <td>RETENTORES:</td>
        <td style="text-align: left;">  
          <a>Sim </a> <span class="check-box"> {{$processo->junta->retentores ? 'X' : ' '}} </span>
          <a>Não </a> <span class="check-box"> {{$processo->junta->retentores ? ' ' : 'X'}}</span>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="mt-5">NECESSIDADE REMOÇÃO COBRE JUNTA:
          {{$processo->junta->retentores ? 'SIM' : 'NÃO '}}
        </td>
        <td colspan="2">NECESSIDADE REMOÇÃO RETENTORES:
           {{$processo->junta->retentores ? 'SIM' : 'NÃO '}}
        </td>
      </tr>
    </tbody>
    </table>
