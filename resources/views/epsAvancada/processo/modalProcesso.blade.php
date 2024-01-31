<!-- Modal para processos -->
<div class="modal fade" id="processoModal" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Processo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div name="sub-form-processo" id="sub-form-processo">
                    <h6 class="text-left">Informações do processo</i></h6>
                    <hr class="mt-0">            
                    <form  class="col-12 p-0 mb-2" id="form-processo"enctype="multipart/form-data">
                        @csrf                           
                        <div class="form-row">
                            <input type="hidden" id="id_processo" name="id_processo">
                            <div class="form-col col-6">
                                <label for="nome" class="mb-0 mt-1">Nome:</label>
                                <input type="text" class="form-control" id="nome" placeholder="Processo utilizado" name="nome">                     
                            </div>
                            <div class="form-col col-6">
                                <label for="tipo" class="mb-0 mt-1" >Tipo:</label>
                                <input type="text" class="form-control" id="tipo" placeholder="Manual, Automático ou Semiautomático" name="tipo">                     
                            </div>
                        </div>
                        <a id="cria-processo" class="btn btn-block btn-primary mt-2" onclick="adicionaProcesso()">Continuar</a>                               
                    </form>
                </div>

                @include('epsAvancada.processo.formJunta')
                @include('epsAvancada.processo.formPreAquecimento')
                @include('epsAvancada.processo.formPosAquecimento')
                @include('epsAvancada.processo.formCaracteristicasEletricas')
                @include('epsAvancada.processo.formGas')
                @include('epsAvancada.processo.formPosicaoSoldagem')
               
            </div>
        </div>
    </div>
</div>

<script>    
    var qtdProcessos=0;
    function mostraAba(aba){
        $('#sub-form-processo').css('display', 'none');
        $('#sub-form-junta').css('display', 'none');  
        $('#sub-form-pre-aquecimento').css('display', 'none');  
        $('#sub-form-pos-aquecimento').css('display', 'none');  
        $('#sub-form-gas').css('display', 'none');  
        $('#sub-form-caracteristicas-eletricas').css('display', 'none');  
        $('#sub-form-posicao-soldagem').css('display', 'none');  
        $('#sub-form-'+aba).css('display', 'block');  
    }

    function adicionaProcesso(){
        var formData = $("#form-processo").serialize();
        var linkAjax = '{{route("cadastraOuEditaProcesso")}}';
        $.ajax({
            url: linkAjax,
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                $("#id_processo_"+qtdProcessos).val(data["id"]);
                $('input[name="id_processo"]').val(data["id"]);
                mostraAba("junta");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //console.error("Erro na requisição:", textStatus, errorThrown);
            }
        });
    };
</script>