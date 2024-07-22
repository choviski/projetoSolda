<!-- Formulario de Metal de Adição-->
<div name="sub-form-metal-adicao" id="sub-form-metal-adicao" style="display: none;">
    <h6 class="text-left">Metais de Adição</i></h6>
    <hr class="mt-0">
    <div id="wrapper-validation-metal-adicao" class="col-12 p-0">
        <!-- Espaço para possíveis erros de validação  -->
    </div>  
    <div id="div-add-metal-adicao" style="display:block">
        <a class="btn btn-block btn-outline-primary mt-2" onclick="mostraFormularioMetalAdicao()">
            <i class="fa fa-plus"></i>
            Adicionar Metal de adição
        </a>
        <div id="lista-metal-adicao">
            <!-- "Card de listagem dos metais adicao." -->
        </div>
        <a class="btn btn-block btn-primary mt-2" onclick="continuarMetalAdicao()">Continuar</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('metal-base')">Voltar</a>    
    </div>

    <div id="div-form-metal-adicao" style="display:none">
        <form  class="col-12 p-0 mb-2" id="form-metal-adicao" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_processo">
            <input type="hidden" name="id_metal_adicao"> 
            <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
            <input type="text" class="form-control" id="artigo" placeholder="Artigo do Metal de Adição" name="artigo">                         
            <div class="form-row">
                <div class="form-col col-6">
                    <label for="f_numero" class="mb-0 mt-1">F número:</label>
                    <input type="number" class="form-control" id="f_numero" placeholder="F número" name="f_numero">                     
                </div>
                <div class="form-col col-6">
                    <label for="a_numero" class="mb-0 mt-1" >A número:</label>
                    <input type="number" class="form-control" id="a_numero" placeholder="A número" name="a_numero">                     
                </div>
            </div>
            <div class="form-row">
                <div class="form-col col-12">
                    <label for="diametro_consumivel" class="mb-0 mt-1" >Diâmetro do Consumível: <small class="text-muted">(em mm)</small></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="diametro_consumivel" placeholder="Diâmetro do Consumível" name="diametro_consumivel">                     
                        <div class="input-group-append">
                            <div class="input-group-text">mm</div>
                        </div>  
                    </div>
                </div>
                <div class="form-col col-12">
                    <label for="material_depositado" class="mb-0 mt-1">Metal Depositado: <small class="text-muted">(em mm)</small></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="material_depositado" placeholder="Metal depositado" name="metal_depositado">                     
                        <div class="input-group-append">
                            <div class="input-group-text">mm</div>
                        </div>  
                    </div>  
                </div>                       
            </div>
            <div class="form-row">
                <div class="form-col col-6">
                    <label for="possui_metal_suplementar" class="mb-0 mt-1">Metal de adição suplementar?</label>
                    <div class="form-check">
                        <input class="form-check-input" value="1" type="radio" name="possui_metal_suplementar" id="possui_metal_suplementar-1" checked>
                        <label class="form-check-label" for="possui_metal_suplementar">
                            Sim
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" type="radio" name="possui_metal_suplementar" id="possui_metal_suplementar-0" >
                        <label class="form-check-label" for="possui_metal_suplementar">
                            Não
                        </label>
                    </div>
                </div>
                <div class="form-col col-6">
                    <label for="metal_suplementar" class="mb-0 mt-1">Metal Suplementar:</label>
                    <input type="text" class="form-control" id="metal_suplementar" placeholder="Metal Suplementar" name="metal_suplementar">                     
                </div>                       
            </div> 
            <div class="form-row">                 
                <div class="form-col col-12">
                    <label for="classificacao_aws" class="mb-0 mt-1">Classificação AWS/S.F.A:</label>
                    <select class="form-select" aria-label="Default select example" id="classificacao_aws" name="classificacao_aws">
                        <option selected disabled>Escolha a classificação AWS/S.F.A</option>
                        <option value="A5.1">A5.1</option>
                        <option value="A5.2">A5.2</option>
                        <option value="A5.3">A5.3</option>
                        <option value="A5.4">A5.4</option>
                        <option value="A5.5">A5.5</option>
                        <option value="A5.6">A5.6</option>
                        <option value="A5.7">A5.7</option>
                        <option value="A5.8">A5.8</option>
                        <option value="A5.9">A5.9</option>
                        <option value="A5.10">A5.10</option>
                        <option value="A5.11">A5.11</option>
                        <option value="A5.12">A5.12</option>
                        <option value="A5.13">A5.13</option>
                        <option value="A5.14">A5.14</option>
                        <option value="A5.15">A5.15</option>
                        <option value="A5.16">A5.16</option>
                        <option value="A5.17">A5.17</option>
                        <option value="A5.18">A5.18</option>
                        <option value="A5.19">A5.19</option>
                        <option value="A5.20">A5.20</option>
                        <option value="A5.21">A5.21</option>
                        <option value="A5.22">A5.22</option>
                        <option value="A5.23">A5.23</option>
                        <option value="A5.24">A5.24</option>
                        <option value="A5.25">A5.25</option>
                        <option value="A5.26">A5.26</option>
                        <option value="A5.27">A5.27</option>
                        <option value="A5.28">A5.28</option>
                        <option value="A5.29">A5.29</option>
                        <option value="A5.31">A5.31</option>
                        <option value="A5.32">A5.32</option>
                    </select>  
                </div>                       
            </div>
            <div class="form-row">                 
                <div class="form-col col-12">
                    <label for="forma_consumivel" class="mb-0 mt-1">Forma do Consumível:</label>
                    <select class="form-select" id="forma_consumivel" name="forma_consumivel">
                        <option disabled>Escolha a forma do consumível</option>
                        <option value="eletrodos">Eletrodos revestidos</option>
                        <option value="varetas">Varetas</option>
                        <option value="arames_solidos" id="arames_solidos">Arames sólidos</option>
                        <option value="arames_tubulares">Arames tubulares</option>
                        <option value="arames_fitas">Arames fitas</option>
                    </select>  
                </div>                     
            </div>
            <div class="form-row">                 
                <div class="form-col col-6">
                    <label for="suporte" class="mb-0 mt-1">Suporte:</label>
                    <select class="form-select" id="suporte" name="suporte">
                        <option selected disabled>Escolha o tipo de suporte</option>
                        <option value="com">Com</option>
                        <option value="sem">Sem</option>
                        <option value="N/A">N/A</option>
                    </select>  
                </div>
                <div class="form-col col-6">
                    <label for="material_suporte" class="mb-0 mt-1">Material do Suporte:</label>
                    <select class="form-select" id="material_suporte" name="material_suporte">
                        <option value="N/A" selected>N/A</option>
                        <option value="mesmo">Mesmo do material</option>
                        <option value="cobre">Cobre</option>
                        <option value="ceramica">Cerâmica</option>
                    </select>  
                </div>                          
            </div> 
            <div class="form-row">
                <div class="form-col col-12">
                    <label for="marca_material" class="mb-0 mt-1">Marca comercial</label>
                    <input type="text" class="form-control" id="marca_material" placeholder="Marca comercial" name="marca_material">                     
                </div>
            </div>  
            <a class="btn btn-block btn-primary mt-2" id="botao-adicionar-metal" onclick="adicionaMetalAdicao()">Adicionar Metal de Adição</a>                                   
            <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraListagemMetalAdicao()">Voltar</a>                                                      
        </form>
    </div>
</div>

<script>
    $('input[name="possui_metal_suplementar"]').change(function(){
        if ($(this).val() == 1) {
            $('#metal_suplementar').prop('disabled', false);
        } else {            
            $('#metal_suplementar').prop('disabled', true);
        }
    });

    function mostraFormularioMetalAdicao(){
        $('#div-form-metal-adicao').css('display', 'block');
        $('#div-add-metal-adicao').css('display', 'none');         
        $('#botao-adicionar-metal').text('Adicionar Metal de Adição');  
    }

    function mostraListagemMetalAdicao(){
        $('#div-form-metal-adicao').css('display', 'none');
        $('#div-add-metal-adicao').css('display', 'block');  
    }

    function criarElementoMetalAdicao(nomeMetal, id) {
        if ($('#div-metal-adicao-'+id).length > 0) { // Editando
            $('#span-metal-adicao-'+id).text(nomeMetal);    
        }else{ // Criando
            var divExterior = $('<div>').addClass('mt-2 p-0 col-12 d-flex justify-content-between').attr('id','div-metal-adicao-'+id);
            var spanNomeMetal = $('<span>')
                .addClass('btn btn-secondary disabled')
                .attr('style', 'cursor: pointer;')
                .attr('id', 'span-metal-adicao-'+id)
                .text(nomeMetal);
            var divInterno = $('<div>');
            var spanEditar = $('<span>')
                .addClass('btn btn-outline-primary mr-1')
                .attr('style', 'cursor: pointer;')
                .attr('onclick', 'editaMetalAdicao(' + id + ')')
                .html('<i class="fas fa-edit"></i>');
            var spanRemover = $('<span>')
                .addClass('btn btn-outline-danger')
                .attr('style', 'cursor: pointer;')
                .attr('onclick', 'removeMetalAdicao(' + id + ')')
                .html('<i class="fas fa-trash"></i>');
            divInterno.append(spanEditar, spanRemover);
            divExterior.append(spanNomeMetal, divInterno);
            $('#lista-metal-adicao').append(divExterior);
        }
    }

    function adicionaMetalAdicao(){
        var formData = $("#form-metal-adicao").serialize();
        var linkAjax = '{{route("cadastraOuEditaMetalAdicao")}}';
        $.ajax({
            url: linkAjax,
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) { 
                $("#wrapper-validation-metal-adicao").empty();
                criarElementoMetalAdicao(data["metal_adicao_nome"],data["metal_adicao_id"]); 
                var id_processo = $('[name="id_processo"]').val(); 
                $('#form-metal-adicao')[0].reset();
                $('[name="id_metal_adicao"]').val('');
                $('[name="id_processo"]').val(id_processo);
                mostraListagemMetalAdicao();                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                mostraErrosValidacao('#wrapper-validation-metal-adicao',jqXHR.responseJSON)
            }
        });
    };   

    function editaMetalAdicao(id){
        var linkAjax = '{{route("getMetalAdicao",":id")}}';
        linkAjax = linkAjax.replace(':id',id);
        $.ajax({
            url:linkAjax,
            type:'get',
        })
            .done(function(data){
                $('#form-metal-adicao input').each(function() {
                    var nomeCampo = $(this).attr('name');
                    if (data.hasOwnProperty(nomeCampo)) {
                        if (!$(this).is(':radio')) {
                            $(this).val(data[nomeCampo]);
                        }else{
                            $('#possui_metal_suplementar-'+(data[nomeCampo])).prop('checked', true);
                            $('#possui_metal_suplementar-'+(data[nomeCampo])).trigger('change');
                        }
                    }
                });
                $('[name="id_metal_adicao"]').val(id);
                mostraFormularioMetalAdicao();
                $('#botao-adicionar-metal').text('Salvar Metal de Adição');
            })            
            .fail(function(jqHXR,ajaxOptions,thrownError){
                //alert("Erro ao baixar certificado.")
            })    
    }

    function continuarMetalAdicao(){
        var temMetaisCadastrados = $('#lista-metal-adicao').children('div').length > 0 ? true : false;
        if (temMetaisCadastrados){
            $("#wrapper-validation-metal-adicao").empty();
            mostraAba('posicao-soldagem');
        }else{
            mostraErrosValidacao('#wrapper-validation-metal-adicao',{
                "errors": {
                    "qtd_metais_adicao": [
                        "É necessário pelo menos um metal de adicao."
                    ]
                }
            });        
        }
    }

    function removeMetalAdicao(id){
        if(confirm("Tem certeza que deseja excluir este metal de adição?")){
            var linkAjax = '{{route("deleteMetalAdicao",":id")}}';
            linkAjax = linkAjax.replace(':id',id);
            $.ajax({
                url:linkAjax,
                type:'DELETE',                
                headers:{
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
            })
                .done(function(data){
                    $('#div-metal-adicao-'+id).remove();
                    $('[name="id_metal_adicao"]').val('');
                })            
                .fail(function(jqHXR,ajaxOptions,thrownError){
                    //alert("Erro ao baixar certificado.")
                })    
        }
    }
</script>