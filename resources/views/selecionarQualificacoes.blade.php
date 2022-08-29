@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_cadastro{
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
        <p class="lead p-1 m-0" style="font-size: 22px">PREENCHA A QUALIFICAÇÃO DO SOLDADOR:</p>
    </div>
    <div class="container-fluid">
        <div class="row text-center d-flex justify-content-center">
            <form action="{{route("adicionarQualificacao")}}" class="form-group col-md-9 col-sm-10" method="post" enctype="multipart/form-data">
                @csrf
                <div class="bg-light p-2 rounded mt-2 ">

                    <label  for="">Código RQS:</label>
                    <input type="text" class="form-control" id="" placeholder="Insira o código RQS" name="cod_rqs" required>

                   <input type="hidden" name="id_soldador" value="{{$soldador}}">
                    <label for="id_eps">EPS:</label>
                        <select class="form-control" id="id_eps" name="id_eps" required>
                            <option id="op1" value="" selected disabled>Selecione o EPS</option>

                            @foreach($epss as $eps)
                                <option value="{{$eps->id}}" name="id_eps">{{$eps->nome}}</option>
                            @endforeach
                        </select>
                        <label for="id_processo">Processo:</label>
                        <select class="form-control" id="id_processo" name="id_processo" required>
                            <option id="op1" value="" selected disabled>Selecione o processo</option>

                            @foreach($processos as $processo)
                                <option value="{{$processo->id}}" name="id_processo">{{$processo->nome}}</option>
                            @endforeach
                        </select>


                        <label  for="descricao">Descrição:</label>
                        <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição da qualificação" name="descricao" required></textarea>

                    <label  for="data_qualificacao">Insira a data da qualificação:</label>
                    <input type="date" class="form-control" id="data_qualificacao" name="data_qualificacao" required>

                    <label  for="nome_certificado">Nome do certificado:</label>
                    <input type="text" class="form-control" id="nome_certificado" placeholder="Insira o nome da certificado" name="nome_certificado" required>


                    <label for="caminho_certificado" id="" class="mt-2 col-12 p-0">Insira o arquivo do certificado:</label>
                    <label for="caminho_certificado" id="btnCertificado" class="">Escolha o arquivo de certificado</label>
                    <input type="file" class="" id="caminho_certificado" placeholder="Insira o arquivo de certificado" name="caminho_certificado" required>

                    <p class="lead">Insira as informações sobre qual a norma que fala sobre essa qualificação:</p>
                        <label  for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" placeholder="Insira o nome da norma" name="nome_norma" required>

                        <label  for="descricao">Descrição:</label>
                        <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição da norma" name="descricao_norma" required></textarea>

                        <label for="validade">Validade:</label>
                        <select name="validade" class="form-control" id="validade">
                            <option value="1">6 meses</option>
                            <option value="2">12 meses</option>
                            <option value="3">24 meses</option>
                            <option value="4">36 meses</option>
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
    </script>
@endsection