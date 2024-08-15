<style>
    .table-metal-adicao{
        width:  100%;
        font-size: 12px;
        border: 1px solid black; !important
        border-collapse: collapse; !important
        font-weight: normal;
    }
    .table-metal-adicao tr td,th{
        text-align: left;
        padding-left: 5px;
    }
    .titulo{
      text-align: left;
      padding-left: 5px;
    }
</style>

<table class="table-metal-adicao">
    <thead>
      <tr>
        <th colspan="{{$eps->quatidadeMetaisAdicao()+1}}" class="titulo">METAIS DE ADIÇÃO 
          @foreach ($eps->processos as $processo)
            @foreach ($processo->metaisAdicao as $index => $metal)
            {{($metal->artigo) ? '('.strtoupper($metal->artigo).') ':''}}
            @endforeach
          @endforeach
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="1"></td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"> <b>  {{$processo->qual_processo}} - Metal {{$index + 1}}  </b> </td>
          @endforeach
        @endforeach
      <tr>
        <td colspan="1" style="text-align: left">ESPECIFICAÇÃO N° (S.F.A)/AWS:</td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"> <b>  {{$metal->classificacao_aws}}  </b></td>
          @endforeach
        @endforeach
      </tr>
      <tr>
        <td colspan="1">F N°.:</td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"> <b>  {{$metal->f_numero}} </b></td> 
          @endforeach
        @endforeach     
      </tr>
      <tr>
        <td>A N°.:</td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"> <b>  {{$metal->a_numero}} </b></td> 
          @endforeach
        @endforeach  
      </tr>
      <tr>
        <td>FORMA DO CONSUMÍVEL:</td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
          <td colspan="1" class="borda-lateral"><b>  {{ucfirst(str_replace("_"," ",$metal->forma_consumivel))}} </b></td> 
          @endforeach
        @endforeach  
      </tr>
      <tr>
        <td>BITOLA METAIS ADIÇÃO:</td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"><b>  {{$metal->diametro_consumivel}} mm </b></td> 
          @endforeach
        @endforeach  
      </tr>
      <tr>
        <td>METAL DEPOSITADO: </td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"> <b> {{$metal->metal_depositado}} mm </b></td> 
          @endforeach
        @endforeach  
      </tr>
      <tr>
        <td colspan="1">METAL ADIÇÃO SUPLEMENTAR:</td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"> <b> {{$metal->metal_suplementar ?: 'N/A'}} </b></td> 
          @endforeach
        @endforeach  
      </tr>
      <tr>
        <td colspan="1">MARCA COMERCIAL:</td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"> <b> {{$metal->marca_material ?: 'N/A'}} </b></td> 
          @endforeach
        @endforeach  
      </tr>      
      <tr>
        <td colspan="1" style="text-align: left">SUPORTE:</td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"> <b> {{$metal->suporte}}  </b></td>
          @endforeach
        @endforeach 
      </tr>
      <tr>
        <td>MATERIAL DO SUPORTE:</td>
        @foreach ($eps->processos as $processo)
          @foreach ($processo->metaisAdicao as $index => $metal)
            <td colspan="1" class="borda-lateral"> <b> {{$metal->material_suporte}} </b></td> 
          @endforeach
        @endforeach 
      </tr>   
    </tbody>
    </table>
