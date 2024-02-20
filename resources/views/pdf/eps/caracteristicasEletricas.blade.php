<style>    
    .table-eletrica{
        width:  100%;
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        font-weight: normal;
    }
    .table-eletrica tr td,th{
        text-align: left;
        padding-left: 5px;
    }
    .text-small{
        font-size: 10px;
    }
    .table-resumo{
        width: 100%;
        text-align: center;  
        border-collapse: collapse;     
        font-size: 12px;
        border: 1px solid black
    }
    .borda{
        border: 1px solid black;
    }
</style>
<table class="table-eletrica">
    <thead>
      <tr>
        <th colspan="4">CARACTERÍSTICAS ELÉTRICAS (AB-XYZ) </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="2">TIPO DE CORRENTE: 
            <b> CONTÍNUA (C) </b>
        </td>      
        <td colspan="2" style="text-align: left">POLARIDADE: 
            <b>DIRETA</b>
        </td>
      </tr>
      <tr>
        <td colspan="4">MODO DE TRANSFERÊNCIA:
            <b>N/A</b>
        </td>
      </tr>
      <tr>
        <td colspan="4">
            TIPO E DIÂMETRO DO ELETRODO DE TUNGSTÊNIO:
            <b> LOREM IPSUM</b>
        </td>
      </tr>
    </tbody>
</table>

<!-- Tabela meio "resumida" que fica abaixo da de caracteristicas eletricas no exemplo -->

<table class="table-resumo" style="border: 1px solid black">
    <thead >
      <tr >
        <td rowspan="2" class="borda" >CAMADAS</td>
        <td rowspan="2" class="borda" >PROCESSOS</td>
        <td colspan="2" class="borda" >METAL DEPOSITADO</td>
        <td colspan="2" class="borda" >CORRENTE</td>
        <td rowspan="2" class="borda" >TENSÃO (V)</td>
        <td rowspan="2" class="borda" >VELOCIDADE (cm/min)</td>
      </tr>
      <tr class="text-small" >
        <td class="borda" >CLASSE</th>
        <td class="borda" >DIÂMETRO (mm)</td>
        <td class="borda" >POLAR.</th>
        <td class="borda" >AMPERAGEM (A)</td>
      </tr>
    </thead>
    <tbody >
      <tr>
        <th class="borda" >TODAS</th>
        <th class="borda" >TIG</th>
        <th class="borda" >ER 2594</th>
        <th class="borda" >2,0 / 2,4 / 3,2</th>
        <th class="borda" >CC-</th>
        <th class="borda" >80 - 150</th>
        <th class="borda" >10,0 - 13,7</th>
        <th class="borda" >>= 10,6</th>
      </tr>
    </tbody>
</table>