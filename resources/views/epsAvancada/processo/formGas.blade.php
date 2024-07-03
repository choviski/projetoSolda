<!-- Formulario de Gas-->
<div name="sub-form-gas" id="sub-form-gas" style="display: none;">
    <h6 class="text-left">Gás</i></h6>
    <hr class="mt-0">
    <div id="wrapper-validation-gas" class="col-12 p-0">
        <!-- Espaço para possíveis erros de validação  -->
    </div>             
    <form  class="col-12 p-0 mb-2" id="form-gas"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_processo">
        <input type="hidden" name="id_gas">
        <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
        <input type="text" class="form-control" id="artigo" placeholder="Artigo do Gás" name="artigo">                            
        <div class="form-row">
            <div class="form-col col-6">
                <label for="gas_protecao" class="mb-0 mt-1">Gás de Proteção:</label>
                <input type="text" class="form-control" id="gas_protecao" placeholder="Gás de Proteção" name="gas_protecao">                     
            </div>
            <div class="form-col col-6">
                <label for="composicao" class="mb-0 mt-1" >Composição:</label>
                <input type="text"  class="form-control" id="composicao" placeholder="Composição" name="composicao">                     
            </div>
        </div>
        
        <div class="form-row">
            <label for="vazao" class="mb-0 mt-1">Vazão: <small class="text-muted">(em L/min)</small></label>
            <div class="input-group">
                <input type="text" class="form-control" id="vazao" placeholder="Vazão" name="vazao">                     
                <div class="input-group-append">
                    <div class="input-group-text">L/min</div>
                </div>     
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-col col-6">     
                <label for="possui_purga" class="mb-0 mt-1">Possui Purga?</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="possui_purga" id="possui_purga_sim" checked>
                    <label class="form-check-label" for="possui_purga_sim">
                        Sim
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="possui_purga" id="possui_purga_nao" >
                    <label class="form-check-label" for="possui_purga_nao">
                        Não
                    </label>
                </div>
             </div>      
            <div class="form-col col-6">
                <label for="purga" class="mb-0 mt-1" >Purga:</label>
                <input type="text"  class="form-control" id="purga" placeholder="Purga" name="purga">                     
            </div>
        </div>  
        
        <div class="form-row">                      
            <div class="form-col col-6">
                <label for="composicao_purga" class="mb-0 mt-1" >Composição da Purga:</label>
                <input type="text"   class="form-control" id="composicao_purga" placeholder="Composição da Purga" name="composicao_purga">                     
            </div>
            <div class="form-col col-6">
                <label for="vazao_purga" class="mb-0 mt-1" >Vazão da Purga: <small class="text-muted">(em L/min)</small></label>
                <div class="input-group">
                    <input type="text" class="form-control" id="vazao_purga" placeholder="Vazão da purga" name="vazao_purga">                     
                    <div class="input-group-append">
                        <div class="input-group-text">L/min</div>
                    </div>  
                </div>
            </div>
        </div>           
        <a class="btn btn-block btn-primary mt-2" onclick="adicionaGas()">Continuar</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('pos-aquecimento')">Voltar</a>                                                      
    </form>
</div>

<script>
    $('input[name="possui_purga"]').change(function(){
        if ($(this).val() == 1) {
            $('#purga').prop('disabled', false);
            $('#composicao_purga').prop('disabled', false);
            $('#vazao_purga').prop('disabled', false);
        } else {            
            $('#purga').prop('disabled', true);
            $('#composicao_purga').prop('disabled', true);
            $('#vazao_purga').prop('disabled', true);
        }
    });

    function adicionaGas(){
        var formData = $("#form-gas").serialize();
        var linkAjax = '{{route("cadastraOuEditaGas")}}';
        $.ajax({
            url: linkAjax, // URL para onde você quer enviar a requisição
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                $('#wrapper-validation-gas').empty();
                $('input[name="id_gas"]').val(data["id"]);                
                mostraAba("caracteristicas-eletricas");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                mostraErrosValidacao('wrapper-validation-gas',jqXHR.responseJSON)
            }
        });
    };   
</script>