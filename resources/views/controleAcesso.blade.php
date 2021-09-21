@extends('../../layouts/padraonovo')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
</script>
<style>
    input[type="date"]{
        background-color:#0080ff;
        padding: 10px;
        font-family: "Roboto Mono",monospace;
        color: #ffffff;
        font-size:15px;
        border:none;
        outline:none;
        border-radius:5px;
    }
    ::-webkit-calendar-picker-indicator{
        background-color:#ffffff;
        padding:5px;
        cursor: pointer;
        border-radius:3px;
    }
</style>

<div class="col-12 bg-white text-center shadow-sm rounded-bottom">
    <hr class="p-0 m-0 mb-1">
    <p class="lead p-1 m-0" style="font-size: 22px">CONTROLE DE ACESSO:</p>
</div>
<div class="container-fluid">
    <div class="row justify-content-around">
        <div class="bg-white rounded mt-3 mb-3 col-md-10 col-sm-12 pb-1 shadow-md">
            <p class="text-center mt-1" style="font-weight: bold;font-size: 24px">REQUALIFICAÇÕES MENSAIS</p>
            <form action="" method="" class="form-inline d-flex justify-content-around  mb-2">
                <div class="warp-mes col-md-6 col-sm-12 text-center pl-0 pr-2">
                    <label>DATA INICIAL</label>
                    
                    <input type="date" id="dataInicial" name="dataInicial">
                </div>
                <div class="warp-ano col-md-6 col-sm-12 text-center pl-2 pr-0" >
                    <label>DATA FINAL</label>
                    <input type="date" id="dataFinal" name="dataFinal">
                </div>
            </form>
            <a class="btn btn-outline-primary col-12" onclick="controleAcesso()">Buscar</a>

            <div id="warp-table" style="font-size: 1rem">

            </div>
              
            <a class="btn btn-outline-success col-12 mb-2 mt-1" id="btnDownloadTable" onclick="printTable()" style="display: none" >Exportar como PDF <i class="far fa-file-pdf"></i> </a>
            <a class="btn btn-outline-success col-12 mb-2 mt-1" id="btnExcelTable" onclick="excel()" style="display: none">Exportar para Excel <i class="far fa-file-excel"></i></a>


            </div>
            <a href="{{route("entidades")}}" class="btn col-10 btn-outline-light mb-2 text-dark"><i class="fas fa-arrow-left"></i> Voltar</a>

        </div>
    </div>
</div>



<script>
        function printTable(){
            var getDados= document.getElementById('tabelaAcessos').innerHTML;
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
    function controleAcesso(){
        var dataInicial = $('#dataInicial').val();
        var dataFinal = $('#dataFinal').val();        
        var link = '{{route("controleAcessoAjax",[":dataInicial",":dataFinal"])}}';
        link=link.replace(':dataInicial',dataInicial);
        link=link.replace(':dataFinal',dataFinal);
        $.ajax({
            url:link,
        }).done(
            function (data) {
                $('#btnDownloadTable').show();
                $('#btnExcelTable').show();
                $('#tabelaAppend').remove();
                $('#warp-table').append(data.html);
                $('#tableTitle').text('Acessos do dia '+dataInicial+' até '+dataFinal);
            }
        ).fail(
            function () {
                alert("Erro");
            }
        );
    }

</script>
<script>
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("dataInicial").value = today;
    document.getElementById("dataFinal").value = today;
</script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script>
    function excel(){
        $('#tabelaAcessos').table2excel({
            exclude:".noExl",
            name:"Controle de Acesso",
            filename:"Controle de Acesso",
        });
    }
</script>
@endsection
