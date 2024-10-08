<!-- Formulario de Pós-Aquecimento-->
<div name="sub-form-pos-aquecimento" id="sub-form-pos-aquecimento" style="display: none;">
    <h6 class="text-left">Pós-Aquecimento</i></h6>
    <hr class="mt-0">
    <div id="wrapper-validation-pos-aquecimento" class="col-12 p-0">
        <!-- Espaço para possíveis erros de validação  -->
    </div>                  
    <form  class="col-12 p-0 mb-2" id="form-pos-aquecimento"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_processo">
        <input type="hidden" name="id_pos_aquecimento">        
        <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
        <input type="text" class="form-control" id="artigo" placeholder="Artigo do Pós Aquecimento" name="artigo">                    
        <div class="form-row">
            <div class="form-col col-6">
                <label for="faixa_temperatura" class="mb-0 mt-1">Faixa de Temperatura: <small class="text-muted">(em ºC)</small></label>
                <div class="input-group">    
                    <input type="text" class="form-control" id="faixa_temperatura" placeholder="Faixa de Temperatura" name="faixa_temperatura">                     
                    <div class="input-group-append">
                        <div class="input-group-text">ºC</div>
                    </div>     
                </div>
            </div>
            <div class="form-col col-6">
                <label for="taxa_aquecimento" class="mb-0 mt-1" >Taxa de Aquecimento: <small class="text-muted">(em ºC/h)</small></label>
                <div class="input-group">
                    <input type="number" step="0.01" class="form-control" id="taxa_aquecimento" placeholder="Taxa de Aquecimento" name="taxa_aquecimento">                     
                    <div class="input-group-append">
                        <div class="input-group-text">ºC/h</div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-col col-6">
                <label for="tempo_permanencia" class="mb-0 mt-1">Tempo de Permanencia: <small class="text-muted">(em min)</small></label>
                <div class="input-group">
                    <input type="text" class="form-control" id="tempo_permanencia" placeholder="Tempo de Permanencia" name="tempo_permanencia">                     
                    <div class="input-group-append">
                        <div class="input-group-text">min</div>
                    </div> 
                </div>
            </div>
            <div class="form-col col-6">
                <label for="taxa_resfriamento" class="mb-0 mt-1" >Taxa de Resfriamento: <small class="text-muted">(em ºC/h)</small></label>
                <div class="input-group">
                    <input type="number" step="0.01" class="form-control" id="taxa_resfriamento" placeholder="Taxa de Resfriamento" name="taxa_resfriamento">                     
                    <div class="input-group-append">
                        <div class="input-group-text">ºC/h</div>
                    </div>     
                </div>
            </div>
        </div>    
        <a class="btn btn-block btn-primary mt-2" onclick="adicionaPosAquecimento()">Continuar</a>                                   
        <a id="volta-processo" class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('pre-aquecimento')">Voltar</a>                                                      
    </form>
</div>

<script>
    function adicionaPosAquecimento(){
        var formData = $("#form-pos-aquecimento").serialize();
        var linkAjax = '{{route("cadastraOuEditaPosAquecimento")}}';
        var qualProcesso = $("#qual_processo").val();
        $.ajax({
            url: linkAjax,
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                $("#wrapper-validation-pos-aquecimento").empty();
                $('input[name="id_pos_aquecimento"]').val(data["id"]); 
                if(qualProcesso=="SMAW"){
                    mostraAba("caracteristicas-eletricas");
                }else{
                    mostraAba("gas");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                mostraErrosValidacao('#wrapper-validation-pos-aquecimento',jqXHR.responseJSON)
            }
        });
    };   
</script>