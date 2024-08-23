<style>
    .table-processos{
        border-collapse: collapse;
        font-size:12px;
        width: 100%;
        border: 1px solid black;
    }
    .table-processos td{
        padding: 2px 5px;
        border: 1px solid black;
    }
</style>

<table class="table-processos">
    <thead>
      <tr>
        <td colspan="2">PROCESSO: 
          @foreach($eps->processos as $index=>$processo)
            <b>{{$processo->qual_processo}}{{ $loop->last ? '' : ' /' }}</b>
          @endforeach
        </td>
        <td>TIPO:  
        @foreach($eps->processos as $index=>$processo)
          <b>{{$processo->tipo}}{{ $loop->last ? '' : ' /' }}</b>
        @endforeach</td>
      </tr>
    </thead>
</table>
