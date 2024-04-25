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
        <td colspan="2">PROCESSO: <b>{{$processo->qual_processo}}</b></td>
        <td>TIPO: <b>{{$processo->tipo}}</b></td>
      </tr>
    </thead>
</table>
