<!-- Formulario de Junta -->
<div name="sub-form-junta" id="sub-form-junta" style="display: none;">
    <h6 class="text-left">Junta</i></h6>
    <hr class="mt-0">             
    <form  class="col-12 p-0 mb-2" id="form-junta" enctype="multipart/form-data">
        @csrf  
        <input type="hidden" name="id_processo">
        <input type="hidden" name="id_junta">
        <input type="hidden" name="qtd_angulos" id="qtd_angulos" >
        <input type="hidden" id="asset" value="{{asset('')}}">
        <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
                <input type="text" class="form-control" id="artigo" placeholder="Artigo da junta" name="artigo">  
        <label for="imagem" class="mb-0 mt-1" >Imagem da junta:</label>
        <div  class="d-flex justify-content-center mb-1">
            <img src="{{asset('juntas/junta-chanfro-em-j.jpg')}}" id="junta-img">
        </div>
        <select class="form-select" aria-label="Default select example" id="imagem" name="imagem">
            <option selected value="juntas/junta-chanfro-em-j.jpg" qtd-angulos="1">Chanfro em J</option>
            <option value="juntas/junta-chanfro-em-k.jpg" qtd-angulos="2">Chanfro em K</option>
            <option value="juntas/junta-chanfro-em-u.jpg" qtd-angulos="1">Chanfro em U</option>
            <option value="juntas/junta-chanfro-em-v.jpg" qtd-angulos="1">Chanfro em V</option>
            <option value="juntas/junta-chanfro-em-x.jpg" qtd-angulos="2">Chanfro em X</option>
            <option value="juntas/junta-chanfro-em-meio-v.jpg" qtd-angulos="1">Chanfro em meio V</option>
            <option value="juntas/junta-chanfro-em-duplo-j.jpg" qtd-angulos="2">Chanfro em duplo J</option>
            <option value="juntas/junta-chanfro-em-duplo-u.jpg" qtd-angulos="2">Chanfro em duplo U</option>
        </select>                       
        <div class="form-row">
            <div class="form-col col-4">
                <label for="cota_t" class="mb-0 mt-1">Cota T: <small class="text-muted">(em mm)</small></label>
                <div class="input-group">
                    <input type="text"  class="form-control" id="cota_t" placeholder="Cota T" name="cota_t">
                    <div class="input-group-append">
                        <div class="input-group-text">mm</div>
                    </div>                     
                </div>                     
            </div>
            <div class="form-col col-4">
                <label for="cota_r" class="mb-0 mt-1">Cota R: <small class="text-muted">(em mm)</small></label>
                <div class=" input-group">
                    <input type="text" class="form-control" id="cota_r" placeholder="Cota R" name="cota_r">                     
                    <div class="input-group-append">
                        <div class="input-group-text">mm</div>
                    </div> 
                </div> 
            </div>
            <div class="form-col col-4">
                <label for="cota_f" class="mb-0 mt-1">Cota F: <small class="text-muted">(em mm)</small></label>
                <div class=" input-group">
                    <input type="text" class="form-control" id="cota_f" placeholder="Cota F" name="cota_f">                     
                    <div class="input-group-append">
                        <div class="input-group-text">mm</div>
                    </div> 
                </div>                       
            </div>                       
        </div>
        <div class="form-row">
            <div class="form-col col-12" id="angulo-1">
                <label for="angulo_primario" class="mb-0 mt-1">Ângulo do Bisel Primário: <small class="text-muted">(em graus)</small></label>
                <div class=" input-group">
                    <input type="text"  class="form-control" id="angulo_primario" placeholder="Ângulo do Bisel Primário" name="angulo_primario">                     
                    <div class="input-group-append">
                        <div class="input-group-text">°</div>
                    </div> 
                </div>
            </div>
            <div class="form-col col-12" id="angulo-2" style="display: none" >
                <label for="angulo_secundario" class="mb-0 mt-1">Ângulo do Bisel Secundário: <small class="text-muted">(em graus)</small></label>
                <div class=" input-group">
                    <input type="text" class="form-control" id="angulo_secundario" placeholder="Ângulo do Bisel Secundário" name="angulo_secundario">                     
                    <div class="input-group-append">
                        <div class="input-group-text">°</div>
                    </div>    
                </div>                       
            </div>                       
        </div> 
        <div class="form-row">
            <div class="form-col col-6">
                <label for="possui_cobre_junta" class="mb-0 mt-1">Necessidade de cobre junta?</label>
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
                <label for="material_cobre_junta" class="mb-0 mt-1">Material de cobre junta:</label>
                <select class="form-select" id="material_cobre_junta" placeholder="Material de cobre na junta" name="material_cobre_junta">
                    <option value="Cobre" selected>Cobre</option>
                    <option value="Cerâmica">Cerâmica</option>
                    <option value="Metal Base">Metal Base</option>
                </select>                     
            </div>                       
        </div>
        <div class="form-row">
            <div class="form-col col-6">
                <label for="retentores" class="mb-0 mt-1">Retentores:</label>
                <select class="form-select" id="retentores" placeholder="Retentores" name="retentores">
                    <option value="0" selected>Não</option>
                    <option value="1">Sim</option>
                </select>                     
            </div>
            <div class="form-col col-6">
                <label for="abertura_raiz" class="mb-0 mt-1">Abertura da raiz: <small class="text-muted">(em mm)</small></label>
                <div class="input-group">
                    <input type="text" class="form-control" id="abertura_raiz" placeholder="Abertura da raiz" name="abertura_raiz">                     
                    <div class="input-group-append">
                        <div class="input-group-text">mm</div>
                    </div>  
                </div>  
            </div>                       
        </div>
        <div class="form-row">
            
            <div class="form-col col-6">
                <label for="necessidade_remocao_cobre_junta" class="mb-0 mt-1">Precisa remoção cobre junta?</label>
                <select class="form-select" id="necessidade_remocao_cobre_junta"  name="necessidade_remocao_cobre_junta">
                    <option value="0" selected>Não</option>
                    <option value="1">Sim</option>
                </select>                     
            </div> 
            <div class="form-col col-6">
                <label for="necessidade_remocao_retentor" class="mb-0 mt-1">Precisa remoção de retentor?</label>
                <select class="form-select" id="necessidade_remocao_retentor"  name="necessidade_remocao_retentor">
                    <option value="0" selected>Não</option>
                    <option value="1">Sim</option>
                </select>                     
            </div>   
        </div>    
        <a class="btn btn-block btn-primary mt-2" onclick="adicionaJunta()">Continuar</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('processo')">Voltar</a>                                   
    </form>
</div>

<script>

    
    $("#imagem").change(function(){
        var selectedImage = $(this).val();
        var caminho = $('#asset').val();
        var qtdAnguloSelecionado =$(this).find('option:selected').attr('qtd-angulos');
        $('#qtd_angulos').val(qtdAnguloSelecionado);
        if (qtdAnguloSelecionado == "1") {
            $('#angulo-2').css('display', 'none');
        } else if (qtdAnguloSelecionado == "2") {
            $('#angulo-2').css('display', 'block');
        }

        $("#junta-img").attr("src", caminho+selectedImage );


    });

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