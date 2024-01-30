<!-- Formulario de Pós-Aquecimento-->
<div name="sub-form-pos-aquecimento" id="sub-form-pos-aquecimento" style="display: none;">
    <h6 class="text-left">Pós-Aquecimento</i></h6>
    <hr class="mt-0">             
    <form  class="col-12 p-0 mb-2" id="form-pos-aquecimento"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_processo">
        <input type="hidden" name="id_pos_aquecimento">                        
        <div class="form-row">
            <div class="form-col col-6">
                <label for="faixa_temperatura" class="mb-0 mt-1">Faixa de Temperatura (ºC):</label>
                <input type="number" step="0.01" class="form-control" id="faixa_temperatura" placeholder="Faixa de Temperatura" name="faixa_temperatura">                     
            </div>
            <div class="form-col col-6">
                <label for="taxa_aquecimento" class="mb-0 mt-1" >Taxa de Aquecimento (ºC):</label>
                <input type="number" step="0.01" class="form-control" id="taxa_aquecimento" placeholder="Taxa de Aquecimento" name="taxa_aquecimento">                     
            </div>
        </div>
        <div class="form-row">
            <div class="form-col col-6">
                <label for="tempo_permanencia" class="mb-0 mt-1">Tempo de Permanencia (em minutos):</label>
                <input type="number" step="0.01" class="form-control" id="tempo_permanencia" placeholder="Tempo de Permanencia" name="tempo_permanencia">                     
            </div>
            <div class="form-col col-6">
                <label for="taxa_resfriamento" class="mb-0 mt-1" >Taxa de Resfriamento (ºC):</label>
                <input type="number" step="0.01" class="form-control" id="taxa_resfriamento" placeholder="Taxa de Resfriamento" name="taxa_resfriamento">                     
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
        $.ajax({
            url: linkAjax, // URL para onde você quer enviar a requisição
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                $('input[name="id_pos_aquecimento"]').val(data["id"]);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //console.error("Erro na requisição:", textStatus, errorThrown);
            }
        });
    };   
</script>