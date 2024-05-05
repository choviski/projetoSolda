<style>
    .table-metal-adicao{
        width:  100%;
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
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
        <th colspan="4" class="titulo">METAIS DE ADIÇÃO 
          {{($metal->artigo) ? '('.strtoupper($metal->artigo).')':''}}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align: left">ESPECIFICAÇÃO N° (S.F.A)/AWS:</td>
        <th style="text-align: left">{{$metal->classificacao_aws}}</th>
        <td style="text-align: left">SUPORTE:</td>
        <th style="text-align: left">{{$metal->suporte}}</th>
      </tr>
      <tr>
        <td>F N°.:</td>
        <th>{{$metal->f_numero}}</th>
        <td>MATERIAL DO SUPORTE:</td>
        <th>{{$metal->material_suporte}}</th>
      </tr>
      <tr>
        <td>A N°.:</td>
        <th>{{$metal->a_numero}}</th>
        <td>FORMA DO CONSUMÍVEL:</td>
        <th>{{$metal->forma_consumivel}}</th> <!-- LÁ ELEKkkkkj -->
      </tr>
      <tr>
        <td>BITOLA METAIS ADIÇÃO:</td>  <!-- (diametro_consumivel ?) -->
        <th>ø {{$metal->diametro_consumivel}} mm</th>
        <td>INSERTO CONSUMÍVEL:</td>
        <th>sem</th>
      </tr>
      <tr> <!-- (? - Existe metal_depositado no banco mas n tem chanfro e nem angulo.) -->
        <td>METAL DEPOSITADO: </td>
        <th> {{$metal->metal_depositado}} mm </th>
        <td></td>
        <td></td>
        {{-- <td>METAL DEPOSITADO  <span style="font-size: 10px">(ÂNGULO)</span>:</td>
        <th>sem</th> --}}
      </tr>
      <tr>
        <td colspan="1">METAL ADIÇÃO SUPLEMENTAR:</td>
        <th colspan="3">{{$metal->metal_suplementar ?: 'N/A'}}</th>
      </tr>
      <tr>
        <td colspan="1">MARCA COMERCIAL:</td>
        <th colspan="3">{{$metal->marca_material ?: 'N/A'}}</th>
      </tr>
    </tbody>
    </table>
