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
    }
</style>

<table class="table-junta">
    <thead>
      <tr>
        <th colspan="2" style="text-align: left;"><b>JUNTAS (AB-WYZ)</b></th>
        <td>TIPO DE JUNTA:</td>
        <td style="text-align: left;"><b>TIPO_DE_JUNTA</b></td> <!-- (?) -->
      </tr>
    </thead>
    <tbody>
      <tr>
        <td  rowspan="4">  <!--Imagem junta -->
            <img src="{{$imagem_junta}}" style="width: 180px; max-height:100px">
        </td>
        <th style="text-align: left">T = x,y a X,Y</th>
        <td>COBRE JUNTA:</td>
        <td style="text-align: left;">
            <a>Sim </a> <span class="check-box"> </span> 
            <a>Não </a> <span class="check-box"> </span> 
        </td>
      </tr>
      <tr>
        <th style="text-align: left" >R = x a X</th>
        <td>MATERIAL COBRE JUNTA (TIPO):</td>
        <th style="text-align: left;">NAO SEI OQ/NAO SEI OQ LÁ</th>
      </tr>
      <tr>
        <th style="text-align: left">f = x,y ± X,Y</th>
        <td>ABERTURA DE RAIZ:</td>
        <td style="text-align: left;">0 a X,Y mm</td>
      </tr>
      <tr>
        <th style="text-align: left">alpha = 60º ± 15º</th> <!-- (!) -->
        <td>RETENTORES:</td>
        <th style="text-align: left;">SEM</th>
      </tr>
    </tbody>
    </table>