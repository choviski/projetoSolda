
@extends('../../layouts/padraonovo')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
    </script>
    <style>
        .warpTitle{
            padding: 5px 0px 5px 0px;
            display: flex;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }
        #selectEmpresa{
            border-radius: 5px;
        }
        #selectEmpresa:focus{
            outline: none;
        }


    </style>
   
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">DASHBOARD:</p>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="bg-white rounded mb-3 col-md-10 col-sm-12 shadow-md mt-2" >
                <div class="table-responsive" >
                    <canvas class="line-chart" style="height:400px" id="line-chart-empresas"></canvas>
                </div>
            </div>
            <div class="bg-white rounded mb-3 col-md-10 col-sm-12 shadow-md" >
                <div class="table-responsive" >
                    <canvas class="line-chart2" style="height:400px" id="line-chart-soldadores"></canvas>
                </div>
            </div>
            <div class="bg-white rounded mb-3 col-md-10 col-sm-12 pb-1 shadow-md" >
                <form action="" method="">
                    @csrf
                    <div  class="col-12 warpTitle">
                        <select id="selectEmpresa" class="col-12" onchange="dadosEmpresa()">
                            <option value="0" >Geral</option>
                            @foreach($empresas as $empresa)
                                <option value="{{$empresa->id}}">{{$empresa->razao_social}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="table-responsive" id="grafico-dinamico" >
                    <canvas class='doughnut-chart' style='height:400px' id='doughnut-chart-status-qualificacoes'></canvas>
                </div>
            </div>
            <div class="bg-white rounded mb-3 col-md-10 col-sm-12 pb-1 shadow-md">
                <p class="text-center mt-1" style="font-weight: bold;font-size: 24px">REQUALIFICAÇÕES MENSAIS</p>
                <form action="" method="" class="form-inline d-flex justify-content-around  mb-2">
                    <div class="warp-mes col-md-6 col-sm-12 text-center pl-0 pr-2">
                        <label>MÊS</label>
                        <select id="mesRequalificacao" class="col-12 rounded">
                            <option value="01">Janeiro</option>
                            <option value="02">Fevereiro</option>
                            <option value="03">Março</option>
                            <option value="04">Abril</option>
                            <option value="05">Maio</option>
                            <option value="06">Junho</option>
                            <option value="07">Julho</option>
                            <option value="08">Agosto</option>
                            <option value="09">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                    </div>
                    <div class="warp-ano col-md-6 col-sm-12 text-center pl-2 pr-0" >
                        <label>ANO</label>
                        <select id="anoRequalificacao" class="col-12 rounded">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>
                </form>
                <a class="btn btn-outline-primary col-12" onclick="requalificacoesMensais()">Buscar</a>

                <div id="warp-table" style="font-size: 1rem">

                </div>
              
                <a class="btn btn-outline-success col-12 mb-2 mt-1" id="btnDownloadTable" onclick="printTable()" style="display: none" >Exportar como PDF <i class="far fa-file-pdf"></i> </a>
                <a class="btn btn-outline-success col-12 mb-2 mt-1" id="btnExcelTable" onclick="excel()" style="display: none">Exportar para Excel <i class="far fa-file-excel"></i></a>


            </div>
            <a href="{{route("entidades")}}" class="btn col-10 btn-outline-light mb-2 text-dark"><i class="fas fa-arrow-left"></i> Voltar</a>

        </div>
    </div>
    <script>
        function printTable(){
            var getDados= document.getElementById('tabelaRelatorio').innerHTML;
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
        function requalificacoesMensais(){
            var mes = $('#mesRequalificacao').val();
            var ano = $('#anoRequalificacao').val();
            var link = '{{route("requalificacoesMensaisAjax",[":mes",":ano"])}}';
            link=link.replace(':mes',mes);
            link=link.replace(':ano',ano);
            $.ajax({
                url:link,
            }).done(
                function (data) {
                    $('#btnDownloadTable').show();
                    $('#btnExcelTable').show();
                    $('#tabelaAppend').remove();
                    $('#warp-table').append(data.html);
                    $('#tableTitle').text('Requalificações '+mes+'/'+ano);
                }
            ).fail(
                function () {
                    alert("Erro");
                }
            );
        }

    </script>


    <script> // SCRIPT PARA O GRAFICO DO USUARIO //
        var Label=[];
        @foreach($dados['meses_soldadores'] as $numero =>$valor)

        var add = Label.push("{{($valor)}}");

        @endforeach

        var Soldadores=[];

        @foreach($dados['soldadores'] as $numero =>$valor)

        var add = Soldadores.push({{$valor}});

        @endforeach

        var ctx = document.getElementsByClassName("line-chart");
        var chartGraph = new Chart(ctx,{
            type:'bar',
            data: {
                labels:Label,
                datasets:[{
                    label:"SOLDADORES CADASTRADOS",
                    borderWidth:6,
                    borderColor: 'rgb(33,140,255)',
                    backgroundColor:  'rgba(5,147,255,0.5)',
                    data:Soldadores,
                },
                ]
            },
            options:{
                responsive: true,
                maintainAspectRatio: false,
                title:{
                    display:true,
                    fontSize:20,
                    text:"SOLDADORES CADASTRADOS: {{$dados['total_soldadores']}} "
                },
                labels:{
                    fontStyle:"bold",
                },
                scales:{
                    yAxes:[{
                        ticks:{
                            min:0,
                            beginAtZero:true,
                        },
                    }],
                }
            }
        });
    </script>

    <script> // SCRIPT PARA O GRAFICO DAS EMPRESAS //
        var Label=[];
        @foreach($dados['meses_empresas'] as $numero =>$valor)
        var add = Label.push("{{($valor)}}");
        @endforeach
        var Empresas=[];
        @foreach($dados['empresas'] as $numero =>$valor)
        var add = Empresas.push({{$valor}});
        @endforeach
        var ctx = document.getElementsByClassName("line-chart2");
        var chartGraph = new Chart(ctx,{
            type:'line',
            data: {
                labels:Label,
                datasets:[{
                    label:"EMPRESAS CADASTRADOS",
                    borderWidth:6,
                    borderColor: 'rgb(33,140,255)',
                    backgroundColor:  'rgba(5,147,255,0.5)',
                    data:Empresas,
                },
                ]
            },
            options:{
                responsive: true,
                maintainAspectRatio: false,
                title:{
                    display:true,
                    fontSize:20,
                    text:"EMPRESAS CADASTRADAS: {{$dados['total_empresas']}} "
                },
                labels:{
                    fontStyle:"bold",
                },
                scales:{
                    yAxes:[{
                        ticks:{
                            min:0,
                            beginAtZero:true,
                        },
                    }],
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementsByClassName("doughnut-chart");
        var chartGraph = new Chart(ctx,{
            type: 'doughnut',
            data: {
                labels: ['Qualificado','Não Qualificado','Em avaliação','Atrasado'],
                datasets: [
                    {
                        label:'Status Qualificações',
                        backgroundColor: ['#0ea000','#e61100','#0767f8','#fdf300'],
                        data: [{{$dados['status_qualificado']}}, {{$dados['status_nao_qualificado']}}, {{$dados['status_em_processo']}},{{$dados['status_atrasado']}}]
                    }
                ]
            },
            options: {
                animation:{
                    animateScale:true
                },
                title:{
                    display:true,
                    fontSize:20,
                    text:"{{$dados['nome']}}"
                },
                labels:{
                    fontStyle:"bold",
                },

                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"
    >
    </script>

    <script>
        function dadosEmpresa() {
            var id = $('#selectEmpresa').val();
            var linkAjax = '{{route("dadosEmpresaAjax",":id")}}'
            linkAjax = linkAjax.replace(':id', id);
            $.ajax({
                url: linkAjax,
            }).done(
                function (data) {

                    document.getElementById("doughnut-chart-status-qualificacoes").remove();
                    $("#grafico-dinamico").append("    <canvas class='doughnut-chart' style='height:400px' id='doughnut-chart-status-qualificacoes'></canvas>\n" +
                        "                ")

                    var ctx = document.getElementsByClassName("doughnut-chart");
                    var chartGraph = new Chart(ctx,{
                        type: 'doughnut',
                        data: {
                            labels: ['Qualificado','Não Qualificado','Em avaliação','Atrasado'],
                            datasets: [
                                {
                                    label:'Status Qualificações',
                                    backgroundColor: ['#0ea000','#e61100','#0767f8','#fdf300'],
                                    data: [data['status_qualificado'], data['status_nao_qualificado'], data['status_em_processo'],data['status_atrasado']]
                                }
                            ]
                        },
                        options: {
                            animation:{
                                animateScale:true
                            },
                            title:{
                                display:true,
                                fontSize:20,
                                text:data["nome"],
                            },
                            labels:{
                                fontStyle:"bold",
                            },

                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });


                }
            ).fail(
                function () {
                    alert("erro");
                }
            );
        }
    </script>



    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script>

        function excel(){
            $('#tabelaRelatorio').table2excel({
                exclude:".noExl",
                name:"relatorio mensal qualificacoes",
                filename:"relatorio mensal qualificacoes.xls",
            });
        }
    </script>

@endsection
