<!-- Formulario de Junta -->
<div name="sub-form-junta" id="sub-form-junta" style="display: none;">
    <h6 class="text-left">Junta</i></h6>
    <hr class="mt-0">             
    <form  class="col-12 p-0 mb-2" id="form-junta" enctype="multipart/form-data">
        @csrf  
        <input type="hidden" name="id_processo">
        <input type="hidden" name="id_junta">
        <label for="imagem" class="mb-0 mt-1" >Imagem da junta:</label>
        <select class="form-select" aria-label="Default select example" id="imagem" name="imagem">
            <option selected disabled>Escolha a imagem da junta</option>
        </select>                       
        <div class="form-row">
            <div class="form-col col-6">
                <label for="unidade_medida_cotas" class="mb-0 mt-1">Unidade de medida das cotas:</label>
                <input type="text" class="form-control" id="nome_processo" placeholder="Unidade de medida das cotas" name="unidade_medida_cotas">                     
            </div>
            <div class="form-col col-6">
                <label for="cota_t" class="mb-0 mt-1" >Cota T:</label>
                <input type="number" step="0.01" class="form-control" id="cota_t" placeholder="Cota T" name="cota_t">                     
            </div>
        </div>
        <div class="form-row">
            <div class="form-col col-6">
                <label for="cota_r" class="mb-0 mt-1" >Cota R:</label>
                <input type="number" step="0.01" class="form-control" id="cota_r" placeholder="Cota R" name="cota_r">                     
            </div>
            <div class="form-col col-6">
                <label for="cota_f" class="mb-0 mt-1">Cota F:</label>
                <input type="number" step="0.01" class="form-control" id="cota_f" placeholder="Cota F" name="cota_f">                     
            </div>                       
        </div>
        <div class="form-row">
            <div class="form-col col-6">
                <label for="angulo_primario" class="mb-0 mt-1">Angulo Primário:</label>
                <input type="number" step="0.01" class="form-control" id="angulo_primario" placeholder="Angulo Primário" name="angulo_primario">                     
            </div>
            <div class="form-col col-6">
                <label for="angulo_secundario" class="mb-0 mt-1">Angulo Secundário:</label>
                <input type="number" step="0.01" class="form-control" id="angulo_secundario" placeholder="Angulo Secundário" name="angulo_secundario">                     
            </div>                       
        </div> 
        <div class="form-row">
            <div class="form-col col-6">
                <label for="possui_cobre_junta" class="mb-0 mt-1">Necessidade de cobre na junta?</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="possui_cobre_junta" id="possui_cobre_junta_sim" checked>
                    <label class="form-check-label" for="possui_cobre_junta_sim">
                        Sim
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="possui_cobre_junta" id="possui_cobre_junta_nao" >
                    <label class="form-check-label" for="possui_cobre_junta_nao">
                        Não
                    </label>
                </div>                     
            </div>
            <div class="form-col col-6">
                <label for="material_cobre_junta" class="mb-0 mt-1">Material de cobre na junta:</label>
                <input type="text" class="form-control"  id="material_cobre_junta" placeholder="Material de cobre na junta" name="material_cobre_junta">                     
            </div>                       
        </div>
        <div class="form-row">
            <div class="form-col col-6">
                <label for="retentores" class="mb-0 mt-1">Retentores:</label>
                <input type="text" class="form-control" id="retentores" placeholder="Retentores" name="retentores">                     
            </div>
            <div class="form-col col-6">
                <label for="abertura_raiz" class="mb-0 mt-1">Abertura da raiz:</label>
                <input type="number" step="0.01" class="form-control" id="abertura_raiz" placeholder="Abertura da raiz" name="abertura_raiz">                     
            </div>                       
        </div>
        <a class="btn btn-block btn-primary mt-2" onclick="adicionaJunta()">Continuar</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('processo')">Voltar</a>                                   
    </form>
</div>

<script>
    $('input[name="possui_cobre_junta"]').change(function(){
        if ($(this).val() == 1) {
            $('#material_cobre_junta').prop('disabled', false);
        } else {            
            $('#material_cobre_junta').prop('disabled', true);
        }
    });

    function adicionaJunta(){
        var formData = $("#form-junta").serialize();
        var linkAjax = '{{route("cadastraOuEditaJunta")}}';
        $.ajax({
            url: linkAjax,
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                $('input[name="id_junta"]').val(data["id"]);
                mostraAba("metal-base");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //console.error("Erro na requisição:", textStatus, errorThrown);
            }
        });
    };   
</script>