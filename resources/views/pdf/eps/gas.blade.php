<style>
    .table-gas{
        width:  100%;
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        font-weight: normal;
    }
    .table-gas tr td,th{
        text-align: left;
        padding-left: 5px;
    }
</style>
<table class="table-gas">
    <thead>
      <tr>
        <th colspan="{{$eps->processos->count() +1}}" class="titulo"> GÁS
          @foreach ($eps->processos as $processo)
            {{($processo->gas->artigo) ? '('.strtoupper($processo->gas->artigo).') ':''}}
          @endforeach
        </td>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td colspan="1"></td>
          @foreach ($eps->processos as $processo)
            <th colspan="1">Gás - {{$processo->qual_processo}}</td>
          @endforeach          
        </tr>
        <tr>
          <td colspan="1">GÁS(ES) <b>PROTEÇÃO</b> </td>
          @foreach ($eps->processos as $processo)
            <th colspan="1">{{$processo->gas->gas_protecao}}</td>
          @endforeach  
        </tr>
        <tr>
          <td colspan="1">COMPOSIÇÃO GÁS(ES) <b>PROTEÇÃO</b></td>
          @foreach ($eps->processos as $processo)
            <th colspan="1">{{$processo->gas->composicao}}</td>
          @endforeach  
        </tr>
        <tr>
          <td colspan="1">VAZÃO GÁS(ES) <b>PROTEÇÃO</b></td>
          @foreach ($eps->processos as $processo)
            <th colspan="1">{{$processo->gas->vazao}} L/min</td>
          @endforeach  
        </tr>
        <tr>
          <td colspan="1">GÁS(ES) <b>PRUGA</b></td>
          @foreach ($eps->processos as $processo)
            <th colspan="1">{{$processo->gas->purga}}</td>
          @endforeach  
        </tr>
        <tr>
          <td colspan="1">COMPOSIÇÃO GÁS(ES) <b>PRUGA</b></td>
          @foreach ($eps->processos as $processo)
            <th colspan="1">{{$processo->gas->composicao_purga}}</td>
          @endforeach  
        </tr>
        <tr>
          <td colspan="1">VAZÃO GÁS(ES) <b>PRUGA</b></td>
          @foreach ($eps->processos as $processo)
            <th colspan="1">{{$processo->gas->vazao_purga}} L/min</td>
          @endforeach  
        </tr>
        <tr>
            <td colspan="1">ARRASTE</td>
            @foreach ($eps->processos as $processo)
              <th colspan="1">N/A </td>
            @endforeach           
        </tr>
      </tbody>
</table>
