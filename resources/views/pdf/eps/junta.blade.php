<style>
  
    .table-junta{
        width: 100%;
        font-size: 12px;
        border: 1px solid black; !important
        border-collapse: collapse; !important
        font-weight: normal;
    }
    .table-junta tbody{
      font-size:11px;
    }
    .check-box{
        border: 1px solid black;
        padding: 5px 10px;
    }
    
   

</style>
<!--Foreach Temporario até o redesign do layout da EPS-->
<table class="table-junta" >
    <thead>
      <tr>
        <th colspan="{{$eps->juntasUnicas()->count()+1}}">
          <b style="display: block">JUNTAS 
            @foreach ($eps->juntasUnicas() as $junta)
              {{($junta->artigo) ? '('.strtoupper($junta->artigo).')':''}}
            @endforeach
          </b>
        </th>
      </tr>    
    </thead>
    <tbody>
      <tr>
        <td colspan="{{$eps->juntasUnicas()->count()+1}}" style="margin-top:30px; text-align: center">
          @foreach ($eps->juntasUnicas() as $junta)          
              <img src="{{$junta->getJuntaImagePath()}}" style="margin-top:30px; width: 180px; max-height:100px">
          @endforeach
        </td>
      </tr>

      <tr>
        <td colspan="1"></td>
        @foreach ($eps->juntasUnicas() as $index=>$junta)
          <th class="borda-lateral">Junta {{$index+1}}</th>
        @endforeach
      </tr>
      <tr>
        <td colspan="1">TIPO DE JUNTA:</td>
        @foreach ($eps->juntasUnicas() as $junta)
          <th class="borda-lateral">{{$junta->tipo_junta}}</th>
        @endforeach
      </tr>
      <tr>
        <td colspan="1">COTA T</td>
        @foreach ($eps->juntasUnicas() as $junta)
          <th class="borda-lateral">{{$junta->cota_t}} mm</th>
        @endforeach
      </tr>
      <tr>
        <td colspan="1">COTA R</td>
        @foreach ($eps->juntasUnicas() as $junta)
          <th class="borda-lateral">{{$junta->cota_r}} mm</th>
        @endforeach
      </tr> 
      <tr>
        <td colspan="1">COTA F</td>
        @foreach ($eps->juntasUnicas() as $junta)
          <th class="borda-lateral">{{$junta->cota_f}} mm</th>
        @endforeach
      </tr> 
      <tr>
        <td>1° <span style="font-family: DejaVu Sans, sans-serif;">α</span></td>        
          @foreach ($eps->juntasUnicas() as $junta)
            <th class="borda-lateral" style="text-align: left">{{$junta->angulo_primario}} °</th>
          @endforeach
      </tr>
      
      @if($eps->maiorQuantidadeAngulosJunta()>1)
      <tr>
        <td>2° <span style="font-family: DejaVu Sans, sans-serif;">α</span></td>        
          @foreach ($eps->juntasUnicas() as $junta)
            <th class="borda-lateral" style="text-align: left">{{($junta->angulo_secundario) ? $junta->angulo_secundario : '-'}} °</th>
          @endforeach
      </tr>
      @endif
      
      <tr>
        <td>ABERTURA DE RAIZ:</td>
        @foreach ($eps->juntasUnicas() as $junta)
          <th class="borda-lateral">{{$junta->cota_r}} mm</th>
        @endforeach
      </tr>

      <tr>       
        <td>COBRE JUNTA:</td>
        @foreach ($eps->juntasUnicas() as $junta)
            <th class="borda-lateral" style="text-align: left">{{($junta->possui_cobre_junta) ?'SIM' : 'NÃO'}}</th>
        @endforeach
      </tr>

      <tr>        
        <td>MATERIAL COBRE JUNTA (TIPO):</td>
        @foreach ($eps->juntasUnicas() as $junta)
          <th class="borda-lateral" style="text-align: left">{{($junta->possui_cobre_junta) ? $junta->material_cobre_junta : '-'}}</th>
        @endforeach
      </tr>
     
  
      <tr>      
        <td colspan="1">RETENTORES:</td>
          @foreach ($eps->juntasUnicas() as $junta)
            <th class="borda-lateral" style="text-align: left">{{($junta->retentores) ? 'SIM' : 'NÃO'}}</th>
          @endforeach        
      </tr>

      <tr>
        <td colspan="1" class="mt-5">NECESSIDADE REMOÇÃO COBRE JUNTA:
          @foreach ($eps->juntasUnicas() as $junta)
            <th class="borda-lateral" style="text-align: left">{{($junta->necessidade_remocao_cobre_junta) ? 'SIM' : 'NÃO'}}</th>
          @endforeach   
        </td>
        
      </tr>

      <tr>
        <td colspan="1">NECESSIDADE REMOÇÃO RETENTORES:
          @foreach ($eps->juntasUnicas() as $junta)
            <th class="borda-lateral" style="text-align: left">{{($junta->necessidade_remocao_retentor) ? 'SIM' : 'NÃO'}}</th>
          @endforeach   
        </td>
      </tr>
    </tbody>
</table>
