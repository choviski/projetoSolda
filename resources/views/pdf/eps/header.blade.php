<!-- Header -->
<style>
    #wrap-eps-info{
        display: flex;
        border: 1px black solid;
        text-align: center;
        padding:0px;
    }
    #wrap-eps-info p{
        margin: 0px;
    }
    .eps-info{
        font-size:12px;
        border: 1px black solid;
    }
    .table-eps-info{        
        border-collapse: collapse;
    }
    .table-eps-info td{
        padding:2px;
        border: 1px black solid;
    }
</style>
<div id="header">
    <table style="width:100%">
        <tbody>
            <tr>  
                <td scope="row" colspan="2">              
                    <div id="wrap-img-empresa">
                        <img src="{{$imagem_emrpesa}}" style="max-height: 90px;">
                    </div>
                </td>
                <td>                
                    <div id="wrap-eps-info">
                        <p style="font-weight: bold;margin-top:10px">
                            ESPECIFICAÇÃO DE PROCEDIMENTO DE SOLDAGEM - EPS
                        </p>
                        <p style="font-size:14px">
                            WELDING PROCEDURE SPECIFICATION - WPS
                        </p>
                        <p style="font-size:14px;margin-bottom:10px">
                            ASME IX - Ed. 2021 <!-- (Norma) -->
                        </p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width:100%" class="table-eps-info">
        <tbody class="eps-info">
            <tr>  
                <td>              
                    <span style="padding: 5px;">EPS:
                        <b> XYZ </b>
                    </span>
                </td>
                <td> 
                    <span>ACOMPANHA RQP Nº:
                        <b> UW/XYZ </b>   <!-- (eps->rqp) -->
                    </span>              
                </td>
                <td> 
                    <span>DATA:
                        <b> DD/MM/AAAA </b>
                    </span>              
                </td>
                <td> 
                    <span>* REVISÃO: <!-- (?) -->
                        <b> [X] </b>  
                    </span>              
                </td>
                <td> 
                    <span>FOLHA:
                        <b>0/N</b>
                    </span>              
                </td>
            </tr>
        </tbody>
    </table>
</div>