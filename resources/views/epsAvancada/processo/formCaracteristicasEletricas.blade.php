<!-- Formulario de Característicias Elétricas-->
<div name="sub-form-caracteristicas-eletricas" id="sub-form-caracteristicas-eletricas" style="display: none;">
    <h6 class="text-left">Característicias Elétricas</i></h6>
    <hr class="mt-0">
    <div id="wrapper-validation-caracteristicas-eletricas" class="col-12 p-0">
        <!-- Espaço para possíveis erros de validação  -->
    </div>               
    <form  class="col-12 p-0 mb-2" id="form-caracteristicas-eletricas"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_processo">
        <input type="hidden" name="id_caracteristicas_eletricas"> 
        <input type="hidden" name="tig" value="1"> 
        <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
        <input type="text" class="form-control" id="artigo" placeholder="Artigo das Características Elétricas" name="artigo">                           
        <div class="form-row">
            <div class="form-col col-6">
                <label for="tipo_corrente" class="mb-0 mt-1">Tipo de Corrente:</label>
                <select class="form-select" id="tipo_corrente" name="tipo_corrente">
                    <option selected disabled>Escolha o tipo de corrente</option>
                    <option value="continua">Continua</option>
                    <option value="alternada">Alternada</option>
                </select> 
            </div>
            <div class="form-col col-6">
                <label for="polaridade" class="mb-0 mt-1" >Polaridade:</label>
                <select type="text" class="form-select" id="polaridade" placeholder="Polaridade" name="polaridade">
                    <option value="Direta">Direta</option>
                    <option value="Inversa">Inversa</option>
                </select>                     
            </div>
        </div>
        <div class="form-row">
            <div class="form-col col-6">
                <label for="modo_transferencia" class="mb-0 mt-1">Modo de transferência:</label>
                <select class="form-select" id="modo_transferencia" name="modo_transferencia" disabled>
                    <option selected disabled>Escolha o modo de transferência</option>
                    <option value="curto_circuito">Curto-circuito</option>
                    <option value="spray">Spray</option>
                    <option value="globular">Globular</option>
                    <option value="pulsada">Pulsada</option>
                </select> 
            </div>            
            <div class="form-col col-6">
                <label for="velocidade" class="mb-0 mt-1">Velocidade:</label>
                <input type="number" step="0.01" class="form-control" id="velocidade" placeholder="Velocidade" name="velocidade">                     
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-col col-12">
                <label for="camada" class="mb-0 mt-1">Camada:</label>
                <select type="text" class="form-select" id="camada" placeholder="Camada" name="camada"> 
                    <option value="simples" selected>Simples</option>
                    <option value="detalhada">Detalhada</option>
                </select>                    
            </div>
        </div> 

        <div class="form-row mt-1 m-0" id="camada-simples">
            <div class="col-12 border rounded p-2 m-0 mt-1">
                <label>Camada <small class="text-muted">(todas)</small></label>
                <hr class="m-0">
                <div class="form-col p-0 col-12">
                    <label for="camada_todas_amperes_li" class="mb-0 mt-1">Amperes:</label>
                    <div class="input-group">
                        <input type="numeric" class="form-control" id="camada_todas_amperes_li" placeholder="A" name="camada_todas_amperes_li">                     
                        <div class="input-group-append">
                            <div class="input-group-text">a</div>
                        </div>  
                        <input type="numeric" class="form-control" id="camada_todas_amperes_ls" placeholder="A" name="camada_todas_amperes_ls">                     
                    </div>
                </div>
                <div class="form-col  p-0 col-12">
                    <label for="camada_todas_volts_li" class="mb-0 mt-1" >Volts:</label>
                    <div class="input-group">
                        <input type="numeric"  class="form-control" id="camada_todas_volts_li" placeholder="V" name="camada_todas_volts_li">                     
                        <div class="input-group-append">
                            <div class="input-group-text">a</div>
                        </div> 
                        <input type="numeric"  class="form-control" id="camada_todas_volts_ls" placeholder="V" name="camada_todas_volts_ls">                     
                    </div>
                </div>
            </div>
        </div>  

        <div class="form-row  mt-1 m-0" id="camada-detalhada" style="display: none">
            <div class="col-4 border rounded p-2 m-0 mt-1">
                <label><small class="text-muted">Camada raiz</small></label>                
                <hr class="m-0">
                <div class="form-col p-0 col-12">
                    <label for="camada_raiz_amperes_li" class="mb-0 mt-1">Amperes:</label>
                    <div class="input-group">
                        <input type="numeric" class="form-control" id="camada_raiz_amperes_li" placeholder="A" name="camada_raiz_amperes_li">                     
                        <div class="input-group-append">
                            <div class="input-group-text">a</div>
                        </div>  
                        <input type="numeric" class="form-control" id="camada_raiz_amperes_ls" placeholder="A" name="camada_raiz_amperes_ls">                     
                    </div>
                </div>
                <div class="form-col  p-0 col-12">
                    <label for="camada_raiz_volts_li" class="mb-0 mt-1" >Volts:</label>
                    <div class="input-group">
                        <input type="numeric" class="form-control" id="camada_raiz_volts_li" placeholder="V" name="camada_raiz_volts_li">                     
                        <div class="input-group-append">
                            <div class="input-group-text">a</div>
                        </div> 
                        <input type="numeric" class="form-control" id="camada_raiz_volts_ls" placeholder="V" name="camada_raiz_volts_ls">                     
                    </div>
                </div>
            </div>
            <div class="col-4 border rounded p-2 m-0 mt-1">
                <label><small class="text-muted">Camada acabamento</small></label>
                <hr class="m-0">
                <div class="form-col p-0 col-12">
                    <label for="camada_acabamento_amperes_li" class="mb-0 mt-1">Amperes:</label>
                    <div class="input-group">
                        <input type="numeric" class="form-control" id="camada_acabamento_amperes_li" placeholder="A" name="camada_acabamento_amperes_li">                     
                        <div class="input-group-append">
                            <div class="input-group-text">a</div>
                        </div>  
                        <input type="numeric" class="form-control" id="camada_acabamento_amperes_ls" placeholder="A" name="camada_acabamento_amperes_ls">                     
                    </div>
                </div>
                <div class="form-col  p-0 col-12">
                    <label for="camada_acabamento_volts_li" class="mb-0 mt-1" >Volts:</label>
                    <div class="input-group">
                        <input type="numeric" class="form-control" id="camada_acabamento_volts_li" placeholder="V" name="camada_acabamento_volts_li">                     
                        <div class="input-group-append">
                            <div class="input-group-text">a</div>
                        </div> 
                        <input type="numeric" class="form-control" id="camada_acabamento_volts_ls" placeholder="V" name="camada_acabamento_volts_ls">                     
                    </div>
                </div>
            </div>
            <div class="col-4 border rounded p-2 m-0 mt-1">
                <label><small class="text-muted">Camada enchimento</small></label>
                <hr class="m-0">
                <div class="form-col p-0 col-12">
                    <label for="camada_enchimento_amperes_li" class="mb-0 mt-1">Amperes:</label>
                    <div class="input-group">
                        <input type="numeric" class="form-control" id="camada_enchimento_amperes_li" placeholder="A" name="camada_enchimento_amperes_li">                     
                        <div class="input-group-append">
                            <div class="input-group-text">a</div>
                        </div>  
                        <input type="numeric"class="form-control" id="camada_enchimento_amperes_ls" placeholder="A" name="camada_enchimento_amperes_ls">                     
                    </div>
                </div>
                <div class="form-col  p-0 col-12">
                    <label for="camada_enchimento_volts_li" class="mb-0 mt-1" >Volts:</label>
                    <div class="input-group">
                        <input type="numeric"  class="form-control" id="camada_enchimento_volts_li" placeholder="V" name="camada_enchimento_volts_li">                     
                        <div class="input-group-append">
                            <div class="input-group-text">a</div>
                        </div> 
                        <input type="numeric" class="form-control" id="camada_enchimento_volts_ls" placeholder="V" name="camada_enchimento_volts_ls">                     
                    </div>
                </div>
            </div>
        </div>  

        <div class="form-row">
            <div class="form-col col-6">
                <label for="diametro_eletrodo_tig" class="mb-0 mt-1">Diâmetro do eletredo tungstênio: <small class="text-muted">(em mm)</small></label>
                <div class="input-group">
                    <input type="text" class="form-control" id="diametro_eletrodo_tig" placeholder="Diâmetro do Eletredo tungstênio" name="diametro_eletrodo_tig">                     
                    <div class="input-group-append">
                        <div class="input-group-text">mm</div>
                    </div> 
                </div>
            </div>
            <div class="form-col col-6">
                <label for="classificacao_consumivel_tig" class="mb-0 mt-1">Composição do consumível de tungstênio:</label>
                <input type="text" class="form-control"  id="classificacao_consumivel_tig" placeholder="Composição do consumível de tungstênio" name="classificacao_consumivel_tig">                     
            </div>
        </div>         
        <a class="btn btn-block btn-primary mt-2" onclick="adicionaCaracteristicasEletricas()">Terminar Cadastro</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('gas')">Voltar</a>                                                      
    </form>
</div>

<script>
    $('#tipo_corrente').change(function(){
        if ($(this).val() == "continua") {   
            $('#modo_transferencia').prop('disabled', false);
        } else {           
            $('#modo_transferencia').prop('disabled', true);
        }
    });

    $('#camada').change(function(){
        if ($(this).val() == "simples") {   
            $('#camada-simples').css('display', 'block');
            $('#camada-detalhada').css('display', 'none');
        } else {          
            $('#camada-detalhada').css('display', 'flex');
            $('#camada-simples').css('display', 'none');
        }
    });

    function finalizaCadastroProcesso(processoId,processoNome){
        var divElement = $('<div></div>').addClass('mt-2');
        var inputElement = $('<input>').attr({
            type: 'hidden',
            name: 'processo_id[]',
            value: processoId
        });
        var spanElement = $('<span>'+processoNome+'</span>').addClass('btn btn-block btn-secondary disabled');

        divElement.append(inputElement, spanElement);

        $('#lista_processos').append(divElement);
    }

    function resetaFormularios(){
        $('#form-processo')[0].reset();        
        $('#form-processo input[type="hidden"]').val('');
        $('#form-junta')[0].reset();
        $('#form-junta input[type="hidden"]').val('');
        $('#qtd_angulos').val("1");
        $('#form-metal-base')[0].reset();
        $('#form-metal-base input[type="hidden"]').val('');
        $('#form-metal-adicao')[0].reset();
        $('#form-metal-adicao input[type="hidden"]').val('');
        $('#forma_consumivel').removeClass('select-disabled');
        $('#form-posicao-soldagem')[0].reset();
        $('#form-posicao-soldagem input[type="hidden"]').val('');
        $('#form-pre-aquecimento')[0].reset();
        $('#form-pre-aquecimento input[type="hidden"]').val('');
        $('#form-pos-aquecimento')[0].reset();
        $('#form-pos-aquecimento input[type="hidden"]').val('');
        $('#form-gas')[0].reset();
        $('#form-gas input[type="hidden"]').val('');
        $('#form-caracteristicas-eletricas')[0].reset();
        $('#form-caracteristicas-eletricas input[type="hidden"]').val('');
        $('#lista-metal-base').empty();
        $('#lista-metal-adicao').empty();
        $('#lista-junta').empty();
        $('#clonar-juntas').css('display', 'block');
        $('#fcaw-sem-gas').css('display', 'none');
        $('#diametro_eletrodo_tig').prop('disabled',false);
        $('#classificacao_consumivel_tig').prop('disabled',false);
        $('#processo-title').text('Processo');
    }

    function adicionaCaracteristicasEletricas(){
        var formData = $("#form-caracteristicas-eletricas").serialize();
        var linkAjax = '{{route("cadastraOuEditaCaracteristicasEletricas")}}';
        $.ajax({
            url: linkAjax, // URL para onde você quer enviar a requisição
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                $("#wrapper-validation-caracteristicas-eletricas").empty();
                $('input[name="id_caracteristicas_eletricas"]').val(data["id"]);
                finalizaCadastroProcesso(data["processo_id"],data["processo_nome"]);
                resetaFormularios();
                $("#processoModal .close").click()
                mostraAba("processo");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                mostraErrosValidacao('#wrapper-validation-caracteristicas-eletricas',jqXHR.responseJSON)
            }
        });
    };   
</script>