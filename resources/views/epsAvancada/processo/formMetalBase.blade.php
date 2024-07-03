<!-- Formulario de Metal de Base-->
<div name="sub-form-metal-base" id="sub-form-metal-base" style="display: none;">
    <h6 class="text-left">Metais de Base</i></h6>
    <hr class="mt-0">
    <div id="wrapper-validation-metal-base" class="col-12 p-0">
        <!-- Espaço para possíveis erros de validação  -->
    </div>  
    <div id="div-add-metal-base" style="display:block">
        <a class="btn btn-block btn-outline-primary mt-2" onclick="mostraFormularioMetalBase()">
            <i class="fa fa-plus"></i>
            Adicionar Metal Base
        </a>
        <div id="lista-metal-base">
            <!-- "Card de listagem dos metais base." -->
        </div>
        <a class="btn btn-block btn-primary mt-2" onclick="continuar()">Continuar</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('junta')">Voltar</a>    
    </div>

    <div id="div-form-metal-base" style="display:none">
        <form  class="col-12 p-0 mb-2" id="form-metal-base" enctype="multipart/form-data">
            @csrf
            <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
            <input type="text" class="form-control" id="artigo" placeholder="Artigo do Metal de Base" name="artigo">  
            <input type="hidden" name="id_processo">
            <input type="hidden" name="id_material_base">                        
            <div class="form-row">
                <div class="form-col col-6">
                    <label for="p_numero" class="mb-0 mt-1">P número:</label>
                    <input type="number" class="form-control" id="p_numero" placeholder="P número" name="p_numero">                     
                </div>
                <div class="form-col col-6">
                    <label for="grupo_n" class="mb-0 mt-1" >Grupo N:</label>
                    <input type="number" class="form-control" id="grupo_n" placeholder="Grupo N" name="grupo_n">                     
                </div>
            </div>
            <div class="form-row">
                <div class="form-col col-6">
                    <label for="tipo_grau" class="mb-0 mt-1" >Tipo Grau:</label>
                    <input type="text"  class="form-control" id="tipo_grau" placeholder="Tipo Grau" name="tipo_grau">                     
                </div>
                <div class="form-col col-6">
                    <label for="metal_base" class="mb-0 mt-1">Metal Base:</label>
                    <input type="text" class="form-control" id="metal_base" placeholder="Metal Base" name="metal_base">                     
                </div>                       
            </div>
            <div class="form-row">
                <div class="form-col col-12">     
                    <label for="tubo_ou_chapa" class="mb-0 mt-1">Tubo ou Chapa?</label>
                    <div class="form-check">
                        <input class="form-check-input" value="Tubo" type="radio" name="tubo_ou_chapa" id="Tubo" checked>
                        <label class="form-check-label" for="tubo">
                            Tubo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Chapa" type="radio" name="tubo_ou_chapa" id="Chapa" >
                        <label class="form-check-label" for="chapa">
                            Chapa
                        </label>
                    </div>
                </div>                       
            </div>
            <div class="form-row" id="metal-base-tubo" style="display:flex">                    
                <div class="form-col col-12">  
                    <label for="diametro_interno_tubo" class="mb-0 mt-1">Diâmetro Interno do tubo: <small class="text-muted">(em mm)</small></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="diametro_interno_tubo" placeholder="Diâmetro Interno do tubo" name="diametro_interno_tubo">                     
                        <div class="input-group-append">
                            <div class="input-group-text">mm</div>
                        </div>                     
                    </div>   
                </div> 
                <div class="form-col col-12">
                    <label for="diametro_externo_tubo" class="mb-0 mt-1">Diâmetro Externo do tubo: <small class="text-muted">(em mm)</small></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="diametro_externo_tubo" placeholder="Diâmetro Externo do tubo" name="diametro_externo_tubo">                     
                        <div class="input-group-append">
                            <div class="input-group-text">mm</div>
                        </div> 
                    </div> 
                </div> 
            </div>
            <a class="btn btn-block btn-primary mt-2" id="botao-adicionar-material-base" onclick="adicionaMetalBase()">Adicionar Metal Base</a>                                   
            <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraListagemMetalBase()">Voltar</a>                                                      
        </form>
    </div>
</div>

<script>
    $('input[name="tubo_ou_chapa"]').change(function(){
        if ($(this).val() == "Tubo") {
            $('#metal-base-tubo').css('display','flex');
        } else if ($(this).val() == "Chapa") {           
            $('#metal-base-tubo').css('display','none');
        }
    });

    function mostraFormularioMetalBase(){
        $('#div-form-metal-base').css('display', 'block');
        $('#div-add-metal-base').css('display', 'none');
        $('#botao-adicionar-material-base').text('Adicionar Metal Base');    
    }

    function mostraListagemMetalBase(){
        $('#div-form-metal-base').css('display', 'none');
        $('#div-add-metal-base').css('display', 'block');  
    }

    function criarElementoMetalBase(nomeMetal, id) {
        if ($('#div-material-base-'+id).length > 0) { // Editando
            $('#span-material-base-'+id).text(nomeMetal); 
        }else{//Criando
            var divExterior = $('<div>').addClass('mt-2 p-0 col-12 d-flex justify-content-between').attr('id','div-material-base-'+id);;
            var spanNomeMetal = $('<span>')
                .addClass('btn btn-secondary disabled')
                .attr('style', 'cursor: pointer;')
                .attr('id', 'span-material-base-'+id)
                .text(nomeMetal);
            var divInterno = $('<div>');
            var spanEditar = $('<span>')
                .addClass('btn btn-outline-primary mr-1')
                .attr('style', 'cursor: pointer;')
                .attr('onclick', 'editaMetalBase(' + id + ')')
                .html('<i class="fas fa-edit"></i>');
            var spanRemover = $('<span>')
                .addClass('btn btn-outline-danger')
                .attr('style', 'cursor: pointer;')
                .attr('onclick', 'removeMetalBase(' + id + ')')
                .html('<i class="fas fa-trash"></i>');
            divInterno.append(spanEditar, spanRemover);
            divExterior.append(spanNomeMetal, divInterno);
            $('#lista-metal-base').append(divExterior);
        }
    }

    function adicionaMetalBase(){
        var formData = $("#form-metal-base").serialize();
        var linkAjax = '{{route("cadastraOuEditaMaterialBase")}}';
        $.ajax({
            url: linkAjax,
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) { 
                $("#wrapper-validation-metal-base").empty();
                criarElementoMetalBase(data["material_nome"],data["material_id"]); 
                var id_processo = $('[name="id_processo"]').val(); 
                $('#form-metal-base')[0].reset();
                $('[name="id_material_base"]').val('');
                $('[name="id_processo"]').val(id_processo);
                mostraListagemMetalBase();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                mostraErrosValidacao('wrapper-validation-metal-base',jqXHR.responseJSON)
            }
        });
    };       
    function editaMetalBase(id){
        var linkAjax = '{{route("getMaterialBase",":id")}}';
        linkAjax = linkAjax.replace(':id',id);
        $.ajax({
            url:linkAjax,
            type:'get',
        })
            .done(function(data){
                $('#form-metal-base input').each(function() {
                    var nomeCampo = $(this).attr('name');
                    if (data.hasOwnProperty(nomeCampo)) {
                        if (!$(this).is(':radio')) {
                            $(this).val(data[nomeCampo]);
                        }else{
                            $('#'+(data[nomeCampo])).prop('checked', true);
                        }
                    }
                });
                $('[name="id_material_base"]').val(id);
                mostraFormularioMetalBase();
                $('#botao-adicionar-material-base').text('Salvar Metal de Base');
            })  
            .fail(function(jqHXR,ajaxOptions,thrownError){
                //alert("Erro ao baixar certificado.")
            })  
    }

    function continuar(){
        var temMetaisCadastrados = $('#lista-metal-base').children('div').length > 0 ? true : false;
        if (temMetaisCadastrados){
            $("#wrapper-validation-metal-base").empty();
            mostraAba('metal-adicao');
        }else{
            mostraErrosValidacao('wrapper-validation-metal-base',{
                "errors": {
                    "qtd_metais_base": [
                        "É necessário pelo menos um metal base."
                    ]
                }
            });        
        }
    }

    function removeMetalBase(id){
        if(confirm("Tem certeza que deseja excluir este metal de base?")){
            var linkAjax = '{{route("deleteMaterialBase",":id")}}';
            linkAjax = linkAjax.replace(':id',id);
            $.ajax({
                url:linkAjax,
                type:'DELETE',                
                headers:{
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
            })
                .done(function(data){
                    $('#div-material-base-'+id).remove();
                    $('[name="id_material_base"]').val('');
                })            
                .fail(function(jqHXR,ajaxOptions,thrownError){
                    //alert("Erro ao baixar certificado.")
                })    
        }
    }
</script>