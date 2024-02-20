<!-- Formulario de Característicias Elétricas-->
<div name="sub-form-caracteristicas-eletricas" id="sub-form-caracteristicas-eletricas" style="display: none;">
    <h6 class="text-left">Característicias Elétricas</i></h6>
    <hr class="mt-0">             
    <form  class="col-12 p-0 mb-2" id="form-caracteristicas-eletricas"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_processo">
        <input type="hidden" name="id_caracteristicas_eletricas">                        
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
                <input type="number" step="0.01" class="form-control" id="polaridade" placeholder="Polaridade" name="polaridade">                     
            </div>
        </div>
        <div class="form-row">
            <div class="form-col col-12">
                <label for="modo_transferencia" class="mb-0 mt-1">Modo de transferência:</label>
                <select class="form-select" id="modo_transferencia" name="modo_transferência" disabled>
                    <option selected disabled>Escolha a forma de transferência</option>
                    <option value="curto_circuito">Curto-circuito</option>
                    <option value="spray">Spray</option>
                    <option value="globular">Globular</option>
                    <option value="pulsada">Pulsada</option>
                </select> 
            </div>
        </div>
        <div class="form-row">
            <div class="form-col col-6">
                <label for="amperes" class="mb-0 mt-1">Amperes:</label>
                <input type="number" step="0.01" class="form-control" id="amperes" placeholder="Amperes" name="amperes">                     
            </div>
            <div class="form-col col-6">
                <label for="volts" class="mb-0 mt-1" >Volts:</label>
                <input type="number" step="0.01" class="form-control" id="volts" placeholder="Volts" name="volts">                     
            </div>
        </div>
        <div class="form-row">
            <div class="form-col col-6">
                <label for="velocidade" class="mb-0 mt-1">Velocidade:</label>
                <input type="number" step="0.01" class="form-control" id="velocidade" placeholder="Velocidade" name="velocidade">                     
            </div>
            <div class="form-col col-6">
                <label for="camada" class="mb-0 mt-1">Camada:</label>
                <input type="text" class="form-control" id="camada" placeholder="Camada" name="camada">                     
            </div>
        </div>
        <label for="tig" class="mb-0 mt-1">Tig?</label>
        <div class="form-check">
            <input class="form-check-input" value="1" type="radio" name="tig" id="tig_sim" checked>
            <label class="form-check-label" for="tig_sim">
                Sim
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="0" type="radio" name="tig" id="tig_nao" >
            <label class="form-check-label" for="tig_nao">
                Não
            </label>
        </div>      
        <div class="form-row">
            <div class="form-col col-6">
                <label for="diametro_eletrodo_tig" class="mb-0 mt-1">Diâmetro do Eletredo TIG (caso seja TIG):</label>
                <input type="number" step="0.01"  class="form-control" id="diametro_eletrodo_tig" placeholder="Diâmetro do Eletredo TIG" name="diametro_eletrodo_tig">                     
            </div>
            <div class="form-col col-6">
                <label for="classificacao_consumivel_tig" class="mb-0 mt-1">Classificação do Consumível TIG (caso seja TIG):</label>
                <input type="text" class="form-control"  id="classificacao_consumivel_tig" placeholder="Classificação do Consumível TIG" name="classificacao_consumivel_tig">                     
            </div>
        </div>         
        <a class="btn btn-block btn-primary mt-2" onclick="adicionaCaracteristicasEletricas()">Terminar Cadastro</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('pos-aquecimento')">Voltar</a>                                                      
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



    $('input[name="tig"]').change(function(){
        if ($(this).val() == 1) {
            $('#diametro_eletrodo_tig').prop('disabled', false);
            $('#classificacao_consumivel_tig').prop('disabled', false);
        } else {            
            $('#diametro_eletrodo_tig').prop('disabled', true);
            $('#classificacao_consumivel_tig').prop('disabled', true);
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
        $('#form-metal-base')[0].reset();
        $('#form-metal-base input[type="hidden"]').val('');
        $('#form-metal-adicao')[0].reset();
        $('#form-metal-adicao input[type="hidden"]').val('');
        $('#form-posicao-soldagem')[0].reset();
        $('#form-posicao-soldagem input[type="hidden"]').val('');
        $('#form-pre-aquecimento')[0].reset();
        $('#form-pre-aquecimento input[type="hidden"]').val('');
        $('#form-pos-aquecimento')[0].reset();
        $('#form-pos-aquecimento input[type="hidden"]').val('');
        $('#form-gas')[0].reset();
        $('#form-gas input[type="hidden"]').val('');
        $('#form-caracteristicas-eletricas')[0].reset()
        $('#form-caracteristicas-eletricas input[type="hidden"]').val('');;
        $('#lista-metal-base').empty();
        $('#lista-metal-adicao').empty();
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
                $('input[name="id_caracteristicas_eletricas"]').val(data["id"]);
                finalizaCadastroProcesso(data["processo_id"],data["processo_nome"]);
                resetaFormularios();
                $("#processoModal .close").click()
                mostraAba("processo");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //console.error("Erro na requisição:", textStatus, errorThrown);
            }
        });
    };   
</script>