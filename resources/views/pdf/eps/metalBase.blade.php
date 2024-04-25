<style>
    .table-metal-base {
        width: 100%;
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        font-weight: normal;
    }

    .table-metal-base tr td, th {
        text-align: left;
        padding-left: 5px;
    }
</style>

<table class="table-metal-base">
    <thead>
    <tr>
        <th colspan="12" class="titulo">
            METAIS DE BASE {{($processo->materiaisBases[0]->artigo) ? '('.strtoupper($processo->materiaisBases[0]->artigo).')':''}}
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="3" style="text-align: left">PN°.: <b>{{$processo->materiaisBases[0]->p_numero}}</b></td>
        <td colspan="3" style="text-align: left">GURPO N°.: <b>{{$processo->materiaisBases[0]->grupo_n}}</b></td>

        @if(count($processo->materiaisBases)>1)
            <td colspan="3" style="text-align: left">* COM PN°.: <b>{{$processo->materiaisBases[1]->p_numero}}</b></td>
            <td colspan="3" style="text-align: left">* COM GRUPO N°.: <b> {{$processo->materiaisBases[1]->grupo_n}}</b></td>
        @else
            <td colspan="6"></td>
        @endif
    </tr>
    <tr>
        <td colspan="6">ESPECIFICAÇÃO TIPO E GRAU: <b>{{$processo->materiaisBases[0]->tipo_grau}}</b></td>
        <!-- Esse campo abaixo é para o segundo metal base, caso ele exista  -->
        <!-- Se não existir esse campo não deve ser mostrado  -->
        @if(count($processo->materiaisBases)>1)
            <td colspan="6">COM ESPEC. TIPO E GRAU: <b>{{$processo->materiaisBases[1]->tipo_grau}}</b></td>
        @else
            <td colspan="6"> </td>
        
        @endif
    </tr>
    <tr>
        <th colspan="12" class="titulo">FAIXA DE ESPERSSURA</th>
    </tr>
    <tr>
        <td colspan="4">METAL BASE</td>
        <td colspan="4"></td>
        {{-- <td colspan="4">ESPESSURA:
            <b>{{$processo->junta->cota_t}} mm</b>
        </td> --}}
        {{-- <td colspan="4">ÂNGULO: <b>{{$processo->materiaisBases[0]->angulo ?: 0}}º</b></td> --}}
        <td colspan="4"></td>
    </tr>
    @if($processo->materiaisBases[0]->tubo_ou_chapa == 'Tubo')
        <tr>
            <td colspan="4">FAIXA DE DIÂMETRO TUBOS</td>
            <td colspan="4">ESPESSURA: <b>{{$processo->materiaisBases[0]->diametro_interno_tubo}}
                    a {{$processo->materiaisBases[0]->diametro_externo_tubo}}
                    mm </b></td>
            {{-- <td colspan="4">ÂNGULO: <b>{{$processo->materiaisBases[0]->angulo ?: 0}}º</b></td> --}}
        
            <td colspan="4"></td>
        </tr>
    @else
        <tr>
            <td colspan="4">ESPESSURA DA CHAPA</td>
            <td colspan="4">ESPESSURA: <b>{{$processo->junta->cota_t}} mm</b></td>
            {{-- <td colspan="4">ÂNGULO: <b>{{$processo->materiaisBases[0]->angulo ?: 0}}º</b></td> --}}
            <td colspan="4"></td>
        </tr>
    @endif
    <!-- Ignorar por enquanto.
      <tr >
        <td colspan="8" style="padding: 8px 5px;" >ESPESSURA MÁXIMA CADA PASSE <= 13,0 mm
            <span class="check-box"> </span>  <a>Sim </a>
            <span class="check-box"> </span>  <a>Não </a>
        </td>
      </tr>
      -->
    </tbody>
</table>
