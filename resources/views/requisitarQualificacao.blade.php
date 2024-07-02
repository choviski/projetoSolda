@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_soldadores{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
        input[type="file"]{
             margin: 0px;
             padding: 0px;
             display: none;
         }
        #btnCertificado{
            background-color: #59acff;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            font-weight: lighter;
            width: auto;
            display: block;
            text-align: center;
            transition: 0.3s ease;
        }
        #btnCertificado:hover{
            background-color: #0275d8;
        }
        #btnInstrucao{
            background-color: #59acff;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            font-weight: lighter;
            width: auto;
            display: block;
            text-align: center;
            transition: 0.3s ease;
        }
        #btnInstrucao:hover{
            background-color: #0275d8;
        }
    </style>
    <div class="col-12  bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">REQUISIÇÃO DE QUALIFICAÇÃO DO SOLDADOR:</p>
    </div>
    <div class="container-fluid">
        <div class="row text-center d-flex justify-content-center">
            <form action="{{route("salvandoRequisicaoQualificacao")}}" class="form-group col-md-8 col-sm-10 ad-margin" method="post" enctype="multipart/form-data">
                @csrf
                <div class="bg-light p-2 rounded mt-2">
                    <input type="hidden" name="id_soldador" value="{{$soldador}}">
                    <input type="hidden" name="tipo_eps" id="tipo_eps" value="">
                    
                    <div class="row">
                        <div class="col">
                            <label for="cod_rqs" class="mb-0 mt-1">Código RQS:</label>
                            <input type="text" class="form-control" id="cod_rqs" placeholder="Insira o código RQS" name="cod_rqs" required>                
                        </div>
                        <div class="col">
                            <label for="id_eps" class="mb-0 mt-1">EPS:</label>
                            <select class="form-control" id="id_eps" name="id_eps" required>
                                <option id="op1" value="" selected disabled>Selecione o EPS</option>

                                @foreach($epss as $eps)
                                    <option value="{{$eps->id}}" name="id_eps" tipo_eps="Normal">
                                        {{$eps->nome}} (EPS Normal)
                                    </option>
                                @endforeach
                                @foreach($epsAvancadas as $epsAvancada)
                                    <option value="{{$epsAvancada->id}}" name="id_eps" tipo_eps="Avançada"
                                            norma_eps="{{$epsAvancada->norma}}" processo_eps="{{$epsAvancada->processos[0]->qual_processo}}">
                                        {{$epsAvancada->nome}} (EPS Avançada)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="id_processo" class="mb-0 mt-1">Processo:</label>
                            <select class="form-control" id="id_processo" name="id_processo" required>
                                <option  value="" selected disabled>Selecione o processo</option>

                                @foreach($processos as $processo)
                                    <option value="{{$processo->id}}" name="id_processo">{{$processo->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label  for="data_qualificacao" class="mb-0 mt-1">Insira a data da qualificação:</label>
                            <input type="date" class="form-control" id="data_qualificacao" name="data_qualificacao" required>        
                        </div>
                    </div>

                    <label for="descricao" class="mb-0 mt-1">Descrição:</label>
                    <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição da qualificação" name="descricao" required></textarea>

                  
                    <label for="nome_certificado" class="mb-0 mt-1">Nome do certificado:</label>
                    <input type="text" class="form-control" id="nome_certificado" placeholder="Insira o nome da certificado" name="nome_certificado" required>


                    <label for="caminho_certificado" id="" class="mt-2 mb-0 col-12 p-0">Insira o arquivo do certificado:</label>
                    <label for="caminho_certificado" id="btnCertificado" class="">Escolha o arquivo de certificado</label>
                    <input type="file" class="" id="caminho_certificado" placeholder="Insira o arquivo de certificado" name="caminho_certificado" required>
                    
                    <hr>
                    
                    <p class="text-justify text-muted mb-1">Preencha as informações da <b>Norma</b> desta qualificação:</p>
                    <label  for="nome_norma" class="mt-2 mb-0 col-12 p-0">Nome da norma:</label>
                    <input type="text" class="form-control" id="nome_norma" placeholder="Insira o nome da norma" name="nome_norma" required>

                    <label  for="descricao" class="mt-2 mb-0 col-12 p-0">Descrição da norma:</label>
                    <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição da norma" name="descricao_norma" required></textarea>

                    <label for="validade" class="mt-2 mb-0 col-12 p-0">Validade:</label>
                    <select name="validade" class="form-control" id="validade">
                        <option value="3">3 meses</option>
                        <option value="6">6 meses</option>
                        <option value="9">9 meses</option>
                        <option value="12">12 meses</option>
                        <option value="24">24 meses</option>
                        <option value="36">36 meses</option>
                    </select>

                    </div>
                <input type="submit" class="btn btn-outline-primary mt-3 col-12" value="Salvar">

            </form>
        </div>
    </div>
    <script >
        $("#caminho_certificado").on("change", function(){
            nCertificados = document.getElementById('caminho_certificado').files.length;
            if(nCertificados>0){
                document.getElementById('btnCertificado').innerHTML='Certificado selecionado!';
                document.getElementById('btnCertificado').style.backgroundColor='#0275d8';

            }else{
                document.getElementById('btnCertificado').innerHTML='Escolha o arquivo do certificado';
                document.getElementById('btnCertificado').style.backgroundColor='#59acff';
            }
        })

        $("#caminho_instrucao").on("change", function(){
            nInstrucoes = document.getElementById('caminho_instrucao').files.length;
            if(nInstrucoes>0){
                document.getElementById('btnInstrucao').innerHTML='Arquivo de Instrução selecionado!';
                document.getElementById('btnInstrucao').style.backgroundColor='#0275d8';

            }else{
                document.getElementById('btnInstrucao').innerHTML='Escolha o arquivo de instrução';
                document.getElementById('btnInstrucao').style.backgroundColor='#59acff';
            }
        })

        $('#id_eps').change(function(){
            var tipoEps = $(this).find('option:selected').attr('tipo_eps');
            $('#tipo_eps').val(tipoEps);
            if(tipoEps=='Avançada'){
                var normaEps = $(this).find('option:selected').attr('norma_eps');
                var processoEps = $(this).find('option:selected').attr('processo_eps');
                $('#nome_norma').val(normaEps);
                
                var optionProcessoDaEPS = $('option').filter(function() {
                    return $(this).text() === processoEps;
                });
                
                optionProcessoDaEPS.prop('selected', true);
            }else{
                $('#nome_norma').val('');
                $('#id_processo option:eq(0)').val('');
                $('#id_processo option:eq(0)').text("Selecione o processo");
                $('#id_processo option:eq(0)').prop('selected', true);
                $('#id_processo option:eq(0)').prop('disabled', true);
            }
        });
    </script>
@endsection