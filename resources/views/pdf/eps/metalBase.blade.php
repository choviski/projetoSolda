<style>
    .table-metal-base {
        width: 100%;
        font-size: 12px;
        border: 1px solid black; !important
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
        <th colspan="{{$eps->processos->first()->materiaisBases->count() + 1}}" class="titulo"> METAIS DE BASE 
            @foreach ($eps->processos->first()->materiaisBases as $metalBase)
                {{($metalBase->artigo) ? '('.strtoupper($metalBase->artigo).') ':''}}
            @endforeach
        </th>        
    </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="1"></td>
            @foreach ($eps->processos->first()->materiaisBases as $index => $metalBase)
                <td colspan="1"> <b> Metal Base {{$index + 1}} </b> </td>           
            @endforeach
        </tr>
        <tr>
            <td colspan="1" style="text-align: left">PN°.: </td>
            @foreach ($eps->processos->first()->materiaisBases as $index => $metalBase)
                <td colspan="1"> <b> {{$metalBase->p_numero}} </b> </td>           
            @endforeach
        </tr>
        <tr>
            <td colspan="1" style="text-align: left">GURPO N°.: </td>
            @foreach ($eps->processos->first()->materiaisBases as $index => $metalBase)
                <td colspan="1"> <b> {{$metalBase->grupo_n}} </b> </td>           
            @endforeach
        </tr>
        <tr>
            <td colspan="1">ESPECIFICAÇÃO TIPO E GRAU:</td>
            @foreach ($eps->processos->first()->materiaisBases as $index => $metalBase)
                <td colspan="1"> <b> {{$metalBase->tipo_grau}} </b> </td>           
            @endforeach
        </tr>
        <tr>
            <th colspan="{{$eps->processos->first()->materiaisBases->count() + 1}}" class="titulo">FAIXA DE ESPERSSURA</th>
        </tr>

        @if($eps->processos->first()->materiaisBases->contains('tubo_ou_chapa', 'Tubo'))                        
            <tr>
                <td colspan="1">FAIXA DE DIÂMETRO INTERNO TUBO</td>
                @foreach ($eps->processos->first()->materiaisBases as $materialBase)   
                    <td colspan="1">
                        <b>{{($materialBase->diametro_interno_tubo) ? ($materialBase->diametro_interno_tubo.' mm') : '-'}}</b>
                    </td>
                @endforeach
            </tr>
            <tr>
                <td colspan="1">FAIXA DE DIÂMETRO EXTERNO TUBO</td>
                @foreach ($eps->processos->first()->materiaisBases as $materialBase)   
                    <td colspan="1">
                        <b>{{($materialBase->diametro_externo_tubo) ? ($materialBase->diametro_externo_tubo.' mm') : '-'}}</b>
                    </td>
                @endforeach
            </tr>
        @endif
        @if($eps->processos->first()->materiaisBases->contains('tubo_ou_chapa', 'Chapa'))
            <tr>
                <td colspan="1">ESPESSURA DA CHAPA</td>
                @foreach ($eps->processos->first()->materiaisBases as $materialBase)   
                    <td colspan="1">
                        <b>{{($materialBase->espessura) ? ($materialBase->espessura.' mm') : '-'}}</b>
                    </td>
                @endforeach
            </tr>
        @endif
    </tbody>
</table>
