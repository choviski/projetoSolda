@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_requisicoes{
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
        #btnFoto{
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
        #btnFoto:hover{
            background-color: #0275d8;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">AVALIAR REQUISIÇÃO DE EPS:</p>
    </div>

    <div class="container-fluid col-12 d-flex justify-content-center mt-2 ">
        <form class="col-md-9 col-sm-10 mt-2" action="{{route("processarRequisicaoEps")}}" method="post" id="form" >
            @csrf
            @method('POST')
            <div class="form-group bg-light col-12 p-2 rounded">
                <label  for="empresa">Empresa:</label>
                <input type="text" class="form-control" id="empresa" placeholder="{{$eps->empresa->nome_fantasia}}"  value="{{$eps->empresa->nome_fantasia}}" name="empresa" disabled>

                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="{{$eps->nome}}"  value="{{$eps->nome}}" name="nome" required>

              
                <input type="hidden" name="id_empresa" value="value="{{$eps->id_empresa}}">
                <a  onclick="getFotos();downloadAll(window.links);" class="btn btn-outline-primary btn-block mt-2">Baixar arquivos do EPS</a>
                <input type="submit" class="btn btn-outline-success mt-3 col-12" value="Aceitar" id="aceitar">
                <input type="submit" class="btn btn-outline-danger mt-3 col-12" value="Negar"  id="negar">
                <input type="hidden" value="{{$eps->id}}" name="id">
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
        function getFotos(){
            links = [@foreach($arquivos as $arquivo)@if(!$loop->last)'{{asset($arquivo->caminho)}}',@else'{{asset($arquivo->caminho)}}'@endif @endforeach
            ];
        }
        function downloadAll(urls) {
            var link = document.createElement('a');
            link.setAttribute('download', "Documento da EPS");
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
