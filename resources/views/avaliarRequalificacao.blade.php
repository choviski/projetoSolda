@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_requalificacao{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">RENOVAR QUALIFICAÇÕES:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form class="col-12 mt-2" action="{{route("processarRequalificacao")}}" method="post" id="form">
            @csrf
            @method('POST')
            <div class="form-group bg-light p-2 rounded">
                <label  for="">Código RQS:</label><input type="text" class="form-control"  name="cu" value="{{$requalificacao->cod_rqs}}" required disabled>
                <input type="hidden" class="form-control" name="cu" value="{{$requalificacao->cod_rqs}}"  required disabled>

                <label for="id_soldador">Soldador:</label>
                <input type="text" class="form-control" id=""  value="{{$requalificacao->soldador->nome}}" required disabled>
                <input type="hidden" class="form-control" id=""  name="id_soldador" value="{{$requalificacao->soldador->id}}" required>

                <input type="hidden" class="form-control" id=""  name="oi" value="{{$requalificacao->cod_rqs}}" required>


                <label for="id_qualificacao">Código da Qualificação:</label>
                <input type="text" class="form-control" id=""  value="{{$requalificacao->qualificacao->id}}" required disabled>
                <input type="hidden" class="form-control" id=""  name="id_qualificacao" value="{{$requalificacao->qualificacao->id}}" required>
                <input type="hidden" class="form-control" id=""  name="data_qualificacao" value="{{$requalificacao->data_qualificacao}}" required>
                <input type="hidden" class="form-control" id=""  name="lancamento_qualificacao" value="{{$requalificacao->lancamento_qualificacao}}" required>
                <input type="hidden" class="form-control" id=""  name="validade_qualificacao" value="{{$requalificacao->validade_qualificacao}}" required>


                <label  for="data_qualificacao">Data da qualificação:</label>
                <input type="date" class="form-control" id="data_qualificacao"  value="{{$requalificacao->data_qualificacao}}" required disabled>

                <label  for="validade_qualificacao">Validade da qualificação:</label>
                <input type="date" class="form-control" id="validade_qualificacao"  value="{{$requalificacao->validade_qualificacao}}" required disabled>

                <label  for="lancamento_qualificacao">Lançamento da qualificação:</label>
                <input type="date" class="form-control" id="lancamento_qualificacao"  value="{{$requalificacao->lancamento_qualificacao}}" required disabled>

                <input type="hidden" class="form-control" id="nome_certificado" placeholder="Nome da certificado" name="nome_certificado"  value="{{$requalificacao->nome_certificado}}" required>
                <input type="hidden" class="form-control" id="nome_certificado" placeholder="nome da certificado" name="caminho_certificado"  value="{{$requalificacao->caminho_certificado}}" required>

                <label  for="nome_certificado">Posição de soldagem:</label>
                <input type="text" class="form-control" id="nome_certificado" placeholder="Posição de soldagem" name="posicao" required value="{{$requalificacao->posicao}}" disabled>

                <label  for="nome_certificado">Eletrodo:</label>
                <input type="text" class="form-control" id="nome_certificado" placeholder="Eletrodo ultilizado na soldagem" name="eletrodo" required value="{{$requalificacao->eletrodo}}" disabled>



                <label  for="caminho_certificado">Foto do corpo de prova:</label>
                <!--
                <div  style="height: 150px">
                    <img src="{ {asset("$fotos->caminho")}}" style="max-width: 100%;max-height: 100%;"  id="corpo_prova" onclick="fullscreen('{ {asset("$fotos->caminho")}}')">
                </div>
                Deixando o tamanho da imagem meio padronizado-->

               <div class="d-flex justify-content-center">
                <div id="carouselExampleIndicators" class="carousel slide d-flex justify-content-center" data-ride="carousel" style="width: 300px">
                    <ol class="carousel-indicators">
                        @foreach($fotos as $foto)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" @if($loop->index==0)class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner d-flex " >
                        @foreach($fotos as $foto)
                            @if($loop->index==0)
                                <div class="carousel-item active align-items-center">
                                    <img class="d-block" height="200px" src="{{asset($foto->caminho)}}" id="imagem{{$foto->id}}" onclick="fullscreen('{{asset($foto->caminho)}}')">
                                </div>
                            @else
                                <div class="carousel-item  ">
                                    <img class="d-block" src="{{asset($foto->caminho)}}"  height="200px" id="imagem{{$foto->id}}" onclick="fullscreen('{{asset($foto->caminho)}}')" style="margin: auto">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
                        <span class="sr-only text-secondary">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
                        <span class="sr-only text-secondary">Next</span>
                    </a>
                </div>
                </div>
                <a  onclick="downloadAll(window.links)" class="btn btn-outline-primary btn-block mt-1">Baixar fotos</a>

                <label  for="descricao">Descrição do processo de soldagem:</label>
                <textarea type="text" class="form-control" id="descricao"  placeholder="Descrição do processo que você ultilizou na soldagem" name="texto"  required  disabled>{{$requalificacao->texto}}</textarea>

                <input type="submit" class="btn btn-outline-success mt-3 col-12" value="Aceitar" id="aceitar">
                <input type="submit" class="btn btn-outline-danger mt-3 col-12" value="Negar"  id="negar">
                <input type="hidden" value="{{$requalificacao->id}}" name="id">
                <input type="hidden" value="0" name="aceito" id="aceito">
            </div>
        </form>
        <a href="{{route("requalificacoes")}}"><button class="btn btn-outline-light mt-2 mb-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

    <script>
        $( "#aceitar" ).click(function() {
            $( "#aceito" ).val(1);
        });
        $( "#negar" ).click(function() {
            $( "#aceito" ).val(0);
        });
    </script>
    <script>
        function fullscreen(img){
            $("#imagemFullscreen").attr('src',  img );
            $("#divFullscreen").css("display", "block");
            $("body").css("overflowY", "hidden");
            $("#divFullscreen").addClass("d-flex justify-content-center");


        }
    </script>
    <script>
        $("#exitFullscreen").click( function()            {
                $("#imagemFullscreen").attr('src',  "" );
                $("#divFullscreen").css("display", "none");
                $("body").css("overflow", "");
                $("#divFullscreen").removeClass("d-flex justify-content-center");
            }
        );
    </script>

    <script>
        var links = [@foreach($fotos as $foto)@if(!$loop->last)'{{asset($foto->caminho)}}',@else'{{asset($foto->caminho)}}'@endif @endforeach
         ];
         function downloadAll(urls) {
             var link = document.createElement('a');
             link.setAttribute('download', "corpo de prova");
             link.style.display = 'none';
             document.body.appendChild(link);
             for (var i = 0; i < urls.length; i++) {
                 link.setAttribute('href', urls[i]);
                 link.click();
             }
         }


    </script>
@endsection
