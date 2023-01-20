@extends('../../layouts/padraonovo')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
</script>


<div class="col-12 bg-white text-center shadow-sm rounded-bottom">
    <hr class="p-0 m-0 mb-1">
    <p class="lead p-1 m-0" style="font-size: 22px">RELATÓRIO DE QUALIFICAÇÕES:</p>
</div>
<div class="container-fluid">
    <div class="row justify-content-around">
        <div class="bg-white rounded mt-3 mb-3 col-md-10 col-sm-12 pb-1 shadow-md">
            <p class="text-center mt-1" style="font-weight: bold;font-size: 24px">REQUALIFICAÇÕES</p>
            <form action="" method="" class="form-inline d-flex justify-content-around  mb-2">
                <div class="warp-estado col-md-12 col-sm-12 text-center p-0">
                    <select name="opcao" id="opcao" class="col-12 form-select">
                        <option value="0" selected>Todas</option>
                        <option value="1">Qualificadas</option>
                        <option value="2">Não qualificadas</option>
                        <option value="3">Vencidas</option>
                        <option value="4">Em avaliação</option>
                    </select>
                </div>                
            </form>
                <a class="btn btn-outline-primary col-12 mb-2" onclick="relatorioQulificacoes()">Buscar</a>

                <div id="warp-table" style="font-size: 1rem">

                </div>
              
                <a class="btn btn-outline-success col-12 mb-2 mt-1" id="btnDownloadTable" onclick="printTable('tabelaRequalificacoes')" style="display: none" >Exportar como PDF <i class="far fa-file-pdf"></i> </a>
                <a class="btn btn-outline-success col-12 mb-2 mt-1" id="btnExcelTable" onclick="excel()" style="display: none">Exportar para Excel <i class="far fa-file-excel"></i></a>
            </div>

            <div class="bg-white rounded mt-3 mb-3 col-md-10 col-sm-12 pb-1 shadow-md">
                <p class="text-center mt-1" style="font-weight: bold;font-size: 24px">ANO DE VENCIMENTO</p>
                <form action="" method="" class="form-inline d-flex justify-content-around  mb-2">
                    <div class="warp-estado col-md-12 col-sm-12 text-center p-0">
                        <select name="opcao-ano" id="opcao-ano" class="col-12 form-select">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023" selected>2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>                
                </form>
                <a class="btn btn-outline-primary col-12 mb-2" onclick="relatorioVencimento()">Buscar</a>
    
                <div id="warp-table-vencimento" style="font-size: 1rem">
    
                </div>
                  
                <a class="btn btn-outline-success col-12 mb-2 mt-1" id="btnDownloadTableVencimento" onclick="printTable('tabelaVencimentos')" style="display: none" >Exportar como PDF <i class="far fa-file-pdf"></i> </a>
                <a class="btn btn-outline-success col-12 mb-2 mt-1" id="btnExcelTableVencimento" onclick="excelVencimento()" style="display: none">Exportar para Excel <i class="far fa-file-excel"></i></a>
            </div>

            <a href="{{route("entidades")}}" class="btn col-10 btn-outline-light mb-2 text-dark"><i class="fas fa-arrow-left"></i> Voltar</a>

        </div>
    </div>
</div>



<script>
        function printTable(idTabela){
            var getDados= document.getElementById(idTabela).innerHTML;
            var janela = window.open('','','width=1800','height=1200');
            janela.document.write('<html><head>');
            janela.document.write('<style>table,th,td{border: 1px solid grey;\n' +
                '  \tborder-collapse: collapse;\n' +
                '  \tfont-family: Arial;font-size: 0.7rem}</style></head>');
            janela.document.write('<body>');
            janela.document.write(getDados);
            janela.document.write('</body></html>');
            janela.print();
        }
</script>
<script>
    function relatorioQulificacoes(){      
        var opcao = $('#opcao').val();        
        var link = '{{route("relatorioQualificacaoAjax",[":opcao"])}}';
        link=link.replace(':opcao',opcao);        
        $.ajax({
            url:link,
        }).done(
            function (data) {
                $('#btnDownloadTable').show();
                $('#btnExcelTable').show();
                $('#tabelaAppend').remove();
                $('#warp-table').append(data.html);
                $('#tableTitle').text(data.nomeOpcao);
            }
        ).fail(
            function () {
                alert("Erro");
            }
        );
    }
</script>

<script>
    function relatorioVencimento(){      
        var ano = $('#opcao-ano').val();        
        var link = '{{route("relatorioVencimentoAjax",[":ano"])}}';
        link=link.replace(':ano',ano);    
        $.ajax({
            url:link,
        }).done(
            function (data) {
                console.log(data);
                $('#btnDownloadTableVencimento').show();
                $('#btnExcelTableVencimento').show();
                $('#tabelaVencimentoAppend').remove();
                $('#warp-table-vencimento').append(data.html);
                $('#tableVencimentoTitle').text(data.nomeOpcao);
            }
        ).fail(
            function () {
                alert("Erro");
            }
        );
    }
</script>

<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script>
    function excel(){
        $('#tabelaRequalificacoes').table2excel({
            exclude:".noExl",
            name:"Tabela de Requalificacoes",
            filename:"Tabela de Requalificacoes",
        });
    }
    function excelVencimento(){
        $('#tabelaVencimentos').table2excel({
            exclude:".noExl",
            name:"Tabela de Vencimentos",
            filename:"Tabela de Vencimentos",
        });
    }
</script>
@endsection
