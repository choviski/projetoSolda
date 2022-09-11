<style>
    @media only screen and (max-width: 650px) {
        .epsCard {
            flex-direction: column;
        }
        .visSold{
            margin-bottom: 8px;
            margin-left: 7px;
        }    

    }
</style>
@foreach($epss as $eps)
    <!-- Aqui começa a listagem das empresas-->
    <div class="warpEpsCard popin">
        <p class="nomeEmpresa" style="z-index: 1">{{$eps->empresa->razao_social}}</p>
        @if($usuario->tipo==1)
            <div class="formDelBtn">
                <form method="post" action="{{route("deletarEps")}}" onsubmit="return confirm('Tem certeza que deseja remover esse EPS ?')"> <!--Rota eps.delete-->
                    @csrf
                    <input type="hidden" name="id" value="{{$eps->id}}">
                    <button class="delBtn"><i class="fas fa-times"></i></button>
		        </form>
            </div>
        @endif
        <div id="epsCard" class="col-12 bg-white rounded shadow-sm d-flex justify-content-between mt-3 popin epsCard">
            <div id="infoEps" class="p-2 mt-1 d-flex  justify-content-end flex-column">
                <p class="nomeEps mt-2 border col-12">{{$eps->nome}}</p>
                <a class="font-weight-light pt-1 mt-0 mb-0" style="text-decoration: none;cursor: pointer;"onclick="arquivosAjax({{$eps->id}})"><i class="fas fa-file-download"></i> Download arquivos EPS</a>
            </div>            
        </div>
    </div>
    <script>
        function arquivosAjax(idArquivo){
            var linkAjax = '{{route("arquivoAjax",":id")}}';
            linkAjax = linkAjax.replace(':id',idArquivo);
            $.ajax({
                url:linkAjax,
                type:'get',
            })
                .done(function (data){
                    console.log(data);
                    links=data.certificados;
                    urls=window.links;
                    var link = document.createElement('a');
                    link.setAttribute('download', "Arquivo EPS");
                    link.style.display = 'none';
                    document.body.appendChild(link);
                    for (var i = 0; i < urls.length; i++) {
                        // no site da infosolda fica como: link.setAttribute('href','https://infosolda.com.br/rastrea'+ urls[i]);
                       //link.setAttribute('href','https://infosolda.com.br/rastrea'+ urls[i]);
                        // local host fica como: link.setAttribute('href',urls[i]);
                        link.setAttribute('href',urls[i]);
                        link.click();
                    }
                    document.body.removeChild(link);
                    links=[];

                })
                .fail(function(jqHXR,ajaxOptions,thrownError){
                    alert("Erro ao baixar arquivos da EPS.")
                })
            idQualificacao=0;
            linkAjax="";
        }</script>

@endforeach