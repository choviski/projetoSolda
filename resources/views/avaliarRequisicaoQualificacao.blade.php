@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_perfil{
            text-decoration: none;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: underline;
            font-weight: normal;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">AVALIAR REQUISIÇÃO DE QUALIFICAÇÃO:</p>
    </div>

    <div class="container-fluid col-12 d-flex justify-content-center mt-2 ">
        <form class="col-md-9 col-sm-10 mt-2" action="{{route("processarRequisicaoQualificacao")}}" method="post" id="form" >
            @csrf
            @method('POST')
            <div class="form-group bg-light p-2 rounded">

                <label for="">Código RQS:</label>
                <input type="text" class="form-control" id="" value="{{$qualificacao->cod_rqs}}" name="cod_rqs" disabled>

                <label for="">Soldador:</label>
                <input type="text" class="form-control" id="" value="{{$qualificacao->soldador->nome}}" name="soldador" disabled>

                <label for="">EPS:</label>
                <input type="text" class="form-control" id="" value="{{$qualificacao->qualificacao->eps->nome}}" name="eps" disabled>

                <label for="">Processo:</label>
                <input type="text" class="form-control" id="" value="{{$qualificacao->qualificacao->processo->nome}}" name="processo" disabled>

                <label  for="descricao">Descrição:</label>
                <textarea type="text" class="form-control" id="descricao" style="resize: none;" name="descricao" disabled>{{$qualificacao->qualificacao->descricao}}</textarea>

                <label  for="data_qualificacao">Insira a data da qualificação:</label>
                <input type="date" class="form-control" id="data_qualificacao" name="data_qualificacao" value="{{$qualificacao->data_qualificacao}}" disabled>

                <label  for="nome">Nome da norma:</label>
                <input type="text" class="form-control" id="nome" value="{{$qualificacao->qualificacao->norma->norma->nome}}" name="nome_norma" disabled>

                <label  for="descricao">Descrição:</label>
                <textarea type="text" class="form-control" id="descricao" name="descricao_norma" disabled>{{$qualificacao->qualificacao->norma->norma->descricao}}</textarea>

                <label for="validade">Validade:</label>                
                @if($qualificacao->qualificacao->norma->norma->validade==6)
                <input  type="text" name="validade" class="form-control" id="validade" value="6 meses" disabled>
                @endif
                @if($qualificacao->qualificacao->norma->norma->validade==12)
                <input  type="text" name="validade" class="form-control" id="validade" value="12 meses" disabled>
                @endif

                @if($qualificacao->qualificacao->norma->norma->validade==24)
                <input  type="text" name="validade" class="form-control" id="validade" value="24 meses" disabled>
                @endif

                <a  onclick="getArquivos();downloadAll(window.links);" class="btn btn-outline-primary btn-block mt-2">Baixar arquivos da Qualificação</a>
                <input type="submit" class="btn btn-outline-success mt-3 col-12" value="Aceitar" id="aceitar">
                <input type="submit" class="btn btn-outline-danger mt-3 col-12" value="Negar"  id="negar">
                <input type="hidden" value="{{$qualificacao->id}}" name="id">
                <input type="hidden" value="0" name="aceito" id="aceito">
                <script>
                    $( "#aceitar" ).click(function() {
                        $( "#aceito" ).val(1);
                    });
                    $( "#negar" ).click(function() {
                        $( "#aceito" ).val(0);
                    });
                </script>
            </div>
        </form>
    </div>
    <div class=" d-flex justify-content-center col-12">
        <a href="{{route("requisicoes")}}" class="col-md-9 col-sm-10"><button class="btn btn-outline-light mt-1 mb-3 col-12 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>
    <script>
        function getArquivos(){
            links = ['{{asset($qualificacao->caminho_certificado)}}'@if($qualificacao->caminho_instrucao),'{{asset($qualificacao->caminho_instrucao)}}'@endif
            ];
        }
        function downloadAll(urls) {
            var link = document.createElement('a');
            link.setAttribute('download', "Arquivo da Qualificação");
            link.style.display = 'none';
            document.body.appendChild(link);
            for (var i = 0; i < urls.length; i++) {
                link.setAttribute('href', urls[i]);
                link.click();
            }
            document.body.removeChild(link);
            links=[];

        }
    
    </script>
@endsection