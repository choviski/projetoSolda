<!-- Formulario de Junta -->
<div name="sub-form-junta" id="sub-form-junta" style="display: none;">
    <h6 class="text-left">Junta</i></h6>
    <hr class="mt-0">
    <div id="wrapper-validation-junta" class="col-12 p-0">
        <!-- Espaço para possíveis erros de validação  -->
    </div>
    <div id="div-add-junta" style="display:block">
        <a class="btn btn-block btn-outline-primary mt-2" style="display:none" id="clonar-juntas" onclick="clonarJuntas()">
            <i class="fa fa-clone"></i>
            Clonar Juntas do Processo anterior
        </a> 
        <a class="btn btn-block btn-outline-primary mt-2" onclick="mostraFormularioJunta()">
            <i class="fa fa-plus"></i>
            Adicionar Junta
        </a>
        <div id="lista-junta">
            <!-- "Card de listagem das Juntas." -->
        </div>
        <a class="btn btn-block btn-primary mt-2" onclick="continuarJunta()">Continuar</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('processo')">Voltar</a>    
    </div>

    <div id="div-form-junta" style="display:none">
        <form class="col-12 p-0 mb-2" id="form-junta" enctype="multipart/form-data">
            @csrf  
            <input type="hidden" name="id_processo">
            <input type="hidden" name="id_junta">
            <input type="hidden" value="1" name="qtd_angulos" id="qtd_angulos" >
            <input type="hidden" value="Chanfro em J" name="tipo_junta" id="tipo_junta" >
            <input type="hidden" id="asset" value="{{asset('')}}">
            <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
                    <input type="text" class="form-control" id="artigo" placeholder="Artigo da junta" name="artigo">  
            <label for="imagem" class="mb-0 mt-1" >Imagem da junta:</label>
            <div  class="d-flex justify-content-center mb-1">
                <img src="{{asset('juntas/junta-chanfro-em-j.jpg')}}" id="junta-img">
            </div>
            <select class="form-select" aria-label="Default select example" id="imagem" name="imagem">
                <option selected value="juntas/junta-chanfro-em-j.jpg" qtd-angulos="1" tipo="Chanfro em J">Chanfro em J</option>
                <option value="juntas/junta-chanfro-em-k.jpg" qtd-angulos="2" tipo="Chanfro em K">Chanfro em K</option>
                <option value="juntas/junta-chanfro-em-u.jpg" qtd-angulos="1" tipo="Chanfro em U">Chanfro em U</option>
                <option value="juntas/junta-chanfro-em-v.jpg" qtd-angulos="1" tipo="Chanfro em V">Chanfro em V</option>
                <option value="juntas/junta-chanfro-em-x.jpg" qtd-angulos="2" tipo="Chanfro em X">Chanfro em X</option>
                <option value="juntas/junta-chanfro-em-meio-v.jpg" qtd-angulos="1" tipo="Chanfro em meio V">Chanfro em meio V</option>
                <option value="juntas/junta-chanfro-em-duplo-j.jpg" qtd-angulos="2" tipo="Chanfro em duplo J">Chanfro em duplo J</option>
                <option value="juntas/junta-chanfro-em-duplo-u.jpg" qtd-angulos="2" tipo="Chanfro em duplo U">Chanfro em duplo U</option>
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
                <div class="form-col col-12">
                    <label for="retentores" class="mb-0 mt-1">Retentores:</label>
                    <select class="form-select" id="retentores" placeholder="Retentores" name="retentores">
                        <option value="0" selected>Não</option>
                        <option value="1">Sim</option>
                    </select>                     
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
            <a class="btn btn-block btn-primary mt-2" id="botao-adicionar-junta"  onclick="adicionaJunta()">Continuar</a>                                   
            <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraListagemJunta()">Voltar</a>                                    
        </form>
    </div>
</div>

<script> 
    $("#imagem").change(function(){
        var selectedImage = $(this).val();
        var caminho = $('#asset').val();
        var qtdAnguloSelecionado =$(this).find('option:selected').attr('qtd-angulos');
        $('#qtd_angulos').val(qtdAnguloSelecionado);
        var tipoJunta =$(this).find('option:selected').attr('tipo');
        $('#tipo_junta').val(tipoJunta);
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

    function criarElementoJunta(tipoJunta, id) {
        if ($('#div-junta-'+id).length > 0) { // Editando
            console.log("Editando", tipoJunta)
            $('#span-junta-'+id).text(tipoJunta); 
        }else{//Criando
            var divExterior = $('<div>').addClass('mt-2 p-0 col-12 d-flex justify-content-between').attr('id','div-junta-'+id);;
            var spanJunta = $('<span>')
                .addClass('btn btn-secondary disabled')
                .attr('style', 'cursor: pointer;')
                .attr('id', 'span-junta-'+id)
                .text(tipoJunta);
            var divInterno = $('<div>');
            var spanEditar = $('<span>')
                .addClass('btn btn-outline-primary mr-1')
                .attr('style', 'cursor: pointer;')
                .attr('onclick', 'editaJunta(' + id + ')')
                .html('<i class="fas fa-edit"></i>');
            var spanRemover = $('<span>')
                .addClass('btn btn-outline-danger')
                .attr('style', 'cursor: pointer;')
                .attr('onclick', 'removeJunta(' + id + ')')
                .html('<i class="fas fa-trash"></i>');
            divInterno.append(spanEditar, spanRemover);
            divExterior.append(spanJunta, divInterno);
            $('#lista-junta').append(divExterior);
        }
    }

    function adicionaJunta(){
        var formData = $("#form-junta").serialize();
        var linkAjax = '{{route("cadastraOuEditaJunta")}}';
        $.ajax({
            url: linkAjax,
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                var id_processo = $('[name="id_processo"]').val();
                $("#wrapper-validation-junta").empty();
                criarElementoJunta(data["tipo_junta"],data["id"]);
                $('#form-junta')[0].reset();
                $('[name="id_junta"]').val('');
                $('[name="id_processo"]').val(id_processo);
                mostraListagemJunta();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                mostraErrosValidacao('#wrapper-validation-junta',jqXHR.responseJSON)
            }
        });
    };   

    function mostraFormularioJunta(){
        $('#div-form-junta').css('display', 'block');
        $('#div-add-junta').css('display', 'none');
        $("#imagem").trigger('change');
        $('#botao-adicionar-junta').text('Adicionar Junta');  
    }

    function mostraListagemJunta(){
        $('#div-form-junta').css('display', 'none');
        $('#div-add-junta').css('display', 'block');  
    }

    function removeJunta(id){
        if(confirm("Tem certeza que deseja excluir esta junta?")){
            var linkAjax = '{{route("deleteJunta",":id")}}';
            linkAjax = linkAjax.replace(':id',id);
            $.ajax({
                url:linkAjax,
                type:'DELETE',                
                headers:{
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
            })
                .done(function(data){
                    $('#div-junta-'+id).remove();
                    $('[name="id_junta"]').val('');
                })            
                .fail(function(jqHXR,ajaxOptions,thrownError){
                    //alert("Erro ao baixar certificado.")
                })    
            }
    }

    function continuarJunta(){
        var temMetaisCadastrados = $('#lista-junta').children('div').length > 0 ? true : false;
        if (temMetaisCadastrados){
            $("#wrapper-validation-junta").empty();
            mostraAba('metal-base');
        }else{
            mostraErrosValidacao('#wrapper-validation-junta',{
                "errors": {
                    "qtd_juntas": [
                        "É necessário pelo menos uma junta."
                    ]
                }
            });        
        }
    }

    function editaJunta(id){
        var linkAjax = '{{route("getJunta",":id")}}';
        linkAjax = linkAjax.replace(':id',id);
        $.ajax({
            url:linkAjax,
            type:'get',
        })
            .done(function(data){
                $('#form-junta input').each(function() {
                    var nomeCampo = $(this).attr('name');
                    if (data.hasOwnProperty(nomeCampo)) {
                        if (!$(this).is(':radio')) {
                            $(this).val(data[nomeCampo]);
                        }else{
                            $('#'+(data[nomeCampo])).prop('checked', true);
                        }
                    }
                });
                console.log(data);
                $('#imagem').val(data["imagem"]);
                $('[name="id_junta"]').val(id);
                mostraFormularioJunta();
                $('#botao-adicionar-junta').text('Salvar Junta');
            })  
            .fail(function(jqHXR,ajaxOptions,thrownError){
                //alert("Erro ao baixar certificado.")
            })  
    }

    function clonarJuntas(){
        if(confirm('Tem certeza que deseja clonar as juntas do processo anterior para este processo?')){
            console.log("Clonar juntas!");
            // Setar o display como none se for clonado mesmo
        }
    }
</script>