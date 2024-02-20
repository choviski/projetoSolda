<!-- Modal para processos -->
<div class="modal fade" id="processoModal" tabindex="-2"  role="dialog">
    <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered" role="document">
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
                        <div class="form-row">
                            <div class="form-col col-12">
                                <label for="qual_processo" class="mb-0 mt-1" >Qual processo:</label>
                                <select class="form-select" name="qual_processo" id="qual_processo" >
                                    <option selected value="TIG">TIG</option>
                                   <!-- <option value="MIG/MAG">MIG/MAG</option>
                                    <option value="Eletrodo revestido">Eletrodo revestido</option>-->
                                </select>
                            </div>
                        </div>
                        <a id="cria-processo" class="btn btn-block btn-primary mt-2" onclick="adicionaProcesso()">Continuar</a>                               
                    </form>
                </div>

                @include('epsAvancada.processo.formJunta')
                @include('epsAvancada.processo.formMetalBase')
                @include('epsAvancada.processo.formMetalAdicao')
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
        $('#sub-form-metal-base').css('display', 'none');  
        $('#sub-form-metal-adicao').css('display', 'none');  
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
                mostraAba("metal-adicao");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ERRO: Verifique se os campos estão preenchidos corretamente');
            }
        });
    };
</script>