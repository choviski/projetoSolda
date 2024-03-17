<!-- Formulario de Pré-Aquecimento-->
<div name="sub-form-pre-aquecimento" id="sub-form-pre-aquecimento" style="display: none;">
    <h6 class="text-left">Pré-Aquecimento</i></h6>
    <hr class="mt-0">             
    <form  class="col-12 p-0 mb-2" id="form-pre-aquecimento"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_processo">
        <input type="hidden" name="id_pre_aquecimento">   
        <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
        <input type="text" class="form-control" id="artigo" placeholder="Artigo do Pré Aquecimento" name="artigo">                       
        <div class="form-row">
            <div class="form-col col-6">
                <label for="temperatura" class="mb-0 mt-1">Temperatura (ºC):</label>
                <input type="text" class="form-control" id="temperatura" placeholder="Temperatura" name="temperatura">                     
            </div>
            <div class="form-col col-6">
                <label for="temperatura_interpasse" class="mb-0 mt-1" >Temperatura do interpasse:</label>
                <input type="text" class="form-control" id="temperatura_interpasse" placeholder="Temperatura do interpasse" name="temperatura_interpasse">                     
            </div>
        </div>
        <a class="btn btn-block btn-primary mt-2" onclick="adicionaPreAquecimento()">Continuar</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('posicao-soldagem')">Voltar</a>                                                      
    </form>
</div>

<script>
    function adicionaPreAquecimento(){
        var formData = $("#form-pre-aquecimento").serialize();
        var linkAjax = '{{route("cadastraOuEditaPreAquecimento")}}';
        $.ajax({
            url: linkAjax, 
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                $('input[name="id_pre_aquecimento"]').val(data["id"]);                
                mostraAba("pos-aquecimento");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //console.error("Erro na requisição:", textStatus, errorThrown);
            }
        });
    };   
</script>